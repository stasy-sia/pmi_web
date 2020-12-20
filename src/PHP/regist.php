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
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    if (mb_strlen($email) < 5 || mb_strlen($email) > 50) {
        echo "Недопустимая длина Email";
        exit();
    } else if (mb_strlen($name) < 2 || mb_strlen($email) > 50) {
        echo "Недопустимая длина имени";
        exit();
    } else if (mb_strlen($surname) < 2 || mb_strlen($surname) > 50) {
        echo "Недопустимая длина фамилии";
        exit();
    } else if (mb_strlen($pass) < 8 || mb_strlen($pass) > 32) {
        echo "Недопустимая длина пароля (от 8 до 32 символов)";
        exit();
    }

    $pass = md5($pass . "fdhfhg2345");

    $mysql = new mysqli('localhost', 'root', 'root', 'regist');

    $result = $mysql->query("SELECT * FROM `users1` WHERE `email` = '$email'");
    $check_if = mysqli_num_rows($result);
    if ($check_if) {

        $_SESSION['message2'] = 'Данный пользователь уже зарегестрирован';
        header('Location: ../../pages/regest.php');
        exit();
    }

    $mysql->query("INSERT INTO `users1` (`email`, `name`, `surname`, `pass`) VALUES('$email','$name','$surname','$pass')");
    $_SESSION['message2'] = 'Регистрация прошла успешно';

    $mysql->close();

    header('Location: ../../pages/regest.php');
}else{
    $_SESSION['message2'] = 'Вы не прошли проверку reCaptcha';
    header('Location: ../../pages/regest.php');
    exit();
}

?>


