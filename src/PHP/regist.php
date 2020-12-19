<?php
session_start();
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
if(mb_strlen($email) < 5 || mb_strlen($email) > 50) {
    echo "Недопустимая длина Email";
    exit();
} else if(mb_strlen($name) < 2 || mb_strlen($email) > 50) {
    echo "Недопустимая длина имени";
    exit();
} else if(mb_strlen($surname) < 2 || mb_strlen($surname) > 50) {
    echo "Недопустимая длина фамилии";
    exit();
} else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 32) {
    echo "Недопустимая длина пароля (от 8 до 32 символов)";
    exit();
}

$pass = md5($pass."fdhfhg2345");

$mysql = new mysqli('localhost', 'root', 'root', 'regist');

$result = $mysql->query("SELECT * FROM `users1` WHERE `email` = '$email'");
$check_if = mysqli_num_rows($result);
if($check_if){

    $_SESSION['message2']='Данный пользователь уже зарегестрирован';
    header('Location: ../../pages/regest.php');
    exit();
}

$mysql->query("INSERT INTO `users1` (`email`, `name`, `surname`, `pass`) VALUES('$email','$name','$surname','$pass')");
$_SESSION['message2']='Регистрация прошла успешно';

$mysql->close();

header('Location: ../../pages/regest.php');
?>


