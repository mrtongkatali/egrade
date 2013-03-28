<?php 
class User_Accounts extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		 $this->member_session_check();
		 
		 $h_school_id 		= Utilities::encrypt(1);
		 $this->school_id 	= Utilities::decrypt($h_school_id);
		 $this->c_date 		= Tools::getCurrentDateTime('Y-m-d H:i:s');
		 
		 $this->user_access = Utilities::decrypt($_SESSION['egrade']['account_type']);
		 Utilities::verifyAccess($this->user_access,'user_accounts');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('user_accounts.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		Jquery::textboxlist();
		$data['page_title'] = 'E-grade :: User Accounts';
		$data['selected']   = 'user_accounts';
		
		$this->load->view('user_accounts/index.php',$data);
	}
	
	function load_user_accounts_list_dt() {
		$this->load->view('user_accounts/user_accounts_list_dt.php');
	}
	
	function load_server_users_accounts_list_dt() {
		Utilities::ajaxRequest();
		
		$condition =  ' is_active 		= ' . Model::safeSql(CV_Members::YES);
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_LOGIN);
		$dt->setCustomField();
		$dt->setJoinTable();			
		$dt->setJoinFields();
		$dt->setCondition($condition);
		$dt->setColumns('full_name,username,account_type,is_active');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"Edit\" id=\"edit\" class=\"ui-icon ui-icon-pencil g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_editUserAccountDialog(\'e_id\');\"></a></li><li><a title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-trash g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_deleteUserAccount(\'e_id\')\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function ajax_add_user_account_form() {
		$this->load->view('user_accounts/forms/add_user_account.php',$data);
	}

	function ajax_get_users_autocomplete() {
		$q = Model::safeSql(strtolower($_GET["search"]), false);
		
		if ($q != '') {
			$users = CV_Members_Finder::searchByNameOrEmailOrCode($q);

			foreach ($users as $u) {
				$response[] = array(Utilities::encrypt($u->getId()), $u->getFullName(), null);
			}
		}
		
		if(count($response) == 0) {
			$response = '';
		}
		header('Content-type: application/json');
		echo json_encode($response);		
	}
	
	function ajax_get_login_info() {
		if(!empty($_POST)) {
			$id = Utilities::decrypt($_POST['h_id']);
			$member = CV_Members_Finder::findById($id);
			if($member) {
				$login = CV_Login_Finder::findByMemberId($id);
				if($login) {
					$json['username'] 		= $login->getUserName();
					$json['account_type']	= $login->getAccountType();
				} else {
					$json['username']		= strtolower(str_replace(" ","",$member->getFirstName() . '.' . $member->getLastName()).date('si').$member->getId());
					$json['account_type']	= ADMIN;
				}
				$json['is_exists'] = true;
			} else {
				$json['is_exists'] = false;
			}
			
			echo json_encode($json);
		}
	}
	
	function ajax_insert_update_user() {
		if(!empty($_POST)) {
			if($_POST['password']) { $passhash 	= hash_hmac("sha512",Utilities::encrypt($_POST['password'].ENCRYPTION_KEY),false);	}
			$member_id	= Utilities::decrypt($_POST['h_member_id']);
			
			if($_POST['h_id']) {
				$id = Utilities::decrypt($_POST['h_id']);
				$l = CV_Login_Finder::findById($id);				
			} else {
				$l = CV_Login_Finder::findByMemberId($member_id);
				if(!$l) {
					$l =  new CV_Login();	
				}	
			}
			
			$member = CV_Members_Finder::findById($member_id);
			$l->setMemberId($member_id);
			$l->setFullName($member->getFullName());
			$l->setUsername($_POST['username']);
			if($passhash) {
				$l->setPassHash($passhash);	
			}
			
			$l->setAccountType($_POST['account_type']);
			$l->setIsActive(CV_Login::YES);
			$l->setDateAdded($this->c_date);
			$l->save();
		}
	}
	
	function check_username_if_exists() {
		if(!empty($_POST)) {
			$member_id = Utilities::decrypt($_POST['h_id']);
			$login = CV_Login_Helper::checkIfUserNameExists($member_id,$_POST['username']);
			$json['is_available'] = ($login ? false : true);
			echo json_encode($json);
		}
	}
	
	function ajax_edit_user_account_form() {
		$id = Utilities::decrypt($_POST['h_id']);
		$data['a'] = $a = CV_Login_Finder::findById($id);
		$this->load->view('user_accounts/forms/edit_user_account.php',$data);
	}
	
	function load_delete_user_account_form() {
		if(!empty($_POST)) {
			$id = Utilities::decrypt($_POST['h_id']);
			$data['a'] = $a = CV_Login_Finder::findById($id);
			$this->load->view('user_accounts/forms/delete_user_account.php',$data);
		}
	}
	
	function load_delete_user_account() {
		if(!empty($_POST)) {
			$id = Utilities::decrypt($_POST['h_id']);
			$a = CV_Login_Finder::findById($id);
			$a->delete();
		}
	}
}
?>