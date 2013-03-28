function load_course_list_dt() {
	//$('#course_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'courses/load_course_list_dt',{},
	function(o){
		$('#course_list_dt_wrapper').html(o);
	});
}

function _showAddCourseForm() {
	$('#show_course_form_link').hide();
	$('#course_list_dt_wrapper').hide();
	$('#close_course_form_link').show();
	$('#show_course_form_wrapper').show();
	$('#show_course_form_wrapper').html(loading_message);
	$.post(base_url + 'courses/ajax_add_course_form',{},function(o) {
		$('#show_course_form_wrapper').html(o);
	});
}

function _showEditCourseForm(h_id) {
	$('#show_course_form_link').hide();
	$('#course_list_dt_wrapper').hide();
	$('#close_course_form_link').show();
	$('#show_course_form_wrapper').show();
	$('#show_course_form_wrapper').html(loading_message);
	$.post(base_url + 'courses/ajax_edit_course_form',{h_id:h_id},function(o) {
		$('#show_course_form_wrapper').html(o);
	});
} 


function _closeCourseForm() {
	$('#show_course_form_link').show();
	$('#course_list_dt_wrapper').show();
	$('#close_course_form_link').hide();
	$('#show_course_form_wrapper').hide();
	
	$("#add_course_form").validationEngine('hide');
	$("#edit_course_form").validationEngine('hide');
}

function _showAddCourseDialog() {
	$.post(base_url + 'courses/ajax_add_course_form',{},function(o) {
		$('#add_course_form_modal_wrappper').html(o);
		$('#add_course_form_modal_wrappper').modal();
		
		$('#add_course_form_modal_wrappper').on('hidden', function () {
		  $("#add_course_form").validationEngine('hide');
		})
	});
}

function _editCourseDialog(h_id) {
	$.post(base_url + 'courses/ajax_edit_course_form',{h_id:h_id},function(o) {
		$('#edit_course_form_modal_wrappper').html(o);
		$('#edit_course_form_modal_wrappper').modal();
		
		$('#edit_course_form_modal_wrappper').on('hidden', function () {
		  $("#edit_course_form").validationEngine('hide');
		})
	});
}

function _deleteCourseDialog(h_id) {
	$.post(base_url + 'courses/ajax_delete_course_form',{h_id:h_id},function(o) {
		$('#delete_course_form_modal_wrappper').html(o);
		$('#delete_course_form_modal_wrappper').modal();
	});
}