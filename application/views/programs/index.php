<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		load_program_list_dt();
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <?php include('includes/wrappers.php'); ?>
    <div class="container float-left">
        <div class="h-wrapper-form-fields">
            <h3 class="module-header"><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Programs </h3>
            <div class="module-header-btn">
                <a id="show_program_form_link" style="margin-top:-2px;" href="javascript:void(0);" onclick="javascript:_showAddProgram();" role="button" class="btn btn-info">
                    <i class="icon-plus icon-white"></i>
                    Add New Program
                </a>
                <a id="close_program_form_link" href="javascript:void(0);" onclick="javascript:_closeProgramForm();" role="button" class="btn btn-info" style="display:none; margin-top:-2px;"><i class="icon-minus icon-white"></i>Hide Form</a>
            </div>
        </div>
        <div class="divider"></div>
        <div id="show_program_form_wrapper"></div>
        <br/><br/>
        <div id="program_list_dt_wrapper"></div>
    </div>     
</div>

<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>