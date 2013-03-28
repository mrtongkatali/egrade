<?php 
class Benchmark extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();
	}
	
	function index(){
		Loader::style('template.css');
		$this->load->view('benchmark/index.php');
	}
}
?>