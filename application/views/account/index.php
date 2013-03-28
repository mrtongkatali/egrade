<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <div class="h-wrapper-form-fields">
            <h3 class="module-header"><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Account / Profile Settings </h3>
        </div>
        <br />
		<br />
        
        <div class="form-container">
        	<div id="edit_account_details_form_wrapper"></div>
            <div id="account_details_wrapper">
                <?php include('includes/account_details.php'); ?>
          	</div>
        <div id="edit_button_wrapper" class="form_action_section" align="center">
            <a class="btn btn-primary submit_button" href="javascript:void(0);" onclick="javascript:load_edit_account_details_form();"><i class="icon-edit icon-white"></i> Update Details</a>
        </div>
     </div>
<br />
<br />

    </div>     
</div>

<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>