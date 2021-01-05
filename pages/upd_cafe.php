<?php
session_start();
require_once("../src/PHP/functions.php");
if (!isset($_SESSION['user'])) {
    header('Location: /pages/regest.php');
    exit();
}

$update_id = $_GET['id'];

$pdo = PDO_OPT();
$stmt = $pdo->prepare("SELECT * FROM restaurants WHERE id = :update_id");
$stmt->bindParam(':update_id', $update_id);
$stmt->execute();
$prod = $stmt ->fetchAll(PDO::FETCH_ASSOC);
$stmt1 = $pdo->prepare("SELECT * FROM cities WHERE id_cafe = :update_id");
$stmt1->bindParam(':update_id', $update_id);
$stmt1->execute();
foreach ($stmt1 as $a)
    $address = $a['adress'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        if(!isset($_SESSION['user'])):
            ?>
        <?php
        else : ?>
    </ul>
    <li class="nav-link" ><a href="/pages/admin.php" > Админ </a><a href="/pages/korzina.php" > Корзина </a><a href="/pages/OrederHistory.php" >История заказов</a></li>
    <li class="nav-link" ><a href="/src/PHP/exit.php" >Выйти</a></li>
    <?php
    endif;
    ?>
    </div>
</nav>
</table>
<?php
if($_SESSION['user']['id']==7){
    foreach ($prod as $update)
    {
        ?>
        <div style="padding-top: 10px; margin-left: 15px ">
            </table>
            <br></br>
            <H4>Update cafe</H4>
            <form action ="/src/PHP/upd_cafe.php" method="post">
                <input type="hidden" name="id" value="<?=$update['id']?>">
                <h4>Name</h4>
                <input tupe="text" name="name" value="<?=$update['name']?>">
                <h4>city</h4>
                <input tupe="number" name="city" value="<?=$update['city']?>">
                <h4>address</h4>
                <input tupe="number" name="address" value="<?=$address?>">
                <input type='submit' value='Update product' >
            </form>
        </div>
        <?php
    }
}
else{
    echo "У вас нет прав";
}
?>
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

<div id="footer" style="position:flex;">
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