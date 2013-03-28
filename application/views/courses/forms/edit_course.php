<script>
	$(function() {
		$("#edit_course_form").validationEngine({scroll:false});
		$('#edit_course_form').ajaxForm({
			success:function(o) {
				_closeCourseForm();
				load_course_list_dt();
			}, beforeSubmit: function(o) {
			},
		});
	});
</script>
<div class="form_content_wrapper">
    <div class="form-container">
        <h4 class="form-title">Edit Course</h4>
        <form id="edit_course_form" name="edit_course_form" method="post" action="<?php echo url($action_url); ?>">
            <input type="hidden" id="h_id" name="h_id" value="<?php echo Utilities::encrypt($course->getId()); ?>" />
            <table width="100%" border="0">
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Course Code:</td>
                    <td style="width:80%" align="left"><input type="text" id="course_code" name="course_code" class="validate[required]" size="50" value="<?php echo $course->getCourseCode(); ?>"  /></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Title:</td>
                    <td style="width:80%" align="left"><input type="text" id="title" name="title" class="validate[required]" size="50" maxlength="150" value="<?php echo $course->getTitle(); ?>"  /></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Description:</td>
                    <td style="width:80%" align="left"><textarea style="width:331px; height:120px;" id="description" name="description"><?php echo $course->getDescription(); ?></textarea></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Units:</td>
                    <td style="width:80%" align="left">
                        <select id="units" name="units" style="width:200px;">
                            <option <?php echo ($course->getUnits() == '1.0' ? 'selected="selected"' : ''); ?> value="1.0">1.0</option>
                            <option <?php echo ($course->getUnits() == '1.5' ? 'selected="selected"' : ''); ?>value="1.5">1.5</option>
                            <option <?php echo ($course->getUnits() == '2.0' ? 'selected="selected"' : ''); ?>value="2.0">2.0</option>
                            <option <?php echo ($course->getUnits() == '3.0' ? 'selected="selected"' : ''); ?>value="3.0">3.0</option>
                            <option <?php echo ($course->getUnits() == '4.0' ? 'selected="selected"' : ''); ?>value="4.0">4.0</option>
                            <option <?php echo ($course->getUnits() == '5.0' ? 'selected="selected"' : ''); ?>value="5.0">5.0</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br/>
            <div class="form_action_section">
                <button class="btn btn-primary submit_button" onclick="$('#edit_course_form').submit();"><i class="icon-edit icon-white"></i> Save</button>
            	<button class="btn" onclick="javascript:_closeCourseForm();">Close</button>
            </div>
            
        </form>
    </div>
</div>
<div style="border-bottom: 1px solid #e2e4e5; margin-top:20px; width: 100%;"></div>