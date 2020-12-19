<?php
session_start();
?>
<!DOCTYPE html>
<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <title>Меню "У Папы Сантьяго"</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #FFBF73;">
    <a href="#" class="navbar-brend">
        <img src="https://sun9-23.userapi.com/V52b4W3F4tIyICwnARlr2NUZ2Lso8luh_J5JyA/FXpViQ2dhvg.jpg" width="30"
             height="30" alt="logo">
    </a>
    <button class="navbar-toggler" type=" button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent"">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a href="../index.php" class="nav-link">Главная</a>
        </li>
        <li class="nav-item active">
            <a href="menu.php" class="nav-link">Меню</a>
        </li>
        <li class="nav-item">
            <a href="contacts.php" class="nav-link">Контакты</a>
        </li>

        <li class="nav-item">
            <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input type="search" name="search" class="form-control mr-sm-2" placeholder="Поиск" aria-label="Search" autofocus>
                <button type="submit" name="subBtn" class="btn btn-outline-success my-2 my-sm-0">Найти</button>
            </form>
        </li>
    </ul>
    <ul class="navbar-nav">
        <?php
        if(!isset($_SESSION['user'])) :
            ?>
            <li class="nav-item my-2 my-lg-0">
                <a href="/pages/regest.php" class="nav-link mr-sm-2">Войти/Зарегистрироваться</a>
            </li>


        <?php
        else : ?>
    </ul>
    <li class="nav-link">Привет, <?= $_SESSION['user']['name'] ?>.<a href="/pages/korzina.php"> Корзина </a><a href="/src/PHP/exit.php">Выйти</a></li>
    <li class="nav-link" ><a href="OrederHistory.php" >История заказов</a></li>
    <?php
    endif;
    ?>

    </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Заказ</h5>
                <buttom class="close" type="button" data-dismiss="modal" aria-label="Сlose">
                    <span aria-hidden="true">&times;</span>
                </buttom>
            </div>
            <div class="modal-body">
                <p> Можете нам позвонить по номеру телефона 8(800)-555-35-35</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript">
    function call() {
        var msg   = $('#formx').serialize();
        $.ajax({
            // Метод передачи
            type: 'POST',
            // Файл которому передаем запрос и получаем ответ
            url: '../src/PHP/order_Ajax.php',
            // Кеширование
            cache: false,
            // Верямя ожидания ответа, в мили секундах 1000 мс = 1 сек
            timeout:3000,
            data: msg,
            // Функция сработает при успешном получении данных
            success: function(data) {
                // Отображаем данные в форме
                $('#results').html(data);
            },
            // Функция срабатывает в период ожидания данных
            beforeSend: function(data) {
                $('#results').html('<p>Ожидание данных...</p>');
            },
            // Тип данных
            dataType:"html",
            // Функция сработает в случае ошибки
            error:  function(data){
                $('#results').html('<p>Возникла неизвестная ошибка. Пожалуйста, попробуйте чуть позже...</p>');
            }
        });
    }
</script>

<form method="POST" id="formx" action="javascript:void(null);" onsubmit="call()">
    <input id="url" name="url" value="" type="text">
    <input value="Проверить" type="submit">
</form>

<div id="results">Тут будет выведен результат</div>


<div id="footer">
    © У Папы Сантьяго 2020 &nbsp; • &nbsp; г. Волгоград, проспект Университетский, д. 100&nbsp; &nbsp;• &nbsp; Тел.: 8
    800 555-35-35
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<script src="../src/js/script.js"></script>
</body>

</html>