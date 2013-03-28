<script>
	$(function() {
		$("#add_student_form").validationEngine({scroll:false});
		$('#add_student_form').ajaxForm({
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
<div class="form_content_wrapper">
    <div class="form-container">
        <form id="add_student_form" name="add_student_form" method="post" action="<?php echo url($action_url); ?>" >
            <h4 class="form-title">Add Student</h4>
            <table border="0">
            <tr class="row">
                <td style="width:20%;" align="left" valign="middle">Student Name:</td>
                <td style="width:80%;" align="left" valign="middle">
                    <input type="text" id="lastname" name="lastname" class="validate[required]" size="40" maxlength="50" placeholder="Surname" />
                    <input type="text" id="firstname" name="firstname" class="validate[required]" size="40" maxlength="50" placeholder="First Name"/>
                    <input type="text" id="middlename" name="middlename" class="validate[required]" size="10" maxlength="50" placeholder="M.I."  /> 
                </td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Gender:</td>
                <td style="width:80%" align="left" valign="middle">
                    <select id="gender" name="gender" style="width:200px;">
                        <option value="<?php echo CV_Members::MALE; ?>"><?php echo CV_Members::MALE; ?></option>
                        <option value="<?php echo CV_Members::FEMALE; ?>"><?php echo CV_Members::FEMALE; ?></option>
                    </select>
                </td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Birthdate:</td>
                <td style="width:80%" align="left" valign="middle"><input type="text" id="birthdate" name="birthdate" class="validate[required]" size="50" maxlength="30" /></td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Email Address:</td>
                <td style="width:80%" align="left" valign="middle"><input type="text" id="email_address" name="email_address" class="validate[required,custom[email]]" size="50"  /></td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Address:</td>
                <td style="width:80%" align="left" valign="middle"><textarea style="width:331px; height:50px;" id="address" name="address"></textarea></td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Phone Number:</td>
                <td style="width:80%" align="left" valign="middle"><input type="text" id="phone_number" name="phone_number" size="50" maxlength="30" /></td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Mobile Number:</td>
                <td style="width:80%" align="left" valign="middle"><input type="text" id="mobile_number" name="mobile_number"size="50" maxlength="30"/></td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Student Number:</td>
                <td style="width:80%" align="left" valign="middle"><input type="text" id="student_number" name="student_number" value="<?php echo $student_number; ?>" readonly="readonly" size="50" /></td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Program:</td>
                <td style="width:80%" align="left" valign="middle">
                    <select id="h_program_id" name="h_program_id" style="width:200px;">
                    <?php foreach($programs as $p): ?>
                        <option value="<?php echo Utilities::encrypt($p->getId()); ?>"><?php echo $p->getProgramCode(); ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="row">
                <td style="width:20%" align="left" valign="middle">Year:</td>
                <td style="width:80%" align="left" valign="middle">
                    <select id="year_level" name="year_level" style="width:200px;">
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                    </select>
                </td>
            </tr>
               <!-- <tr>
                    <td style="width:20%" align="left" valign="top">Display Picture</td>
                    <td style="width:80%" align="left"><input type="file" id="display_image" name="display_image" /></td>
                </tr>-->
            </table>
            <br/>
            <div class="form_action_section">
                <a class="btn btn-primary submit_button" onclick="$('#add_student_form').submit();"><i class="icon-list-alt icon-white"></i> Save</a>
                <a class="btn" onclick="javascript:closeAddStudentForm();">Close</a>  
            </div>
        </form>
    </div>
</div>

<div style="border-bottom: 1px solid #e2e4e5; margin-top:20px; width: 100%;"></div>
<style>
	#ui-datepicker-div { display:none }
</style>