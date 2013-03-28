function load_program_list_dt() {
	//$('#program_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'programs/load_program_list_dt',{},
	function(o){
		$('#program_list_dt_wrapper').html(o);
	});
}

function _showAddProgram() {
	$('#show_program_form_link').hide();
	$('#program_list_dt_wrapper').hide();
	$('#close_program_form_link').show();
	$('#show_program_form_wrapper').show();
	$('#show_program_form_wrapper').html(loading_message);
	$.post(base_url + 'programs/ajax_add_program_form',{},function(o) {
		$('#show_program_form_wrapper').html(o);
	});
}

function _showEditProgramForm(h_id) {
	$('#show_program_form_link').hide();
	$('#program_list_dt_wrapper').hide();
	$('#close_program_form_link').show();
	$('#show_program_form_wrapper').show();
	$('#show_program_form_wrapper').html(loading_message);
	$.post(base_url + 'programs/ajax_edit_program_form',{h_id:h_id},function(o) {
		$('#show_program_form_wrapper').html(o);
	});
} 


function _closeProgramForm() {
	$('#show_program_form_link').show();
	$('#program_list_dt_wrapper').show();
	$('#close_program_form_link').hide();
	$('#show_program_form_wrapper').hide();
	
	$("#add_program_form").validationEngine('hide');
	$("#edit_course_form").validationEngine('hide');
}

function _deleteProgramDialog(h_id) {
	$.post(base_url + 'programs/ajax_delete_program_form',{h_id:h_id},function(o) {
		$('#delete_program_form_modal_wrapper').html(o);
		$('#delete_program_form_modal_wrapper').modal();
	});
}