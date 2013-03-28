<form id="download_student_grade_form" name="download_student_grade_form" method="post" action="<?php echo url('grade_management/download_student_grade'); ?>"> 
<input type="hidden" id="school_year" name="school_year" value="<?php echo $school_year; ?>" />
<input type="hidden" id="semester" name="semester" value="<?php echo $semester; ?>" />
    <div class="pull-right">
   	 <a class="btn btn-success submit_button" href="javascript:void(0);" onclick="$('#download_student_grade_form').submit();"><i class="icon-file icon-white"></i>Download Excel</a>
    </div>
    <div class="clear"></div>
</form>
<br />
<br />
<br />
<table class="sphr" width="100%">
<thead>
    <tr>
        <th width="100">Course Code</th>
        <th width="350">Course Title</th>
        <th width="300">Professor Name</th>
        <th width="200">Final Grade</strong></th>
        <th width="200">Status</th>
    </tr>
</thead>
<?php foreach ($grades as $row=>$value):?>
    <tr>
        <td><?php echo $value['course_code']; ?></td>
        <td><?php echo $value['course_title']; ?></td>
        <td><?php echo $value['professor_name']; ?></td>
        <td><?php echo $value['final_grade']; ?></td>
        <td><?php echo $value['is_passed']; ?></td>
       
    </tr>
    <?php endforeach;?>
    <?php if(!$grades) { ?>
        <td colspan="4"><strong>No record(s) found.</strong></td>
    <?php } ?>
</table>

