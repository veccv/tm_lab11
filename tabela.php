<?php
include 'Database.php';
print "<table cellpadding=5 border=1>";
print "<tr><td>id</td><td>x1</td><td>x2</td><td>x3</td><td>x4</td><td>x5</td><td>Data/Godzina</td></tr>\n";

$wiersze = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM pomiary"));
foreach ($wiersze as $wiersz) {
    $id = $wiersz[0];
    $x1 = $wiersz[1];
    $x2 = $wiersz[2];
    $x3 = $wiersz[3];
    $x4 = $wiersz[4];
    $x5 = $wiersz[5];
    $datetime = $wiersz[6];
    print "<tr><td>$id</td><td>$x1</td><td>$x2</td><td>$x3</td><td>$x4</td><td>$x5</td><td>$datetime</td></tr>\n";
}
print "</table>";
Database::getConnection()->close();