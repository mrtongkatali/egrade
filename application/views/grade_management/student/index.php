<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		$('.action-link').tipsy({gravity: 's'});
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> My Grades</h3><br/><br/><br/>
        
        SY: &nbsp;&nbsp;
        <select id="school_year" name="school_year" style="width:150px;">
        <?php foreach($school_year as $key=>$value): ?>
        	<option value="<?php echo $value['school_year']; ?>"><?php echo $value['school_year']; ?></option>
		<?php endforeach; ?>
        </select>
        &nbsp;&nbsp;
        Semester: &nbsp;&nbsp;
        <select id="semester" name="semester" style="width:150px;">
        	<option value="1">1st</option>
            <option value="2">2nd</option>
        </select>
        &nbsp;&nbsp;
        <a class="btn btn-primary submit_button" href="javascript:void(0);" onclick="javascript:load_student_grades_list();"><i class="icon-zoom-in icon-white"></i>View</a>
        <br />
		<br />
		<br />

		<div id="student_grade_list_wrapper"></div>

    </div>
</div>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>