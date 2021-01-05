<?php
session_start();
require_once("functions.php");
if($_POST){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("UPDATE restaurants SET name = :name, city = :city WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt1 = $pdo->prepare("UPDATE cities SET adress = :address WHERE cities.`id_cafe` = :id");
    $stmt1->bindParam(':address', $address);
    $stmt1->bindParam(':id', $id);
    $stmt1->execute();
    header('Location: ../../pages/restorans.php');
}
?>
