<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {  
		//load_add_curriculum();
        load_curriculum_list_dt();
		$('#tabs-nohdr').tabs();
	});
</script>

<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
     <div class="module-title">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/courses_header-logo.png'; ?>" width="35px" height="35px" class="header_icon" />Settings</h3>
    </div>
    <div class="container float-left">
        <div id="tabs-nohdr" style="width:915px;">
        	<ul> 
            	<li><a href="#tab1">Users</a></li>
                <li><a href="#tab2">Curriculum</a></li>
                <li><a href="#tab3">School Year</a></li>
                <li><a href="#tab4">Semester</a></li>
                <li><a href="#tab5">Section</a></li>
            </ul>
            <div id="tab1">
                <div align="left"></div><br/>
                <div id="users_container"></div>
            </div>
            <div id="tab2">
                <div align="left"></div><br/>
                <div id="new_curriculum_container"></div>
            </div>
            <div id="tab3">
                <div align="left"></div><br/>
                <div id="sy_container"></div> 
            </div>
            <div id="tab4">
                <div align="left"></div><br/>
                <div id="semester_container"></div> 
            </div>
            <div id="tab5">
                <div align="left"></div><br/>
                <div id="section_container"></div> 
            </div>
        </div>
    </div>
</div>
	
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>