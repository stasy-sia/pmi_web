<?php
session_start();
require_once("functions.php");
if($_POST) {
    $id_cafe = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("INSERT INTO workers (id_cafe, name, position, salary) VALUES (:id_cafe, :name, :position, :salary)");
    $stmt->bindParam(':id_cafe', $id_cafe);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':salary', $salary);
    $stmt->execute();
    header('Location: ../../pages/workers.php'.'?id='.$id_cafe);
}
?>