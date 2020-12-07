<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$name = $_POST['name'];
$price = $_POST['price'];
$gramm = $_POST['gramm'];
$cat = $_POST['category'];
if($cat == 'breakfast')
    $category = 'Завтрак';
if($cat == 'dinner')
    $category = 'Обед';
if($cat == 'dessert')
    $category = 'Десерты';
if($cat == 'drinks')
    $category = 'Напитки';

if(isset($_FILES)) {
    $allowedTypes = array('image/jpeg','image/png','image/gif');
    $uploadDir = "../../assets/images/$cat/";
    for($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы
        $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
        $fileChecked[$i] = false;
        for($j = 0; $j < count($allowedTypes); $j++) { //Проверяем на соответствие допустимым форматам
            if($_FILES['file']['type'][$i] == $allowedTypes[$j]) {
                $fileChecked[$i] = true;
                break;
            }
        }
        if($fileChecked[$i]) { //Если формат допустим, перемещаем файл по указанному адресу
            if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {
                $picture = $_FILES['file']['name'][$i];
                $mysql->query("INSERT INTO `$cat` (`name`, `price`, `gramm`, `picture`, `category`) VALUES ('$name', '$price', '$gramm', '$picture', '$category')");
                header('Location: ../../pages/admin.php');
            }
        } else {
            echo "Недопустимый формат <br>";
        }
    }
} else {
    echo "Вы не прислали файл!" ;
}
?>