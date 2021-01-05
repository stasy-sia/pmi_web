<?php
session_start();
require_once("functions.php");
if($_POST){
    $id_supp = $_POST['id_supp'];
    $name = $_POST['name'];
    $id_cafe = $_POST['id_cafe'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("UPDATE suppliers SET name = :name, id_cafe = :id_cafe WHERE id_supp = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id_cafe', $id_cafe);
    $stmt->bindParam(':id', $id_supp);
    $stmt->execute();
    header('Location: ../../pages/suppliers.php'.'?id='.$id_cafe);
}
?>
