<script>
    $(document).ready(function() {
        $('#curriculum_list_dt').dataTable( {
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,     
        "bScrollCollapse": false
        });
		
		$('.dataTables_filter').hide();
		$('.dataTables_paginate').hide();
		
		$('.dt_icons #edit').tipsy({gravity: 's'});
		$('.dt_icons #delete').tipsy({gravity: 's'});
    });
</script>

<table id="curriculum_list_dt" class="sphr">
    <thead>
      <tr>
      	<th align="left" valign="top" width="3%"></th>
        <th align="left" valign="top" width="10%">Course Code</th>
        <th align="left" valign="top" width="10%">Title</th>
        <th align="left" valign="top" width="3%">Units</th>
        <th align="left" valign="top" width="3%">Year</th>
        <th align="left" valign="top" width="3%">Semester</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($curriculum  as $c): ?>
    <?php  $course = CV_Courses_Finder::findById($c->getCourseId()); ?>
    <tr>
	    <td width="3%" align="left" valign="top">
            <ul class="dt_icons">
                <li><a id="edit" href="javascript:void(0);" onclick="javascript:_openCourseViaCurriculumDialog('<?php echo Utilities::encrypt($c->getProgramId()); ?>','<?php echo Utilities::encrypt($c->getCourseId()); ?>');" class="ui-icon ui-icon-plus" original-title="Open Course"></a></li>
            </ul>
        </td>
        
        
    	<td width="10%" align="left" valign="top"><?php echo $course->getCourseCode(); ?></td>
        <td width="30%" align="left" valign="top"><?php echo $course->getTitle(); ?></td>
        <td width="5%" align="left" valign="top"><?php echo $course->getUnits(); ?></td>
        <td width="3%" align="left" valign="top"><?php echo $c->getYearLevel(); ?></td>
        <td width="3%" align="left" valign="top"><?php echo $c->getSemester(); ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>	
</table>



