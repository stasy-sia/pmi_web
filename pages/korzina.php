<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /pages/regest.php');
    exit();
}
?>
<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
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

    <div class="collapse navbar-collapse" id="navbarSupportedContent"">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="../index.php" class="nav-link">Главная</a>
        </li>
        <li class="nav-item">
            <a href="menu.php" class="nav-link">Меню</a>
        </li>
        <li class="nav-item ">
            <a href="contacts.php" class="nav-link">Контакты</a>
        </li>
        <li class="nav-item ">
            <a href="contacts.php" class="nav-link" data-toggle="modal" data-target="#exampleModal">Заказ</a>
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
if (!isset($_SESSION['basket'])){
    /*
    $_SESSION['test']['brek']['1']['name'] = 'test';
   echo $_SESSION['test']['brek']['1']['name'];
   $_SESSION['test']['brek']['2']['name'] = 'test2';
    echo $_SESSION['test']['brek']['2']['name'];
    */
    ?>

    <h3 style="text-align: center"> Корзина пуста</h3>

<?php
}else{?>
    <?php
    $itog = 0;
    $price = 0;
    foreach ($_SESSION['basket'] as $cat => $category ) {
        if($cat == 0) {
            $image = 'breakfast';
        }
        if($cat == 1) {
            $image = 'dinner';
        }
        if($cat == 2){
            $image = 'dessert';
        }
        if($cat == 3) {
            $image = 'drinks';
        }
        foreach ($category as $i){
            ?>

            <div class="container-fluid container row text-center justify-content">
                <div class="row col-xs-3 col-sm-2 col-lg-12">
                        <img src="../assets/images/<?=$image?>/<?=$i['id']; ?>.png" alt="" style=" width: 210px; height: 210px">
                         <div>
            <?php
            foreach ($i as $k => $j) {
                if ($k == 'name') {
                    ?>
                    <h3><?= $j; ?></h3>
                    <?php
                }
                if ($k == 'price') {
                    $price = $j;
                    ?>
                    <h3>Цена <?= $j; ?>р</h3>
                    <?php
                }
                if ($k == 'count') {
                    $itog += $price * $j;
                    ?>
                        <h4>
                            Количество:
                            <input value="<?= $j ?>" type="text" style="margin-left: 10px;  width: 40px; height: 40px">
                            шт.
                        </h4>
                    <?php
                }
            }
        ?>
                         </div>
                </div>
            </div>
        <?php
        }
    }?>
    <div class="card text-white bg-dark">
        <div class="card-header">
            <h2> Итоговая цена</h2>
        </div>
        <div class="card-body" >
            <h3 class="card-text"><?=$itog?> рублей </h3>
            <form action=../src/PHP/History.php?" method="post">
                <p>
                    <input type="hidden" value="<?= $itog?>" name="itog">
                    <button type="submit" class="btn btn-success">Оплатить</button>
                </p>
            </form>
        </div>
    </div>
<?php
}?>

<div id="footer">
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
