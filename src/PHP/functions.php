<?php
function PDO_OPT()
{
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
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    return $pdo;
}
function SET_LOG()
{
    session_start();
    $id = "NULL";
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']['id'];
    }
    $page = $_SERVER["REQUEST_URI"];
    $count = substr_count($page,'/') - 1;
    $file = '';
    for($i = 0 ; $i < $count; $i++)
        $file = $file.'../';
    $file = $file.'modules/log/pages.log';
    $col_str = 5000;
    $date = date("H:i:s d.m.Y");
    $lines = file($file);
    while(count($lines) > $col_str) array_shift($lines);
    $lines[] = $date.";".$id.";".$page.";\r\n";
    file_put_contents($file, $lines);
    return 0;
}
?>