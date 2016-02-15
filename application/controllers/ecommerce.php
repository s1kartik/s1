<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ecommerce extends MY_Controller 
{
    function __construct()
	{
		parent::__construct();        
        //$this->_security();
        $this->load->library('cart');
		
		$this->sess_userid 		= $this->session->userdata['userid'];
		$this->sess_usertype 	= $this->session->userdata['usertype'];
		$this->sess_useremail 	= $this->session->userdata['username'];
		$this->sess_nickname 	= $this->session->userdata('nickname');
		
        $this->user = $this->users->getUserByEmail($this->session->userdata("username"));
	}

    function addItem() 
	{
		$id 			= "S1".($this->cart->total_items()+1); // UNIQUE CART ITEM ID //
        $libid 			= isset($_POST['id']) ? $_POST['id'] : '';
		$library_type	= isset($_POST['library_type']) ? $_POST['library_type'] : '';
		$cart_qty		= isset($_POST['cart_qty']) ? $_POST['cart_qty'] : '1';
		$payment_option	= (isset($_POST['payment_option'])&&$_POST['payment_option']) ? $_POST['payment_option'] : '';

		if( (int)$library_type ) {
			$library_type	= $this->users->getElementByID('tbl_library_types', $library_type,'library_type');
			$library_type	= $library_type['library_type'];
		}
        $flag 	= TRUE;
        $items 	= $this->cart->contents();

        foreach( $items as $item ) {
            if ($item['id'] == $id) {
                $qty 	= ($item['qty']+1);
                $data 	= array( 'rowid'=>$item['rowid'], 'qty'=> $qty);
                $this->cart->update($data);
                $flag 	= FALSE;
                break;
            }
        }
		
		// Set title, language, price, points, credits, creditsbuy in the Shopping Cart Array //
			switch( $library_type ) {
				case 'custom_inspection': { // CUSTOM INSPECTION //
					$ret_cart_items			= $this->users->getElementByID('tbl_custom_inspection', $libid, 'in_price, st_language AS language, st_custom_inspection_name AS title, in_earning_points AS in_points, in_credits_buy AS in_credits, in_credits_buy AS creditsbuy');
					$cart_data['language'] 	= $ret_cart_items['language'];
					$cart_data['title'] 	= $ret_cart_items['title'];
					break;
				}
				case 'normal_inspection': { // NORMAL INSPECTION //
					$ret_cart_items			= $this->users->getElementByID('tbl_inspection', $libid, 'in_price, st_language AS language, st_inspection_name AS title, in_earning_points AS in_points, in_credits_buy AS in_credits, in_credits_buy AS creditsbuy');
					$cart_data['language'] 	= $ret_cart_items['language'];
					$cart_data['title'] 	= $ret_cart_items['title'];
					break;
				}				
				case 'new_procedure': { // Procedures created any User //
					$arr_procedures = array("title"=>"My New Procedure", 'userid' =>$this->session->userdata('userid'), 'procedure_status'=>'inprogress', 'status'=>'1');
					$libid 			= $this->adminsettings->addUserProcedures($arr_procedures);
					$price_settingsname = 'procedures';
					$cart_data 		= $this->users->getMetaDataList('procedures', "id='".$libid."'", '', 'st_language AS language, st_procedure_name AS title');
					$cart_data 		= $cart_data[0];
					$ret_cart_items	= $this->users->getMetaDataList('price_settings', 'price_settingsname="'.$price_settingsname.'"', '', "in_price, in_points, in_credits");
					break;
				}
				case 's1procedures': { // Procedures created by Admin //
					$cart_data 		= $this->users->getMetaDataList('procedures', "id='".$libid."'", '', 'st_language AS language, st_procedure_name AS title');
					$cart_data 		= $cart_data[0];
					$ret_cart_items	= $this->users->getMetaDataList('price_settings', 'price_settingsname="'.$library_type.'"', '', "in_price, in_points, in_credits");
					break;
				}
				case 'custom_safetytalks': {
					$cart_data		= $this->users->getElementByID('tbl_custom_safetytalks', $libid, 'st_language AS language, st_custom_safetytalks_name AS title');
					$ret_cart_items	= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
					break;
				}
				case 'normal_safetytalks': {
					$cart_data			= $this->users->getElementByID('tbl_safetytalks', $libid, 'st_language AS language, st_safetytalks_topic AS title');
					$ret_cart_items		= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
					break;
				}
				case 'new_normal_safetytalks': {
					$library_type 	= "normal_safetytalks";
					$libid 			= $this->safetytalks->addSafetytalks('tbl_safetytalks', '', 0);
					$cart_data		= $this->users->getElementByID('tbl_safetytalks', $libid, 'st_language AS language, st_safetytalks_topic AS title');
					$ret_cart_items	= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
					break;
				}
				case 'new_custom_inspection': {
					$cart_data['title'] 	= isset($_POST['item_title']) ? $_POST['item_title'] : '';
					$cart_data['language'] 	= "EN";
					$cart_data['price']		= isset($_POST['item_price']) ? $_POST['item_price'] : '';
					$cart_data['credits']	= isset($_POST['item_credits']) ? $_POST['item_credits'] : '';
					$cart_data['creditsbuy']= isset($_POST['item_credits']) ? $_POST['item_credits'] : '';
					break;
				}
				default: { // Other library contents except Inspection and SafetyTalks //
					$cart_data= $this->libraries->getLibraryByID($libid);
					break;
				}
			}

			if( 'custom_inspection' == $library_type || 'normal_inspection' == $library_type ) { 
				isset($ret_cart_items['in_price']) ? $cart_data['price'] 		= $ret_cart_items['in_price'] : '';
				isset($ret_cart_items['in_credits']) ? $cart_data['credits'] 	= $ret_cart_items['in_credits'] : '';
				isset($ret_cart_items['in_credits']) ? $cart_data['creditsbuy'] = $ret_cart_items['in_credits']: '';
				isset($ret_cart_items['in_points']) ? $cart_data['points'] 		= $ret_cart_items['in_points'] : '';
			}
			else if( "new_custom_inspection" != $library_type ) {
				isset($ret_cart_items[0]['in_price']) ? $cart_data['price'] 		= $ret_cart_items[0]['in_price'] : '';
				isset($ret_cart_items[0]['in_credits']) ? $cart_data['credits'] 	= $ret_cart_items[0]['in_credits'] : '';
				isset($ret_cart_items[0]['in_credits']) ? $cart_data['creditsbuy'] 	= $ret_cart_items[0]['in_credits']: '';
				isset($ret_cart_items[0]['in_points']) ? $cart_data['points'] 		= $ret_cart_items[0]['in_points'] : '';
			}

			if( $flag ) {
				$data = array(
					'libid'     	=> $libid, 
					'id'			=> $id, 
					'qty'      		=> $cart_qty, 
					'price'    		=> $cart_data['price'], 
					'language' 		=> $cart_data['language'], 
					'name'     		=> $cart_data['title'], 
					'options'  		=> array('Credits' => $cart_data['credits'], 'Creditsbuy' => $cart_data['creditsbuy']),
					'library_type' 	=> $library_type
				);
				$this->cart->product_name_rules = '\d\D';
				$this->cart->insert($data);
			}
		
        echo json_encode(array('qty'=>$this->cart->total_items(), 'amount'=>$this->cart->total()));
    }
	
	
	// Credits Packages //
	function addCredits()
	{
		$creditspkg_name	= isset($_POST['creditspkgName']) ? $_POST['creditspkgName'] : '';
		$creditspkg_credits	= isset($_POST['creditspkgCredits']) ? $_POST['creditspkgCredits'] : '';
		$creditspkg_price	= isset($_POST['creditspkgPrice']) ? $_POST['creditspkgPrice'] : '';
		$shopping_itemid	= isset($_POST['shopping_itemid']) ? $_POST['shopping_itemid'] : '';

        $flag 	= TRUE;
        $items 	= $this->cart->contents();

		$id 	= "S1".($this->cart->total_items()+1); // UNIQUE CART ITEM ID //

        foreach( $items as $item ) {
            if ($item['id'] == $id) {
                $qty 	= ($item['qty']+1);
                $data 	= array( 'rowid'=>$item['rowid'], 'qty'=> $qty);
                $this->cart->update($data);
                $flag 	= FALSE;
                break;
            }
        }

        if ($flag) {
            $data = array(
				'id'			  => $id, 
				'shopping_itemid' => $shopping_itemid, 
				'transaction_type'=> 'moneris', 
				'qty'      		  => 1, 
				'price'    	      => $creditspkg_price,
				'name'     		  => $creditspkg_name,
				'options'  		  => array('credits' => $creditspkg_credits, 'Creditsbuy' => $creditspkg_credits)
            );
            $this->cart->product_name_rules = '\d\D';
            $this->cart->insert($data);
        }
        echo json_encode(array('qty'=>$this->cart->total_items(), 'amount'=>$this->cart->total()));
    }

    function delItem(){
        $data = array(
            'rowid' => $_POST['rowid'],
            'qty'   => 0
        );
        $this->cart->update($data); 
    }

    function shoppingcart()
	{
		$data['ps_store_id'] = $data['hpp_key'] = '';

		if( $this->user['type_id'] > 1 ) {
			$check_payment = ('staging'==ENVIRONMENT||'production'==ENVIRONMENT) ? 1 : 1;
			
			if( isset($_GET['testtest']) && "1"==$_GET['testtest'] ) {
				$check_payment = -1;
			}

			if( $check_payment == 0 ) { // DEVELOPMENT //
				// Payment cycle set from July-06 to Aug-06
					$data['ps_store_id']	= 'AMQAZtore3';
					$data['hpp_key'] 		= 'hpBJL44D6KAL';
					$data['payment_url'] 	= 'https://esqa.moneris.com/HPPDP/index.php';
			}
			else if( $check_payment == 1 ) { // STAGING | PRODUCTION //
				$data['ps_store_id']	= 'DX4CQ37400';
				$data['hpp_key'] 		= 'hpUNVYLN8OT2';
				$data['payment_url'] 	= 'https://www3.moneris.com/HPPDP/index.php';
			}
			else if( $check_payment == '-1' ) { // BY PASS PAYMENT //
			 // FOR TESTING ON DEVELOPMENT //
				$data['payment_url'] 	= $this->base."ecommerce/transaction_completed";
			}
		}
		else {
			$data['payment_url'] 	= $this->base."ecommerce/transaction_completed";
		}

        $data['css']	= $this->css;
        $data['base']	= $this->base;
        $data['module'] = "dashboard";
        $data['user']	= $this->user;
		
		$data['total_available_credits'] = $this->points->getS1Credits();
		
        $type 			= $this->users->getElementByID('tbl_usertype', $this->session->userdata("usertype"));
        $usermeta 		= $this->users->getUserMetaByID($this->session->userdata('userid'));

        if( $type['typename']!='Administrator' && (!isset($usermeta['country_id']) || !isset($usermeta['province_id'])) ) {
            redirect($this->base.'admin/profile_setting?section=personal&msg=1');
        }

		$shoptype = isset($_GET['shoptype']) ? $_GET['shoptype'] : ''; 
		$cart_contents = $this->cart->contents();

        if($_SERVER['REQUEST_METHOD']=='POST') {
            foreach($cart_contents as $rowid => $val_cart_contents){
				// common::pr($_POST);
				$cart_contents[$rowid]['qty'] = $_POST['qty'][$rowid];
				$cart_contents[$rowid]['transaction_type'] = $_POST['rdb_payment_option'][$rowid];
				$shopping_itemid = $cart_contents[$rowid]['shopping_itemid'];

				if( "creditspkg" == $shoptype ) {
					$credits_price = $this->users->getMetaDataList('credits_requests','id="'.$shopping_itemid.'"','','in_credits_price');
					isset($credits_price[0]['in_credits_price']) ? $cart_contents[$rowid]['price'] =  $credits_price[0]['in_credits_price'] : '';
				}
                $this->cart->update($cart_contents);
            }
        }
		// common::pr( $this->cart->contents() ); //die;

        if($type['typename']!='Administrator') {
            $data['tax'] = $this->adminsettings->getTaxRateByProvinceID($usermeta['country_id'], $usermeta['province_id']);
		}
        else {
            $data['tax']['rate'] = 0;
            $data['tax']['tax_abbr'] = '';
        }
        $this->load->view('shoppingcart_view', $data);
    }

    function transaction_completed()
	{
		$transaction_response_string= json_encode($_POST);
		$transaction_message 		= isset($_POST['message']) ? $_POST['message'] : '';

		session_start();
        $data['css']	= $this->css;
        $data['base']	= $this->base;
        $data['module'] = "dashboard";
        $type 			= $this->users->getElementByID('tbl_usertype', $this->session->userdata("usertype"));

        ($type['typename']=='Administrator') ? $_POST['txn_num'] = "admin" : $_POST['txn_num'];

		if( isset($_POST) && sizeof($_POST) ) {
			$data['items'] = $cart_contents = $this->cart->contents();
			foreach($cart_contents as $rowid => $val_cart_contents){
				$cart_contents[$rowid]['payment_option'] = "moneris";
			}
			$this->cart->update($cart_contents);
			
			foreach( $this->cart->contents() as $item ) {
				// Buy Platinum Credits: Send Message to S1 user and Send email to S1 Admin //
					if( "platinum" == strtolower($item['name']) ) {
						// Send message to S1 Admin //
							$subj_platinum_credits 	= "Purchased Platinum Credits";
							$body_platinum_credits	= "You have purchased ".$item['options']['credits']." Platinum Credits on ".date('M d, Y');

							// Send message to admin@hrqsolutions.com //
								$to_msg_admin 	= "admin@hrqsolutions.com"; // S1 Admin //;
								$check_msg 		= $this->users->getMetaDataList('message','subject = "'.$subj_platinum_credits.'" AND send_to="'.$to_msg_admin.'"','','message_id');
								$arr_message 	=  array('send_to'=>$to_msg_admin, 'send_from'=>$to_msg_admin, 'subject'=>$subj_platinum_credits, 'message'=>$body_platinum_credits);
								
								if( isset($check_msg[0]['message_id']) ) {
									$this->parentdb->manageDatabaseEntry( 'tbl_message', 'UPDATE', array('read_status'=>'1'), array('message_id'=>$check_msg[0]['message_id']) );
								}
								else {
									$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_message );
								}

							// Send message to admin@mys1s.ca //
								$to_msg_admin 	= "admin@mys1s.ca"; // S1 Admin //
								$check_msg 		= $this->users->getMetaDataList('message','subject = "'.$subj_platinum_credits.'" AND send_to="'.$to_msg_admin.'"','','message_id');
								$arr_message	= array('send_to'=>$to_msg_admin, 'send_from'=>$to_msg_admin, 'subject'=>$subj_platinum_credits, 'message'=>$body_platinum_credits);
								if( isset($check_msg[0]['message_id']) ) {
									$this->parentdb->manageDatabaseEntry( 'tbl_message', 'UPDATE', array('read_status'=>'1'), array('message_id'=>$check_msg[0]['message_id']) );
								}
								else {
									$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_message );
								}

						// Send Email to S1 Admins //
							$data['credits'] 		= $item['options']['credits'];
							$data['credits_price'] 	= $item['price'];
							$data['user_nickname'] 	= $this->sess_nickname;
							$email_body 			= $this->load->view('email_templates/buy_platinum_credits', $data, true);

							// OLD: $to 					= $this->site_email;
							
							// Send email to admin@hrqsolutions.com //
								$to_email_admin = "admin@hrqsolutions.com";
								$this->users->sendEmailToS1user($to_email_admin, $this->site_email, 'User '.$this->sess_nickname.' has purchased '.$item['options']['credits'].' platinum credits', $email_body);

							// Send email to admin@mys1s.ca //
								$to_email_admin = "admin@mys1s.ca";
								$this->users->sendEmailToS1user($to_email_admin, $this->site_email, 'User '.$this->sess_nickname.' has purchased '.$item['options']['credits'].' platinum credits', $email_body);
					}

				if( isset($item['transaction_type']) && 'moneris' == $item['transaction_type'] ) {
					// Add Credits from shopping cart to my credits and clear cart //
						$options = $this->cart->product_options($item['rowid']);
						$this->libraries->addItemInCartToMyCredits($this->session->userdata("userid"), $this->session->userdata("username"), $item, $options);
				}
				else {
					// Add library items from shopping cart to my library and clear cart //
						if( "new_custom_inspection" == $item['library_type'] ) { // Created by using Drag&Drop Inspection/Custmized Inspection //
							$new_custominsp_id 	= $this->inspection->addUserCustomInspections( $item, $_SESSION['all_inspections'] );
							$item['libid'] 		= $new_custominsp_id;
							unset($_SESSION['all_inspections'], $_SESSION['normal_inspections'], $_SESSION['customized_inspections']);
						}
						$options = $this->cart->product_options($item['rowid']);
						$this->libraries->addItemInCartToMyLibrary($this->session->userdata("userid"), $this->session->userdata("username"), $item, $options, $transaction_message, $transaction_response_string);
				}
			}

            $this->cart->destroy();
            $data['user'] = $this->user;			
            $this->load->view('transaction_completed_view', $data);
        }
    }
	
	function transaction_declined()
	{
		$data['css'] = $this->css;
		$data['base'] = $this->base;
		$data['module'] = "dashboard";
		$this->load->view('transaction_declined', $data);
	}
}
?>