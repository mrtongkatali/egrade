<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		load_user_accounts_list_dt();
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <?php include('includes/wrappers.php'); ?>
    <div class="container float-left">
        <h3>
            <img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/students.png'; ?>" width="35px" height="35px" class="header_icon" /> 
            Manage User Accounts
        </h3><br/><br/><br/>
        <a id="add_user_account_form_button" href="javascript:void(0);" onclick="javascript:_addUserAccountDialog();" role="button" class="btn btn-info" style="margin-top:-2px;">
            <i class="icon-plus icon-white"></i>
            Add New User
        </a>
        <div id="show_user_account_form_wrapper"></div> 
         
        <br/>
        <div id="user_accounts_list_dt_wrapper"></div>
    </div>     
</div>

<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>