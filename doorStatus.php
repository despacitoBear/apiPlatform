<?php
//примечание: в статус писать 1/0, не true/false
$status = $_REQUEST['status'];
$id = $_REQUEST['id'];

$dataBaseName = "u0906702_default";
$tableName = "temperatureData";
$serverIp = "37.140.192.226";
$user = "u0906702_default";
$password = "86y2__LB";
$query = "UPDATE doorStatus SET `status` = '$status' WHERE id = '$id'";
$connect = mysqli_connect($serverIp,$user,$password,$dataBaseName);
if (!$connect){
    echo "Cannot connect to mysql".PHP_EOL;
    echo "Error code and text".mysqli_connect_errno()." ".mysqli_connect_error();
} 
$mysqlQuery = mysqli_query($connect,$query);
mysqli_close($connect);
//UPDATE doorStatus SET `status` = true WHERE id = 1
?>