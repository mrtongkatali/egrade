<script>
$(document).ready(function() {
    $(document).ready(function() {
        $('#curriculum_dt').dataTable( {
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

<div style="top:0px !important;">
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
            <td width="53%">
                <div class="btn-group">
                    <a class="btn btn-info" href="#">1st Sem</a>
                    <a class="btn btn-info" href="#">2nd Sem</a>
                </div>
            </td>
            <td width="40%" align="right"><button class="btn btn-primary float-left"><i class="icon-white icon-print"></i>Print Curriculum</button></td>
        </tr>
    </table>
</div>
<table class="table" width="100%" border="0" cellpadding="5" cellspacing="0" id="curriculum_dt">
    <!-- STUDENT -->
    <thead>
        <tr>
            <th align="center"><b>Course Code</b></th>
            <th align="center"><b>Course Description</b></th>
            <th align="center"><b>Professor</b></th>
            <th align="center"><b>Unit/s</b></th>
            <th align="center"><b>Grade</b></th>
            <th align="center"><b>Remarks</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>IT100</td>
            <td>Information Technology</td>
            <td>Ellenita R. Red</td>
            <td>3.0</td>
            <td>1.75</td>
            <td>
                <span class="label label-success">Passed</span>
                <span class="label label-important">Failed</span>
            </td>
        </tr>
        <tr>
            <td>IT100</td>
            <td>Information Technology</td>
            <td>Ellenita R. Red</td>
            <td>3.0</td>
            <td>1.75</td>
            <td>
                <span class="label label-success">Passed</span>
                <span class="label label-important">Failed</span>
            </td>
        </tr>
        <tr>
            <td>IT100</td>
            <td>Information Technology</td>
            <td>Ellenita R. Red</td>
            <td>3.0</td>
            <td>1.75</td>
            <td>
                <span class="label label-success">Passed</span>
                <span class="label label-important">Failed</span>
            </td>
        </tr>
    </tbody>
    <!-- end of STUDENT -->
</table>
</div>