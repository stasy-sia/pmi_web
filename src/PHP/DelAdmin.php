<?php
session_start();
require_once("functions.php");
$id = $_GET['id'];
$category = $_GET['cat'];
$picture = $_GET['picture'];
if($picture != NULL) {
    $link = "../../assets/images/$category/$picture";
    unlink($link);
}
$pdo = PDO_OPT();
$stmt = $pdo->prepare("DELETE FROM menu WHERE menu.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../pages/admin.php');
?>