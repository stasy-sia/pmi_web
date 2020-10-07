<?php

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."fdhfhg2345");

$mysql = new mysqli('localhost', 'root', 'root', 'regist');

$result = $mysql->query("SELECT * FROM `users1` WHERE `email`='$email' AND `pass` = '$pass'");
$check_if = mysqli_num_rows($result);
$user = $result->fetch_assoc();
if(!$check_if){
    echo "Неверный email или пароль";
    header('Location: ../../pages/regest.php');
    exit();
}

setcookie('user',$user['name'], time() + 3600, "/");

$mysql->close();

header('Location: ../../pages/regest.php');
?>