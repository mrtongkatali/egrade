<div class="modal-header">
    <h3 id="myModalLabel" style="color: #094772;">Add Curriculum</h3>
</div>
<div class="form_content_wrapper">
<form id="add_student_form" name="add_student_form" method="post" action="<?php echo url($action_url); ?>" enctype="multipart/form-data">
    <table width="100%" border="0">
        <tr>
            <td style="width:14%" align="left" valign="middle">Year Level:</td>
            <td style="width:80%" align="left" valign="middle">
                <select id="gender" name="gender" style="width:150px;">
                    <option value="">1st</option>
                    <option value="">2nd</option>
                    <option value="">3rd</option>
                    <option value="">4th</option>
                    <option value="">5th</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="width:14%" align="left" valign="middle">Course Code:</td>
            <td style="width:80%" align="left" valign="middle">
                <input type="text" id="birthdate" name="birthdate" class="validate[required]" size="40" maxlength="30" />
            </td>
        </tr>
        <tr>
            <td style="width:14%" align="left" valign="middle">Course:</td>
            <td style="width:80%" align="left" valign="middle">
                <input type="text" id="email_address" name="email_address" class="validate[required,custom[email]]" size="40"  />
            </td>
        </tr>
        <tr>
            <td style="width:14%" align="left" valign="middle">Classification:</td>
            <td style="width:80%" align="left" valign="middle">
                <select id="gender" name="gender" style="width:150px;">
                    <option value="">Lecture</option>
                    <option value="">Practical</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="width:14%" align="left" valign="middle">Units:</td>
            <td style="width:80%" align="left" valign="middle">
                <input type="text" id="phone_number" name="phone_number" size="40" maxlength="30" />
            </td>
        </tr>
        <tr>
            <td style="width:14%" align="left" valign="middle">Pre-requisites</td>
            <td style="width:80%" align="left" valign="middle">
                <select class="select-multiple" style="width:150px;" multiple size="5">
                    <option value="">IT100</option>
                    <option value="">IT101</option>
                    <option value="">IT102</option>
                    <option value="">IT103</option>
                    <option value="">IT104</option>
                </select>
            </td>
        </tr>
    </table>
    <br/><br/>
    <button class="btn btn-primary">Save</button>&nbsp;&nbsp;<button class="btn">Cancel</button>
</form>

<style>
	#ui-datepicker-div { display:none }
</style>