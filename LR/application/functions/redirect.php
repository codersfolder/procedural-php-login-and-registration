<?php 

function redirect($page = null) {
	// echo $page;
	if($page) {
		header('Location: '.$page.'');
		exit;
	}
}

?>