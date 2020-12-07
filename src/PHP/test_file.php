<?
session_start();
//echo $_FILES['file']['name'][0];

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
          //  if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {
            echo "Aplod: ",  $uploadFile[$i];
            echo " tmp: ", $_FILES['file']['tmp_name'][$i];
                $_SESSION['name_file'][0] = $_FILES['file']['name'][$i];
                $_SESSION['name_file'][1] = $_FILES['file']['tmp_name'][$i];
                // header('Location: ../../pages/admin.php');
        //    }
        } else {
            echo "Недопустимый формат <br>";
        }
    }
} else {
   echo "Вы не прислали файл!" ;
}
?>