<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		//load_course_list_dt();
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <?php include('includes/wrappers.php'); ?>
    <div class="container float-left">
        <div class="h-wrapper-form-fields">
            <h3 class="module-header"><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Manage Curriculum </h3>
            <div class="module-header-btn">
                <a id="add_curriculum_form_button" href="javascript:void(0);" onclick="javascript:_showAddStudentForm();" role="button" class="btn btn-info" style="margin-top:-2px;">
                    <i class="icon-plus icon-white"></i>
                    Add New Curriculum
                </a>
                <a id="close_curriculum_form_button" style="display:none;" href="javascript:void(0);" onclick="javascript:closeCurriculumForm();" role="button" class="btn btn-info" style="margin-top:-2px;"><i class="icon-minus icon-white"></i>Hide Form</a>
            </div>
        </div>
        <div class="divider"></div><br/>
        <div id="action_button_holder"><?php include('includes/search_bar.php'); ?></div>
        <div id="curriculum_form_wrapper"></div>
        <div id="curriculum_list_wrapper"></div>
    </div>     
</div>

<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>