<script>
	$(function() {
		$("#add_course_form").validationEngine({scroll:false});
		$('#add_course_form').ajaxForm({
			success:function(o) {
				//$('#add_course_form_modal_wrappper').modal('toggle');
				//$('#add_course_form_modal_wrappper').html("");
				_closeCourseForm();
				load_course_list_dt();				
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="form_content_wrapper">
    <div class="form-container">
        <h4 class="form-title">Add Course</h4>
        <form id="add_course_form" name="add_course_form" method="post" action="<?php echo url($action_url); ?>">
            <table width="100%" border="0">
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Course Code:</td>
                    <td style="width:80%" align="left"><input type="text" id="course_code" name="course_code" class="validate[required]" size="50"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Title:</td>
                    <td style="width:80%" align="left"><input type="text" id="title" name="title" class="validate[required]" size="50" maxlength="150"/></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Description:</td>
                    <td style="width:80%" align="left"><textarea style="width:331px; height:120px;" id="description" name="description"></textarea></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Units:</td>
                    <td style="width:80%" align="left">
                        <select id="units" name="units" style="width:200px;">
                            <option value="1.0">1.0</option>
                            <option value="1.5">1.5</option>
                            <option value="2.0">2.0</option>
                            <option value="3.0">3.0</option>
                            <option value="4.0">4.0</option>
                            <option value="5.0">5.0</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br/>
            <div class="form_action_section">
                <a class="btn btn-primary submit_button" onclick="$('#add_course_form').submit();"><i class="icon-list-alt icon-white"></i> Save</a>
                <a class="btn" onclick="javascript:_closeCourseForm();">Close</a>
            </div>
           
            
        </form>
    </div>
</div>
<div style="border-bottom: 1px solid #e2e4e5; margin-top:20px; width: 100%;"></div>