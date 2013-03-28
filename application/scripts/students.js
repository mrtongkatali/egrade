function load_student_list_dt() {
	//$('#course_list_dt_wrapper').html(loading_message);
	$('#student_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'students/load_student_list_dt',{},
	function(o){
		$('#student_list_dt_wrapper').html(o);
	});
}

function _showAddStudentForm() {
	$('#show_student_form').hide();
	$('#student_list_dt_wrapper').hide();
	$('#close_student_form').show();
	$('#show_student_form_wrapper').show();
	$.post(base_url + 'students/ajax_add_student_form',{},function(o) {
		$('#show_student_form_wrapper').html(o);
		//$('#add_student_form_modal_wrappper').modal();
	});
}

function closeAddStudentForm() {
	$('#show_student_form').show();
	$('#student_list_dt_wrapper').show();
	$('#close_student_form').hide();
	$('#show_student_form_wrapper').hide();
	$("#add_student_form").validationEngine('hide');
}

function _showEditStudentForm(h_id) {
	$('#show_student_form').hide();
	$('#student_list_dt_wrapper').hide();
	$('#show_student_form_wrapper').show();
	$('#close_student_form').show();
	$('#show_student_form_wrapper').html(loading_message);
	$.post(base_url + 'students/ajax_edit_student_form',{h_id:h_id},function(o) {
		$('#show_student_form_wrapper').html(o);
		//$('#add_student_form_modal_wrappper').modal();
	});
}


function _deleteStudentDialog(h_id) {
	$.post(base_url + 'students/ajax_delete_student_form',{h_id:h_id},function(o) {
		$('#delete_student_form_modal_wrappper').html(o);
		$('#delete_student_form_modal_wrappper').modal();
	});
}