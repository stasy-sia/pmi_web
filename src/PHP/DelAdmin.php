<?php
session_start();
require_once("functions.php");
$id = $_POST['id'];
$category = $_POST['cat'];
$picture = $_POST['picture'];
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