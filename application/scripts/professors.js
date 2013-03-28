function load_professor_list_dt() {
	//$('#course_list_dt_wrapper').html(loading_message);
	$('#professor_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'professors/load_professor_list_dt',{},
	function(o){
		$('#professor_list_dt_wrapper').html(o);
	});
}

function _showAddProfessorForm() {
	$('#professor_list_dt_wrapper').hide();
	$('#show_professor_form').hide();
	$('#close_professor_form').show();
	$('#show_professor_form_wrapper').show();
	$.post(base_url + 'professors/ajax_add_professor_form',{},function(o) {
		$('#show_professor_form_wrapper').html(o);
		//$('#add_professor_form_modal_wrappper').modal();
	});
}

function closeAddProfessorForm() {
	$('#professor_list_dt_wrapper').show();
	$('#show_professor_form').show();
	$('#close_professor_form').hide();
	$('#show_professor_form_wrapper').hide();
	$("#add_professor_form").validationEngine('hide');
}

function _showEditProfessorForm(h_id) {
	$('#show_professor_form_wrapper').show();
	$('#close_professor_form').show();
	$('#show_professor_form').hide();
	$('#professor_list_dt_wrapper').hide();
	$('#show_professor_form_wrapper').html(loading_message);
	$.post(base_url + 'professors/ajax_edit_professor_form',{h_id:h_id},function(o) {
		$('#show_professor_form_wrapper').html(o);
		//$('#add_professor_form_modal_wrappper').modal();
	});
}


function _deleteProfessorDialog(h_id) {
	$.post(base_url + 'professors/ajax_delete_professor_form',{h_id:h_id},function(o) {
		$('#delete_professor_form_modal_wrappper').html(o);
		$('#delete_professor_form_modal_wrappper').modal();
	});
}