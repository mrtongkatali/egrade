<?php 
class Login extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
	}
	
	function index(){
		$data['next'] = $_GET['next'];
		Loader::style('template.css');
		$this->load->view('login/index.php',$data);	
	}
	
	function check_login() {
		if(!empty($_POST)) {
			$username 		= $_POST['username'];
			$passhash 		= hash_hmac("sha512",Utilities::encrypt($_POST['password'].ENCRYPTION_KEY),false);
			$login 			= CV_Login_Finder::findActiveAccountByUsernameAddressAndPassHash($username,$passhash);

			if($login) {
				$credentials = array("member_id"=>Utilities::encrypt($login->getMemberId()),"account_type"=>Utilities::encrypt($login->getAccountType()));
				$_SESSION['egrade'] = $credentials;

				if(!empty($_POST['next'])) {
					$url = ($_POST['next'] == "/" ? 'home' : $_POST['next']);
					redirect($url);					
				} else {
					redirect('home');
				}
			} else {
				$this->session->set_flashdata('error_login', '1');
				$this->session->set_flashdata('error_message', '<strong>Invalid username or password!</strong>');
				redirect('login');
			}
		}
	}
	
	function member_logout() {
		unset($_SESSION['egrade']);
		redirect('login');
	}

}
?>