<?php
session_start();
require_once("functions.php");
if($_POST){
    $id = $_POST['id'];
    $id_cafe = $_POST['id_cafe'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("UPDATE workers SET id_cafe = :id_cafe, name = :name, position = :position, salary = :salary WHERE id = :id");
    $stmt->bindParam(':id_cafe', $id_cafe);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':salary', $salary);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: ../../pages/workers.php'.'?id='.$id_cafe);
}
?>
