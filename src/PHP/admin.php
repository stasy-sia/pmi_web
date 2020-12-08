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
    $allowedTypes = array('image/jpeg','image/png','image/gif');
    $uploadDir = "../../assets/images/$cat/";
    $uploadFile = $uploadDir . basename($_FILES['file']['name'][0]);
    $fileChecked = false;
    for($j = 0; $j < count($allowedTypes); $j++) {
        if($_FILES['file']['type'][0] == $allowedTypes[$j]) {
            $fileChecked = true;
            break;
        }
    }
    /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////  */
    if($fileChecked) {
        $picture = $_FILES['file']['name'][0];
        $mysql->query("INSERT INTO `$cat` (`name`, `price`, `gramm`, `picture`, `category`) VALUES ('$name', '$price', '$gramm', '$picture', '$category')");

        /*                                                          Проверка на копии  */
        $search = $mysql->query("SELECT * FROM `$cat`");
        $p = 0;
        for($k = 0; $k < mysqli_num_rows($search); $k++) {
            $result = $search->fetch_assoc();
            if ($result['picture'] == $_FILES['file']['name'][0] and ($k + 1) != mysqli_num_rows($search)) {
                $second_name = $_FILES['file']['name'][0];
                $p = 1;
                $k = mysqli_num_rows($search) - 1;
                break;
            }
        }
            if ($p == 1) {
                $id = $result['id'];
                $first_name = $id;
                $_FILES['file']['name'][0] = "$first_name$second_name";
                $picture =  $_FILES['file']['name'][0];
                $mysql->query("UPDATE `$cat` SET  `picture` = '$picture' WHERE `$cat`.`id` = $id");
            }
        /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////  */
        move_uploaded_file($_FILES['file']['tmp_name'][0], $uploadFile);
        header('Location: ../../pages/admin.php');
    } else {
        echo "Недопустимый формат <br>";
    }
} else {
echo "Вы не прислали файл!" ;
}
?>