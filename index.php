<head>
    <title>
        Dalmer
    </title>
</head>
<body>
<?php
session_start();
$_SESSION['loggedin'] = false;
echo $_SESSION['loggedin'];
?>
<b>Zadanie 11. SCADA (Supervisory Control and Data Acquisition), IoT (Internet of Things) </b>
<br>
<a href="wykres.php">Przykładowy wykres</a>
<br>
<a href="formularz.php">Formularz</a>
<br>
<a href="tabela.php">Tabela</a>
<br>
<a href="wykres3.php">Wykres na bazie tabeli</a>
<br>
<a href="scada.php">SCADA</a>
<br>
<br>
