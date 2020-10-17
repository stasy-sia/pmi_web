<?php

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."fdhfhg2345");

$mysql = new mysqli('localhost', 'root', 'root', 'regist'); //делаем запрос на авторизацию конструктор класса

$result = $mysql->query("SELECT * FROM `users1` WHERE `email`='$email' AND `pass` = '$pass'"); //выбрать между всеми элементами и ищет совпадения и записывает в резалт, записывает строчку ассоциативный массив
$check_if = mysqli_num_rows($result);//считает кол во элементов если есть совпадения запишет сколько эл, если нет 0
$user = $result->fetch_assoc(); //преобразует объекты в ассоциативгый массив
if(!$check_if){
    echo "Неверный email или пароль";
    header('Location: ../../pages/regest.php');
    exit();
}

setcookie('user',$user['name'], time() + 3600, "/"); // / - работает на всех страницах сайта

$mysql->close();

header('Location: ../../pages/regest.php');
?>