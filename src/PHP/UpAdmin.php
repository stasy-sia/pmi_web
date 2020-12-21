<?php
session_start();
require_once("functions.php");
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$gramm = $_POST['gramm'];
$pdo = PDO_OPT();
$name_page = $_POST['name_page'].'.html';
$picture = $_POST['picture'];
$cat = $_POST['cat'];
if($_POST['Del'] == "tru") {
    if($picture != NULL){
        $link = "../../assets/images/$cat/$picture";
        unlink($link);
    }
    $picture = NULL;
    $stmt = $pdo->prepare("UPDATE menu SET name = :name, price = :price, gramm = :gramm, picture = :picture, name_page = :name_page WHERE menu.`id` = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':gramm', $gramm);
    $stmt->bindParam(':picture', $picture);
    $stmt->bindParam(':name_page', $name_page);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: ../../pages/admin.php');
} else if(!empty($_FILES['file']['name'])) {
    if($picture != NULL){
        $link = "../../assets/images/$cat/$picture";
        unlink($link);
    }
    $uploadDir = "../../assets/images/$cat/";
    $myFile = $_FILES['file'];
    $name_file =preg_replace("/[^A-Z0-9._-]/i","_",$myFile['name']);
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
    $p = 0;
    $parts = pathinfo($name_file);
    while (file_exists($uploadDir.$name_file)){
        $p++;
        $name_file = $parts["filename"] . "-" . $p . "." . $parts["extension"];
    }
    $uploadFile = $uploadDir . basename($name_file);
    $fileChecked = false;
    for ($j = 0; $j < count($allowedTypes); $j++) {
        if ($myFile['type'] == $allowedTypes[$j]) {
            $fileChecked = true;
            break;
        }
    }
    if ($fileChecked) {
        $success = move_uploaded_file($myFile['tmp_name'], $uploadFile);
        if(!$success){
            echo "<p>Не удалось загрузить файл.</p>";
            exit;
        }
        chmod($uploadDir.$name_file, 0644);
        $stmt2 = $pdo->prepare("UPDATE menu SET name = :name, price = :price, gramm = :gramm, picture = :picture, name_page = :name_page WHERE menu.`id` = :id");
        $stmt2->bindParam(':name', $name);
        $stmt2->bindParam(':price', $price);
        $stmt2->bindParam(':gramm', $gramm);
        $stmt2->bindParam(':picture', $name_file);
        $stmt2->bindParam(':name_page', $name_page);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
        header('Location: ../../pages/admin.php');
    } else {
        echo "Недопустимый формат <br>";
    }
} else {
    $stmt = $pdo->prepare("UPDATE menu SET name = :name, price = :price, gramm = :gramm, name_page = :name_page WHERE menu.`id` = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':gramm', $gramm);
    $stmt->bindParam(':name_page', $name_page);
    $stmt->bindParam(':id', $id);;
    header('Location: ../../pages/admin.php');
}
?>
