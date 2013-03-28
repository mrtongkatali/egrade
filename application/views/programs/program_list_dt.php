<script>
	$(function() {
		  var oTable = $('#course_list_dt').dataTable({   
		   "aoColumns": [
					{ "bSortable": false,sWidth: '3%'},
					{sWidth: '5%',sClass:'dt_small_font'},
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
			'sAjaxSource': base_url + 'programs/load_server_program_list_dt',
			"fnDrawCallback": function() {
					$('.i_container #edit').tipsy({gravity: 's'});
					$('.i_container #delete').tipsy({gravity: 's'});
					$('.i_container #view').tipsy({gravity: 's'});
				}
			});
	});
</script>

<table id="course_list_dt" class="sphr">
    <thead>
      <tr>
      	<th align="left" valign="top" width="10%"></th>
        <th align="left" valign="top" width="10%">Program Code</th>
        <th align="left" valign="top" width="10%">Title</th>
        <th align="left" valign="top" width="10%">Is Offered</th>
      </tr>
    </thead>
    <tbody>   
    </tbody>	
</table>
</div>
