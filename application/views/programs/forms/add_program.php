<script>
	$(function() {
		$("#add_program_form").validationEngine({scroll:false});
		$('#add_program_form').ajaxForm({
			success:function(o) {
				_closeProgramForm();
				load_program_list_dt();				
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="form_content_wrapper">
    <div class="form-container">
        <h4 class="form-title">Add Course</h4>
        <form id="add_program_form" name="add_program_form" method="post" action="<?php echo url('programs/ajax_insert_update_program'); ?>">
            <table width="100%" border="0">
            	<tr class="row">
                    <td style="width:20%" align="left" valign="top">College:</td>
                    <td style="width:80%" align="left">
                    	<select id="h_college_id" name="h_college_id" style="width:150px;">
                        <?php foreach($colleges as $c): ?>
                        	<option value="<?php echo Utilities::encrypt($c->getId()); ?>"><?php echo $c->getCollegeCode(); ?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Program Code:</td>
                    <td style="width:80%" align="left"><input type="text" id="program_code" name="program_code" class="validate[required]" size="50"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Program Name:</td>
                    <td style="width:80%" align="left"><input type="text" id="program_name" name="program_name" class="validate[required]" size="50"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Full Title:</td>
                    <td style="width:80%" align="left"><input type="text" id="full_title" name="full_title" class="validate[optional]" size="50"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Description:</td>
                    <td style="width:80%" align="left"><textarea id="description" style="height:125px; width:500px;" name="description"></textarea></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Is Offered?:</td>
                    <td style="width:80%" align="left">
                    	<select id="is_offered" name="is_offered" style="width:150px;">
                        	<option value="<?php echo CV_Settings_Program::YES; ?>"><?php echo CV_Settings_Program::YES; ?></option>
                            <option value="<?php echo CV_Settings_Program::NO; ?>"><?php echo CV_Settings_Program::NO; ?></option>
                        </select>
                    </td>
                </tr>
            </table>
            <br/>
            <div class="form_action_section">
                <a class="btn btn-primary submit_button" onclick="$('#add_program_form').submit();"><i class="icon-list-alt icon-white"></i> Save</a>
                <a class="btn" onclick="javascript:_closeProgramForm();">Close</a>
            </div>
           
            
        </form>
    </div>
</div>
<div style="border-bottom: 1px solid #e2e4e5; margin-top:20px; width: 100%;"></div>