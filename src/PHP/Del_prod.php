<?php
session_start();
$cat = $_POST['cat'];
$id = $_POST['id'];
unset($_SESSION['basket'][$cat][$id]);
header('Location: ../../pages/korzina.php');
?>