<script>
	$(function() {
		$("#add_curriculum_forrm").validationEngine({scroll:false});
		$('#add_curriculum_forrm').ajaxForm({
			success:function(o) {
				closeCurriculumForm();
			},beforeSubmit: function(o) {
				var h_program_id = $("#h_program_id").val();
				if(h_program_id == "") {
					alert('Error : Select program first!');
					return false;
				}
			},
		});
	});
	
	var t = new $.TextboxList('#h_course_id', {'unique':true,plugins: {
		autocomplete: {
			minLength: 1,
			onlyFromValues: true,
			queryRemote: true,
			remote: {url: base_url + 'curriculum/ajax_get_course_autocomplete'}
		}
	}});
</script>
<div class="form_content_wrapper">
    <div class="form-container">
        <h4 class="form-title">Add Course</h4>
        <form id="add_curriculum_forrm" name="add_curriculum_forrm" method="post" action="<?php echo url('curriculum/ajax_insert_update_curriculum'); ?>">
            <table width="100%" border="0">
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Program:</td>
                    <td style="width:80%" align="left">
                        <select id="h_program_id" name="h_program_id" style="width:200px;">
                            <?php foreach($programs as $p): ?>
                                <option value="<?php echo Utilities::encrypt($p->getId()); ?>"><?php echo $p->getProgramCode(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Course:</td>
                    <td style="width:80%" align="left"><input type="text" id="h_course_id" name="h_course_id" /></td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Batch Year:</td>
                    <td style="width:80%" align="left">
                        <?php
                            $year   = date('Y');
                            $until  = $year+5;
                        ?>
                        <select id="batch_year" name="batch_year" style="width:200px;">
                            <?php for($i=($year-5); $i<=$until; $i++): ?>
                            <?php $a=$i; ?>
                                <option <?php echo ($i == $year ? 'selected="selected"' : ''); ?> value="<?php echo  $a . ' - ' . ($a+1); ?>"><?php echo  $a . ' - ' . ($a+1); ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Year Level:</td>
                    <td style="width:80%" align="left">
                        <select id="year_level" name="year_level" style="width:200px;">
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </select>
                    </td>
                </tr>
                <tr class="row">
                    <td style="width:20%" align="left" valign="top">Semester:</td>
                    <td style="width:80%" align="left">
                        <select id="semester" name="semester" style="width:200px;">
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br/>
            <div class="form_action_section">
                <a class="btn btn-primary submit_button" onclick="$('#add_curriculum_forrm').submit();"><i class="icon-list-alt icon-white"></i> Save</a>
                <a class="btn" onclick="javascript:closeCurriculumForm();">Close</a>
            </div>
            
        </form>
    </div>
</div>
<style>
	#ui-datepicker-div { display:none }
</style>