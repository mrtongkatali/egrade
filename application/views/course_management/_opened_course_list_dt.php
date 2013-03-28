<script>
	$(function() {
		  var oTable = $('#opened_course_list_dt').dataTable({   
		   "aoColumns": [
					{ "bSortable": false,sWidth: '4%'},
					{sWidth: '5%',sClass:'dt_small_font'},
					{sWidth: '15%',sClass:'dt_small_font'},
					{sWidth: '5%',sClass:'dt_small_font'},
					{sWidth: '5%',sClass:'dt_small_font'},
					{sWidth: '5%',sClass:'dt_small_font'},
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
			'sAjaxSource': base_url + 'course_management/load_server_opened_course_list_dt',
			"fnDrawCallback": function() {
					$('.i_container #edit').tipsy({gravity: 's'});
					$('.i_container #delete').tipsy({gravity: 's'});
					$('.i_container #view').tipsy({gravity: 's'});
				}
			});
	});
</script>

<table id="opened_course_list_dt" class="sphr">
    <thead>
      <tr>
      	<th align="left" valign="top" width="10%"></th>
        <th align="left" valign="top" width="10%">Program</th>
        <th align="left" valign="top" width="10%">Course Title</th>
        <th align="left" valign="top" width="10%">School Year</th>
        <th align="left" valign="top" width="10%">Sem</th>
        <th align="left" valign="top" width="10%">Section</th>
        <th align="left" valign="top" width="10%">Professor</th>
      </tr>
    </thead>
    <tbody>   
    </tbody>	
</table>
</div>
