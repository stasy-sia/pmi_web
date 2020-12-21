<?php
require_once("functions.php");
/*
$host = 'localhost';
$db   = 'regist';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES   => false,
];*/
$pdo = PDO_OPT();
$add = $pdo->prepare("SELECT * FROM menu");
$add->execute();
$test = $add ->fetchAll(PDO::FETCH_ASSOC);
foreach ($test as $product)
{
    echo $product['name'];
}

/*
while ($row = $stmt->fetch(PDO::FETCH_LAZY))
{
    echo $row[0] . "\n";
    echo $row['name'] . "\n";
    echo $row->name . "\n";
}*/
?>
