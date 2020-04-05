<?php
//примечание: в статус писать 1/0, не true/false
$status = $_REQUEST['status'];
$id = $_REQUEST['id'];
// $status = 1;
// $id = 1;
$conn = mysqli_connect('37.140.192.226','u0906702_default','86y2__LB', 'u0906702_default');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE doorStatus SET status = '$status' WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
    $array = array("status" => "$status");
    header("Content-type: application/json");
    echo json_encode($array);
} else {
    $array = array("status" => "$status");
    header("Content-type: application/json");
    echo json_encode($array);
}
mysqli_close($conn);
//UPDATE doorStatus SET `status` = true WHERE id = 1
?>