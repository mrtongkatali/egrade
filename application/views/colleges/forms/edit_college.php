<script>
	$(function() {
		$("#add_college_form").validationEngine({scroll:false});
		$('#add_college_form').ajaxForm({
			success:function(o) {
				_closeCollegeForm();
				load_college_list_dt();				
			}, beforeSubmit: function(o) {
			},
		});
		
		 var t = new $.TextboxList('#h_dean_id2', {max: 1,plugins: {
			autocomplete: {
				minLength: 1,
				onlyFromValues: true,
				queryRemote: true,
				remote: {url: base_url + 'course_management/ajax_get_professor_autocomplete'}
			}
		}});
		
		<?php 
			$professor = CV_Members_Helper::getBasicInfoById($c->getMemberId()); 
			if($professor) {
		?>
		t.add('Entry','<?php echo Utilities::encrypt($professor['id']); ?>', '<?php echo $professor['name']; ?>');
		<?php } ?>
	});
</script>
<div class="form_content_wrapper">
    <div class="form-container">
        <h4 class="form-title">Edit College</h4>
        <form id="add_college_form" name="add_college_form" method="post" action="<?php echo url('colleges/ajax_insert_update_college'); ?>">
        <input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($c->getId()); ?>" />
            <table width="100%" border="0">
            	<tr class="row">
                    <td style="width:20%" align="left" valign="top">Dean:</td>
                    <td style="width:80%" align="left"><input type="text" id="h_dean_id2" name="h_dean_id" class="validate[required]" size="50"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">College Code:</td>
                    <td style="width:80%" align="left"><input type="text" id="college_code" name="college_code" class="validate[required]" value="<?php echo $c->getCollegeCode(); ?>" size="50"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">College Name:</td>
                    <td style="width:80%" align="left"><input type="text" id="college_name" name="college_name" class="validate[required]" size="50" value="<?php echo $c->getCollegeName(); ?>"/></td>
                </tr>
            </table>
            <br/>
            <div class="form_action_section">
                <a class="btn btn-primary submit_button" onclick="$('#add_college_form').submit();"><i class="icon-list-alt icon-white"></i> Save</a>
                <a class="btn" onclick="javascript:_closeCollegeForm();">Close</a>
            </div>
           
            
        </form>
    </div>
</div>
<div style="border-bottom: 1px solid #e2e4e5; margin-top:20px; width: 100%;"></div>