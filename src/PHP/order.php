<?php
session_start();
require_once("functions.php");
$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$cat = $_GET['id'];

$pdo = PDO_OPT();
$stmt = $pdo->prepare("SELECT name, price, picture FROM menu WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$prod = $stmt ->fetchAll(PDO::FETCH_ASSOC);
foreach ($prod as $arr)
{
    $name = $arr['name'];
    $price = $arr['price'];
    $picture = $arr['picture'];
}
if (!isset($_SESSION['basket'][$cat][$id])) {

    $_SESSION['basket'][$cat][$id] = array('id' => $id ,'name' => $name, 'price' => $price, 'count' => 1, 'picture' => $picture);
}
else
    $_SESSION['basket'][$cat][$id]['count']++; // another of this item to the cart
$mysql->close();

header('Location: ../../pages/menu.php');

?>