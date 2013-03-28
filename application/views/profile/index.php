<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>

<script>
	function showModal(){
		$('#myModal').modal('show');
	}
</script>

<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <form id="course_page" name="course_page">
        <div class="adjust-left container">
            <h3>My Page</h3>
            <ul class="tabs sub-tabs">
                <li class="active"><a href="#">My Profile</a></li>
                <li><a href="#">My Account</a></li>
            </ul>
    	</div>
    </form>
</div>
<div id="edit_wrapper" style="display:none;"><?php include('modal/edit.php'); ?></div>
	
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>