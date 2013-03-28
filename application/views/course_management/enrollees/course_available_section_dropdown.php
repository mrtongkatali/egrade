&nbsp;&nbsp;

Section:

<select id="h_available_section_id"  name="h_available_section_id" style="width:120px;">
<?php foreach($available_sections as $av): ?>
	<option value="<?php echo Utilities::encrypt($av->getId()); ?>"><?php echo $av->getSection(); ?></option>
<?php endforeach; ?>
</select>

<a href="javascript:void(0);" onclick="javascript:load_enrollee_list_dt();">View All Enrollees</a>