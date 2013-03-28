<script>
	$(function() {
		$('#delete_course_form').ajaxForm({
			success:function(o) {
				$('#delete_course_form_modal_wrappper').modal('toggle');
				$('#delete_course_form_modal_wrappper').html("");
				load_course_list_dt();
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
<form id="delete_course_form" name="delete_course_form" method="post" action="<?php echo url($action_url); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($course->getId()); ?>" />
Are you sure you want to delete <b>'<?php echo $course->getTitle(); ?>'</b> from the list?

</div>
<div class="modal-footer">
	<button class="btn btn-danger submit_button" onclick="$('#delete_course_form').submit();"><i class="icon-trash icon-white"></i> Delete</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>

</form>