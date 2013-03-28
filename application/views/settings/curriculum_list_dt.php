<script>
$(document).ready(function() {
    $(document).ready(function() {
        $('#first_sem').dataTable( {
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,     
        "bScrollCollapse": false
        });
    });
    $(document).ready(function() {
        $('#second_sem').dataTable( {
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,     
        "bScrollCollapse": false
        });
    });
});
</script>

<table>
	<tr>
		<td><a class="btn btn-primary" href="<?php echo url('settings/load_add_curriculum'); ?>"><i class="icon-plus icon-white"></i>Add Curriculum</a></td>
		<td>Year Level:</td>
		<td>
			<div class="btn-group">
			    <a class="btn btn-info" href="#">1st</a>
			    <a class="btn btn-info" href="#">2nd</a>
			    <a class="btn btn-info" href="#">3rd</a>
			    <a class="btn btn-info" href="#">4th</a>
			</div>
		</td>
	</tr>
</table>

<br/><br/>
<div style="background: #cfd4d7; font-size: 15px; font-weight: bold; padding: 5px; text-align: center; text-transform: uppercase; width:98.5%;">First Semester</div>
<table class="table" id="first_sem">
    <thead>
	<tr>
		<th align="left" valign="top" width="10%"><b>Options</b></th>
		<th align="left" valign="top" width="10%"><b>Yr. Level</b></th>
		<th align="left" valign="top" width="10%"><b>Course Code</b></th>
		<th align="left" valign="top" width="10%"><b>Course Title</b></th>
		<!-- <th align="left" valign="top" width="10%"><b>Classification</b></th>
		<th align="left" valign="top" width="10%"><b>Units</b></th> -->
		<th align="left" valign="top" width="10%"><b>Pre-requisites</b></th>
	</tr>
    </thead>
    <tbody>
    	<tr>
    		<td>
    			<a href="#"><i class="icon-search"></i></a>
    			<a href="#"><i class="icon-pencil"></i></a>
    			<a href="#"><i class="icon-trash"></i></a>
    		</td>
	    	<td align="left" valign="top" width="10%">1st</td>
			<td align="left" valign="top" width="10%">CS104</td>
			<td align="left" valign="top" width="10%">
				System Analysis and Design<br/>
				<div style="color: #0e74bc; font-size:11px; font-weight: bold;">
					<span style="color: red;">Lecture</span> - 3 units
				<div>
			</td>
			<!-- <td align="left" valign="top" width="10%">Lecture</td>
			<td align="left" valign="top" width="10%">3</td> -->
			<td align="left" valign="top" width="10%">CS103</td>
		</tr>
		<tr>
			<td>
    			<a href="#"><i class="icon-search"></i></a>
    			<a href="#"><i class="icon-pencil"></i></a>
    			<a href="#"><i class="icon-trash"></i></a>
    		</td>
	    	<td align="left" valign="top" width="10%">1st</td>
			<td align="left" valign="top" width="10%">CS104</td>
			<td align="left" valign="top" width="10%">
				System Analysis and Design
				<div style="color: #0e74bc; font-size:11px; font-weight: bold;">
					<span style="color: orange;">Paired</span> - 3 units
				<div>
			</td>
			<!-- <td align="left" valign="top" width="10%">Lecture/Practical</td>
			<td align="left" valign="top" width="10%">3</td> -->
			<td align="left" valign="top" width="10%">CS103</td>
		</tr>
		<tr>
			<td>
    			<a href="#"><i class="icon-search"></i></a>
    			<a href="#"><i class="icon-pencil"></i></a>
    			<a href="#"><i class="icon-trash"></i></a>
    		</td>
	    	<td align="left" valign="top" width="10%">1st</td>
			<td align="left" valign="top" width="10%">CS104</td>
			<td align="left" valign="top" width="10%">
				System Analysis and Design
				<div style="color: #0e74bc; font-size:11px; font-weight: bold;">
					<span style="color: green;">Practical</span> - 3 units
				<div>
			</td>
			<!-- <td align="left" valign="top" width="10%">Practical</td>
			<td align="left" valign="top" width="10%">3</td> -->
			<td align="left" valign="top" width="10%">CS103</td>
		</tr>
    </tbody>	
</table>
<br/>
<!-- Second Semester -->
<div style="background: #cfd4d7; font-size: 15px; font-weight: bold; padding: 5px; text-align: center; text-transform: uppercase; width:98.5%;">Second Semester</div>
<table class="table" id="second_sem">
    <thead>
	<tr>
		<th align="left" valign="top" width="10%"><b>Options</b></th>
		<th align="left" valign="top" width="10%"><b>Yr. Level</b></th>
		<th align="left" valign="top" width="10%"><b>Course Code</b></th>
		<th align="left" valign="top" width="10%"><b>Course Title</b></th>
		<!-- <th align="left" valign="top" width="10%"><b>Classification</b></th>
		<th align="left" valign="top" width="10%"><b>Units</b></th> -->
		<th align="left" valign="top" width="10%"><b>Pre-requisites</b></th>
	</tr>
    </thead>
    <tbody>
    	<tr>
    		<td>
    			<a href="#"><i class="icon-search"></i></a>
    			<a href="#"><i class="icon-pencil"></i></a>
    			<a href="#"><i class="icon-trash"></i></a>
    		</td>
	    	<td align="left" valign="top" width="10%">1st</td>
			<td align="left" valign="top" width="10%">CS104</td>
			<td align="left" valign="top" width="10%">
				System Analysis and Design<br/>
				<div style="color: #0e74bc; font-size:11px; font-weight: bold;">
					<span style="color: red;">Lecture</span> - 3 units
				<div>
			</td>
			<!-- <td align="left" valign="top" width="10%">Lecture</td>
			<td align="left" valign="top" width="10%">3</td> -->
			<td align="left" valign="top" width="10%">CS103</td>
		</tr>
		<tr>
			<td>
    			<a href="#"><i class="icon-search"></i></a>
    			<a href="#"><i class="icon-pencil"></i></a>
    			<a href="#"><i class="icon-trash"></i></a>
    		</td>
	    	<td align="left" valign="top" width="10%">1st</td>
			<td align="left" valign="top" width="10%">CS104</td>
			<td align="left" valign="top" width="10%">
				System Analysis and Design
				<div style="color: #0e74bc; font-size:11px; font-weight: bold;">
					<span style="color: orange;">Paired</span> - 3 units
				<div>
			</td>
			<!-- <td align="left" valign="top" width="10%">Lecture/Practical</td>
			<td align="left" valign="top" width="10%">3</td> -->
			<td align="left" valign="top" width="10%">CS103</td>
		</tr>
		<tr>
			<td>
    			<a href="#"><i class="icon-search"></i></a>
    			<a href="#"><i class="icon-pencil"></i></a>
    			<a href="#"><i class="icon-trash"></i></a>
    		</td>
	    	<td align="left" valign="top" width="10%">1st</td>
			<td align="left" valign="top" width="10%">CS104</td>
			<td align="left" valign="top" width="10%">
				System Analysis and Design
				<div style="color: #0e74bc; font-size:11px; font-weight: bold;">
					<span style="color: green;">Practical</span> - 3 units
				<div>
			</td>
			<!-- <td align="left" valign="top" width="10%">Practical</td>
			<td align="left" valign="top" width="10%">3</td> -->
			<td align="left" valign="top" width="10%">CS103</td>
		</tr>
    </tbody>	
</table>
</div>
