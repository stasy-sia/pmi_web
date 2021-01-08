<?php
session_start();
require_once ("functions.php");
if (isset($_GET['search']) and strlen($_GET['search'])) {
    unset($_SESSION['search_result']);
    $search_get = $_GET['search'];
    $search_get_number = $search_get;
    $search_get = "%$search_get%";
    $pdo = PDO_OPT();
    $check = 0;
    if ($_GET['city'] == 1) {
        $add = $pdo->prepare("SELECT * FROM cities WHERE adress LIKE ?");
        $add->execute(array($search_get));
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['city'] = $prod;
        $check = 1;
    }
    if ($_GET['cafe'] == 1) {
        $add = $pdo->prepare("SELECT * FROM restaurants WHERE name LIKE ?");
        $add->execute(array($search_get));
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['cafe'] = $prod;
        $check = 1;
    }
    if ($_GET['workers'] == 1) {
        $add = $pdo->prepare("SELECT * FROM workers WHERE salary = :salary OR name LIKE :name OR position LIKE :position");
        $add->bindParam(':salary', $search_get_number);;
        $add->bindParam(':name', $search_get);;
        $add->bindParam(':position', $search_get);;
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['workers'] = $prod;
        $check = 1;
    }
    if ($_GET['suppliers'] == 1) {
        $add = $pdo->prepare("SELECT * FROM suppliers WHERE name LIKE ?");
        $add->execute(array($search_get));
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['suppliers'] = $prod;
        $check = 1;
    }
    if ($_GET['prod_supp'] == 1){
        $add = $pdo->prepare("SELECT * FROM prod_supp WHERE count = :count OR price = :price");
        $add->bindParam(':count', $search_get_number);
        $add->bindParam(':price', $search_get_number);;
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['prod_supp'] = $prod;
        $check = 1;
    }
    if($check == 0)
    {
        $add = $pdo->prepare("SELECT * FROM cities WHERE adress LIKE ?");
        $add->execute(array($search_get));
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['city'] = $prod;

        $add = $pdo->prepare("SELECT * FROM restaurants WHERE name LIKE ?");
        $add->execute(array($search_get));
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['cafe'] = $prod;

        $add = $pdo->prepare("SELECT * FROM workers WHERE salary = :salary OR name LIKE :name OR position LIKE :position");
        $add->bindParam(':salary', $search_get_number);;
        $add->bindParam(':name', $search_get);;
        $add->bindParam(':position', $search_get);;
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['workers'] = $prod;

        $add = $pdo->prepare("SELECT * FROM suppliers WHERE name LIKE ?");
        $add->execute(array($search_get));
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_POST['search_result']['suppliers'] = $prod;

        $add = $pdo->prepare("SELECT * FROM prod_supp WHERE count = :count OR price = :price");
        $add->bindParam(':count', $search_get_number);
        $add->bindParam(':price', $search_get_number);;
        $add->execute();
        $prod = $add->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['search_result']['prod_supp'] = $prod;

    }
}
header('Location: ../../pages/select_find_cafe.php');