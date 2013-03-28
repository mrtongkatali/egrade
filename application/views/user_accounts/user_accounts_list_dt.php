<style>#student_list_dt_length select {width:auto !important;}</style>
<script>
	$(function() {
		  var oTable = $('#user_accounts_list_dt').dataTable({   
		   "aoColumns": [
					{ "bSortable": false,sWidth: '3%'},
					{sWidth: '15%',sClass:'dt_small_font'},
					{sWidth: '10%',sClass:'dt_small_font'},
					{sWidth: '5%',sClass:'dt_small_font'},
					{sWidth: '3%',sClass:'dt_small_font'},
			 ],
			'bProcessing':true,
			'bServerSide':true,
			"bAutoWidth": true,
			"bInfo":false,
			"bJQueryUI": true,
			"aaSorting": [[ 1, "asc" ]],
			"sPaginationType": "full_numbers",
			"bPaginate": true,
			'sAjaxSource': base_url + 'user_accounts/load_server_users_accounts_list_dt',
			"fnDrawCallback": function() {
					$('.i_container #edit').tipsy({gravity: 's'});
					$('.i_container #delete').tipsy({gravity: 's'});
					
				}
			});
	});
</script>

	<table id="user_accounts_list_dt" class="sphr">
	    <thead>
			<tr>
				<th align="left" valign="top" width="3%"></th>
                <th align="left" valign="top" width="25%"><b>Full Name</b></th>
				<th align="left" valign="top" width="25%"><b>Username</b></th>
				<th align="left" valign="top" width="10%"><b>Account Type</b></th>
                <th align="left" valign="top" width="10%"><b>Is Active</b></th>
			</tr>
	    </thead>
	    <tbody>   
	    </tbody>	
	</table>
</div>
