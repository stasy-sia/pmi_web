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

  <title>Меню "У Папы Сантьяго"</title>
  <link rel="stylesheet" href="../assets/css/style.css">
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
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
          <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">Заказ</a>
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
          if (empty($_COOKIE['user'])) :
          ?>
        <li class="nav-item my-2 my-lg-0">
          <a href="/pages/regest.php" class="nav-link mr-sm-2">Войти/Зарегистрироваться</a>
        </li>
          <?php
          endif;
          ?>
        <?php
        if (empty($_COOKIE['user'])) :
            ?>
      <?php
        else : ?>
        </ul>
      <li class="nav-link" >Привет, <?= $_COOKIE['user'] ?>.<a href="/pages/regest.php" > Личный кабинет </a><a href="/src/PHP/exit.php" >Выйти</a></li>
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
    <h1 class="text-center" style="background-color:#FFBF73">Завтраки</h1>
  </div>
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center justify-content">
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/eggs1.png" alt="" class="w-100">
          <h3>Бутерброд с яйцом</h3>
          <p style="color: red;">250р / 100гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/pankayk.png" alt="" class="w-100">
          <h3>Блинчики с мёдом</h3>
          <p style="color: red;">120р / 90гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/kasha.png" alt="" class="w-100">
          <h3>Домашняя овсяная каша</h3>
          <p style="color: red;">150р / 250гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/skrambl.png" alt="" class="w-100">
          <h3>Скрамбл</h3>
          <p style="color: red;">260р / 100гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/avakado.png" alt="" class="w-100">
          <h3>Авакадо-Тост с лососем</h3>
          <p style="color: red;">410р / 120гр/</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/granola.png" alt="" class="w-100">
          <h3>Гранола c йогуртом</h3>
          <p style="color: red;">260р / 150гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/iogurt.png" alt="" class="w-100">
          <h3>Домашний йогурт с ягодным соусом</h3>
          <p style="color: red;">180р / 250гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/sirniki.png" alt="" class="w-100">
          <h3>Сырники</h3>
          <p style="color: red;">270р / 130гр</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <h1 class="text-center" style="background-color:#FFBF73">Обед&Ужин</h1>
  </div>
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center justify-content">
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/kurini_sup.png" alt="" class="w-100">
          <h3>Куриный супчик с домашней лапшой</h3>
          <p style="color: red;">300р / 240гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/losos.png" alt="" class="w-100">
          <h3>Лосось с Птитином</h3>
          <p style="color: red;">620р / 270гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/tereaki.png" alt="" class="w-100">
          <h3>Рис с курицей Тереяки</h3>
          <p style="color: red;">410р / 230гр </p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/sup_tik.png" alt="" class="w-100">
          <h3>Суп-крем тыквенный </h3>
          <p style="color: red;">290р / 300гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/staik.png" alt="" class="w-100">
          <h3>Стейк из вырезки говядины под перечным соусом</h3>
          <p style="color: red;">750р / 180гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/befstrog.png" alt="" class="w-100">
          <h3>Бефстроганов с картофельным пюре по особому рецепту</h3>
          <p style="color: red;">510р / 350гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/kotletakiev.png" alt="" class="w-100">
          <h3>Котлета по-киевски</h3>
          <p style="color: red;">410р / 310гр</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/kalmar.png" alt="" class="w-100">
          <h3>Кальмар в сливочном соусе с булгуром</h3>
          <p style="color: red;">470р / 290гр/</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <h1 class="text-center" style="background-color:#FFBF73">Десерты</h1>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="row text-center justify-content">
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/chizcaick.png" alt="" class="w-100">
          <h3>Торт "Чизкейк"</h3>
          <p style="color: red;">150р</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/mango_cake.png" alt="" class="w-100">
          <h3>Торт "Манго"</h3>
          <p style="color: red;">150р</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/tiramisu.png" alt="" class="w-100">
          <h3>Пирожное "Тирамису"</h3>
          <p style="color: red;">140р</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/napoleon.png" alt="" class="w-100">
          <h3>Пирожное "Наполеон"</h3>
          <p style="color: red;">130р</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/si4nik.png" alt="" class="w-100">
          <h3>Пирожное "Сочник"</h3>
          <p style="color: red;">50р</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/applesharlota.png" alt="" class="w-100">
          <h3>Яблочная шарлотка</h3>
          <p style="color: red;">120р</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/medovik.png" alt="" class="w-100">
          <h3>Торт "Медовик"</h3>
          <p style="color: red;">130р</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/maffin.png" alt="" class="w-100">
          <h3>Маффин с шоколадом</h3>
          <p style="color: red;">100р</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <h1 class="text-center" style="background-color:#FFBF73">Напитки</h1>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="row text-center justify-content">
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/tealatte.png" alt="" class="w-100">
          <h3>TEALATTE</h3>
          <p style="color: red;">190р / 350мл</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/malintea.png" alt="" class="w-100">
          <h3>Малиновый чай с мёдом и мятой</h3>
          <p style="color: red;">290р / 600мл</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/sencha.png" alt="" class="w-100">
          <h3>Сенча</h3>
          <p style="color: red;">250р / 600мл</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/ulun.png" alt="" class="w-100">
          <h3>Молочный улун</h3>
          <p style="color: red;">250р / 600мл</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/latte.png" alt="" class="w-100">
          <h3>Латте</h3>
          <p style="color: red;">160р / 250мл</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/glasse.png" alt="" class="w-100">
          <h3>Гляссе</h3>
          <p style="color: red;">190р / 250мл</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/capuchino.png" alt="" class="w-100">
          <h3>Капучино</h3>
          <p style="color: red;">150р / 200мл</p>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3"><img src="../assets/images/grog.png" alt="" class="w-100">
          <h3>Грог</h3>
          <p style="color: red;">580р / 1000мл</p>
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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
  <script src="scripts.js"></script>
</body>

</html>