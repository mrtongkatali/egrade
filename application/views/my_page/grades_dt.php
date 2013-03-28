<script>
$(document).ready(function() {
	$(document).ready(function() {
		$('#grades_dt').dataTable( {
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

<div id="menu-container" class="float-left" style="width:97%;">
    <table>
        <tr>
            <td width="10%">School Year:</td>
            <td width="15%">
                <select id="school_year" name="school_year">
                    <option>2008-2009</option>
                    <option>2009-2010</option>
                    <option>2010-2011</option>
                    <option>2011-2012</option>
                </select>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td width="30%">
                <div class="btn-group">
                    <a class="btn btn-info" href="#">1st Sem</a>
                    <a class="btn btn-info" href="#">2nd Sem</a>
                </div>
            </td>
            <td width="40%" align="right"><button class="btn btn-primary float-right"><i class="icon-white icon-print"></i>Print</button></td>
        </tr>
    </table>
</div>
<div style="top:0px !important;">
<table class="table" width="100%" border="0" cellpadding="5" cellspacing="0" id="grades_dt">
    <!-- STUDENT -->
    <thead>
        <tr>
            <th align="center">Course Code</th>
            <th align="center">Grade</th>
            <th align="center">Prof</th>
            <th align="center">Remarks</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
            <td>IT100</td>
            <td>1.75</td>
            <td>Ellenita R. Red</td>
            <td>
            	<span class="label label-success">Passed</span>
                <span class="label label-important">Failed</span>
            </td>
        </tr>
        <tr>
            <td>IT100</td>
            <td>1.75</td>
            <td>Ellenita R. Red</td>
            <td>
            	<span class="label label-success">Passed</span>
                <span class="label label-important">Failed</span>
            </td>
        </tr>
        <tr>
            <td>IT100</td>
            <td>1.75</td>
            <td>Ellenita R. Red</td>
            <td>
            	<span class="label label-success">Passed</span>
                <span class="label label-important">Failed</span>
            </td>
        </tr>
    </tbody>
    <!-- end of STUDENT -->
</table>
</div>