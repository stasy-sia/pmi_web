<?php
session_start();
require_once("functions.php");
if(!empty($_FILES['file']['name'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    if($fileChecked) {
        $success = move_uploaded_file($myFile['tmp_name'], $uploadFile);
        if(!$success){
            echo "<p>Не удалось загрузить файл.</p>";
            exit;
        }
        chmod($uploadDir.$name_file, 0644);
        $pdo = PDO_OPT();
        $stmt = $pdo->prepare("INSERT INTO menu (name, price, gramm, picture, category, name_page) VALUES (:name, :price, :gramm, :name_file, :category, :name_page)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':gramm', $gramm);
        $stmt->bindParam(':name_file', $name_file);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':name_page', $name_page);
        $stmt->execute();
        header('Location: ../../pages/admin.php');
        /*                                                          Проверка на копии  */

    } else {
        echo "Недопустимый формат <br>";
    }
}
else {
    echo "Вы не прислали файл!" ;
}

?>