function load_server_curriculum_dt() {
	$('#curriculum_container').html(loading_message);
	$.post(base_url + 'my_page/load_server_curriculum_dt',{},
	function(o){
		$('#curriculum_container').html(o);
	});
}

function load_my_account() {
	$('#account_container').html(loading_message);
	$.post(base_url + 'my_page/load_server_account_form',{},
	function(o){
		$('#account_container').html(o);
	});
}

function load_server_grades_dt() {
	$('#grades_container').html(loading_message);
	$.post(base_url + 'my_page/load_server_grades_dt',{},
	function(o){
		$('#grades_container').html(o);
	});
}