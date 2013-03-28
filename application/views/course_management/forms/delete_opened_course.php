<script>
	$(function() {
		$('#delete_opened_course_form').ajaxForm({
			success:function(o) {
				$('#delete_opened_course_modal_wrapper').modal('toggle');
				$('#delete_opened_course_modal_wrapper').html("");
				load_opened_course_list_dt();
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Course? </h3>
</div>
<div class="modal-body">
<form id="delete_opened_course_form" name="delete_opened_course_form" method="post" action="<?php echo url('course_management/load_delete_opened_course'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($cd->getId()); ?>" />
Warning! All enrolled students from the list will be canceled. Are you sure you want to delete <b>'<?php echo $cd->getCourseTitle(); ?>'</b> from the list?

</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger submit_button" onclick="$('#delete_opened_course_form').submit();">Delete</button>
</div>

</form>