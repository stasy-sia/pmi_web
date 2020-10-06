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

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="../index.php" class="nav-link">Главная</a>
            </li>
            <li class="nav-item">
                <a href="menu.php" class="nav-link">Меню</a>
            </li>
            <li class="nav-item">
                <a href="contacts.php" class="nav-link">Контакты</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">Заказ</a>
            </li>
            <?php
            if (empty($_COOKIE['user'])) :
                ?>
                <li class="nav-item">
                    <a href="regest.php" class="nav-link">Войти/Зарегистрироваться</a>
                </li>
            <?php
            endif;
            ?>
        </ul>
        <?php
        if (empty($_COOKIE['user'])) :
            ?>
            <form class="form-inline my-2 my-lg-0">
                <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0">Search</button>
            </form>
        <?php
        else :
            ?>
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

<div class="container-fluid">
    <?php
    if($_COOKIE['user'] == ''):
    ?>
    <div class="container">

        <div class="row text-left justify-content-around">

            <div class="col-xs-3 col-sm-2 col-lg-4">
                <form action="../src/PHP/auth.php" method="post" class="auth">
                    <div class="form-froup">
                        <h5 class="Modal-title">Авторизация</h5>
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                        <label></label>
                        <label></label>
                        <input type="password" class="form-control" name="pass" placeholder="Пароль" required>
                        <label></label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" required>
                            Запомнить меня
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>

            </div>
            <div class="col-xs-2 col-sm-2 col-lg-4 ">
                <form action="../src/PHP/regist.php" method="post" class="auth">
                    <h5 class="Modal-title">Регистрация</h5>
                    <div class="row">
                        <div class="col">
                            <div class="form-froup">

                                <input type="text" class="form-control" name="name" placeholder="Имя" required>

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-froup">

                                <input type="text" class="form-control" name="surname" placeholder="Фамилия" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-froup">
                        <label ></label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <label></label>
                        <label ></label>
                        <input type="password" class="form-control" name="pass" placeholder="Пароль" required>
                        <label></label>
                        <label></label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" required>
                            Согласие на обработку данных
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Регестрация</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php else: ?>
<?php
$mysql = new mysqli('localhost','root','root','regist');
$name = $_COOKIE['user'];
$result= $mysql->query("SELECT `email` FROM `users` WHERE `name` = '$name'");
$arr=$result->fetch_assoc();
$email=$arr['email'];
$result= $mysql->query("SELECT `surname` FROM `users` WHERE `name` = '$name'");
$arr=$result->fetch_assoc();
$surname = $arr['surname'];

?>
<div class="back_text">
    <p>Имя: <?= $_COOKIE['user'] ?></p>
    <p>Фамилия: <?=$surname?></p>
    <p>Email: <?=$email?></p>
</div>
<?php
$mysql->close();
?>
<?php endif; ?>
<div id="footer" style="position:absolute;">
    © У Папы Сантьяго 2020 &nbsp; • &nbsp; г. Волгоград, проспект Университетский, д. 100&nbsp; &nbsp;• &nbsp; Тел.:
    8
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