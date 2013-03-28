<script>
	$(function() {
		$("#edit_student_form").validationEngine({scroll:false});
		$('#edit_student_form').ajaxForm({
			success:function(o) {
				closeAddStudentForm();
				load_student_list_dt();
			}, beforeSubmit: function(o) {
			},
		});
		$("#birthdate").datepicker({ 
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			defaultDate: '<?php echo '1987-'.date('m-d'); ?>',
		});
	});
</script>
<div class="modal-header">
    <h3 id="myModalLabel">Edit Student</h3>
</div>
<div class="form_content_wrapper">
<form id="edit_student_form" name="edit_student_form" method="post" action="<?php echo url($action_url); ?>" enctype="multipart/form-data">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($student->getId()); ?>" />
<table width="100%" border="0">
   
    <tr>
        <td style="width:20%" align="left" valign="top">Student Name:</td>
        <td style="width:80%" align="left">
        	<input type="text" id="lastname" name="lastname" class="validate[required]" size="20" maxlength="30" placeholder="Surname" value="<?php echo $student->getLastName(); ?>" /> &nbsp;&nbsp;
            <input type="text" id="firstname" name="firstname" class="validate[required]" size="20" maxlength="30" placeholder="First Name" value="<?php echo $student->getFirstName(); ?>"  /> &nbsp;&nbsp;
            <input type="text" id="middlename" name="middlename" class="validate[required]" size="20" maxlength="30" placeholder="M.I." value="<?php echo $student->getMiddleName(); ?>"  /> 
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Gender:</td>
        <td style="width:80%" align="left">
        	<select id="gender" name="gender" style="width:150px;">
            	<option <?php echo ($student->getGender() == CV_Members::MALE ? 'selected="selected"' : ''); ?> value="<?php echo CV_Members::MALE; ?>"><?php echo CV_Members::MALE; ?></option>
                <option <?php echo ($student->getGender() == CV_Members::MALE ? 'selected="selected"' : ''); ?> value="<?php echo CV_Members::FEMALE; ?>"><?php echo CV_Members::FEMALE; ?></option>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Birthdate:</td>
        <td style="width:80%" align="left"><input type="text" id="birthdate" name="birthdate" class="validate[required]" size="20" maxlength="30" value="<?php echo $student->getBirthdate(); ?>" /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Email Address:</td>
        <td style="width:80%" align="left"><input type="text" id="email_address" name="email_address" class="validate[required,custom[email]]" size="50" value="<?php echo $student->getEmailAddress(); ?>"  /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Address:</td>
        <td style="width:80%" align="left"><textarea style="width:333px; height:50px;" id="address" name="address"><?php echo $student->getAddress(); ?></textarea></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Phone Number:</td>
        <td style="width:80%" align="left"><input type="text" id="phone_number" name="phone_number" size="20" maxlength="30" value="<?php echo $student->getPhoneNumber(); ?>" /></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Mobile Number:</td>
        <td style="width:80%" align="left"><input type="text" id="mobile_number" name="mobile_number" size="20" maxlength="30" value="<?php echo $student->getMobileNumber(); ?>"/></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Student Number:</td>
        <td style="width:80%" align="left"><?php echo $student->getStudentEmployeeCode(); ?></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Program:</td>
        <td style="width:80%" align="left">
        	<select id="h_program_id" name="h_program_id" style="width:150px;">
            <?php foreach($programs as $p): ?>
            	<option <?php echo ($student->getProgramId() == $p->getId() ? 'selected="selected"' : ''); ?> value="<?php echo Utilities::encrypt($p->getId()); ?>"><?php echo $p->getProgramCode(); ?></option>
            <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Year:</td>
        <td style="width:80%" align="left">
        	<select id="year_level" name="year_level" style="width:150px;">
            	<option <?php echo ($student->getYearLevel() == 1 ? 'selected="selected"' : ''); ?> value="1">1st</option>
                <option <?php echo ($student->getYearLevel() == 2 ? 'selected="selected"' : ''); ?> value="2">2nd</option>
                <option <?php echo ($student->getYearLevel() == 3 ? 'selected="selected"' : ''); ?> value="3">3rd</option>
                <option <?php echo ($student->getYearLevel() == 4 ? 'selected="selected"' : ''); ?> value="4">4th</option>
                <option <?php echo ($student->getYearLevel() == 5 ? 'selected="selected"' : ''); ?> value="5">5th</option>
            </select>
        </td>
    </tr>
   <!-- <tr>
        <td style="width:20%" align="left" valign="top">Display Picture</td>
        <td style="width:80%" align="left"><input type="file" id="display_image" name="display_image" /></td>
    </tr>-->
</table>
</form>
</div>
<div class="modal-footer">
    <button class="btn" onclick="javascript:closeAddStudentForm();">Close</button>
    <button class="btn btn-primary submit_button" onclick="$('#edit_student_form').submit();">Save changes</button>
</div>


<style>
	#ui-datepicker-div { display:none }
</style>


<style>
	#ui-datepicker-div { display:none }
</style>