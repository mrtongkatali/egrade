function load_college_list_dt() {
	//$('#college_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'colleges/load_college_list_dt',{},
	function(o){
		$('#college_list_dt_wrapper').html(o);
	});
}

function _showAddCollege() {
	$('#show_college_form_link').hide();
	$('#college_list_dt_wrapper').hide();
	$('#close_college_form_link').show();
	$('#show_college_form_wrapper').show();
	$('#show_college_form_wrapper').html(loading_message);
	$.post(base_url + 'colleges/ajax_add_college_form',{},function(o) {
		$('#show_college_form_wrapper').html(o);
	});
}

function _showEditProgramForm(h_id) {
	$('#show_college_form_link').hide();
	$('#college_list_dt_wrapper').hide();
	$('#close_college_form_link').show();
	$('#show_college_form_wrapper').show();
	$('#show_college_form_wrapper').html(loading_message);
	$.post(base_url + 'colleges/ajax_edit_college_form',{h_id:h_id},function(o) {
		$('#show_college_form_wrapper').html(o);
	});
} 


function _closeCollegeForm() {
	$('#show_college_form_link').show();
	$('#college_list_dt_wrapper').show();
	$('#close_college_form_link').hide();
	$('#show_college_form_wrapper').hide();
	
	$("#add_college_form").validationEngine('hide');
	$("#edit_course_form").validationEngine('hide');
}

function _deleteCollegeDialog(h_id) {
	$.post(base_url + 'colleges/ajax_delete_college_form',{h_id:h_id},function(o) {
		$('#delete_college_form_modal_wrapper').html(o);
		$('#delete_college_form_modal_wrapper').modal();
	});
}