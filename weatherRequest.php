<?php
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
$sqlWeatherRequest = "SELECT * FROM WeatherStatistics";
$result = mysqli_query($connection, $sqlWeatherRequest);
$rowCount = mysqli_num_rows($result); // количество строк
if ($result){   
    $resultArray = array();
    $tempArray = array();
    while($row = $result->fetch_object())
    {
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }
}
$numOfRowsArray = array('rows'=> $rowCount);
$resultArray = array_merge($resultArray,$numOfRowsArray);// совмещаем массивы с количеством строк
echo json_encode($resultArray);
mysqli_close($connection);