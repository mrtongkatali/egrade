<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>

<script>
	$(function() {
		//load_enrollee_list_dt('<?php echo $h_course_designation_id; ?>');
		$('#grading_sheet_form').ajaxForm({
			success:function(o) {
			}
		});
		$('.action-link').tipsy({gravity: 's'});
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Grade Management</h3><br/><br/><br/>
        
        <div class="form-container">
         	<h3 class="section_title"><strong>Course Information</strong></h3>
            <br />
			<br />
            <table class="form-default no-border" width="100%">
              <tbody>
              <tr>
                <td width="20%" class="field_label">Course Code:</td>
                <td width="80%"><?php echo $cd->getCourseCode(); ?></td>
              </tr>
              <tr>
                <td width="20%" class="field_label">Course Title:</td>
                <td width="80%"><?php echo $cd->getCourseTitle(); ?></td>
              </tr>
              <tr>
                <td width="20%" class="field_label">Section:</td>
                <td width="80%"><?php echo $cd->getSection(); ?></td>
              </tr>
              <tr>
                <td width="20%" class="field_label">Professor Name:</td>
                <td width="80%"><?php echo $cd->getProfessorName(); ?></td>
              </tr>
              <tr>
                <td width="20%" class="field_label">Submission Date:</td>
                <td width="80%"><?php echo $cd->getSubmissionDate(); ?></td>
              </tr>
            </tbody>
         </table>
         </div>
         
        <br />
		<br />
         <form id="grading_sheet_form" name="grading_sheet_form" method="post" action="<?php echo url('grade_management/load_update_grading_sheet'); ?>">
         <input type="hidden" id="h_course_designation_id" name="h_course_designation_id" value="<?php echo Utilities::encrypt($cd->getId()); ?>" />
         	<div id="enrollee_list_dt_wrapper">
                <table class="sphr" width="100%">
                    <thead>
                        <tr>
                            <th width="100">Program</th>
                            <th width="200">Student Number</th>
                            <th width="300">Student Name</th>
                            <th width="200">Final Exam Grade</strong></th>
                            <?php if($account_type != REGISTRAR) {  ?>
                            <th width="200">Pre-Final Grade</th>
                            <?php } ?>
                            <th width="200">Final Grade</th>
                            <th width="200">Status</th>
                        </tr>
                    </thead>
                    <?php foreach ($grades as $gr):?>
                    <?php $element_name = Utilities::encrypt($gr->getId()); ?>
                        <tr>
                            <td><?php echo $gr->getProgramCode(); ?></td>
                            <td><?php echo $gr->getStudentCode(); ?></td>
                            <td><?php echo $gr->getStudentName(); ?></td>
                            <td><input type="text" id="feg_<?php echo $element_name; ?>" name="feg_<?php echo $element_name; ?>" size="10" style="height:17px !important;" value="<?php echo $gr->getFinalExamGrade(); ?>" /></td>
                            <?php if($account_type != REGISTRAR) {  ?>
                            	<td><input type="text" id="pfg_<?php echo $element_name; ?>" name="pfg_<?php echo $element_name; ?>" size="10" style="height:17px !important;" value="<?php echo $gr->getPreFinalGrade(); ?>" /></td>
                            <?php } else { ?>
                            	<input type="hidden" id="pfg_<?php echo $element_name; ?>" name="pfg_<?php echo $element_name; ?>" size="10" style="height:17px !important;" value="<?php echo $gr->getPreFinalGrade(); ?>" />
                            <?php } ?>
                            <td><input type="text" id="fg_<?php echo $element_name; ?>" name="fg_<?php echo $element_name; ?>" size="10" style="height:17px !important;" value="<?php echo $gr->getFinalGrade(); ?>" /></td>
                            <td>
                            	<select id="is_passed_<?php echo $element_name; ?>" name="is_passed_<?php echo $element_name ?>" style="width:100px !important; ">	
                                	<option <?php echo ($gr->getIsPassed() == CV_Course_Enrollees::FAILED ? 'selected="selected"' : ''); ?> value="<?php echo CV_Course_Enrollees::FAILED; ?>"><?php echo CV_Course_Enrollees::FAILED; ?></option>
                                    <option <?php echo ($gr->getIsPassed() == CV_Course_Enrollees::PASSED ? 'selected="selected"' : ''); ?> value="<?php echo CV_Course_Enrollees::PASSED; ?>"><?php echo CV_Course_Enrollees::PASSED; ?></option>
                                    <option <?php echo ($gr->getIsPassed() == CV_Course_Enrollees::DROPPED ? 'selected="selected"' : ''); ?> value="<?php echo CV_Course_Enrollees::DROPPED; ?>"><?php echo CV_Course_Enrollees::DROPPED; ?></option>
                                    <option <?php echo ($gr->getIsPassed() == CV_Course_Enrollees::INC ? 'selected="selected"' : ''); ?> value="<?php echo CV_Course_Enrollees::INC; ?>"><?php echo CV_Course_Enrollees::INC; ?></option>
                                    <option <?php echo ($gr->getIsPassed() == CV_Course_Enrollees::ABSENT ? 'selected="selected"' : ''); ?> value="<?php echo CV_Course_Enrollees::ABSENT; ?>"><?php echo CV_Course_Enrollees::ABSENT; ?></option>
                                    <option <?php echo ($gr->getIsPassed() == CV_Course_Enrollees::CONT ? 'selected="selected"' : ''); ?> value="<?php echo CV_Course_Enrollees::CONT; ?>"><?php echo CV_Course_Enrollees::CONT; ?></option>
                                </select>
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php if(!$grades) { ?>
                            <td colspan="5"><strong>No record(s) found.</strong></td>
                        <?php } ?>
                    </table>
            </div>
         </form>
        <br />
        <div class="pull-right">
        <?php if($cd->getIsLock() == CV_Course_Designation::YES) { ?>
        	<label class="action-link" title="Grading Sheet is Lock for editing"><i class="icon-lock"></i></label>
        <?php } else { ?>
        	<button class="btn btn-primary submit_button" onclick="$('#grading_sheet_form').submit();"><i class="icon-list-alt icon-white"></i> Save</button>
        <?php } ?>
        	
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php include('includes/wrappers.php'); ?>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>