<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$gramm = $_POST['gramm'];
$picture = $_POST['picture'];
$cat = $_POST['cat'];
$link = "../../assets/images/$cat/$picture";
unlink($link);
if($_POST['Del'] == "tru") {
    $picture = NULL;
} else {
    if (isset($_FILES)) {
        $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
        $uploadDir = "../../assets/images/$cat/";
        $uploadFile = $uploadDir . basename($_FILES['file']['name'][0]);
        $fileChecked = false;
        for ($j = 0; $j < count($allowedTypes); $j++) {
            if ($_FILES['file']['type'][0] == $allowedTypes[$j]) {
                $fileChecked = true;
                break;
            }
        }

        if ($fileChecked) {
            $picture = $_FILES['file']['name'][0];
            $mysql->query("UPDATE `$cat` SET `name` = '$name', `price` = '$price', `gramm` = '$gramm', `picture` = '$picture' WHERE `$cat`.`id` = $id");

            /*                                                          Проверка на копии  */
            $search = $mysql->query("SELECT * FROM `$cat`");
            $p = 0;
            for ($k = 0; $k < mysqli_num_rows($search); $k++) {
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
                $picture = $_FILES['file']['name'][0];
                $uploadFile = $uploadDir . basename($_FILES['file']['name'][0]);
                $mysql->query("UPDATE `$cat` SET  `picture` = '$picture' WHERE `$cat`.`id` = $id");
            }
            /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////  */
            move_uploaded_file($_FILES['file']['tmp_name'][0], $uploadFile);
            header('Location: ../../pages/admin.php');
        } else {
            echo "Недопустимый формат <br>";
        }
    } else {
        echo "Вы не прислали файл!";
    }
}
?>
