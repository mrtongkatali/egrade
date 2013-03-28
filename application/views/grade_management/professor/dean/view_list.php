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
                            <th width="200">Final Exam</th>
                            <th width="200">Pre-Final Grade</th>
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
                            <td><?php echo $gr->getFinalExamGrade(); ?></td>
                            <td><?php echo $gr->getPreFinalGrade(); ?></td>
                            <td><?php echo $gr->getFinalGrade(); ?></td>
                            <td><?php echo $gr->getIsPassed(); ?></td>
                        </tr>
                        <?php endforeach;?>
                        <?php if(!$grades) { ?>
                            <td colspan="5"><strong>No record(s) found.</strong></td>
                        <?php } ?>
                    </table>
            </div>
         </form>
    </div>
</div>
<?php include('includes/wrappers.php'); ?>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>