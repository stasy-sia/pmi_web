<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['basket']);
header('Location: ../../pages/regest.php');
?>