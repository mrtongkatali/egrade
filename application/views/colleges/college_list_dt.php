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
      	<th align="left" valign="top" width="5%"></th>
        <th align="left" valign="top" width="10%">Code</th>
        <th align="left" valign="top" width="30%">College Name</th>
        <th align="left" valign="top" width="15%">Dean</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($colleges  as $c): ?>
    <tr>
	    <td width="5%" align="left" valign="top">
            <ul class="dt_icons">
                <li><a id="edit" title="Edit" href="javascript:void(0);" onclick="javascript:_showEditProgramForm('<?php echo Utilities::encrypt($c->getId());  ?>');" class="ui-icon ui-icon-pencil" original-title="Edit"></a></li>
                <li><a title="Delete" id="delete" class="ui-icon ui-icon-trash g_icon" href="javascript:void(0);" onclick="javascript:_deleteCollegeDialog('<?php echo Utilities::encrypt($c->getId()); ?>')"></a></li>
            </ul>
        </td>
        <td width="10%" align="left" valign="top"><?php echo $c->getCollegeCode(); ?></td>
    	<td width="30%" align="left" valign="top"><?php echo $c->getCollegeName(); ?></td>
        <td width="15%" align="left" valign="top">
			<?php 
				$dean = CV_Members_Finder::findById($c->getMemberId());
				echo $dean->getFullName();
			?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>	
</table>



