<style>
	#ui-datepicker-div { display:none; }
</style>
<script>
	$(function() {
		$("#edit_opened_course_form").validationEngine({scroll:false});
		$('#edit_opened_course_form').ajaxForm({
			success:function(o) {
				$('#edit_opened_course_modal_wrapper').modal('toggle');
				$('#edit_opened_course_modal_wrapper').html("");
				load_opened_course_list_dt();
			},beforeSubmit: function(o) {
				var h_course_id = $("#h_course_id").val();
				if(h_course_id == "") {
					alert('Error : Select course to open.');
					return false;
				}
			},
		});
	});
	
	
	var t = new $.TextboxList('#h_professor_id', {max: 1, plugins: {
		autocomplete: {
			minLength: 1,
			onlyFromValues: true,
			queryRemote: true,
			remote: {url: base_url + 'course_management/ajax_get_professor_autocomplete'}
		}
	}});
	
	<?php 
		$professor = CV_Members_Helper::getBasicInfoById($cd->getProfessorId()); 
		if($professor) {
	?>
	t.add('Entry','<?php echo Utilities::encrypt($professor['id']); ?>', '<?php echo $professor['name']; ?>');
	<?php } ?>
	
	$("#submission_date").datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
	});
</script>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Course Details</h3>
</div>
<div class="form_content_wrapper">
<table width="100%" border="0">
	<tr>
        <td style="width:20%" align="left" valign="top">Program:</td>
        <td style="width:80%" align="left"><?php echo $cd->getProgramCode(); ?></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Course:</td>
        <td style="width:80%" align="left"><?php echo $cd->getCourseTitle(); ?></td>
    </tr>
</table>

<br />
<br />


<form id="edit_opened_course_form" name="edit_opened_course_form" method="post" action="<?php echo url('course_management/insert_update_open_course'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($cd->getId()); ?>" />
<input type="hidden" id="h_program_id" name="h_program_id" value="<?php echo Utilities::encrypt($cd->getProgramId()); ?>" />
<input type="hidden" id="h_course_id" name="h_course_id" value="<?php echo Utilities::encrypt($cd->getCourseId()); ?>" />

<table width="100%" border="0">
    <tr>
        <td style="width:20%" align="left" valign="top">Batch Year:</td>
        <td style="width:80%" align="left">
			<?php
                $year 	= date('Y');
                $until	= $year+5;
				$s_year	= explode('-',$cd->getSchoolYear());
				
            ?>
        	<select id="school_year" name="school_year" style="width:150px;">
            	<?php for($i=($year-5); $i<=$until; $i++): ?>
                <?php $a=$i; ?>
                	<option <?php echo ($i == $s_year[0] ? 'selected="selected"' : ''); ?> value="<?php echo  $a . ' - ' . ($a+1); ?>"><?php echo  $a . ' - ' . ($a+1); ?></option>
                <?php endfor; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Semester:</td>
        <td style="width:80%" align="left">
        	<select id="semester" name="semester" style="width:150px;">
            	<option <?php echo $selected = ($cd->getSemester() == 1 ? 'selected="selected"' : ''); ?> value="1">1st</option>
                <option <?php echo $selected = ($cd->getSemester() == 2 ? 'selected="selected"' : ''); ?> value="2">2nd</option>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Professor:</td>
        <td style="width:80%" align="left"><input type="text" id="h_professor_id" name="h_professor_id" /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Section:</td>
        <td style="width:80%" align="left"><input type="text" id="section" name="section"  class="validate[required]" value="<?php echo $cd->getSection(); ?>"/></td>
    </tr>
   	<tr>
        <td style="width:20%" align="left" valign="top">Submission Deadline:</td>
        <td style="width:80%" align="left"><input type="text" id="submission_date" name="submission_date" class="validate[required]" value="<?php echo $cd->getSubmissionDate(); ?>" /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Remarks:</td>
        <td style="width:80%" align="left"><textarea id="remarks" name="remarks" style="width:430px; height:90px;"><?php echo $cd->getRemarks(); ?></textarea></td>
    </tr>
</table>
</form>
</div>
<div class="modal-footer">
	<button class="btn btn-primary submit_button" onclick="$('#edit_opened_course_form').submit();">Save changes</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>


<style>
	#ui-datepicker-div { display:none }
</style>