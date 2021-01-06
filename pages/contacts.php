<?php
session_start();
require_once("../src/PHP/functions.php");
SET_LOG();
?>
<!doctype html>
<html lang="ru">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <title>Контакты "У папы Сантьяго"</title>
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
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">Главная</a>
                </li>
                <li class="nav-item">
                    <a href="menu.php" class="nav-link">Меню</a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">Контакты</a>
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
            endif;
            ?>
                 <?php
                 if(isset($_SESSION['user'])){
                 ?>

                 <?php if($_SESSION['user']['id']==7): ?>
             </ul>
        <li class="nav-link" ><a href="/pages/admin.php" > Админ </a><a href="/src/PHP/exit.php" >Выйти</a></li>
        <li class="nav-link" ><a href="OrederHistory.php" >История заказов</a></li>
        <?php else: ?>
            <div class="dropdown">
                <li onclick="myFunction()" class="dropbtn nav-link" >Привет, <?= $_SESSION['user']['name'] ?> </li>
                <div id="myDropdown" class="dropdown-content">
                    <a href="korzina.php">Корзина</a>
                    <a href="OrederHistory.php">История заказов</a>
                    <a href="/pages/change_pass.php">Личный кабинет</a>
                    <a href="../src/PHP/exit.php" style="color: red">Выйти</a>
                </div>
            </div>
        <?php
        endif;
        ?>
        <?php
        }
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

    <div class="container-fluid">
        <div class="container">
           
            <div class="row text-left justify-content-around">
                <!--
              <div class="col-sm-4">a</div>
              <div class="col-sm-4">b</div>
              <div class="col-sm-4">c</div>
              >!-->

                <div class="col-xs-3 col-sm-2 col-lg-4">
                    <label></label>
                    <h4>Режим работы: ежедневно 07:30 – 00:00 </h4>
                        <h4>Адрес: г. Волгоград, 
                        проспект Университетский, д. 100</h4>
                        <h4>Тел.: +8 (800)-555-35-35;</h4>
                </div>
                <div class="col-xs-2 col-sm-2 col-lg-4 ">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="form-froup">
                                    <label></label>
                                        <input class="form-control" placeholder="Имя">
                                </div>
                            </div>
                            <div class="col">
                                 <div class="form-froup">
                                     <label></label>
                                     <input class="form-control" placeholder="Фамилия">
                                 </div>
                            </div>
                        </div>
                        <div class="form-froup">
                            <label for="exampleInputEmail"></label>
                            <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                            <label></label>
                        </div>
                         <form>
                            <div class="input-group">
                                <textarea class="form-control" placeholder="Ваш отзыв"></textarea>
                              </div>
                        </form>
                        <div class="form-check">
                             <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input">
                                 Согласие на обработку данных
                                 </label>
                        </div>
                        <button class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </div>
    </div>


    <div id="footer" style="position:absolute;">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Addeccc7dc0b81210638709fd2ed7ca4bd638547ca7248b38153001afc49aada1&amp;width=100%25&amp;height=398&amp;lang=ru_RU&amp;scroll=true"></script>

        © У Папы Сантьяго 2020 &nbsp; • &nbsp; г. Волгоград, проспект Университетский, д. 100&nbsp; &nbsp;• &nbsp; Тел.:
        8
        800 555-35-35
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../src/js/script.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU"
            type="text/javascript">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>