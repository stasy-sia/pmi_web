<?php

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."fdhfhg2345");

$mysql = new mysqli('localhost', 'root', 'root', 'regist');

$result = $mysql->query("SELECT * FROM `users1` WHERE `email`='$email' AND `pass` = '$pass'");
$user = $result->fetch_assoc();
if(count($user) == 0){
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user',$user['name'], time() + 3600, "/");
setcookie('user1',$user['surname'], time() + 3600, "/");
setcookie('user2',$user['email'], time() + 3600, "/");


$mysql->close();

header('Location: ../../pages/regest.php');
?>