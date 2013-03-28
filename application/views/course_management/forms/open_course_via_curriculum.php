<style>#ui-datepicker-div { display:none; }</style>
<script>
$(function() {
	
	$("#open_course_form").validationEngine({scroll:false});
	$('#open_course_form').ajaxForm({
		success:function(o) {
			$('#open_course_modal_wrapper').modal('toggle');
			$('#open_course_modal_wrapper').html("");
			view_type_filter('view_curriculum');
		}
	});
	
	var t = new $.TextboxList('#h_professor_id2', {max: 1, plugins: {
	autocomplete: {
		minLength: 1,
		onlyFromValues: true,
		queryRemote: true,
		remote: {url: base_url + 'course_management/ajax_get_professor_autocomplete'}
	}
}});

$('.textboxlist-autocomplete').css('width','444px');

$("#submission_date2").datepicker({ 
	dateFormat: 'yy-mm-dd',
	changeMonth: true,
	changeYear: true,
});
});
</script>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="myModalLabel">Open Course : <?php echo $course->getTitle(); ?></h4>
</div>
<div class="form_content_wrapper">

<form id="open_course_form" name="open_course_form" method="post" action="<?php echo url('course_management/insert_update_open_course'); ?>">
<input type="hidden" id="h_course_id2" name="h_course_id" value="<?php echo Utilities::encrypt($course->getId()); ?>" />
<input type="hidden" id="h_program_id" name="h_program_id" value="<?php echo $h_program_id; ?>" />
<table width="100%" border="0">
    <tr>
        <td style="width:20%" align="left" valign="top">Batch Year:</td>
        <td style="width:80%" align="left">
			<?php
                $year 	= date('Y');
                $until	= $year+5;
            ?>
        	<select id="school_year" name="school_year" style="width:150px;">
            	<?php for($i=($year-5); $i<=$until; $i++): ?>
                <?php $a=$i; ?>
                	<option <?php echo ($i==$year ? 'selected="selected"' : ''); ?> value="<?php echo  $a . ' - ' . ($a+1); ?>"><?php echo  $a . ' - ' . ($a+1); ?></option>
                <?php endfor; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Semester:</td>
        <td style="width:80%" align="left">
        	<select id="semester" name="semester" style="width:150px;">
            	<option value="1">1st</option>
                <option value="2">2nd</option>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Professor:</td>
        <td style="width:80%" align="left"><input type="text" id="h_professor_id2" name="h_professor_id" /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Section:</td>
        <td style="width:80%" align="left"><input type="text" id="section" name="section"  class="validate[required]" value=""/></td>
    </tr>
   	<tr>
        <td style="width:20%" align="left" valign="top">Submission Deadline:</td>
        <td style="width:80%" align="left"><input type="text" id="submission_date2" name="submission_date" class="validate[required]" value="" /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Remarks:</td>
        <td style="width:80%" align="left"><textarea id="remarks" name="remarks" style="width:430px; height:90px;"></textarea></td>
    </tr>
</table>
</form>
</div>
<div class="modal-footer">
	<button class="btn btn-primary submit_button" onclick="$('#open_course_form').submit();">Save changes</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>


<style>
	#ui-datepicker-div { display:none }
</style>