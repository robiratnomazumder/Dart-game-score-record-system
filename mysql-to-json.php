<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "", "dart_board");
    
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}

function insert($sql){
	$conn = mysqli_connect("localhost", "root", "", "dart_board");

	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	return $result;
	
}
?>
