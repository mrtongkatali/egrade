function load_course_page() {
	$('#courses_page_wrapper').html(loading_message);
	$.get(base_url + 'courses_management/load_course_list_dt',{},
	function(o){
		$('#courses_page_wrapper').html(o);
	});
}

function load_curriculum_list() {
	var h_program_id = $('#h_program_id_filter').val();
	var batch_year = $('#batch_year_filter').val();
	$('#curriculum_list_dt_wrapper').show();
	$('#enrollee_list_dt_wrapper').html(loading_message);
	$.post(base_url + 'course_management/load_curriculum_list',{h_program_id:h_program_id,batch_year:batch_year},function(o) {
		$('#curriculum_list_dt_wrapper').html(o);
	});
}

function load_opened_course_list_dt() {
	$('#course_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'course_management/load_opened_course_list_dt',{},
	function(o){
		$('#course_list_dt_wrapper').html(o);
	});
}

function _openCourse() {
	
	$('#curriculum_list_dt_wrapper').hide();
	$('#view_curriculum_filter').hide();
	
	$('#menu-container').hide();
	$('#open_course_button').hide();
	$('#course_list_dt_wrapper').hide();
	$('#open_course_form_wrapper').show();
	$('#open_course_form_wrapper').html(loading_message);
	$.get(base_url + 'course_management/load_open_course_form',{},
	function(o){
		$('#open_course_form_wrapper').html(o);
	});
}

function closeCourseForm() {
	
	if(filter_type  == 1) {
		$('#curriculum_list_dt_wrapper').show();
		$('#view_curriculum_filter').show();
	}
	
	$('#menu-container').show();
	$('#open_course_button').show();
	$('#course_list_dt_wrapper').show();
	$('#open_course_form_wrapper').hide();
	$("#open_course_form").validationEngine('hide');
	$("#edit_opened_course_form").validationEngine('hide');
}

function _editOpenedCourseDialog(h_id) {
	$.post(base_url + 'course_management/load_edit_opened_course_form',{h_id:h_id},function(o) {
		$('#edit_opened_course_modal_wrapper').html(o);
		$('#edit_opened_course_modal_wrapper').modal();
		
		$('#edit_opened_course_modal_wrapper').on('hidden', function () {
		  $("#edit_opened_course_form").validationEngine('hide');
		})
	});
}

function _deleteOpenedCourseDialog(h_id) {
	$.post(base_url + 'course_management/load_delete_opened_course_form',{h_id:h_id},function(o) {
		$('#delete_opened_course_modal_wrapper').html(o);
		$('#delete_opened_course_modal_wrapper').modal();
	});
}


function load_course_available_section_dropdown() {
	var h_opened_course_id = $('#h_opened_course_id').val();
	$('#course_available_section_wrapper').html(loading_message);
	$.post(base_url + 'course_management/load_course_available_section_dropdown',{h_opened_course_id:h_opened_course_id},
	function(o){
		$('#course_available_section_wrapper').html(o);
	});
}

function _openCourseViaCurriculumDialog(h_program_id,h_course_id) {	
	$.post(base_url + 'course_management/load_open_course_modal_form',{h_program_id:h_program_id,h_course_id:h_course_id},function(o) {
		$('#open_course_modal_wrapper').html(o);
		$('#open_course_modal_wrapper').modal();
		
		$('#open_course_modal_wrapper').on('hidden', function () {
		  $("#edit_opened_course_form").validationEngine('hide');
		})
	});
}

function _addEnrolleesForm() {
	$('#add_enrollees_form_wrapper').show();
	$('#enrollee_list_dt_wrapper').hide();
	$('#enrollees_menu_wrapper').hide();
	$.post(base_url + 'course_management/load_add_enrollees_form',{},function(o) {
		$('#add_enrollees_form_wrapper').html(o);
	});
}

function _closeAddEnrolleeForm() {
	$('#add_enrollees_form_wrapper').hide();
	$('#enrollees_menu_wrapper').show();
	$('#enrollee_list_dt_wrapper').show();
}

function load_enrollee_list_dt() {
	var h_available_section_id = $('#h_available_section_id').val();
	if(h_available_section_id) {
		$('#enrollee_list_dt_wrapper').show();
		$('#enrollee_list_dt_wrapper').html(loading_message);
		$.post(base_url + 'course_management/load_enrollee_list_dt',{},function(o) {
			$('#enrollee_list_dt_wrapper').html(o);
		});
	}
	
}

function _deleteEnrolleeDialog(h_id) {
	$.post(base_url + 'course_management/load_delete_enrollee_form',{h_id:h_id},function(o) {
		$('#delete_enrollee_modal_wrapper').html(o);
		$('#delete_enrollee_modal_wrapper').modal();
	});
}

