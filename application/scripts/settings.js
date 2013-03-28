function load_add_curriculum() {
	$('#new_curriculum_container').html(loading_message);
	$.get(base_url + 'settings/load_add_curriculum',{},
	function(o){
		$('#new_curriculum_container').html(o);
	});
}

function load_curriculum_list_dt() {
	$('#new_curriculum_container').html(loading_message);
	$.get(base_url + 'settings/load_curriculum_list_dt',{},
	function(o){
		$('#new_curriculum_container').html(o);
	});
}