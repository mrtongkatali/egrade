<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		$('.action-link').tipsy({gravity: 's'});
	});
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Grade Management</h3><br/><br/><br/>
        
        <!--<form id="search_student_number_form" name="search_student_number_form" method="get" action="<?php echo url('grade_management/search_student'); ?>">
        <input type="text" id="query" name="query" size="40" placeholder="Student Name or Number or Course" value="<?php echo $query; ?>" />
        <button class="btn btn-primary submit_button" onclick="$('#search_student_number_form').submit();"><i class="icon-search icon-white"></i>Search Student</button>&nbsp;&nbsp;
        <label><input type="checkbox" id="is_exact" name="is_exact" <?php echo ($is_exact == 'on' ? 'checked="checked"' : ''); ?> />&nbsp;&nbsp;Exact Query</label>
        </form>
        
        <br />
        <table class="sphr formtable" width="100%">
            <thead>
                <tr>
                <th width="150">Student Number</th>
                <th width="300">Name</th>
                <th width="">Program</th>
                <th width="">Year Level</th>
                <th width="">Is Enrolled?</th>
            </tr>
            </thead>
        <?php foreach ($students as $row=>$value):?>
        <?php 
			$formatted_fullname = ucfirst($value['lastname']) . ', ' . ucfirst($value['firstname']) . ' (' . ucfirst($value['middlename']) . ')';
			$h_id = Utilities::encrypt($value['id']);
			$access_token = Utilities::createHash($value['id']);
		?>
            <tr>
            	<td><a href="<?php echo url('grade_management/manage?h_id='."{$h_id}&access_token={$access_token}"); ?>"><strong><?php echo $value['student_employee_code']; ?></strong></a></td>
                <td><strong><?php echo $formatted_fullname; ?></strong></td>               
                <td><?php echo $value['program_code']; ?></td>
                <td><?php echo Tools::getOrdinalSuffix($value['year_level']); ?></td>
                <td><?php echo $value['is_enrolled']; ?></td>
            </tr>
            <?php endforeach;?>
            <?php if(!$students) { ?>
            	<td colspan="5"><strong>No record(s) found.</strong></td>
            <?php } ?>
        </table>
         
        <br />
		<br />
        <br />
		<br />-->
        
       <form id="search_course_form" name="search_course_form" method="get" action="<?php echo url('grade_management/search_course_section'); ?>">
        <input type="text" id="query" name="query" size="40" placeholder="Course Code or Title or Section" value="<?php echo $section_query; ?>" />
        <button class="btn btn-danger submit_button" onclick="$('#search_course_form').submit();"><i class="icon-search icon-white"></i>Search Course</button>&nbsp;&nbsp;
        <label><input type="checkbox" id="is_exact_course" name="is_exact_course" <?php echo ($is_exact_course == 'on' ? 'checked="checked"' : ''); ?> />&nbsp;&nbsp;Exact Query</label>
        </form>
        
        <br />
         <table class="sphr formtable" width="100%">
            <thead>
                <tr>
                <th width="10"></th>
                <th width="150">Course Code</th>
                <th width="300">Course Title</th>
                <th width="">Section</th>
                <th width="">Enrollees</th>
                <th width="">Professor</th>
                <th width="">Submission Date</th>
            </tr>
            </thead>
        <?php foreach ($courses as $row=>$value):?>
        <?php 
			$h_id 				= Utilities::encrypt($value['id']);
			$access_token 		= Utilities::createHash($value['id']);
			$total_enrolless 	= CV_Course_Enrollees_Helper::getTotalNumberEnrolleesByCourseDesignationId($value['id']);
		?>
            <tr>
            	<td><a class="action-link" title="View Enrollees" href="<?php echo url('grade_management/manage?h_id='."{$h_id}&access_token={$access_token}"); ?>"><i class="icon-zoom-in"></i></a></td>
            	<td><a href="<?php echo url('grade_management/manage?h_id='."{$h_id}&access_token={$access_token}"); ?>"><strong><?php echo $value['course_code']; ?></strong></a></td>             
                <td><?php echo $value['course_title']; ?></td>
                <td><?php echo $value['section']; ?></td>
                <td><?php echo $total_enrolless; ?></td>
                <td><?php echo $value['professor_name']; ?></td>
                <td><?php echo $value['submission_date']; ?></td>
            </tr>
            <?php endforeach;?>
            <?php if(!$courses) { ?>
            	<td colspan="5"><strong>No record(s) found.</strong></td>
            <?php } ?>
        </table>


    </div>
</div>
<?php include('includes/wrappers.php'); ?>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>