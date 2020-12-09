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
    $mysql->query("UPDATE `$cat` SET `name` = '$name', `price` = '$price', `gramm` = '$gramm', `picture` = '$name_file' WHERE `$cat`.`id` = $id");
    header('Location: ../../pages/admin.php');
} else {
    if (isset($_FILES)) {
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
        if ($fileChecked) {
            $success = move_uploaded_file($myFile['tmp_name'][0], $uploadFile);
            if(!$success){
                echo "<p>Не удалось загрузить файл.</p>";
                exit;
            }
            chmod($uploadDir.$name_file, 0644);
            $mysql->query("UPDATE `$cat` SET `name` = '$name', `price` = '$price', `gramm` = '$gramm', `picture` = '$name_file' WHERE `$cat`.`id` = $id");
            header('Location: ../../pages/admin.php');
            /*                                                          Проверка на копии  */
            /*
            $search = $mysql->query("SELECT * FROM `$cat`");
            $p = 0;
            $parts = pathinfo($picture)
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
            }*/
            /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////  */
           // move_uploaded_file($_FILES['file']['tmp_name'][0], $uploadFile);
          //  header('Location: ../../pages/admin.php');
        } else {
            echo "Недопустимый формат <br>";
        }
    } else {
        echo "Вы не прислали файл!";
    }
}
?>
