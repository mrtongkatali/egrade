<style>
	#ui-datepicker-div { display:none; }
</style>

<script>
	$(function() {
		$("#edit_professor_form").validationEngine({scroll:false});
		$('#edit_professor_form').ajaxForm({
			success:function(o) {
				closeAddProfessorForm();
				load_professor_list_dt();
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
<div class="form_content_wrapper">
    <div class="form-container">
        <h4 class="form-title">Edit Professor Details</h4>
        <form id="edit_professor_form" name="edit_professor_form" method="post" action="<?php echo url('professors/ajax_insert_update_professor'); ?>">
            <input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($professor->getId()); ?>" />
            <input type="hidden" id="professor_number" name="professor_id" value="<?php echo $professor->getStudentEmployeeCode(); ?>" />
            <table width="100%" border="0">
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Professor Name:</td>
                    <td style="width:80%" align="left">
                    	<input type="text" id="lastname" name="lastname" class="validate[required]" size="40" maxlength="30" placeholder="Surname" value="<?php echo $professor->getLastName(); ?>" />
                        <input type="text" id="firstname" name="firstname" class="validate[required]" size="40" maxlength="30" placeholder="First Name" value="<?php echo $professor->getFirstName(); ?>"  />
                        <input type="text" id="middlename" name="middlename" class="validate[required]" size="10" maxlength="30" placeholder="M.I."  value="<?php echo $professor->getMiddleName(); ?>"  /> 
                    </td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Gender:</td>
                    <td style="width:80%" align="left">
                    	<select id="gender" name="gender" style="width:200px;">
                        	<option <?php echo ($professor->getGender() == CV_Members::MALE ? 'selected="selected"' : ''); ?> value="<?php echo CV_Members::MALE; ?>"><?php echo CV_Members::MALE; ?></option>
                            <option <?php echo ($professor->getGender() == CV_Members::MALE ? 'selected="selected"' : ''); ?> value="<?php echo CV_Members::FEMALE; ?>"><?php echo CV_Members::FEMALE; ?></option>
                        </select>
                    </td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Birthdate:</td>
                    <td style="width:80%" align="left"><input type="text" id="birthdate" name="birthdate" class="validate[required]" size="50" maxlength="30" value="<?php echo $professor->getBirthdate(); ?>" /></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Email Address:</td>
                    <td style="width:80%" align="left"><input type="text" id="email_address" name="email_address" class="validate[required,custom[email]]" size="50" value="<?php echo $professor->getEmailAddress(); ?>"  /></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Address:</td>
                    <td style="width:80%" align="left"><textarea style="width:331px; height:50px;" id="address" name="address"><?php echo $professor->getAddress(); ?></textarea></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Phone Number:</td>
                    <td style="width:80%" align="left"><input type="text" id="phone_number" name="phone_number" size="50" maxlength="30" value="<?php echo $professor->getPhoneNumber(); ?>" /></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Mobile Number:</td>
                    <td style="width:80%" align="left"><input type="text" id="mobile_number" name="mobile_number"size="50" maxlength="30" value="<?php echo $professor->getMobileNumber(); ?>"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Professor Number:</td>
                    <td style="width:80%" align="left"><?php echo $professor->getStudentEmployeeCode(); ?></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Program:</td>
                    <td style="width:80%" align="left">
                    	<select id="h_college_id" name="h_college_id" style="width:200px;">
                        <?php foreach($colleges as $c): ?>
                        	<option <?php echo ($c->getId() == $professor->getCollegeId() ? 'selected="selected"' : ''); ?> value="<?php echo Utilities::encrypt($c->getId()); ?>"><?php echo $c->getCollegeCode(); ?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br/>
            <div class="form_action_section">
                <a class="btn btn-primary submit_button" onclick="$('#edit_professor_form').submit();"><i class="icon-edit icon-white"></i> Save</a>
            	<a class="btn" onclick="javascript:closeAddProfessorForm();">Close</a>
            </div>
           
        </form>
    </div>
</div>
<div style="border-bottom: 1px solid #e2e4e5; margin-top:20px; width: 100%;"></div>