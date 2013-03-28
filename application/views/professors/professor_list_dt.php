<style>#professor_list_dt_length select {width:auto !important;}</style>
<script>
	$(function() {
		  var oTable = $('#professor_list_dt').dataTable({   
		   "aoColumns": [
					{ "bSortable": false,sWidth: '5%'},
					{sWidth: '10%',sClass:'dt_small_font'},
					{sWidth: '10%',sClass:'dt_small_font'},
					{sWidth: '15%',sClass:'dt_small_font'},
					{sWidth: '5%',sClass:'dt_small_font'},
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
			'sAjaxSource': base_url + 'professors/load_server_pofessor_list_dt',
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
			<th align="left" valign="top" width="10%">Professor Number</th>
			<th align="left" valign="top" width="10%">College</th>
			<th align="left" valign="top" width="10%">Name</th>
			<th align="left" valign="top" width="10%">Gender</th>
			<th align="left" valign="top" width="10%">Email Address</th>
			<th align="left" valign="top" width="10%">Mobile</th>
		</tr>
    </thead>
    <tbody>   
    </tbody>	
</table>
</div>
