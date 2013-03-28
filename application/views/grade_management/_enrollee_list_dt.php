<script>
	$(function() {
		var h_course_designation_id = $('#h_course_desgination_id').val();
		  var oTable = $('#course_list_dt').dataTable({   
		   "aoColumns": [
					{ "bSortable": false,sWidth: '3%'},
					{sWidth: '10%',sClass:'dt_small_font'},
					{sWidth: '30%',sClass:'dt_small_font'},
					{sWidth: '5%',sClass:'dt_small_font'},
			 ],
			'bProcessing':true,
			'bServerSide':true,
			"bAutoWidth": true,
			"bInfo":false,
			"bJQueryUI": true,
			"aaSorting": [[ 1, "asc" ]],
			"sPaginationType": "full_numbers",
			"bPaginate": true,
			'sAjaxSource': base_url + 'grade_management/load_server_enrollee_list_dt?h_course_designation_id='+h_course_designation_id,
			"fnDrawCallback": function() {
					$('.i_container #edit').tipsy({gravity: 's'});
					$('.i_container #delete').tipsy({gravity: 's'});
					$('.i_container #view').tipsy({gravity: 's'});
				}
			});
	});
</script>
<input type="hidden" id="h_course_desgination_id" name="h_course_desgination_id" value="<?php echo $h_course_designation_id; ?>" />
<table id="course_list_dt" class="sphr">
    <thead>
      <tr>
      	<th align="left" valign="top" width="10%"></th>
        <th align="left" valign="top" width="10%">Course Code</th>
        <th align="left" valign="top" width="10%">Title</th>
        <th align="left" valign="top" width="10%">Units</th>
      </tr>
    </thead>
    <tbody>   
    </tbody>	
</table>
</div>
