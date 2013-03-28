<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>

<script>
	$(function() { 
		load_my_account(); 
		load_server_grades_dt();
        load_server_curriculum_dt(); 
		$('#tabs-nohdr').tabs();
	});
</script>

<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/profile.png'; ?>" width="42px" height="42px" class="header_icon" /> My Page</h3><br/><br/>
   <!-- <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a> -->
        
        <!-- TEACHER -->
        <!-- <div id="tabs-nohdr" style="width:915px;">
            <ul> 
                <li><a href="#tab1">My Students</a></li>
                <li><a href="#tab2">My Account</a></li>
            </ul>
            <div id="tab1">
                <div align="left"></div><br/>
                <div id="my_students_container"></div>
            </div>
            <div id="tab2">
                <div align="left"></div><br/>
                <div id="account_container"></div>
            </div>
        </div> -->
        
        <!-- STUDENT -->
        <div id="tabs-nohdr" style="width:915px;">
        	<ul> 
            	<li><a href="#tab1">My Grades</a></li>
                <li><a href="#tab2">My Curriculum</a></li>
                <li><a href="#tab3">My Account</a></li>
            </ul>
            <div id="tab1">
                <div align="left"></div><br/>
                <div id="grades_container"></div>
            </div>
            <div id="tab2">
                <div align="left"></div><br/>
                <div id="curriculum_container"></div>
            </div>
            <div id="tab3">
                <div align="left"></div><br/>
                <div id="account_container"></div> 
            </div>
        </div>
    </div>
</div>


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Modal header</h3>
</div>
<div class="modal-body">
<p>One fine body…</p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Save changes</button>
</div>
</div>
	
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>