<script>
	$(function() {
		$('#delete_program_form').ajaxForm({
			success:function(o) {
				$('#delete_program_form_modal_wrapper').modal('toggle');
				$('#delete_program_form_modal_wrapper').html("");
				load_program_list_dt();
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Course</h3>
</div>
<div class="modal-body">
<form id="delete_program_form" name="delete_program_form" method="post" action="<?php echo url('programs/ajax_delete_program'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($program->getId()); ?>" />
Are you sure you want to delete <b>'<?php echo $program->getTitle(); ?>'</b> from the list?

</div>
<div class="modal-footer">
	<button class="btn btn-danger submit_button" onclick="$('#delete_program_form').submit();"><i class="icon-trash icon-white"></i> Delete</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>

</form>