<?php
include "Database.php";

$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$x3 = $_POST['x3'];
$x4 = $_POST['x4'];
$x5 = $_POST['x5'];

$pozar = $_POST['pozar'];
$zalanie = $_POST['zalanie'];
$wlamanie = $_POST['wlamanie'];
$czujnik_co = $_POST['czujnik_co'];
$wentylacja = $_POST['wentylacja'];

if ($x1 != "" && $x2 != "" && $x3 != "" && $x4 != "" && $x5 != "") {
    Database::getConnection()->query("INSERT INTO pomiary (x1, x2, x3, x4, x5, pozar, zalanie, wlamanie, czujnik_co, wentylacja) VALUES ($x1, $x2, $x3, $x4, $x5, '$pozar', '$zalanie', '$wlamanie', '$czujnik_co', '$wentylacja')");
    Database::getConnection()->close();
}
header('Location: formularz.php');