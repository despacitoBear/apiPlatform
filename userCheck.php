<?php
$_REQUEST['user'];//переменная для хранения имени пользователя в хэше
$_REQUEST['pass'];//переменная для хранения пароля в хэшее
$con = mysqli_connect('37.140.192.226','u0906702_default','86y2__LB', 'u0906702_default');
//проверяем коннект
if (!$con) {
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
$stringUsr = strval($_REQUEST['user']);
$stringPassword = strval($_REQUEST['pass']);
$sqlSecurityRequest = "SELECT * FROM authentification WHERE user = '$stringUsr' && password = '$stringPassword'";
$result = mysqli_query($con, $sqlSecurityRequest);
if ($result){
    $resultArray = array();
    $tempArray = array();
    while($row = $result->fetch_object())
    {
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }
    echo "               ";
// access - int
//если кол-во эл в мас = 0, то такой строки нет и входа тоже нет
    if(count($resultArray) == 0){
        $array = array('access'=> 0);
        echo json_encode($array);
    } else {
        $array = array('access'=> 1);
        echo json_encode($array);
    }

}
mysqli_close($con);

//test example:
//user=C5AAAA827168730CFB4DF279514E841A72D9BD01BF58BEC02569F6C389AF4339
//pass=A9BC2FC3FAC0011414FD372A071460AB077EEA15348593E00376E602A45CD70A
//full request link =  http://localhost:63342/iCloudDrive/PHP/service.php?user=C5AAAA827168730CFB4DF279514E841A72D9BD01BF58BEC02569F6C389AF4339&pass=A9BC2FC3FAC0011414FD372A071460AB077EEA15348593E00376E602A45CD70A

//user=C5AAAA827168730CFB4DF279514E841A72D9BD01BF58BEC02569F6C389AF4339&pass=A9BC2FC3FAC0011414FD372A071460AB077EEA15348593E00376E602A45CD70A
