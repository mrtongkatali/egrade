<div class="modal-header">
	<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
    <h3 id="myModalLabel">Course Details</h3>
</div>
<div class="form_content_wrapper">
<form id="add_curriculum_forrm" name="add_curriculum_forrm" method="post" action="<?php echo url('curriculum/ajax_insert_update_curriculum'); ?>">
<table width="100%" border="0">
    <tr>
        <td style="width:20%" align="left" valign="top">Course Code:</td>
        <td style="width:80%" align="left"><?php echo $course->getCourseCode(); ?></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Title:</td>
        <td style="width:80%" align="left"><?php echo $course->getTitle(); ?></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Description:</td>
        <td style="width:80%" align="left"><?php echo $course->getDescription(); ?></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Units:</td>
        <td style="width:80%" align="left"><?php echo $course->getUnits(); ?></td>
    </tr>
</table>
