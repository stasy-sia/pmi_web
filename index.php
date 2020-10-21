<?php

session_start();

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
  <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
  <title>Столовая "У папы Сантьяго"</title>
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

    <div class="collapse navbar-collapse" id="navbarSupportedContent" ">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a href="index.php" class="nav-link">Главная</a>
        </li>
        <li class="nav-item">
          <a href="pages/menu.php" class="nav-link">Меню</a>
        </li>
        <li class="nav-item">
          <a href="pages/contacts.php" class="nav-link">Контакты</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">Заказ</a>
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
            if(!isset($_SESSION['user'])):
                ?>
            <?php
            else : ?>
        </ul>
        <li class="nav-link" >Привет, <?= $_SESSION['user']['name'] ?>.<a href="/pages/korzina.php" > Корзина </a><a href="/src/PHP/exit.php" >Выйти</a></li>
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

  <div class="container-fluid p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
        <li class="" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li class="" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/images/maui.png" alt="" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="assets/images/look-cafe.png" alt="" class="d-block w-100">
        </div>

        <div class="carousel-item">
          <img src="assets/images/look-ckafe2.png" alt="" class="d-block w-100">
        </div>
      </div>
    </div>
  </div>

  <div id="footer">
    © У Папы Сантьяго 2020 &nbsp; • &nbsp; г. Волгоград, проспект Университетский, д. 100&nbsp; &nbsp;• &nbsp; Тел.: 8
    800 555-35-35
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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