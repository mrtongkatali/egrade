<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>

<script>
	$(function() {
		$('.action-link').tipsy({gravity: 's'});
	});
</script>

<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Grade Management</h3><br/><br/><br/>
		<?php include('includes/wrappers.php'); ?>
         <div class="form-container">
         	<h3 class="section_title"><strong>Student Information</strong></h3>
            <br />
			<br />
			<?php 
				$formatted_fullname = ucfirst($student->getLastName()) . ', ' . ucfirst($student->getFirstName())  . ' (' . ucfirst($student->getMiddleName()) . ')';
			?>
            <table class="form-default no-border" width="100%">
              <tbody>
              <tr>
                <td width="20%" class="field_label">Student Number:</td>
                <td width="80%"><?php echo $student->getStudentEmployeeCode(); ?></td>
              </tr>
              <tr>
                <td width="20%" class="field_label">Full Name:</td>
                <td width="80%"><?php echo $formatted_fullname; ?></td>
              </tr>
              <tr>
                <td width="20%" class="field_label">Program:</td>
                <td width="80%"><?php echo $student->getProgramCode(); ?></td>
              </tr>
              <tr>
                <td width="20%" class="field_label">Year Level:</td>
                <td width="80%"><?php echo Tools::getOrdinalSuffix(4); ?></td>
              </tr>
            </tbody>
         </table>
         </div>
         
        <br />
		<br />
        
        <div id="course_list_wrapper">
         <table class="sphr formtable" width="100%">
            <thead>
                <tr>
                <th></th>
                <th width="150">Course Code</th>
                <th width="300">Course Title</th>
                <th width="">Section</th>
                <th width="">Professor</strong></th>
                <th width="">Submission Date</th>
            </tr>
            </thead>
			<?php foreach ($courses as $c):?>
            <?php 
				$cd = CV_Course_Designation_Finder::findById($c->getCourseDesignationId());
			?>
                <tr>
                	<td>
                    	<?php if($cd->getIsLock() != 'Yes') { ?>
                        	<a id="final_exam_grade" class="action-link" title="Grading Sheet" href="javascript:void(0);" onclick="javascript:_gradingSheetDialog('<?php echo Utilities::encrypt($c->getId()); ?>')"><i class="icon-list"></i></a>
                        <?php } else {?>
                        	<label class="action-link" title="Cannot be edit"><i class="icon-lock"></i></label>
                        <?php } ?>
                    </td>
                    <td><strong><?php echo $cd->getCourseCode(); ?></strong></td>
                    <td><strong><?php echo $cd->getCourseTitle(); ?></strong></td>
                    <td><?php echo $cd->getSection(); ?></td>
                    <td><?php echo $cd->getProfessorName(); ?></td>
                    <td><?php echo $cd->getSubmissionDate(); ?></td>
                </tr>
                <?php endforeach;?>
                <?php if(!$courses) { ?>
                    <td colspan="6"><strong>No record(s) found.</strong></td>
                <?php } ?>
        </table>
        </div>

    </div>
</div>
<?php include('includes/wrappers.php'); ?>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>