<?
session_start();
if(isset($_FILES)) {
    $allowedTypes = array('image/jpeg','image/png','image/gif');
    $uploadDir = "../../assets/images/breakfast/";
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
                $_SESSION['name_file'] = $_FILES['file']['name'][$i];
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