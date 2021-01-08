<?php
session_start();
require_once("functions.php");
$id = $_POST['id'];
$id_cafe = $_POST['id_cafe'];
$pdo = PDO_OPT();
$stmt = $pdo->prepare("DELETE FROM workers WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../pages/workers.php?id='.$id_cafe);
?>