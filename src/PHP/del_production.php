<?php
session_start();
require_once("functions.php");
$id_supp = $_POST['id'];
$id_cafe = $_POST['id_cafe'];
$id_prod = $_POST['id_prod'];
$pdo = PDO_OPT();
$stmt = $pdo->prepare("DELETE FROM prod_supp WHERE id_supp = :id_supp AND id_prod = :id_prod");
$stmt->bindParam(':id_supp', $id_supp);
$stmt->bindParam(':id_prod', $id_prod);
$stmt->execute();

header('Location: ../../pages/prod_supp.php?id='.$id_supp.'&id_cafe='.$id_cafe);
?>