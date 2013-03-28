<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>

<script>
$(document).ready(function() {
	$(document).ready(function() {
		$('#grade').dataTable( {
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

<div id="page">
	<?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?>
    <div class="container float-left">
        <h3><img src="<?php echo BASE_FOLDER . 'application/themes/'.THEME_FOLDER.'themes-images/icons/grades.png'; ?>" width="42px" height="42px" class="header_icon" />Grades</h3>
        <table class="table" id="grade">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Title</th>
                    <th>Section</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>IT123</td>
                    <td>
                    	<select>
                    		<option><a href="">Section 1</a></option>
                            <option><a href="">Section 2</a></option>
                            <option><a href="">Section 3</a></option>
                            <option><a href="">Section 4</a></option>
                            <option><a href="">Section 5</a></option>
                        </select>
                    <td>
                        <div class="btn-toolbar" style="margin-bottom: 9px">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="#">Edit</a>
                                <a class="btn btn-primary" href="#">View</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>IT456</td>
                    <td>
                    	<select>
                    		<option><a href="">Section 1</a></option>
                            <option><a href="">Section 2</a></option>
                            <option><a href="">Section 3</a></option>
                            <option><a href="">Section 4</a></option>
                            <option><a href="">Section 5</a></option>
                        </select>
                    <td>
                        <div class="btn-toolbar" style="margin-bottom: 9px">
                            <div class="btn-group">
                                <a class="btn" href="#"><i class="icon-pencil"></i></a>
                                <a class="btn" href="#"><i class="icon-search"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>IT789</td>
                    <td>
                    	<select>
                    		<option><a href="">Section 1</a></option>
                            <option><a href="">Section 2</a></option>
                            <option><a href="">Section 3</a></option>
                            <option><a href="">Section 4</a></option>
                            <option><a href="">Section 5</a></option>
                        </select>
                    <td>
                        <div class="btn-toolbar" style="margin-bottom: 9px">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="#">Edit</a>
                                <a class="btn btn-primary" href="#">View</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
	
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>