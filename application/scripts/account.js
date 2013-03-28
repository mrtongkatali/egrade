function load_edit_account_details_form() {
	
	$('#edit_account_details_form_wrapper').show();
	$('#update_button_wrapper').show();
	$('#account_details_wrapper').hide();
	$('#edit_button_wrapper').hide();
	
	$.post(base_url + 'account/load_edit_account_form',{},
	function(o){
		$('#edit_account_details_form_wrapper').html(o);
	});
}

function show_account_details() {
	$('#edit_account_details_form_wrapper').hide();
	$('#update_button_wrapper').hide();
	$('#account_details_wrapper').show();
	$('#edit_button_wrapper').show();
	
	$.post(base_url + 'account/load_account_details',{},
	function(o){
		$('#account_details_wrapper').html(o);
	});
}

function close_edit_account_details_form() {
	$('#edit_account_details_form_wrapper').hide();
	$('#update_button_wrapper').hide();
	$('#account_details_wrapper').show();
	$('#edit_button_wrapper').show();
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