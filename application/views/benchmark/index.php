<?php include('application/themes' . THEME_FOLDER . 'template_header.php'); ?>
<table>
    <tr>
        <td valign="top"><?php include('application/themes' . THEME_FOLDER . 'sidebar.php'); ?></td>
        <td valign="top">
            <div class="span8 adjust-left container">
            <table class="table table-striped">
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
                                    <a class="btn btn-primary" href="#">Print</a>
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
                                    <a class="btn" href="#"><i class="icon-print"></i></a>
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
                                    <a class="btn btn-primary" href="#">Print</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </td>
    </tr>
</table>
	
<?php include('application/themes' . THEME_FOLDER . 'template_footer.php'); ?>