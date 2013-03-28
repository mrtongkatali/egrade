<style>
	#ui-datepicker-div { display:none; }
</style>
<script>
var is_username_available = true;
	$(function() {
		$("#edit_account_details_form").validationEngine({scroll:false});
		$('#edit_account_details_form').ajaxForm({
			success:function(o) {
				show_account_details();
			}, beforeSubmit: function(o) {
				if(is_username_available == false) {
					alert('Error :  Username is not available!');
					return false;
				}
			},
		});
	});
	
	$("#birthdate").datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
	});
	
	function checkUserNameIfExists() {
		var h_id 		= $('#h_id').val();
		var username	= $('#username').val();
		if(h_id != "" && username != "") {
			$.post(base_url + 'user_accounts/check_username_if_exists',{h_id:h_id,username:username},function(o) {
				is_username_available = o.is_available; 
			},'json');	
		}
		
	}
</script>
<br />
<h3 class="section_title"><strong>Personal Details</strong></h3>
<br />
<br />
<form id="edit_account_details_form" name="edit_account_details_form" method="post" action="<?php echo url('account/load_update_account_details'); ?>">
<input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($m->getId()); ?>" />
<table class="form-default no-border" width="100%">
  <tbody>
  <tr>
    <td width="25%" class="field_label">Professor Number:</td>
    <td width="75%"><?php echo $m->getStudentEmployeeCode(); ?></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">First Name:</td>
    <td width="75%"><input type="text" id="firstname" name="firstname" class="validate[required]" value="<?php echo $m->getFirstName(); ?>" size="40" /></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Middle Name:</td>
    <td width="75%"><input type="text" id="middlename" name="middlename" value="<?php echo $m->getMiddleName(); ?>" size="40" /></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Last Name:</td>
    <td width="75%"><input type="text" id="lastname" name="lastname" class="validate[required]" value="<?php echo $m->getLastName(); ?>" size="40" /></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Gender:</td>
    <td width="75%">
        <select id="gender" name="gender" style="width:264px;">
            <option <?php echo ($m->getGender() == CV_Members::MALE ? 'selected="selected"' : '');  ?> value="<?php echo CV_Members::MALE; ?>"><?php echo CV_Members::MALE; ?></option>
            <option <?php echo ($m->getGender() == CV_Members::FEMALE ? 'selected="selected"' : '');  ?> value="<?php echo CV_Members::FEMALE; ?>"><?php echo CV_Members::FEMALE; ?></option>
        </select>
    </td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Birthdate:</td>
    <td width="75%"><input type="text" id="birthdate" name="birthdate" class="validate[required]" value="<?php echo $m->getBirthDate(); ?>" size="40" /></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Email Address:</td>
    <td width="75%"><input type="text" id="email_address" name="email_address" class="validate[required]" value="<?php echo $m->getEmailAddress(); ?>" size="40" /></td>
  </tr>
   <tr>
    <td width="25%" class="field_label">Address:</td>
    <td width="75%"><textarea style="height:80px; width:264px;" id="address" name="address"><?php echo $m->getAddress(); ?></textarea></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Phone Number:</td>
    <td width="75%"><input type="text" id="phone_number" name="phone_number" class="validate[required]" value="<?php echo $m->getPhoneNumber(); ?>" size="40" /></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Mobile Number:</td>
    <td width="75%"><input type="text" id="mobile_number" name="mobile_number" class="validate[required]" value="<?php echo $m->getMobileNumber(); ?>" size="40" /></td>
  </tr>
</tbody>
</table>

<br />
<br />
<div class="form_separator"></div>
<br />

<?php
$acc = CV_Login_Finder::findByMemberId($m->getId());
?>
<h3 class="section_title"><strong>Account Settings</strong></h3>
<br />
<br />
<table class="form-default no-border" width="100%">
  <tbody>
  <tr>
    <td width="25%" class="field_label">Username:</td>
    <td width="75%"><input type="text" id="username" name="username" class="validate[required]" size="40" onchange="javascript:checkUserNameIfExists();" value="<?php echo $acc->getUsername(); ?>" /></td>
  </tr>
  <tr>
    <td width="25%" class="field_label">Password:</td>
    <td width="75%"><input type="text" id="password" name="password" size="40" maxlength="30" /> <small>*Leave it blank if you don't want to change your password</small></td>
  </tr>
</tbody>
</table>
<br />
</form>

<div id="update_button_wrapper" class="form_action_section" align="center">
    <a class="btn btn-primary submit_button" href="javascript:void(0);" onclick="$('#edit_account_details_form').submit();"><i class="icon-edit icon-white"></i> Save</a>
     <a class="btn" onclick="javascript:close_edit_account_details_form();">Close</a>
</div>