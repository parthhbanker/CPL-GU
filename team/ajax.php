<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}


if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}

ob_end_flush();
?>
