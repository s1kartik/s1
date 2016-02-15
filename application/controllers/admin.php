<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MY_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    private $user;

	function __construct()
	{
		parent::__construct();
		
        $this->load->library('cart');
		$this->load->library('common');
		$this->load->library('tcpdf');
		$this->s1_parent_libtype= 'S1 Systems';

		$this->sess_userid 		= $this->session->userdata('userid');
		$this->sess_usertype 	= $this->session->userdata('usertype');
		$this->sess_useremail 	= $this->session->userdata('username');
		$this->sess_nickname 	= $this->session->userdata('nickname');
		$this->user 			= $this->users->getUserByEmail($this->sess_useremail);
		
		$this->mylib_rows_limit = $this->common->pagin_mylib_rows_limit;
		$this->s1lib_rows_limit = $this->common->pagin_s1lib_rows_limit;
		$this->msg_rows_limit 	= $this->common->pagin_msg_rows_limit;
		
		// $this->load->library('RSSParser', array('url' => 'http://news.ontario.ca/newsroom/en/rss/','life' => 2));

		
		$this->_isLoggedIn();
		// echo CI_VERSION;

		// $this->load->library('RSSParserb', array('url' => 'http://www.wsib.on.ca/wsib-templating/jsp/xml/rssOPM.jsp','life' => 2));
		// $this->load->library('RSSParserb', array('url' => 'http://www.ihsa.ca/feeds/rss.xml','life' => 2));
		
		// Call AJAX controller //
			require_once('application/controllers/ajax.php');
	}

	function commonHead()
	{
		//$rows = $this->db->query( "select password from tbl_user where email_addr= 'sandro.pinto@183training.com'" ); //a95accaa3cad2cb7cc915319f0ccbea1
		//$rows = $rows->result();

		// $this->db->query( "update tbl_user set password = 'a495b70c859b61f53aa7c6ad9f054447' where email_addr= 'sandro.pinto@183training.com'" ); 
		// echo "Done";
		// s1dev password: a495b70c859b61f53aa7c6ad9f054447
		
		$data['css']=$this->css;
		$data['base']=$this->base;
		$data['user']=$this->user;
		return $data;
	}

	public function index()
	{
	    $this->_security();   
        $data = $this->commonHead();
        $this->load->view('dashboard', $data);
	}
    
    function page_numbers()
	{
        $libraries = $this->libraries->getLibraryList();
        foreach($libraries as $lib){
            $this->libraries->updatePageNumbersByLibraryID($lib['library_id']);
        }
    }

    /****** library ******/
	public function library()
	{
	    $this->_security(); 
        $data = $this->commonHead();

        if( isset($_GET['language']) && !empty($_GET['language']) ) {
			$lang = $this->common->escapeStr($_GET['language']);
		}
		else if( isset($_POST['language']) && !empty($_POST['language']) ) {
            $lang = $this->common->escapeStr($_POST['language']);
		}
        else {
            $lang = 'EN';
		}
        $paged 					= isset($_GET['page'])?(int)$_GET['page']:1; 
        $paged --;
        $numbers_per_page 		= 20;
        $data['list'] 			= $this->libraries->getLibraryListByLanguage($lang, $paged, $numbers_per_page, false);
		$data['libtype'] 	= (isset($_POST['library_type'])&&$_POST['library_type']) ? $_POST['library_type'] : '';
		
		$data['pages'] 	= $this->libraries->getTotalNumberOfLibrariesByLanguage($lang, $numbers_per_page, false);
        $this->load->view('library_view', $data);
	}

    function new_library()
	{
        $this->_security();
        $data = $this->commonHead();

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $new_lib_id 	= $this->libraries->addLibrary();
			$library_type_id= isset($_POST['type']) ? $_POST['type'] : '';

			if( $library_type_id == "54" || $library_type_id == "55" || $library_type_id == "56" ) {
				if($_SERVER['REQUEST_METHOD']=='POST') {
					$upload_error 	= $err_upload_video = '';
					$files 			= $_FILES;

					$s1_alerts_images = $s1_video_uploaded = array();
					if( isset($files['userfile']['name']) && sizeof($files['userfile']['name']) > 0 ) {
						$this->load->library('upload');
						foreach( $files['userfile']['name'] AS $key_library_image => $val_library_image ) {
							if( trim($val_library_image) ) {
								$_FILES['userfile']['size'] 	= $files['userfile']['size'][$key_library_image];
								$_FILES['userfile']['name'] 	= $files['userfile']['name'][$key_library_image];
								$_FILES['userfile']['type'] 	= $files['userfile']['type'][$key_library_image];
								$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$key_library_image];
								$_FILES['userfile']['error'] 	= $files['userfile']['error'][$key_library_image];
								
								// Delete the existing Alert Image if available //
									if( $alert_img = glob(FCPATH.$this->path_upload_paragraph_images."libimage_".$new_lib_id."_".($key_library_image+1).".*") ) {
										$arr_alert_img = explode("/", $alert_img[0]);
										isset($arr_alert_img[sizeof($arr_alert_img)-1]) ? unlink( FCPATH.$this->path_upload_paragraph_images.$arr_alert_img[sizeof($arr_alert_img)-1] ) : '';
									}
								// Upload the Alerts Image //
									$ext_alertimg	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
									$library_imgname 	= "libimage_".$new_lib_id."_".($key_library_image+1).".".$ext_alertimg;
									$s1_alerts_images[$key_library_image] = $library_imgname;

									$this->upload->initialize($this->common->setUploadOptions($this->path_upload_paragraph_images, $library_imgname));
									if( !$this->upload->do_upload() ) {
										echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
									}
									else {
										$data = array('upload_data' => $this->upload->data());
									}

								// Insert Union Library images //
									$arr_ins_library_images = array('library_id'=>$new_lib_id, 'image'=>$library_imgname, 'date_image_created'=>date('Y-m-d h:i:s'));
									$this->parentdb->manageDatabaseEntry( 'tbl_library_images', 'INSERT', $arr_ins_library_images );
							}
						}
					}			
					
					
					// Videos //
					if( isset($_FILES['alert_videoupd']['name']) && sizeof($_FILES['alert_videoupd']['name']) > 0 ) {
						$s1_video_uploaded = (isset($rows_alerts['st_video_uploaded'])&&$rows_alerts['st_video_uploaded']) ? explode(",", $rows_alerts['st_video_uploaded']) : array();

						foreach( $_FILES['alert_videoupd']['name'] AS $key_library_videoupd => $val_alert_videoupd ) {
							if( trim($val_alert_videoupd) ) {
								$_FILES['alert_videoupd']['size'] 	= $files['alert_videoupd']['size'][$key_library_videoupd];
								$_FILES['alert_videoupd']['name'] 	= $files['alert_videoupd']['name'][$key_library_videoupd];
								$_FILES['alert_videoupd']['type'] 	= $files['alert_videoupd']['type'][$key_library_videoupd];
								$_FILES['alert_videoupd']['tmp_name'] = $files['alert_videoupd']['tmp_name'][$key_library_videoupd];
								$_FILES['alert_videoupd']['error'] 	= $files['alert_videoupd']['error'][$key_library_videoupd];

								// Delete the existing Alert Video if available //
									if( $alert_video = glob(FCPATH.$this->path_upload_paragraph_images."libvideo_".$new_lib_id."_".($key_library_videoupd+1).".*") ) {
										$arr_alert_video = explode("/", $alert_video[0]);
										isset($arr_alert_video[sizeof($arr_alert_video)-1]) ? unlink( FCPATH.$this->path_upload_paragraph_images.$arr_alert_video[sizeof($arr_alert_video)-1] ) : '';
									}

								// Upload the Alert Video //
									$ext_alertvideo	= $this->common->getImagePathInfo( $_FILES['alert_videoupd']['name'], 'extension' );
									$library_videoname= "libvideo_".$new_lib_id."_".($key_library_videoupd+1).".".$ext_alertvideo;
									
									$s1_video_uploaded[$key_library_videoupd] = $library_videoname;
									
									$config['upload_path']   	= $this->path_upload_paragraph_images;
									$config['allowed_types']	= '*';
									$config['file_name'] 		= $library_videoname;
									$this->load->library('upload', $config);									
									$this->upload->initialize($config);
									if( !$this->upload->do_upload('alert_videoupd') ) {
										echo $err_upload_video = $this->upload->display_errors("<span class='error'>", "</span>");
									}
									else {
										$data = array('upload_data' => $this->upload->data());
									}

								// Insert Union Library videos //
									$arr_ins_library_videos = array('library_id'=>$new_lib_id, 'video'=>$library_videoname, 'date_video_created'=>date('Y-m-d h:i:s'));
									$this->parentdb->manageDatabaseEntry( 'tbl_library_videos', 'INSERT', $arr_ins_library_videos );
							}
						}
					}
				}
			}

			// Add library campus //
				if( isset($_POST['cmb_library_campus'][0]) && $_POST['cmb_library_campus'][0] ) {
					$this->parentdb->deleteSection( '', 'library_campus', $new_lib_id );
					foreach( $_POST['cmb_library_campus'] AS $val_post_campus ) {
						$val_post_campus= trim($val_post_campus);
						$arr_insert = array( 'st_campus_name' => $val_post_campus, 'in_library_id' => $new_lib_id, 'in_library_type_id' => $library_type_id  );
						$this->parentdb->manageDatabaseEntry('tbl_library_campus', 'INSERT', $arr_insert );
					}
				}

			// Add Regualtion details // 
				if( isset($_POST['cmb_regulation_number']) ) {
					foreach( $_POST['cmb_regulation_number'] AS $key_reg => $val_reg ) {
						$reg_no 	= isset($_POST['cmb_regulation_number']) ? $_POST['cmb_regulation_number'][$key_reg] : '';
						$section 	= isset($_POST['cmb_section']) ? $_POST['cmb_section'][$key_reg] : '';
						$subsection = isset($_POST['cmb_subsection']) ? $_POST['cmb_subsection'][$key_reg] : '';
						$item 		= isset($_POST['cmb_item']) ? $_POST['cmb_item'][$key_reg] : '';
						$subitem 	= isset($_POST['cmb_subitem']) ? $_POST['cmb_subitem'][$key_reg] : '';
						
						// Get Parent Regulation ID and Regulation Content Id 
							$where_regcontents = 'st_regulation_number="'.$reg_no.'" AND st_section="'.$section.'" AND st_subsection="'.$subsection.'" AND st_item="'.$item.'" AND st_subitem="'.$subitem.'"';
							$rows_regulation_data = $this->users->getMetaDataList('regulation_sections', $where_regcontents, '', 'in_regulation_content_id');
							$parent_reg_id 	= isset($rows_regulation_data[0]['in_parent_regulation_id']) ? $rows_regulation_data[0]['in_parent_regulation_id'] : '';
							$reg_content_id = isset($rows_regulation_data[0]['in_regulation_content_id']) ? $rows_regulation_data[0]['in_regulation_content_id'] : '';

						$arr_ins_libreg = array('in_library_id' => $new_lib_id, 
												'in_parent_regulation_id' => $parent_reg_id, 
												'in_regulation_content_id' => $reg_content_id, 
												'st_regulation_number' => $reg_no,
												'st_section' 			=> $section,
												'st_subsection' 		=> $subsection,
												'st_item' 				=> $item,
												'st_subitem' 			=> $subitem);
						
						$this->parentdb->manageDatabaseEntry( 'tbl_library_regulation', 'INSERT', $arr_ins_libreg );
					}
				}

			if( (isset($_POST['submit'])&&$_POST['submit']=="Finish") && '6' == $_POST['type'] ) { // Investigation Library Type Selected //
				$arrInvestigation = array('in_investigation_created_by' 	=> $this->sess_userid,
										  'in_library_id'					=> $new_lib_id);
				$this->parentdb->manageDatabaseEntry('tbl_inv_investigation', 'INSERT', $arrInvestigation);
                redirect($this->base.'admin/library');
			}
            redirect($this->base.'admin/add_library_page?lib='.$new_lib_id);
		}
        $this->load->view('new_library', $data); 
    }

    function add_library_page()
	{
        $this->_security();
        $data = $this->commonHead();

		// Get library type id
			$library_type_id = $this->users->getMetaDataList('library','library_id="'.(int)$_GET['lib'].'"','','library_type_id');
			$library_type_id = $data['library_type_id'] = isset($library_type_id[0]['library_type_id']) ? $library_type_id[0]['library_type_id'] : '';
			$arr_not_desc 	 = array(1,3,54,55,56);
			$data['show_desc']	 = (in_array($library_type_id, $arr_not_desc)) ? '1' : '';

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $targetPath = $this->path_upload_paragraph_images;
			$ret_files 	= $this->paragraphFileUpload('userfile', $targetPath);
			$new_page_id= $this->libraries->addPagetoLibrary( $_POST['lib_id'], $ret_files );
			
            if($_POST['submit']=="Finish") {
                redirect($this->base.'admin/library');
			}
        }

        $data['library'] = $this->libraries->getLibraryByID((int)$_GET['lib']);
        $data['pn'] = $this->libraries->getNewPageNumberByLibraryID((int)$_GET['lib']);
        $this->load->view('new_library_page', $data); 
    }
    
    function insert_library_page()
	{
        $this->_security();
        $data = $this->commonHead();
		
		// Get library type id
			$library_type_id = $this->users->getMetaDataList('library','library_id="'.(int)$_GET['lib'].'"','','library_type_id');
			$library_type_id = $data['library_type_id'] = isset($library_type_id[0]['library_type_id']) ? $library_type_id[0]['library_type_id'] : '';
			$arr_not_desc 	 = array(1,3,54,55,56);
			$data['show_desc']	 = (in_array($library_type_id, $arr_not_desc)) ? '1' : '';

        if($_SERVER['REQUEST_METHOD']=='POST') {
			$targetPath = $this->path_upload_paragraph_images;
            $ret_files 	= $this->paragraphFileUpload('userfile', $targetPath);
			
            $this->libraries->insertPageAfterPageNumber($_POST['lib_id'], $_POST['pn'], $ret_files);
	
			if($_POST['submit']=="Finish") {
                redirect($this->base.'admin/library');
			}
			else {
				redirect($this->base.'admin/library_pages?lib='.$_POST['lib_id'].'&page='.$_POST['pn']);
			}
        }
        $data['library'] = $this->libraries->getLibraryByID((int)$_GET['lib']);
        $data['pn'] = (int)$_GET['page'];
        $this->load->view('insert_library_page', $data);
    }
    
    function update_library()
	{
        $this->_security();
        $data = $this->commonHead();

		$lib_id = (isset($_GET['lib'])&&(int)$_GET['lib']) ? $_GET['lib'] : '';
		
        $data['library'] = $this->libraries->getLibraryByID($lib_id);
		$data['is_sold'] = $this->libraries->getLibraryStatusByID($lib_id);
		
		// Get selected library Campus //
			$rows_library_campus = $this->users->getMetaDataList('library_campus','in_library_id="'.$lib_id.'" AND in_status=1', '', 'st_campus_name');
			$arr_library_campus = array();
			foreach( $rows_library_campus AS $val_library_campus ) {
				$arr_library_campus[] = (isset($val_library_campus['st_campus_name'])&&$val_library_campus['st_campus_name']) ? $val_library_campus['st_campus_name'] : '';
			}
			$data['arr_library_campus'] = $arr_library_campus;
			// common::pr($arr_library_campus);
			
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->libraries->updateLibraryByID($_POST['lib_id']);
			$library_type = isset($_POST['type']) ? $_POST['type'] : '';
		
			
			if( $library_type == "54" || $library_type == "55" || $library_type == "56" ) {
				
				if($_SERVER['REQUEST_METHOD']=='POST') {
					$upload_error 	= $err_upload_video = '';
					$files 			= $_FILES;

					// common::pr($files);common::pr( $_POST ); //die;
					
					$s1_alerts_images = $s1_video_uploaded = array();
					if( isset($files['userfile']['name']) && sizeof($files['userfile']['name']) > 0 ) {
						$this->load->library('upload');
						foreach( $files['userfile']['name'] AS $key_img => $val_img ) {
							if( isset($key_img) && !empty($val_img) ) {
								if( "new" == $key_img ) {
									for($cnt_img=0; $cnt_img<sizeof($val_img); $cnt_img++ ) {
										if( $val_img[$cnt_img] ) {
											$_FILES['userfile']['size'] 	= $files['userfile']['size'][$key_img][$cnt_img];
											$_FILES['userfile']['name'] 	= $files['userfile']['name'][$key_img][$cnt_img];
											$_FILES['userfile']['type'] 	= $files['userfile']['type'][$key_img][$cnt_img];
											$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$key_img][$cnt_img];
											$_FILES['userfile']['error'] 	= $files['userfile']['error'][$key_img][$cnt_img];
											
											// Get last inserted paragraph image id //
												$next_imgid 	= $this->parentdb->getLastRowId('tbl_library_images');

											// Delete the existing Image if available //
												if( $alert_img = glob(FCPATH.$this->path_upload_paragraph_images."libimage_".$next_imgid.".*") ) {
													$arr_alert_img = explode("/", $alert_img[0]);
													isset($arr_alert_img[sizeof($arr_alert_img)-1]) ? unlink( FCPATH.$this->path_upload_paragraph_images.$arr_alert_img[sizeof($arr_alert_img)-1] ) : '';
												}

											// Upload the Image //
												$ext_alertimg	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
												$library_imgname 	= "libimage_".$next_imgid.".".$ext_alertimg;
												$this->upload->initialize($this->common->setUploadOptions($this->path_upload_paragraph_images, $library_imgname));
												if( !$this->upload->do_upload() ) {
													echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
												}
												else {
													$data = array('upload_data' => $this->upload->data());
												}
											$arr_ins_library_images = array('library_id'=>$lib_id, 'image'=>$library_imgname, 'date_image_created'=>date('Y-m-d h:i:s'));
											$this->parentdb->manageDatabaseEntry( 'tbl_library_images', 'INSERT', $arr_ins_library_images );
										}
									}									
								}
								else {
									if( $val_img ) {
										$_FILES['userfile']['size'] 	= $files['userfile']['name'][$key_img];
										$_FILES['userfile']['name'] 	= $files['userfile']['name'][$key_img];
										$_FILES['userfile']['type'] 	= $files['userfile']['name'][$key_img];
										$_FILES['userfile']['tmp_name'] = $files['userfile']['name'][$key_img];
										$_FILES['userfile']['error'] 	= $files['userfile']['name'][$key_img];
										
										// Delete the existing Image if available //
											if( $alert_img = glob(FCPATH.$this->path_upload_paragraph_images."libimage_".$key_img.".*") ) {
												$arr_alert_img = explode("/", $alert_img[0]);
												isset($arr_alert_img[sizeof($arr_alert_img)-1]) ? unlink( FCPATH.$this->path_upload_paragraph_images.$arr_alert_img[sizeof($arr_alert_img)-1] ) : '';
											}

										// Upload the Image //
											$ext_alertimg	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
											$library_imgname 	= "libimage_".$key_img.".".$ext_alertimg;
											$this->upload->initialize($this->common->setUploadOptions($this->path_upload_paragraph_images, $library_imgname));
											if( !$this->upload->do_upload() ) {
												echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
											}
											else {
												$data = array('upload_data' => $this->upload->data());
											}
										$arr_upd_library_images 	= array('image'=>$library_imgname);
										$arr_where_library_images 	= array('library_id'=>$lib_id, 'paragraph_image_id'=>$key_img);
										$this->parentdb->manageDatabaseEntry( 'tbl_library_images', 'UPDATE', $arr_upd_library_images, $arr_where_library_images );
									}
								}
							}
						}	
					}

					
					// Videos //
					if( isset($files['alert_videoupd']['name']) && sizeof($files['alert_videoupd']['name']) > 0 ) {
						foreach( $files['alert_videoupd']['name'] AS $key_library_videoupd => $val_alert_videoupd ) {
							if( isset($key_library_videoupd) && !empty($val_alert_videoupd) ) {
								if( "new" == $key_library_videoupd ) {
									for($cnt_vid=0; $cnt_vid<sizeof($val_alert_videoupd); $cnt_vid++ ) {
										if( $val_alert_videoupd[$cnt_vid] ) {
											$_FILES['alert_videoupd']['size'] 	= $files['alert_videoupd']['size'][$key_library_videoupd][$cnt_vid];
											$_FILES['alert_videoupd']['name'] 	= $files['alert_videoupd']['name'][$key_library_videoupd][$cnt_vid];
											$_FILES['alert_videoupd']['type'] 	= $files['alert_videoupd']['type'][$key_library_videoupd][$cnt_vid];
											$_FILES['alert_videoupd']['tmp_name'] = $files['alert_videoupd']['tmp_name'][$key_library_videoupd][$cnt_vid];
											$_FILES['alert_videoupd']['error'] 	= $files['alert_videoupd']['error'][$key_library_videoupd][$cnt_vid];

											// Get last inserted paragraph image id //
												$next_vidid 	= $this->parentdb->getLastRowId('tbl_library_videos');

											// Delete the existing Alert Video if available //
												if( $alert_video = glob(FCPATH.$this->path_upload_paragraph_images."libvideo_".$next_vidid.".*") ) {
													$arr_alert_video = explode("/", $alert_video[0]);
													isset($arr_alert_video[sizeof($arr_alert_video)-1]) ? unlink( FCPATH.$this->path_upload_paragraph_images.$arr_alert_video[sizeof($arr_alert_video)-1] ) : '';
												}
											// Upload the Alert Video //
												$ext_alertvideo	= $this->common->getImagePathInfo( $_FILES['alert_videoupd']['name'], 'extension' );
												$library_videoname= "libvideo_".$next_vidid.".".$ext_alertvideo;
												$config['upload_path']   	= $this->path_upload_paragraph_images;
												$config['allowed_types']	= '*';
												$config['file_name'] 		= $library_videoname;
												$this->load->library('upload', $config);									
												$this->upload->initialize($config);
												if( !$this->upload->do_upload('alert_videoupd') ) {
													echo $err_upload_video = $this->upload->display_errors("<span class='error'>", "</span>");
												}
												else {
													$data = array('upload_data' => $this->upload->data());
												}
												
											// Insert Union Library videos //
												$arr_ins_library_videos = array('library_id'=>$lib_id, 'video'=>$library_videoname, 'date_video_created'=>date('Y-m-d h:i:s'));
												$this->parentdb->manageDatabaseEntry( 'tbl_library_videos', 'INSERT', $arr_ins_library_videos );
										}
									}
								}
								else {
									if( $val_alert_videoupd ) {
										$_FILES['alert_videoupd']['size'] 	= $files['alert_videoupd']['size'][$key_library_videoupd];
										$_FILES['alert_videoupd']['name'] 	= $files['alert_videoupd']['name'][$key_library_videoupd];
										$_FILES['alert_videoupd']['type'] 	= $files['alert_videoupd']['type'][$key_library_videoupd];
										$_FILES['alert_videoupd']['tmp_name'] = $files['alert_videoupd']['tmp_name'][$key_library_videoupd];
										$_FILES['alert_videoupd']['error'] 	= $files['alert_videoupd']['error'][$key_library_videoupd];
										
										// Delete the existing Image if available //
											if( $libvideo = glob(FCPATH.$this->path_upload_paragraph_images."libvideo_".$key_library_videoupd.".*") ) {
												$arr_libvideo = explode("/", $libvideo[0]);
												isset($arr_libvideo[sizeof($arr_libvideo)-1]) ? unlink( FCPATH.$this->path_upload_paragraph_images.$arr_libvideo[sizeof($arr_libvideo)-1] ) : '';
											}

										// Upload the Image //
											$ext_libvideo	= $this->common->getImagePathInfo( $_FILES['alert_videoupd']['name'], 'extension' );
											$library_videoname 	= "libvideo_".$key_library_videoupd.".".$ext_libvideo;
											
											$config['upload_path']   	= $this->path_upload_paragraph_images;
											$config['allowed_types']	= '*';
											$config['file_name'] 		= $library_videoname;
											$this->load->library('upload', $config);									
											$this->upload->initialize($config);
											
											if( !$this->upload->do_upload('alert_videoupd') ) {
												echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
											}
											else {
												$data = array('upload_data' => $this->upload->data());
											}
										$arr_upd_library_videos 	= array('video'=>$library_videoname);
										$arr_where_library_videos 	= array('library_id'=>$lib_id, 'paragraph_video_id'=>$key_library_videoupd);
										$this->parentdb->manageDatabaseEntry( 'tbl_library_videos', 'UPDATE', $arr_upd_library_videos, $arr_where_library_videos );
									}
								}
							}
						}
					}
				}
			}
			// die;
			
			// Update Regualtion details // 
				if( isset($_POST['cmb_regulation_number']) ) {
					$this->parentdb->deleteSection('', 'lib_regulation', $lib_id);
					foreach( $_POST['cmb_regulation_number'] AS $key_reg => $val_reg ) {
						$reg_no 	= isset($_POST['cmb_regulation_number']) ? $_POST['cmb_regulation_number'][$key_reg] : '';
						$section 	= isset($_POST['cmb_section']) ? $_POST['cmb_section'][$key_reg] : '';
						$subsection = isset($_POST['cmb_subsection']) ? $_POST['cmb_subsection'][$key_reg] : '';
						$item 		= isset($_POST['cmb_item']) ? $_POST['cmb_item'][$key_reg] : '';
						$subitem 	= isset($_POST['cmb_subitem']) ? $_POST['cmb_subitem'][$key_reg] : '';
						
						$arr_upd_libreg = array('in_library_id' 		=> $lib_id, 
												'st_regulation_number'	=> $reg_no,
												'st_section' 			=> $section,
												'st_subsection' 		=> $subsection,
												'st_item' 				=> $item,
												'st_subitem' 			=> $subitem);
						$arr_where_libreg = array('in_library_id="'.$lib_id.'"');
						$this->parentdb->manageDatabaseEntry('tbl_library_regulation', 'INSERT', $arr_upd_libreg);
					}
				}
				
			// Update Investigation date, when library type is Investigation
				if( '6' == $library_type ) {
					// Get Investigation Number from Library Id
						$investigation_id = $this->users->getMetaDataList( 'inv_investigation', 'in_library_id="'.$lib_id.'"','','in_investigation_id' );
						$investigation_id = $investigation_id[0]['in_investigation_id'];

					$arr_update = array( 'date_investigation_updated' 	=> date('Y-m-d h:i:s') );
					$arr_where 	= array( 'in_investigation_id' 			=> $investigation_id );
					$this->parentdb->manageDatabaseEntry('tbl_inv_investigation', 'UPDATE', $arr_update, $arr_where);
				}
				
			// Add library campus //
				if( isset($_POST['cmb_library_campus'][0]) && $_POST['cmb_library_campus'][0] ) {
					$this->parentdb->deleteSection( '', 'library_campus', $lib_id );
					foreach( $_POST['cmb_library_campus'] AS $val_post_campus ) {
						$val_post_campus= trim($val_post_campus);
						$arr_insert = array( 'st_campus_name' => $val_post_campus, 'in_library_id' => $lib_id, 'in_library_type_id' => $library_type  );
						$this->parentdb->manageDatabaseEntry('tbl_library_campus', 'INSERT', $arr_insert );
					}
				}
            redirect($this->base.'admin/library');
        }
		$data['libid'] = $lib_id;
        $this->load->view('update_library', $data); 
    }
	
	
    
    function library_pages()
	{
        $data 			= $this->commonHead();
        $cp 			= isset($_GET['page'])?(int)$_GET['page']:1;
        $data['page'] 	= $this->libraries->getPageByPageNumber((int)$_GET['lib'], $cp);
		$data['pages'] 	= $this->libraries->getTotalPageNumber((int)$_GET['lib']);
		$library_type_id = $this->users->getMetaDataList('library','library_id="'.(int)$_GET['lib'].'"','','library_type_id');
		$data['library_type_id'] = isset($library_type_id[0]['library_type_id']) ? $library_type_id[0]['library_type_id'] : '';
        $this->load->view('library_pages', $data); 
    }

    function update_library_page()
	{
		$this->_security();
        $data = $this->commonHead();
		$data['page'] = $this->libraries->getPageByPageID( (int)$_GET['pid'], (int)$_GET['prid'] );

		// Get library type id
			$library_type_id = $this->users->getMetaDataList('library','library_id="'.(int)$_GET['lib'].'"','','library_type_id');
			$library_type_id = $data['library_type_id'] = isset($library_type_id[0]['library_type_id']) ? $library_type_id[0]['library_type_id'] : '';

		$arr_not_desc 	 = array(1,3,54,55,56);
		$data['show_desc']	 = (in_array($library_type_id, $arr_not_desc)) ? '1' : '';

		if($_SERVER['REQUEST_METHOD']=='POST'){
			$targetPath = $this->path_upload_paragraph_images;
            $ret_files 	= $this->paragraphFileUpload('userfile', $targetPath);
			// common::pr( $ret_files );die;
			
            $this->libraries->updatePageByID( $_POST['lib_id'], $_POST['page_id'], (int)$_GET['prid'], $ret_files );
			redirect($this->base.'admin/library_pages?lib='.$data['page'][0]['library_id'].'&page='.(int)$_GET['pgnumber']);
        }
        
        $this->load->view('update_library_page', $data);
    }

    function delete_library_page(){
        $this->libraries->deletePageByPageID($_POST['lid'], $_POST['pid']);
        echo 1;
    }

	// START - Inspection //
		function add_inspection()
		{
			$this->_security();
			$data 		= $this->commonHead();
			$is_custom 	= isset($_GET['custom']) ? $_GET['custom'] : '';

			if( 1 == $is_custom ) {
				$param 				= 'custom='.$is_custom;
				$targetPath 		= $this->path_upload_custom_inspections;
				$table				= 'tbl_custom_inspection';
			}
			else {
				$param 				= '';
				$targetPath 		= $this->path_upload_inspections;
				$table				= 'tbl_inspection';
			}
			$data['param'] 			= $param;

			if( $_SERVER['REQUEST_METHOD']=='POST') {
				// common::pr( $_POST );die;
				$ret_files 			= $this->singleFileUpload('userfile', $targetPath);
				$this->inspection->addInspection( $table, $ret_files, $is_custom );
				redirect($this->base.'admin/inspection?'.$param);
			}
			$this->load->view('new_inspection', $data);
		}
		
		function update_inspection()
		{
			$this->_security();
			$data 			= $this->commonHead();
			$inspection_id 	= $data['get_inspection_id'] = isset($_GET['id']) ? $_GET['id'] : '';
			$is_custom 		= isset($_GET['custom']) ? $_GET['custom'] : '';
			
			if( 1 == $is_custom ) {
				$row_inspections 				= $this->users->getMetaDataList('inspection', 'status=1 AND (date_inspection_end="0000-00-00" OR date_inspection_end>=CURDATE())', 'ORDER BY TRIM(st_inspection_name)', 'id,st_inspection_name');
				$data['row_inspections']		= $row_inspections;
				$row_assigned_inspections 		= $this->users->getMetaDataList('custom_inspection_links','in_custom_inspection_id="'.$inspection_id.'"','',' in_inspection_id');
				$arr_assigned_inspections		= array();
				foreach( $row_assigned_inspections AS $value ) {
					array_push($arr_assigned_inspections,$value['in_inspection_id']);
				}
				$data['arr_assigned_inspections']= $arr_assigned_inspections;
				
				$field_inspection_name 	= "st_custom_inspection_name";
				$data['list'] 		= $this->parentdb->getDatabaseRows( 'tbl_custom_inspection', '*', array('id'=>$inspection_id) );
				$param 				= 'custom='.$is_custom;
				$targetPath 		= $this->path_upload_custom_inspections;
				$table				= 'custom_inspection';
			}
			else {
				$field_inspection_name = "st_inspection_name";
				$data['list'] 		= $this->parentdb->getDatabaseRows( 'tbl_inspection', '*', array('id'=>$inspection_id) );
				$param 				= '';
				$targetPath 		= $this->path_upload_inspections;
				$table				= 'inspection';
			}
			$data['rows_insp_items'] = $this->inspection->getInspectionItems('id,st_item_name,tinspitem.in_inspection_id,st_regulation_number,st_section,st_subsection,st_item,st_subitem', $inspection_id, $is_custom);
			// common::pr( $data['rows_insp_items'] );

			$data['param'] 			= $param;
			$data['field_inspection_name'] = $field_inspection_name;

			if( $_SERVER['REQUEST_METHOD']=='POST') {
				// common::pr( $_POST );die;
				$ret_files 			= $this->singleFileUpload('userfile', $targetPath);
				$this->inspection->updateInspectionByID($table, $inspection_id, $ret_files, $is_custom );
				redirect($this->base.'admin/inspection?'.$param);die;
			}
			$this->load->view('update_inspection', $data);
		}
	
		function inspection()
		{
			$this->_security();
			$data 				= $this->commonHead();
			$numbers_per_page 	= 20;
			$paged 				= isset($_GET['page'])?(int)$_GET['page']:1;
			$paged--;
			
			$is_custom 	= $data['is_custom'] = isset($_GET['custom']) ? $_GET['custom'] : '';
		
			$where_inspection = array();
			
			if( 1 == $is_custom ) {
				$field_inspection_name = $data['field_inspection_name'] = "st_custom_inspection_name";
				$insp_tbl_name 		= "tbl_custom_inspection";
				$param 					= 'custom='.$is_custom;
			}
			else {
				$field_inspection_name = $data['field_inspection_name'] = "st_inspection_name";
				$insp_tbl_name 		= "tbl_inspection";
				$param 					= '';
			}
			
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				$where_inspection['st_language'] 	= $this->input->post('language');
				$where_inspection['status'] 		= $this->input->post('status');
				$where_inspection['like'][$field_inspection_name] 	= $this->input->post('name');
			}
			$data['list'] 	= $this->parentdb->getDatabaseRows($insp_tbl_name, '*', $where_inspection, 'TRIM('.$field_inspection_name.')', $numbers_per_page,$paged );
			$data['pages'] 	= $this->parentdb->getDatabaseRows($insp_tbl_name, '*', $where_inspection, '', $numbers_per_page, '', 1);

			$data['param'] 		= $param;
			$data['field_inspection_name'] = $field_inspection_name;

			$this->load->view('inspection_view', $data);
		}

		function inspection_items()
		{
			$this->_security();
			$data 				= $this->commonHead();
			$numbers_per_page 	= 20;
			$paged 				= isset($_GET['page'])?(int)$_GET['page']:1;
			$paged--;

			$is_custom 			= $data['is_custom'] = isset($_GET['custom']) ? $_GET['custom'] : '';
			$inspection_id 		= $data['inspection_id'] = isset($_GET['id'])?(int)$_GET['id']:'';

			if( 1 == $is_custom ) {
				$field_inspection_name 	= "st_custom_inspection_name";
				$insp_tbl_name 			= "tbl_custom_inspection";
				$where_insp_items 		= array('in_inspection_id'=>$inspection_id, 'is_custom_inspection'=>1);
				$param 					= 'custom='.$is_custom;
			}
			else {
				$field_inspection_name 	= "st_inspection_name";
				$insp_tbl_name 			= "tbl_inspection";
				$where_insp_items 		= array('in_inspection_id'=>$inspection_id);
				$param 					= '';
			}

			$inspection_name = $this->users->getElementByID($insp_tbl_name, $inspection_id, $field_inspection_name);
			$inspection_name = $data['inspection_name'] = isset($inspection_name[$field_inspection_name]) ? $inspection_name[$field_inspection_name] : '';

			$data['list'] 	= $this->parentdb->getDatabaseRows('tbl_inspection_item_regulation','*',$where_insp_items, '', $numbers_per_page,$paged);
			$data['pages'] 	= $this->parentdb->getDatabaseRows('tbl_inspection_item_regulation','*',$where_insp_items, '', $numbers_per_page,'',1);

			$data['param'] 		= $param;
			$this->load->view('inspection_item_view', $data);
		}
		
		function addCustomInspection()
		{
			session_start();
			!isset($_SESSION['normal_inspections']) ? $_SESSION['normal_inspections'] = array() : '';
			!isset($_SESSION['customized_inspections']) ? $_SESSION['customized_inspections'] = array() : '';
			!isset($_SESSION['all_inspections']) ? $_SESSION['all_inspections'] = array() : '';
			
			$data 			= $this->commonHead();
			$inspection_id 	= (int)($_POST['id']) ? array($_POST['id']) : json_decode($_POST['id']);
			$inspection_type= $_POST['inspection_type'];
			
			foreach( $inspection_id AS $val_inspection_id ) {
				if( 'customized' == $inspection_type ) {
					$class 			= "half-library";
					$ret_inspections= $this->users->getElementByID('tbl_custom_inspection', $val_inspection_id, 'st_custom_inspection_name AS inspection_name, st_icon_path, in_credits_buy AS credits, in_earning_points AS points');

					if( !in_array($val_inspection_id, $_SESSION['customized_inspections']) ) {
						array_push($_SESSION['customized_inspections'], $_POST['id']);
					}
					?>
					<a href="#" rel="" id=""  class="tile <?php echo $class;?> half-opacity bg-darker add_to_cart select_custom_inspection description" data-toggle="popover" data-content="" data-original-title="" data-placement="bottom" data-trigger="hover">
					
					<?php 
					if( isset($ret_inspections['st_icon_path']) && $ret_inspections['st_icon_path'] ) {?>
						<img class="drag_img" style="position: absolute;left: 0px;" src="<?php echo $ret_inspections['st_icon_path'];?>" >
					<?php }
					else {?>
						<img class="drag_img" style="position: absolute;left:0px;" src="<?php echo $this->base.$this->path_img_library."inspections.png";?>">
					<?php 
					}?>
					
					<span class="fg-white" style="position:absolute;left:50px;margin-top:5px;"><small><?php echo $ret_inspections['inspection_name']; ?></small></span>
					<div class="brand">                                              
						<span class="label fg-white text-center">&nbsp;
							<small>
								<i ><img  class="drag_credits_points"  src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;
								<?php echo $ret_inspections['credits'];?>&nbsp;
								<i ><img class="drag_credits_points"  src="<?php echo $this->base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;
								<?php echo $ret_inspections['points'];?>
							</small>
						</span>
					</div>
					</a>
					<?php 
					
					$ret_insp_custom= $this->users->getMetaDataList('custom_inspection_links', 'in_custom_inspection_id="'.$val_inspection_id.'"', '', 'in_inspection_id');
					foreach( $ret_insp_custom AS $key_insp_cusom => $val_insp_custom ) {
						if( !in_array($val_insp_custom['in_inspection_id'], $_SESSION['all_inspections']) ) {
							array_push( $_SESSION['all_inspections'], $val_insp_custom['in_inspection_id'] );
						}
					}				
				}
				else if( 'normal' == $inspection_type ) {
					$class 			= "half-library";
					$ret_inspections= $this->users->getElementByID('tbl_inspection', $val_inspection_id, 'st_inspection_name AS inspection_name, st_icon_path, in_credits_buy AS credits, in_earning_points AS points');
				
					if( !in_array($val_inspection_id,$_SESSION['normal_inspections']) ) {
						array_push($_SESSION['normal_inspections'], $val_inspection_id);
					}?>
					
					<a href="#" rel="" id="" class="tile <?php echo $class;?> half-opacity bg-darker add_to_cart select_custom_inspection description" data-toggle="popover" data-content="" data-original-title="" data-placement="bottom" data-trigger="hover">
					<?php 
					if( isset($ret_inspections['st_icon_path']) && $ret_inspections['st_icon_path'] ) {?>
						<img class="w50 drag_img" style="position: absolute;left: 0px;" src="<?php echo $ret_inspections['st_icon_path'];?>" >
					<?php }
					else {?>
						<img class="w50 drag_img" style="position: absolute;left:0px;" src="<?php echo $this->base.$this->path_img_library."inspections.png";?>">
					<?php 
					}?>
					
					<span class="fg-white" style="position:absolute;left:45px;margin-top:5px;"><small><?php echo substr($ret_inspections['inspection_name'],0,18)."..." ; ?></small></span>
					<div class="brand">
						<span class="label fg-white text-center">&nbsp;
							<small>
								<i><img class="drag_credits_points" src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;
								<?php echo $ret_inspections['credits'];?>&nbsp;
								<i><img class="drag_credits_points" src="<?php echo $this->base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;
								<?php echo $ret_inspections['points'];?>
							</small>
						</span>
					</div>
					</a>
					<?php 
					if( !in_array($val_inspection_id, $_SESSION['all_inspections']) ) {
						array_push( $_SESSION['all_inspections'], $val_inspection_id );
					}
				}
			}
		}

		function resetCustomInspBox()
		{
			session_start();
			unset($_SESSION['all_inspections'], $_SESSION['normal_inspections'], $_SESSION['customized_inspections']);
		}
	// END - Inspection //
	

	// START - Safetytalks //
		function add_safetytalks()
		{
			$this->_security();
			$data 		= $this->commonHead();
			$is_custom 	= isset($_GET['custom']) ? $_GET['custom'] : '';
			$data['is_custom'] = $is_custom;

			if( 1 == $is_custom ) {
				$param 				= 'custom='.$is_custom;
				$targetPath 		= $this->path_upload_custom_safetytalks;
				$table				= 'tbl_custom_safetytalks';
			}
			else {
				$param 				= '';
				$targetPath 		= $this->path_upload_safetytalks;
				$table				= 'tbl_safetytalks';
			}
			$data['param'] 			= $param;

			if( $_SERVER['REQUEST_METHOD']=='POST') {
				$this->load->library('upload');
				
				$ret_files 			= $this->singleFileUpload('userfile', $targetPath);
				$this->safetytalks->addSafetytalks( $table, $ret_files, $is_custom );
				redirect($this->base.'admin/safetytalks?'.$param);
			}
			$this->load->view('new_safetytalks', $data);
		}
		
		function update_safetytalks()
		{
			$this->_security();
			$data 			= $this->commonHead();
			$safetytalks_id = $data['get_safetytalks_id'] = isset($_GET['id']) ? $_GET['id'] : '';
			$is_custom 		= isset($_GET['custom']) ? $_GET['custom'] : '';
			$data['is_custom'] = $is_custom;
			
			if( 1 == $is_custom ) {
				$row_safetytalks = $data['row_safetytalks'] = $this->users->getMetaDataList('safetytalks','status=1 AND (date_safetytalks_end="0000-00-00" OR date_safetytalks_end>=CURDATE())','ORDER BY TRIM(st_safetytalks_topic)',' id,st_safetytalks_topic');
				$row_assigned_inspections 		= $this->users->getMetaDataList('custom_safetytalks_links','in_custom_safetytalks_id="'.$safetytalks_id.'"','',' in_safetytalks_id');
				$arr_assigned_safetytalks		= array();
				foreach( $row_assigned_inspections AS $value ) {
					array_push($arr_assigned_safetytalks,$value['in_safetytalks_id']);
				}
				$data['arr_assigned_safetytalks']= $arr_assigned_safetytalks;
				
				$field_safetytalks_name 	= "st_custom_safetytalks_name";
				$data['list'] 		= $this->parentdb->getDatabaseRows('tbl_custom_safetytalks', '*', array('id'=>$safetytalks_id));
				$param 				= 'custom='.$is_custom;
				$targetPath 		= $this->path_upload_custom_safetytalks;
				$tbl_name				= 'custom_safetytalks';
			}
			else {
				$field_safetytalks_name = "st_safetytalks_topic";
				$data['list'] 		= $this->parentdb->getDatabaseRows('tbl_safetytalks', '*', array('id'=>$safetytalks_id));
				$param 				= '';
				$targetPath 		= $this->path_upload_safetytalks;
				$tbl_name				= 'safetytalks';
			}
			$data['rows_safety_items']	= $this->users->getMetaDataList( 'safetytalks_items', 'in_safetytalks_id="'.$safetytalks_id.'"', '', '*' );

			$data['param'] 			= $param;
			$data['field_safetytalks_name'] = $field_safetytalks_name;
			
			if( $_SERVER['REQUEST_METHOD']=='POST') {
				$this->load->library('upload');
				
				$ret_files 			= $this->singleFileUpload('userfile', $targetPath);
				$this->safetytalks->updateSafetytalksByID($tbl_name, $safetytalks_id, $ret_files, $is_custom );

				redirect($this->base.'admin/safetytalks?'.$param);
			}
			$this->load->view('update_safetytalks', $data);
		}

		// S1 new procedure by admin
			function s1_new_procedure_by_admin()
			{
				// Add new procedure by Admin //
					$arr_ins_userproc 	= array('st_procedure_name'=>"My New Procedure", 'in_created_by'=>$this->sess_userid, 'status'=>'1');
					$procedure_id 		= $this->parentdb->manageDatabaseEntry('tbl_procedures', 'INSERT', $arr_ins_userproc);

				// Add free procedure into the mylibrary which is created Admin // 
					$procedure_price= $this->users->getMetaDataList('price_settings', 'price_settingsname="s1procedures"', '', "in_price, in_points, in_credits");
					$price 		= (isset($procedure_price[0]['in_price'])&&$procedure_price[0]['in_price']) ? $procedure_price[0]['in_price'] : '0';
					$points 	= (isset($procedure_price[0]['in_points'])&&$procedure_price[0]['in_points']) ? $procedure_price[0]['in_points'] : '0';
					$credits 	= (isset($procedure_price[0]['in_credits'])&&$procedure_price[0]['in_credits']) ? $procedure_price[0]['in_credits'] : '0';
					$arr_ins_mylibrary 	= array( 'user_id'=>$this->sess_userid, 'lib_id'=>$procedure_id, 'st_libtype_bought'=>'s1procedures', 
												 'lib_title'=>"My New Procedure", 'qty_ordered'=>'1','unit_price'=>$price, 'date_bought'=>date('Y-m-d h:i:s'),
												 'transaction_id'=>'admin','transaction_type'=>'moneris', 'credits'=>$points, 'creditsbuy'=>$credits);
					$this->parentdb->manageDatabaseEntry('tbl_my_library', 'INSERT', $arr_ins_mylibrary);

					redirect($this->base.'admin/mylibrary_procedures_metro');
			}

		// Start - Admin settings->Procedures //
			function procedures()
			{
				$this->_security();
				$data 			= $this->commonHead();
				$procedure_id 	= $data['procedure_id'] = isset($_GET['id']) ? (int)$_GET['id'] : '';

				if( (int)$procedure_id ) {
					$rows_procedures = $this->parentdb->getDatabaseRows('tbl_procedures', '*', array('id'=>$procedure_id));
					$rows_procedures = $data['rows_procedures']= isset($rows_procedures[0]) ? $rows_procedures[0] : array();
					$proc_created_by = $rows_procedures['in_created_by'];
				}
				else {
					$proc_created_by = $this->sess_userid;
				}
				$rows_username = $this->users->getMetaDataList('user', 'id="'.$proc_created_by.'"', '', 'CONCAT(firstname," ",lastname) AS username');
				if( isset($rows_username[0]['username'])&&$rows_username[0]['username'] ) {
					$procedure_type = 'new_procedure';
					$redirect_url 	= $this->base."admin/mylibrary_procedures_metro?id=".$procedure_id."&type=".$procedure_type;
				}
				else {
					$procedure_type = 's1procedures';
					$redirect_url 	= $this->base."admin/mylibrary_procedures_metro?id=".$procedure_id."&type=".$procedure_type;
				}

				if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
					$arr_userproc 	= array( 'st_procedure_name'=>$_POST['txt_procedure_name'], 'in_related_glossary'=>$_POST['cmb_related_glossary'], 
											'st_language'=>$_POST['cmb_language'], 
											'in_created_by' => $proc_created_by, 'st_procedure_status'=>'inprogress', 'status'=>$_POST['rdb_status'] );
					if( (int)$procedure_id ) { // EDIT PROCEDURE //
						$arr_where_userproc = array( 'id'=>$procedure_id );
						$this->parentdb->manageDatabaseEntry('tbl_procedures', 'UPDATE', $arr_userproc, $arr_where_userproc);

						$arr_upd_mylibrary 	= array( 'lib_title'=>$_POST['txt_procedure_name'] );
						$arr_where_mylibrary= array( 'user_id'=>$proc_created_by, 'lib_id'=>$procedure_id, 'st_libtype_bought'=>$procedure_type );
						$this->parentdb->manageDatabaseEntry('tbl_my_library', 'UPDATE', $arr_upd_mylibrary, $arr_where_mylibrary);
						
						// Update purpose title // 
							$arr_upd_purpose 	= array( 'st_purpose_title' => $_POST['txt_procedure_name'] );
							$arr_where_purpose= array( 'in_created_by' => $proc_created_by, 'in_procedure_id'=>$procedure_id );
							$this->parentdb->manageDatabaseEntry('tbl_proc_purpose', 'UPDATE', $arr_upd_purpose, $arr_where_purpose);
					}
					else { // ADD NEW PROCEDURE //
						$procedure_id = $this->parentdb->manageDatabaseEntry('tbl_procedures', 'INSERT', $arr_userproc);
						
						// Add free procedure into the mylibrary which is created Admin // 
							$procedure_price= $this->users->getMetaDataList('price_settings', 'price_settingsname="s1procedures"', '', "in_price, in_points, in_credits");
							$price 		= (isset($procedure_price[0]['in_price'])&&$procedure_price[0]['in_price']) ? $procedure_price[0]['in_price'] : '0';
							$points 	= (isset($procedure_price[0]['in_points'])&&$procedure_price[0]['in_points']) ? $procedure_price[0]['in_points'] : '0';
							$credits 	= (isset($procedure_price[0]['in_credits'])&&$procedure_price[0]['in_credits']) ? $procedure_price[0]['in_credits'] : '0';

							$arr_ins_mylibrary 	= array( 'user_id'=>$proc_created_by, 'lib_id'=>$procedure_id, 'st_libtype_bought'=>'s1procedures', 
														'lib_title'=>$_POST['txt_procedure_name'], 'qty_ordered'=>'1','unit_price'=>$price, 'date_bought'=>date('Y-m-d h:i:s'),
														'transaction_id'=>'admin','transaction_type'=>'moneris', 'credits'=>$points, 'creditsbuy'=>$credits);
							$this->parentdb->manageDatabaseEntry('tbl_my_library', 'INSERT', $arr_ins_mylibrary);

						// Add purpose title // 
							$arr_ins_purpose 	= array( 'st_purpose_title' => $_POST['txt_procedure_name'], 'in_created_by' => $proc_created_by, 
														 'dt_purpose_date' => date('Y-m-d'), 'in_procedure_id'=>$procedure_id );
							$this->parentdb->manageDatabaseEntry('tbl_proc_purpose', 'INSERT', $arr_ins_purpose );
					}
					
					redirect( $redirect_url );
				}

				$this->load->view('procedures', $data);

				/*// Add new procedure by Admin //
					$arr_ins_userproc 	= array('st_procedure_name'=>"My New Procedure", 'in_created_by'=>$this->sess_userid, 'status'=>'1');
					$id = $this->parentdb->manageDatabaseEntry('tbl_procedures', 'INSERT', $arr_ins_userproc);
					redirect($this->base.'admin/mylibrary_procedures_metro');
				*/
			}
			
			
			function procedures_view()
			{
				$this->_security();
				$data = $this->commonHead();

				$where_arr = '1';
				if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
					strlen($_POST['cmb_status']) ? $where_arr .= ' AND status = "'.$_POST['cmb_status'].'"' : '';
					($_POST['txt_procedure_name']) ? $where_arr .= ' AND (st_procedure_name LIKE "%'.$_POST['txt_procedure_name'].'%")' : '';
				}
				$rows_new_procedures = $this->users->getMetaDataList('procedures', $where_arr, 'ORDER BY st_procedure_name', 
												'id, st_procedure_name, st_language, in_created_by, dt_date_start, dt_date_end, status, "New Procedures" AS library_type, st_procedure_status ');
				$data['rows_procedures']= $rows_new_procedures;
				$this->load->view('procedures_view', $data);
			}
		// End - Admin settings->Procedures //
		
		function safetytalks()
		{
			$this->_security();
			$data 				= $this->commonHead();
			$numbers_per_page 	= 20;
			$paged 				= isset($_GET['page'])?(int)$_GET['page']:1;
			$paged--;
			
			$where_safetytalks 	= array();			
			$is_custom 	= $data['is_custom'] = isset($_GET['custom']) ? $_GET['custom'] : '';

			if( 1 == $is_custom ) {
				$field_safetytalks_name = $data['field_safetytalks_name'] = "st_custom_safetytalks_name";
				$safety_tbl_name 		= "tbl_custom_safetytalks";
				$param 					= 'custom='.$is_custom;
			}
			else {
				$field_safetytalks_name = $data['field_safetytalks_name'] = "st_safetytalks_topic";
				$safety_tbl_name 		= "tbl_safetytalks";
				$param 					= '';
			}
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				$where_safetytalks['st_language'] 	= $this->input->post('language');
				$where_safetytalks['status'] 		= $this->input->post('status');
				$where_safetytalks['like'][$field_safetytalks_name] 	= $this->input->post('name');
			}
			$data['list'] 	= $this->parentdb->getDatabaseRows($safety_tbl_name,'*', $where_safetytalks, 'TRIM('.$field_safetytalks_name.')',$numbers_per_page, $paged, '' );
			$data['pages'] 	= $this->parentdb->getDatabaseRows($safety_tbl_name,'*', $where_safetytalks, '', $numbers_per_page,'',1);
			$data['param'] 	= $param;

			$this->load->view('safetytalks_view', $data);
		}
		
		function safetytalks_items()
		{
			$this->_security();
			$data 				= $this->commonHead();
			$numbers_per_page 	= 20;
			$paged 				= isset($_GET['page'])?(int)$_GET['page']:1;
			$paged--;
			$where_safety_items = array();
			
			$is_custom 			= $data['is_custom'] = isset($_GET['custom']) ? $_GET['custom'] : '';
			$safetytalks_id 	= $data['safetytalks_id'] = isset($_GET['id'])?(int)$_GET['id']:'';

			if( 1 == $is_custom ) {
				$field_safetytalks_name = $data['field_safetytalks_name'] = "st_custom_safetytalks_name";
				$safety_tbl_name 		= "tbl_custom_safetytalks";
				$param 					= 'custom='.$is_custom;
				$where_safetyitems		= array( 'in_safetytalks_id' => $safetytalks_id );
			}
			else {
				$field_safetytalks_name = $data['field_safetytalks_name'] = "st_safetytalks_topic";
				$safety_tbl_name 		= "tbl_safetytalks";
				$param 					= '';
				$where_safetyitems		= array( 'in_safetytalks_id' => $safetytalks_id );
			}

			$safetytalks_name= $this->users->getElementByID( $safety_tbl_name, $safetytalks_id, $field_safetytalks_name );
			$safetytalks_name = $data['safetytalks_name'] = isset($safetytalks_name[$field_safetytalks_name]) ? $safetytalks_name[$field_safetytalks_name] : '';
			
			$data['list'] 	= $this->parentdb->getDatabaseRows('tbl_safetytalks_items','*',$where_safetyitems, 'TRIM(st_item_name)',$numbers_per_page,$paged);
			$data['pages'] 	= $this->parentdb->getDatabaseRows('tbl_safetytalks_items','*', $where_safetyitems, '',$numbers_per_page,'',1);
			
			$data['param'] 		= $param;
			$this->load->view('safetytalks_item_view', $data);
		}
	// END - Safetytalks //	
	
	
	
	

	  /****** Full page Open Investigation cover page ******/
		function cover_page_investigation()
		{
			$data 			= $this->commonHead();
			$data['module'] = "dashboard";
			$data['display_msg']	= "Please enter search criteria to get the data.";
			
			$data['clientid'] = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';
			
			$this->load->view('cover_page_investigation', $data); 
		}


		/****** Full page Open Investigation page ******/
		function investigation_page()
		{
			$data 				= $this->commonHead();
			$data['module'] 	= "dashboard";
			$data['form_msg'] 	= '';
			
			$inv_form_id = isset($_GET['invformid'])&&(int)$_GET['invformid'] ? $_GET['invformid'] : '';
			
			$data['clientid'] = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';
			
			if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
				if( isset($_POST['btn_get_pdf']) && $_POST['btn_get_pdf'] ) {
					// //
				}
				else {
					$inv_status 	= isset($_GET['inv_status'])&&$_GET['inv_status'] ? $_GET['inv_status'] : '';
					$inv_status 	= isset($_GET['inv_status'])&&$_GET['inv_status'] ? $_GET['inv_status'] : '';
					if( "seal" == $inv_status ) {
						$this->investigation->sealInvestigation($inv_form_id);
					}
					$ret_investigation 	= Ajax::ajaxAddInvestigation();
					$data['form_msg'] 	= $ret_investigation;
				}
			}
			$this->load->view('investigation_page', $data);
		}
		
    /****** Administrator ***/
	public function metadata()
	{
	    $this->_security();
        $data = $this->commonHead();
        $meta = (isset($_GET['type']) && !empty($_GET['type'])) ? $_GET['type'] : 'administrator';

		$order_by 	= '';
		$where 		= '1';
		if( "user" == $meta ) {
			$where = " status = 0";
			$order_by = " ORDER BY TRIM(firstname),TRIM(email_addr),TRIM(date_created)";
		}
		("points_level" == $meta ) ? $order_by = " ORDER BY TRIM(in_level)" : '';
		("badge" == $meta ) ? $order_by = " ORDER BY TRIM(st_badge_title)" : '';

		if( "regulation_sections" == $meta ) {
			$reggroupid = (isset($_GET['reggroupid']) && !empty($_GET['reggroupid'])) ? $_GET['reggroupid'] : '';
			$where = " in_regulation_content_id = '".$reggroupid."'";
			
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				($_POST['txt_reg_section']) ? $where .= " AND st_section LIKE '%".$_POST['txt_reg_section']."%'" : '';
				($_POST['txt_reg_subsection']) ? $where .= " AND st_subsection LIKE '%".$_POST['txt_reg_subsection']."%'" : '';
				($_POST['txt_reg_item']) ? $where .= " AND st_item LIKE '%".$_POST['txt_reg_item']."%'" : '';
				($_POST['txt_reg_subitem']) ? $where .= " AND st_subitem LIKE '%".$_POST['txt_reg_subitem']."%'" : '';
			}
			$order_by = " ORDER BY CAST(SUBSTRING(st_section,LOCATE(' ',st_section)+1) AS SIGNED), SUBSTRING(st_section,-1), 
						  CAST(SUBSTRING(st_subsection,LOCATE(' ',st_subsection)+1) AS SIGNED), SUBSTRING(st_subsection,-1), st_item, st_subitem";
		}
		if( "alerts" == $meta ) {
			$where .= " AND in_hazard_alert_created_by = '".$this->sess_userid."'";
		}
		if( "regulation_contents" == $meta ) {
			$order_by = " ORDER BY id Desc ";

			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				($_POST['cmb_parent_regulation']) ? $where .= " AND in_parent_regulation_id='".$_POST['cmb_parent_regulation']."'" : '';
				($_POST['txt_reg_number']) ? $where .= " AND st_regulation_number LIKE '%".$_POST['txt_reg_number']."%'" : '';
				($_POST['txt_reg_title']) ? $where .= " AND st_title LIKE '%".$_POST['txt_reg_title']."%'" : '';
				($_POST['txt_reg_part']) ? $where .= " AND st_part LIKE '%".$_POST['txt_reg_part']."%'" : '';
				($_POST['txt_reg_subpart']) ? $where .= " AND st_subpart LIKE '%".$_POST['txt_reg_subpart']."%'" : '';
			}
		}
		
        if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
            if(!isset($_POST['searchfor'])) {
                if(!empty($_POST['searchby'])) {
                    $data['list'] = $this->users->searchMetaDataList($meta, $_POST['searchby'], $_POST['searchval']);
				}
                else {
                    $data['list'] = $this->users->getMetaDataList($meta, $where, $order_by);
				}
			}
            else {
                switch($_POST['searchfor']){
                    case 'section':
                        $data['list'] = $this->adminsettings->searchSectorsDataList();
                        break;
                    case 'province':
                        $data['list'] = $this->adminsettings->searchProvinceDataList();
                        break;  
                    case 'trade':
                        $data['list'] = $this->adminsettings->searchTradeDataList();
                        break;
                    case 'city':
                        $data['list'] = $this->adminsettings->searchCityDataList();
                        break;                                                                     
                }
            }
        }
		else {
			$data['list'] = $this->users->getMetaDataList($meta, $where, $order_by);
		}
		
		// common::pr($data['list']);
		$this->load->view($meta.'_view', $data);
	}
        
        function users_s1_public_page()
		{
            $this->_security();
            $data = $this->commonHead();     
            $where_users = '';$txt_username="";$txt_usertype="";$get_name="";$get_usertype="";$utcparam = "";
            $get_name 	  = isset($_GET['name']) ? $_GET['name'] : "";
            $get_usertype = isset($_GET['usertype']) ? $_GET['usertype'] : "";
            if(isset($_POST["actionType"]) && $_POST["actionType"] == "")
            {
                $get_name = "";
                $get_usertype ="";
            }
            $txt_username 	= $data['filter_name'] = ($this->input->post('txt_username') != "") ? $this->input->post('txt_username') : $get_name;
            $txt_usertype 	= $data['filter_type'] = ($this->input->post('cmb_usertype') != "") ? $this->input->post('cmb_usertype') : $get_usertype;                       
            if(($txt_usertype != "" && $txt_username != "" && $txt_usertype != "utc") ) {
                $where_users = " AND type_id = ".$txt_usertype." AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";
            }
            else if(($txt_usertype == "" && $txt_username != "" && $txt_usertype != "utc" )  ){
                $txt_usertype = "(7,8,12)";
                $where_users = " AND type_id IN ".$txt_usertype." AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";
            }
			else if(($txt_usertype != "" && $txt_username == "" && $txt_usertype != "utc")){
                $where_users = " AND type_id = ".$txt_usertype;
            }
            else if($txt_usertype != "utc"){                
                $txt_usertype = "(7,8,12)";
                $where_users = " AND type_id IN ".$txt_usertype;
            }   
            if($txt_usertype == "utc" && $txt_username != ""){
               $type = "7";$utcparam="1";
               $where_users = " AND type_id = ".$type." AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";  
            }else if($txt_usertype == "utc" && $txt_username == ""){
                $type = "7";$utcparam="1";
                $where_users = " AND type_id = ".$type;  
            }            
            $data['list'] = $this->users->getUsersWithPublicPage($where_users,$utcparam);
            if($get_name != "" && $get_usertype != "" ){
                $data['filter_name'] = $get_name;
                $data['filter_type'] = $get_usertype;                
            }else if($get_name != "" && $get_usertype == ""){
                $data['filter_name'] = $get_name;                
            }else if ($get_name == "" && $get_usertype != ""){
                $data['filter_type'] = $get_usertype;                
            }
            $this->load->view('users_s1_public_page_view', $data);            
        }
		
		
        function change_public_pages_status(){
            if("POST" == $_SERVER['REQUEST_METHOD'] &&  $_POST["actionType"] != "" && isset($_POST["access"]) &&  count($_POST["access"] > 0)){
                $txt_username 	= $this->input->post('txt_username');
                $txt_usertype 	= $this->input->post('cmb_usertype');
                foreach ($_POST["access"] as $key => $val){
                 if($val == "on"){
                    if($_POST["actionType"] == "designate")
                         $status = "y";
                    else
                         $status = "n";
                    $rec  = $this->users->get_user_meta($key, 's1_public_page');
                    if(count($rec)  > 0){
                         $this->users->update_user_meta($key, 's1_public_page', $status);
                    }else if($_POST["actionType"] == "designate"){
                            $this->users->add_user_meta($key, 's1_public_page', $status);
                        }
                    }
                }
            }
            redirect($this->base.'admin/users_s1_public_page?name='.$txt_username.'&usertype='.$txt_usertype);
        }
	function view_union_users()
	{
		$this->_security();
        $data = $this->commonHead();

		$rows_union = $this->users->getMetaDataList('user', 'status=1 AND type_id=7', '', 'id,firstname,lastname,email_addr,industry_id,status');
		$data['rows_union'] = $rows_union;
		
		$this->load->view('union_view', $data);
	}
    
    function new_admin()
	{
        $this->_security();
        $data = $this->commonHead();
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $up 		= $this->singleFileUpload('userfile', $this->path_upload_profiles);
            $attachment = ($up) ? $up['url'] : '';

            $this->users->addAdministrator($attachment);
            redirect($this->base.'admin/metadata?type=administrator');
        }
        $this->load->view('new_admin', $data); 
    }
	
	function fatalityvideo()
	{
		$this->_security();
        $data 	= $this->commonHead();
		$videoid= (isset($_GET['videoid']) && (int)$_GET['videoid']) ? trim($_GET['videoid']) : '';
		
		if( $videoid ) {
			if( (int)$videoid ) {
				// Get Fatality Videos //
					$fatality_video = $this->users->getMetaDataList('fatality_videos', 'id="'.$videoid.'"', '', 'st_fatality_video, st_fatality_video_thumbnail, st_fatality_video_title, st_fatality_thumbnail_text, in_fatality_video_status');
					$fatality_video = isset($fatality_video[0]) ? $fatality_video[0] : array();
					$data['fatality_video'] = $fatality_video;
			}
			else {
				$this->error_404();return false;
			}
		}

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$fatality_video = array();
			$where 				= (int)$videoid ? 'id != "'.$videoid.'"' : '';
			$fatality_video_url = $this->common->escapeStr($_POST['txt_fatality_video']);

			foreach( $_POST as $key=>$val ) {
				if( "submit" != $key ) {
					$key = ("txt_fatality_video_status"==$key) ? str_replace("txt", "in", $key) : str_replace("txt", "st", $key);
					$fatality_video[$key] = $val;
				}
			}
			
			if( isset($_FILES) && $_FILES['userfile']['name'] ) {
				$this->load->library('upload');

				$fatality_thumbnail_text = (isset($fatality_video['st_fatality_thumbnail_text']) && $fatality_video['st_fatality_thumbnail_text']) ? $fatality_video['st_fatality_thumbnail_text'] : 'fatality_'.date('Ymdhis');

				$fatality_video['st_fatality_video_thumbnail'] = $fatality_thumbnail_text.".jpg";

				$this->upload->initialize($this->common->setUploadOptions($this->path_img_fatality, $fatality_thumbnail_text.".jpg"));
				if( !$this->upload->do_upload() ) {
					echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
				}
			}
			
			$data['fatality_video'] = isset($fatality_video) ? $fatality_video : array();

			$is_video_exists = $this->users->validateMetaData( 'tbl_fatality_videos', 'st_fatality_video', $fatality_video_url, $where );
			if( 'false' != $is_video_exists ) { // Unique Email entered //
				if( $videoid ) {
					// Update Fatality Video details //
						$this->parentdb->manageDatabaseEntry( 'tbl_fatality_videos', 'UPDATE', $fatality_video, array('id'=>$videoid) );
				}
				else {
					// Add new Fatality Video //
						$this->parentdb->manageDatabaseEntry( 'tbl_fatality_videos', 'INSERT', $fatality_video );
				}
				redirect($this->base.'admin/metadata?type=fatality_videos');
			}
			else {
				$data['email_exists'] = 1;
			}
        }
        $this->load->view('fatalityvideo', $data); 
	}
    
    function union()
	{
        $this->_security();
        $data 	= $this->commonHead();
		$userid = (isset($_GET['userid']) && (int)$_GET['userid']) ? trim($_GET['userid']) : '';
		
		if( $userid ) {
			if( (int)$userid ) {
				// Get Campus data of the Union and its Training Centres // 
					$rows_campus_names = $data['campus_names'] = $this->users->getMetaDataList( 'usermeta', 'meta_key="campus_name" AND meta_value!=""', '', 'meta_value AS campus_name' );
	
				// Get Union's Usermeta //
					$data['unionmeta'] 	= $this->users->getUserMetaByID($userid);
					$data['unionmeta'] 	= isset($data['unionmeta']) ? $data['unionmeta'] : array();

				// Get Unions personal details
					$union_personal_info = $this->users->getMetaDataList('user', 'id="'.$userid.'" AND status=1', '', 'firstname, lastname, email_addr, nickname, password, industry_id');
					$union_personal_info = isset($union_personal_info[0]) ? $union_personal_info[0] : array();
					$data['union_personal_info'] = $union_personal_info;
			}
			else {
				$this->error_404();return false;
			}
		}

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			// common::pr($_POST);die;
            if( 'ACCOUNT' == $_POST['action'] ) {
				$email = $this->common->escapeStr($_POST['email']);
				$where = (int)$userid ? 'id != "'.$userid.'"' : '';

				foreach( $_POST as $key=>$val ) {
					$union_personal_info[$key] 			= $val;
					$union_personal_info['email_addr'] 	= $userinfo['email_addr'] = $_POST['email'];
					$userinfo['firstname'] 	= $_POST['firstname'];
					$userinfo['lastname'] 	= $_POST['lastname'];
					$userinfo['nickname'] 	= $_POST['nickname'];
					$userinfo['password'] 	= md5($_POST['password']);
					$userinfo['industry_id']= $_POST['industry_id'];
				}
				$data['union_personal_info'] = isset($union_personal_info) ? $union_personal_info : array();

				$isEmailExists = $this->users->validateMetaData( 'tbl_login_users', 'email_addr', $email, $where );
				if( 'false' != $isEmailExists ) { // Unique Email entered //
					if( $userid ) {
						// Update Union's personal details //
							$this->users->updateUserDetails( $userinfo, array('id'=>$userid) );
					}
					else {
						// Add new Union User //
							$userid = $this->users->addUser();
						// Get Union's Usermeta //
							$data['unionmeta'] 	= $this->users->getUserMetaByID($userid);
							$data['unionmeta'] 	= isset($data['unionmeta']) ? $data['unionmeta'] : array();
					}
					// Update Union's Usermeta and send notification email to Union User //					
						$this->users->updateUserMetaByID( $userid, 7 );
						$this->send_register_notification($_POST['email'], $_POST['password']);

					redirect($this->base.'admin/union_profile?section=personal&id='.$userid); 
				}
				else {
					$data['email_exists'] = 1;
				}
            }
        }
        // $this->load->view('union2', $data); 
		$this->load->view('union', $data);
    }

	function alerts()
	{
		$this->_security();
        $data 		= $this->commonHead();
		$alertid	= (isset($_GET['alertid']) && (int)$_GET['alertid']) ? trim($_GET['alertid']) : '';

		$s1_alerts = $data['s1_alerts_criteria'] = array();
		$rows_alerts['st_images'] = $data['s1_alert_criteria'] = $data['alerted_users'] = $data['st_alert_criteria_options'] = '';
		
		if( $alertid ) {
			if( (int)$alertid ) {
				// Get Alerts Details
					$s1_alerts 	= $this->users->getMetaDataList('alerts', 'id="'.$alertid.'"', '', 'st_title, st_summary, st_locations, 
										st_legal_requirements, st_precautions, st_images, st_video, in_hazard_alert_created_by, in_status');
					$s1_alerts 	= $rows_alerts = isset($s1_alerts[0]) ? $s1_alerts[0] : array();

					$s1_alerts_users 	= $this->users->getMetaDataList('alerts_criteria_users', 'in_alert_id="'.$alertid.'" AND in_alert_sent_by="'.$this->sess_userid.'"', '', 'st_alert_criteria, st_alert_criteria_options,  st_users_alerted');
					$data['s1_alerts'] 			= $s1_alerts;
					$data['alerted_users'] 		= isset($s1_alerts_users[0]['st_users_alerted']) ? $s1_alerts_users[0]['st_users_alerted'] : '';
					$data['s1_alert_criteria'] 	= isset($s1_alerts_users[0]['st_alert_criteria']) ? $s1_alerts_users[0]['st_alert_criteria'] : '';
					$data['st_alert_criteria_options'] = isset($s1_alerts_users[0]['st_alert_criteria_options']) ? $s1_alerts_users[0]['st_alert_criteria_options'] : '';
			}
			else {
				$this->error_404();return false;
			}
		}

		// common::pr($data['alerted_users']);

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$s1_alerts['alerts']['st_title'] 				= isset($_POST['txt_alert_title']) ? $_POST['txt_alert_title'] : '';
			$s1_alerts['alerts']['st_summary'] 				= isset($_POST['txt_alert_summary']) ? $_POST['txt_alert_summary'] : '';
			$s1_alerts['alerts']['st_locations'] 			= isset($_POST['txt_alert_locations']) ? $_POST['txt_alert_locations'] : '';
			$s1_alerts['alerts']['st_legal_requirements'] 	= isset($_POST['txt_alert_legel_requirements']) ? $_POST['txt_alert_legel_requirements'] : '';
			$s1_alerts['alerts']['st_precautions'] 			= isset($_POST['txt_alert_precautions']) ? $_POST['txt_alert_precautions'] : '';
			$s1_alerts['alerts']['st_video'] 				= isset($_POST['txt_alert_video']) ? $_POST['txt_alert_video'] : '';
			$s1_alerts['alerts']['in_hazard_alert_created_by'] = $this->sess_userid;
			$s1_alerts['alerts']['in_status'] 				= isset($_POST['txt_alert_status']) ? $_POST['txt_alert_status'] : '';
			$s1_alerts['alerts']['dt_hazard_alert_updated'] = date('Y-m-d h:i:s');

			$last_alert_id = !($alertid) ? $this->parentdb->getLastRowId('tbl_alerts') : $alertid;

			$files = $_FILES;
			// Common::pr($s1_alerts);
			
			$upload_error = '';
			
			if( isset($_FILES) && sizeof($_FILES['userfile']['name']) ) {
				$s1_alerts_images = (isset($rows_alerts['st_images'])&&$rows_alerts['st_images']) ? explode(",", $rows_alerts['st_images']) : array();
				foreach( $_FILES['userfile']['name'] AS $key_alert_image => $val_alert_image ) {
					if( trim($val_alert_image) ) {
						$_FILES['userfile']['size'] 	= $files['userfile']['size'][$key_alert_image];
						$_FILES['userfile']['name'] 	= $files['userfile']['name'][$key_alert_image];
						$_FILES['userfile']['type'] 	= $files['userfile']['type'][$key_alert_image];
						$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$key_alert_image];
						$_FILES['userfile']['error'] 	= $files['userfile']['error'][$key_alert_image];
						
						// Delete the existing Alert Image if available //
							if( $alert_img = glob(FCPATH.$this->path_upload_alerts."alerts_".$last_alert_id."_".($key_alert_image+1).".*") ) {
								$arr_alert_img = explode("/", $alert_img[0]);
								isset($arr_alert_img[sizeof($arr_alert_img)-1]) ? unlink( FCPATH.$this->path_upload_alerts.$arr_alert_img[sizeof($arr_alert_img)-1] ) : '';
							}

						// Upload the Alerts Image //
							$ext_alertimg	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
							$alert_imgname 	= "alerts_".$last_alert_id."_".($key_alert_image+1).".".$ext_alertimg;
							
							if( !in_array($alert_imgname, explode(",", $rows_alerts['st_images'])) ) {
								array_push($s1_alerts_images, $alert_imgname);
							}

							$this->upload->initialize($this->common->setUploadOptions($this->path_upload_alerts, $alert_imgname));
							
							$config['upload_path'] = $this->path_upload_alerts;
							$config['allowed_types'] = 'gif|jpg|png';
							$config['max_size']			= '100';
							$config['max_width']  		= '1024';
							$config['max_height']  	= '768';
							$this->load->library('upload', $config);
		
							if( !$this->upload->do_upload() ) {
								echo $upload_error = $this->upload->display_errors();
							}
							else {
								$data = array('upload_data' => $this->upload->data());
							}
					}
				}
			}
			
			if( !$upload_error ) {
				$s1_alerts['alerts']['st_images'] = $s1_alerts_images;
				// common::pr( $s1_alerts['alerts']['st_images'] );
				(isset($s1_alerts['alerts']['st_images'])&&sizeof($s1_alerts['alerts']['st_images'])) ? $s1_alerts['alerts']['st_images'] = implode(",",$s1_alerts['alerts']['st_images']) : '';

				// Send Alerts Message to Users selected //		
					$val_alert_criteria = isset($_POST['cmb_alert_criteria']) ? $_POST['cmb_alert_criteria'] : array();
					
					if( $alertid ) {
						$this->parentdb->manageDatabaseEntry( 'tbl_alerts', 'UPDATE', $s1_alerts['alerts'], array('id'=>$alertid, 'in_hazard_alert_created_by'=>$this->sess_userid) );
					}
					else {
						$alertid = $this->parentdb->manageDatabaseEntry( 'tbl_alerts', 'INSERT', $s1_alerts['alerts'] );
					}
					$users_alerts = array();

					// Common::pr($_POST);die;

					if( isset($val_alert_criteria) && $val_alert_criteria ) {
						$post_alerts_search 	= isset($_POST['hazards_alerts'][$val_alert_criteria]) ? $_POST['hazards_alerts'][$val_alert_criteria] :'';
						
						$s1_alerts['users_alerted']['st_alert_criteria_options'] = (isset($post_alerts_search)&&is_array($post_alerts_search)) 
																		? implode(",",$post_alerts_search) : $post_alerts_search;
						if( $post_alerts_search ) {
							if( "industry" == $val_alert_criteria ) {
								$where_str 			= ($post_alerts_search) ? 'meta_key="'.$val_alert_criteria.'_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
								$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
								foreach( $users_by_indsectrd AS $val_userid ) {
									$users_alerts[$val_alert_criteria][] = $val_userid['user_id'];
								}
							}
							else if( "sector" == $val_alert_criteria ) {
								$where_str 			= ($post_alerts_search) ? 'meta_key="industry_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
								$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
								foreach( $users_by_indsectrd AS $val_userid ) {
									$users_alerts['industry'][] = $val_userid['user_id'];
								}
								$where_str 			= ($post_alerts_search) ? 'meta_key="section_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
								$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
								foreach( $users_by_indsectrd AS $val_userid ) {
									$users_alerts[$val_alert_criteria][] = $val_userid['user_id'];
								}
							}
							else if( "trade" == $val_alert_criteria ) {
								$where_str 			= ($post_alerts_search) ? 'meta_key="industry_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
								$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
								foreach( $users_by_indsectrd AS $val_userid ) {
									$users_alerts['industry'][] = $val_userid['user_id'];
								}
								$where_str 			= ($post_alerts_search) ? 'meta_key="section_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
								$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
								foreach( $users_by_indsectrd AS $val_userid ) {
									$users_alerts['sector'][] = $val_userid['user_id'];
								}
								$where_str 			= ($post_alerts_search) ? 'meta_key="'.$val_alert_criteria.'_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
								$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
								foreach( $users_by_indsectrd AS $val_userid ) {
									$users_alerts[$val_alert_criteria][] = $val_userid['user_id'];
								}
							}
							else if( "usertype" == $val_alert_criteria ) {
								$users_by_usertype 	= $this->users->getMetaDataList('user', 'type_id IN ('.implode(",",$post_alerts_search).')', '', 'id');
								foreach( $users_by_usertype AS $val_userid ) {
									$users_alerts[$val_alert_criteria][] = $val_userid['id'];
								}
							}
							else if( "employer-connection" == $val_alert_criteria ) {
								foreach( $post_alerts_search AS $val_userid ) {
								// Get connection links of people and organigation //
									$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE', $val_userid, 1, 'id' );
									$org_links 	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $val_userid, 1, 'id' );
									$all_links 	= array_merge($peo_links, $org_links);								
									foreach( $all_links AS $val_userid ) {
										$users_alerts[$val_alert_criteria][] = $val_userid['id'];
									}
								}
							}
							else if( "union-connection" == $val_alert_criteria ) {
								$users_alerts[$val_alert_criteria] = $post_alerts_search;
							}
							else if( "all" == $val_alert_criteria ) {
								$users_by_allusers 	= $this->users->getMetaDataList('user', '1=1', '', 'id');
								foreach( $users_by_allusers AS $val_userid ) {
									$users_alerts[$val_alert_criteria][] = $val_userid['id'];
								}
							}
							else {
								$users_alerts[$val_alert_criteria] = $post_alerts_search;
							}
						}
					}

					$s1_alerts['users_alerted']['in_alert_id'] 		= $alertid;
					$s1_alerts['users_alerted']['in_alert_sent_by'] = $this->sess_userid;					
					$s1_alerts['users_alerted']['st_alert_criteria']= $val_alert_criteria;
					
					if( isset($users_alerts) && sizeof($users_alerts) ) {
						$subject_alerts = "New Alert from Admin on Profile Home";
						$body_alerts	= "Alert #".$s1_alerts['alerts']['st_title']." from ".$this->sess_nickname." on ".date('M d, Y');

						$this->parentdb->deleteSection($alertid, 'alert_criteria');

						foreach( $users_alerts AS $key_alerts_section => $val_alerts_section ) {
							$users = array();
							foreach( $val_alerts_section AS $val_user ) {
								// Send Alert mesage to Users selected //
									$users[] 			 = $val_user;
									$rows_users 		 = $this->users->getMetaDataList( 'user', 'id="'.$val_user.'"', '', 'id, email_addr' );
									$assign_to_user_email= isset($rows_users[0]['email_addr']) ? $rows_users[0]['email_addr'] : '';
									$check_alert_message = $this->users->getMetaDataList('message','subject = "'.$subject_alerts.'" AND send_to="'.$assign_to_user_email.'"','','message_id');
									$messages_alerts 	 = array('send_to' 	=> $assign_to_user_email, 'send_from' => $this->sess_useremail, 
																'subject' 	=> $subject_alerts, 'message' 	=> $body_alerts);
									if( isset($check_alert_message[0]['message_id']) ) {
										$this->parentdb->manageDatabaseEntry( 'tbl_message', 'UPDATE', array('read_status'=>'1'), 
																			array('message_id'=>$check_alert_message[0]['message_id']) );
									}
									else {
										$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $messages_alerts );
									}
									
									
									$this->users->sendEmailToS1user($assign_to_user_email, $this->sess_useremail, $subject, $body_alerts);
							}
							$s1_alerts['users_alerted']['st_users_alerted'] = json_encode($users);

							// Add Alerts Users with search criteria //
								$this->parentdb->manageDatabaseEntry( 'tbl_alerts_criteria_users', 'INSERT', $s1_alerts['users_alerted'] );
						}
					}

				redirect($this->base.'admin/metadata?type=alerts');
			}			
        }

		$data['s1_alerts'] = isset($s1_alerts) ? $s1_alerts : array();
		$data['alertid'] = $alertid;
        $this->load->view('alerts', $data); 
	}
	
	/* shifted to user model //
	function stdEmail()
	{
		$this->load->library('email');
		$config['mailtype']  = 'html'; // text
		$config['charset']   = 'utf-8'; // iso-8859-1
		$config['wordwrap']  = TRUE;
		$config['priority']  = 1;
		$this->email->initialize($config);

		$data['base']  = $this->base;
		$email_body = $this->load->view('email_templates/std-email', $data, true);
		$this->email->from('info@mys1s.com', 'S1 Systems');
		$this->email->to('marcio@hrqsolutions.com;kartik.shah@gatewaytechnolabs.com ');
		$this->email->subject('Template for item 161');
		$this->email->message($email_body); 
		$this->email->send();
		die();  
	}
	*/
	
	function hazard_alerts()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		// Update hazard alert profile home notification //
			$this->users->updateMessageReadStatus('alert');

		$where_arr = array();
	
		$data['chk_alerts_unread'] = "";
		if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
			$where_arr['chk_alerts_unread'] = $data['chk_alerts_unread'] = $this->input->post('chk_alerts_unread');
			$this->input->post('txt_alert_title') ? $where_arr['alert_title'] = $this->input->post('txt_alert_title') : '';
			$this->input->post('txt_alert_sender') ? $where_arr['alert_sender'] = $this->input->post('txt_alert_sender') : '';
			$this->input->post('cmb_alert_sendby_usertype') ? $where_arr['alert_sendby_usertype'] =  $this->input->post('cmb_alert_sendby_usertype') : '';
			$from_created_date 	= $this->input->post('txt_from_created_date') ? date("Y-m-d", strtotime($this->input->post('txt_from_created_date'))) : '';
			$to_created_date 	= $this->input->post('txt_to_created_date') ? date("Y-m-d", strtotime($this->input->post('txt_to_created_date'))) : '';
		}

		(isset($from_created_date)&&$from_created_date) ? $where_arr['from_created_date'] = $from_created_date : '';
		(isset($to_created_date)&&$to_created_date) ? $where_arr['to_created_date'] = $to_created_date : '';

		$pgno_alerts 			= $data['pgno_alerts'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$total_users_alerts 	= $this->adminsettings->getHazardAlerts( $this->sess_userid, 0, '', $where_arr );	
		$total_users_alerts 	= $data['total_users_alerts'] = sizeof($total_users_alerts);
		$data['users_alerts']	= $this->adminsettings->getHazardAlerts($this->sess_userid, ($pgno_alerts-1), 9, $where_arr );
		
		// common::pr( $data['users_alerts'] );

		$this->load->view('hazard_alert_view_metro', $data); 
	}

	// Add or Update Badges by the Administrator // 
		function badge()
		{
			$this->_security();
			$data 		= $this->commonHead();
			$badgeid	= (isset($_GET['id']) && (int)$_GET['id']) ? trim($_GET['id']) : '';

			if( $badgeid ) {
				if( (int)$badgeid ) {
					// Get Badges
						$badges = $this->users->getMetaDataList('badge', 'id="'.$badgeid.'"', '', 
											'st_badge_title, st_badge_description, st_badge_image, in_industry_id, in_sector_id, in_trade_id, in_status');
						$badges = isset($badges[0]) ? $badges[0] : array();
						$data['badges'] = $badges;
				}
				else {
					$this->error_404();return false;
				}
			}
			if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
				$last_badge_id = !($badgeid) ? $this->parentdb->getLastRowId('tbl_badge') : $badgeid;

				$badges = array('st_badge_title'=> $this->input->post('txt_badge_title'),
								'st_badge_description'=> $this->input->post('txtarea_badge_description'),
								'st_badge_image'=> $this->input->post('rdb_badge_image'),
								'in_industry_id'=> $this->input->post('cmb_industry'),
								'in_sector_id'	=> $this->input->post('cmb_sector'),
								'in_trade_id'	=> $this->input->post('cmb_trade'),
								'in_status'		=> $this->input->post('rdb_badge_status') );
				// Common::pr($badges);die;
				$data['badges'] = isset($badges) ? $badges : array();

				if( $badgeid ) {
					$badges['dt_date_updated'] = date('Y-m-d h:i:s');
					$this->parentdb->manageDatabaseEntry( 'tbl_badge', 'UPDATE', $badges, array('id'=>$badgeid) );
				}
				else {
					$this->parentdb->manageDatabaseEntry( 'tbl_badge', 'INSERT', $badges );
				}
				redirect($this->base.'admin/metadata?type=badge');
			}
			$this->load->view('badge', $data); 
		}

	// Buy S1 Badges, Display My Badges //
		function badges()
		{
			// Update conection request profile home notification
				$this->users->updateMessageReadStatus('D.R.O.T has been assigned');

			$data 			= $this->commonHead();
			$data['module'] = "dashboard";
			$redirect_from 	= $data['redirect_from'] = $this->input->get('redirect_from');

			// Get Badge Price 
				$badge_price = $this->users->getMetaDataList('price_settings', 'price_settingsname="badges"', '', 'in_price');
				$badge_price = $data['badge_price'] = (isset($badge_price[0]['in_price'])&&$badge_price[0]['in_price']) ? $badge_price[0]['in_price'] : 'N/A';
				
			$where_s1badge = $where_mybadge = '';
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				if( isset($_POST['workerId']) ) {
					$this->session->set_userdata('worker_id', $_POST['workerId']);
					$this->session->set_userdata('worker_name', $_POST['workerName']);
				}
				$badge_title	= $this->input->post('txt_badge_title');
				$where_s1badge	= ($badge_title) ? ' AND st_badge_title LIKE "%'.$badge_title.'%"' : '';
				$where_mybadge	= ($badge_title) ? ' AND st_badge_title LIKE "%'.$badge_title.'%"' : '';
			}

			// Get S1 Badges //
				$badges 	= $this->users->getMetaDataList('badge', 'in_status=1'.$where_s1badge, 'ORDER BY st_badge_title', 'id, st_badge_title, st_badge_description, st_badge_image, in_status');
				$data['badges']	= (isset($badges) && is_array($badges)) ? $badges : array();

			// Get My Badges //
				$my_badges 		= $this->libraries->getMyBadges($this->sess_userid, $where_mybadge);
				$assigned_badges 	= $this->libraries->getMyAssignedBadges($this->sess_userid, $where_mybadge);

				if( $this->sess_usertype != '9' && $this->sess_usertype != '11' ) {
					if( "myworkers" == $redirect_from ) {
						$all_my_badges 	= $my_badges;
					}
					else {
						$all_my_badges	= array_merge($my_badges, $assigned_badges);
					}
				}
				else {
					$all_my_badges = $assigned_badges;
				}
				$data['my_badges']	= (isset($all_my_badges) && is_array($all_my_badges)) ? $all_my_badges : array();

			$this->load->view('badges_metro', $data);
		}
	
	// Assign Badge to selected users from the Connections Page //
		function assign_badge_old()
		{
			session_start();
			$data_commonhead= $this->commonHead();
			$data_connection= $this->commonConnection();
			$data    		= array_merge( $data_commonhead, $data_connection );
			$data['module'] = "dashboard";

			$where_mybadges = $where_industry = $where_sector = $where_trade = $where_badge_title ='';

			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				isset($_POST['arr_connec']) ? $_SESSION['connec_assign']['connection'] 	= $_POST['arr_connec'] : '';
				isset($_POST['arr_badges']) ? $_SESSION['connec_assign']['badges'] 		= $_POST['arr_badges'] : '';

				if( isset($_POST['arr_badges']) && sizeof($_POST['arr_badges']) ){
					foreach( $_SESSION['connec_assign']['badges'] AS $key => $val ) {
						$lib_id 		= $val;
						
						$connection_userid = isset($_SESSION['connec_assign']['connection'][0]) ? $_SESSION['connec_assign']['connection'][0] : '';
						
						$has_badge_assigned = $this->libraries->getMyAssignedBadges($connection_userid, ' AND library_id="'.$lib_id.'"');
						$has_badge_assigned = isset($has_badge_assigned[0]) ? 1 : ''; 
						
						if( !$has_badge_assigned ) {
							$libtype_section= "badge";
							foreach( $_SESSION['connec_assign']['connection'] AS $key_connec => $val_connec ) {
								if( (int)$val_connec ) {
									if( in_array('crew', $_SESSION['connec_assign']['connection']) ) {
										$rows_crew_workers 	= $this->users->getMetaDataList('crew_of_employers', 'in_crew_id="'.$val_connec.'"', '', 'st_crew_workers');
										$arr_crew_workers 	= (isset($rows_crew_workers[0]['st_crew_workers'])&&$rows_crew_workers[0]['st_crew_workers']) 
																	? explode(",", $rows_crew_workers[0]['st_crew_workers']) : array();

										foreach( $arr_crew_workers AS $key_worker => $val_worker ) {
											// echo "connection: ".$val_worker."lib_id: ".$lib_id."lib_type: ".$libtype_section;
											Ajax::ajax_assign_inventory( $val_worker, $lib_id, $libtype_section );
										}
									}
									else {
										Ajax::ajax_assign_inventory( $val_connec, $lib_id, $libtype_section );
									}
								}
							}
						}
						else {
							$connected_username = $this->users->getMetaDataList('user', 'status=1 AND id="'.$_SESSION['connec_assign']['connection'][0].'"', '', 'CONCAT(firstname, " ", lastname) AS username' );
							$connected_username = (isset($connected_username[0]['username'])&&$connected_username[0]['username']) ? $connected_username[0]['username'] : '';
							echo "User ".$connected_username." have already this D.R.O.T available.";
						}
					}
				}
				else {
					$industry		= $this->input->post('cmb_industry_id');
					$where_industry	= ($industry) ? ' AND in_industry_id="'.$industry.'"' : '';
					$sector			= $this->input->post('cmb_sector_id');
					$where_sector	= ($sector) ? ' AND in_sector_id LIKE "'.$sector.'"' : '';
					$trade			= $this->input->post('cmb_trade_id');
					$where_trade	= ($trade) ? ' AND in_trade_id LIKE "'.$trade.'"' : '';
					$badge_title	= $this->input->post('txt_badge_title');
					$where_badge_title	= ($badge_title) ? ' AND st_badge_title LIKE "%'.$badge_title.'%"' : '';
					
					$where_mybadges = $where_industry.$where_sector.$where_trade.$where_badge_title;
				}
			}

			$my_badges 			= $this->libraries->getMyBadges($this->sess_userid, $where_mybadges);
			$data['my_badges']	= (isset($my_badges) && is_array($my_badges)) ? $my_badges : array();
			
			$data['arr_connections'] = isset($_SESSION['connec_assign']['connection']) ? $_SESSION['connec_assign']['connection'] : '';
			
			if( !isset($_POST['arr_badges']) ) {
				$this->load->view('assign_badge', $data);
			}
		}
	
	
	
	function credits_package()
	{
		$this->_security();
        $data 	= $this->commonHead();
		$creditspkg_id= (isset($_GET['id']) && (int)$_GET['id']) ? trim($_GET['id']) : '';
		
		if( $creditspkg_id ) {
			if( (int)$creditspkg_id ) {
				// Get Credits Packages
					$credits_packages = $this->users->getMetaDataList('credits_package', 'in_creditspkg_id="'.$creditspkg_id.'"', '', 'st_creditspkg_name, in_price, in_credits, in_status');
					$credits_packages = isset($credits_packages[0]) ? $credits_packages[0] : array();
					$data['credits_packages'] = $credits_packages;
			}
			else {
				$this->error_404();return false;
			}
		}

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$credits_packages = array('st_creditspkg_name'=>$this->input->post('cmb_creditspkg_name'),
									'in_price'=>$this->input->post('txt_creditspkg_price'),
									'in_credits'=>$this->input->post('txt_creditspkg_credits'),
									'in_status'=>$this->input->post('cmb_creditspkg_status')
									);

			$data['credits_packages'] = isset($credits_packages) ? $credits_packages : array();

			if( $creditspkg_id ) {
				$this->parentdb->manageDatabaseEntry( 'tbl_credits_package', 'UPDATE', $credits_packages, array('in_creditspkg_id'=>$creditspkg_id) );
			}
			else {
				$this->parentdb->manageDatabaseEntry( 'tbl_credits_package', 'INSERT', $credits_packages );
			}
			redirect($this->base.'admin/metadata?type=credits_package');
        }
        $this->load->view('credits_package', $data); 
	}

	function credits_requests()
	{
		$this->_security();
        $data 	= $this->commonHead();
		$creditsreq_id= (isset($_GET['id']) && (int)$_GET['id']) ? trim($_GET['id']) : '';
		
		if( $creditsreq_id ) {
			if( (int)$creditsreq_id ) {
				// Get Credits Requests
					$rows_credits_requests = $this->users->getMetaDataList('credits_requests', 'id="'.$creditsreq_id.'"', '', '*');
					$rows_credits_requests = isset($rows_credits_requests[0]) ? $rows_credits_requests[0] : array();
					$data['credits_requests'] = $rows_credits_requests;
			}
			else {
				$this->error_404();return false;
			}
		}

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$credits_requests = array('in_credits_price'		 =>$this->input->post('txt_credits_price'), 
									'st_credits_request_status'	 =>$this->input->post('cmb_credits_request_status'),
									'st_credits_request_reply_by'=>$this->sess_useremail,
									'st_credits_request_comments'=>$this->input->post('txt_credits_request_comments'),
									'dt_reply_credits_request'	 => date('Y-m-d h:i:s')
									);
			$data['credits_requests'] = isset($credits_requests) ? $credits_requests : array();

			if( $creditsreq_id ) {
				$upd_credits_requests = array('in_credits_price' =>$this->input->post('txt_credits_price'), 'st_credits_request_comments'=>$this->input->post('txt_credits_request_comments'));

				(""!=trim($rows_credits_requests['st_credits_request_status'])&&"approved"!=$rows_credits_requests['st_credits_request_status']&&"payment received"!=$rows_credits_requests['st_credits_request_status']) ? $upd_credits_requests['st_credits_request_status']=$this->input->post('cmb_credits_request_status') : '';

				$this->parentdb->manageDatabaseEntry( 'tbl_credits_requests', 'UPDATE', $upd_credits_requests, array('id'=>$creditsreq_id) );
			}
			else {
				$this->parentdb->manageDatabaseEntry( 'tbl_credits_requests', 'INSERT', $credits_requests );
			}
			
			// Add credits if User had paid the Credit's amount manually //
				if( "payment received" == $this->input->post('cmb_credits_request_status') 
					|| "approved" == $this->input->post('cmb_credits_request_status') ) {
					$user_id = $this->users->getMetaDataList('user','status=1 AND email_addr="'.$rows_credits_requests['st_credits_requested_by'].'"','','id');
					$user_id = isset($user_id[0]['id']) ? $user_id[0]['id'] : '';
					$arr_credits = array('in_user_id'		 	=> $user_id, 
										'st_credits_package'	=> 'Platinum', 
										'in_credits_purchased'	=> $rows_credits_requests['in_credits_requested'], 
										'in_qty_ordered'		=> 1, 
										'in_credits_price'	 	=> $this->input->post('txt_credits_price'), 
										'dt_date_purchased' 	=> date('Y-m-d h:i:s') );
					$this->parentdb->manageDatabaseEntry( 'tbl_my_credits', 'INSERT', $arr_credits );
				}
			redirect($this->base.'admin/metadata?type=credits_requests');
        }
        $this->load->view('credits_requests', $data); 
	}

	function credits_assign()
	{
		$this->_security();
        $data 			= $this->commonHead();
		$creditsassign_id	= (isset($_GET['id']) && (int)$_GET['id']) ? trim($_GET['id']) : '';
		$data['creditsassign_id'] = $creditsassign_id;
		
		if( $creditsassign_id ) {
			if( (int)$creditsassign_id ) {
				// Get Credits Assign
					$rows_credits_assign = $this->users->getMetaDataList('credits_assign', 'id="'.$creditsassign_id.'"', '', '*');
					$rows_credits_assign = isset($rows_credits_assign[0]) ? $rows_credits_assign[0] : array();
					$data['rows_credits_assign'] = $rows_credits_assign;
			}
			else {
				$this->error_404();return false;
			}
		}

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$credits_assign = array('in_credits_assign_to'		 	=> $this->input->post('cmb_credits_assign_to'), 
									'in_credits_assigned'		 	=> $this->input->post('txt_credits_assigned'), 
									'in_credits_price'		 		=> $this->input->post('txt_credits_price'), 
									'st_credits_assign_status'	 	=> $this->input->post('cmb_credits_request_status'),
									'st_credits_assign_reply_by'	=> $this->sess_useremail,
									'st_credits_assign_comments'	=> $this->input->post('txt_credits_assign_comments'),
									'dt_reply_credits_assigned'	 	=> date('Y-m-d h:i:s')
									);
			$data['credits_assign'] = isset($credits_assign) ? $credits_assign : array();
		
			
			if( $creditsassign_id ) {
				$upd_credits_assign = array('st_credits_assign_comments'=>$this->input->post('txt_credits_assign_comments'));

				if(""!=trim($rows_credits_assign['st_credits_assign_status'])&&"assigned"!=$rows_credits_assign['st_credits_assign_status']) {
					$upd_credits_assign['st_credits_assign_status']=$this->input->post('cmb_credits_request_status');
				}
				$this->parentdb->manageDatabaseEntry( 'tbl_credits_assign', 'UPDATE', $upd_credits_assign, array('id'=>$creditsassign_id) );
			}
			else { 
				if( "assigned" == $this->input->post('cmb_credits_request_status') ) {
					$this->parentdb->manageDatabaseEntry( 'tbl_credits_assign', 'INSERT', $credits_assign );
					// Add credits in selected user's account //
						$arr_credits = array('in_user_id'		 	=> $this->input->post('cmb_credits_assign_to'), 
											'st_credits_package'	=> 'Platinum', 
											'in_credits_purchased'	=> $this->input->post('txt_credits_assigned'), 
											'in_qty_ordered'		=> 1, 
											'in_credits_price'	 	=> $this->input->post('txt_credits_price'), 
											'dt_date_purchased' 	=> date('Y-m-d h:i:s') );
						$this->parentdb->manageDatabaseEntry( 'tbl_my_credits', 'INSERT', $arr_credits );
				}
			}
			redirect($this->base.'admin/metadata?type=credits_assign');
        }
        $this->load->view('credits_assign', $data); 
	}
	
	function points_level()
	{
		$this->_security();
        $data 	= $this->commonHead();
		$pointslevelid= (isset($_GET['id']) && (int)$_GET['id']) ? trim($_GET['id']) : '';

		if( $pointslevelid ) {
			if( (int)$pointslevelid ) {
				// Get Points Levels
					$points_level = $this->users->getMetaDataList('points_level', 'in_points_level_id="'.$pointslevelid.'"', '', 
									'in_level, in_points_of_level, st_label, st_image, in_lifetime, has_benefits_to_level, in_status_of_level');
					$points_level = isset($points_level[0]) ? $points_level[0] : array();
					$data['points_level'] = $points_level;
			}
			else {
				$this->error_404();return false;
			}
		}

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$points_level = array('in_level'		 		=> $this->input->post('cmb_level'), 
									'in_points_of_level'	=> $this->input->post('txt_points_of_level'), 
									'st_label'				=> $this->input->post('txt_label'), 
									'in_lifetime'			=> $this->input->post('txt_lifetime'), 
									'has_benefits_to_level'	=> $this->input->post('rdb_benefits_to_level'), 
									'in_status_of_level'	=> $this->input->post('rdb_status_of_level') );

			if( isset($_FILES) && $_FILES['userfile']['name'] ) {
				// Delete the existing Points Level image if available //
					if( $points_level_img = glob(FCPATH.$this->path_img_pointslevel."level_".$this->input->post('cmb_level').".*") ) {
						$arr_level_img = explode("/", $points_level_img[0]);
						isset($arr_level_img[sizeof($arr_level_img)-1]) ? unlink( FCPATH.$this->path_img_pointslevel.$arr_level_img[sizeof($arr_level_img)-1] ) : '';
					}

				// Upload the Points Level Image //
					$this->load->library('upload');
					$ext_levelimg	 	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );					
					$points_level['st_image'] = "level_".$this->input->post('cmb_level').".".$ext_levelimg;

					$this->upload->initialize($this->common->setUploadOptions($this->path_img_pointslevel, $points_level['st_image']));
					if( !$this->upload->do_upload() ) {
						echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
					}
			}
			$data['points_level'] = isset($points_level) ? $points_level : array();

			if( $pointslevelid ) {
				// Update Points Level //
					$this->parentdb->manageDatabaseEntry( 'tbl_points_level', 'UPDATE', $points_level, array('in_points_level_id'=>$pointslevelid) );
			}
			else {
				// Add Points Level //
					$this->parentdb->manageDatabaseEntry( 'tbl_points_level', 'INSERT', $points_level );
			}
			redirect($this->base.'admin/metadata?type=points_level');
        }
        $this->load->view('points_level', $data); 
	}
	
	
	function wsib_rategroup()
	{
		$this->_security();
        $data 		= $this->commonHead();
		$wsib_rategroup_id	= (isset($_GET['id']) && (int)$_GET['id']) ? trim($_GET['id']) : '';

		$wsib_rategroup_data = $data['s1_alerts_criteria'] = array();
		$rows_alerts['st_images'] = $data['s1_alert_criteria'] = $data['alerted_users'] = $data['st_alert_criteria_options'] = '';
		
		if( $wsib_rategroup_id ) {
			if( (int)$wsib_rategroup_id ) {
				// Get Alerts Details
					$wsib_rategroup_data 	= $this->users->getMetaDataList('wsib_rategroup', 'id="'.$wsib_rategroup_id.'"', '', 'st_sector, in_rate_group, st_rate_group_description, in_status');
					$wsib_rategroup_data 	= $rows_alerts = isset($wsib_rategroup_data[0]) ? $wsib_rategroup_data[0] : array();

					$s1_alerts_users 	= $this->users->getMetaDataList('alerts_criteria_users', 'in_alert_id="'.$wsib_rategroup_id.'" AND in_alert_sent_by="'.$this->sess_userid.'"', '', 'st_alert_criteria, st_alert_criteria_options,  st_users_alerted');
					$data['wsib_rategroup_data'] 			= $wsib_rategroup_data;
					$data['alerted_users'] 		= isset($s1_alerts_users[0]['st_users_alerted']) ? $s1_alerts_users[0]['st_users_alerted'] : '';
					$data['s1_alert_criteria'] 	= isset($s1_alerts_users[0]['st_alert_criteria']) ? $s1_alerts_users[0]['st_alert_criteria'] : '';
					$data['st_alert_criteria_options'] = isset($s1_alerts_users[0]['st_alert_criteria_options']) ? $s1_alerts_users[0]['st_alert_criteria_options'] : '';
			}
			else {
				$this->error_404();return false;
			}
		}

        if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$wsib_rategroup_data['st_sector'] 				= isset($_POST['txt_sector']) ? $_POST['txt_sector'] : '';
			$wsib_rategroup_data['in_rate_group'] 			= isset($_POST['txt_rate_group']) ? $_POST['txt_rate_group'] : '';
			$wsib_rategroup_data['st_rate_group_description']= isset($_POST['txt_rate_group_description']) ? $_POST['txt_rate_group_description'] : '';
			$wsib_rategroup_data['in_status'] 				= isset($_POST['rdb_rategroup_status']) ? $_POST['rdb_rategroup_status'] : '';

			if( $wsib_rategroup_id ) {
				$this->parentdb->manageDatabaseEntry( 'tbl_wsib_rategroup', 'UPDATE', $wsib_rategroup_data, array('id'=>$wsib_rategroup_id) );
			}
			else {
				$wsib_rategroup_id = $this->parentdb->manageDatabaseEntry( 'tbl_wsib_rategroup', 'INSERT', $wsib_rategroup_data );
			}
			redirect($this->base.'admin/metadata?type=wsib_rategroup');
        }

		$data['wsib_rategroup_data']= isset($wsib_rategroup_data) ? $wsib_rategroup_data : array();
		$data['wsib_rategroup_id'] 	= $wsib_rategroup_id;
        $this->load->view('wsib_rategroup', $data); 
	}
	

    function union_profile()
	{
        $this->_security();
        $data 			= $this->commonHead();
        $userID 		= (int)$_GET['id'];
        $data['rel'] 	= "ADMIN";
        $data['union']	= $this->users->getUserByID($userID);

        if( $_SERVER['REQUEST_METHOD']=='POST' ) {
            if( $_POST['page'] == "personal" ){
				$up 		= $this->users->userProfileImageUpload('userfile', $this->path_upload_profiles, "profile".$userID);
				$attachment = ($up) ? $up['userfile']['name'] : '';
                $this->users->updateUserBasicInfoByID($userID, $attachment);
            }
            $this->users->updateUserMetaByID($userID, 7);
        }

        $data['unionmeta'] 	= $this->users->getUserMetaByID($userID);
        $data['boards'] 	= $this->users->getBoardMembersByUnionID($userID);

        $section = "personal";
        (isset($_GET['section'])) ? $section = $_GET['section'] : '';
		
        $this->load->view('profile_union_'.$section, $data); 
    }

	function send_register_notification($to, $pwd)
	{
		$data['base']	= $this->base;
        $data['password'] = $pwd;
		$data['url'] = $this->base."?user_section=register_confirm&user=".urlencode($this->encrypt_decrypt('encrypt', $to));
        $email_body = $this->load->view('email_templates/register', $data, true);
		$this->users->sendEmailToS1user($to, $this->config->item('site_email'), 'IMPORTANT! Please Confirm Your Registration at S1', $email_body);
	    return true;
	}

	function send_recovery_notification($to, $sendByAdmin='')
	{
		$data['base']			= $this->base;
		$from_admin 			= (1==$sendByAdmin) ? '&from_admin=1' : '';
		$data['url'] 			= $this->base."?user_section=password_reset&user=".urlencode($this->encrypt_decrypt('encrypt', $to)).$from_admin;
        $data['send_by_admin'] 	= $sendByAdmin;
        $email_body 			= $this->load->view('email_templates/recover', $data, true);

		$this->users->sendEmailToS1user($to, $this->config->item('site_email'), 'ACCOUNT INFORMATION REQUEST for '.strtoupper($to), $email_body);
	    return true;
	}	
	
    function encrypt_decrypt($action, $string) {
       $output = false;
       $key = 'S1WEBSITE ENCRYPT KEY';
    
       // initialization vector 
       $iv = md5(md5($key));
    
       if( $action == 'encrypt' ) {
           $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
           $output = base64_encode($output);
       }
       else if( $action == 'decrypt' ){
           $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
           $output = rtrim($output, "");
       }
       return $output;
    }

    function new_metadata()
	{
        $this->_security();
        $data = $this->commonHead();

		$urlstring		= '';
        $type 			= (isset($_GET['type'])&&$_GET['type']) ? $_GET['type']:'';
		$reggroupid 	= (isset($_GET['reggroupid'])&&$_GET['reggroupid']) ? $_GET['reggroupid']:'';

		if( "library_types" == $type ) {
			$rows_unions = $this->users->getMetaDataList('user', 'type_id=7 AND status=1', '', 'id, nickname');
			$data['rows_unions'] = $rows_unions;
		}
		
        if($_SERVER['REQUEST_METHOD']=='POST') {
            switch($type){
				case 'price_settings':
					$this->parentdb->addPriceSettings();
                    break;
				case 'regulations':
					$this->regulation->addRegulation();
                    break;
				case 'library_types':
					$this->libraries->addLibraryType();
                    break;
                case 'usertype':
                    $this->users->addUserType();
                    break;
                case 'industry':
                    $this->adminsettings->addIndustry();
                    break;  
                case 'section':
                    $this->adminsettings->addSector();
                    break;
                case 'trade':
                    $this->adminsettings->addTrade();
                    break;
                case 'country':
                    $this->adminsettings->addCountry();
                    break;
                case 'province':
                    $this->adminsettings->addProvince();
                    break;   
                case 'city':
                    $this->adminsettings->addCity();
                    break; 
                case 'point_page':
                    $this->points->addPointPage();
                    break;                                                                                                              
            }
            redirect($this->base.'admin/metadata?type='.$type.$urlstring);
        }
        $this->load->view('new_'.$type, $data); 
    }

    function validateMetaData()
	{
        echo $this->users->validateMetaData($_POST['table'], $_POST['field'], $_POST['value'], $_POST['where']);
    }
	
	function validateRegGroup() 
	{
		$ret_output = $this->regulation->manageRegulationGroup($_POST);
		echo $ret_output;
	}
	
	function validateRegSection() 
	{
		$ret_output = $this->regulation->manageRegulationSection($_POST);
		echo $ret_output;
	}

    function validateMetaDataRelated(){
        echo $this->users->validateMetaDataRelated($_POST['table'], $_POST['field'], $_POST['value'], $_POST['filed_related'], $_POST['value_related']);
    }

    function validateMetaDataRelatedTwo(){
        echo $this->users->validateMetaDataRelatedTwo($_POST['table'], $_POST['field'], $_POST['value'], $_POST['filed_related1'], $_POST['value_related1'], $_POST['filed_related2'], $_POST['value_related2']);
    }  
    
    function validateTrade(){
        echo $this->adminsettings->validateTrade($_POST['industry_id'], $_POST['section_id'], $this->common->escapeStr($_POST['trade_name']));
    }
    
    function validateTradeUpdate(){
        echo $this->adminsettings->validateTradeUpdate($_POST['trade_id'], $_POST['industry_id'], $_POST['section_id'], $this->common->escapeStr($_POST['trade_name']));
    }  
 
	function getMetaDataList()
	{
		$regno_section 	= isset($_POST['regnoSection']) ? $_POST['regnoSection'] : '';
		$group_by 		= (isset($_POST['groupBy']) && $_POST['groupBy']) ? $_POST['groupBy'] : '';
        $elements 		= $this->users->getMetaDataList($_POST['table'], $_POST['where'], $_POST['orderBy'], $_POST['select'], $group_by);

		if( isset($_POST['no_options']) && "1" == $_POST['no_options'] ) {
			foreach($elements as $el) {
				echo $el[$_POST['select']];
			}
		}
		else {
			foreach($elements as $el) {
				if( "procedure_duediligence" == $regno_section ) {
					echo '<option value="'.$el['st_regulation_number'].'">'.$el['st_regulation_number']." - ".$el['st_title'].'</option>';
				}
				else {
					echo '<option value="'.$el[$_POST['select']].'">'.$el[$_POST['select']].'</option>';
				}
			}
		}
    }
	
	function getRegSectionFromTitle()
	{
		$elements = $this->regulation->getRegSectionFromTitle($_POST['select'], $_POST['where'], $_POST['optionLabel'] );
        // echo '<option value="">-'.$_POST['optionLabel'].'-</option>'; 
        foreach($elements as $el) {
			if( trim($el[$_POST['select']]) ) {
				echo '<option value="'.$el[$_POST['select']].'">'.$el[$_POST['select']].'</option>';
			}
		}
		if( sizeof($elements) <= 0 ) {
			echo sizeof($elements);
		}
	}
	
    function getRegSection()
	{
        $elements = $this->regulation->getRegSection($_POST['select'], $_POST['where'], $_POST['optionLabel'] );
		// common::pr($elements);
        foreach($elements as $el) {
			if( trim($el[$_POST['select']]) ) {
				echo '<option value="'.$el[$_POST['select']].'">'.$el[$_POST['select']].'</option>';
			}
		}
		if( sizeof($elements) <= 0 ) {
			echo sizeof($elements);
		}
    }

    function getRelatedElement(){
        $elements = $this->users->getRelatedElement($_POST['table'], $_POST['field'], $_POST['value']);
        echo '<option value="">-select-</option>'; 
        foreach($elements as $el)
            echo '<option value="'.$el['id'].'">'.$el[$_POST['field_fetch']].'</option>';
    }
    
    
    function getRelatedElementTwo(){
        $elements = $this->users->getRelatedElementTwo($_POST['table'], $_POST['field1'], $_POST['value1'], $_POST['field2'], $_POST['value2']);
        echo '<option value="">-select-</option>';
		// common::pr($elements);
        foreach($elements as $el)
            if($_POST['table']=='tbl_section2trade_view')
                echo '<option value="'.$el['trade_id'].'">'.$el[$_POST['field_fetch']].'</option>';
            else
                echo '<option value="'.$el['id'].'">'.$el[$_POST['field_fetch']].'</option>';
    }    
     
    function getRelatedElementText(){
        $elements = $this->users->getRelatedElement($_POST['table'], $_POST['field'], $_POST['value']);
        foreach($elements as $el)
            echo '<option>'.$el[$_POST['field_fetch']].'</option>';
    }
    
    function getTableColumn(){
        if($_POST['field']!='status'){
            $elements = $this->users->getTableColumn($_POST['table'], $_POST['field']);
            foreach($elements as $el)
                echo '<option>'.$el[$_POST['field']].'</option>'; 
        }else{
            echo '<option>Active</option>'; 
            echo '<option>Inactive</option>'; 
        }
    }
	
	function getUserByID()
	{
		$rows = $this->users->getUserByID($_POST['email'], 'id', 1);
		echo (sizeof($rows)) ? true : false;		
	}
    
    function validateEmail(){
        echo $this->users->validateEmail($_POST['email']);
    }
    
    function validateNickname(){
        echo $this->users->validateNickname($_POST['nickname']);
    }
    
    function validateTypename()
	{
        echo $this->users->validateTypename($_POST['typename']);
    }
	
	function validatePriceSection()
	{
        echo $this->parentdb->validatePriceSection($_POST['price_settingsname']);
    }
	
	function validateRegulationTitle(){
        echo $this->regulation->validateRegulationTitle($_POST['regulation_title']);
    }
	
	function validateLibraryType(){
        echo $this->libraries->validateLibraryType($_POST['librarytypename']);
    }
    
    function update_meta(){
        $this->_security();
        $data = $this->commonHead();
        
		$urlstring	= '';
        $type 		= (isset($_GET['type'])&&$_GET['type']) ? $_GET['type']:'';
		$id 		= (isset($_GET['id'])&&$_GET['id']) ? $_GET['id']:'';
		$reggroupid = (isset($_GET['reggroupid'])&&(int)$_GET['reggroupid']) ? $_GET['reggroupid']:'';

		$arrNoDuplicateCheck = array('regulation_sections', 'regulation_contents', 'usertypeallowance');

		if( "library_types" == $type ) {
			$rows_unions = $this->users->getMetaDataList('user', 'type_id=7 AND status=1', '', 'id, nickname');
			$data['rows_unions'] = $rows_unions;
		}

        if($_SERVER['REQUEST_METHOD']=='POST'){
            if( $_POST['type'] != 'administrator' && !in_array($type, $arrNoDuplicateCheck) ) {
				$duplicate = $this->users->duplicateCheck($_POST['id'], $_POST['type'], $_POST['field']);
			}
            else {
                $duplicate = 0;
			}

            if($duplicate<1) {
				switch($_POST['type']) {
					case 'price_settings':
						$this->parentdb->updatePriceSettings();
						break;
					case 'regulations':
						$this->regulation->updateRegulation();
						break;
					case 'library_types': {
						$this->libraries->updateLibraryType();
						break;
					}
					case 'usertype':
						$this->users->updateUserType();
						break;
					case 'industry':
						$this->adminsettings->updateIndustry();
						break;   
					case 'section':
						$this->adminsettings->updateSector();
						break;    
					case 'trade':
						$this->adminsettings->updateTrade();
						break;     
					case 'country':
						$this->adminsettings->updateCountry();
						break;     
					case 'province':
						$this->adminsettings->updateProvince();
						break;  
					case 'city':
						$this->adminsettings->updateCity();
						break;  
					case 'usertypeallowance':
						$this->users->updateUserTypeAllowance();
						break;  
					case 'point_page':
						$this->points->updatePagePoints();
						break;
					case 'administrator':
						$up 		= $this->users->userProfileImageUpload('userfile', $this->path_upload_profiles, "profile".$id);
						$attachment = ($up) ? $up['userfile']['name'] : '';
						
						$this->users->updateAdministrator($attachment);
						break;                                                                                  
				}
				redirect($this->base.'admin/metadata?type='.$type.$urlstring);
			}
            else {
                $data['update'] = 'duplicated';
            }
        }
        $data['admin'] = $this->users->getElementByID('tbl_'.$type, (int)$id);
        $this->load->view('update_'.$type, $data); 
    }

    function getAllowanceByUserTypeID(){
        $this->_security();
        $data = $this->commonHead();
        
        $data['admin'] = $this->users->getElementByID('tbl_usertypeallowance', (int)$_POST['id']);
        $data['type_id'] = (int)$_POST['id'];
        echo $this->load->view('usertypeallowance_single_view', $data, true);
    }
    /********begin hrq marcio codes**********/
	    /****** Charities ******/
    function charities(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('charities', $data); 
    }
    function knowyourrights_metro(){
        $data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";

        $this->load->view('knowyourrights_metro', $data); 
    }
    function youngworkers_metro(){
        $data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";

        $this->load->view('youngworkers_metro', $data); 
    }
	
	    /****** Digital Project Admin Style******/
    function dig_project_admin(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('dig_project_admin', $data);
    }
	
	    /****** Skilled Job Section ******/
    function skilledjob(){
		$data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('skilledjob', $data); 
    }
	    /****** Skilled Job Main Section Metro Style ******/
    function skilledjob_main()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";

        $this->load->view('skilledjob_main', $data); 
    }
	    /****** Skilled Job Construction Section Metro Style ******/
    function skilledjob_constr()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";
        $this->load->view('skilledjob_constr', $data); 
    }	
	    /****** Skilled Job Industrial Section Metro Style ******/
    function skilledjob_ind(){
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";
        $this->load->view('skilledjob_ind', $data); 
    }	
		    /****** Skilled Job Motive Power Section Metro Style ******/
    function skilledjob_mp(){
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";
        $this->load->view('skilledjob_mp', $data); 
    }			
		    /****** Skilled Job Trade Power Section Metro Style ******/
    function skilledjob_trade(){
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";
        $this->load->view('skilledjob_trade', $data); 
    }
	
		    /****** Skilled Job Construction page - Sep-10******/
    function constr_skilled_trade(){
        $data = $this->commonHead();
        $data['module'] = "profile";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }

		$this->load->view('constr_trade', $data); 
    }
	
	 /****** Skilled Job Construction page - METRO STYLE MAY 04 2014*****/
    function constr_trade_metro(){
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }

		$this->load->view('constr_trade_metro', $data); 
	}
		
		    /****** Skilled Job Industrial page - Sep-10******/
    function ind_skilled_trade(){
        $data = $this->commonHead();
        $data['module'] = "profile";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }

		$this->load->view('ind_trade', $data); 
    }
	
	    /****** Skilled Job Industrial page - METRO STYLE MAY 04 2014*****/
    function ind_trade_metro(){
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }

		$this->load->view('ind_trade_metro', $data); 
    }


		    /****** Skilled Job Motive Power page - Sep-10******/
    function mpower_skilled_trade(){
        $data = $this->commonHead();
        $data['module'] = "profile";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }
		$this->load->view('mpower_trade', $data); 
    }
	
		    /****** Skilled Job Motive Power page - METRO STYLE MAY 04 2014******/
    function mpower_trade_metro(){
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }
		$this->load->view('mpower_trade_metro', $data); 
    }

		    /****** Skilled Job Trade Certification Service page - Sep-10******/
    function cert_skilled_trade(){
        $data = $this->commonHead();
        $data['module'] = "profile";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }

		$this->load->view('cert_trade', $data); 
    }
	
	/****** Skilled Job Trade Certification Service page -METRO STYLE MAY 04 2014******/
    function cert_trade_metro(){
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		if(isset($_GET['item'])){
            $data['item'] = $_GET['item'];
        }

		$this->load->view('cert_trade_metro', $data); 
    }

	    /****** Ontario Health & Safety Network ******/
    function hsnetwork()
	{
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('hsnetwork', $data); 
    }
	    /****** Ontario Health & Safety Network Metro Style ******/
    function hsnetwork_metro()
	{
        $data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";

        $this->load->view('hsnetwork_metro', $data); 
    }
	    /****** About Us ******/
    function aboutus(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data['base']=$this->base;
            $user = $this->users->getUserByEmail($this->sess_useremail);
            $data['fname'] = $user['firstname'];
            $data['meberemail'] = $this->sess_useremail;
            $data['name'] = $_POST['name'];
            $data['phone'] = $_POST['phone'];
            $data['email'] = $_POST['email'];
            $data['message'] = nl2br($_POST['message']);
            
			// Send email to s1 contact person //				
				$email_body = $this->load->view('email_templates/contact', $data, true);
				$this->users->sendEmailToS1user($this->config->item('contact_email'), $this->config->item('site_email'), 'One member sent a message from www.mys1s.ca website', $email_body);

			// Send email to entered email //
				$email_body = $this->load->view('email_templates/thankyou', $data, true);
				$this->users->sendEmailToS1user($_POST['email'], $this->config->item('site_email'), 'Thank you for your contact', $email_body);
        }
        $this->load->view('aboutus', $data); 
    }
	    /****** About Us Metro Style******/
    function aboutus_metro(){
        $data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";

        if($_SERVER['REQUEST_METHOD']=='POST') {
			$this->contactusSendEmail();
        }
        $this->load->view('aboutus_metro', $data); 
    }

	function contactusSendEmail()
	{		
		$redirect_page 		= $this->input->get('redirect_page');		
		$data['base']		= $this->base;
		$user 				= $this->users->getUserByEmail($this->sess_useremail);
		$data['fname'] 		= $user['firstname'];
		$data['meberemail'] = $this->sess_useremail;
		$data['name'] 		= $this->input->post('name') ? $this->input->post('name') : '';
		$data['phone'] 		= $this->input->post('phone') ? $this->input->post('phone') : '';
		$data['email'] 		= $this->input->post('email') ? $this->input->post('email') : '';
		$data['message']	= nl2br($this->input->post('message')) ? nl2br($this->input->post('message')) : '';;

		// Send email to s1 contact person //
			$email_body = $this->load->view('email_templates/contact', $data, true);
			$this->users->sendEmailToS1user($this->config->item('contact_email'), $this->config->item('site_email'), 'One member sent a message from www.mys1s.ca website', $email_body);

		// Send email to entered email //
			$email_body = $this->load->view('email_templates/thankyou', $data, true);
			$this->users->sendEmailToS1user($_POST['email'], $this->config->item('site_email'), 'Thank you for your contact', $email_body);

		redirect($base."admin/".$redirect_page);die();		
	}

		    /****** FAQ ******/
    function faq(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('faq', $data); 
    }
    function terms_metro()
	{
        $data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";

        $this->load->view('terms_metro', $data); 
    }
    function privacy_metro(){
        $data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";

        $this->load->view('privacy_metro', $data); 
    }
    /****** Map ******/
    function map()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
        $this->load->view('map', $data); 
    }
	    /****** Points Benefits ******/
    function benefits()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
        $this->load->view('benefits', $data); 
    }
	    /****** News ******/
    function news(){
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";

		$data['tile'] 	= isset($_GET['tile']) ? $_GET['tile'] : '';

		switch( $data['tile'] ) {
			case '1': { // RSS from the Ontario Employer Advisor //
				$this->load->library('RSSParser', array('url' => 'http://feeds.lexblog.com/OntarioEmployerAdvisor','life' => 2));
				$data['rss_heading'] = 'News from the Ontario Employer Advisor';
				$data['rss_external_link'] = "http://www.ontarioemployerlaw.com/";
				break;
			}

			case '2': { // RSS from Ministry of Labour //
				$this->load->library('RSSParser', array('url' => 'http://news.ontario.ca/newsroom/en/rss/','life' => 2));
				$data['rss_heading'] = 'News from the Ministry of Labour';
				$data['rss_external_link'] = "http://www.labour.gov.on.ca/english/";
				break;
			}

			case '3': { // RSS from Canadian Centre for Occupational Health and Safety //
				$this->load->library('RSSParser', array('url' => 'http://ccohs.ca/rss/headlines.rss','life' => 2));
				$data['rss_heading'] = 'News from Canadian Centre for Occupational Health and Safety';
				$data['rss_external_link'] = "http://www.ccohs.ca/";
				break;
			}
			case '4': { // RSS from Canadian Occupational Safety Magazine //
				$this->load->library('RSSParser', array('url' => 'http://feeds.feedburner.com/CosMagazine','life' => 2));
				$data['rss_heading'] = 'News from Canadian Occupational Safety Magazine';
				$data['rss_external_link'] = "http://www.cos-mag.com/";
				break;
			}
			case '5': { // RSS from Workplace Safety and Insurance Board //
				$this->load->library('RSSParser', array('url' => 'http://www.wsib.on.ca/WSIBPortal/faces/WSIBRSSFeedPage?fGUID=835502100635000837&rDef=WSIB_RD_NOTEWORTHY&_afrLoop=2725533503816000&_afrWindowMode=0&_afrWindowId=xrm9h6doi_35','life' => 2));
				$data['rss_heading'] = 'News from Workplace Safety and Insurance Board';
				$data['rss_external_link'] = "http://www.wsib.on.ca/WSIBPortal/faces/WSIBHomePage?lang=en&_afrLoop=2390557206187000&_afrWindowMode=0&_afrWindowId=null#%40%3F_afrWindowId%3Dnull%26_afrLoop%3D2390557206187000%26lang%3Den%26_afrWindowMode%3D0%26_adf.ctrl-state%3De4i26fl6r_4";
				break;
			}
			case '6': { // RSS from Workplace Safety and Insurance Appeals Tribunal //
				$this->load->library('RSSParser', array('url' => 'http://www.wsiat.on.ca/wsiatfeed.asp','life' => 2));
				$data['rss_heading'] = 'News from Workplace Safety and Insurance Appeals Tribunal';
				$data['rss_external_link'] = "http://www.wsiat.on.ca/";
				break;
			}
		}
        $this->load->view('news', $data); 
    }
	
	/****** Safety Equipments Construction******/
    function construction()
	{
		$this->load->library('googletranslatetool');
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$from_lang 		= $data['from_lang']= 'en';
		$to_lang 		= $data['to_lang'] 	= $this->session->userdata('safetyequip_tolang');
        $this->load->view('equip-trades/construction', $data); 
    }
	/****** Safety Equipments Nurse******/

    function nurse()
	{
		$this->load->library('googletranslatetool');
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$from_lang 		= $data['from_lang']= 'en';
		$to_lang 		= $data['to_lang'] 	= $this->session->userdata('safetyequip_tolang');		
        $this->load->view('equip-trades/nurse', $data); 
    }
	    /****** Safety Equipments Firefighter******/
		
    function firefighter(){
		$this->load->library('googletranslatetool');
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$from_lang 		= $data['from_lang']= 'en';
		$to_lang 		= $data['to_lang'] 	= $this->session->userdata('safetyequip_tolang');		
        $this->load->view('equip-trades/firefighter', $data); 
    }
	    /****** Safety Equipments Hockey******/
		
    function hockey(){
		$this->load->library('googletranslatetool');
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$from_lang 		= $data['from_lang']= 'en';
		$to_lang 		= $data['to_lang'] 	= $this->session->userdata('safetyequip_tolang');		
        $this->load->view('equip-trades/hockey', $data); 
    }

	    /****** Digital Hazards Construction******/
    function hazard(){
        $data = $this->commonHead();
        $data['module'] = "dashboard";
        $data['pageID'] = 1;

        $this->load->view('hazard', $data); 
    }
	    /****** Digital Hazards Office******/
    function hazard_office(){
        $data = $this->commonHead();
        $data['module'] = "dashboard";
        $data['pageID'] = 1;

        $this->load->view('hazard_office', $data); 
    }
    function fatality_metro()
	{
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";

		$fat_type  				= $data['fat_type'] = isset($_GET['fat']) ? $_GET['fat'] : '';
		$current_page  			= $data['current_page'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$records_limit  		= $data['records_limit'] = 18;
		$total_fatality_videos  = $this->users->getMetaDataList('fatality_videos', 'in_fatality_video_status=1 AND st_fatality_video_type="'.$fat_type.'"', '', 'COUNT(id) AS total_rows');
		$total_fatality_videos  = $data['total_fatality_videos'] = isset($total_fatality_videos[0]['total_rows']) ? $total_fatality_videos[0]['total_rows'] : 0;
		$limit_fatality 		= ((($current_page-1)*$records_limit)).','.$records_limit;

		$rows_fatality_videos 	= $data['rows_fatality_videos'] = $this->users->getMetaDataList('fatality_videos', 
									'in_fatality_video_status=1 AND st_fatality_video_type = "'.$fat_type.'"', '', 
									'id, st_fatality_video, st_fatality_video_thumbnail, st_fatality_video_title', '', $limit_fatality);

		if ('' != $fat_type) {
			$this->load->view('fatality_'.$fat_type.'_metro', $data); 
		}
		else {
			$this->load->view('fatality_metro', $data);
		}
    }
	
	    /****** Tutorial ******/
    function tutorial()
	{
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('tutorial', $data); 
    }
    function getstart_metro()
	{
		$this->load->library('googletranslatetool');
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		
		$data['from_lang']= ($this->session->userdata('s1lib_fromlang')) ? $this->session->userdata('s1lib_fromlang') : 'en';
		$data['to_lang']= ($this->session->userdata('s1lib_tolang')) ? $this->session->userdata('s1lib_tolang') : 'en';

		if( '7' != $this->sess_usertype ) {
			$getstarted_points 		= $this->points->getPagePointsByUserID($this->sess_userid, 15, 2);
			$getstarted_points		= isset($getstarted_points['points']) ? $getstarted_points['points'] : 0;
			$add_getstarted_points 	= ($getstarted_points<=0) ? $this->points->addPagePoints($this->sess_userid, 2, 15) : '';
		}
        $this->load->view('getstart_metro', $data); 
    }

	
	    /****** Union S1 Plus page ******/
    function union_s1plus(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('union_s1plus', $data); 
    }
	    /****** Union Newsletter page ******/
    function union_newsletter(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('union_newsletter', $data); 
    }
	    /****** Union Skilled Jobs Training page ******/
    function union_skilledjobs(){
		$data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('union_skilledjobs', $data); 
    }
	    /****** Union Search Union page ******/
    function search_union(){
		$data = $this->commonHead();
        $data['module'] = "profile";

		$industry 				= isset($_POST['cmb_industry_id']) ? $_POST['cmb_industry_id'] : '';
		$data['industry_id']	= $industry;
		$union_text 			= isset($_POST['txt_union_text']) ? $_POST['txt_union_text'] : '';
		$data['txt_union_text'] = $union_text;

		$data['usermeta'] 		= $this->users->getUserMetaByID($this->sess_userid);
		$data['display_msg']	= "Please select at least one search criteria to get the data.";

        $this->load->view('union_search_view', $data); 
    }
	
	    /****** Union View My Unions page ******/
    function my_union(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('my_union', $data); 
    }
	    /****** Union just one public view ******/
    function view_union(){
        $data = $this->commonHead();
        $data['module'] = "profile";
		$sector 				= isset($_POST['cmb_sector']) ? $_POST['cmb_sector'] : '';
		$data['cmb_sector']		= $sector;		

		$role_title 			= isset($_POST['cmb_job_title']) ? $_POST['cmb_job_title'] : '';
		$data['cmb_job_title']	= $role_title;
		
		$unionreps_text 			= isset($_POST['txt_unionreps_text']) ? $_POST['txt_unionreps_text'] : '';
		$data['txt_unionreps_text'] = $unionreps_text;
		
		$data['display_msg']	= "Please select at least one search criteria to get the data.";

        $this->load->view('union_public_view', $data); 
    }
	
	
	
	
	
	
	    /****** Union Events just for one******/
    function union_events(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('union_events', $data); 
    }

 /****** Union NEWS just for one union******/
    function union_news(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('union_news', $data); 
    }
 /****** Union Training just for one union******/
    function union_training(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $this->load->view('union_training', $data); 
    }
    function testmap(){
        $data = $this->commonHead();
        $data['module'] = "profile";
		$this->load->view('testmap', $data); 
    }
/********end hrq marcio codes**********/

    /****** Profile Setting ******/
    function profile_setting()
	{
        $data = $this->commonHead();
        $type = $this->users->getElementByID('tbl_usertype', $this->sess_usertype);

		if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
            if($_POST['page'] != "myworkers") {
                if( $_POST['page'] == "personal" ) {
                    $ret_files 		= $this->users->userProfileImageUpload('userfile', $this->path_upload_profiles, "profile".$this->sess_userid);
					// common::pr( $ret_files);die;
                    $attachment = ($ret_files) ? $ret_files['userfile']['name'] : '';
                    $this->users->updateUserBasicInfoByID($this->sess_userid, $attachment);
                }
				
				// common::pr($_POST);// die;
                $this->users->updateUserMetaByID($this->sess_userid, $this->sess_usertype, $_POST);

				// Worker Automatically Connected with the Selected Union(s) //
					if( $_POST['page'] == "professional" ) {
						if( 9 == $this->sess_usertype || 8 == $this->sess_usertype ) { // UserType: Employer / Worker
							if( isset($_POST['union']) && $_POST['union'] ) {
								foreach( $_POST['union'] AS $myunion_key => $myunion_value ) {
									if( "new" === $myunion_key ) {
										foreach( $myunion_value AS $myunion_newkey => $myunion_newvalue ) {
											$post_union 			= $myunion_newvalue;
											$rows_training_centre 	= $this->users->getUserConnc($post_union, '1');

											if( isset($rows_training_centre[0]['meta_value']) && (int)$rows_training_centre[0]['meta_value'] ) { // Selected User's Union id //
												$sel_user_unionid 	= $rows_training_centre[0]['meta_value'];
												$sel_userid 		= $rows_training_centre[0]['user_id'];
												$sel_user_unions 	= $this->users->getMetaDataList( 'user_unions', 'in_user_id="'.$this->sess_userid.'" 
																		AND in_union_id="'.$sel_user_unionid.'"', '', 'COUNT(in_union_id) AS is_sel_userunion' );
												$is_union_ofseluser_unionmember 	= isset($sel_user_unions[0]['is_sel_userunion']) ? $sel_user_unions[0]['is_sel_userunion'] : '';

												if( $is_union_ofseluser_unionmember ) { // If union of selected training centre is union member then
																		 // connect directly to selected training centre and it's main unions //
													// Connect directly to Selected UTC and it's Main Unions //
														Ajax::connectUnionAndItsTrainingCentres($sel_userid, '1');
												}
											}
										}
									}
									else {
										$post_union 			= $myunion_value;
										$rows_training_centre 	= $this->users->getUserConnc($post_union, '1');
										if( isset($rows_training_centre[0]['meta_value'])&&(int)$rows_training_centre[0]['meta_value'] ) { // Selected User's Union id // 
											$sel_user_unionid 	= $rows_training_centre[0]['meta_value'];
											$sel_userid 		= $rows_training_centre[0]['user_id'];
											$sel_user_unions 	= $this->users->getMetaDataList( 'user_unions', 
																'in_user_id="'.$this->sess_userid.'" AND in_union_id="'.$sel_user_unionid.'"', '', 'COUNT(in_union_id) AS is_sel_userunion' );
											$is_union_ofseluser_unionmember = isset($sel_user_unions[0]['is_sel_userunion']) ? $sel_user_unions[0]['is_sel_userunion'] : '';

											if( $is_union_ofseluser_unionmember ) { // If union of selected training centre is union member then
																	 // connect directly to selected training centre and it's main unions //
												// Connect directly to Selected UTC and it's Main Unions //
													Ajax::connectUnionAndItsTrainingCentres($sel_userid, '1');
											}
										}
									}
								}								
							}
							else {
								$deleted_union_id = $_POST['deleted_union'];
								$this->users->connectIgnore( $deleted_union_id, $this->sess_userid );
							}
						}
					}
            }
			else {
                if( isset($_POST['action']) && $_POST['action'] == "SEARCH" ) {
                    $data['worker'] = $this->users->getMyWorkerByUserID($this->sess_userid, $this->sess_usertype, 1, $_POST['name']);
					$data['worker'] = $data['worker'][0];
                    if(count($data['worker'])>0) {
                        $data['workermeta'] = $this->users->getUserMetaByID($data['worker']['id']);
					}
                }
                else {
					$this->users->updateUserMetaByID( $_POST['userid'], 0);
					$instructor_key = (isset($_POST['instructor_key'])&&$_POST['instructor_key']) ? $_POST['instructor_key'] : '';
					isset($_POST['instructor_pwd']) && $_POST['instructor_pwd'] ? $instructor_key = $_POST['instructor_pwd'] : '';
					$is_my_worker = (isset($_POST['my_worker'])&&$_POST['my_worker']) ? $_POST['my_worker'] : '';

					$instructor_email 	= $this->users->getMetaDataList( 'user', 'id = "'.$_POST['userid'].'"', '', 'email_addr' );
					$instructor_email	= $instructor_email[0]['email_addr'];

					$union_instructor 		= (isset($_POST['union_instructor']) && $_POST['union_instructor']) ? $_POST['union_instructor'] : '';
					$consultant_instructor 	= (isset($_POST['consultant_instructor']) && $_POST['consultant_instructor']) ? $_POST['consultant_instructor'] : '';

					$data['worker'] 		= $this->users->getUserByID($_POST['userid']);
					$data['workermeta'] 	= $this->users->getUserMetaByID($_POST['userid']);

					if( $instructor_key && ("y"==$is_my_worker && ("y"==$union_instructor||"y"==$consultant_instructor)) ) {
						// echo " instructor_key: ".$instructor_key." instructor_email: ".$instructor_email." consultant_instructor: ".$consultant_instructor;
						// die;
						$this->send_instructor_email( $instructor_email, $instructor_key, $_POST['userid'], $consultant_instructor );
					}
                }
            }
        }

        $data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid); 
        if(strtolower($type['typename']) == "union") {
            $data['boards'] = $this->users->getBoardMembersByUnionID($this->sess_userid);
		}
        if(isset($_GET['msg']) && $_GET['msg']==1) {
            $data['textmsg'] = lang('msg_complete_profile_before_checkout');
		}
		$data['module'] = "setting";
		
		
		$controller_redirect= (isset($_POST['action']) && $_POST['action']) ? 'profile_view' : 'profile_view_integrated';
		$controller_redirect= (isset($_POST['page_redirect']) && $_POST['page_redirect']) ? $_POST['page_redirect'] : $controller_redirect;
		
		$section 			= (isset($_GET['section']) && $_GET['section']) ? $_GET['section'] : 'personal';
		if( isset($_POST['page_design']) && "metro" == strtolower($_POST['page_design']) ) {
			$this->session->set_flashdata('data', $data);
			$this->session->set_flashdata('postdata', $_POST);
			// header('Location:'.$base.'admin/'.$controller_redirect);die;
			redirect( $base.'admin/'.$controller_redirect );die;
		}
		else {
			// $view_url = 'profile_'.strtolower($type['typename'])."_".$section; // Commented because in case of admin and unions, no workers view page exists //
			$view_url = 'profile_employer_'.$section; // To get workers data of Employer, Unions //
			$this->load->view( $view_url, $data );
		}
    }
    
    /****** dashboard ******/
    function dashboard(){
		// $qry = mysql_query("update tbl_user set status=1 where email_addr = 'gtltest1234@gmail.com'");
		
        $data 						= $this->commonHead();
        $data['module'] 			= "dashboard";
		$data['s1_getstarted_tiles']= 16; // 16=total no. of page sections in the point page sections table //
		$data['user_already_login_firsttime'] = '';
		
		if( "7" != $this->sess_usertype ) {
			$rows = $this->points->hasUserGainedPointsGetPoints(7, 20, 1);
			$data['user_already_login_firsttime'] = $rows['has_points_gained'];

			if( !$data['user_already_login_firsttime'] ) { // Check User has login firsttime //
				// Add Firsttime Login points // 
					$add_pagesection_points = $this->points->addPagePoints($this->sess_userid, 7, 20);

				$data['firsttime_login_points'] = $rows['page_points'];
			}
		}
		$this->load->view('dashboard_view', $data);	
    }
 
    /****** profile ******/
    function profile()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		
		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr, type_id');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;
		$user_typeid 	= isset($user_details[0]['type_id']) ? $user_details[0]['type_id'] : $this->sess_usertype;

		$data['usermeta'] = $this->users->getUserMetaByID($userid); 

		// Alerts //
			$users_alerts = $this->adminsettings->getHazardAlerts($userid);
			$data['users_alerts'] = isset($users_alerts) ? $users_alerts : array();
			// Common::pr($users_alerts);

		// Messages //
			$rows_my_messages = $this->users->getMyMessages($useremail, 0, 1);
			$data['rows_my_messages'] = isset($rows_my_messages) ? $rows_my_messages : array();
			$data['my_total_new_messages'] = $this->users->newMessageCount($useremail);

		// To call different profile home according to usertype
			switch(strtolower($user_typeid))
			{
				case '8': {//'employer';
					$this->load->view('profile_home_employer', $data);
					break;
				}
				case '9': {//'worker';
					$this->load->view('profile_home_worker', $data);
					break;
				}
				case '11': {//'STUDENT';
					$this->load->view('profile_home_student', $data);
					break;
				}
				case '7': {//'union';
					$this->load->view('profile_home_union', $data);
					break;
				}
				case '1': {//'admin';
					$this->load->view('profile_home_admin', $data);
					break;
				}
				case '12': {//'consultant';
					$this->load->view('profile_home_consultant', $data);
					break;
				}
				default: {
					$this->load->view('profile_home', $data);
					break;
				}
			}
    }
	
	function consultant()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		  $data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);
		  
		  // Alerts //
		   $users_alerts = $this->adminsettings->getHazardAlerts($this->sess_userid);
		   $data['users_alerts'] = isset($users_alerts) ? $users_alerts : array();
		  // Messages //
		   $rows_my_messages = $this->users->getMyMessages($this->sess_useremail, 0, 1);
		   $data['rows_my_messages'] = isset($rows_my_messages) ? $rows_my_messages : array();
		   $data['my_total_new_messages'] = $this->users->newMessageCount($this->sess_useremail);
		  
			$this->load->view('profile_home_consultant', $data);
	}
	
	/****** profile ******/
	function profile_view()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 				= array_merge( $data_commonhead, $data_connection );
        $data['module'] 	= "dashboard";
		$data['usermeta'] 	= $this->users->getUserMetaByID($this->sess_userid);  
		
		$type = $this->users->getElementByID('tbl_usertype', $this->sess_usertype);
		
		// Get Union board members //
			if(strtolower($type['typename']) == "union") {
				$data['boards'] = $this->users->getBoardMembersByUnionID($this->sess_userid);
			}
		$this->load->view('profile_view', $data);
    }
	
	/****** NEW PROFILE VIEW - AUG 06 2014 ******/
	function profile_view_integrated()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";
		$data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);

		$data['section_allowed'] = in_array($this->sess_usertype, array(8)) ? "1" : "";

		// Alerts // Commented lines 2412, 2413 and 2414 - Marcio - Crash of the system Nov-18-2014	- Resolved by Kartik
			$users_alerts = $this->adminsettings->getHazardAlerts($this->sess_userid);
			$data['users_alerts'] = isset($users_alerts) ? $users_alerts : array();

		// Messages //
			$rows_my_messages = $this->users->getMyMessages($this->sess_useremail, 0, 1);
			$data['rows_my_messages'] = isset($rows_my_messages) ? $rows_my_messages : array();
			$data['my_total_new_messages'] = $this->users->newMessageCount($this->sess_useremail);
		
		$type = $this->sess_usertype;

		switch(strtolower($type)) {
			case '8': {//'employer';
				$this->load->view('profile_view_integrated_employer', $data);
				break;
			}
			case '9': {//'worker';
				$this->load->view('profile_view_integrated_worker', $data);
				break;
			}
			case '11': {//'student';
				$this->load->view('profile_view_integrated_student', $data);
				break;
			}
			case '7': {//'union';
				$this->load->view('profile_view_integrated_union', $data);
				break;
			}
			case '1': {//'admin';
				$this->load->view('profile_view_integrated_admin', $data);
				break;
			}
			case '12': {//'consultant';
				$this->load->view('profile_view_integrated_consultant', $data);
				break;
			}
			default: {
				$this->load->view('profile_view_integrated', $data);
				break;
			}
		}
    }
	
	
	function my_data_collection()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    = array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";
		
		$my_data_hazards 		= $this->users->getMyDataOfUser($this->sess_userid,'hazards');
		$data['my_data_hazards'] = $my_data_hazards['user_libraries']['hazards'];
		$my_data_safetytalks 	= $this->users->getMyDataOfUser($this->sess_userid,'safetytalks');
		$data['my_data_safetytalks'] = $my_data_safetytalks['user_libraries']['safetytalks'];
		$my_data_procedures 	= $this->users->getMyDataOfUser($this->sess_userid,'procedures');
		$data['my_data_procedures'] = $my_data_procedures['user_libraries']['procedures'];
		$my_data_inspections 	= $this->users->getMyDataOfUser($this->sess_userid,'inspections');
		$data['my_data_inspections'] = $my_data_inspections['user_libraries']['inspections'];
		$my_data_training 		=  $this->users->getMyDataOfUser($this->sess_userid,'training');
		$data['my_data_training'] = $my_data_training['user_libraries']['training'];
		$my_data_investigations = $this->users->getMyDataOfUser($this->sess_userid,'investigations');
		$data['my_data_investigations'] = $my_data_investigations['user_libraries']['investigations'];

		$my_data_employers = $this->users->getMyDataOfUser($this->sess_userid,'my_employers');
		$data['my_data_employers'] = $my_data_employers['user_libraries']['my_employers'];

		$my_user_wallet = $this->users->getMyDataOfUser($this->sess_userid,'user_wallet');
		$data['my_user_wallet'] = $my_user_wallet['user_wallet'];
		
		$data['total_available_credits'] = $this->points->getS1Credits();

		if( isset($_GET['design']) && $_GET['design']==1 ) {
			$this->load->view('data_collection/my_data_collection', $data);
		}
		else {
			$this->load->view('my_data_collection', $data);
		}
	}
	
	function data_collection()
	{
		$this->_security();
        $data = $this->commonHead();
		
		$data_type = $data['data_type'] = (isset($_GET['datatype']) && $_GET['datatype']) ? $_GET['datatype'] : '';
		
		if( "library" == $data_type ) {
			$where_arr['user'] = '';
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				($_POST['txt_username']) ? $where_arr['user'] = ' AND (firstname LIKE "%'.$_POST['txt_username'].'%" OR lastname LIKE "%'.$_POST['txt_username'].'%")' : '';
			}
			$rows_my_data = $this->users->getDataCollection($data_type, $where_arr);
			$data['rows_my_data'] = $rows_my_data;
		}
		else if( "user" == $data_type ) {
			$where_arr['user'] = '';
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				($_POST['cmb_industry']) ? $where_arr['user'] .= ' AND industry_id = "'.$_POST['cmb_industry'].'"' : '';
				($_POST['txt_username']) ? $where_arr['user'] .= ' AND (firstname LIKE "%'.$_POST['txt_username'].'%" OR lastname LIKE "%'.$_POST['txt_username'].'%")' : '';
				($_POST['txt_useremail']) ? $where_arr['user'] .= ' AND email_addr LIKE "%'.$_POST['txt_useremail'].'%"' : '';
			}
			$rows_my_data = $this->users->getDataCollection($data_type, $where_arr);
			$data['rows_my_data'] = $rows_my_data;
		}
		$this->load->view('data_collection_view', $data);
	}

	function myworkers_metro()
	{
		if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
			if( isset($_POST['arr_mybadge']) ) {
				$this->session->set_userdata('badge_id', $_POST['arr_mybadge'][0]['badge_id']);
				$this->session->set_userdata('badge_title', $_POST['arr_mybadge'][0]['badge_title']);
				$this->session->set_userdata('libtype_bought', $_POST['arr_mybadge'][0]['libtype_bought']);
			}
			else {
				$txt_crew_label 		= $this->input->post('txt_crew_label');
				$selected_crew_workers 	= $this->input->post('selected_crew_workers');
				$id_supervisor 			= $this->input->post('cmb_supervisor');

				// Create New Crew //
					$arr_add_myworkers 	= array('in_crew_employer_id'=> $this->sess_userid, 
												'in_supervisor_id'   => $id_supervisor, 
												'st_crew_label'		 => $txt_crew_label, 
												'st_crew_workers'	 => $selected_crew_workers, 
												'in_crew_status'	 => 1);
					$crew_id = $this->parentdb->manageDatabaseEntry('tbl_crew_of_employers', 'INSERT', $arr_add_myworkers);
			}
		}

		if( $this->sess_usertype == '8' || $this->sess_usertype == '7' || $this->sess_usertype == '12') { // Employer, Union, Consultant //		
			$data 			= $this->commonHead();
			$data['module'] = "dashboard";

			$redirect_from 	= $data['redirect_from'] = $this->input->get('redirect_from');
			$txt_username 	= $this->input->post('txt_username');
			$cmb_usertype 	= $this->input->post('cmb_usertype');

			$data['links'] 	= $this->users->getMyLinksByUserID($this->sess_userid, $this->sess_usertype, 1, 'firstname LIKE "%'.$txt_username.'%"');
			$data['rows_my_crews'] = $this->users->getMetaDataList("crew_of_employers",'in_crew_status=1 AND in_crew_employer_id = "'.$this->sess_userid.'"', '', 'in_crew_id, st_crew_label');

			if( $data['user']['type_id']>1 ) {
				$this->load->view('myworkers_metro', $data);
			}
			else {
				$this->load->view('assign_admin_view', $data);
			}
		}
		else {
			redirect($base.'admin/profile_view_integrated');
		}
    }
	
	/****** Reward page metro style******/
	function reward()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";
		$data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);  
		
		$my_user_wallet = $this->users->getMyDataOfUser($this->sess_userid,'user_wallet');
		$data['my_user_wallet'] = $my_user_wallet['user_wallet'];
		
		$this->load->view('reward', $data);
    }
	
    /****** general ******/
    function general()
	{
        $data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
        $data['module'] = "dashboard";
		$data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);  

		$this->load->view('general', $data);
    }

		/****** connection group metro style ******/
    function connection()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		$data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);  
		$this->load->view('connection', $data);
    }

    function mylibrary(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        
        $data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);  
        $data['documents_assigned'] = $this->libraries->getAssignedDocumentsByUserID($this->sess_userid);
        $data['documents_purchased'] = $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $this->sess_userid);
        $data['documents_completed'] = $this->libraries->getCompletedDocumentsByUserID($this->sess_userid);
        $this->load->view('mylibrary_view', $data); 
    } 

    /****** message ******/
    function message()
	{
        $data 			= $this->commonHead();
        $data['module'] = "profile";

        if($_SERVER['REQUEST_METHOD']=='POST'){
			$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
            if($submit=="Send" || $submit=="Comply Action") {
                $this->users->sendMessage();
            }
            if($submit=="DELETE"){
                $this->users->deleteMessages($_POST['msg']);
            }
        }        
        $paged = isset($_GET['paged'])?(int)$_GET['paged']:0;

        $data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);  
        $data['messages'] = $this->users->getMyMessages($this->sess_useremail, $paged, 10);
        $data['totalmsg'] = $this->users->getMyTotalMessage($this->sess_useremail);
        $this->load->view('message_view', $data); 
    }
	
	// Messages section with new designs received on 06Nov2014 //
		function message_metro()
		{
			$data_commonhead= $this->commonHead();
			$data_connection= $this->commonConnection();
			$data 			= array_merge( $data_commonhead, $data_connection );
			$data['module'] = "dashboard";

			if( $_SERVER['REQUEST_METHOD']=='POST' ) {
				$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
				($submit=="Send") ? $this->users->sendMessage() : '';
			}
			// ON Feb-10-2016, changed parameters for sectionsRestricted for function getMyMessages() removed "assign"
			// Where assignments were not loaded on message page.
			$pgno_inbox 			= $data['pgno_inbox'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
			$total_inbox_messages 	= $this->users->getMyMessages( $this->sess_useremail, 0, '', array('alert') );
			$total_inbox_messages 	= $data['total_inbox_messages'] = sizeof($total_inbox_messages);

			$pgno_sent 				= $data['pgno_sent'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
			$total_sent_messages 	= $this->users->getMySentMessages($this->sess_useremail, 0);
			$total_sent_messages 	= $data['total_sent_messages'] = sizeof($total_sent_messages);

			// Inbox Messages //
				$data['rows_inbox_messages']= $this->users->getMyMessages($this->sess_useremail, ($pgno_inbox-1), $this->msg_rows_limit, array('alert'));
				
			// Sent Messages //
				$data['rows_sent_messages'] = $this->users->getMySentMessages($this->sess_useremail, ($pgno_sent-1), $this->msg_rows_limit);

			$this->load->view('message_view_metro', $data); 
		}
	
	
    function message_sent(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $paged = isset($_GET['paged'])?(int)$_GET['paged']:0;
        $data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);  
        $data['messages'] = $this->users->getMySentMessages($this->sess_useremail, $paged, 10);
        $data['totalmsg'] = $this->users->getMyTotalSentMessage($this->sess_useremail);
        $this->load->view('outbox_view', $data); 
    }

	
    function create_message(){
        $data = $this->commonHead();
        $data['module'] = "profile";
		$data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid);  
        $this->load->view('new_message_view', $data); 
    }

    function forward_message()
	{
        $data = $this->commonHead();

		$page_view 	= isset($_POST['page_view']) ? $_POST['page_view'] : 'page';
		$data['page_view'] = $page_view;

        ("modal"!=$page_view) ? $data['module'] = "profile" : '';

		$msg_id 	= (isset($_GET['msg_id'])&&(int)$_GET['msg_id']) ? (int)$_GET['msg_id'] : $_POST['msg_id'];

		("modal"!=$page_view) ? $data['usermeta'] = $this->users->getUserMetaByID($this->sess_userid) : '';
        $message = $data['message'] = $this->users->getMessageByID( $msg_id, 'read' );

		$this->load->view('forward_message_view', $data);
    }

	// Get Inbox messages
    function getMessage()
	{
		$data = $this->commonHead();
		$is_action_complied = $action_id = '';

		$msg_id 		= isset($_POST['msg_id']) ? $_POST['msg_id'] : 'page';
		$page_view 		= isset($_POST['page_view']) ? $_POST['page_view'] : 'page';
		$msg_section 	= isset($_POST['msgSection']) ? $_POST['msgSection'] : 'page';
		$msgbox_required= 'required';

        $message_to_view= $this->users->getMessageByID($msg_id, $_POST['status']);
		$to_userid 	= (isset($message_to_view['id']) && $message_to_view['id']) ? $message_to_view['id'] : '';
		$subj_msg 	= (isset($message_to_view['subject']) && $message_to_view['subject']) ? explode(" ", strtolower($message_to_view['subject'])) : '';
		$subj_msg[0] = isset($subj_msg[0]) ? $subj_msg[0] : '';
		$subj_msg[1] = isset($subj_msg[1]) ? $subj_msg[1] : '';
		$subj_msg[2] = isset($subj_msg[2]) ? $subj_msg[2] : '';
		$subj_msg[3] = isset($subj_msg[3]) ? $subj_msg[3] : '';
		
		$reply_section = $subj_msg[0].$subj_msg[1].$subj_msg[2].$subj_msg[3];
		if( in_array('connection', $subj_msg) && in_array('request', $subj_msg)) {
			
			$subj_msg = "CONNECTION_REQUEST";
		}
		$is_connec_request = '';
		
		switch ($reply_section){
			case "connectionrequest":
				$is_connec_request = '1';
				break;
			case "connectionremove":
				$is_connec_request = '1';
				break;
			case "connectionaccept":
				$is_connec_request = '1';
				break;
			case "badgehasbeenassigned":
				$is_connec_request = '1';
				break;
			case "safetytalks":
				$is_connec_request = '1';
				break;
		}
		
		// Check for the Accept Connection Request // 
			$link_status = '';
			
			// Set selected user's condition
				$where_peo_links = (in_array($this->sess_usertype, array(9,11))) ? " AND link_status IS NOT NULL AND employer_id = '".$to_userid."'" 
																				: " AND link_status IS NOT NULL AND worker_id = '".$to_userid."'";

				$where_org_links = (in_array($this->sess_usertype, array(8, 9, 11)) ) ? " AND link_status IS NOT NULL AND employer_id = '".$to_userid."'"
																					: " AND link_status IS NOT NULL AND worker_id = '".$to_userid."'";
				
			$people = $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, NULL, '*', $where_peo_links );
			$org 	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, NULL, '*', $where_org_links );
			// Common::pr($people); Common::pr($org);
			
			isset($people[0]['link_status']) ? $link_status = $people[0]['link_status'] : '0';
			isset($org[0]['link_status']) ? $link_status = $org[0]['link_status'] : '0';

		// $is_connec_request = ("CONNECTION_REQUEST" == $subj_msg) ? '1' : '0';

        $sender_name = !empty($message_to_view['firstname'])?$message_to_view['firstname']." ".$message_to_view['lastname']:$message_to_view['nickname'];
        echo '<div class="message-heading">';
        echo '<h4 class="pull-left">From: '.$sender_name.'</h4>';
		if( "modal" == $page_view ) {
			// AS PER PHILL REQUEST, THERE IS NO MORE FORWARD MESSAGE - ON SEP-15-2015
			//if( 1 != $is_connec_request ) {?>
				<!--a href="#modal_forward_msg<?php echo $msg_id;?>" data-toggle="modal" onclick="javascript:getForwardMsgModal('<?php echo $msg_id;?>');" class="btn btn-mini btn-info pull-right btn-forward cls-forward-msg<?php echo $msg_id;?>">Forward</a-->
				<?php 
			//}
			if('0' == $link_status && "CONNECTION_REQUEST" == $subj_msg) {?>
				<a href="#" send_to='<?php echo $to_userid;?>' class="btn btn-mini pull-right icon_accept">Accept</a>
				<?php 
			}
		}
		else {
			echo '<a href="'.$this->base.'admin/forward_message?msg_id='.$msg_id.'" class="btn btn-mini btn-info pull-right btn-forward">Forward</a>';  
		}
        echo '<div class="clear"></div>';
        echo '<p><b>Subject: </b>'.$message_to_view['subject'].'</p>';
        echo '</div>';
        echo '<div id="message-content">';
        echo '<form method="post" class="adminfrm">';
        echo str_replace('\\n', '<br />',  '<p><b>Message: </b></p><p class="s1content_body_section">'.$message_to_view['message'].'</p>');

        if($_POST['status']=="read") {
			if( 1 != $is_connec_request ) {
				echo '<div id="message-reply-wrapper">';			
				echo '<textarea rows="8" placeholder="Reply to this message" name="message" '.$msgbox_required.'></textarea>';
				echo '</div>';
			}
			if( "modal" == $page_view ) {
				echo '<input type="button" name="btn_delete_message" id="btn_delete_message" msg_id="'.$msg_id.'" value="Delete" class="danger pull-right" />';
			}
			if( 1 != $is_connec_request ) {
				echo '<input type="submit" name="submit" value="Send" class="primary pull-right" '.(($message_to_view['subject']=="Connection Rejected")?'disabled="disabled"':'').' />';
			}
            echo '<input type="hidden" name="subject" value="RE: '.$message_to_view['subject'].'" />';
            echo '<input type="hidden" name="send_to" value="'.$message_to_view['send_from'].'" />' ;
        }
        if($message_to_view['subject'] == "Client Request" && $this->sess_usertype == 8)
            {
                echo "<a href='' class='description idesc' data-toggle='modal' ><img src='".$this->base."img/icons/icon-investigation.png'>"
                     . "<span style='display:none;'><br/>Notice: Confirmation allows the Consultant to access and view all your data and profile</span></a>";
            }
        echo '</form></div>';
        echo'<br/><div class="modal-footer" style="margin-left: -40px;width: 110%;margin-bottom: -15px;">';
        $rows = $this->users->getUserByID('"'.$message_to_view['send_from'].'"', 'id', 1);
        $consultTantID = isset($rows[0]['id']) ? $rows[0]['id'] : 0;
        $dataStatus = $this->users->getDesignateStatus($this->sess_userid,$consultTantID);
        $designateStatus = isset($dataStatus[0]['designate_status']) ? $dataStatus[0]['designate_status'] : 0;
        if($message_to_view['subject'] == "Client Request" && $this->sess_usertype == 8 ) {
			if($designateStatus == 1){
				echo'<span style="margin-left: 30px;float:left"><input type="checkbox" id="'.$consultTantID.'" class="icon_client_accept" ></span>'
				. '<span style="padding:3px;float:left">Accept the Request of Client</span>';
			}
			else{
				echo'<span style="margin-left: 30px;float:left"><input type="checkbox" id="'.$consultTantID.'" class="icon_client_accept"></span>'
				. '<span style="padding:3px;float:left">Accept the Request of Client</span>';
			}
		}
		echo '<button class="btn" data-dismiss="modal">Close</button></div></div>';
		$this->load->view('get_inbox_message', $data);
    }
    
	// Get Sent messages
	function getSentMessage()
	{
		$message_to_view = $this->users->getMessageByID($_POST['msg_id'], $_POST['status']); 
		$sendto = $this->users->getUserByEmail($message_to_view['send_to']); 
		$sendto = isset($sendto['nickname']) ? $sendto['nickname'] : '';
		
		echo '<div class="message-heading">';
		echo '<h5 >To: '.$sendto.'</h5>';
		echo '<p><b>Subject: </b>'.$message_to_view['subject'].'</p></div>';
		echo '<div id="message-content">'.str_replace("\\n", "<br />", $message_to_view['message']).'</div>';
	}
	
	
    /****** connection ******/
    function connections()
	{
        $data = $this->commonHead();

        $data['module'] 	= "profile";
        $data['usermeta'] 	= $this->users->getUserMetaByID($this->sess_userid);
        $type 				= $this->sess_usertype;

		$data['peo_links'] = array();
		$data['org_links'] = array();
		
        if($_SERVER['REQUEST_METHOD']=='POST') {
            if($_POST['action']=="SEARCH") {
                switch($type){
                    case 9: case 11: // 9=Worker, 11=Student //
                        $data['org_links'] = $this->users->getOrganizationsForLinkByName($_POST['name'], $type);
                        $data['peo_links'] = array();
                        break;
                    case 7: case 8: // 7=Union, 8=Employer //
                        $data['peo_links'] = $this->users->getPeopleForLinkByName($_POST['name'], $type);
                        $data['org_links'] = $this->users->getOrganizationsForLinkByName($_POST['name'], $type);
                        break;
                }
			}
        }
		else {
            switch($type){
                case 9: case 11: // 9=Worker, 11=Student //
                    $data['org_links'] = $this->users->getMyOrganizationLinksByUserID($this->sess_userid, $type);
					$data['peo_links'] = array();
                    break;
                case 7: case 8: // 7=Union, 8=Employer //
                    $data['peo_links'] = $this->users->getMyPeopleLinksByUserID($this->sess_userid, $type);
                    $data['org_links'] = $this->users->getMyOrganizationLinksByUserID($this->sess_userid, $type);
                    break;
            }
        }
        $this->load->view('connections_view', $data);         
    }
    
    function connectRequest(){
        $this->users->connectRequest($_POST['id'], $_POST['from-id']);
        die("1");
    }
    
    function connectAccept(){
        $this->users->connectAccept($_POST['id'], $_POST['from-id']);
        die("1");
    }

    function connectIgnore(){
        $this->users->connectIgnore($_POST['id'], $_POST['from-id']);
        die("1");
    }
    
    /****** S1 Libraries *****/
    function libraries(){
        $data = $this->commonHead();
	
		if( isset($_GET['language']) && !empty($_GET['language']) ) {
			$lang = $this->common->escapeStr($_GET['language']);
		}
		else if( isset($_POST['language']) && !empty($_POST['language']) ) {
            $lang = $this->common->escapeStr($_POST['language']);
		}
        else {
            $lang = 'EN';
		}

		$paged = isset($_GET['page'])?(int)$_GET['page']:1;
        $paged--;
		
        $numbers_per_page = 18;

		if( isset($_GET['s1']) ) {
			$data['s1'] 	= $_GET['s1'];
			$data['module'] = "profile";

			$data['libraries'] 	= $this->libraries->getLibraryListByLanguage($lang, $paged, $numbers_per_page, true);
			$data['pages'] 		= $this->libraries->getTotalNumberOfLibrariesByLanguage($lang, $numbers_per_page, true);
		}
		else {
			$data['s1'] 	= 'new';
			$data['module'] = "dashboard";

			// Get all library types //
				$data['rows_library_types'] = $this->libraries->getLibraryTypes();
					
			if( isset($_GET['libtype']) ) {
				$cp = isset($_POST['page'])?(int)$_POST['page']:1;
				$cp--;
				
				$data['cnt_libtype'] = ($cp*$numbers_per_page);

				$lib_type_id 			= $_GET['libtype'];
				$library_type 			= $this->libraries->getLibraryTypes($lib_type_id);
				$data['library_type'] 	= isset($library_type[0]['library_type']) ? $library_type[0]['library_type'] : '';
				$data['library_type_id']= $lib_type_id;
				
				$library_id = '';
				
				if( isset($_GET['section']) && "rellibitems" == $_GET['section'] 
					&& isset($_GET['libid']) && (int)$_GET['libid'] ) {

					$library_id 		= isset( $_GET['libid'] ) ? $_GET['libid'] : '';
					$data['library_id']	= $library_id;
					$lang 				= '';
					$library_id 		= $this->libraries->getRelatedLibraryIdsOfLibrary( $library_id, $lib_type_id );
				}

				$data['libraries'] 		= $this->libraries->getLibraryListByLanguage($lang, $cp, $numbers_per_page, true, $lib_type_id, $library_id);
				$data['pages'] 			= $this->libraries->getTotalNumberOfLibrariesByLanguage($lang, $numbers_per_page, true, $lib_type_id, $library_id);

				$this->load->view('s1_library_contents', $data);
				return false;
			}
		}
		$this->load->view('s1_libraries_view', $data);
    }

	function library_page_contents()
	{
		session_start();
		$data 			= $this->commonHead();
		$data['module'] = "dashboard";
		$this->load->library('googletranslatetool');
		$current_page 	= $data['current_page'] = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$libid 			= $data['library_id'] = (isset($_GET['libid'])&&(int)$_GET['libid']) ? (int)$_GET['libid'] : '';
		$libtype 		= (isset($_GET['libtype'])&&(int)$_GET['libtype']) ? (int)$_GET['libtype'] : '';
		$awtraining 	= $data['awtraining'] = (isset($_GET['awtraining'])&&$_GET['awtraining']) ? $_GET['awtraining'] : '';

		if( isset($_GET['language']) && !empty($_GET['language']) ) {
			$lang = $this->common->escapeStr($_GET['language']);
		}
		else if( isset($_POST['language']) && !empty($_POST['language']) ) {
            $lang = $this->common->escapeStr($_POST['language']);
		}
        else {
            $lang = 'EN';
		}

		$data['lang'] 	= strtolower($lang);
		$data['to_lang']= ($this->session->userdata('s1lib_tolang')) ? $this->session->userdata('s1lib_tolang') : strtolower($lang);

		// Get all library types //
			$data['rows_library_types'] = $this->libraries->getLibraryTypes();

		if( $libtype ) {
			$library_type 			= $this->libraries->getLibraryTypes($libtype);
			$data['library_type_id']= $libtype;
			$data['library_type'] 	= isset($library_type[0]['library_type']) ? $library_type[0]['library_type'] : '';

			if( $libid ) {
				if( isset($_SESSION['current_libid']) && ($_SESSION['current_libid'] != $libid) ) {
					unset( $_SESSION['final_arr_quiz'] );
				}
				$_SESSION['current_libid'] = $libid;

				$section = $data['section'] = (isset($_GET['section']) && $_GET['section']) ? $_GET['section'] : 'desc';

				$data['libraries'] 	= $this->libraries->getLibraryListByLanguage( $lang, 0, 0, true, $libtype, $libid );
				
				// 3 lines below created/updated to display library title when it is inactive for admin purposes Oct-23-2015 Marcio
				$data['inactive_library_title'] = $this->libraries->getLibraryByID($libid, $select='title', $where='');
				$data['title'] 				= isset($data['inactive_library_title']['title']) ? $data['inactive_library_title']['title'] : 'N/A';
				$data['library_title'] 		= isset($data['libraries'][0]['title']) ? $data['libraries'][0]['title'] : $data['title'];
				$data['library_subtitle'] 	= isset($data['libraries'][0]['subtitle']) ? $data['libraries'][0]['subtitle'] : '';
				$data['library_description']= isset($data['libraries'][0]['title']) ? $data['libraries'][0]['description'] : '';

				$data['page'] 	= $this->libraries->getPageByPageNumber($libid, $current_page );
				$data['pages'] 	= $this->libraries->getTotalPageNumber($libid);
				
				// Get Questions from any page //
					$library_pages 	= $this->libraries->getPageByPageNumber($libid);
					$sizeof_page = sizeof($library_pages);
					if( $sizeof_page>0 && isset($library_pages[0]['page_id']) ) {
						$page_questions = array();
						for( $cnt_libpg=0;$cnt_libpg<$sizeof_page; $cnt_libpg++ )
						{
							$page_id 				= $library_pages[$cnt_libpg]['page_id'];
							$paragraph_id 			= $library_pages[$cnt_libpg]['paragraph_id'];
							$questions = $this->libraries->getPageQuestionByParagraphPageID( $page_id, $paragraph_id );
							if( sizeof($questions)>0 ) {	
								$page_questions = $questions;
							}
						}
					}
					$data['page_questions'] = $page_questions;
					//common::pr($page_questions);

				if( "worker"==$awtraining || "supervisor"==$awtraining ) {
					$data['current_libcnt'] = $this->common->escapeStr($_GET['clib']);
					$data['nextlibid'] 		= isset($_GET['nextlibid']) ? $this->common->escapeStr($_GET['nextlibid']) : '';
					$data['progress'] 		= isset($_GET['prog']) ? $this->common->escapeStr($_GET['prog']) : '';
					$this->load->view('s1_library_page_contents_awtraining', $data);
				}
				else {
					$this->load->view('s1_library_page_contents', $data);
				}
			}
			else {
				$this->error_page();
			}
		}
	}



    function assign()
	{
        $data = $this->commonHead();
        $data['module'] = "profile";
        $data['links'] = $this->users->getMyLinksByUserID($this->sess_userid, $this->sess_usertype, 1);
        
        if($_SERVER['REQUEST_METHOD']=='POST') {
            if(!isset($_POST['action'])||$_POST['action']=="ASSIGN"){
                $msg 		= array();
				$post_lib_id= isset($_POST['lib_id']) ? $_POST['lib_id'] : '';
				
				if( $post_lib_id ) {
					foreach( $post_lib_id AS $lib_id ) {
						$arr_library 	= explode("-", $lib_id);
						$libtype_section= $arr_library[1];
						if( $arr_library[0] ) {
							$inv_form_id= $arr_library[0];
							$lib_id 	= $arr_library[2];
						}
						else {
							$inv_form_id= '';
							$lib_id 	= $arr_library[2];
						}

						foreach( $_POST['userid'] as $uid ) {
							$assigned = $this->libraries->assignLibraryToUser($lib_id, $uid, $this->sess_userid, $inv_form_id, $libtype_section);
							if(!$assigned) {
								$lib 	= $this->libraries->getLibraryByID($lib_id);
								$user 	= $this->users->getUserByID($uid);
								$msg[] 	= $lib['title'].' can not be assigned to '.$user['firstname'].' '.$user['lastname'].' because of duplication.';
							}
						}
					}
				}
                if(count($msg)>0){
                    $data['textmsg'] = $msg;
                }
            }
			else {
                $data['links'] = $this->users->getUsersByName($_POST['name']);
            }
        }
        $data['inventories'] = $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $this->sess_userid, '');

		if($data['user']['type_id']>1) {
            $this->load->view('assign_view', $data);
		}
        else {
            $this->load->view('assign_admin_view', $data);
		}
    }

	function commonConnection()
	{
		$type = $this->sess_usertype;
		$data['peo_links'] = array();
		$data['org_links'] = array();

		if($_SERVER['REQUEST_METHOD']=='POST') {
			$action 		= isset($_POST['action']) ? $_POST['action'] :'';
			$search_text 	= isset($_POST['name']) ? $_POST['name'] :'';

			if( $search_text ) {
				$where_users = " AND (CONCAT(firstname, ' ', lastname) LIKE '%".$search_text."%' OR nickname LIKE '%".$search_text."%' OR email_addr LIKE '%".$search_text."%')";
			}
		
			if($action == "SEARCH") {
				switch($type){
					case 9: case 11:
						$data['org_links'] = $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, 1, '*', $where_users );
						//$data['org_links'] = $this->users->getOrganizationsForLinkByName($_POST['name'], $type);
						$data['peo_links'] = array();
						break;
					case 1: case 7: case 8:
						$data['peo_links'] = $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, NULL, '*', $where_users );
						$data['org_links'] = $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, NULL, '*', $where_users );
						//$data['peo_links'] = $this->users->getPeopleForLinkByName($_POST['name'], $type);
						//$data['org_links'] = $this->users->getOrganizationsForLinkByName($_POST['name'], $type);
						break;
				}
			}
		}
		else {
			switch($type){
				case 9: case 11: {
					$data['org_links'] = $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, NULL, '*' );
					//$data['org_links'] = $this->users->getMyOrganizationLinksByUserID($this->sess_userid, $type);
					$data['peo_links'] = array();
					break;
				}
				case 1: case 7: case 8: {
					$data['peo_links'] = $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, NULL, '*' );
					$data['org_links'] = $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, NULL, '*' );
					//$data['peo_links'] = $this->users->getMyPeopleLinksByUserID($this->sess_userid, $type);
					//$data['org_links'] = $this->users->getMyOrganizationLinksByUserID($this->sess_userid, $type);
					break;
				}
			}
		}
		return $data;
	}
        /**************Common Search User Page*****************/        
        function user_list() {
            $data = $this->commonHead();
            $data['module'] = "dashboard";
            $data['links'] = array();
            $where_users = '';

			$txt_username 	= $data['txt_username'] = (isset($_GET['username'])&&$_GET['username']) ? $_GET['username'] : $this->input->post('txt_hdr_username');
			$cmb_usertype 	= $data['cmb_usertype'] = (isset($_GET['usertype'])&&$_GET['usertype']) ? $_GET['usertype'] : $this->input->post('cmb_hdr_usertype');
			$data['filter_type'] = "$cmb_usertype";
			
			($cmb_usertype == "utc") ? $cmb_usertype = 7 : '';
			if( $txt_username != "" && $cmb_usertype != "" ) {
					$where_users = " AND type_id = ".$cmb_usertype."  AND id != '".$this->sess_userid."' AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";
			}
			else if( $txt_username == "" && $cmb_usertype != "") {				
					$where_users = " AND type_id = ".$cmb_usertype."  AND id != '".$this->sess_userid."'";
			}
			else if($txt_username != "" && $cmb_usertype == "") {
					$where_users = "  AND id != '".$this->sess_userid."' AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";
			}

            // Get connection links of people and organigation //
			$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, NULL, '*', $where_users );
			$data['peo_links']	= (isset($peo_links) && is_array($peo_links)) ? $peo_links : array();
			$org_links	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, NULL, '*', $where_users );			
			$data['org_links']	= (isset($org_links) && is_array($org_links)) ? $org_links : array();
			$data['links'] 		= array_merge($peo_links, $org_links);            
			
			$pg_limit    = $data['pg_limit'] = 9; //changed from 36 to 9 by Marcio on Aug-10-2015
			$pgno_userlist 		= $data['pgno_userlist'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
			$total_user_list 	= $data['total_user_list'] = sizeof($data['links']);
			
			$this->load->view('user_list', $data);
        }
	/**************NEW ASSIGN PAGE ON METRO STYLE - AUG-18-2014*****************/
	
	function connections_metro()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		$where_users = $where_crew = '';

		// Update conection request profile home notification
			$this->users->updateMessageReadStatus('connection request');

		if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
			$txt_username 	= $this->input->post('txt_username');
			$where_crew		= ($txt_username) ? ' AND st_crew_label LIKE "%'.$txt_username.'%"' : '';

			if( "9"==$this->sess_usertype || "11"==$this->sess_usertype ) {
				$where_users .= " AND type_id != '9' AND type_id != '11'";
			}
			if( $txt_username ) {
				$where_users .= " AND id != '".$this->sess_userid."' AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";
			}
			else if( !$txt_username ) {
				$where_users	.= (!$txt_username) ? ' AND id != "'.$this->sess_userid.'" AND link_status IS NOT NULL' : '';
			}
		}

		// Get connection links of people and organigation //
			$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, NULL, '*', $where_users );
			$data['peo_links']	= (isset($peo_links) && is_array($peo_links)) ? $peo_links : array();
			$org_links	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, NULL, '*', $where_users );
			$data['org_links']	= (isset($org_links) && is_array($org_links)) ? $org_links : array();
			$data['links'] 		= array_merge($peo_links, $org_links);

		// My Crews //
			$data['rows_my_crews'] = $this->users->getMetaDataList("crew_of_employers", 'in_crew_status=1 AND in_crew_employer_id = "'.$this->sess_userid.'" '.$where_crew, '', 'in_crew_id, st_crew_label');

		if( $data['user']['type_id']>1 ) {
			$this->load->view('connections_metro', $data);
		}
        else {
            $this->load->view('assign_admin_view', $data);
		}
    }

	function assign_library()
	{
		session_start();
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    = array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		$ret_lib_assigned = '';
		if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
			isset($_POST['arr_connec']) ? $_SESSION['connec_assign']['connection'] = $_POST['arr_connec'] : '';
			isset($_POST['arr_library']) ? $_SESSION['connec_assign']['library'] = $_POST['arr_library'] : '';
			isset($_POST['arr_libtype']) ? $_SESSION['connec_assign']['libtype'] = $_POST['arr_libtype'] : '';

			if( isset($_POST['arr_library']) && sizeof($_POST['arr_library']) ){
				foreach( $_SESSION['connec_assign']['library'] AS $key => $val ) {
					$lib_id 		= $val;
					$libtype_section= $_SESSION['connec_assign']['libtype'][$key];

					foreach( $_SESSION['connec_assign']['connection'] AS $key_connec => $val_connec ) {
						if( (int)$val_connec ) {
							if( in_array('crew', $_SESSION['connec_assign']['connection']) ) {
								$rows_crew_workers = $this->users->getMetaDataList('crew_of_employers', 'in_crew_id="'.$val_connec.'"', '', 'st_crew_workers');
								$arr_crew_workers = (isset($rows_crew_workers[0]['st_crew_workers'])&&$rows_crew_workers[0]['st_crew_workers']) 
															? explode(",", $rows_crew_workers[0]['st_crew_workers']) : array();

								foreach( $arr_crew_workers AS $key_worker => $val_worker ) {
									// echo "connection: ".$val_worker."lib_id: ".$lib_id."lib_type: ".$libtype_section;
									$ret_lib_assigned = Ajax::ajax_assign_inventory( $val_worker, $lib_id, $libtype_section );
								}
							}
							else {
								$ret_lib_assigned = Ajax::ajax_assign_inventory( $val_connec, $lib_id, $libtype_section );
							}
						}
					}
				}
			}
		}
		else {
			$cmb_libtype 		= $this->input->post('cmb_libtype');
			$txt_libtitle 		= $this->input->post('txt_libtitle');

			$arr_inventory 		= $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $this->sess_userid, '', 'AND title like "%'.$txt_libtitle.'%" AND library_type_id != 4', $cmb_libtype);
			$arr_inspections 	= $this->libraries->getMyInspectionInventories($this->sess_useremail, $this->sess_userid, '');
			$arr_safetytalks	= $this->libraries->getMySafetytalksInventories($this->sess_useremail, $this->sess_userid, '');
			$arr_procedures 	= $this->libraries->getMyProceduresInventories($this->sess_useremail, $this->sess_userid, '');
			// Common::pr( $arr_procedures );
			
			$data['inventories'] = array_merge( $arr_inventory, $arr_inspections, $arr_safetytalks, $arr_procedures );
			// Common::pr($data['inventories']);
			$this->load->view('assign_library', $data);
		}
		echo $ret_lib_assigned;
	}
	
    function documents(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $cp = isset($_POST['page'])?(int)$_POST['page']:1;

        $data['page'] = $this->libraries->getPageByPageNumber((int)$_GET['lib'], $cp);

        $data['questions'] = $this->libraries->getPageQuestionByPageID($data['page'][0]['page_id']);

        if(count($data['questions'])<1) {
            $this->libraries->updateReadingHistory($this->sess_userid, (int)$_GET['lib'], $data['page'][0]['page_id']);
		}
        if($_SERVER['REQUEST_METHOD']=='POST') {
            $this->libraries->updateReadingHistory($this->sess_userid, (int)$_GET['lib'], $_POST['current_page_id']);
        }
        $data['pages'] = $this->libraries->getTotalPageNumber((int)$_GET['lib']);
        $this->load->view('single_page_view', $data); 
    }
	
// the function documentsNew is for testing new library vew - Dec-12-2013 without questions
    function documentsNew(){
        $data = $this->commonHead();
        $data['module'] = "profile";
        $data['page'] 	= $this->libraries->getPagesbyLibraryId((int)$_GET['lib']);

        $data['questions'] 	= $this->libraries->getPageQuestionByPageID($data['page'][0]['page_id']);
		if(count($data['questions'])<1) {
            $this->libraries->updateReadingHistory($this->sess_userid, (int)$_GET['lib'], $data['page'][0]['page_id']);
		}

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->libraries->updateReadingHistory($this->sess_userid, (int)$_GET['lib'], $_POST['current_page_id']);
        }
        $data['pages'] = $this->libraries->getTotalPageNumber((int)$_GET['lib']);
        $this->load->view('single_page_view_new', $data);
    }

	function singleFileUpload($input_name, $targetPath)
	{
        if( isset($_FILES[$input_name]['size']) && $_FILES[$input_name]['size'] > 0 ) {
            $tempFile 	= $_FILES[$input_name]['tmp_name'];
            $realName 	= date("YmdHis").$this->common->escapeStr($_FILES[$input_name]['name']);
			$fileurl 	= $this->base.$targetPath;
            $targetPath = realpath('.').'/'.$targetPath;

            (!is_dir($targetPath)) ? mkdir($targetPath, 0777, true) : '';

            $file 			= array();
            $file['path'] 	=  str_replace('//','/',$targetPath) . $realName;
            $file['url'] 	= $fileurl.$realName;

            move_uploaded_file($tempFile,$file['path']);
            return $file;
        }
		else {
            return false;
        }
    }
	
	function uploadUserProfileImage()
	{
		$ret_files 		= $this->users->userProfileImageUpload( 'userfile', $this->path_upload_profiles, "profile".$this->sess_userid);
		$attachment 	= ($ret_files) ? $ret_files['userfile']['name'] : '';
		$this->users->updateUserBasicInfoByID($this->sess_userid, $attachment);
	}
	
	function paragraphFileUpload($input_name, $targetPath)
	{
		$this->load->library('upload');
		$upload_error = '';
		$files = $_FILES;
		
		if( isset($files[$input_name]['name']) && $files[$input_name]['name'] ) {
			// common::pr($files[$input_name]['name']);die;

			foreach( $files[$input_name]['name'] AS $pr_key => $pr_val ) {
				foreach( $pr_val AS $key_img => $val_img ) {
					if( isset($val_img) && !empty($val_img) ) {
						if( $key_img !== "new" ) {
							$_FILES[$input_name]['size'] 	= $files[$input_name]['size'][$pr_key][$key_img];
							$_FILES[$input_name]['name'] 	= $files[$input_name]['name'][$pr_key][$key_img];
							$_FILES[$input_name]['type'] 	= $files[$input_name]['type'][$pr_key][$key_img];
							$_FILES[$input_name]['tmp_name']= $files[$input_name]['tmp_name'][$pr_key][$key_img];
							$_FILES[$input_name]['error'] 	= $files[$input_name]['error'][$pr_key][$key_img];

							if( $_FILES[$input_name]['name'] ) {
								$ext_primg	 	= $this->common->getImagePathInfo( $_FILES[$input_name]['name'],'extension' );
								$full_imagename = "libpg_".$key_img.".".$ext_primg;

								if( $current_primg = glob(FCPATH.$targetPath."libpg_".$key_img.".*") ) {
									$arr_current_primg = explode("/", $current_primg[0]);
									$sizeof_current_primg = sizeof($arr_current_primg);
									isset($arr_current_primg[$sizeof_current_primg-1]) ? unlink( FCPATH.$targetPath.$arr_current_primg[$sizeof_current_primg-1] ) : '';
								}
								$this->upload->initialize($this->common->setUploadOptions($targetPath, $full_imagename));
								(!$this->upload->do_upload()) ? $upload_error = $this->upload->display_errors("<span class='error'>", "</span>") : '';
							}
						}
						else {
							for( $cnt_img=0; $cnt_img<sizeof($val_img); $cnt_img++ ) {
								$_FILES[$input_name]['size'] 	= $files[$input_name]['size'][$pr_key][$key_img][$cnt_img];
								$_FILES[$input_name]['name'] 	= $files[$input_name]['name'][$pr_key][$key_img][$cnt_img];
								$_FILES[$input_name]['type'] 	= $files[$input_name]['type'][$pr_key][$key_img][$cnt_img];
								$_FILES[$input_name]['tmp_name']= $files[$input_name]['tmp_name'][$pr_key][$key_img][$cnt_img];
								$_FILES[$input_name]['error'] 	= $files[$input_name]['error'][$pr_key][$key_img][$cnt_img];

								if( $_FILES[$input_name]['name'] ) {
									$next_image_id 	= $this->parentdb->getLastRowId('tbl_library_images');
									$next_image_id	= ($next_image_id + $cnt_img);
									$ext_primg	 	= $this->common->getImagePathInfo( $_FILES[$input_name]['name'],'extension' );
									$full_imagename = "libpg_".$next_image_id.".".$ext_primg;
									
									if( $current_primg = glob(FCPATH.$targetPath."libpg_".$next_image_id.".*") ) {
										$arr_current_primg = explode("/", $current_primg[0]);
										$sizeof_current_primg = sizeof($arr_current_primg);
										isset($arr_current_primg[$sizeof_current_primg-1]) ? unlink( FCPATH.$targetPath.$arr_current_primg[$sizeof_current_primg-1] ) : '';
									}

									$this->upload->initialize($this->common->setUploadOptions($targetPath, $full_imagename));
									(!$this->upload->do_upload()) ? $upload_error = $this->upload->display_errors("<span class='error'>", "</span>") : '';
								}
							}
						}
					}
				}
			}
		}
		if( !$upload_error ) {
			return $files;
		}
    }

    function _security()
	{
        $usertype = $this->sess_usertype;
        if(!isset($usertype)||is_null($usertype)||empty($usertype)||$usertype>1)
            redirect($this->base."admin/authorization_fail");
    }
    
    function _isLoggedIn()
	{
		// $_SERVER['REQUEST_URI'];die;
        $usertype = $this->sess_usertype;
		// common::pr( $this->session->all_userdata() );
		// echo "usertype: ".$usertype;die;
		
        if( (!isset($usertype) || is_null($usertype) || empty($usertype)) && $usertype<1 ) {
            // redirect($this->base);
		}
    }
	
    function authorization_fail()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
        $this->load->view('authorization_fail', $data);
    }
	

	// START - S1 library view pages //
	function libraries_metro()
	{
		$data = $this->commonHead();
		$data['module'] = "dashboard";

		$libtype = $data['libtype'] = isset($_GET['libtype'])?(int)$_GET['libtype']:'';

		// Check if logged in User has valid S1 library type or Union //
			// $this->libraries->checkIfLibraryPageValid($libtype); // 29Aug2014: Library functionality has been reverted for Union User //
		
		if( isset($_GET['language']) && !empty($_GET['language']) ) {
			$lang = $this->common->escapeStr($_GET['language']);
		}
		else if( isset($_POST['language']) && !empty($_POST['language']) ) {
            $lang = $this->common->escapeStr($_POST['language']);
		}
        else {
            $lang = 'EN';
		}

		$search_libtype = isset($_GET['search_libtype'])?$_GET['search_libtype']:'';
		$search_libtext = isset($_GET['search_libtext'])?$_GET['search_libtext']:'';

		// Get all library types //
			$data['rows_library_types'] = $this->libraries->getLibraryTypes();

		if( $libtype || ($search_libtype || $search_libtext) ) {
			$current_page = $data['current_page'] = isset($_GET['page'])?(int)$_GET['page']:1;
			$current_page--;

			$data['cnt_libtype'] = ($current_page*$this->s1lib_rows_limit);

			$lib_type_id 			= isset($_GET['libtype']) ? $_GET['libtype'] : $_GET['search_libtype'];
			$library_type 			= $this->libraries->getLibraryTypes($lib_type_id);
			$data['library_type'] 	= isset($library_type[0]['library_type']) ? $library_type[0]['library_type'] : '';
			$data['library_type_id']= $lib_type_id;

			$library_id = '';

			if( isset($_GET['section']) && "rellibitems" == $_GET['section'] && isset($_GET['libid']) && (int)$_GET['libid'] ) {
				$library_id 		= isset( $_GET['libid'] ) ? $_GET['libid'] : '';
				$data['library_id']	= $library_id;
				$lang 				= '';
				$library_id 		= $this->libraries->getRelatedLibraryIdsOfLibrary( $library_id, $lib_type_id );
			}

			if( $libtype==4) {
				$data['libraries'] = $this->users->getMetaDataList('procedures','status=1 AND (dt_date_start<=CURDATE() 
											AND (dt_date_end>=CURDATE() OR dt_date_end="0000-00-00 00:00:00" OR dt_date_end IS NULL))
											AND in_created_by=12 AND st_procedure_status="completed"', 'ORDER BY st_procedure_name', 
											'id AS library_id, in_created_by, st_procedure_name AS title, st_language AS language, "4" AS library_type_id', '',  
											($current_page*($this->s1lib_rows_limit-1)).",".($this->s1lib_rows_limit-1));
											
											
				$data['total_libraries'] = $this->users->getMetaDataList('procedures','status=1 AND (dt_date_start<=CURDATE() 
											AND (dt_date_end>=CURDATE() OR dt_date_end="0000-00-00 00:00:00" OR dt_date_end IS NULL)) 
											AND in_created_by=12 AND st_procedure_status="completed"', '', 'ceil(COUNT(id)/'.($this->s1lib_rows_limit-1).') AS totallib');
				$data['total_libraries'] = $data['total_libraries'][0]['totallib'];
			}
			else {
				$rows_libraries = $this->libraries->getLibraryListByLanguage($lang, $current_page, $this->s1lib_rows_limit, true, $lib_type_id, $library_id);
				/*
				foreach( $rows_libraries AS $key_libraries => $val_libraries ) {
					$worker_libraries 		= array(248,245,246,244); // Awareness training worker library id //
					$supervisor_libraries	= array(365,368,369,370); // Awareness training supervisor library id //
					if( in_array($val_libraries['library_id'],$worker_libraries) ) {
						$rows_libraries['aw_worker']['language'] = $val_libraries['language'];
						$rows_libraries['aw_worker']['title'] = "Health and Safety Awareness Training for Worker";
						$rows_libraries['aw_worker']['description'] = "Health and Safety Awareness Training for Worker";
						$rows_libraries['aw_worker']['library_type_id'] = '1';
						$rows_libraries['aw_worker']['library_type'] = 'awareness_training_worker';

						$rows_libraries['aw_worker']['credits'] += $val_libraries['credits'];
						$rows_libraries['aw_worker']['price'] += $val_libraries['price'];
						$rows_libraries['aw_worker']['creditsbuy'] += $val_libraries['creditsbuy'];
						
						unset($rows_libraries[$key_libraries]);
					}
					if( in_array($val_libraries['library_id'],$supervisor_libraries) ) {
						$rows_libraries['aw_supervisor']['language'] = $val_libraries['language'];
						$rows_libraries['aw_supervisor']['title'] = "Health and Safety Awareness Training for Supervisor";
						$rows_libraries['aw_supervisor']['description'] = "Health and Safety Awareness Training for Supervisor";
						$rows_libraries['aw_supervisor']['library_type_id'] = '1';
						$rows_libraries['aw_supervisor']['library_type'] = 'awareness_training_supervisor';

						$rows_libraries['aw_supervisor']['credits'] += $val_libraries['credits'];
						$rows_libraries['aw_supervisor']['creditsbuy'] += $val_libraries['creditsbuy'];
						$rows_libraries['aw_supervisor']['price'] += $val_libraries['price'];
						unset($rows_libraries[$key_libraries]);
					}
				}
				*/
				
				$data['libraries'] 		= $rows_libraries;
				$data['total_libraries']= $this->libraries->getTotalNumberOfLibrariesByLanguage($lang, $this->s1lib_rows_limit, true, $lib_type_id, $library_id);
			}
			$data_connections = $this->commonConnection();
			$data = array_merge($data, $data_connections);
			// common::pr($data);

			if( $search_libtext || $search_libtype ) {
				$this->load->view('header_search', $data);
			}
			else {
				$this->load->view('s1_libraries_view_metro', $data);
			}
			return false;
		}
		else {
			$this->error_page();
		}
    }

	function s1_library_inspection_view_metro()
	{
		$data = $this->commonHead();
		$data['module'] = "dashboard";
		
		$current_page     = $data['current_page'] = isset($_GET['page'])?(int)$_GET['page']:1;
		
		$current_page--;

		$is_custom    = isset($_GET['custom']) ? $_GET['custom'] : '';
		$data['is_custom']  = $is_custom;


		// Customized inspection
			// OLD: status=1 AND (in_user_id IS NULL OR in_user_id="'.$this->sess_userid.'") //
			$data['ct_list'] = $this->users->getMetaDataList('custom_inspection','status=1 AND (date_inspection_start<=CURDATE() 
											AND (date_inspection_end>=CURDATE() OR date_inspection_end="0000-00-00" OR date_inspection_end IS NULL))', 
											'ORDER BY st_custom_inspection_name', '*', '', ($current_page*($this->s1lib_rows_limit)).",".($this->s1lib_rows_limit));

		// Normal inspection
			$data['list'] = $this->users->getMetaDataList('inspection','status=1 AND (date_inspection_start<=CURDATE() 
											AND (date_inspection_end>=CURDATE() OR date_inspection_end="0000-00-00" OR date_inspection_end IS NULL))', 
											'ORDER BY st_inspection_name', '*', '', ($current_page*($this->s1lib_rows_limit)).",".($this->s1lib_rows_limit));

			$data['pages'] = $this->users->getMetaDataList('inspection','status=1 AND (date_inspection_start<=CURDATE() 
											AND (date_inspection_end>=CURDATE() OR date_inspection_end="0000-00-00" OR date_inspection_end IS NULL))', 
											'', 'ceil(COUNT(id)/'.($this->s1lib_rows_limit).') AS totallib');
			$data['pages'] = $data['pages'][0]['totallib'];
			
			$data['field_inspection_name'] 		= "st_inspection_name";
			$data['field_ct_inspection_name'] 	= "st_custom_inspection_name";

		$this->load->view('s1_library_inspection_view_metro', $data); 
	}
	
		
	function s1_library_safetytalks_view_metro()
	{
		$data 				= $this->commonHead();
		$data['module'] 	= "dashboard";
		$current_page     			= isset($_GET['page'])?(int)$_GET['page']:1;
		$current_page--;

		$is_custom    		= isset($_GET['custom']) ? $_GET['custom'] : '';
		$data['is_custom']  = $is_custom;

		// Customized safetytalks
			$data['ct_list'] = $this->users->getMetaDataList('custom_safetytalks','status=1 AND (date_safetytalks_start<=CURDATE() 
											AND (date_safetytalks_end>=CURDATE() OR date_safetytalks_end="0000-00-00" OR date_safetytalks_end IS NULL))', 
											'ORDER BY st_custom_safetytalks_name', '*', '', ($current_page*($this->s1lib_rows_limit-1)).",".($this->s1lib_rows_limit-1));

		// Normal safetytalks
			$data['list'] = $this->users->getMetaDataList('safetytalks','status=1 AND (date_safetytalks_start<=CURDATE() 
											AND (date_safetytalks_end>=CURDATE() OR date_safetytalks_end="0000-00-00" OR date_safetytalks_end IS NULL))', 
											'ORDER BY st_safetytalks_topic', '*', '', ($current_page*($this->s1lib_rows_limit-1)).",".($this->s1lib_rows_limit-1));
			$data['pages'] = $this->users->getMetaDataList('safetytalks','status=1 AND (date_safetytalks_start<=CURDATE() 
											AND (date_safetytalks_end>=CURDATE() OR date_safetytalks_end="0000-00-00" OR date_safetytalks_end IS NULL))', 
											'', 'ceil(COUNT(id)/'.($this->s1lib_rows_limit-1).') AS totallib');
			$data['pages'] = $data['pages'][0]['totallib'];
			
			$data['field_safetytalks_name'] 	= "st_safetytalks_topic";
			$data['field_ct_safetytalks_name'] 	= "st_custom_safetytalks_name";

		$this->load->view('s1_library_safetytalks_view_metro', $data); 
	}
	// END - S1 library view pages //
	
	
	// 29 April,2014 //
		/****** Digital Project Metro Style******/
		function digital_project_metro()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('digital_project_metro', $data); 
		}
	/****** JHSC Metro Style******/
	function jhsc_metro()
	{
		$data = $this->commonHead();
		$data['module'] = "dashboard";
		$this->load->view('jhsc_metro', $data);
	}
	
	/****** Digital Safety Board Metro Style******/
	function dig_safety_board_metro()
	{
		$data = $this->commonHead();
		$data['module'] = "dashboard";
		$this->load->view('dig_safety_board_metro', $data); 
	}

	/***********MY LIBRARY METRO STYLE****************/
	function my_inspection_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;

		$pgno_free 			= $data['pgno_free'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_free 		= ((($pgno_free-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_free 		= $data['total_free'] = $this->libraries->getMyInspectionInventories($useremail, $userid, '', '', '1' );
		$data['documents_free']		= $this->libraries->getMyInspectionInventories($useremail, $userid, '', $limit_free );
		// common::pr($data['documents_free'];
		
		$pgno_purchased 	= $data['pgno_purchased'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_purchased 	= ((($pgno_purchased-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_purchased 	= $data['total_purchased'] = $this->libraries->getMyInspectionInventories($useremail, $userid, '', '', '1' );
		$data['documents_purchased']= $this->libraries->getMyInspectionInventories($useremail, $userid, '', $limit_purchased );
		
		$pgno_assigned 		= $data['pgno_assigned'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_assigned 	= ((($pgno_assigned-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_assigned 	= $data['total_assigned'] = $this->libraries->getAssignedInspectionsByUserID($userid, '', '1');
		$data['documents_assigned'] = $this->libraries->getAssignedInspectionsByUserID($userid, $limit_assigned);
		
		$pgno_completed 	= $data['pgno_completed'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_completed 	= ((($pgno_completed-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_completed 	= $data['total_completed'] = $this->libraries->getCompletedInspections('','1');
		$data['documents_completed']= $this->libraries->getCompletedInspections($limit_completed);
		$this->load->view('my_inspection_metro', $data); 
	}
		
	function mylibrary_union_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;
		
		$pgno_free 			= $data['pgno_free'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_free 		= ((($pgno_free-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_free 		= $data['total_free'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2' ,'','9', '', '1');
		$data['documents_free']		= $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2', '','9', $limit_free);
		
		$pgno_assigned 		= $data['pgno_assigned'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_assigned 	= ((($pgno_assigned-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_assigned 	= $data['total_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid, '9', '', '1');
		$data['documents_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid, '9', $limit_assigned);
		
		$pgno_purchased 	= $data['pgno_purchased'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_purchased 	= ((($pgno_purchased-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_purchased 	= $data['total_purchased'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid,'2','','9', '', '1');
		$data['documents_purchased']= $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2','','9', $limit_purchased);
		
		$pgno_completed 	= $data['pgno_completed'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_completed 	= ((($pgno_completed-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_completed 	= $data['total_completed'] = $this->libraries->getCompletedDocumentsByUserID($userid, '9', '', '1');
		$data['documents_completed']= $this->libraries->getCompletedDocumentsByUserID($userid, '9', $limit_completed);
		
		$this->load->view('mylibrary_union_view_metro', $data);
	}

	function mylibrary_training_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";
		
		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;
		
		// Update library assign profile home notification
			$this->users->updateMessageReadStatus('assign');

		$pgno_free 			= $data['pgno_free'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_free 		= ((($pgno_free-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_free 		= $data['total_free'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2', '','1','','1');
		$data['documents_free']		= $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2', '', '1', $limit_free);
		//common::pr($data['documents_free']);

		$pgno_assigned 		= $data['pgno_assigned'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_assigned 	= ((($pgno_assigned-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_assigned 	= $data['total_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid, '1','','1');
		$data['documents_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid, '1', $limit_assigned);

		$pgno_purchased 	= $data['pgno_purchased'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_purchased 	= ((($pgno_purchased-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_purchased 	= $data['total_purchased'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2', '', '1', '', '1');
		$data['documents_purchased']= $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $userid, '2', '','1', $limit_purchased);
		// common::pr($data['documents_purchased']);

		$pgno_completed 	= $data['pgno_completed'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_completed 	= ((($pgno_completed-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_completed 	= $data['total_completed'] = $this->libraries->getCompletedDocumentsByUserID($userid,'1','','1');
		$data['documents_completed']= $this->libraries->getCompletedDocumentsByUserID($userid, '1', $limit_completed);

		$this->load->view('mylibrary_training_view_metro', $data); 
	}

	function mylibrary_safetytalks_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";
		
		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;

		$pgno_free 			= $data['pgno_free'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_free 		= ((($pgno_free-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_free 		= $data['total_free'] = $this->libraries->getMySafetytalksInventories($useremail, $userid, ' ', '', '1');
		$data['documents_free']		= $this->libraries->getMySafetytalksInventories($useremail, $userid, '', $limit_free);

		$pgno_purchased 	= $data['pgno_purchased'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_purchased 	= ((($pgno_purchased-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_purchased 	= $data['total_purchased'] = $this->libraries->getMySafetytalksInventories($useremail, $userid, '', '', '1' );
		$data['documents_purchased']= $this->libraries->getMySafetytalksInventories($useremail, $userid, '', $limit_purchased );

		$pgno_assigned 		= $data['pgno_assigned'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_assigned 	= ((($pgno_assigned-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_assigned 	= $data['total_assigned'] = $this->libraries->getAssignedSafetytalksByUserID($userid, '', '1');
		$data['documents_assigned'] = $this->libraries->getAssignedSafetytalksByUserID($userid, $limit_assigned);

		$pgno_completed 	= $data['pgno_completed'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_completed 	= ((($pgno_completed-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_completed 	= $data['total_completed'] = $this->libraries->getCompletedSafetytalks( $userid, '', '1' );
		$data['documents_completed']= $this->libraries->getCompletedSafetytalks( $userid, $limit_completed );

		$ret_safetytalks_price	= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
		$safetytalks_price 		= $data['safetytalks_price'] = isset($ret_safetytalks_price[0]['in_price']) ? $ret_safetytalks_price[0]['in_price'] : 0;
		$safetytalks_points 	= $data['safetytalks_points'] = isset($ret_safetytalks_price[0]['in_points']) ? $ret_safetytalks_price[0]['in_points'] : 0;
		$safetytalks_credits 	= $data['safetytalks_credits'] = isset($ret_safetytalks_price[0]['in_credits']) ? $ret_safetytalks_price[0]['in_credits'] : 0;

		$this->load->view('mylibrary_safetytalks_view_metro', $data); 
	}

	function mylibrary_hazards_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";
		
		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;
		
		$pgno_free 			= $data['pgno_free'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_free 		= ((($pgno_free-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_free 		= $data['total_free'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid,'2','','3','','1');
		$data['documents_free']	= $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2', '','3', $limit_free);

		$pgno_assigned 		= $data['pgno_assigned'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_assigned 	= ((($pgno_assigned-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_assigned 	= $data['total_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid,'3','','1');
		$data['documents_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid, '3', $limit_assigned);

		$pgno_purchased 	= $data['pgno_purchased'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_purchased 	= ((($pgno_purchased-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_purchased 	= $data['total_purchased'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2','','3','','1');
		$data['documents_purchased']= $this->libraries->getMyInventoriesByUserName($useremail, $userid, '2','','3',$limit_purchased);
		
		$pgno_completed 	= $data['pgno_completed'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_completed 	= ((($pgno_completed-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_completed 	= $data['total_completed'] = $this->libraries->getCompletedDocumentsByUserID($userid,'3', '', '1');
		$data['documents_completed']= $this->libraries->getCompletedDocumentsByUserID($userid, '3', $limit_completed);
		
		$this->load->view('mylibrary_hazards_view_metro', $data);
	}

	function mylibrary_procedures_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;
		
		$data['usermeta'] = $this->users->getUserMetaByID($userid);

		$pgno_free 			= $data['pgno_free'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_free 		= ((($pgno_free-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_free 		= $data['total_free'] = $this->libraries->getMyProceduresInventories($useremail, $userid, '', '', '1');
		$data['documents_free']		= $this->libraries->getMyProceduresInventories($useremail, $userid, '', $limit_free);

		$pgno_purchased 	= $data['pgno_purchased'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_purchased 	= ((($pgno_purchased-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_purchased 	= $data['total_purchased'] = $this->libraries->getMyProceduresInventories($useremail, $userid, '', '', '1');
		$data['documents_purchased']= $this->libraries->getMyProceduresInventories($useremail, $userid, '', $limit_purchased);
		
		$pgno_assigned 		= $data['pgno_assigned'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_assigned 	= ((($pgno_assigned-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_assigned 	= $data['total_assigned'] = $this->libraries->getAssignedProceduresByUserID($userid, '', '1');
		$data['documents_assigned'] = $this->libraries->getAssignedProceduresByUserID($userid, $limit_assigned);
		
		$pgno_completed 	= $data['pgno_completed'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_completed 	= ((($pgno_completed-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_completed 	= $data['total_completed'] = $this->libraries->getCompletedProcedures( $userid, '', '1' );
		$data['documents_completed']= $this->libraries->getCompletedProcedures( $userid, $limit_completed );

		$ret_procedure_price	= $this->users->getMetaDataList('price_settings', 'price_settingsname="procedures"', '', "in_price, in_points, in_credits");
		$procedure_price 		= $data['procedure_price'] = isset($ret_procedure_price[0]['in_price']) ? $ret_procedure_price[0]['in_price'] : 0;
		$procedure_points 		= $data['procedure_points'] = isset($ret_procedure_price[0]['in_points']) ? $ret_procedure_price[0]['in_points'] : 0;
		$procedure_credits 		= $data['procedure_credits'] = isset($ret_procedure_price[0]['in_credits']) ? $ret_procedure_price[0]['in_credits'] : 0;
											
		$this->load->view('mylibrary_procedures_view_metro', $data); 
	}
	
	function mylibrary_investigation_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		$userid 		= $data['userid'] = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : $this->sess_userid;
		$user_details 	= $this->users->getMetaDataList('user', 'status=1 AND id="'.$userid.'"', '', 'email_addr');
		$useremail 		= isset($user_details[0]['email_addr']) ? $user_details[0]['email_addr'] : $this->sess_useremail;

		$pgno_free 			= $data['pgno_free'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_free 		= ((($pgno_free-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_free 		= $data['total_free'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid, '', '', '6', '', '1');
		$data['documents_free']		= $this->libraries->getMyInventoriesByUserName($useremail, $userid, '', '', '6', $limit_free);

		$pgno_purchased 	= $data['pgno_purchased'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_purchased 	= ((($pgno_purchased-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_purchased 	= $data['total_purchased'] = $this->libraries->getMyInventoriesByUserName($useremail, $userid,'','','6', '', '1');
		$data['documents_purchased']= $this->libraries->getMyInventoriesByUserName($useremail, $userid,'','','6', $limit_purchased);

		$pgno_assigned 		= $data['pgno_assigned'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$limit_assigned 	= ((($pgno_assigned-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
		$total_assigned 	= $data['total_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid, '6', '', '1');
		$data['documents_assigned'] = $this->libraries->getAssignedDocumentsByUserID($userid, '6', $limit_assigned);		
		$this->load->view('mylibrary_investigation_view_metro', $data); 
	}
	/***********END MY LIBRARY METRO STYLE****************/


	function addProcedureFunctions($section='', $procedure_id='')
	{
		$section 		= isset($_POST['section']) ? $_POST['section'] : $section;
		$procedureId 	= isset($_POST['procedureId']) ? $_POST['procedureId'] : $procedure_id;

		switch( $section ) {
			case "purpose": {
				$purpose_date 		= isset($_POST['txt_purpose_date']) ? $_POST['txt_purpose_date'] : '';
				$purpose_title 		= isset($_POST['txt_purpose_title']) ? $this->common->escapeStr($_POST['txt_purpose_title']) : '';
				$purpose_description= isset($_POST['txtarea_purpose_description']) ? $this->common->escapeStr($_POST['txtarea_purpose_description']) : '';
				$this->libraries->addProcedureFunctions( 'proc_purpose', 
											"in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', 
											dt_purpose_date='".$purpose_date."', st_purpose_title='".$purpose_title."', st_purpose_description = '".$purpose_description."'"
											, "in_created_by='".$this->sess_userid."' AND in_procedure_id='".$procedureId."'");
				
				// Update procedure title in tbl_my_library				
					$rows_procedures = $this->parentdb->getDatabaseRows('tbl_procedures', 'in_created_by', array('id'=>$procedureId));
					$rows_procedures = $data['rows_procedures']= isset($rows_procedures[0]) ? $rows_procedures[0] : array();
					$proc_created_by = $rows_procedures['in_created_by'];
					$rows_username = $this->users->getMetaDataList('user', 'id="'.$proc_created_by.'"', '', 'CONCAT(firstname," ",lastname) AS username');
					$procedure_type = (isset($rows_username[0]['username'])&&$rows_username[0]['username'] ) ? 'new_procedure' : 's1procedures';

					$arr_upd_mylib_procname 	= array( 'lib_title'=>$purpose_title );
					$arr_where_mylib_procname	= array( 'lib_id'=>$procedureId, 'user_id'=>$proc_created_by, 'st_libtype_bought'=>$procedure_type );
					$this->parentdb->manageDatabaseEntry('tbl_my_library', 'UPDATE', $arr_upd_mylib_procname, $arr_where_mylib_procname);
					
				// Update procedure title in tbl_procedures //
					$arr_upd_procname 	= array( 'st_procedure_name' => $purpose_title );
					$arr_where_procname	= array( 'id' => $procedureId );
					$this->parentdb->manageDatabaseEntry('tbl_procedures', 'UPDATE', $arr_upd_procname, $arr_where_procname);
				break;
			}
			case 'risk': {
				$risk_slider1 	= isset($_POST['hidn_proc_riskslider1']) ? $_POST['hidn_proc_riskslider1'] : '';
				$risk_slider2 	= isset($_POST['hidn_proc_riskslider2']) ? $_POST['hidn_proc_riskslider2'] : '';
				$risk_slider3 	= isset($_POST['hidn_proc_riskslider3']) ? $_POST['hidn_proc_riskslider3'] : '';

				$risk_sliders	= json_encode( array($risk_slider1, $risk_slider2, $risk_slider3) );
				$hazard_names 	= isset($_POST['hidn_proc_riskhazard_names']) ? $_POST['hidn_proc_riskhazard_names'] : '';

				$this->libraries->addProcedureFunctions( 'proc_riskratings_hazards', 
											"in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', 
											st_risk_ratings='".$risk_sliders."', st_hazards_selected='".$hazard_names."'"
											, "in_created_by='".$this->sess_userid."' AND in_procedure_id='".$procedureId."'" );
				break;
			}
			case "training": {
				// common::pr($_POST);die;
				$trainingId 	= isset($_POST['trainingId']) ? $_POST['trainingId'] : '';
				$trainingUser 	= isset($_POST['trainingUser']) ? $_POST['trainingUser'] : '';
				$this->libraries->addProcedureFunctions( 'proc_training', 
											"in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', st_training_user='".$trainingUser."', 
											st_training_selected='".str_replace(" ",",",trim($trainingId))."'"
											, "in_created_by='".$this->sess_userid."' AND st_training_user='".$trainingUser."' AND in_procedure_id='".$procedureId."'");
				break;
			}
			case "ppe": {
				$ppe_added 			= isset($_POST['ppe_item']) ? json_encode($_POST['ppe_item']) : '';
				$ppe_selected 		= isset($_POST['hidn_proc_ppe_selected']) ? json_encode( explode(",",$_POST['hidn_proc_ppe_selected']) ) : '';
				$this->libraries->addProcedureFunctions( 'proc_ppe_machinery', 
											"in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', 
											st_ppe_added='".$ppe_added."', st_ppe_selected='".$ppe_selected."'"
											, "in_created_by='".$this->sess_userid."' AND in_procedure_id='".$procedureId."'");
				break;
			}
			case "machinery": {
				$machinery_added 	= isset($_POST['machinery_item']) ? json_encode($_POST['machinery_item']) : '';
				$machinery_selected = isset($_POST['hidn_proc_machinery_selected']) ? json_encode( explode(",",$_POST['hidn_proc_machinery_selected']) ) : '';
				$machinery_instruction 	= $this->common->escapeStr( json_encode($this->input->post('machinery_instruction')) );

				$this->libraries->addProcedureFunctions( 'proc_ppe_machinery', 
											"in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', 
											st_machinery_added='".$machinery_added."', st_machinery_selected='".$machinery_selected."', 
											st_machinery_contents='".$machinery_instruction."'"
											, "in_created_by='".$this->sess_userid."' AND in_procedure_id='".$procedureId."'" );
				break;
			}
			case "procedures": {
				ini_set('post_max_size', '20M');
				ini_set('upload_max_filesize', '20M');

				$procimage_id 		= $this->input->post('procimage_id');
				$files 				= $_FILES;
				$this->load->library('upload');

				// common::pr($files);die;
				// Add Procedure Images //
					if( isset($files['userfile']['name']) && sizeof($files['userfile']['name']) > 0 ) {
						foreach( $files['userfile']['name'] AS $key_procimage => $val_procimage ) {
							if( $val_procimage ) {
								$last_procimage_id 	= !($procimage_id[$key_procimage]) ? $this->parentdb->getLastRowId('tbl_procedures_image_video') : $procimage_id[$key_procimage];
								$_FILES['userfile']['size'] 	= $files['userfile']['size'][$key_procimage];
								$_FILES['userfile']['name'] 	= $files['userfile']['name'][$key_procimage];
								$_FILES['userfile']['type'] 	= $files['userfile']['type'][$key_procimage];
								$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$key_procimage];
								$_FILES['userfile']['error'] 	= $files['userfile']['error'][$key_procimage];
								// Delete the existing Procedure Image if available //
									if( $proc_img = glob(FCPATH.$this->path_upload_procedures."procedure_image".$last_procimage_id."_".($key_procimage+1).".*") ) {
										$arr_proc_img = explode("/", $proc_img[0]);
										isset($arr_proc_img[sizeof($arr_proc_img)-1]) ? unlink( FCPATH.$this->path_upload_procedures.$arr_proc_img[sizeof($arr_proc_img)-1] ) : '';
									}
									
								// Upload the Procedure Image //
									$ext_procimg	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
									$proc_imgname 	= "procedure_image".$last_procimage_id."_".($key_procimage+1).".".$ext_procimg;
									$this->upload->initialize($this->common->setUploadOptions($this->path_upload_procedures, $proc_imgname));
									if( !$this->upload->do_upload() ) {
										echo $this->upload->display_errors("<span class='error'>", "</span>");
									}
									else {
										$data = array('upload_data' => $this->upload->data());
									}
									$where_procimage = ($procimage_id[$key_procimage]) ? 'in_procedure_id="'.$procedureId.'" AND id="'.$procimage_id[$key_procimage].'"' : '';
								$this->libraries->addProcedureFunctions( 'procedures_image_video', "in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', in_procedure_image_video=1, st_procedure_image_video='".$proc_imgname."'", $where_procimage );
							}
						}
					}

				// Add Procedure Videos //
					$procvideo_id = $this->input->post('procvideo_id');
					foreach( $files['procedure_videoupd']['name'] AS $key_procvideo => $val_procvideo ) {
						$arr_txt_procvideo	= $this->input->post('txt_procedure_videoupd');
						$txt_procevideo 	= trim($arr_txt_procvideo[$key_procvideo]);

						// Last Inserted Procedure Id
							$last_procvideo_id=!($procvideo_id[$key_procvideo])?$this->parentdb->getLastRowId('tbl_procedures_image_video'):$procvideo_id[$key_procvideo];

						if( $val_procvideo) {
							$_FILES['procedure_videoupd']['size'] 	 = $files['procedure_videoupd']['size'][$key_procvideo];
							$_FILES['procedure_videoupd']['name'] 	 = $files['procedure_videoupd']['name'][$key_procvideo];
							$_FILES['procedure_videoupd']['type'] 	 = $files['procedure_videoupd']['type'][$key_procvideo];
							$_FILES['procedure_videoupd']['tmp_name']= $files['procedure_videoupd']['tmp_name'][$key_procvideo];
							$_FILES['procedure_videoupd']['error'] 	 = $files['procedure_videoupd']['error'][$key_procvideo];
							
							// Delete the existing Procedure Video if available //
								if( $proc_vid = glob(FCPATH.$this->path_upload_procedures."procedure_video".$last_procvideo_id."_".($key_procvideo+1).".*") ) {
									$arr_proc_vid = explode("/", $proc_vid[0]);
									isset($arr_proc_vid[sizeof($arr_proc_vid)-1]) ? unlink( FCPATH.$this->path_upload_procedures.$arr_proc_vid[sizeof($arr_proc_vid)-1] ) : '';
								}
								
							// Upload the Procedure Video //
								$ext_procvideo	= $this->common->getImagePathInfo( $_FILES['procedure_videoupd']['name'], 'extension' );
								$proc_vidname 	= "procedure_video".$last_procvideo_id."_".($key_procvideo+1).".".$ext_procvideo;

								$config['upload_path']   	= $this->path_upload_procedures;
								$config['allowed_types']	= '*';
								$config['file_name'] 		= $proc_vidname;
								$this->load->library('upload', $config);									
								$this->upload->initialize($config);
							
								if( !$this->upload->do_upload('procedure_videoupd') ) {
									echo $err_upload_video = $this->upload->display_errors("<span class='error'>", "</span>");
								}
								else {
									$data = array('upload_data' => $this->upload->data());
								}
						}

						if( $val_procvideo || $txt_procevideo ) {
							// Add procedure view entry into the database // 
							$where_procvideo= ($procvideo_id[$key_procvideo]) ? 'in_procedure_id="'.$procedureId.'" AND id="'.$procvideo_id[$key_procvideo].'"' : '';

							$ins_procvideo = "in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', in_procedure_image_video=2,  st_procedure_video_text='".$txt_procevideo."'";
							($proc_vidname) ? $ins_procvideo .= ", st_procedure_image_video='".$proc_vidname."'" : '';
							$this->libraries->addProcedureFunctions( 'procedures_image_video', $ins_procvideo, $where_procvideo );
						}

						
					}

				// Add Procedure Items and Overview //
					$procedure_overview = isset($_POST['txt_procedure_overview']) ? $this->common->escapeStr($_POST['txt_procedure_overview']) : '';
					$procedure_items 	= isset($_POST['procedure_item']) ? $this->common->escapeStr(json_encode($_POST['procedure_item'])) : '';

					$this->libraries->addProcedureFunctions( 'proc_procedures', "in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."',  
															st_procedure_overview='".$procedure_overview."', st_procedure_items='".$procedure_items."'", 
															"in_created_by='".$this->sess_userid."' AND in_procedure_id='".$procedureId."'" );
					
				break;
			}
			case "due_diligence": {
				// common::pr($_POST);die;
				if( isset($_POST['cmb_regulation_number']) && $_POST['cmb_regulation_number'] ) {
					foreach( $_POST['cmb_regulation_number'] AS $key_reg => $val_reg ) {
						$reg_no 	= isset($_POST['cmb_regulation_number']) ? $_POST['cmb_regulation_number'][$key_reg] : '';
						$section 	= isset($_POST['cmb_section']) ? $_POST['cmb_section'][$key_reg] : '';
						$subsection = isset($_POST['cmb_subsection']) ? $_POST['cmb_subsection'][$key_reg] : '';
						$item 		= isset($_POST['cmb_item']) ? $_POST['cmb_item'][$key_reg] : '';
						$subitem 	= isset($_POST['cmb_subitem']) ? $_POST['cmb_subitem'][$key_reg] : '';
						
						$arr_proc_regulations[$key_reg]['regno'] 	= $reg_no;
						$arr_proc_regulations[$key_reg]['section'] 	= $section;
						$arr_proc_regulations[$key_reg]['subsection']= $subsection;
						$arr_proc_regulations[$key_reg]['item'] 		= $item;
						$arr_proc_regulations[$key_reg]['subitem'] 	= $subitem;				
					}
				}
				$ins_procduediligence	= "in_created_by='".$this->sess_userid."', in_procedure_id='".$procedureId."', 
											st_regulation_data='".json_encode($arr_proc_regulations)."'";
				$where_procduediligence = "in_created_by='".$this->sess_userid."' AND in_procedure_id='".$procedureId."'";
				
				$this->libraries->addProcedureFunctions('proc_due_deligence', $ins_procduediligence, $where_procduediligence );
				break;
			}

			case 'close_procedure': {
				$this->libraries->addProcedureFunctions( 'procedures', "in_created_by='".$this->sess_userid."', date_completed='".date('Y-m-d h:i:s')."', st_procedure_status='completed'"
														, "in_created_by='".$this->sess_userid."' AND id='".$procedureId."'" );

				// ADD/EDIT Consultant performed Information //
					$consultant_client_id = isset($_POST['clientid'])&&(int)$_POST['clientid'] ? (int)$_POST['clientid'] : '';
					$this->libraries->addConsultantPerformedLibrary($consultant_client_id, 'new_procedure', $procedureId, 'completed' );
				break;
			}
		}
	}

	/***********MY NEW PROCEDURE, CREATED BY CLIENT - MARCIO AUG-20-2014****************/
	function my_created_procedures_metro()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";
		$data['procedure_id'] 	= isset($_GET['id']) ? $_GET['id'] : '';
		$data['procedure_type'] = isset($_GET['type']) ? $_GET['type'] : '';

		if( "POST"==$_SERVER['REQUEST_METHOD'] || "FILES"==$_SERVER['REQUEST_METHOD'] ) {
			$procedure_section = $this->input->post('hidn_procedure_section');
			$this->addProcedureFunctions( $procedure_section, $data['procedure_id'] );
		}

		// Check procedure status //
			$procedure_status 			= $this->users->getMetaDataList('procedures', 'id="'.$data['procedure_id'].'"', '', 'st_procedure_name, st_procedure_status');
			$data['procedure_title'] 	= isset($procedure_status[0]['st_procedure_name']) ? $procedure_status[0]['st_procedure_name'] : 'My New Procedure';
			$data['procedure_status'] 	= isset($procedure_status[0]['st_procedure_status']) ? $procedure_status[0]['st_procedure_status'] : '';

		$this->load->view('my_created_procedures_metro', $data);
	}
	/***********END MY NEW PROCEDURE, CREATED BY CLIENT - MARCIO AUG-20-2014****************/


	/****** MY Inspection Form View - Metro Style - MAY 12 2014 BY MARCIO******/
	function my_inspection_page_metro()
	{
		$arr_post 		= $_POST;
		$data 			= $this->commonHead();
		$data['module'] = "dashboard";
		$inspection_name= '';

		$data['clientid'] = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';

		// Post data //
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				$arr_post = $_POST;
				if( isset($arr_post['hidn_item_id']) && $arr_post['hidn_item_id']
					&& isset($arr_post['hidn_inspection_id']) && $arr_post['hidn_inspection_id'] ) { // ITEM is NotOk - Submit Inspection Item //

					$ret_insert 	= $this->inspection->addInspectionItemInfo( $arr_post );
				}
				else if (isset($arr_post['hidn_inspection_id']) && $arr_post['hidn_inspection_id']) { // Save Inspection //
					$rows_inspitem_status = $this->users->getMetaDataList( 'inspection_item_information', ('in_inspection_id="'.$arr_post['hidn_inspection_id'].'"'), '', 'st_item_status' );
					$upd_inspection_status = $this->inspection->updateInspectionStatus($arr_post['hidn_inspection_id'], $rows_inspitem_status, 'normal');
				}
				else if( isset($arr_post['btn_submit_custominspection']) && $arr_post['btn_submit_custominspection'] ) {
					$upd_custominsp_status = $this->inspection->updateInspectionStatus($inspection_id, '', 'custom');
				}
				else { // Submit Inspection Workplace Information //
					$arr_post['inspection_id'] = $inspection_id;
					$ret_insert = $this->inspection->addInspectionWorkplaceInfo( $arr_post );
					$data['message'] = ((int)$ret_insert) ? "Workplace Information updated successfully ." : '';
				}
			}

		// Get Values // 
			$inspection_id 			= isset($_GET['id'])&&(int)$_GET['id'] ? $_GET['id'] : '';
			$data['inspection_id'] 	= $inspection_id;
			$inspection_type		= isset($_GET['type'])&&$_GET['type'] ? $_GET['type'] : '';
			$data['inspection_type']= $inspection_type;

		// Get connected S1 memeber with the Logged in User //
			$ret_connected_s1members= Ajax::ajax_getConnections();
			$connected_s1members 	= ($ret_connected_s1members) ? json_decode($ret_connected_s1members) : array();
			$data['connected_s1members'] = $connected_s1members;

		// Get my jhsc workers
			$jhsc_my_workers 		= $data['jhsc_my_workers'] = $this->users->getDesignationData("tbl_employer_consultant_designations", 
														array('in_user_id'=>$this->sess_userid, 
														'st_designation'=>'my_worker','st_status'=>'y', 
														'st_designation'=>'jhsrep','st_status'=>'y'), 'in_worker_id');
		// Get my hsrep workers
			$hsrep_my_workers 		= $data['hsrep_my_workers'] = $this->users->getDesignationData("tbl_employer_consultant_designations", 
														array('in_user_id'=>$this->sess_userid, 
														'st_designation'=>'my_worker','st_status'=>'y', 
														'st_designation'=>'hsrep','st_status'=>'y'), 'in_worker_id');

		// Get Inspection Name //
			if( "normal_inspection" == $inspection_type ) {
				$ret_inspection 	= $this->users->getMetaDataList( 'inspection', 'id = "'.$inspection_id.'"', '', 
													'st_inspection_name AS inspection_name, st_inspection_status' );
				$is_custom = 0;
			}
			else if( "custom_inspection" == $inspection_type ) {
				$ret_inspection 	= $this->users->getMetaDataList( 'custom_inspection', 'id = "'.$inspection_id.'"', '', 
													'st_custom_inspection_name AS inspection_name, st_inspection_status' );
				$is_custom = 1;
			}
			$inspection_name = $data['inspection_name'] = $ret_inspection[0]['inspection_name'];
			$inspection_status = $data['inspection_status'] = $ret_inspection[0]['st_inspection_status'];

		// Get Inspection Items //
			$select_fields 	= 'tinspitem.id AS item_id, tinsp.id AS inspection_id, st_inspection_name, st_item_name, st_regulation_number, st_section, st_subsection, st_item, st_subitem';
			$rows_insp_items= $this->inspection->getInspectionItems($select_fields, $inspection_id, $is_custom, '1');
			$data['rows_insp_items'] = $rows_insp_items;

		// Get Inspection Workplace after the data posted //
			$rows_inspection_info = $this->users->getMetaDataList( 'inspection_information', 
															('in_inspection_id="'.$inspection_id.'" AND st_inspection_type="'.$inspection_type.'"'), '', '*' );
			$data['inspection_info'] = sizeof($rows_inspection_info) ? $rows_inspection_info : array();

		$this->load->view('my_inspection_page_metro', $data); 
	}
	
	
	function getUserDetails()
	{
		$user_id 	= $this->input->post('user_id');
		$rows_users = $this->users->getUserByID($user_id, 'id, firstname, lastname', 1);

		foreach( $rows_users AS $key_users => $val_users ) { 
			$get_employers = $this->users->getEmployersFromUserId($val_users['id'], 'firstname, lastname');?>
			<div class="row-fluid">
				<div class="span5"><?php echo $val_users['firstname']." ".$val_users['lastname'];?></div>
				<div class="span7">
				<?php 
				foreach( $get_employers AS $key_employers => $val_employers ) {
					echo $val_employers['firstname'].$val_employers['lastname']."<br>";
				}
				?>
				</div>
			</div>
			<?php 
		}
		echo "<div>&nbsp;</div>";
	}
	
	function getSafetytalksTopicsWithItems()
	{
		$safetytalks_id = isset($_POST['safetytalks_id']) ? explode(",", $_POST['safetytalks_id']) : array();
		foreach( $safetytalks_id AS $safetytalks_id ) {
			$rows_safetytalks_topics = $this->safetytalks->getSafetytalksTopicsWithItems('tsft.id AS safetytalks_id, st_safetytalks_topic, st_icon_path', $is_custom=0, $safetytalks_id, $is_items='1');
			
			
			foreach( $rows_safetytalks_topics AS $key_saftytalks_id => $val_saftytalks_id ) { ?>
				<div class="row-fluid metro">
					<div class="span5">
						<?php 
						echo "<h4>Topic Name: ".$val_saftytalks_id['safetytalks_topic']."</h4>";					
						if( isset($val_saftytalks_id['icon_path']) && $val_saftytalks_id['icon_path'] ) {
							echo "<h4>Icon: ";?>
							<a title="Click to see full image" class="fancybox-media" href="<?php echo $val_saftytalks_id['icon_path'];?>" data-fancybox-group="gallery">
								<img width="85" height="80" src="<?php echo $val_saftytalks_id['icon_path'];?>">
							</a>
							</h4>
							<?php 
						}
						// Get Safetytalks Images and Videos // 
							$safetytalks_img_vid	= $this->users->getMetaDataList( 'safetytalks_image_video', 'in_safetytalks_id="'.$safetytalks_id.'" AND in_status=1', '', 'in_safetytalks_image_video, st_safetytalks_image_video' );
							if( isset($safetytalks_img_vid) && sizeof($safetytalks_img_vid) ) {
								$cnt_safetyvid=0;
								echo "<h4>Image(s): ";
								foreach( $safetytalks_img_vid AS $key_safety => $val_safety ) {
									$is_safetytalks_imgorvid 	= isset($val_safety['in_safetytalks_image_video'])  ? $val_safety['in_safetytalks_image_video'] : '';
									$name_safetytalks_imgorvid 	= isset($val_safety['st_safetytalks_image_video'])  ? $val_safety['st_safetytalks_image_video'] : '';
									if( "1" == $is_safetytalks_imgorvid ) {
										if( file_exists(FCPATH.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid) ) {?>
											<?php echo "&nbsp;&nbsp;";?><a title="Click to see full image" class="fancybox-media" href="<?php echo $this->base.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid;?>" data-fancybox-group="gallery">
												<img width="85" height="80" src="<?php echo $this->base.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid;?>">
											</a>
											<?php 
										}
									}
								}
								echo "</h4><h4>Video(s): ";
								foreach( $safetytalks_img_vid AS $key_safety => $val_safety ) {
									$is_safetytalks_imgorvid 	= isset($val_safety['in_safetytalks_image_video'])  ? $val_safety['in_safetytalks_image_video'] : '';
									$name_safetytalks_imgorvid 	= isset($val_safety['st_safetytalks_image_video'])  ? $val_safety['st_safetytalks_image_video'] : '';
									if( "2" == $is_safetytalks_imgorvid ) {
										$cnt_safetyvid++;
										if( $name_safetytalks_imgorvid ) {?>
											<a class="fg-gray fancybox fancybox.iframe" href="<?php echo "https://www.youtube.com/embed/".$name_safetytalks_imgorvid;?>?autoplay=1"><?php echo "<b>Video ".$cnt_safetyvid."</b>";?></a>
											<?php 
										}
									}
								}
								echo "</h4>";
							}?>
					</div>
					
					<div class="span5">
					<?php 
					echo "<h4>Item(s) </h4>";
					$cnt_safetyitem = 0;
					// common::pr( $val_saftytalks_id  );
					foreach( $val_saftytalks_id AS $key_item_id => $val_item_id ) {
						if( isset($val_item_id['st_item_name'])&&(int)$key_item_id ) {
							$cnt_safetyitem++;
							echo "<div><b>".$cnt_safetyitem.".</b>&nbsp".$val_item_id['st_item_name']."</div>";
						}
					}
					echo (!$cnt_safetyitem) ? "<div>No Item(s) available</div>" : '';
					?>
					</div>
				</div>
				<?php 
			}
		}
		echo "<div>&nbsp;</div>";
	}

	
	// My Safetytalks Performing module //
		function my_safetytalks_page_metro()
		{
			$data_commonhead= $this->commonHead();
			$data_connection= $this->commonConnection();
			$data    		= array_merge( $data_commonhead, $data_connection );
			$data['module'] = "dashboard";

			$safetytalks_topics = array();

			// Get Values // 
				$safetytalks_id = $data['safetytalks_id'] = isset($_GET['id'])&&(int)$_GET['id'] ? (int)$_GET['id'] : '';
				$safetytalks_type = $data['safetytalks_type'] = isset($_GET['type'])&&$_GET['type'] ? $_GET['type'] : '';
			
			$data['clientid'] = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';
			
			// Get All S1 workers and S1 Employers //
				$all_workers = $this->users->getMetaDataList('user', 'status=1 AND type_id=9', '', 'id, email_addr, profile_image, CONCAT(firstname," ",lastname) AS username');
				$data['all_workers'] = (isset($all_workers)&&sizeof($all_workers)) ? $all_workers : '';
				$all_employers = $this->users->getMetaDataList('user', 'status=1 AND type_id=8', '', 'id, email_addr, profile_image, CONCAT(firstname," ",lastname) AS username');
				$data['all_employers'] = (isset($all_employers)&&sizeof($all_employers)) ? $all_employers : '';

			// Get Safetytalks topics as per the data type seleced //
				if( "normal_safetytalks" == $safetytalks_type || "new_normal_safetytalks" == $safetytalks_type ) {
					$is_custom = 0;
					$tblname = "safetytalks";
				}
				else if( "custom_safetytalks" == $safetytalks_type ) {
					$is_custom = 1;
					$tblname = "custom_safetytalks";
				}
			
			// Post data //
				if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
					$arr_post 	= $_POST;
					$arr_post['safetytalks_id'] = $safetytalks_id;
					$arr_post['is_custom'] 		= $is_custom;
					$ins_safetytalks_info 		= $this->safetytalks->addSafetytalksPerformingInfo( $arr_post );					
					$data['message'] 	= ((int)$ins_safetytalks_info) ? "SafetyTalks Information updated successfully ." : '';
				}

			// Get Safetytalks Status
				$safetytalks_status = $this->users->getMetaDataList($tblname, 'id="'.$safetytalks_id.'"', '', 'st_safetytalks_status');
				$data['safetytalks_status'] = (isset($safetytalks_status[0]['st_safetytalks_status'])) ? $safetytalks_status[0]['st_safetytalks_status'] : '';

			// Safetytalks Topics
				$rows_safetytalks_topics = $this->safetytalks->getSafetytalksTopicsWithItems('tsft.id AS safetytalks_id, st_safetytalks_topic, st_icon_path', $is_custom, $safetytalks_id );
				$data['safetytalks_topics'] = sizeof($rows_safetytalks_topics) ? $rows_safetytalks_topics : array();

			// My Employers //
				$rows_my_employers = $this->users->getEmployersFromUserId($this->sess_userid);
				$data['my_employers'] = sizeof($rows_my_employers) ? $rows_my_employers : array();

			// Get Safetytalks Information after the data posted //
				$rows_safetytalks_info 	= $this->users->getMetaDataList('safetytalks_information', ('in_safetytalks_id="'.$safetytalks_id.'" AND is_custom_safetytalks="'.$is_custom.'"'), '', '*' );
				$data['safetytalks_info'] = sizeof($rows_safetytalks_info) ? $rows_safetytalks_info : array();
				
				$rows_safetytalks_attendee = $this->users->getMetaDataList('safetytalks_attendees', 
												('in_safetytalks_id="'.$safetytalks_id.'" AND is_custom_safetytalks="'.$is_custom.'"'), '', 
												'in_safetytalks_id, st_attendee_s1worker, st_attendee_s1employer, st_attendee_nons1users' );
				$data['safetytalks_attendees'] = sizeof($rows_safetytalks_attendee) ? $rows_safetytalks_attendee : array();

			// Load view file	
				$this->load->view('my_safetytalks_page_metro', $data); 
		}

	/****** News METRO STYLE - MAY 12 2014 BY MARCIO******/
	function news_metro(){
		$data 				= $this->commonHead();
		$data['module'] 	= "dashboard";
		$social_media_points= $this->users->getMetaDataList('point_page_sections', 'in_pointpage_section_id=21', '', 'in_credits');
		$social_media_points= isset($social_media_points[0]['in_credits']) ? $social_media_points[0]['in_credits'] : '';
		$data['social_media_points'] = $social_media_points;
		$this->load->view('news_metro', $data); 
	}
 
 
    /****** My Unions - Metro Style Aug 14 2014 by Marcio ******/
    function my_union_metro()
	{
        $data = $this->commonHead();
        $data['module'] = "dashboard";
		   $meta = "user";
			$where = " status = 1 and type_id = 7";
			$order_by = " ORDER BY TRIM(firstname) DESC";

		$data['list'] = $this->users->getMetaDataList($meta, $where, $order_by);
        $this->load->view('my_union_metro', $data); 
    }
     /****** Union User view  - Metro Style Aug 14 2014 by Marcio ******/
    function view_union_metro()
	{
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$userID 		= (int)$_GET['id'];
		$data['union'] 	= $this->users->getUserByID($userID);
		$data['usermeta'] = $this->users->getUserMetaByID($userID);
		
		$sector     		= isset($_POST['cmb_sector']) ? $_POST['cmb_sector'] : '';
		$data['cmb_sector'] = $sector;
		
		$role_title    = isset($_POST['cmb_job_title']) ? $_POST['cmb_job_title'] : '';
		$data['cmb_job_title'] = $role_title;

		$unionreps_text    = isset($_POST['txt_unionreps_text']) ? $_POST['txt_unionreps_text'] : '';
		$data['txt_unionreps_text'] = $unionreps_text;
		
		$data['display_msg'] = "Please select at least one search criteria to get the data.";

        $this->load->view('union_public_view_metro', $data); 
    }

	/****** Union Events - Metro Style May 15 2014 by Marcio ******/
	/****** Updated by Marcio on June 03 2015 for LOCAL183 AND ITS TRAINING CENTRE (ID 135 AND 181) - ******/
    function union_events_metro()
	{
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$userID     	= (int)$_GET['id'];
		$data['union']  = $this->users->getUserByID($userID);
		$data['usermeta'] = $this->users->getUserMetaByID($userID);
		if( $userID==135 ) {
			$this->load->view('local183_events_metro', $data);
		}
		else if( $userID==181 ) {
			$this->load->view('local183_tc_events_metro', $data);
		}
		else {
			$this->load->view('union_events_metro', $data);
		}
    }
	
	/****** Union NEWS - Metro Style May 15 2014 by Marcio - ******/
	/****** Updated by Marcio on June 03 2015 for LOCAL183 AND ITS TRAINING CENTRE (ID 135 AND 181) - ******/
    function union_news_metro()
	{
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$userID     	= (int)$_GET['id'];
		$data['union']  = $this->users->getUserByID($userID);
		$data['usermeta'] = $this->users->getUserMetaByID($userID);
		if( $userID==135 ) {
			$this->load->view('local183_news_metro', $data);
		}
		else if( $userID==181 ) {
			$this->load->view('local183_tc_news_metro', $data);
		}
		else {
			$this->load->view('union_news_metro', $data);
		}       
    }
	
	
 /****** Union Training - Metro Style May 15 2014 by Marcio ******/
    function union_training_metro(){ // Function updated as per the email on 03Jun2015 //
        $data 			= $this->commonHead();
        $data['module'] = "dashboard";
		$userID   		= (int)$_GET['id'];
		$data['union']  = $this->users->getUserByID($userID);
		$data['usermeta'] = $this->users->getUserMetaByID($userID);
		if( $userID==135 ) {
			$this->load->view('union_training_metro_loc183', $data);
		}
		else if( $userID==181 ){
			$this->load->view('union_training_metro_loc183', $data);
		}
		else {
			$this->load->view('union_training_metro', $data);
		}     
    }
	
    /****** NEW WORKER ORIENTATION - Metro Style May 15 2014 by Marcio  ******/
    function new_worker_orientation_metro(){
        $data = $this->commonHead();
        $data['module'] = "dashboard";
        $this->load->view('new_worker_orientation_metro', $data); 
    }
  /****** JHSC MINUTES MEETINGS - Metro Style May 15 2014 by Marcio ******/
 function jhsc_meetings_metro()
 {
  $data = $this->commonHead();
  $data['module'] = "dashboard";
  $this->load->view('jhsc_meetings_metro', $data); 
 } 
 
 function error_page()
 {
	$data = $this->commonHead();
	$data['module'] = "dashboard";
	$this->load->view('error_page', $data); 
 }
 
 function error_404()
 {
	$data = $this->commonHead();
	$data['module'] = "dashboard";
	$this->load->view('error_404', $data); 
 }
 
 function digital_project_metro_jhsc_supervisor()
 {
	$data = $this->commonHead();
	$data['module'] = "dashboard";
	$this->load->view('digital_project_metro_jhsc_supervisor', $data); 
 }
 
 function digital_project_metro_worker()
 {
	$data = $this->commonHead();
	$data['module'] = "dashboard";
	$this->load->view('digital_project_metro_worker', $data); 
 }
 
 function digital_project_metro_employer()
 {
	$data = $this->commonHead();
	$data['module'] = "dashboard";
	$this->load->view('digital_project_metro_employer', $data); 
 }
 
	function dig_safety_board_metro_employer()
	{
		$data = $this->commonHead();
		$data['module'] = "dashboard";
		$this->load->view('dig_safety_board_metro_employer', $data); 
	}

	function price_settings()
	{
		$data = $this->commonHead();
		$data['module'] = "profile";
		$this->load->view('price_settings', $data); 
	}

	function buy_credits()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		// Get Credits Packages //
			$credits_packages = $this->users->getMetaDataList('credits_package', 'in_status=1', '', 'in_creditspkg_id, st_creditspkg_name, in_price, in_credits');
			$data['credits_packages'] = $credits_packages;

		$rows_credits_requests 	= $this->users->getMetaDataList( 'credits_requests', 'st_credits_requested_by="'.$this->sess_useremail.'"', '', 
										'in_credits_requested, in_credits_price, st_credits_request_status' );
		$data['credits_requested'] 		= isset($rows_credits_requests[0]['in_credits_requested']) ? $rows_credits_requests[0]['in_credits_requested'] : '';
		$data['credits_price'] 			= isset($rows_credits_requests[0]['in_credits_price']) ? $rows_credits_requests[0]['in_credits_price'] : '';
		$data['credits_request_status'] = isset($rows_credits_requests[0]['st_credits_request_status']) ? $rows_credits_requests[0]['st_credits_request_status'] : '';

		if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
			$platinum_credits 		= isset($_POST['txt_platinum_credits']) ? $_POST['txt_platinum_credits'] : '';
			$arr_credits_requests 	= array('st_credits_requested_by'=>$this->sess_useremail, 'in_credits_requested'=>$platinum_credits);

			$this->parentdb->manageDatabaseEntry('tbl_credits_requests', 'INSERT', $arr_credits_requests);
		}
		$this->load->view('buy_credits', $data); 
	}


	function my_wallet()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data 			= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		// Get total available credits 
			$total_available_credits = $data['total_available_credits'] = $this->points->getS1Credits();

		$this->load->view('my_wallet', $data);
	}
	
	function my_challenges()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    = array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";
		$this->load->view('my_challenges', $data);
	}
		
	function my_crew()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    		= array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		$crew_id 		= $data['crew_id'] = isset($_GET['crew_id']) ? $_GET['crew_id'] : '';
		
		if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
			// Change Supervisor //
				$supervisor_id			= $this->input->post('cmb_supervisor');
				$arr_upd_supervisor 	= array('in_supervisor_id'   	=> $supervisor_id);
				$arr_where_supervisor	= array('in_crew_employer_id'	=> $this->sess_userid, 
												'in_crew_id'			=> $crew_id, 
												'in_crew_status'	 	=> 1);
				$this->parentdb->manageDatabaseEntry('tbl_crew_of_employers', 'UPDATE', $arr_upd_supervisor, $arr_where_supervisor);
		}

		// Get crew workers of Logged in User(Crew Employer)
			$arr_crew_workers 		 = $this->users->getMetaDataList("crew_of_employers", 
											'in_crew_status=1 AND in_crew_id="'.$crew_id.'" AND in_crew_employer_id = "'.$this->sess_userid.'"', '', 'st_crew_label, st_crew_workers');
			$data['arr_crew_workers']= isset($arr_crew_workers[0]) ? $arr_crew_workers[0] : '';
		
		// Get My Crew Workers //
			$my_crew_workers 		= (isset($arr_crew_workers[0]['st_crew_workers']) && $arr_crew_workers[0]['st_crew_workers']) ? $arr_crew_workers[0]['st_crew_workers'] : '';
			$data['my_crew_workers']= ($my_crew_workers) ? $this->users->getMyLinksByUserID($this->sess_userid, $this->sess_usertype, 1, 'id IN ('.$my_crew_workers.')') : array();

		// Get Supervisor //
			$whereArr['crew_id'] 			= $crew_id;
			$whereArr['crew_employer_id'] 	= $this->sess_userid;			
			$rows_supervisors 				= $data['rows_supervisors'] = $this->users->getSupervisorDetails($whereArr);

		$this->load->view('my_crew', $data);
	}
	
	function add_workers_my_crew()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    = array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";

		$crew_id 		= isset($_GET['crew_id']) ? $_GET['crew_id'] : '';
		$data['crew_id']= $crew_id;

		$arr_crew_workers = $this->users->getMetaDataList("crew_of_employers", 
										'in_crew_status=1 AND in_crew_id="'.$crew_id.'" AND in_crew_employer_id = "'.$this->sess_userid.'"', '', 'st_crew_label, st_crew_workers');
		$data['arr_crew_workers'] = isset($arr_crew_workers[0]) ? $arr_crew_workers[0] : '';
		$my_crew_workers = (isset($arr_crew_workers[0]['st_crew_workers']) && $arr_crew_workers[0]['st_crew_workers']) ? $arr_crew_workers[0]['st_crew_workers'] : '';
		$data['my_crew_workers'] = $my_crew_workers;
		$data['all_connected_workers'] = ($my_crew_workers) ? $this->users->getMyLinksByUserID($this->sess_userid, $this->sess_usertype, 1) : array();

		$this->load->view('add_workers_my_crew', $data);
	}

	function awareness_training()
	{
		$data   = $this->commonHead();
		$data['module'] = "dashboard";
		$data['utype']  = isset($_GET['user']) ? $_GET['user'] : 'worker';
		$this->load->view('awareness_training', $data);
	}
	
	function modal_shopping_items()
	{
		$library_type = isset($_POST['library_type']) ? $_POST['library_type'] : '';
		$arr_s1cart['library_type'] = $library_type;
		
		if( $library_type ) {
			if( "new_custom_inspection" == $library_type ) {
				// Checkout Process //
					session_start();
					if( isset($_SESSION['all_inspections']) && sizeof($_SESSION['all_inspections']) ) {
						$data['sess_all_inspections'] = $_SESSION['all_inspections'];
						$ret_cart_items= $this->users->getMetaDataList('inspection', 'id IN ('.implode(",", $_SESSION['all_inspections']).')', '', 'SUM(in_price) AS price, st_language AS language,  SUM(in_earning_points) AS points, SUM(in_credits_buy) AS credits, SUM(in_credits_buy) AS creditsbuy');

						$cart_data 	= $ret_cart_items[0];				
						$id = "S1".($this->cart->total_items()+1);
					
						$title 		= $description = (isset($_POST['txt_label_custominsp']) && $_POST['txt_label_custominsp']) ? $_POST['txt_label_custominsp'] : 'NoLabel';
						$price 		= $cart_data['price'];
						$language 	= $cart_data['language'];
						$points 	= $cart_data['points'];
						$credits 	= $cart_data['credits'];
						$creditsbuy = $cart_data['creditsbuy'];
						$inspection_type= 'custom' ? 'custom' : '';
					}
			}
			else {
				$id 			= isset($_POST['id']) ? $_POST['id'] : '';
				$inspection_type= isset($_POST['inspection_type']) ? $_POST['inspection_type'] : '';
				$title 			= isset($_POST['title']) ? $_POST['title'] : '';
				$description 	= isset($_POST['description']) ? $_POST['description'] : '';
				$price 			= isset($_POST['price']) ? $_POST['price'] : '';
				$points 		= isset($_POST['points']) ? $_POST['points'] : '';
				$credits 		= isset($_POST['credits']) ? $_POST['credits'] : '';
			}
			$arr_s1cart 	= $this->common->getShoppingCartParams( $id, $library_type, $title, $description, $price, $points, $credits, $inspection_type );

			// Get credits available //
				$total_available_credits = $this->points->getS1Credits("",$this->sess_userid);
				
			$arr_s1cart['credits_available'] = $total_available_credits;
			$arr_s1cart['library_type'] = $library_type;
		}
		$this->load->view('modal_shopping_items', $arr_s1cart); 
	}

	/****** my clients mockup design from Marcio Feb-18-2015******/
	function my_clients()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    = array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";  
		$whereStr ="";$where_users="";
		$data['links'] = array();
		if( "POST" == $_SERVER['REQUEST_METHOD'] ) 
		{
			$txt_username 	= $this->input->post('txt_username');        
			if( $txt_username ) {
				$where_users = " AND id != '".$this->sess_userid."' AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";
			}
			$data['links'] = $this->users->getEmployersByConsultant($where_users); 
		}
		else {
			$where_users = " AND id != '".$this->sess_userid."' AND designate_status IS NOT NULL";        
			$data['links'] = $this->users->getEmployersByConsultant($where_users); 
		}
		$this->load->view('my_clients', $data);
	}
	
	/****** my clients mockup design from Marcio Feb-18-2015******/
	function my_client_page()
	{
		$data_commonhead= $this->commonHead();
		$data_connection= $this->commonConnection();
		$data    = array_merge( $data_commonhead, $data_connection );
		$data['module'] = "dashboard";
        $data['user'] = $this->users->getUserByID($this->sess_userid);
		
		$data['clientID'] = isset($_GET['id'])&&(int)$_GET['id'] ? $_GET['id'] : '';
		
		$client_id 			= $data['clientID'];
		$summary_startdate 	= isset($_POST['txt_summary_startdate'])&&$_POST['txt_summary_startdate'] ? date("Y-m-d", strtotime($_POST['txt_summary_startdate'])) : '';
		$summary_enddate 	= isset($_POST['txt_summary_enddate'])&&$_POST['txt_summary_enddate'] ? date("Y-m-d", strtotime($_POST['txt_summary_enddate'])) : '';

		$where_params = array('summary_startdate'=>$summary_startdate, 'summary_enddate'=>$summary_enddate);

		$consultant_libraries = $data['consultant_libraries'] = $this->libraries->getConsultantOpenedLibrary( $this->sess_userid, $client_id, '', $where_params );

		$closed_inspection = $open_inspection = $closed_safetytalks = $open_safetytalks = $closed_procedure = $open_procedure = $closed_investigation = $open_investigation = 0;
		//common::pr($consultant_libraries);

		foreach( $consultant_libraries AS $val_total_stats ) {
			$library_section 		= isset($val_total_stats->st_library_section) ? $val_total_stats->st_library_section : '';
			$library_perform_status = isset($val_total_stats->st_library_perform_status) ? $val_total_stats->st_library_perform_status : '';

			if( $library_section == "new_procedure" ) {
				($library_perform_status != "completed") ? $open_procedure += 1 : $closed_procedure += 1;
			}
			if( $library_section == "normal_safetytalks" ) {
				($library_perform_status != "completed") ? $open_safetytalks += 1 : $closed_safetytalks += 1;
			}
			if( $library_section == "new_inspection" ) {
				($library_perform_status != "completed") ? $open_inspection += 1 : $closed_inspection += 1;
			}
			if( $library_section == "Investigations" ) {
				($library_perform_status != "completed") ? $open_investigation += 1 : $closed_investigation += 1;
			}
		}
		
		$data['total_safetytalks'] = $total_safetytalks 		= $open_safetytalks + $closed_safetytalks;
		$data['total_procedure'] = $total_procedure 		= $open_procedure + $closed_procedure;
		$data['total_inspections'] = $total_inspections 		= $open_inspection + $closed_inspection;
		$data['total_investigations'] = $total_investigations 	= $open_investigation + $closed_investigation;
		
		$data['open_safetytalks'] = $open_safetytalks;
		$data['closed_safetytalks'] = $closed_safetytalks;
		$data['open_procedure'] = $open_procedure;
		$data['closed_procedure'] = $closed_procedure;
		$data['open_inspection'] = $open_inspection;
		$data['closed_inspection'] = $closed_inspection;
		$data['open_investigation'] = $open_investigation;
		$data['closed_investigation'] = $closed_investigation;
		
		
		$lib_user_id = $this->sess_userid;
		$lib_user_email = $this->sess_useremail;
		
		if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
			// Save client description //
				$client_description 	= $this->input->post('txtarea_client_description');
				$hidn_client_id 		= $this->input->post('hidn_client_id');
				$arr_upd_clientdesc 	= array( 'client_description'=>$client_description);
				$arr_where_clientdesc 	= array( 'employer_id'=>$hidn_client_id, 'consultant_id'=>$this->sess_userid, 'designate_status'=>1, 'status'=>1  );
				$this->parentdb->manageDatabaseEntry( 'tbl_consultant_employers', 'UPDATE', $arr_upd_clientdesc, $arr_where_clientdesc );
		}
		if( $data['clientID'] ) {
			$data['usermeta'] = $this->users->getUserMetaByID( $data['clientID'] );
			$data['userdata'] = $this->users->getUserByID($data['clientID']);

			// procedure
			$pgno_purchased_procedure 	= $data['pgno_purchased_procedure'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';	
			$limit_purchased_procedure 	= ((($pgno_purchased_procedure-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
			$total_purchased_procedure 	= $data['total_purchased_procedure'] = $this->libraries->getMyProceduresInventories($lib_user_email, $lib_user_id, '', '', '1');
			$data['documents_purchased_procedure']= $this->libraries->getMyProceduresInventories($lib_user_email, $lib_user_id, '', $limit_purchased_procedure);

			// Safety Talks
			$pgno_purchased_safetalks  	= $data['pgno_purchased_safetalks'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
			$limit_purchased_safetalks  	= ((($pgno_purchased_safetalks -1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
			$total_purchased_safetalks  	= $data['total_purchased_safetalks'] = $this->libraries->getMySafetytalksInventories($lib_user_email, $lib_user_id, '', '', '1' );
			$data['documents_purchased_safetalks']= $this->libraries->getMySafetytalksInventories($lib_user_email, $lib_user_id, '', $limit_purchased_safetalks );

			// Investigation
			$pgno_purchased_investigation 	= $data['pgno_purchased_investigation'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
			$limit_purchased_investigation 	= ((($pgno_purchased_investigation-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
			$total_purchased_investigation 	= $data['total_purchased_investigation'] = $this->libraries->getMyInventoriesByUserName($lib_user_email, $lib_user_id,'','','6', '', '1');
			$data['documents_purchased_investigation']= $this->libraries->getMyInventoriesByUserName($lib_user_email, $lib_user_id,'','','6', $limit_purchased_investigation);
			// common::pr( $data['documents_purchased_investigation'] );

			$data['libraries'] 		= $this->libraries->getLibraryListByLanguage('EN', '', '', true, '6', $library_id='');

			// Inspection //
			// Get Inspection Items after data posted //
			$pgno_purchased_inspection  = $data['pgno_purchased_inspection'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
			$limit_purchased_inspection = ((($pgno_purchased_inspection-1)*$this->mylib_rows_limit)).','.$this->mylib_rows_limit;
			$rows_purchased_inspection	= $this->users->getMetaDataList( 'inspection_advanced_consultant', 
																			'in_client_id="'.$client_id.'" AND in_consultant_id="'.$this->sess_userid.'"', '', '*' );
			$data['purchased_inspection'] = sizeof($rows_purchased_inspection) ? $rows_purchased_inspection : array();
			// common::pr( $data['purchased_inspection']);die;
				
			// $total_purchased_inspection 	= $data['total_purchased_inspection'] = $this->libraries->getMyInspectionInventories($lib_user_email, $lib_user_id, '', '', '1' );
			// $data['documents_purchased_inspection']= $this->libraries->getMyInspectionInventories($lib_user_email, $lib_user_id, '',$limit_purchased_inspection);

			
			$data['instructors'] = $this->users->getInstructorsFromConsultant();
		}
		$this->load->view('my_client_page', $data);
	}
	
	
	function addInstructorToClient()
	{
         if($_GET['id'] != 0)   {            
            $searchFlag = $this->input->post('searchflag');
            $arrInstructors = $this->input->post('consultant_instructor');            
            if($searchFlag == "yes")
                $txt_username = $this->input->post('txt_workername');
            else
                $txt_username = "";            
            $arrallInstructors = $this->users->getInstructorsFromConsultant($txt_username);
            if(count($arrallInstructors) > 0){
                foreach($arrallInstructors as $val ){
                    if(in_array($val['in_worker_id'], $arrInstructors)) {
                        $arr_data = array( 'in_employer_client_id'=>$_GET['id']);
                    }
					else {
                        $arr_data = array( 'in_employer_client_id'=>"");
                    }
                    $arr_where_userproc = array( 'in_worker_id'=>$val['in_worker_id'],'in_user_id'=>$this->session->userdata("userid"),'st_designation'=>'consultant_instructor' );
                    $this->parentdb->manageDatabaseEntry( 'tbl_employer_consultant_designations', 'UPDATE', $arr_data, $arr_where_userproc );

					$arr_where_userproc = array( 'in_worker_id'=>$val['in_worker_id'],'in_user_id'=>$this->session->userdata("userid"),'st_designation'=>'my_worker' );
                    $this->parentdb->manageDatabaseEntry( 'tbl_employer_consultant_designations', 'UPDATE', $arr_data, $arr_where_userproc );
                }
            }
         }
         redirect($this->base.'admin/my_client_page?id='.$_GET['id']);
    }
	function s1_public_page_consultant()
	{
		$data    = $this->commonHead();
		$data['module'] = "dashboard";
		$userID   = (int)$_GET['id'];
		$data['usermeta'] = $this->users->getUserMetaByID($userID);
		
		(!sizeof($data['usermeta'])) ? $this->error_404() : '';
		
		$data['userDetail'] = $this->users->getUserByID($userID,'id,profile_image,firstname,lastname');
		$this->load->view('s1_public_page_consultant', $data);
	}
	
	/****** s1 public page Mockup created on Aug 14 2014 by Marcio ******/
	function s1_public_page()
	{
		$data    = $this->commonHead();
		$data['module'] = "dashboard";
		$userID   = (int)$_GET['id'];
		$data['usermeta'] = $this->users->getUserMetaByID($userID);
		
		(!sizeof($data['usermeta'])) ? $this->error_404() : '';
		
        $data['userDetail'] = $this->users->getUserByID($userID,'id,profile_image,firstname,lastname');
		$this->load->view('s1_public_page', $data); 
	}
	
	/****** s1 public page Mockup created on Aug 14 2014 by Marcio ******/
	function s1_public_page_union()
	{
		$data    = $this->commonHead();
		$data['module'] = "dashboard";
		$userID   = $data['userid'] = (int)$_GET['id'];
		$data['union']  = $this->users->getUserByID($userID);
		$data['usermeta'] = $this->users->getUserMetaByID($userID);

		(!sizeof($data['usermeta'])) ? $this->error_404() : '';

		$sector       = isset($_POST['cmb_sector']) ? $_POST['cmb_sector'] : '';
		$data['cmb_sector'] = $sector;

		$role_title    = isset($_POST['cmb_job_title']) ? $_POST['cmb_job_title'] : '';
		$data['cmb_job_title'] = $role_title;

		$unionreps_text    = isset($_POST['txt_unionreps_text']) ? $_POST['txt_unionreps_text'] : '';
		$data['txt_unionreps_text'] = $unionreps_text;
		$data['display_msg'] = "Please select at least one search criteria to get the data.";
		
		// Get total connected s1 users //
			$rows_conneced_users = $this->users->getMetaDataList('connection', 'employer_id="'.$userID.'" AND link_status=1', 
										'', 'COUNT(connection_id) AS total_s1_connections');
			$total_s1_connections= $data['total_s1_connections'] = (isset($rows_conneced_users[0]['total_s1_connections'])&&$rows_conneced_users[0]['total_s1_connections']) 
										? $rows_conneced_users[0]['total_s1_connections'] : '0';
										
		if ($userID==135) {
			$this->load->view('s1_public_page_union_loc183_id135', $data);
		}
		else if ($userID==181){
		   $this->load->view('s1_public_page_union_loc183tc_id181', $data);
		}
		else {
			$this->load->view('s1_public_page_union', $data);
		}
	}
	
	
	// START - INSTRUCTOR //
		function instructor_module_view()
		{
			$data 			= $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('instructor_module_view', $data); 
		}
	
		/***--BEGIN INSTRUCTOR LIBRARY VIEW--*****/
		function instructor_library_view()
		{
			session_start();
			$data 			= $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->library('googletranslatetool');
			
			// Langauge Part //
				if( isset($_GET['language']) && !empty($_GET['language']) ) {
					$lang = $this->common->escapeStr($_GET['language']);
				}
				else if( isset($_POST['language']) && !empty($_POST['language']) ) {
					$lang = $this->common->escapeStr($_POST['language']);
				}
				else {
					$lang = 'EN';
				}
				$data['lang'] = strtolower($lang);
				$data['to_lang']= ($this->session->userdata('instructor_lib_tolang')) ? $this->session->userdata('instructor_lib_tolang') : strtolower($lang);
			
			
			$current_page 	= $data['current_page'] = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$libid 			= $data['library_id'] = (isset($_GET['libid'])&&(int)$_GET['libid']) ? (int)$_GET['libid'] : '';
			$data['library_type_id'] = $libtype	= (isset($_GET['libtype'])&&(int)$_GET['libtype']) ? (int)$_GET['libtype'] : '';

			$union_id 			= $data['union_id'] = isset($_GET['union']) ? $_GET['union'] : '';
			$rows_union_courses = $this->users->getMetaDataList('union_courses', 
												'in_union_id="'.$union_id.'" AND in_instructor_id = "'.$this->sess_userid.'" AND in_library_id="'.$libid.'" AND in_status=1 AND is_course_active="yes"', '', 'in_course_code,dt_start_time');	
			$data['course_code']= $course_code = isset($rows_union_courses[0]['in_course_code'])&&$rows_union_courses[0]['in_course_code'] ? $rows_union_courses[0]['in_course_code'] : '';

			// Course Start Time and Status 
				if( $_SERVER['SERVER_ADDR'] != "127.0.0.1" ) {
					date_default_timezone_set("America/New_York");
				}
				else {
					date_default_timezone_set("Asia/Kolkata");
				}

				$course_start_time 	= $data['course_start_time'] = (isset($rows_union_courses[0]['dt_start_time']) && $rows_union_courses[0]['dt_start_time']) ? $rows_union_courses[0]['dt_start_time'] : '';
				// echo "<br>Current Datetime: ".date('Y-m-d H:i:s')."<br>Start Datetime: ".$course_start_time;
				$datetime_info = Common::getDatetimeDiff(date('Y-m-d H:i:s'), $course_start_time);
				$datetime_info = explode("|", $datetime_info);
				
			// Couse Time Left 
				($datetime_info['2']>=12) ? $datetime_info['2'] = ($datetime_info['2']-12) : '';
				$course_timeleft =  $data['course_timeleft'] = $datetime_info['1']."hr : ".$datetime_info['2']."min : ".$datetime_info['3']."sec";
				if( $datetime_info['[0]']==0 && ($datetime_info['1']<2&&$datetime_info['1']>=0) && ($datetime_info['2']>0||$datetime_info['3']>0) ) {
					$course_status = '1';
				}
				else {
					$course_status = '0';
				}
				$data['course_status'] = $course_status;

			// Get all library types //
				// $data['rows_library_types'] = $this->libraries->getLibraryTypes();
			
			if( $libtype ) {
				$library_type 			= $this->libraries->getLibraryTypes($libtype);
				$data['library_type'] 	= isset($library_type[0]['library_type']) ? $library_type[0]['library_type'] : '';
				
				if( $libid ) {
					if( isset($_SESSION['current_libid']) && ($_SESSION['current_libid'] != $libid) ) {
						unset( $_SESSION['final_arr_quiz'] );
					}
					$_SESSION['current_libid'] 		= $libid;
					
					$section = $data['section'] 	= (isset($_GET['section']) && $_GET['section']) ? $_GET['section'] : 'desc';

					$data['libraries'] 				= $this->libraries->getLibraryListByLanguage( $lang, 0, 0, true, $libtype, $libid );
					// common::pr( $data['libraries'] );
					$data['library_title'] 			= isset($data['libraries'][0]['title']) ? $data['libraries'][0]['title'] : '';
					$data['library_subtitle'] 		= isset($data['libraries'][0]['subtitle']) ? $data['libraries'][0]['subtitle'] : '';
					$data['library_description'] 	= isset($data['libraries'][0]['title']) ? $data['libraries'][0]['description'] : '';
					$data['page'] 					= $this->libraries->getPageByPageNumber($libid, $current_page );
					
					$data['modal_pages'] 			= $this->libraries->getPageByPageNumber($libid, '' );
					$data['pages'] 					= $this->libraries->getTotalPageNumber($libid );

					if( isset($_GET['test'])&&$_GET['test']==1) {
						$this->load->view('instructor_library_view_KS', $data);
					}
					else {
						$this->load->view('instructor_library_view', $data);
					}
					
				}
				else {
					$this->error_page();
				}
			}
		}
		/***--END INSTRUCTOR LIBRARY VIEW--*****/
		
		/****** Instructor Portal -  Aug 02 2014 by Marcio ******/
		function instructor_portal()
		{
			(!isset($_GET['instrkey'])) ? $this->error_404() : '';

			$data 				= $this->commonHead();
			$data['module'] 	= "dashboard";
			$union_id   		= $data['union_id'] = (isset($_GET['id'])&&(int)$_GET['id']) ? (int)$_GET['id'] : '';
			
			if( $union_id ) {
				$data['union']  = $this->users->getUserByID($union_id);
				$data['usermeta'] = $this->users->getUserMetaByID($union_id);

			// Get Union library types //
				$union_lib_types 		= $this->users->getMetaDataList('library_types', 'find_in_set("'.$data['union_id'].'", parent_library_type)', '', 'id, library_type');
				$union_lib_types		= (isset($union_lib_types) && sizeof($union_lib_types)) ? $union_lib_types : array();
				$data['union_lib_types']= $union_lib_types;

			// Get Campus data of the Union and its Training Centres // 
				$rows_main_unions = $this->users->getUserConnc( $data['union_id'] );
				if( isset($rows_main_unions[0]['meta_value']) ) { // Selected user is Main Union and has Training Centres //
					foreach( $rows_main_unions AS $traincent_mainunion ) {
						$arr_union_ids[] = $traincent_mainunion['user_id'];
					}
				}
				else {
					$arr_union_ids[] = $data['union_id'];
				}
				$union_ids = (isset($arr_union_ids)&&sizeof($arr_union_ids)) ? implode(",",$arr_union_ids) : '';
				
				$data['rows_campus_names'] = $rows_campus_names = $this->users->getMetaDataList( 'usermeta', 
														'meta_key="campus_name" AND meta_value!="" AND user_id IN ('.$union_ids.')', '', 'meta_value AS campus_name' );
			}
			$this->load->view('instructor_portal', $data); 
		}
		
		
		function participant_portal()
		{
			$data    = $this->commonHead();
			$data['module'] = "dashboard";
			$union_id   = $data['union_id'] = (isset($_GET['id'])&&(int)$_GET['id']) ? (int)$_GET['id'] : '';

			if( $union_id ) {
				$data['union']  = $this->users->getUserByID($union_id);
				$data['usermeta'] = $this->users->getUserMetaByID($union_id);
			
				$rows_union_courses = $this->users->getUnionLibraryCourses(array('in_union_id'=>$data['union_id'],'is_course_active'=>"yes" ));
				$data['rows_union_courses'] = isset($rows_union_courses) ? $rows_union_courses : array();
				// common::pr($rows_union_courses);
				  
				// Get Campus names of Union and its Training Centres // 
					$rows_main_unions = $this->users->getUserConnc( $data['union_id'] );
					if( isset($rows_main_unions[0]['meta_value']) ) { // Selected user is Main Union and has Training Centres //
						foreach( $rows_main_unions AS $traincent_mainunion ) {
							$arr_union_ids[] = $traincent_mainunion['user_id'];
						}
					}
					else {
						$arr_union_ids[] = $data['union_id'];
					}
					$union_ids = (isset($arr_union_ids)&&sizeof($arr_union_ids)) ? implode(",",$arr_union_ids) : '';
					$data['rows_campus_names'] = $rows_campus_names = $this->users->getMetaDataList( 'usermeta', 'meta_key="campus_name" AND user_id IN ('.$union_ids.')', '', 'meta_value AS campus_name' );
			}
			$this->load->view('participant_portal', $data);
		}
		
		
		function send_instructor_email($to, $instructorKey='', $toUserId='', $isConsultantInstructor='' )
		{
			$this->load->library('email');
			$config['mailtype'] 	= 'html'; // text
			$config['charset']  	= 'utf-8'; // iso-8859-1
			$config['wordwrap'] 	= TRUE;
			$config['priority'] 	= 1;
			$this->email->initialize($config);

			$subject_line 		= ("y"==$isConsultantInstructor) ? "WELCOME TO CONSULTANT" : "WELCOME TO UNION";
			$data['portal_section'] = ("y"==$isConsultantInstructor) ? "Consultant" : "Union";

			$uni_consul_name 		= $this->sess_nickname;
			$data['base']			= $this->base;
			$data['url']			= (int)$toUserId ? $this->base."admin/instructor_portal?id=".$toUserId."&instrkey=1" : $this->base;
			$data['uni_consul_name']= $uni_consul_name;
			$data['instructor_key'] = $instructorKey;

			$subject 	= $subject_line." ".strtoupper($uni_consul_name);
			$email_body = $this->load->view('email_templates/union_instructor', $data, true);

			$this->email->from($this->config->item('site_email'), 'S1');
			$this->email->to($to);

			$this->email->subject($subject);
			$this->email->message($email_body);

			$this->email->send();
			return true;
		}

	function my_inspection_advanced_consultant()
	{
		$data 				= $this->commonHead();
		$data['module'] 	= "dashboard";
		$inspection_name 	= '';

		$inspection_id 	= $data['inspection_id'] = (isset($_GET['inspection_id']) && (int)$_GET['inspection_id']) ? $_GET['inspection_id'] : '';
		$consultant_id 	= $data['consultant_id'] = $this->sess_userid;
		$client_id 		= $data['client_id'] = (isset($_GET['clientid']) && $_GET['clientid']) ? $_GET['clientid'] : '';

		(isset($_POST['inspection_id'])&&$_POST['inspection_id']) ? $inspection_id = $_POST['inspection_id'] : '';
		(isset($_POST['client_id'])&&$_POST['client_id']) ? $client_id = $_POST['client_id'] : '';

		// Post data //
			if( "POST" == $_SERVER['REQUEST_METHOD'] ) {
				$arr_post = $_POST;
				$arr_post['inspection_id'] 	= $inspection_id;
				$arr_post['consultant_id'] 	= $consultant_id;
				$arr_post['client_id'] 		= $client_id;
				// common::pr( $arr_post );die;

				if( isset($arr_post['btn_save_inspection']) && $arr_post['btn_save_inspection'] ) { // Save all Inspection data //
					$arr_post['submit_action'] = "saved";
					$ret_inspection_id 	= $this->inspection->addAdvancedInspectionWorkplaceInfo( $arr_post );
					$ret_insert 		= $this->inspection->addAdvancedInspectionItems( $arr_post );
					$data['message'] 	= "Inspection Information updated successfully.";
				}
				else if( isset($arr_post['btn_finish_inspection']) && $arr_post['btn_finish_inspection'] ) { // Finish all Inspection data //
					$arr_post['submit_action'] 	= "completed";
					$ret_insert 				= $this->inspection->addAdvancedInspectionItems( $arr_post );
					$data['message'] 			= "Advance Inspection Items updated successfully.";
				}
				else if( isset($arr_post['btn_print_inspection']) && $arr_post['btn_print_inspection'] ) { // Print all Inspection data //
					$arr_post['submit_action'] 	= "print";
					$ret_insert 				= $this->inspection->addAdvancedInspectionItems( $arr_post );
					$data['message'] 			= "Advance Inspection Items updated successfully.";
				}
				if( !isset($arr_post['btn_export_pdf']) ) { // Export Inspection Details //
					if( !isset($arr_post['btn_workplace_info']) ) {
						redirect($base."admin/my_client_page?id=".$client_id."#tools#client_inspection");die;
					}
				}
			}

		$data['inspitems_info'] = array();
		if( $inspection_id ) {
			// Get Inspection Workplace after data posted //
				$where_advinsp 				= (12==$this->sess_usertype) ? 'in_consultant_id="'.$consultant_id.'"' : 'in_client_id="'.$client_id.'"';
				$rows_insp_workplace_info = $this->users->getMetaDataList('inspection_advanced_consultant',('id="'.$inspection_id.'" AND '.$where_advinsp),'', '*' );
				$data['insp_workplace_info']= sizeof($rows_insp_workplace_info) ? $rows_insp_workplace_info : array();

			// Get Inspection Items after data posted //
				$rows_inspitems_info = $this->users->getMetaDataList( 'inspection_items_advanced_consultant', ('in_inspection_id="'.$inspection_id.'" 
																		AND in_client_id="'.$client_id.'" AND in_consultant_id="'.$consultant_id.'"'), '', '*' );
				$data['inspitems_info'] = sizeof($rows_inspitems_info) ? $rows_inspitems_info : array();
		}
		$this->load->view('my_inspection_advanced_consultant', $data); 
	}
	// END - INSTRUCTOR //
 
/****** Fatalities Breakdown ANIMATION - MAR 2015******/
	function fatality_metro_animation()
	{
		$data    = $this->commonHead();
		$data['module'] = "dashboard";
		$current_page  = $data['current_page'] = isset($_GET['page']) ? (int)$_GET['page'] : '1';
		$records_limit  = $data['records_limit'] = 18;
		$total_fatality_videos  = $this->users->getMetaDataList('fatality_videos', 'in_fatality_video_status=1', '', 'COUNT(id) AS total_rows');
		$total_fatality_videos  = $data['total_fatality_videos'] = isset($total_fatality_videos[0]['total_rows']) ? $total_fatality_videos[0]['total_rows'] : 0;
		$limit_fatality = ((($current_page-1)*$records_limit)).','.$records_limit;
		$rows_fatality_videos = $data['rows_fatality_videos'] = $this->users->getMetaDataList('fatality_videos', 'in_fatality_video_status=1', '', 'id, st_fatality_video,
		st_fatality_video_thumbnail,  st_fatality_video_title', '', $limit_fatality);
		$this->load->view('fatality_metro_animation', $data);
	}

	function getUsersAlerts($usersByAlertCriteria=array(), $selAlertCriteria='')
	{
		if( "7" == $this->sess_usertype ) {
			$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, 1, 'id' );
			$org_links 	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, 1, 'id' );
			$all_links 	= array_merge($peo_links, $org_links);
		}
		$users_alerts = array();
		// common::pr( $usersByAlertCriteria );die;
		
		foreach( $usersByAlertCriteria AS $val_userid ) {
			if( "7" == $this->sess_usertype ) {
				foreach( $all_links AS $val_all_links ) {
					if( $val_all_links['id'] == $val_userid['user_id'] ) {
						$users_alerts[$selAlertCriteria][] = $val_all_links['id'];
					}
				}
			}
			else {
				$users_alerts[$selAlertCriteria][] = $val_userid['user_id'];
			}
		}
		$users_alerts[$selAlertCriteria] = (isset($users_alerts[$selAlertCriteria])&&is_array($users_alerts[$selAlertCriteria])) ? array_unique($users_alerts[$selAlertCriteria]) : '';
		return $users_alerts[$selAlertCriteria];
	}

	function union_alerts()
	{
		ini_set('post_max_size', '20M');
		ini_set('upload_max_filesize', '20M');

		// $this->_security(); *** please create security for union functions.
		$data  				= $this->commonHead();
		$data['module'] 	= "dashboard";
		$union_id   		= (int)$_GET['id'];
		$data['union']  	= $this->users->getUserByID($union_id);
		$data['usermeta'] 	= $this->users->getUserMetaByID($union_id);

		// START - ALERTS //
			$alertid	= (isset($_GET['alertid']) && (int)$_GET['alertid']) ? trim($_GET['alertid']) : '';
			$s1_alerts = $data['s1_alerts_criteria'] = array();
			$rows_alerts['st_images'] = $data['s1_alert_criteria'] = $data['alerted_users'] = $data['st_alert_criteria_options'] = '';
			$rows_alerts['st_video_uploaded'] = '';

			if( $alertid ) {
				if( (int)$alertid ) {
					// Get Alerts Details
						$s1_alerts 	= $this->users->getMetaDataList('alerts', 'id="'.$alertid.'" AND in_hazard_alert_created_by="'.$union_id.'"', '', 'st_title, st_summary, st_locations, st_legal_requirements, st_precautions, st_images, st_video, st_video_uploaded, in_hazard_alert_created_by, in_status');
						$s1_alerts 	= $rows_alerts = isset($s1_alerts[0]) ? $s1_alerts[0] : array();

						$s1_alerts_users 	= $this->users->getMetaDataList('alerts_criteria_users', 
												'in_alert_id="'.$alertid.'" AND in_alert_sent_by="'.$union_id.'"', '', 'st_alert_criteria, st_alert_criteria_options, st_users_alerted');
						$data['s1_alerts'] 			= $s1_alerts;
						$data['alerted_users'] 	= isset($s1_alerts_users[0]['st_users_alerted']) ? $s1_alerts_users[0]['st_users_alerted'] : '';
						$data['s1_alert_criteria'] = isset($s1_alerts_users[0]['st_alert_criteria']) ? $s1_alerts_users[0]['st_alert_criteria'] : '';
						$data['st_alert_criteria_options'] = isset($s1_alerts_users[0]['st_alert_criteria_options']) ? $s1_alerts_users[0]['st_alert_criteria_options'] : '';
				}
				else {
					$this->error_404();return false;
				}
			}

			if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {			
				$s1_alerts['alerts']['st_title'] 				= isset($_POST['txt_alert_title']) ? $_POST['txt_alert_title'] : '';
				$s1_alerts['alerts']['st_summary'] 				= isset($_POST['txt_alert_summary']) ? $_POST['txt_alert_summary'] : '';
				$s1_alerts['alerts']['st_locations'] 			= isset($_POST['txt_alert_locations']) ? $_POST['txt_alert_locations'] : '';
				$s1_alerts['alerts']['st_legal_requirements'] 	= isset($_POST['txt_alert_legel_requirements']) ? $_POST['txt_alert_legel_requirements'] : '';
				$s1_alerts['alerts']['st_precautions'] 			= isset($_POST['txt_alert_precautions']) ? $_POST['txt_alert_precautions'] : '';

				$s1_alerts['alerts']['st_video'] 				= (isset($_POST['txt_alert_video'])&&sizeof($_POST['txt_alert_video'])) ? implode(",",$_POST['txt_alert_video']) : '';
				$s1_alerts['alerts']['in_hazard_alert_created_by'] = $this->sess_userid;
				$s1_alerts['alerts']['in_status'] 				= isset($_POST['txt_alert_status']) ? $_POST['txt_alert_status'] : '';
				$s1_alerts['alerts']['dt_hazard_alert_updated'] = date('Y-m-d h:i:s');

				$last_alert_id 	= !($alertid) ? $this->parentdb->getLastRowId('tbl_alerts') : $alertid;

				$upload_error 	= $err_upload_video = '';
				$files 			= $_FILES;
			
				$s1_alerts_images = $s1_video_uploaded = array();
				if( isset($files['userfile']['name']) && sizeof($files['userfile']['name']) > 0 ) {
					$s1_alerts_images = (isset($rows_alerts['st_images'])&&$rows_alerts['st_images']) ? explode(",", $rows_alerts['st_images']) : array();
					
					$this->load->library('upload');
					foreach( $files['userfile']['name'] AS $key_alert_image => $val_alert_image ) {
						if( trim($val_alert_image) ) {
							$_FILES['userfile']['size'] 	= $files['userfile']['size'][$key_alert_image];
							$_FILES['userfile']['name'] 	= $files['userfile']['name'][$key_alert_image];
							$_FILES['userfile']['type'] 	= $files['userfile']['type'][$key_alert_image];
							$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$key_alert_image];
							$_FILES['userfile']['error'] 	= $files['userfile']['error'][$key_alert_image];
							
							// Delete the existing Alert Image if available //
								if( $alert_img = glob(FCPATH.$this->path_upload_alerts."alerts_image".$last_alert_id."_".($key_alert_image+1).".*") ) {
									$arr_alert_img = explode("/", $alert_img[0]);
									isset($arr_alert_img[sizeof($arr_alert_img)-1]) ? unlink( FCPATH.$this->path_upload_alerts.$arr_alert_img[sizeof($arr_alert_img)-1] ) : '';
								}

							// Upload the Alerts Image //
								$ext_alertimg	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
								$alert_imgname 	= "alerts_image".$last_alert_id."_".($key_alert_image+1).".".$ext_alertimg;
								
								$s1_alerts_images[$key_alert_image] = $alert_imgname;
								
								$this->upload->initialize($this->common->setUploadOptions($this->path_upload_alerts, $alert_imgname));
								if( !$this->upload->do_upload() ) {
									echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
								}
								else {									
									$data = array('upload_data' => $this->upload->data());
								}
						}
					}
				}
		
				// Videos //
					if( isset($_FILES['alert_videoupd']['name']) && sizeof($_FILES['alert_videoupd']['name']) > 0 ) {
						$s1_video_uploaded = (isset($rows_alerts['st_video_uploaded'])&&$rows_alerts['st_video_uploaded']) ? explode(",", $rows_alerts['st_video_uploaded']) : array();

						foreach( $_FILES['alert_videoupd']['name'] AS $key_alert_videoupd => $val_alert_videoupd ) {
							if( trim($val_alert_videoupd) ) {
								$_FILES['alert_videoupd']['size'] 	= $files['alert_videoupd']['size'][$key_alert_videoupd];
								$_FILES['alert_videoupd']['name'] 	= $files['alert_videoupd']['name'][$key_alert_videoupd];
								$_FILES['alert_videoupd']['type'] 	= $files['alert_videoupd']['type'][$key_alert_videoupd];
								$_FILES['alert_videoupd']['tmp_name'] = $files['alert_videoupd']['tmp_name'][$key_alert_videoupd];
								$_FILES['alert_videoupd']['error'] 	= $files['alert_videoupd']['error'][$key_alert_videoupd];

								// Delete the existing Alert Video if available //
									if( $alert_video = glob(FCPATH.$this->path_upload_alerts."alerts_video".$last_alert_id."_".($key_alert_videoupd+1).".*") ) {
										$arr_alert_video = explode("/", $alert_video[0]);
										isset($arr_alert_video[sizeof($arr_alert_video)-1]) ? unlink( FCPATH.$this->path_upload_alerts.$arr_alert_video[sizeof($arr_alert_video)-1] ) : '';
									}

								// Upload the Alert Video //
									$ext_alertvideo	= $this->common->getImagePathInfo( $_FILES['alert_videoupd']['name'], 'extension' );
									$alert_videoname= "alerts_video".$last_alert_id."_".($key_alert_videoupd+1).".".$ext_alertvideo;
									$s1_video_uploaded[$key_alert_videoupd] = $alert_videoname;
									$config['upload_path']   	= $this->path_upload_alerts;
									$config['allowed_types']	= '*';
									$config['file_name'] 		= $alert_videoname;
									$this->load->library('upload', $config);									
									$this->upload->initialize($config);
									if( !$this->upload->do_upload('alert_videoupd') ) {
										echo $err_upload_video = $this->upload->display_errors("<span class='error'>", "</span>");
									}
									else {
										$data = array('upload_data' => $this->upload->data());
									}
							}
						}
					}
				
				if( !$upload_error && !$err_upload_video ) {
					(isset($s1_alerts_images)&&$s1_alerts_images) ? $s1_alerts['alerts']['st_images']=implode(",",$s1_alerts_images):'';
					(isset($s1_video_uploaded)&&$s1_video_uploaded) ? $s1_alerts['alerts']['st_video_uploaded']=implode(",",$s1_video_uploaded):'';
					
					// Send Alerts Message to Users selected //		
						$val_alert_criteria = isset($_POST['cmb_alert_criteria']) ? $_POST['cmb_alert_criteria'] : array();
						if( $alertid ) {
							$this->parentdb->manageDatabaseEntry( 'tbl_alerts', 'UPDATE', $s1_alerts['alerts'], array('id'=>$alertid, 'in_hazard_alert_created_by'=>$union_id) );
						}
						else {
							$alertid = $this->parentdb->manageDatabaseEntry( 'tbl_alerts', 'INSERT', $s1_alerts['alerts'] );
						}
						$users_alerts = array();

						if( isset($val_alert_criteria) && $val_alert_criteria ) {
							$post_alerts_search 	= isset($_POST['hazards_alerts'][$val_alert_criteria]) ? $_POST['hazards_alerts'][$val_alert_criteria] :'';

							$s1_alerts['users_alerted']['st_alert_criteria_options'] = (isset($post_alerts_search)&&is_array($post_alerts_search)) 
																			? implode(",",$post_alerts_search) : $post_alerts_search;
							if( $post_alerts_search ) {
								if( "industry" == $val_alert_criteria ) {
									$where_str 			= ($post_alerts_search) ? 'meta_key="'.$val_alert_criteria.'_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
									$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
									$users_alerts[$val_alert_criteria] = $this->getUsersAlerts($users_by_indsectrd, $val_alert_criteria);
								}
								else if( "sector" == $val_alert_criteria ) {
									$where_str 			= ($post_alerts_search) ? 'meta_key="industry_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
									$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
									$users_alerts['industry'] = $this->getUsersAlerts($users_by_indsectrd, 'industry');

									$where_str 			= ($post_alerts_search) ? 'meta_key="section_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
									$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
									$users_alerts[$val_alert_criteria] = $this->getUsersAlerts($users_by_indsectrd, $val_alert_criteria);
								}
								else if( "trade" == $val_alert_criteria ) {
									$where_str 			= ($post_alerts_search) ? 'meta_key="industry_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
									$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
									$users_alerts['industry'] = $this->getUsersAlerts($users_by_indsectrd, 'industry');

									$where_str 			= ($post_alerts_search) ? 'meta_key="section_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
									$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
									$users_alerts['sector'] = $this->getUsersAlerts($users_by_indsectrd, 'sector');

									$where_str 			= ($post_alerts_search) ? 'meta_key="'.$val_alert_criteria.'_id" AND meta_value ="'.$post_alerts_search.'"' : '1=1';
									$users_by_indsectrd = $this->users->getMetaDataList('usermeta', $where_str, '', 'user_id');
									$users_alerts[$val_alert_criteria] = $this->getUsersAlerts($users_by_indsectrd, $val_alert_criteria);
								}
								else if( "usertype" == $val_alert_criteria ) {
									$users_by_usertype 	= $this->users->getMetaDataList('user', 'type_id IN ('.implode(",",$post_alerts_search).')', '', 'id AS user_id');						
									$users_alerts[$val_alert_criteria] = $this->getUsersAlerts($users_by_usertype, $val_alert_criteria);
								}
								else if( "employer-connection" == $val_alert_criteria ) {
									foreach( $post_alerts_search AS $val_userid ) {
									// Get connection links of people and organigation //
										$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE', $val_userid, 1, 'id' );
										$org_links 	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $val_userid, 1, 'id' );
										$all_links 	= array_merge($peo_links, $org_links);								
										foreach( $all_links AS $val_userid ) {
											$users_alerts[$val_alert_criteria] = $val_userid['id'];
										}
									}
								}
								else if( "union-connection" == $val_alert_criteria ) {
									$users_alerts[$val_alert_criteria] = $post_alerts_search;
								}
								else if( "all" == $val_alert_criteria ) {
									$users_by_allusers 	= $this->users->getMetaDataList('user', '1=1', '', 'id AS user_id' );
									$users_alerts[$val_alert_criteria] = $this->getUsersAlerts($users_by_allusers, $val_alert_criteria);
								}
								else if( "myworkers" == $val_alert_criteria ) {
									$users_alerts[$val_alert_criteria] 	= $this->users->getMyLinksByUserID($this->sess_userid, $this->sess_usertype, 1, '');
								}
								else {
									$users_alerts[$val_alert_criteria] = $post_alerts_search;
									if( "union" == $val_alert_criteria && "7"==$this->sess_usertype ) { // If loggedin user=Union then Send hazards alerts to union's training centres //
										foreach( $post_alerts_search AS $union_userid ) {
											$arr_training_users = $this->users->getUserConnc( $union_userid );
											foreach( $arr_training_users AS $val_training_users ) {
												isset($val_training_users['user_id']) ? $training_users[] = $val_training_users['user_id'] : '';
											}
										}
										$training_users = isset($training_users) ? array_unique($training_users) : array();
										$users_alerts[$val_alert_criteria] = $training_users;
									}
								}
							}
						}
						$s1_alerts['users_alerted']['in_alert_id'] 		= $alertid;
						$s1_alerts['users_alerted']['in_alert_sent_by'] = $this->sess_userid;					
						$s1_alerts['users_alerted']['st_alert_criteria']= $val_alert_criteria;

						$this->parentdb->deleteSection($alertid, 'alert_criteria');

						if( isset($users_alerts) && sizeof($users_alerts) ) {
							foreach( $users_alerts AS $key_alerts_section => $val_alerts_section ) {
								$users = array();
								foreach( $val_alerts_section AS $val_user ) {
									// Send Alert mesage to Users selected //
										$subject_alerts = "New Alert from Union on Profile Home";
										$body_alerts	= "Alert #".$s1_alerts['alerts']['st_title']." from Union on ".date('M d, Y');

										$users[] 			 = $val_user;
										$rows_users 		 = $this->users->getMetaDataList( 'user', 'id="'.$val_user.'"', '', 'id, email_addr' );
										$assign_to_user_email= isset($rows_users[0]['email_addr']) ? $rows_users[0]['email_addr'] : '';
										$check_alert_message = $this->users->getMetaDataList('message','subject = "'.$subject_alerts.'" AND send_to="'.$assign_to_user_email.'"','','message_id');
										$messages_alerts 	 = array('send_to' 	=> $assign_to_user_email, 'send_from' => $this->sess_useremail, 
																	'subject' 	=> $subject_alerts, 'message' 	=> $body_alerts);
										if( isset($check_alert_message[0]['message_id']) ) {
											$this->parentdb->manageDatabaseEntry( 'tbl_message', 'UPDATE', array('read_status'=>'1'), 
																				array('message_id'=>$check_alert_message[0]['message_id']) );
										}
										else {
											$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $messages_alerts );
										}
										
										$this->users->sendEmailToS1user($assign_to_user_email, $this->sess_useremail, $subject, $body_alerts);
								}
								$s1_alerts['users_alerted']['st_users_alerted'] = json_encode($users);
							}
						}
						// Add Alerts Users with search criteria //
							$this->parentdb->manageDatabaseEntry( 'tbl_alerts_criteria_users', 'INSERT', $s1_alerts['users_alerted'] );

					redirect($this->base.'admin/union_alerts_view?id='.$union_id.'&type=alerts');
				}			
			}
			
			$data['s1_alerts'] = isset($s1_alerts) ? $s1_alerts : array();
			$data['alertid'] = $alertid;
		// END - ALERTS //	
		$this->load->view('union_alerts', $data);
	}

	function union_alerts_view()
	{
		$data  			= $this->commonHead();
		$data['module'] = "dashboard";
		
		$union_id   	= $data['union_id'] = (isset($_GET['id'])&&(int)$_GET['id']) ? (int)$_GET['id'] : '';
		if( $union_id ) {
			$data['union']  = $this->users->getUserByID($union_id);
			$data['usermeta'] = $this->users->getUserMetaByID($union_id);

			$meta 			= (isset($_GET['type']) && !empty($_GET['type'])) ? $_GET['type'] : 'administrator';
			$order_by  		= 'ORDER BY dt_hazard_alert_created';
			$where   		= 'in_hazard_alert_created_by = "'.$union_id.'"';
			
			$data['list'] 	= $this->users->getMetaDataList($meta, $where, $order_by);
			$data['s1_alerts'] = isset($s1_alerts) ? $s1_alerts : array();
		}
		$this->load->view('union_alerts_view', $data);
	}
	function getDesignationData($tblName='',$arrWhere=array())
	{
		$tblname 	= $this->input->post('tblName');
		$arr_where 	= $this->input->post('whereStr');
		$union_id 	= isset($arr_where[0]['union_id']) ? $arr_where[0]['union_id'] : '';
		$worker_id 	= isset($arr_where[0]['worker_id']) ? $arr_where[0]['worker_id'] : '';

		$where_arr = array('st_designation'=>"hsrep", 'in_union_id'=>$union_id,'in_worker_id'=>$worker_id);
		$rows_hsrep = $this->users->getDesignationData("tbl_union_designations", $where_arr);
		$hsrep = isset($rows_hsrep[0]['meta_value']) ? $rows_hsrep[0]['meta_value'] : '';
		$hsrep = ("y"==$hsrep) ? "yes" : "no";

		$where_arr = array('st_designation'=>"shop_steward", 'in_union_id'=>$union_id,'in_worker_id'=>$worker_id);
		$rows_shop_steward = $this->users->getDesignationData("tbl_union_designations", $where_arr);
		$shop_steward = isset($rows_shop_steward[0]['meta_value']) ? $rows_shop_steward[0]['meta_value'] : '';
		$shop_steward = ("y"==$shop_steward) ? "yes" : "no";

		echo json_encode( array('hsrep'=>$hsrep, 'shop_steward'=>$shop_steward) );
	}
	function mol()
	{
		$data = $this->commonHead();
		$data['module'] = "dashboard";
		$data['stats'] 	= (isset($_GET['stats'])&&$_GET['stats']) ? $_GET['stats'] : 'field_visits';
		$this->load->view('mol', $data);
	}

	
	// Start - Digital Hazards // 
		function hazard_high_rise_front()
		{
			$data = $this->commonHead();
			$this->lang->load('hazard', "en");
			$data['module'] = "dashboard";
			$this->load->view('dig_hazards/hazard_high_rise_front', $data);
		}
		function hazard_high_rise_back()
		{
			$data = $this->commonHead();
			$this->lang->load('hazard', "en");
			$data['module'] = "dashboard";
			$this->load->view('dig_hazards/hazard_high_rise_back', $data);
		}
		function hazard_high_rise_left()
		{
			$data = $this->commonHead();
			$this->lang->load('hazard', "en");
			$data['module'] = "dashboard";
			$this->load->view('dig_hazards/hazard_high_rise_left', $data);
		}
		function hazard_high_rise_right()
		{
			$data = $this->commonHead();
			$this->lang->load('hazard', "en");
			$data['module'] = "dashboard";
			$this->load->view('dig_hazards/hazard_high_rise_right', $data);
		}
		function hazard_office1()
		{
			$data = $this->commonHead();
			$this->lang->load('hazard', "en");
			$data['module'] = "dashboard";
			$this->load->view('dig_hazards/hazard_office1', $data);
		}
		function hazard_office2()
		{
			$data = $this->commonHead();
			$this->lang->load('hazard', "en");
			$data['module'] = "dashboard";
			$this->load->view('dig_hazards/hazard_office2', $data);
		}
	// End - Digital Hazards // 


	// Union Media //
		function union_media()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$libid = $data['libid'] = (isset($_GET['libid'])&&(int)$_GET['libid']) ? (int)$_GET['libid'] : '';
			$this->load->view('union_media', $data);
		}

	// Union connections //	
		function union_connections()
		{
			$data = $this->commonHead();
			$data['module'] = "profile";
			$this->load->view('union_connections', $data);
		}

		
		
		
		
	// Start - UNION DATA COLLECTION //	
		function union_datacollection()
		{
			$data 			= $this->commonHead();
			$data['module'] = "dashboard";
			$union_id   	= (isset($_GET['id'])&&(int)$_GET['id']) ? (int)$_GET['id'] : '';
			$redirectfrom 	= $data['redirectfrom'] = $this->input->get('redirectfrom');
			if( $union_id ) {
				$data['union']  = $this->users->getUserByID($union_id);
				$peo_links = $this->users->getMyConnectionsByUserId('PEOPLE', $union_id, NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
				$org_links = $this->users->getMyConnectionsByUserId('ORGANIZATION',$union_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
				$union_connections = $data['union_connections'] = array_merge($peo_links, $org_links);

				$total_employers_connected = $total_workers_connected = 0;
				if( isset($union_connections) && is_array($union_connections) ) {
					$arr_lang 			= array();
					$total_connections 	= 0;
					foreach( $union_connections AS $val_union_connections ) {
						// Languages by connected users //
							$userid 				= $val_union_connections['id'];
							$user_preffered_language= $this->users->get_user_meta($userid, "preferred_language");
							$language_name 			= '';
							if( isset($user_preffered_language['meta_value']) && $user_preffered_language['meta_value'] ) {
								$language_name = $user_preffered_language['meta_value'];
							}
							$arr_lang[] = $language_name;

						$total_connections++;
						("8"==$val_union_connections['type_id']) ? $total_employers_connected++ : '';
						("9"==$val_union_connections['type_id']) ? $total_workers_connected++ : '';
					}
				}

				$connection_languages = $data['connection_languages'] = isset($arr_lang) ? array_count_values($arr_lang) : array();

				// Get Union Courses //
					$union_lib_types = $this->users->getMetaDataList('library_types', 
							'FIND_IN_SET("'.$union_id.'", parent_library_type) AND id=56', '', 'id, library_type'); // Union Course Library Typeid //
					$union_lib_types = (isset($union_lib_types) && sizeof($union_lib_types)) ? $union_lib_types : array();
					$library_types 	 = array();
					foreach( $union_lib_types AS $key_id => $val ) {
						$library_types[] = $val['id'];
					}
					$union_libtype = (isset($library_types[0]) && $library_types[0]) ? implode(",", $library_types) : '';		
					if( $union_libtype ) {
						$where_unionlib  	= " library_type_id IN (".$union_libtype.")";
						$where_unionlib 	.= " AND status=1 AND (date_start<=CURDATE() AND (date_end='0000-00-00' OR date_end>CURDATE()))";
						$rows_union_courses 	= $this->users->getMetaDataList( "library", $where_unionlib, '', 'library_id, title, language' );
						$rows_union_courses 	= isset($rows_union_courses) ? $rows_union_courses : array();
					}
					$data['union_courses'] = isset($rows_union_courses) ? $rows_union_courses : array();

				$data['total_connections'] 	= $total_connections;
				$data['total_employers_connected'] 	= $total_employers_connected;
				$data['total_workers_connected'] 	= $total_workers_connected;
			}

			if( isset($_GET['design']) && $_GET['design']==1 ) {
				$this->load->view('data_collection/union_uniondetails', $data);
			}
			else {
				$this->load->view('data_collection/union_uniondetails', $data);
			}
		}
		
		function courses()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";

			$union_id   	=  $data['union_id'] = (isset($_GET['id'])&&(int)$_GET['id']) ? (int)$_GET['id'] : '';
			$redirectfrom 	= $data['redirectfrom'] = $this->input->get('redirectfrom');
			if( $union_id ) {
				$data['union']  	= $this->users->getUserByID($union_id);
				// Get Union Courses //
					$union_lib_types = $this->users->getMetaDataList('library_types', 
							'FIND_IN_SET("'.$union_id.'", parent_library_type) AND id=56', '', 
							'id, library_type, parent_library_type'); // Union Course Library Typeid //
					$union_lib_types= (isset($union_lib_types) && sizeof($union_lib_types)) ? $union_lib_types : array();
					$course_unions 	= isset($union_lib_types[0]['parent_library_type']) ? $union_lib_types[0]['parent_library_type'] : '';
					
					$library_types 	= array();
					foreach( $union_lib_types AS $key_id => $val ) {
						$library_types[] = $val['id'];
					}
					$union_libtype = (isset($library_types[0]) && $library_types[0]) ? implode(",", $library_types) : '';		
					if( $union_libtype ) {
						$where_unionlib  	= " library_type_id IN (".$union_libtype.")";
						$where_unionlib 	.= " AND status=1 AND (date_start<=CURDATE() AND (date_end='0000-00-00' OR date_end>CURDATE()))";
						$rows_union_courses 	= $this->users->getMetaDataList( "library", $where_unionlib, '', 'library_id, title, language, date_start' );
						$rows_union_courses 	= isset($rows_union_courses) ? $rows_union_courses : array();
					}
					// $rows_union_courses = $this->users->getUnionLibraryCourses(array('in_union_id'=>$union_id));
					$union_courses = $data['union_courses'] = isset($rows_union_courses) ? $rows_union_courses : array();

				// Get Employers and Workers of the union connections //
					$peo_links = $this->users->getMyConnectionsByUserId('PEOPLE', $union_id, NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$org_links = $this->users->getMyConnectionsByUserId('ORGANIZATION',$union_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$courses_union_connections = array_merge($peo_links, $org_links);
				
				// Get Languages, Total Employers, Total Workers //
					$total_employers_connected = $total_workers_connected = 0;
					if( isset($courses_union_connections) && is_array($courses_union_connections) ) {
						$arr_lang 			= array();
						$total_connections 	= 0;
						foreach( $courses_union_connections AS $val_union_connections ) {
							// Languages by connected users //
								$userid 	= $val_union_connections['id'];
								$user_preferred_language 	= $this->users->get_user_meta($userid, "preferred_language");
								$language_name = '';
								if( isset($user_preferred_language['meta_value']) && $user_preferred_language['meta_value'] ) {
									$language_name = $user_preferred_language['meta_value'];
								}
								$arr_lang[] = $language_name;
								
								$total_connections++;

							("8"==$val_union_connections['type_id']) ? $total_employers_connected++ : '';
							("9"==$val_union_connections['type_id']) ? $total_workers_connected++ : '';
						}
					}
					$connection_languages 	= $data['connection_languages'] = isset($arr_lang) ? array_count_values($arr_lang) : array();

				// Get Participants/Students of the Union Courses //
					$course_participants = $this->users->getMetaDataList('union_course_participants','1=1','','*');
					$tot_average_grade_ratio = $cnt_participants = 0;
					foreach( $union_courses AS $key_courses => $val_courses ) {
						$course_participants = $this->users->getMetaDataList('union_course_participants',
								'in_library_id="'.$val_courses['library_id'].'" AND in_union_id IN ('.$course_unions.')','','id, in_participant_worker_id');
						$course_participants = isset($course_participants) ? $course_participants : array();
						foreach( $course_participants AS $key_course_participants => $val_course_participants ) {
							$cnt_participants++;
							$participant_id 	= $val_course_participants['in_participant_worker_id'];
							$quiz_answers_ratio = $this->points->getQuizAnswersRatio($participant_id, $val_courses['library_id'], 'instructor_library');
							
							$tot_average_grade_ratio += $quiz_answers_ratio;
							$union_courses[$key_courses]['participants'][$participant_id]['participant_id'] = $participant_id;
							$union_courses[$key_courses]['participants'][$participant_id]['quiz_answers_ratio'] = $quiz_answers_ratio;
						}
					}
					$data['union_courses'] = $union_courses;

				// Get Attendance with the percentage of attendance related to the total amount of connections;
					$attendee_percentage = ($total_connections>0)?round((($cnt_participants/$total_connections)*100),2) : 0;
					$data['attendee_percentage'] 	= $attendee_percentage;

				// Get AVERAGE GRADE with the average grade percentage of all users who attended Union Courses;
					$data['average_grade'] = ($tot_average_grade_ratio) ? round(($tot_average_grade_ratio/$cnt_participants),2) : 0;

					
				$data['total_connections'] 			= $total_connections;
				$data['total_employers_connected'] 	= $total_employers_connected;
				$data['total_workers_connected'] 	= $total_workers_connected;
			}

			$this->load->view('data_collection/courses', $data);
		}
		
		function courses_details()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";

			$union_id   	=  $data['union_id'] = (isset($_GET['id'])&&(int)$_GET['id']) ? (int)$_GET['id'] : '';
			$course_id   	=  $data['course_id'] = (isset($_GET['courseid'])&&(int)$_GET['courseid']) ? (int)$_GET['courseid'] : '';
			$redirectfrom 	= $data['redirectfrom'] = $this->input->get('redirectfrom');
			if( $union_id && $course_id ) {
				$data['union']  	= $this->users->getUserByID($union_id);
				
				// Get Union Courses //
					$union_lib_types = $this->users->getMetaDataList('library_types', 
							'FIND_IN_SET("'.$union_id.'", parent_library_type) AND id=56', '', 
							'id, library_type, parent_library_type'); // Union Course Library Typeid //
					$union_lib_types= (isset($union_lib_types) && sizeof($union_lib_types)) ? $union_lib_types : array();
					$course_unions 	= isset($union_lib_types[0]['parent_library_type']) ? $union_lib_types[0]['parent_library_type'] : '';
					$arr_course_unions 	= isset($union_lib_types[0]['parent_library_type']) ? explode(",",$union_lib_types[0]['parent_library_type']) : '';
					
					$library_types 	= array();
					foreach( $union_lib_types AS $key_id => $val ) {
						$library_types[] = $val['id'];
					}
					$union_libtype = (isset($library_types[0]) && $library_types[0]) ? implode(",", $library_types) : '';		
					if( $union_libtype ) {
						$where_unionlib = " library_type_id IN (".$union_libtype.") AND library_id=".$course_id." AND status=1 AND (date_start<=CURDATE() AND (date_end='0000-00-00' OR date_end>CURDATE()))";
						$rows_union_courses = $this->users->getMetaDataList( "library", $where_unionlib, '', 'library_id, title, language, date_start' );
						$rows_union_courses = isset($rows_union_courses) ? $rows_union_courses : array();
					}
					$union_courses = isset($rows_union_courses) ? $rows_union_courses : array();
					$data['course_name'] = isset($rows_union_courses[0]['title']) ? $rows_union_courses[0]['title'] : '';
			
				// Get Employers and Workers of the union connections //
					$peo_links = $this->users->getMyConnectionsByUserId('PEOPLE', $union_id, NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$org_links = $this->users->getMyConnectionsByUserId('ORGANIZATION',$union_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$courses_union_connections = array_merge($peo_links, $org_links);
				
				// Get Languages, Total Employers, Total Workers //
					$total_connections = $total_employers_connected = $total_workers_connected = 0;
					if( isset($courses_union_connections) && is_array($courses_union_connections) ) {
						$arr_lang 			= array();
						$total_connections 	= 0;
						foreach( $courses_union_connections AS $val_union_connections ) {
							// Languages by connected users //
								$userid 			= $val_union_connections['id'];
								$user_secondlanguage= $this->users->get_user_meta($userid, "second_language");
								$language_name = '';
								if( isset($user_secondlanguage['meta_value']) && $user_secondlanguage['meta_value'] ) {
									$language_name = $user_secondlanguage['meta_value'];
								}
								$arr_lang[] = $language_name;

							$total_connections++;
							("8"==$val_union_connections['type_id']) ? $total_employers_connected++ : '';
							("9"==$val_union_connections['type_id']) ? $total_workers_connected++ : '';
						}
					}
					$connection_languages = $data['connection_languages'] = isset($arr_lang) ? array_count_values($arr_lang) : array();

				// Get Participants/Students of the Union Courses //
					$course_participants= array();
					foreach( $union_courses AS $key_courses => $val_courses ) {
						$course_participants = $this->users->getMetaDataList('union_course_participants',
								'in_library_id="'.$val_courses['library_id'].'" AND in_union_id IN ('.$course_unions.')','',
								'id, in_participant_worker_id, dt_participate_date');
						$course_participants = isset($course_participants) ? $course_participants : array();

						$cnt_participants = $tot_average_grade_ratio = 0;
						foreach( $course_participants AS $key_course_participants => $val_course_participants ) {
							$cnt_participants++;

							$participant_id 	= $val_course_participants['in_participant_worker_id'];
							$quiz_answers_ratio = $this->points->getQuizAnswersRatio($participant_id, $val_courses['library_id'], 'instructor_library');
							$tot_average_grade_ratio += $quiz_answers_ratio;

							$participant_userdata = $this->users->getMetaDataList('user','id="'.$participant_id.'"','', 'CONCAT(firstname," ",lastname) AS username, 
							(CASE WHEN(type_id=9) THEN "Worker" WHEN(type_id=8) THEN "Employer" WHEN(type_id=7) THEN "Union" END) AS participant_type');
							
							$participant_name =isset($participant_userdata[0]['username'])?$participant_userdata[0]['username']:'';
							$participant_type =isset($participant_userdata[0]['participant_type'])?$participant_userdata[0]['participant_type']:'';
							
							$union_courses[$key_courses]['participants'][$key_course_participants]['participant_name'] 		= $participant_name;
							$union_courses[$key_courses]['participants'][$key_course_participants]['participant_type'] 		= $participant_type;
							$union_courses[$key_courses]['participants'][$key_course_participants]['participant_worker_id'] = $val_course_participants['in_participant_worker_id'];
							$union_courses[$key_courses]['participants'][$key_course_participants]['participant_date'] 		= $val_course_participants['dt_participate_date'];
						}
					}
					$data['cnt_participants'] 	= $cnt_participants;
					$data['union_courses'] 		= $union_courses;
				
				// Get Course Instructor //
					$course_instructor = $this->users->getMetaDataList('union_courses', 'in_status="1" AND is_course_active="yes" AND in_library_id="'.$course_id.'" AND in_union_id="'.$union_id.'"', '', 'in_instructor_id');
					$course_instructors = array();
					foreach( $course_instructor AS $val_course_instructor ) {
						$instructor_id = isset($val_course_instructor['in_instructor_id']) ? $val_course_instructor['in_instructor_id'] : '';
						$instructor_name = $this->users->getMetaDataList('user','id="'.$instructor_id.'"', '', "CONCAT(firstname,' ',lastname) AS username");
						$instructor_name = isset($instructor_name[0]['username']) ? $instructor_name[0]['username'] : '';
						array_push($course_instructors,$instructor_name);
					}

				// Get Attendance with the percentage of attendance related to the total amount of connections;
					$attendee_percentage = ($total_connections>0) ? round( (($cnt_participants/$total_connections)*100), 2 ) : 0;
					$data['attendee_percentage'] 	= $attendee_percentage;

				// Get AVERAGE GRADE with the average grade percentage of all users who attended Union Courses;
					$data['avaerage_grade'] = ($tot_average_grade_ratio) ? round(($tot_average_grade_ratio/$cnt_participants),2) : 0;
					
				$data['course_instructor']			= (isset($course_instructors)&&is_array($course_instructors)) ? implode(", ",$course_instructors) : 'N/A';
				$data['total_course_students'] 		= sizeof($course_participants);
			}

			$this->load->view('data_collection/courses_details', $data);
		}
	// End - UNION DATA COLLECTION
	

	// ADMIN DATA COLLECTION //
		function consultants()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			// Get all unions //
				$all_consultants = $data['all_consultants'] = $this->users->getMetaDataList("user",'type_id=12 AND status=1','ORDER BY firstname','id,type_id,concat(firstname, " ", lastname) AS username');
				// common::pr($all_consultants);
				
			// Get all union connections //
				$all_consultant_connections = $total_union_courses = array();
				foreach( $all_consultants AS $val_all_consultants ) {
					$consultant_id 	= $val_all_consultants['id'];
				    $peo_links = $this->users->getMyConnectionsByUserId('PEOPLE',$consultant_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$org_links = $this->users->getMyConnectionsByUserId('ORGANIZATION',$consultant_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$all_consultant_connections = array_merge($all_consultant_connections,$peo_links,$org_links);
				}
				//$total_union_courses = $data['total_union_courses'] = array_unique($total_union_courses,SORT_REGULAR);
				$all_consultant_connections = array_unique($all_consultant_connections,SORT_REGULAR);
				// common::pr($all_consultant_connections);

				// Get total employers and workers //
					$total_connections = $total_employers_connected = $total_workers_connected = 0;
					if( isset($all_consultant_connections) && is_array($all_consultant_connections) ) {
						$arr_lang = array();
						foreach( $all_consultant_connections AS $val_consultant_connections ) {
							// Languages by connected users //
								$userid 	= $val_consultant_connections['id'];
								$language 	= $this->users->get_user_meta($userid, "preferred_language");
								if( isset($language['meta_value']) && $language['meta_value'] ) {
									$language_name = $language['meta_value'];
									array_push($arr_lang,$language_name);
								}

							("8"==$val_consultant_connections['type_id']) ? $total_employers_connected++ : '';
							("9"==$val_consultant_connections['type_id']) ? $total_workers_connected++ : '';
							$total_connections++;
						}
					}
					$connection_languages = $data['connection_languages'] = isset($arr_lang) ? array_count_values($arr_lang) : array();
			
				$data['total_connections'] 			= $total_connections;
				$data['total_employers_connected'] 	= $total_employers_connected;
				$data['total_workers_connected'] 	= $total_workers_connected;
		
			$this->load->view('data_collection/consultants', $data);
		}
		
		function consultants_details()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			// Get all unions //
				$all_consultants = $data['all_consultants'] = $this->users->getMetaDataList("user",'type_id=12 AND status=1','ORDER BY firstname','id,type_id,concat(firstname, " ", lastname) AS username');
				// common::pr($all_consultants);
				
			// Get all union connections //
				$all_consultant_connections = $total_union_courses = array();
				foreach( $all_consultants AS $val_all_consultants ) {
					$consultant_id 	= $val_all_consultants['id'];
				    $peo_links = $this->users->getMyConnectionsByUserId('PEOPLE',$consultant_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$org_links = $this->users->getMyConnectionsByUserId('ORGANIZATION',$consultant_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$all_consultant_connections = array_merge($all_consultant_connections,$peo_links,$org_links);

					/*
					// Get Consultant Courses //					
						$rows_union_courses = $this->users->getUnionLibraryCourses(array('in_union_id'=>$consultant_id));
						$union_courses 		= isset($rows_union_courses) ? $rows_union_courses : array();
						$total_union_courses = array_merge($total_union_courses, $union_courses);
					*/
				}
				//$total_union_courses = $data['total_union_courses'] = array_unique($total_union_courses,SORT_REGULAR);
				$all_consultant_connections = array_unique($all_consultant_connections,SORT_REGULAR);
				// common::pr($all_consultant_connections);			

				// Get total employers and workers //
					$total_connections = $total_employers_connected = $total_workers_connected = 0;
					if( isset($all_consultant_connections) && is_array($all_consultant_connections) ) {
						$arr_lang = array();
						foreach( $all_consultant_connections AS $val_consultant_connections ) {
							// Languages by connected users //
								$userid 	= $val_consultant_connections['id'];
								$language 	= $this->users->get_user_meta($userid, "preferred_language");
								if( isset($language['meta_value']) && $language['meta_value'] ) {
									$language_name = $language['meta_value'];
									array_push($arr_lang,$language_name);
								}

							("8"==$val_consultant_connections['type_id']) ? $total_employers_connected++ : '';
							("9"==$val_consultant_connections['type_id']) ? $total_workers_connected++ : '';
							$total_connections++;
						}
					}
					$connection_languages = $data['connection_languages'] = isset($arr_lang) ? array_count_values($arr_lang) : array();
					// common::pr($connection_languages);

				// Get Union Courses //
					/*$rows_union_courses = $this->users->getUnionLibraryCourses(array('in_union_id'=>$union_id));
					$union_courses = isset($rows_union_courses) ? $rows_union_courses : array();
					foreach( $union_courses AS $key_courses => $val_courses ) {
						$course_participants = $this->users->getMetaDataList('union_course_participants',
								'in_course_id="'.$val_courses['id'].'" AND in_union_id="'.$union_id.'"','','id, in_participant_worker_id');
						$course_participants = isset($course_participants) ? $course_participants : array();
						foreach( $course_participants AS $key_course_participants => $val_course_participants ) {
							$union_courses[$key_courses]['participant_id'][] = $val_course_participants['in_participant_worker_id'];
						}
					}
					$data['union_courses'] = $union_courses;*/

				$data['total_connections'] 			= $total_connections;
				$data['total_employers_connected'] 	= $total_employers_connected;
				$data['total_workers_connected'] 	= $total_workers_connected;
		
			$this->load->view('data_collection/consultants_details', $data);
		}

		function purchases_admindata()
		{
			$data 			= $this->commonHead();
			$data['module'] = "dashboard";
			$ret_graph_purchase_points = $data['ret_graph_purchase_points'] = $this->users->getGraphPurchaseAndPoints();
			$this->load->view('data_collection/purchases_admindata', $data);
		}

		function duediligence_admindata()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('data_collection/duediligence_admindata', $data);
		}

		function user_admindata()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('data_collection/user_admindata', $data);
		}
		
		function union_admindata()
		{
			$data 				= $this->commonHead();
			$data['module'] 	= "dashboard";

			// Get all unions //
				$all_unions = $data['all_unions'] = $this->users->getUnions('','id,type_id,CONCAT(firstname," ",lastname) AS username');
				
			// Get all union connections //
				$all_union_connections = $total_union_courses = array();
				foreach( $all_unions AS $val_all_unions ) {
					$union_id 	= $val_all_unions['id'];
				    $peo_links = $this->users->getMyConnectionsByUserId('PEOPLE',$union_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$org_links = $this->users->getMyConnectionsByUserId('ORGANIZATION',$union_id,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
					$all_union_connections = array_merge($all_union_connections,$peo_links,$org_links);

					/*
					// Get Union Courses //					
						$rows_union_courses = $this->users->getUnionLibraryCourses(array('in_union_id'=>$union_id));
						$union_courses 		= isset($rows_union_courses) ? $rows_union_courses : array();
						$total_union_courses = array_merge($total_union_courses, $union_courses);
					*/
				}
				//$total_union_courses = $data['total_union_courses'] = array_unique($total_union_courses,SORT_REGULAR);
				$all_union_connections = array_unique($all_union_connections,SORT_REGULAR);
				// common::pr($all_union_connections);

			// Get total no. of workers and employers connected //
				$total_connections = $total_employers_connected = $total_workers_connected = 0;
				if( isset($all_union_connections) && is_array($all_union_connections) ) {
					$arr_lang = array();
					foreach( $all_union_connections AS $val_union_connections ) {
						// Languages by connected users //
							$userid 	= $val_union_connections['id'];
							$language 	= $this->users->get_user_meta($userid, "preferred_language");
							if( isset($language['meta_value']) && $language['meta_value'] ) {
								$language_name = $language['meta_value'];
								array_push($arr_lang,$language_name);
							}
						
						$total_connections++;
						("8"==$val_union_connections['type_id']) ? $total_employers_connected++ : '';
						("9"==$val_union_connections['type_id']) ? $total_workers_connected++ : '';
					}
				}
			$connection_languages = $data['connection_languages'] = isset($arr_lang) ? array_count_values($arr_lang) : array();
			// common::pr($connection_languages);

			$data['total_connections'] 			= $total_connections;
			$data['total_employers_connected'] 	= $total_employers_connected;
			$data['total_workers_connected'] 	= $total_workers_connected;
		
			$this->load->view('data_collection/union_admindata', $data);
		}
		function inspection_admindata()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('data_collection/inspection_admindata', $data);
		}
		function investigation_admindata()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('data_collection/investigation_admindata', $data);
		}
		function injuries_admindata()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('data_collection/injuries_admindata', $data);
		}
		function safetytalks_admindata()
		{
			$data = $this->commonHead();
			$data['module'] = "dashboard";
			$this->load->view('data_collection/safetytalks_admindata', $data);
		}	
}