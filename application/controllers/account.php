<?php 
class Account extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		 $this->member_session_check();
		 
		 $h_school_id 		= Utilities::encrypt(1);
		 $this->school_id 	= Utilities::decrypt($h_school_id);
		 $this->c_date		= Tools::getCurrentDateTime();
		 $this->c_user		= Utilities::decrypt($_SESSION['egrade']['member_id']);
		 
		 $this->account_type = Utilities::decrypt($_SESSION['egrade']['account_type']);
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('account.js');
		Jquery::tipsy();
		Jquery::inline_validation();
		Jquery::form();
		
		$data['m'] = $member = CV_Members_Finder::findById($this->c_user);
		$full_name = $member->getFullName();
		$data['page_title'] = "E-grade :: Profile ({$full_name})";
		$data['selected']   = 'account';
		
		$this->load->view('account/index.php',$data);	
	}
	
	function  load_edit_account_form() {
		$data['m'] = $member = CV_Members_Finder::findById($this->c_user);
		$this->load->view('account/includes/edit_account_details_form.php',$data);
	}
	
	function load_update_account_details() {
		if(!empty($_POST)) {
			$member = CV_Members_Finder::findById($this->c_user);
			if($member) {
				$member->setFirstName($_POST['firstname']);
				$member->setMiddleName($_POST['middlename']);
				$member->setLastName($_POST['lastname']);
				$member->setGender($_POST['gender']);
				$member->setBirthDate($_POST['birthdate']);
				$member->setEmailAddress($_POST['email_address']);
				$member->setAddress($_POST['address']);
				$member->setPhoneNumber($_POST['phone_number']);
				$member->setMobileNumber($_POST['mobile_number']);
				$member->save();
				
				$login = CV_Login_Finder::findByMemberId($this->c_user);
				$login->setFullName($member->getFulLName());
				$login->setUsername($_POST['username']);
				$login->setEmailAddress($_POST['email_address']);
				
				if($_POST['password']) { $passhash 	= hash_hmac("sha512",Utilities::encrypt($_POST['password'].ENCRYPTION_KEY),false);	}
				if($passhash) {
					$login->setPassHash($passhash);	
				}
				$login->save();
			}
		}
	}
	
	function  load_account_details() {
		$data['m'] = $member = CV_Members_Finder::findById($this->c_user);
		$this->load->view('account/includes/account_details.php',$data);
	}
	
}
?>