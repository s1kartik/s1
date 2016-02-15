<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
	

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

	function __construct()
	{
		parent::__construct();
		mysql_query('select * from tbl_user') or die(mysql_error());
		$this->load->library('common');
	}
	
	public function index()
	{
        $data['css']=$this->css;
        $data['base']=$this->base; 
	
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($_POST['action'] == "SIGNUP") {
				$isEmailExists = $this->users->validateMetaData( 'tbl_login_users', 'email_addr', $this->common->escapeStr($_POST['email']) );
				
				if( 'false' != $isEmailExists ) {
					$this->users->addUser();
					$this->send_register_notification($_POST['email'], $_POST['password'], $_POST['firstname']);
					$data['message'] = lang('msg_signup_successful');
				}
				else {
					$data['signup'] = "SIGNUP";
				}
            }

            if($_POST['action']=="SIGNIN") {
				// $qry = mysql_query("select password from tbl_user where email_addr = 'sandro.pinto@183training.com'");
				// $rows = mysql_fetch_assoc($qry);
				// common::pr($rows);die;
				// live password:a495b70c859b61f53aa7c6ad9f054447
				// mysql_query("update tbl_user set password='a495b70c859b61f53aa7c6ad9f054447' where email_addr = 'sandro.pinto@183training.com'");
				
				ini_set('session.gc_maxlifetime',3*60*60); // 3 hours session time set //
				ini_set('session.gc_probability', 1);
				ini_set('session.gc_divisor', 1);
				session_set_cookie_params(8*60*60);

                $user = $this->users->userCheck($_POST['login'], $_POST['password']);
                if(count($user)>0){
                    if($user['status']<1) {
                        if($user['status']<0)
                            echo $data['textmsg'] = lang('msg_account_locked_resetpwd');
                        else
                            echo $data['textmsg'] = lang('msg_confirm_registry_active_account');
                    } 
					else {
                        $this->session->set_userdata('username', $user["email_addr"]);
                        $this->session->set_userdata('nickname', $user["nickname"]);
            		  	$this->session->set_userdata('usertype', $user["type_id"]);
						// Get logged in usertype name //
							$rows_usertype_name = $this->users->getMetaDataList('usertype', 'id="'.$user['type_id'].'"', '', 'typename');
							$usertype_name = isset($rows_usertype_name[0]['typename']) ? ucwords($rows_usertype_name[0]['typename']) : '';
            			$this->session->set_userdata('userid', $user["id"]);
						$this->session->set_userdata('usertypename', $usertype_name);
                        $this->session->unset_userdata('try');

						// Update User Login and Send prelaunch email to current site users, while first login only //
							$ret_noof_login = $this->users->updateUserLogin( $user["email_addr"] );
							// DISABLED the email designated for relaunch, for previous users, as per the request on 28Jul2015 //
								// ($ret_noof_login==1) ? $this->send_prelaunch_login($user["email_addr"]) : '';
						
                        if($user["type_id"]==1) {
							echo $data['message'] = $user["type_id"];
						}
                        else {
							echo $data['message'] = $user["type_id"];
                        }
                    }
                }else{
                    $try = $this->session->userdata("try");
                    $try = (int)$try + 1;
                    $this->session->set_userdata('try', $try);
                    $data['textmsg'] = lang('msg_username_or_pwd_incorrect');
                    if($try >=3){
                        $this->users->blockAccount($_POST['login']);

						echo $data['textmsg'] = 'Your account has been locked, please <a href="#" onclick="enableForgot();" style="color:#FFFFF;">reset your password</a>.';
                        $this->session->unset_userdata('try');   
                    }else{
                        echo $data['textmsg'] = lang('msg_username_or_pwd_incorrect');
                    }
                }
            }
            
			if($_POST['action']=="RESETPASSWORD"){ // Forgot Password Clicked //
				$isEmailExists 	= $this->users->validateMetaData( 'tbl_login_users', 'email_addr', $this->input->post('email_addr'));
				$isUserActive 	= $this->users->validateMetaData( 'tbl_login_users', 'status', 1, 'email_addr="'.$this->input->post('email_addr').'"' );

				if( 'false' == $isEmailExists ) {
					if( 'false' == $isUserActive ) {
						$loginuser = $this->users->getUserByEmail($this->input->post('email_addr'));
						$this->send_recovery_notification( $this->input->post('email_addr'),'',$loginuser['firstname'] );
						echo $data['message'] = lang('msg_recovery_sent');
					}
					else { // User is InActive //
						$this->send_recovery_notification( $this->input->post('email_addr'), 1, '' );
						echo $data['message'] = lang('msg_recovery_sent');
					}
					/* Commented on 27Nov2015 else {
						echo $data['message'] = lang('msg_click_getsignup');
					}*/
				}
				else {
					echo $data['message'] = lang('msg_email_not_registered');
				}
            }

			/* Commented because "get signup email functionality is no more exists
			if($_POST['action']=="CONFIRM_SIGNUP_EMAIL"){
				$isEmailExists 	= $this->users->validateMetaData( 'tbl_user', 'email_addr', $this->input->post('txt_confirm_signupemail'));
				$isUserActive 	= $this->users->validateMetaData( 'tbl_user', 'status', 1, 'email_addr="'.$this->input->post('txt_confirm_signupemail').'"' );

				if( 'false' == $isEmailExists ) { // Valid Email //
					if( 'false' == $isUserActive ) { // User is Active //
						echo $data['message'] = lang('msg_email_already_available');
					}
					else { // User is InActive //
						$this->send_recovery_notification( $this->input->post('txt_confirm_signupemail'), 1, '' );
						echo $data['message'] = lang('msg_recovery_sent');

					}
				}
				else { // Invalid Email //
					echo $data['message'] = lang('msg_email_not_registered');
				}
            }
			*/

            if($_POST['action']=="UPDATEPASSWORD"){
				if( 1==$this->input->post('hidn_from_admin') ) {
					$result = $this->users->activeAccount( $this->input->post('hidn_email_addr') );
				}
                $this->users->updatePasswordByUserID( $this->input->post('userid') );
                $data['message'] = "Your password has been successfully reset, Please <a href=\"".PATH_URI."\" class=fg-darkRed>click here</a> to Login.";
            }
			
			if($_POST['action']=="ACTIVATE_ACCOUNT") {
				$post_email = trim($this->input->post('txt_confirm_signupemail'));
				/*echo*/ $email 	= $this->encrypt_decrypt('decrypt', $this->common->escapeStr($_GET['user']));
				$email 	= trim($email);
				if( $email == $post_email ) {
					$result = $this->users->activeAccount( $this->input->post('txt_confirm_signupemail') );
					if( $result ) {
						$data['message'] = "Your account has been successfully activated, Please <a href=\"".PATH_URI."\" class=fg-darkRed>click here</a> to Login.";
					}
				}
				else {
					$data['message'] = lang('msg_email_not_match');
				}
            }
        }
		
		/********BEGIN by marcio on June 16 2014 ************/
        if(isset($_GET['signup'])) {
            $signup_page 	= $_GET['signup'];
			switch ($signup_page) {
				case "industry": {
					$this->load->view('frontend/signup_'.$signup_page, $data);
					break;
				}
				case "usertype": {
					$data['industry_id'] = $_GET['industry'];
					$this->load->view('frontend/signup_'.$signup_page, $data);
					break;
				}
				case "mydata": {
					$data['industry_id'] = isset($_GET['industry']) ? $_GET['industry'] : '';
					$data['usertype_id'] = isset($_GET['usertype']) ? $_GET['usertype'] : '';
					$this->load->view('frontend/signup_'.$signup_page, $data);
					break;
				}
			}
        }
		
		if( isset($_GET['user_section']) ) {
			$user_section 	= $_GET['user_section'];
			switch ($user_section) {
				case "password_reset": {
					$ret_data 	= $this->password_reset();
					$data 		= array_merge($data, $ret_data);
					$this->load->view('frontend/password_reset', $data);
					break;
				}
				case "register_confirm": {
					$ret_data 	= $this->register_confirm();
					$data 		= array_merge($data, $ret_data);

					// Add registration Credits // 
						$registration_credits = "50";
						$useremail 	= $this->encrypt_decrypt('decrypt', $this->common->escapeStr($_GET['user']));
						$useremail 	= trim($useremail);

						$userid = $this->users->getMetaDataList('user','','email_addr="'.$useremail.'"','id');
						$userid = isset($userid[0]['id']) ? $userid[0]['id'] : '';
						
						// Check and add registration points //
							$rows_registration_points = $this->users->getMetaDataList('my_credits',
													'in_user_id="'.$userid.'" AND st_credits_package="registration"','','COUNT(id) AS has_registration_points');
							$registration_points = isset($rows_registration_points[0]['has_registration_points']) ? $rows_registration_points[0]['has_registration_points'] : '';
							
							if( $registration_points<=0 ) {
								$arr_ins_signup_credits = array( 'in_user_id'=>$userid, 'st_credits_package'=>'registration', 'in_credits_purchased'=>$registration_credits, 'in_qty_ordered'=>'1', 'dt_date_purchased'=>date('Y-m-d h:i:s') );
								$this->parentdb->manageDatabaseEntry( 'tbl_my_credits', 'INSERT', $arr_ins_signup_credits );
							}
			
					$this->load->view('frontend/register_confirm', $data);
					break;
				}
			}
		}
		/********END by marcio on June 16 2014 ************/

		
		if( !isset($_GET['signup'])) {
			$this->load->view('frontend/welcome', $data);
		}
		/********Begin closing statement by marcio on June 16 2014 ************/
		/********END closing statement by marcio on June 16 2014 ************/
	}
    
	function send_register_notification($to, $pwd, $first){
		$this->load->library('email');
		$config['mailtype'] 	= 'html'; // text
		$config['charset']  	= 'utf-8'; // iso-8859-1
		$config['wordwrap'] 	= TRUE;
		$config['priority'] 	= 1;
		$this->email->initialize($config);
		
		$data['base']=$this->base;
        $data['password'] = $pwd;
		$data['userfirstname'] = $first;
        $data['url'] = $this->base."?user_section=register_confirm&user=".urlencode($this->encrypt_decrypt('encrypt', $to));

        $email_body = $this->load->view('email_templates/register', $data, true);

		$this->email->from($this->config->item('site_email'), 'S1');
		$this->email->to($to); 
		
		$this->email->subject('IMPORTANT! Please Confirm Your Registration at S1');
		$this->email->message($email_body);	
		$this->email->send();		
	    return ;
	}  

	function send_prelaunch_login( $to='' )
	{
		$this->load->library('email');
		$config['mailtype'] 	= 'html'; // text
		$config['charset']  	= 'utf-8'; // iso-8859-1
		$config['wordwrap'] 	= TRUE;
		$config['priority'] 	= 1;
		$this->email->initialize($config);
		
		$data['base']=$this->base;
        $email_body = $this->load->view('email_templates/prelaunch_login', $data, true);

		$this->email->from($this->config->item('site_email'), 'S1');
		$this->email->to($to); 
		
		$this->email->subject('ACCOUNT LOGIN');
		$this->email->message($email_body);	
		$this->email->send();		
	    return ;
	}
    
    
	function send_recovery_notification($to, $sendByAdmin='',$first){
		$this->load->library('email');
		$config['mailtype'] 	= 'html'; // text
		$config['charset']  	= 'utf-8'; // iso-8859-1
		$config['wordwrap'] 	= TRUE;
		$config['priority'] 	= 1;
		$this->email->initialize($config);
		
		$data['base']=$this->base;
		$from_admin = (1==$sendByAdmin) ? '&from_admin=1' : '';
		$data['userfirstname'] = $first;
        $data['url'] = $this->base."?user_section=password_reset&user=".urlencode($this->encrypt_decrypt('encrypt', $to)).$from_admin;;
		$data['send_by_admin'] = $sendByAdmin;

        $email_body = $this->load->view('email_templates/recover', $data, true);

		$this->email->from($this->config->item('site_email'), 'S1');
		$this->email->to($to); 

		$this->email->subject('ACCOUNT INFORMATION REQUEST for '.strtoupper($to));
		$this->email->message($email_body);	
		$this->email->send();
	    return ;
	}       

    function register_confirm()
	{
        $data['css']=$this->css;
        $data['base']=$this->base; 

        $email 	= $this->encrypt_decrypt('decrypt', $this->common->escapeStr($_GET['user']));
        $email 	= trim($email);
		$result = $this->users->userCheck($email);

        if( sizeof($result) < 1 ) {
            $data['message'] = lang('msg_invalid_link');
        }
		else {
            $data['user_email'] = $email;
        }		
		return $data;
    }
    
    function password_reset()
	{
        $data['css']=$this->css;
        $data['base']=$this->base; 

		$data['from_admin'] = isset($_GET['from_admin']) ? $_GET['from_admin'] : '';

        $email 	= $this->encrypt_decrypt('decrypt', $this->common->escapeStr($_GET['user']));
        $user 	= $this->users->getUserByEmail($email);
        if(count($user)<1){
            $data['message'] = lang('msg_invalid_link');
        }
		else{
            $data['user'] = $user;
            $data['reset'] = "RESET";
        }
		return $data;
    }
    
    function logout()
	{
	    $unset_sessions = array('username' => '', 'usertype' => '', 'userid' => '', 'unicknamename' => '');
		$this->session->unset_userdata($unset_sessions);
        $this->load->library('cart');
        $this->cart->destroy();
		
		$this->session->sess_destroy();
		
		redirect($this->base);
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
         
}