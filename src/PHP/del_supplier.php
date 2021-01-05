<?php
session_start();
require_once("functions.php");
$id_supp = $_GET['id'];
$id_cafe = $_GET['id_cafe'];
$pdo = PDO_OPT();
$stmt = $pdo->prepare("DELETE FROM suppliers WHERE id_supp = :id_supp");
$stmt->bindParam(':id_supp', $id_supp);
$stmt->execute();

$stmt1 = $pdo->prepare("DELETE FROM prod_supp WHERE id_supp = :id_supp");
$stmt1->bindParam(':id_supp', $id_supp);
$stmt1->execute();

header('Location: ../../pages/suppliers.php?id='.$id_cafe);
?>