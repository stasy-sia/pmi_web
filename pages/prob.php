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

    <div class="collapse navbar-collapse" id="navbarSupportedContent"
    ">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="../index.php" class="nav-link">Главная</a>
        </li>
        <li class="nav-item">
            <a href="menu.php" class="nav-link">Меню</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link">Контакты</a>
        </li>

        <li class="nav-item">
            <form class="form-inline my-2 my-lg-0" method="get" action="prob.php">
                <input type="search" name="search" class="form-control mr-sm-2" placeholder="Поиск" value="<?= $_GET['search'] ?>" aria-label="Search" autofocus >
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Найти</button>
            </form>
        </li>
    </ul>
    <ul class="navbar-nav">
        <?php
        if (!isset($_SESSION['user'])) :
            ?>
            <li class="nav-item my-2 my-lg-0">
                <a href="/pages/regest.php" class="nav-link mr-sm-2">Войти/Зарегистрироваться</a>
            </li>
        <?php
        endif;
        ?>
        <?php
        if (isset($_SESSION['user'])){
        ?>

        <?php if ($_SESSION['user']['id'] == 7): ?>
    </ul>
    <li class="nav-link" ><a href="/pages/admin.php" > Админ </a><a href="/pages/OrederHistory.php" >История заказов</a></li>
    <li class="nav-link" ><a href="/src/PHP/exit.php" >Выйти</a></li>
    <?php else: ?>
        <div class="dropdown">
            <li onclick="myFunction()" class="dropbtn nav-link" >Привет, <?= $_SESSION['user']['name'] ?> </li>
            <div id="myDropdown" class="dropdown-content">
                <a href="korzina.php">Корзина</a>
                <a href="OrederHistory.php">История заказов</a>
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

<?php
if (isset($_GET['search']) and strlen($_GET['search'])) {
    $search = $_GET['search'];
    $j = -1;
    for ($i = 1; $i <= 32; $i++) {
        $text = file_get_contents('../html/' . $i . '.html');
        $pos = strpos($text, $search);
        if ($pos) {
            if (($pos - 30) > 0) {
                $j = $pos - 30;
            } else {
                $j = 0;
            }
            if (($pos + 100) < strlen($text)) {
                $k = 100;
            } else {
                $k = strlen($text) - $pos;
            }
            ?>
            <a style="font-size: 200%" href="../html/<?= $i ?>.html" class="nav-link"><?= $i ?>.html</a>
            <h5 style="opacity: 0.7;">...<?= substr($text, $j, $k) ?>...</h5>
            <?php
        }
    }
    if ($j == -1) {
        ?>
        <h3 style="text-align: center">Ничего не найдено</h3>
        <?php
    }
} else {
    ?>
    <h3 style="text-align: center"> Пустой запрос</h3>
    <?php
}
?>

<div id="footer" style="position:absolute;">
    © У Папы Сантьяго 2020 &nbsp; • &nbsp; г. Волгоград, проспект Университетский, д. 100&nbsp; &nbsp;• &nbsp; Тел.:
    8
    800 555-35-35
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../src/js/script.js"></script>
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