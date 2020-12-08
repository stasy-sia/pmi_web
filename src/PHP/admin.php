<?php
session_start();

if(isset($_FILES)) {
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
    /*  Проверка на копии  */
    $search = $mysql->query("SELECT * FROM `breakfast`");
    for($k = 0; $k < mysqli_num_rows($search); $k++) {
        $result = $search->fetch_assoc();
        for ($p = 0; $p < count($_FILES['file']['name']); $p++) {
            if ($result['picture'] == $_FILES['file']['name'][$p]) {
                $second_name = $_FILES['file']['name'][$p];
                $first_name = mysqli_num_rows($search) + 1;
                $_FILES['file']['name'][$p] = "$first_name$second_name";
            }
        }
    }
    /*                  */

    /* Проверка на павильность файла */
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
        /*                         */
        if($fileChecked[$i]) { //Если формат допустим, создаём элемент

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