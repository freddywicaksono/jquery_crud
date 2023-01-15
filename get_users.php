<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$lastname = isset($_POST['lastname']);
	$offset = ($page-1)*$rows;
	$result = array();

	include 'conn.php';
	
if(isset($_POST['lastname'])){
	$where = "lastname like '%$lastname%'";
	$rs = mysqli_query($conn,"select count(*) as total from karyawan where " . $where);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	 
	$rs2 = mysqli_query($conn,"select * from karyawan where " . $where . " limit $offset,$rows");
} else {
	$rs = @mysqli_query($conn,"select count(*) as total from karyawan");
	$row = @mysqli_fetch_row($rs);
	$result["total"] = $row[0];

	$rs2 = @mysqli_query($conn,"select * from karyawan limit $offset,$rows");
	
}

	
	
	
	$items = array();
	while($row = @mysqli_fetch_object($rs2)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>