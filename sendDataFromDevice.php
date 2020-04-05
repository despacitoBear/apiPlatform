<?php
$celcius = $_REQUEST['celcius'];
$humidity = $_REQUEST['humidity'];
$conn = mysqli_connect('37.140.192.226','u0906702_default','86y2__LB', 'u0906702_default');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO  temperatureData(celcius,humidity) VALUES ('$celcius', '$humidity')";
if (mysqli_query($conn, $sql)) {
    $array = array("sending" => "successfully");
    header("Content-type: application/json");
    echo json_encode($array);
} else {
    $array = array("sending" => "failed");
    header("Content-type: application/json");
    echo json_encode($array);
}
mysqli_close($conn);
?>