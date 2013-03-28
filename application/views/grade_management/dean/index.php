<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		load_course_list_dt();
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Grade Management</h3><br/><br/><br/>
        <div id="course_list_dt_wrapper"></div>
    </div>
</div>
<?php include('includes/wrappers.php'); ?>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>