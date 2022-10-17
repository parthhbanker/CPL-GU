<?php
ob_start();
include 'admin_class.php';
$crud = new Action();

$action = $_POST['action'];
if($action == 'get_bids_pie_chart'){
	$logout = $crud->get_bids_pie_chart();
	echo $logout;
}
ob_end_flush();

?>