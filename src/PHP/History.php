<?php
session_start();
require_once("functions.php");
$userid = $_SESSION['user']['id'];
$date = date("m.d.y H:i:s");
$price = $_POST['itog'];
$d = "Доставлено";

$pdo = PDO_OPT();
$stmt = $pdo->prepare("INSERT INTO orders (usser_id, status, date, price) VALUES (:userid, :d, :date, :price)");
$stmt->bindParam(':userid', $userid);
$stmt->bindParam(':d', $d);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':price', $price);
$stmt->execute();

$stmt2 = $pdo->prepare("SELECT id FROM orders WHERE usser_id = :userid AND date = :date ");
$stmt2->bindParam(':userid', $userid);
$stmt2->bindParam(':date', $date);
$stmt2->execute();
foreach ($stmt2 as $id)
{
    $orderid = $id['id'];
}
 foreach ($_SESSION['basket'] as $cat => $category ) {
        foreach ($category as $i){
            $prodID = $i['id'];
            $prodCount = $i['count'];
            $stmt2 = $pdo->prepare("INSERT INTO oreder_prod (order_id, cotegory_id, prod_id, count) VALUES (:orderid, :cat, :prodID, :prodCount)");
            $stmt2->bindParam(':orderid', $orderid);
            $stmt2->bindParam(':cat', $cat);
            $stmt2->bindParam(':prodID', $prodID);
            $stmt2->bindParam(':prodCount', $prodCount);
            $stmt2->execute();
        }
 }
unset($_SESSION['basket']);

header('Location: ../../pages/korzina.php');