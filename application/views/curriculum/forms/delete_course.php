<script>
	$(function() {
		$('#delete_curriculum_form').ajaxForm({
			success:function(o) {
				$('#delete_curriculum_form_modal_wrappper').modal('toggle');
				$('#delete_curriculum_form_modal_wrappper').html("");
				load_curriculum_list();
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
<form id="delete_curriculum_form" name="delete_curriculum_form" method="post" action="<?php echo url('curriculum/ajax_delete_course'); ?>">
<?php $course = CV_Courses_Finder::findById($curriculum->getCourseId()); ?>
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($curriculum->getId()); ?>" />
Are you sure you want to delete <b>'<?php echo $course->getCourseCode() . ' : ' . $course->getTitle(); ?>'</b> from the list?

</div>
<div class="modal-footer">
	<button class="btn btn-danger submit_button" onclick="$('#delete_curriculum_form').submit();"><i class="icon-trash icon-white"></i> Delete</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>

</form>