<?php
$_REQUEST['user'];
$_REQUEST['password'];
$_REQUEST['email'];
$con = mysqli_connect('37.140.192.226','u0906702_default','86y2__LB', 'u0906702_default');
if (!$con) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$stringUser = strval($_REQUEST['user']);
$stringPassword = strval($_REQUEST['password']);
$stringEmail = strval($_REQUEST['email']);
$registrationMysqlRequest = "INSERT INTO authentification (`user`, `password`, `email`) VALUES ($stringUser,$stringPassword,$stringEmail))";
$result = mysqli_query($con, $registrationMysqlRequest);
echo $result;
mysqli_close($con);