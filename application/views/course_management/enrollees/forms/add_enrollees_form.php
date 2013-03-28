<script>
	$(function() {
		$("#open_course_form").validationEngine({scroll:false});
		$('#open_course_form').ajaxForm({
			success:function(o) {
				_closeAddEnrolleeForm();
				load_enrollee_list_dt();
			},beforeSubmit: function(o) {
				var h_enrollees_id = $('#h_enrollees_id').val();
				if(h_enrollees_id == "") {
					alert('Error : Please add enrollees first!');
					return false;
				} else {return true;}
			},
		});
		
		load_opened_course_list_dropdown();
	});
	
	function load_opened_course_list_dropdown() {
		var h_enrollee_program_id = $('#h_enrollee_program_id').val();
		$.post(base_url + 'course_management/load_dropdown_opened_course_list',{h_enrollee_program_id:h_enrollee_program_id},function(o) {
			$('#opened_course_list_dropdown_wrapper').html(o);
		});
	}
	
	var t = new $.TextboxList('#h_enrollees_id', {'unique':true,plugins: {
		autocomplete: {
			minLength: 1,
			onlyFromValues: true,
			queryRemote: true,
			remote: {url: base_url + 'course_management/ajax_get_student_autocomplete'}
		}
	}});
	
</script>
<div class="modal-header">
    <h3 id="myModalLabel">Enroll Student</h3>
</div>
<div class="form_content_wrapper">
<form id="open_course_form" name="open_course_form" method="post" action="<?php echo url('course_management/insert_update_enrollees'); ?>">
<table width="100%" border="0">
	<tr>
        <td style="width:20%" align="left" valign="top">Program:</td>
        <td style="width:80%" align="left">
        	<select id="h_enrollee_program_id" name="h_enrollee_program_id" style="width:150px;" onchange="javascript:load_opened_course_list_dropdown();">
            	<?php foreach($programs as $p): ?>
                	<option value="<?php echo Utilities::encrypt($p->getId()); ?>"><?php echo $p->getProgramCode(); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Course:</td>
        <td style="width:80%" align="left"><div id="opened_course_list_dropdown_wrapper"></div></td>
    </tr>
    <tr>
        <td style="width:20%" align="left" valign="top">Enrollees:</td>
        <td style="width:80%" align="left"><input type="text" id="h_enrollees_id" name="h_enrollees_id" /></td>
    </tr>
</table>
</form>
</div>
<div class="modal-footer">
    <button class="btn" onclick="javascript:_closeAddEnrolleeForm();">Close</button>
    <button class="btn btn-primary submit_button" onclick="$('#open_course_form').submit();">Save changes</button>
</div>