<?php
include 'conn.php';
 
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($conn,$_POST['lastname']) : '';

 
$offset = ($page-1)*$rows;
 
$result = array();
 
$where = "lastname like '%$lastname%' ";
$rs = mysqli_query($conn,"select count(*) as total from karyawan where " . $where);
$row = mysqli_fetch_row($conn,$rs);
$result["total"] = $row[0];
 
$rs = mysqli_query($conn,"select * from karyawan where " . $where . " limit $offset,$rows");
 
$items = array();
while($row = mysql_fetch_object($rs)){
    array_push($items, $row);
}
$result["rows"] = $items;
 
echo json_encode($result);

?>