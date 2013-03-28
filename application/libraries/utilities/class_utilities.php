<?php 
/*Updated: January 5,2012
* By Marvin Dungog
*
*/

class Utilities {


	public function __construct($id) {
		$this->id = $id;
		self::getObjectVariable();
	}
	
	
	public static function createFormToken() {
		//$token =  md5(uniqid(rand(), true));
		$token = md5(microtime(TRUE) . rand(0, 100000));
		
		$_SESSION['user']['ft'] = $token;
		$_SESSION['user']['ft_expires'] = time() + 1800;
		//$session = new WG_Session(array('namespace' => 'user'));
		//$session->set('ft', $token);
		//$session->set('ft_expires', time() + 1800);	//expires in 30 mins
		
		return $token;
	}
	
		
	public static function verifyFormToken($token='') {
		$supplied_token = $token;
		
		// Ensure that a token has been previously set.
		if (!isset($_SESSION['user']['ft'], $_SESSION['user']['ft_expires']))
		{
			include('application/errors/error_500.php');
			die ();
		}
		
		$token = $_SESSION['user']['ft'];
		$expires = $_SESSION['user']['ft_expires'];
		
		// Clear the tokens, they are single use.
		$_SESSION['user']['ft'] = NULL;
		$_SESSION['user']['ft_expires'] = 0;			
		
		if ($expires < time() || $token != $supplied_token)
		{
			include('application/errors/error_500.php');
			die ();
		}
	}
	
	public static function isFormTokenValid($token='') {
		$supplied_token = $token;
		$return = true;
		// Ensure that a token has been previously set.
		if (!isset($_SESSION['user']['ft'], $_SESSION['user']['ft_expires']))
		{
			//include APP_PATH . 'errors/500.php';
			//die ();
			$return = false;
		}
		
		$token = $_SESSION['user']['ft'];
		$expires = $_SESSION['user']['ft_expires'];
		
		// Clear the tokens, they are single use.
		$_SESSION['user']['ft'] = NULL;
		$_SESSION['user']['ft_expires'] = 0;			
		
		if ($expires < time() || $token != $supplied_token)
		{
			//include APP_PATH . 'errors/500.php';
			//die ();
			$return = false;
		}
		
		return $return;
	}
	
	public static function createPageToken() {
		$token = md5(microtime(TRUE) . rand(0, 100000));
		$session = new WG_Session(array('namespace' => 'user'));
		$session->set('pt', $token);
		//$session->set('pt_expires', time() + 1800);	//expires in 30 mins
		
		return $token;
	}
	
	public static function verifyPageToken() {
		$supplied_token = $token;
		
		// Ensure that a token has been previously set.
		if (!isset($_SESSION['user']['ft'], $_SESSION['user']['fk_expires']))
		{
			die ('token is required!');
		}
		
		$token = $_SESSION['user']['action_token'];
		$expires = $_SESSION['user']['token_expires'];
		
		// Clear the tokens, they are single use.
		$_SESSION['user']['ft'] = NULL;
		$_SESSION['user']['ft_expires'] = 0;			
		
		if ($expires < time() || $token != $supplied_token)
		{
			include APP_PATH . 'errors/500.php';
			die ();
		}
	}
	
	//if you want to secure your ajax request
	function ajaxRequest() {
		if($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
		 //Request identified as ajax request
			include APP_PATH . 'errors/500.php';
			die();
		}
	
	}
	
	function verifyObject($object)
	{
		 if (!is_object($object)) {
			include APP_PATH . 'errors/500.php';
			exit;
   		 }	
	}
	
	function isObject($object)
	{
		 if (!is_object($obj)) {
			$return  = false;
   		 }else {
			$return = true; 
			}
		return $return;
	}
	
	public static function encrypt($text) {
		$crypt = new Crypt;
		return $crypt->encrypt($text);
	}
	
	public static function decrypt($text) {
		$crypt = new Crypt;
		return $crypt->decrypt($text);
	}
	
	public static function encryptPassword($text) {
		$crypt = new Crypt;
		return $crypt->encrypt_string($text);
	}
	
	public static function createHash($text) {
		$crypt = new Crypt;
		return $crypt->createHash($text);	
	}
	
	public static function verifyHash($text,$hash) {
		$crypt = new Crypt;
		if(!$crypt->verifyHash($text,$hash)) {
			include('application/errors/error_500.php');
			die();	
		}	
	}
	
	public static function error500() {
		include APP_PATH . 'errors/500.php';
		die();
	}
	
	public static function verifyAccess($account_type="",$module="") {
		if($account_type == ADMIN) {
			$array = array(
				'students' => true,
				'professors' => true,
				'course_management' => true,
				'grade_management' => true,
				'courses' => true,
				'programs' => true,
				'colleges' => true,
				'curriculum' => true,
				'user_accounts' => true
			);
			
		} else if($account_type == STUDENT) {
			$array = array(
				'students' => false,
				'professors' => false,
				'course_management' => false,
				'grade_management' => true,
				'courses' => false,
				'programs' => false,
				'colleges' => false,
				'curriculum' => false,
				'user_accounts' => false
			);
		}
		
		if($array[$module] != true) {
			#include('application/errors/error_access_rights.php');
			#die();
		}
	}

	
}
?>