<?php
session_start();
require_once("functions.php");
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
        $_SESSION['message2'] = 'Email должен быть от 6 до 50 символов';
        header('Location: ../../pages/regest.php');
        exit();
    } else if (mb_strlen($name) <= 2 || mb_strlen($email) > 50) {
        $_SESSION['message2'] = 'Имя должено быть от 2 до 50 символов';
        header('Location: ../../pages/regest.php');
        exit();
    } else if (mb_strlen($surname) <= 2 || mb_strlen($surname) > 50) {
        $_SESSION['message2'] = 'Фамилия должена быть от 2 до 50 символов';
        header('Location: ../../pages/regest.php');
        exit();
    }

    $pass = md5($pass . "fdhfhg2345");
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("SELECT * FROM users1 WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    foreach ($stmt as $result)
    {
        if($result != NULL)
        {
            $_SESSION['message2'] = 'Данный пользователь уже зарегестрирован';
            header('Location: ../../pages/regest.php');
            exit();
        }
    }
    $stmt1 = $pdo->prepare("INSERT INTO users1 (email, name, surname, pass) VALUES (:email, :name, :surname, :pass)");
    $stmt1->bindParam(':email', $email);
    $stmt1->bindParam(':name', $name);
    $stmt1->bindParam(':surname', $surname);
    $stmt1->bindParam(':pass', $pass);
    $stmt1->execute();
    foreach ($stmt1 as $row)
    {
        $_SESSION['user'] = [
            "id" => $row['id'],
            "name" => $row['name']
        ];
    }
    $_SESSION['message2'] = 'Регистрация прошла успешно';
    header('Location: ../../pages/regest.php');
}else{
    $_SESSION['message2'] = 'Вы не прошли проверку reCaptcha';
    header('Location: ../../pages/regest.php');
    exit();
}

?>


