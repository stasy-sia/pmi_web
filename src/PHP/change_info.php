<?php
session_start();

define('SITE_KEY', '6LeL9QwaAAAAAMqf5cGir0M9vK9hUsWkU9AnL2ji');
define('SECRET_KEY', '6LeL9QwaAAAAAO32MI1IyMDuIgmCeaHVfhKvqgMJ');

if($_POST){
    function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    //var_dump($Return);
    if($Return->success == true && $Return->score > 0.5){
        $capcha = true;
    }else{
        $capcha = false;
    }
}
if($capcha) {
    $id = $_SESSION['user']['id'];
    $mysql = new mysqli('localhost', 'root', 'root', 'regist');

    if($_POST['name'] != NULL){
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        if (mb_strlen($name) <= 2 || mb_strlen($name) > 50) {
            $_SESSION['message2'] = 'Имя должено быть от 2 до 50 символов';
            header('Location: ../../pages/change_pass.php');
            exit();
        }
        $_SESSION['user']['name'] = $name;
        $mysql->query("UPDATE `users1` SET `name` = '$name' WHERE `users1`.`id` = $id");
    }
    if($_POST['surname'] != NULL){
        $surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
        if (mb_strlen($surname) <= 2 || mb_strlen($surname) > 50) {
            $_SESSION['message2'] = 'Фамилия должена быть от 2 до 50 символов';
            header('Location: ../../pages/change_pass.php');
            exit();
        }
        $mysql->query("UPDATE `users1` SET `surname` = '$surname' WHERE `users1`.`id` = $id");
    }
    if($_POST['email'] != NULL){
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        if (mb_strlen($email) <= 2 || mb_strlen($email) > 50) {
            $_SESSION['message2'] = 'Имя должено быть от 2 до 50 символов';
            header('Location: ../../pages/change_pass.php');
            exit();
        }
        $result = $mysql->query("SELECT * FROM `users1` WHERE `email` = '$email'");
        $check_if = mysqli_num_rows($result);
        if ($check_if) {
            $_SESSION['message2'] = 'Данный пользователь уже зарегестрирован';
            header('Location: ../../pages/change_pass.php');
            exit();
        }
        $mysql->query("UPDATE `users1` SET `email` = '$email' WHERE `users1`.`id` = $id");
    }
    if($_POST['pass'] != NULL){
        $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
        $pass = md5($pass . "fdhfhg2345");
        $mysql->query("UPDATE `users1` SET `pass` = '$pass' WHERE `users1`.`id` = $id");
    }
    $mysql->close();
    header('Location: ../../pages/change_pass.php');
}else{
    $_SESSION['message2'] = 'Вы не прошли проверку reCaptcha';
    header('Location: ../../pages/change_pass.php');
    exit();
}

?>


