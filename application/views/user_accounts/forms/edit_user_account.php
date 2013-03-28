<script>
var is_username_available = true;
	$(function() {
		$("#edit_user_account_form").validationEngine({scroll:false});
		$('#edit_user_account_form').ajaxForm({
			success:function(o) {
				$('#edit_user_account_form_modal_wrappper').modal('toggle');
                $('#edit_user_account_form_modal_wrappper').html("");
				load_user_accounts_list_dt();
			}, beforeSubmit: function(o) {
				if(is_username_available == false) {
					alert('Error :  Username is not available!');
					return false;
				}
			},
		});
 
	});
	
	function checkUserNameIfExists() {
		var h_id 		= $('#h_member_id').val();
		var username	= $('#username').val();
		if(h_id != "" && username != "") {
			$.post(base_url + 'user_accounts/check_username_if_exists',{h_id:h_id,username:username},function(o) {
				is_username_available = o.is_available; 
			},'json');	
		}
		
	}
</script>
<div class="modal-header">
    <h4 id="myModalLabel" style="color: #094772;">Add New User</h4>
</div>
<div class="form_content_wrapper">
    <form id="edit_user_account_form" name="edit_user_account_form" method="post" action="<?php echo url('user_accounts/ajax_insert_update_user'); ?>">
    <input type="hidden" id="h_member_id" name="h_member_id" value="<?php echo Utilities::encrypt($a->getMemberId()); ?>" />
        <table width="100%" border="0">
            <tr>
                <td style="width:14%" align="left" valign="middle">Username:</td>
                <td style="width:80%" align="left" valign="middle">
                    <input type="text" id="username" name="username" size="40" maxlength="30" class="validate[required]" onchange="javascript:checkUserNameIfExists();" value="<?php echo $a->getUserName(); ?>"/>
                </td>
            </tr>
            <tr>
                <td style="width:14%" align="left" valign="middle">Password:</td>
                <td style="width:80%" align="left" valign="middle"><input type="password" id="password" name="password" size="40" maxlength="30" value="" /></td>
            </tr>
            <tr>
                <td style="width:14%" align="left" valign="middle">Account Type:</td>
                <td style="width:80%" align="left" valign="middle">
                	<select id="account_type" name="account_type">
                    	<option <?php echo ($a->getAccountType() == ADMIN ? 'selected="selected"' : ''); ?> value="<?php echo ADMIN; ?>"><?php echo ADMIN; ?></option>
                        <option <?php echo ($a->getAccountType() == REGISTRAR ? 'selected="selected"' : ''); ?> value="<?php echo REGISTRAR; ?>"><?php echo REGISTRAR; ?></option>
                        <option <?php echo ($a->getAccountType() == PROFESSOR ? 'selected="selected"' : ''); ?> value="<?php echo PROFESSOR; ?>"><?php echo PROFESSOR; ?></option>
                        <option <?php echo ($a->getAccountType() == STUDENT ? 'selected="selected"' : ''); ?> value="<?php echo STUDENT; ?>"><?php echo STUDENT; ?></option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="modal-footer">
	<button class="btn btn-primary submit_button" onclick="$('#edit_user_account_form').submit();"><i class="icon-edit icon-white"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
