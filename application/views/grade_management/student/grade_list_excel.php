<?php 
	ob_start();
	date_default_timezone_set('Asia/Manila'); 
?>

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

<?php
	#$filename ='Event_Listing_Report.xls';
	header("Content-type: application/x-msexcel"); //tried adding  charset='utf-8' into header
	header("Content-Disposition: attachment; filename=$filename");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
