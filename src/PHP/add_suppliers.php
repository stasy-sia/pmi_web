<?php
session_start();
require_once("functions.php");
if($_POST) {
    $id_cafe = $_POST['id'];
    $name = $_POST['name'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("INSERT INTO suppliers (name, id_cafe) VALUES (:name, :id_cafe)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id_cafe', $id_cafe);
    $stmt->execute();
    header('Location: ../../pages/suppliers.php'.'?id='.$id_cafe);
}
?>