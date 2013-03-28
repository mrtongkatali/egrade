function load_enrollee_list_dt(h_course_designation_id) {
	$('#enrollee_list_dt_wrapper').html(loading_message);
	$.post(base_url + 'grade_management/load_enrollee_list_dt',{h_course_designation_id:h_course_designation_id},
	function(o){
		$('#enrollee_list_dt_wrapper').html(o);
	});
}

function _gradingSheetDialog(h_id) {
	$.post(base_url + 'grade_management/load_grading_sheet_form',{h_id:h_id},function(o) {
		$('#grading_sheet_modal_wrapper').html(o);
		$('#grading_sheet_modal_wrapper').modal();
		
		$('#grading_sheet_modal_wrapper').on('hidden', function () {
		  $("#grading_sheet_form").validationEngine('hide');
		})
	});
}

function load_student_grades_list() {
	var school_year = $('#school_year').val();
	var semester = $('#semester').val();
	$('#student_grade_list_wrapper').html(loading_message);
	$.post(base_url + 'grade_management/load_student_grade',{school_year:school_year,semester:semester},function(o) {
		$('#student_grade_list_wrapper').html(o);
	});
	
}

function load_download_grade() {
	var school_year = $('#school_year').val();
	var semester = $('#semester').val();
	$.post(base_url + 'grade_management/load_download_grade_list',{school_year:school_year,semester:semester},function(o) {
		$('#student_grade_list_wrapper').html(o);
	});
	
}


function load_course_list_dt() {
	$('#all_courses_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'grade_management/load_course_list_dt',{},
	function(o){
		$('#all_courses_list_dt_wrapper').html(o);
	});
}