<script>
	$(function() {
		$("#grading_sheet_form").validationEngine({scroll:false});
		$('#grading_sheet_form').ajaxForm({
			success:function(o) {
				$('#grading_sheet_modal_wrapper').modal('toggle');
				$('#grading_sheet_modal_wrapper').html("");
				load_opened_course_list_dt();
			}
		});
	});
	
</script>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Grading Sheet</h3>
</div>
<div class="form_content_wrapper">

<form id="grading_sheet_form" name="grading_sheet_form" method="post" action="<?php echo url('course_management/insert_update_open_course'); ?>">
<table width="100%" border="0">
	<thead>
    <tr>
        <th width="150">Pre Final Grade</th>
        <th width="15">Final Exam Grade</th>
        <th width="150">Final Grade</th>
    </tr>
    </thead>
    <tr>
        <td align="center" valign="top"><input type="text" id="pre_final_grade" name="pre_final_grade" size="10" /></td>
        <td align="center" valign="top"><input type="text" id="final_exam_grade" name="final_exam_grade" size="10" /></td>
        <td align="center" valign="top"><input type="text" id="final_grade" name="final_grade" size="10" /></td>
    </tr>
</table>
</form>
</div>
<div class="modal-footer">
	<button class="btn btn-primary submit_button" onclick="$('#grading_sheet_form').submit();">Save changes</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>