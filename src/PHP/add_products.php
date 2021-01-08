<?php
session_start();
require_once("functions.php");
if($_POST) {
    $id_cafe = $_POST['id_cafe'];
    $id_supp = $_POST['id_supp'];
    $id_prod = $_POST['id_prod'];
    $count = $_POST['count'];
    $price = $_POST['price'];
    $pdo = PDO_OPT();
    $stmt = $pdo->prepare("SELECT * FROM prod_supp WHERE id_supp = :id_supp AND id_prod = :id_prod");
    $stmt->bindParam(':id_supp', $id_supp);
    $stmt->bindParam(':id_prod', $id_prod);
    $stmt->execute();
    foreach ($stmt as $item) {
        if($item != NULL){
            echo "такой продукт уже поставляеться, вы не можете его поставлять";
            exit();
        }
    }
    $stmt = $pdo->prepare("INSERT INTO prod_supp (id_supp, id_prod, count, price) VALUES (:id_supp, :id_prod, :count, :price)");
    $stmt->bindParam(':id_supp', $id_supp);
    $stmt->bindParam(':id_prod', $id_prod);
    $stmt->bindParam(':count', $count);
    $stmt->bindParam(':price', $price);
    $stmt->execute();
    header('Location: ../../pages/prod_supp.php'.'?id='.$id_supp.'&id_cafe='.$id_cafe);
}
?>