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

    <title>Поиск "У Папы Сантьяго": <?php echo $_GET['search']?></title>
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
            <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input type="search" name="search" class="form-control mr-sm-2" placeholder="Поиск" value="<?= $_GET['search'] ?>" aria-label="Search" autofocus >
                <button type="submit" name="subBtn" class="btn btn-outline-success my-2 my-sm-0">Найти</button>
            </form>
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


<?php
$connect = new mysqli("127.0.0.1", "root", "root", "search");
$search_get = $_GET['search'];
$sql = "SELECT * FROM `menu` WHERE `name` LIKE '%$search_get%'";
//$sql = "SELECT * MATCH(`name`) AGAINST('$search_get') FROM `menu`";
$select = $connect->query($sql);
$select_wile = $select->fetch_assoc();
$categoryes = '';
$i = 0;
while ($i < mysqli_num_rows($select) - 1){
    if($select_wile['category'] != $categoryes){?>
    <div class="container-fluid p-0">
        <h1 class="text-center" style="background-color:#FFBF73"><?= $select_wile['category'] ?></h1>
    </div>
        <?php
    $categoryes = $select_wile['category'];
    }
    ?>
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center justify-content">
                <?php
                    for (; $i < mysqli_num_rows($select) - 1; $i++) {
                        if($select_wile['category'] != $categoryes){
                            break;
                        }
                 ?>
                <div class="col-xs-12 col-sm-4 col-lg-3">
                    <img src="../assets/images/<?= $select_wile['picture'];?>" alt="" class="w-100">
                    <h3><?= $select_wile['name'];?></h3>
                    <?php
                        if($select_wile['category'] == 'Десерты'){
                            ?>
                            <p style="color: red;"><?= $select_wile['price'];?>р</p>
                            <?php
                        }elseif ($select_wile['category'] == 'Напитки'){
                            ?>
                            <p style="color: red;"><?= $select_wile['price'];?>р / <?= $select_wile['gramm'];?>мл</p>
                            <?php
                        }else{
                            ?>
                            <p style="color: #ff0000;"><?= $select_wile['price'];?>р / <?= $select_wile['gramm'];?>гр</p>
                            <?php
                        }
                        ?>
                </div>
                        <?php
                        $select_wile = $select->fetch_assoc();
                    }
                    ?>
            </div>
         </div>
     </div>
    <?php
}
?>

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