<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>

<script>
	$(function() { 
		$('#tabs-nohdr').tabs();
		load_opened_course_list_dt();
	});
	
	var filter_type = 0;
	function view_type_filter(type) {
		if(type == 'open_course') {
			$('#view_curriculum_link').removeClass('active');
			$('#open_course_link').addClass('active');
			
			$('#curriculum_list_dt_wrapper').hide();
			$('#view_curriculum_filter').hide();
			load_opened_course_list_dt();
			
			filter_type = 0;
		} else {
			$('#open_course_link').removeClass('active');
			$('#view_curriculum_link').addClass('active');
			
			$('#curriculum_list_dt_wrapper').show();
			$('#view_curriculum_filter').show();
			$('#course_list_dt_wrapper').html('');
			
			filter_type = 1;
		}
	}
</script>

<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Course Management</h3><br/><br/><br/>
        <!-- STUDENT -->
        <div id="tabs-nohdr" style="width:915px;">
        	<ul> 
            	<li><a href="#tab1">Courses</a></li>
                <li><a href="#tab2" onclick="">Enrollees</a></li>
            </ul>
            <div id="tab1">
                <br/>
                <div id="menu-container" class="menu-container float-left" style="width:97%;">
                	<div style="float:left;">
                    	<a id="open_course_button" class="btn btn-info" style="margin-top: -2px; display: inline-block;" role="button" onclick="javascript:_openCourse();" href="javascript:void(0);"><i class="icon-plus icon-white"></i>Open New Course</a>
                    </div>
                    <div style="float:right;">
                        <div class="btn-group">
                            <a id="open_course_link" class="btn btn-info active" href="javascript:void(0);" onclick="javascript:view_type_filter('open_course');">Open Courses</a>
                            <a id="view_curriculum_link" class="btn btn-info" href="javascript:void(0);" onclick="javascript:view_type_filter('view_curriculum');">View Curriculum</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div id="view_curriculum_filter" style="display:none;"><?php include('includes/search_bar.php'); ?></div>
 
                <div id="open_course_form_wrapper"></div>
                <br/>
                <div id="course_list_dt_wrapper"></div>
                <div id="curriculum_list_dt_wrapper"></div>
            </div>
            <div id="tab2">
	            <br />
                <div id="enrollees_menu_wrapper" class="menu-container float-left" style="width:97%;">
                	<div style="float:left;">
                    	<a id="open_course_button" class="btn btn-info" style="margin-top: -2px; display: inline-block;"  onclick="javascript:_addEnrolleesForm();" href="javascript:void(0);"><i class="icon-plus icon-white"></i>Enroll Student</a>
                    </div>
                    <div style="float:right;">
                       Course : 
                        <select id="h_opened_course_id" name="h_opened_course_id" style="width:180px;" onchange="javascript:load_course_available_section_dropdown();">
                            <option value=""> - Select Course - </option>
                            <?php foreach($opened_course as $op): ?>
                                <option value="<?php echo Utilities::encrypt($op->getCourseId()); ?>"><?php echo $op->getCourseCode(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="course_available_section_wrapper" style="float:right;"></div>
                    </div>
                    <div class="clear"></div>
                </div>              
                <div class="clear"></div>
                <div id="add_enrollees_form_wrapper"></div>
                <div id="enrollee_list_dt_wrapper"></div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/wrappers.php'); ?>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>