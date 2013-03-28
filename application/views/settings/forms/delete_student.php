<script>
	$(function() {
		$('#delete_student_form').ajaxForm({
			success:function(o) {
				$('#delete_student_form_modal_wrappper').modal('toggle');
				$('#delete_student_form_modal_wrappper').html("");
				load_student_list_dt();
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
<form id="delete_student_form" name="delete_student_form" method="post" action="<?php echo url($action_url); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($student->getId()); ?>" />
Are you sure you want to delete <b>'<?php echo $student->getFullName(); ?>'</b> from the list?

</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger submit_button" onclick="$('#delete_student_form').submit();">Delete</button>
</div>

</form>