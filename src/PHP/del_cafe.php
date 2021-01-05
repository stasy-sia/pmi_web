<?php
session_start();
require_once("functions.php");
    $id_cafe = $_GET['id_cafe'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("DELETE FROM restaurants WHERE id = :id_cafe");
    $stmt->bindParam(':id_cafe', $id_cafe);
    $stmt->execute();

    $stmt2 = $pdo->prepare("DELETE FROM workers WHERE id_cafe = :id_cafe");
    $stmt2->bindParam(':id_cafe', $id_cafe);
    $stmt2->execute();

    $stmt3 = $pdo->prepare("DELETE FROM cities WHERE id_cafe = :id_cafe");
    $stmt3->bindParam(':id_cafe', $id_cafe);
    $stmt3->execute();

    $stmt4 = $pdo->prepare("SELECT id_supp FROM suppliers WHERE id_cafe = :id_cafe");
    $stmt4->bindParam(':id_cafe', $id_cafe);
    $stmt4->execute();

    $stmt5 = $pdo->prepare("DELETE FROM suppliers WHERE id_cafe = :id_cafe");
    $stmt5->bindParam(':id_cafe', $id_cafe);
    $stmt5->execute();

    foreach ($stmt4 as $del) {
        $stmt6 = $pdo->prepare("DELETE FROM prod_supp WHERE id_supp = :id_supp");
        $stmt6->bindParam(':id_supp', $del['id_supp']);
        $stmt6->execute();
    }
    header('Location: ../../pages/restorans.php');
?>