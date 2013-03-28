<?php 
class Jquery {	


	public static function textboxlist() {
		Loader::style('textboxlist/jquery.textboxlist.css');
		Loader::script('textboxlist/jquery.textboxlist.js');
	}
	
	public static function jq_datatable() {
		Loader::script('jq_datatable/jquery.dataTables.js');
		Loader::style('jq_datatable/demo_table_jui.css');
		Loader::style('jq_datatable/demo_page.css');			
	}
	
	public static function inline_validation() {
		Loader::script('inlinevalidation/jquery.validationEngine-en.js');
		//Loader::script('inlinevalidation/jquery.validationEngine.js');
		Loader::script('inlinevalidation/jquery.validationEngine2.js');
		Loader::style('inlinevalidation/validationEngine.jquery.css');		
	}
	
	public static function jqtransform() {
		Loader::script('jqtransform/jquery.jqtransform.js');
		Loader::style('jqtransform/jqtransform.css');		
	}
	
	public static function tipsy() {
		Loader::script('jquerytipsy/jquery.tipsy.js');
		Loader::style('jquerytipsy/tipsy.css');		
	}
	
	public static function confirm() {
		Loader::style('jqconfirm/jquery.confirm.css');	
		Loader::script('jqconfirm/jquery.confirm.js');
	}
	
	public static function twitter_alert() {
		Loader::script('jqtwitteralert/twitter_alert.js');
	}
	
	public static function jquery_uploadify() {
		Loader::script('uploadify/jquery.uploadify.v2.1.4.min.js');
		Loader::script('uploadify/swfobject.js');
		Loader::style('uploadify/uploadify.css');
	}
	
	public static function form(){
		Loader::script('jqueryform/jquery.form.js');
	}
	
	public static function googletimepicker(){
		Loader::script('jqtimepicker/jquery.timepicker.js');
		Loader::style('jqtimepicker/jquery.timepicker.css');
	}
	
	public static function jquery_calendar()
	{
		Loader::script('jquerycalendar/fullcalendar.min.js');
		Loader::script('jquerycalendar/jquery-ui-1.8.4.custom.min.js');	
		Loader::style('jquerycalendar/fullcalendar.css');
		
	}
	
	public static function autocomplete(){
		Loader::script('jqautocomplete/jquery.autocomplete.js');
		Loader::style('jqautocomplete/jquery.autocomplete.css');
	}
	
	public static function facebox() {
		Loader::style('facebox/facebox.css');
		Loader::script('facebox/facebox.js');
	}
	
	public static function fancybox() {
		Loader::script('jqfancybox/jquery.fancybox.js');
		Loader::style('jqfancybox/jquery.fancybox.css');
	}
	
	public static function jqselect() {
		//Loader::script('jqselect/jquery.js');
		Loader::script('jqselect/Selectyze.jquery.js');
		Loader::script('jqselect/Selectyze.jquery.min.js');
		Loader::style('jqselect/Selectyze.jquery.css');
	}
	
}
?>