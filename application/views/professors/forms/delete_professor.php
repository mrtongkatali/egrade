<script>
	$(function() {
		$('#delete_professor_form').ajaxForm({
			success:function(o) {
				$('#delete_professor_form_modal_wrappper').modal('toggle');
				$('#delete_professor_form_modal_wrappper').html("");
				load_student_list_dt();
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Professor? </h3>
</div>
<div class="modal-body">
<form id="delete_professor_form" name="delete_professor_form" method="post" action="<?php echo url('professors/ajax_delete_professors'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($student->getId()); ?>" />
Are you sure you want to delete <b>'<?php echo $student->getFullName(); ?>'</b> from the list?

</div>
<div class="modal-footer">
	<button class="btn btn-danger submit_button" onclick="$('#delete_professor_form').submit();"><i class="icon-trash icon-white"></i> Delete</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>

</form>