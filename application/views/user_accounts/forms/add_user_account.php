<script>
var is_username_available = true;
	$(function() {
		$("#add_user_account_form").validationEngine({scroll:false});
		$('#add_user_account_form').ajaxForm({
			success:function(o) {
				$('#add_user_account_form_modal_wrappper').modal('toggle');
                $('#add_user_account_form_modal_wrappper').html("");
				load_user_accounts_list_dt();
			}, beforeSubmit: function(o) {
				var h_id = $('#h_member_id').val();
				if(h_id == "") {
					alert('Error :  Please select user!');
					return false;	
				}
				
				if(is_username_available == false) {
					alert('Error :  Username is not available!');
					return false;
				}
			},
		});

        var t = new $.TextboxList('#h_member_id', {max: 1,plugins: {
            autocomplete: {
                minLength: 1,
                onlyFromValues: true,
                queryRemote: true,
                remote: {url: base_url + 'user_accounts/ajax_get_users_autocomplete'}
            }
        }});
		t.addEvent('blur', function() {
			var h_id = $('#h_member_id').val();
			if(h_id != "") {
				$.post(base_url + 'user_accounts/ajax_get_login_info',{h_id:h_id},function(o) {
					if(o.is_exists) {
						$('#username').val(o.username);	
						$('#account_type').val(o.account_type);
					}
				},'json');
			} else {$('#username').val('');}
			
		});
		$('div.textboxlist-autocomplete').css('width','417px');
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
    <form id="add_user_account_form" name="add_user_account_form" method="post" action="<?php echo url('user_accounts/ajax_insert_update_user'); ?>">
        <table width="100%" border="0">
            <tr>
                <td style="width:20%" align="left" valign="top">User:</td>
                <td style="width:80%" align="left"><input type="text" id="h_member_id" name="h_member_id" /></td>
            </tr>
            <tr>
                <td style="width:14%" align="left" valign="middle">Username:</td>
                <td style="width:80%" align="left" valign="middle">
                    <input type="text" id="username" name="username" size="40" maxlength="30" class="validate[required]" onchange="javascript:checkUserNameIfExists();" value=""/>
                </td>
            </tr>
            <tr>
                <td style="width:14%" align="left" valign="middle">Password:</td>
                <td style="width:80%" align="left" valign="middle"><input type="password" id="password" name="password" class="validate[required]" size="40" maxlength="30" /></td>
            </tr>
            <tr>
                <td style="width:14%" align="left" valign="middle">Account Type:</td>
                <td style="width:80%" align="left" valign="middle">
                	<select id="account_type" name="account_type">
                    	<option value="<?php echo ADMIN; ?>"><?php echo ADMIN; ?></option>
                        <option value="<?php echo REGISTRAR; ?>"><?php echo REGISTRAR; ?></option>
                        <option value="<?php echo PROFESSOR; ?>"><?php echo PROFESSOR; ?></option>
                        <option value="<?php echo STUDENT; ?>"><?php echo STUDENT; ?></option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="modal-footer">
	<button class="btn btn-primary submit_button" onclick="$('#add_user_account_form').submit();"><i class="icon-list-alt icon-white"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
