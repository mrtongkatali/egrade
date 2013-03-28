<?php 
class Twitter_Bootstrap {
	
	public static function js_all() {
		Loader::script('bootstrap/alert.js');
		Loader::script('bootstrap/typeahead.js');
		Loader::script('bootstrap/transition.js');
		Loader::script('bootstrap/tooltip.js');
		Loader::script('bootstrap/tab.js');
		Loader::script('bootstrap/scrollspy.js');
		Loader::script('bootstrap/popover.js');
		Loader::script('bootstrap/modal.js');
		Loader::script('bootstrap/dropdown.js');
		Loader::script('bootstrap/collapse.js');
		Loader::script('bootstrap/alert.js');
		Loader::script('bootstrap/button.js');
	}
	
	public static function button() {
		Loader::script('bootstrap/button.js');
	}
	
	public static function modal() {
		Loader::script('bootstrap/modal.js');
	}
	
}


?>