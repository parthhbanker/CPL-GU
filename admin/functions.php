<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_products($con, $limit='', $plant_id=''){
	$query = "SELECT * FROM plant WHERE status=1";

	if($plant_id!=''){
		$query .= " AND id = $plant_id";
	}

	if ($limit != ''){
		$query .= " ORDER BY id ASC LIMIT $limit";
	}

	$result = mysqli_query($con, $query);
	$data=array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	return $data;
}



?>