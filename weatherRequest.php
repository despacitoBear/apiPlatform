<?php
function get_data(){
$connection = mysqli_connect ('37.140.192.226','u0906702_default','86y2__LB', 'u0906702_default');
if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
    $errorArray = array(
        array("errorLabel", "Unable to connect to mySQL"),
        array("errorCode", strval(mysqli_connect_errno())),
        array("errorDescription",strval(mysqli_connect_error()))
    );
    echo json_encode($errorArray);

}
$sqlWeatherRequest = "SELECT * FROM temperatureData";
$result = mysqli_query($connection, $sqlWeatherRequest);
$rowCount = mysqli_num_rows($result); // количество строк
$resultArray = array();
    while($row = mysqli_fetch_array($result))
    {
        $resultArray[] = array(
            'id' => $row["id"],
            'celcius' => $row["celcius"],
            'humidity' => $row["humidity"],
            'date' => $row["dateTd"]
        );
    }
return json_encode($resultArray);
}
echo '<pre>';
print_r(get_data());
echo '</pre>';
$file_name = date('d-m-Y').'.json';
if(file_put_contents($file_name,get_data())){
    echo $file_name.' was created';
} else { echo "An error occured";}
?>