<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_GET['id'];
$category = $_GET['cat'];
$picture = $_GET['picture'];
if($picture != NULL) {
    $link = "../../assets/images/$category/$picture";
    unlink($link);
}
$mysql->query("DELETE FROM `$category` WHERE `$category`.`id` = '$id'");
header('Location: ../../pages/admin.php');
?>