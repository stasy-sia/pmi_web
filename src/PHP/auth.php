<?php
session_start();
require_once("functions.php");
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$pass1 = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass1 = md5($pass1."fdhfhg2345");
$pdo = PDO_OPT();
$stmt = $pdo->prepare("SELECT * FROM users1 WHERE email = :email AND pass = :pass1");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':pass1', $pass1);
$stmt->execute();
foreach ($stmt as $row)
{
    if($row != NULL)
    {
        $_SESSION['user'] = [
            "id" => $row['id'],
            "name" => $row['name']
        ];
        header('Location: ../../pages/korzina.php');
        exit();
    }
}
$_SESSION['message1']='Неверный логин или пароль';
header('Location: ../../pages/regest.php');
exit();

?>