<?php
session_start();
require_once("functions.php");
if($_POST) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("INSERT INTO restaurants (name, city) VALUES (:name, :city)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':city', $city);
    $stmt->execute();
    $stmt1 = $pdo->prepare("SELECT id FROM restaurants WHERE name = :name");
    $stmt1->bindParam(':name', $name);
    $stmt1->execute();
    foreach ($stmt1 as $id)
        $id_cafe = $id['id'];
    $stmt2 = $pdo->prepare("INSERT INTO cities (id_cafe, adress) VALUES (:id_cafe, :address)");
    $stmt2->bindParam(':id_cafe', $id_cafe);
    $stmt2->bindParam(':address', $address);
    $stmt2->execute();
    header('Location: ../../pages/restorans.php');
    }
?>