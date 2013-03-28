function load_curriculum_list() {
	var h_program_id 	= $("#h_program_id").val();
	var batch_year 		= $("#batch_year").val();
	var year_level 		= $("#year_level").val();
	var semester 		= $("#semester").val();
	
	if(h_program_id != '') {
		$('#curriculum_list_wrapper').html(loading_message);
		$.post(base_url + 'curriculum/load_curriculum_list',{h_program_id:h_program_id,batch_year:batch_year,year_level:year_level,semester:semester},function(o) {
			$('#curriculum_list_wrapper').html(o);
		});
	}
}

function _showAddStudentForm() {
	$('#add_curriculum_form_button').hide();
	$('#action_button_holder').hide();
	$('#curriculum_list_wrapper').hide();
	$('#close_curriculum_form_button').show();
	$('#curriculum_form_wrapper').show();
	$.post(base_url + 'curriculum/ajax_add_curriculum_form',{},function(o) {
		$('#curriculum_form_wrapper').html(o);
	});
}

function closeCurriculumForm() {
	$('#add_curriculum_form_button').show();
	$('#action_button_holder').show();
	$('#curriculum_list_wrapper').show();
	$('#close_curriculum_form_button').hide();
	$('#curriculum_form_wrapper').hide();
	$("#add_curriculum_form_button").validationEngine('hide');
}


function _deleteCourseDialog(h_id) {
	$.post(base_url + 'curriculum/ajax_delete_course_form',{h_id:h_id},function(o) {
		$('#delete_course_form_modal_wrappper').html(o);
		$('#delete_course_form_modal_wrappper').modal();
	});
}

function _viewCourseDescriptionDialog(h_id) {
	$.post(base_url + 'curriculum/ajax_view_course_description',{h_id:h_id},function(o) {
		$('#view_course_description_form_modal_wrapper').html(o);
		$('#view_course_description_form_modal_wrapper').modal();
	});
}









