<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<script>
	$(function() {
		$('.action-link').tipsy({gravity: 's'});
	});
	
	function view_courses(type)	{
		if(type == 1) {
			$('#all_courses_link').removeClass('active');	
			$('#my_courses_link').addClass('active');
			
			$('#my_courses_list_dt_wrapper').show();
			$('#all_courses_list_dt_wrapper').hide();
		} else {
			$('#my_courses_link').removeClass('active');	
			$('#all_courses_link').addClass('active');
			
			$('#all_courses_list_dt_wrapper').show();
			$('#my_courses_list_dt_wrapper').hide();
			load_course_list_dt();
		}
	}
</script>
<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/record.png'; ?>" width="35px" height="35px" class="header_icon" /> Grade Management</h3><br/><br/><br/>
        <div class="btn-group pull-right">
            <a id="my_courses_link" href="javascript:void(0);" onclick="javascript:view_courses(1);" class="btn btn-primary active">My Courses</a>
            <a id="all_courses_link" href="javascript:javascript:void(0);" onclick="javascript:view_courses(2);" class="btn btn-primary">All Courses</a>
        </div>
        <div class="clear"></div>
        <br />
		<div id="all_courses_list_dt_wrapper"></div>
        <div id="my_courses_list_dt_wrapper">
           	<table class="sphr formtable" width="100%">
                <thead>
                    <tr>
                        <th width="100">Course Code</th>
                        <th width="300">Course Title</th>
                        <th width="">Section</th>
                        <th width="">Enrollees</th>
                        <th width="">Submission Date</th>
                        <th width="10"></th>
                    </tr>
                </thead>
                <?php foreach ($courses as $c):?>
					<?php 
						$h_id = Utilities::encrypt($c->getId());
						$access_token = Utilities::createHash($c->getId());
						$total_enrolless 	= CV_Course_Enrollees_Helper::getTotalNumberEnrolleesByCourseDesignationId($c->getId());
					?>
						<tr>
							<td><a href="<?php echo url('grade_management/manage?h_id='."{$h_id}&access_token={$access_token}"); ?>"><strong><?php echo $c->getCourseCode(); ?></strong></a></td>             
							<td><a href="<?php echo url('grade_management/manage?h_id='."{$h_id}&access_token={$access_token}"); ?>"><strong><?php echo $c->getCourseTitle(); ?></strong></a></td>
							<td><?php echo $c->getSection(); ?></td>
							<td><?php echo $total_enrolless; ?></td>
							<td><?php echo $c->getSubmissionDate(); ?></td>
							<td align="right">
								<?php if($c->getIsLock() == CV_Course_Designation::YES) { ?>
									<label class="action-link" title="Lock for editing"><i class="icon-lock"></i></label>
								<?php } ?>
							</td>
						</tr>
                <?php endforeach;?>
                <?php if(!$courses) { ?>
                    <td colspan="4"><strong>No record(s) found.</strong></td>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php include('includes/wrappers.php'); ?>
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>