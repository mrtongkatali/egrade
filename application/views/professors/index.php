<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		load_professor_list_dt();
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <?php include('includes/wrappers.php'); ?>
    <div class="container float-left">
        <div class="h-wrapper-form-fields">
            <h3 class="module-header">
                <img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/professors.png'; ?>" width="35px" height="35px" class="header_icon" /> 
               	Professor Listing
            </h3>
            <div class="module-header-btn">
                <a id="show_professor_form" href="javascript:void(0);" onclick="javascript:_showAddProfessorForm();" role="button" class="btn btn-info" style="margin-top:-2px;">
                    <i class="icon-plus icon-white"></i>
                    Add New Professor</a>
                <a id="close_professor_form" style="display:none;" href="javascript:void(0);" onclick="javascript:closeAddProfessorForm();" role="button" class="btn btn-info" style="margin-top:-2px;"><i class="icon-minus icon-white"></i>Hide Form</a>
            </div>
        </div>
        <div class="divider"></div>
        <div id="show_professor_form_wrapper"></div> 
        <br />
        <div id="professor_list_dt_wrapper"></div>
    </div>     
</div>





<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>