<script>
	$(function() {
		$('#delete_user_account_form').ajaxForm({
			success:function(o) {
				$('#delete_user_account_form_modal_wrappper').modal('toggle');
				$('#delete_user_account_form_modal_wrappper').html("");
				load_user_accounts_list_dt();
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Student Student? </h3>
</div>
<div class="modal-body">
<form id="delete_user_account_form" name="delete_user_account_form" method="post" action="<?php echo url('user_accounts/load_delete_user_account'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($a->getId()); ?>" />
Are you sure you want to delete <b>'<?php echo $a->getFullName(); ?>'</b> account from the list?

</div>
<div class="modal-footer">
	<button class="btn btn-danger submit_button" onclick="$('#delete_user_account_form').submit();"><i class="icon-trash icon-white"></i> Delete</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>

</form>