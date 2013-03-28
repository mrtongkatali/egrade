<?php 
function get_base_url()
{
	return 'http://' . $_SERVER['HTTP_HOST'] . BASE_FOLDER . 'index.php/';
}

function url($params, $get = NULL) {
	return get_base_url()  . $params;
}

function redirect($params) {
	header("Location:" . get_base_url() . $params);
}


?>