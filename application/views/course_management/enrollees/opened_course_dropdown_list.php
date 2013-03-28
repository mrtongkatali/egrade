<select id="h_course_designated_id" name="h_course_designated_id" class="adjustable_dd">
	<?php foreach($designated_course as $dc): ?>
    <?php $course = CV_Courses_Finder::findById($dc->getCourseId()); ?>
    	<option value="<?php echo Utilities::encrypt($dc->getId()); ?>"><?php echo $course->getCourseCode(); ?> / <?php echo $dc->getSection(); ?></option>
    <?php endforeach; ?>
</select>