<?php
session_start();
require_once("functions.php");
if($_POST){
    $id_cafe = $_POST['id_cafe'];
    $id_supp = $_POST['id_supp'];
    $id_prod = $_POST['id_prod'];
    $count = $_POST['count'];
    $price = $_POST['price'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("UPDATE prod_supp SET count = :count, price = :price WHERE id_supp = :id_supp AND id_prod = :id_prod");
    $stmt->bindParam(':count', $count);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':id_supp', $id_supp);
    $stmt->bindParam(':id_prod', $id_prod);
    $stmt->execute();
    header('Location: ../../pages/prod_supp.php'.'?id='.$id_supp.'&id_cafe='.$id_cafe);
}
?>
