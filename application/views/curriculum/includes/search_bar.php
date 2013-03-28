<!-- Program: -->
<select id="h_program_id" name="h_program_id" style="width:180px;" onchange="javascript:load_curriculum_list();">
    <option value=""> - Select Program - </option>
    <?php foreach($programs as $p): ?>
        <option value="<?php echo Utilities::encrypt($p->getId()); ?>"><?php echo $p->getProgramCode(); ?></option>
    <?php endforeach; ?>
</select>
<!-- Batch Year:  -->
<?php
    $year 	= date('Y');
    $until	= $year+5;
?>
<select id="batch_year" name="batch_year" style="width:180px;" onchange="javascript:load_curriculum_list();">
        <option value=""> - Select Batch - </option>
    <?php for($i=($year-5); $i<=$until; $i++): ?>
    <?php $a=$i; ?>
        <option <?php echo ($i == $year ? 'selected="selected"' : ''); ?> value="<?php echo  $a . ' - ' . ($a+1); ?>"><?php echo  $a . ' - ' . ($a+1); ?></option>
    <?php endfor; ?>
</select>
<!-- Year Level: --> 
<select id="year_level" name="year_level" style="width:180px;" onchange="javascript:load_curriculum_list();">
<option value=""> - Select Yr. Level - </option>
    <option value="1">1st</option>
    <option value="2">2nd</option>
    <option value="3">3rd</option>
    <option value="4">4th</option>
</select>  
<!-- Semester: -->
<select id="semester" name="semester" style="width:180px;" onchange="javascript:load_curriculum_list();">
<option value=""> - Select Semester - </option>
    <option value="1">1st</option>
    <option value="2">2nd</option>
</select>