<?php
/*
	Modified by: Leo Diaz (leoangelo.diaz@gmail.com);
	CodeBvggy Framework
	06-27-2012

	*Do not change the code*
	
	
	Last Modified on : 11/11/12
*/
Loader::engineLoader();

class Loader {
	public static $script_files;
	public static $class_files;
	public static $styles;
	
	public static function engineLoader() {
		self::$class_files = scandir('application/libraries/object');
		foreach(array_unique(self::$class_files) as $cf): $file = substr($cf,-3); ($file == "php" ? include_once('application/libraries/object/'.$cf) : ''); endforeach;
		/*self::$class_files = scandir('application/libraries/system');
		foreach(array_unique(self::$class_files) as $cf): $file = substr($cf,-3); ($file == "php" ? include_once('application/libraries/system/'.$cf) : ''); endforeach;*/
		self::$class_files = scandir('application/libraries/utilities');
		foreach(array_unique(self::$class_files) as $cf): $file = substr($cf,-3); ($file == "php" ? include_once('application/libraries/utilities/'.$cf) : '');endforeach;
	}
	
	public static function script($script) {self::$script_files[] = BASE_FOLDER . 'application/scripts/'.$script; }
	public static function style($style) {self::$styles[] = BASE_FOLDER . 'application/themes' . THEME_FOLDER . $style;	}

	public static function get() {
		Loader::script('generic/jquery.block.ui.js');
		echo '<script> var base_url = "' . BASE_FOLDER .'index.php/' . '"; var base_folder = "' . BASE_FOLDER . '"; var theme = "' . THEME_FOLDER . '";</script>';
		foreach(array_unique(self::$script_files) as $sf): echo '<script type="text/javascript" src="'.$sf.'"></script>'; endforeach;
		foreach(array_unique(self::$styles) as $s): echo '<link rel="stylesheet" type="text/css" href="'. $s . '" />'; endforeach;
	}
	
	public static function appTools($library_file) {
		$path = 'application/libraries/utilities/';
		if(is_file($path.$library_file)) {
			include_once($path.$library_file);
		}	
	}
}

?>
