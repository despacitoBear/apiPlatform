<?php
$user = $_REQUEST['user'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];

// $user = "1234fvevnerjbu";
// $password = "324234hbrndbrhbj";
// $email = "88664@yandex.ru";

//проверка на существование
$checkRequest = "SELECT * FROM authentification WHERE user = '$user' && password = '$password' && email = '$email'";
//внесение в таблицу
$registrationMysqlRequest = "INSERT INTO authentification (`user`, `password`, `email`) VALUES ('$user', '$password','$email')";

$con = mysqli_connect('37.140.192.226','u0906702_default','86y2__LB', 'u0906702_default');
if (!$con) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    createJSON("Error",strval(mysqli_connect_errno()));
    exit;
}
$resultArray = array();
//проверка на наличие учетной записи в бд
if($result = mysqli_query($con, $checkRequest)){
    //print_r ($result);
}
$rowCount = mysqli_num_rows($result);
//если $rowCount > 0, то акк есть
if($rowCount > 1){
    createJSON("registration","Account is already exists");
} else {
    $result = mysqli_query($con,$registrationMysqlRequest);
    if ($result){
        createJSON("registration","Registered successfully");
    } else {
        createJSON("registration","Something went wrong");
    }
}

function createJSON($leftColoumn,$rightColoumn){
    $array = array($leftColoumn => $rightColoumn);
    header("Content-type: application/json");
    echo json_encode($array);
}
?>