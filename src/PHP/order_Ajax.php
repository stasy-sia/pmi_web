<?php
/*
if(isset($_GET['q'])) {
  //  header("Content-type: text/txt; charset=UTF-8");
    if($_GET['q']=='1') {
        echo 'запрос GET успешно обработан, q = 1';
    }
    else {
        echo 'карявый GET запрос';
    }
}
if(isset($_POST['z'])) {
//    header("Content-type: text/txt; charset=UTF-8");
    if($_POST['z']=='1') {
        echo 'запрос POST успешно обработан, z = 1';
    }
    else {
        echo 'карявый POST запрос';
    }
}*/
// Заголовок станицы с кодировкой
header('Content-Type: ../../pages/menu2.php; charset=UTF-8');
// Выводим время
echo 'Время - '.date('l jS \of F Y h:i:s A');
// Выводим принятое
echo 'Вы ввели - '.$_POST['url'];
?>