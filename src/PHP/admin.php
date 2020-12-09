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


    /*                                                       Проверка на павильность файла */
    $uploadDir = "../../assets/images/$cat/";
    $myFile = $_FILES['file'];
    $name_file =preg_replace("/[^A-Z0-9._-]/i","_",$myFile['name'][0]);
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
        if ($myFile['type'][0] == $allowedTypes[$j]) {
            $fileChecked = true;
            break;
        }
    }
    /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////  */
    if($fileChecked) {
        $success = move_uploaded_file($myFile['tmp_name'][0], $uploadFile);
        if(!$success){
            echo "<p>Не удалось загрузить файл.</p>";
            exit;
        }
        chmod($uploadDir.$name_file, 0644);
        $mysql->query("INSERT INTO `$cat` (`name`, `price`, `gramm`, `picture`, `category`) VALUES ('$name', '$price', '$gramm', '$name_file', '$category')");
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