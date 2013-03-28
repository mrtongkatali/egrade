<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		load_student_list_dt();
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <?php include('includes/wrappers.php'); ?>
    <div class="container float-left">
        <div class="h-wrapper-form-fields">
            <h3 class="module-header">
                <img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/students.png'; ?>" width="35px" height="35px" class="header_icon" /> 
                Student Listing
            </h3>
            <div class="module-header-btn">
                <a id="show_student_form" href="javascript:void(0);" onclick="javascript:_showAddStudentForm();" role="button" class="btn btn-info" style="margin-top:-2px;">
                    <i class="icon-plus icon-white"></i>
                    Add New Student</a>
                <a id="close_student_form" style="display:none;" href="javascript:void(0);" onclick="javascript:closeAddStudentForm();" role="button" class="btn btn-info" style="margin-top:-2px;"><i class="icon-minus icon-white"></i>Hide Form</a>
            </div>
        </div>
        <div class="divider"></div>
        <div id="show_student_form_wrapper"></div>
        <br /><br/>
        <div id="student_list_dt_wrapper"></div>
    </div>     
</div>

<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>