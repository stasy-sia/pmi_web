<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$userid = $_SESSION['user']['id'];
$date = date("m.d.y H:i:s");
$mysql->query("INSERT INTO `orders` (`usser_id`, `status`, `date`) VALUES ('$userid', 'Доставлено', '$date')");
$result = $mysql->query("SELECT * FROM `orders` WHERE usser_id = '$userid' AND date = '$date' ");
$orderid = $result->fetch_assoc();
$orderid = $orderid['id'];

 foreach ($_SESSION['basket'] as $cat => $category ) {
        foreach ($category as $i){
            $prodID = $i['id'];
            $prodCount = $i['count'];
            $mysql->query("INSERT INTO `oreder_prod` (`order_id`, `cotegory_id`, `prod_id`, `count`) VALUES ('$orderid', '$cat', '$prodID', '$prodCount')");
        }
 }
unset($_SESSION['basket']);

header('Location: ../../pages/korzina.php');