<?php
require_once 'phplot.php';
include 'Database.php';
$plot = new PHPlot();
$data = array();

$wiersze = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM pomiary"));
$x_line = 0;
foreach ($wiersze as $wiersz) {
    $x1 = $wiersz[1];
    $x2 = $wiersz[2];
    $x3 = $wiersz[3];
    $x4 = $wiersz[4];
    $x5 = $wiersz[5];

    $data[] = array('', $x_line, $x1, $x2, $x3, $x4, $x5);
    $x_line++;
}
$plot->SetImageBorderType('plain');
$plot->SetPlotType('lines');
$plot->SetDataType('data-data');

$plot -> SetDataValues($data);
$plot->SetDataColors(array('#FF0000', '#00FF00', '#0000FF', '#FF00FF', '#00FFFF'));

$plot -> SetTitle('Wykres temperatur X1, X2, X3, X4, X5');
$plot -> DrawGraph();


