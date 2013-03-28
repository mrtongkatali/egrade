<script>
	$(function() {
		$('#delete_college_form').ajaxForm({
			success:function(o) {
				$('#delete_college_form_modal_wrapper').modal('toggle');
				$('#delete_college_form_modal_wrapper').html("");
				load_college_list_dt();
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
<form id="delete_college_form" name="delete_college_form" method="post" action="<?php echo url('colleges/ajax_delete_college'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($c->getId()); ?>" />
Are you sure you want to delete <b>'<?php echo $c->getCollegeName(); ?>'</b> from the list?

</div>
<div class="modal-footer">
	<button class="btn btn-danger submit_button" onclick="$('#delete_college_form').submit();"><i class="icon-trash icon-white"></i> Delete</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>

</form>