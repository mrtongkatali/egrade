<style>
	#ui-datepicker-div { display:none; }
</style>
<script>
	$(function() {
		$("#open_course_form").validationEngine({scroll:false});
		$('#open_course_form').ajaxForm({
			success:function(o) {
				closeCourseForm();
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
	
	var t = new $.TextboxList('#h_course_id', {max: 1,plugins: {
		autocomplete: {
			minLength: 1,
			onlyFromValues: true,
			queryRemote: true,
			remote: {url: base_url + 'course_management/ajax_get_course_autocomplete'}
		}
	}});
	
	var t = new $.TextboxList('#h_professor_id_add', {max: 1, plugins: {
		autocomplete: {
			minLength: 1,
			onlyFromValues: true,
			queryRemote: true,
			remote: {url: base_url + 'course_management/ajax_get_professor_autocomplete'}
		}
	}});
	
	$("#submission_date").datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
	});
</script>
<div class="modal-header">
    <h3 id="myModalLabel">Open New Course</h3>
</div>
<div class="form_content_wrapper">
<form id="open_course_form" name="open_course_form" method="post" action="<?php echo url('course_management/insert_update_open_course'); ?>">
<table width="100%" border="0">
    <tr>
        <td style="width:20%" align="left" valign="top">Program:</td>
        <td style="width:80%" align="left">
        	<select id="h_program_id" name="h_program_id" style="width:150px;">
            	<?php foreach($programs as $p): ?>
                	<option value="<?php echo Utilities::encrypt($p->getId()); ?>"><?php echo $p->getProgramCode(); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Course:</td>
        <td style="width:80%" align="left"><input type="text" id="h_course_id" name="h_course_id" /></td>
    </tr>
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
                	<option <?php echo ($i == $year ? 'selected="selected"' : ''); ?> value="<?php echo  $a . ' - ' . ($a+1); ?>"><?php echo  $a . ' - ' . ($a+1); ?></option>
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
        <td style="width:20%" align="left" valign="top">Main Professor:</td>
        <td style="width:80%" align="left"><input type="text" id="h_professor_id_add" name="h_professor_id" /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Section:</td>
        <td style="width:80%" align="left"><input type="text" id="section" name="section"  class="validate[required]"/></td>
    </tr>
   	<tr>
        <td style="width:20%" align="left" valign="top">Submission Deadline:</td>
        <td style="width:80%" align="left"><input type="text" id="submission_date" name="submission_date" class="validate[required]" /></td>
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
    <button class="btn" onclick="javascript:closeCourseForm();">Close</button>
</div>
<style>
	#ui-datepicker-div { display:none }
</style>