<script>
	$(function() {
		$('#delete_enrollee_form').ajaxForm({
			success:function(o) {
				$('#delete_enrollee_modal_wrapper').modal('toggle');
				$('#delete_enrollee_modal_wrapper').html("");
				load_enrollee_list_dt();
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Enrollee? </h3>
</div>
<div class="modal-body">
<form id="delete_enrollee_form" name="delete_enrollee_form" method="post" action="<?php echo url('course_management/load_delete_enrollee'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($ce->getId()); ?>" />
Are you sure you want to delete <b><?php echo $ce->getStudentName(); ?></b> in the enrollee list?

</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger submit_button" onclick="$('#delete_enrollee_form').submit();">Delete</button>
</div>

</form>