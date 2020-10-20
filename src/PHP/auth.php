<?php
session_start();
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."fdhfhg2345");

$mysql = new mysqli('localhost', 'root', 'root', 'regist'); //делаем запрос на авторизацию конструктор класса

$result = $mysql->query("SELECT * FROM `users1` WHERE `email`='$email' AND `pass` = '$pass'"); //выбрать между всеми элементами и ищет совпадения и записывает в резалт, записывает строчку ассоциативный массив
$check_if = mysqli_num_rows($result);//считает кол во элементов если есть совпадения запишет сколько эл, если нет 0
$user = $result->fetch_assoc(); //преобразует объекты в ассоциативгый массив
if(!$check_if){
    $_SESSION['message1']='Неверный логин или пароль';
    header('Location: ../../pages/regest.php');
    exit();
}

    $_SESSION['user'] = [
    "email" => $user['email'],
    "name" => $user['name']
];


$mysql->close();

header('Location: ../../pages/regest.php');
?>