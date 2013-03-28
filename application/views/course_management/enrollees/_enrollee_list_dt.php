<script>
	$(function() {
		var h_section_id 	= $('#h_available_section_id').val();
		
		  var oTable = $('#enrollee_list_dt').dataTable({   
		   "aoColumns": [
					{ "bSortable": false,sWidth: '2%'},
					{sWidth: '10%',sClass:'dt_small_font'},
					{sWidth: '15%',sClass:'dt_small_font'},
					{sWidth: '15%',sClass:'dt_small_font'},
					{sWidth: '10%',sClass:'dt_small_font'},
			 ],
			'bProcessing':true,
			'bServerSide':true,
			"bAutoWidth": true,
			"bInfo":false,
			"bJQueryUI": true,
			"aaSorting": [[ 1, "asc" ]],
			"sPaginationType": "full_numbers",
			"bPaginate": true,
			'sAjaxSource': base_url + 'course_management/load_server_enrollee_list_dt?h_section_id='+h_section_id,
			"fnDrawCallback": function() {
					$('.i_container #add_grade').tipsy({gravity: 's'});
					$('.i_container #delete').tipsy({gravity: 's'});
					$('.i_container #view').tipsy({gravity: 's'});
				}
			});
	});
</script>

<table id="enrollee_list_dt" class="sphr">
    <thead>
      <tr>
      	<th align="left" valign="top" width="10%"></th>
        <th align="left" valign="top" width="10%">Program</th>
        <th align="left" valign="top" width="10%">Student Number</th>
        <th align="left" valign="top" width="10%">Student Name</th>
        <th align="left" valign="top" width="10%">Status</th>
      </tr>
    </thead>
    <tbody>   
    </tbody>	
</table>
</div>
