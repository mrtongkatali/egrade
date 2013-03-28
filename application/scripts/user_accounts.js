function load_user_accounts_list_dt() {
	$('#user_accounts_list_dt_wrapper').html(loading_message);
	$.get(base_url + 'user_accounts/load_user_accounts_list_dt',{},
	function(o){
		$('#user_accounts_list_dt_wrapper').html(o);
	});
}

function _showAddUserAccountForm() { //for non-modal form
	$('#show_user_account_form').hide();
	$('#close_user_account_form').show();
	$('#show_user_account_form_wrapper').show();
	$.post(base_url + 'user_accounts/ajax_add_user_account_form',{},function(o) {
		$('#show_user_account_form_wrapper').html(o);
		//$('#add_student_form_modal_wrappper').modal();
	});
}

function closeAddUserAccountForm() { //for non-modal form
	$('#show_user_account_form').show();
	$('#close_user_account_form').hide();
	$('#show_user_account_form_wrapper').hide();
	$("#add_user_account_form").validationEngine('hide');
}

function _addUserAccountDialog() { //for modal form
	$.post(base_url + 'user_accounts/ajax_add_user_account_form',{},function(o) {
		$('#add_user_account_form_modal_wrappper').html(o);
		$('#add_user_account_form_modal_wrappper').modal();
		
		$('#add_user_account_form_modal_wrappper').on('hidden', function () {
		  $("#add_user_account_form").validationEngine('hide');
		})
	});
}

function _editUserAccountDialog(h_id) { //for modal form
	$.post(base_url + 'user_accounts/ajax_edit_user_account_form',{h_id:h_id},function(o) {
		$('#edit_user_account_form_modal_wrappper').html(o);
		$('#edit_user_account_form_modal_wrappper').modal();
		
		$('#edit_user_account_form_modal_wrappper').on('hidden', function () {
		  $("#edit_user_account_form").validationEngine('hide');
		})
	});
}

function _deleteUserAccount(h_id) {
	$.post(base_url + 'user_accounts/load_delete_user_account_form',{h_id:h_id},function(o) {
		$('#delete_user_account_form_modal_wrappper').html(o);
		$('#delete_user_account_form_modal_wrappper').modal();
	});
}





