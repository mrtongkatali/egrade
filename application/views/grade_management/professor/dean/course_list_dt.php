<style>#professor_list_dt_length select {width:auto !important;}</style>
<script>
	$(function() {
		  var oTable = $('#professor_list_dt').dataTable({   
		   "aoColumns": [
					{ "bSortable": false,sWidth: '1%'},
					{sWidth: '5%',sClass:'dt_small_font'},
					{sWidth: '10%',sClass:'dt_small_font'},
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
			'sAjaxSource': base_url + 'grade_management/load_server_course_list_dt',
			"fnDrawCallback": function() {
					$('.i_container #edit').tipsy({gravity: 's'});
					$('.i_container #delete').tipsy({gravity: 's'});
					$('.i_container #view').tipsy({gravity: 's'});
				}
			});
	});
</script>

<table id="professor_list_dt" class="sphr">
    <thead>
		<tr>
			<th align="left" valign="top" width="10%"></th>
			<th align="left" valign="top" width="10%">Course Code</th>
			<th align="left" valign="top" width="10%">Title</th>
			<th align="left" valign="top" width="10%">Section</th>
			<th align="left" valign="top" width="10%">Professor</th>
		</tr>
    </thead>
    <tbody>   
    </tbody>	
</table>
</div>
