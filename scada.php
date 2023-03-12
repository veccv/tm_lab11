<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .container {
            display: flex;
            position: relative;
            width: 600px;
            height: 600px;
        }

        .yellow-box {
            position: absolute;
            background-color: yellow;
            color: black;
            display: inline-block;
            padding: 5px;
            font-weight: bold;
            font-size: 16px;
        }

        .indicator {
            position: absolute;
            display: inline-block;
            padding: 5px;
            font-weight: bold;
            font-size: 16px;
            width: 60px;
        }

        img {
            float: left;
        }

        .overlay {
            position: absolute;
        }

    </style>
    <meta http-equiv="refresh" content="5" />
</head>
<body>
<div class="container">
    <img src="https://premierpark.pl/wp-content/uploads/2019/03/MD-B1-rzut-2-300-PPI.jpg" alt="Snow" style="width:100%;">
    <img src="kociol.png">
    <div id="x1" class="yellow-box" style="left: 800px; top: 50px;">x1</div>
    <div id="x2" class="yellow-box" style="left: 800px; top: 500px;">x2</div>
    <div id="x3" class="yellow-box" style="left: 180px; top: 270px;">x3</div>
    <div id="x4" class="yellow-box" style="left: 210px; top: 200px;">x4</div>
    <div id="x5" class="yellow-box" style="left: 440px; top: 200px;">x5</div>

    <img id="wentylacja" src="images/normal/fan.png" class="indicator" style="left: 410px; top: 260px;">
    <img id="pozar" src="images/normal/fire.png" class="indicator" style="left: 100px; top: 300px;">
    <img id="zalanie" src="images/normal/water.png" class="indicator" style="left: 250px; top: 290px;">
    <img id="wlamanie" src="images/normal/wlamanie.png" class="indicator" style="left: 500px; top: 400px;">
    <img id="czujnik_co" src="images/normal/coo.png" class="indicator" style="left: 320px; top: 100px;">

    <div id="room_1" class="overlay" style="width: 200px; height: 140px; left: 50px; top: 260px"></div>
    <div id="room_2" class="overlay" style="width: 200px; height: 100px; left: 50px; top: 150px"></div>
    <div id="room_3" class="overlay" style="width: 150px; height: 300px; left: 350px; top: 150px"></div>
    <div id="chart_div" style="width: 400px; height: 120px;"></div>
</div>

<?php
include 'Database.php';
$last_pomiar = mysqli_fetch_array(Database::getConnection()->query("SELECT * FROM pomiary ORDER BY id DESC LIMIT 1"));
setcookie("x1", $last_pomiar[1]);
setcookie("x2", $last_pomiar[2]);
setcookie("x3", $last_pomiar[3]);
setcookie("x4", $last_pomiar[4]);
setcookie("x5", $last_pomiar[5]);
setcookie("pozar", $last_pomiar[7]);
setcookie("zalanie", $last_pomiar[8]);
setcookie("wlamanie", $last_pomiar[9]);
setcookie("czujnik_co", $last_pomiar[10]);
setcookie("wentylacja", $last_pomiar[11]);
?>

<script>
    const getColor = (temperature) => {
      if (temperature < 10) {
          return "blue";
      } else if (temperature >= 10 && temperature < 20) {
          return "green";
      } else if (temperature >= 20 && temperature < 25) {
          return "";
      } else if (temperature >= 25 && temperature < 30) {
          return "orange";
      } else {
          return "red";
      }
    }

    const cookies = document.cookie.split(";");
    let room_1 = 0;
    let room_2 = 0;
    let room_3 = 0;

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.startsWith("x1=")) {
            document.getElementById("x1").innerHTML = cookie.substring("x1=".length);
        }
        if (cookie.startsWith("x2=")) {
            document.getElementById("x2").innerHTML = cookie.substring("x2=".length);
        }
        if (cookie.startsWith("x3=")) {
            document.getElementById("x3").innerHTML = cookie.substring("x3=".length);
            document.getElementById("room_1").style.backgroundColor = getColor(parseInt(cookie.substring("x3=".length)));
            document.getElementById("room_1").style.opacity = "0.3";
            room_1 = parseInt(cookie.substring("x3=".length));
        }
        if (cookie.startsWith("x4=")) {
            document.getElementById("x4").innerHTML = cookie.substring("x4=".length);
            document.getElementById("room_2").style.backgroundColor = getColor(parseInt(cookie.substring("x4=".length)));
            document.getElementById("room_2").style.opacity = "0.3";
            room_2 = parseInt(cookie.substring("x4=".length));

        }
        if (cookie.startsWith("x5=")) {
            document.getElementById("x5").innerHTML = cookie.substring("x5=".length);
            document.getElementById("room_3").style.backgroundColor = getColor(parseInt(cookie.substring("x5=".length)));
            document.getElementById("room_3").style.opacity = "0.3";
            room_3 = parseInt(cookie.substring("x5=".length));

        }
        if (cookie.startsWith("wentylacja=")) {
            if (cookie.substring("wentylacja=".length) === "0") {
                document.getElementById("wentylacja").src = "images/normal/fan.png";

            } else if(cookie.substring("wentylacja=".length) === "1") {
                document.getElementById("wentylacja").src = "images/gif/fun1.gif";

            } else {
                document.getElementById("wentylacja").src = "images/gif/fun2.gif";
            }
        }
        if (cookie.startsWith("pozar=")) {
            if (cookie.substring("pozar=".length) === "0") {
                document.getElementById("pozar").src = "images/normal/fire.png";

            } else {
                document.getElementById("pozar").src = "images/gif/fire.gif";
            }
        }
        if (cookie.startsWith("zalanie=")) {
            if (cookie.substring("zalanie=".length) === "0") {
                document.getElementById("zalanie").src = "images/normal/water.png";

            } else {
                document.getElementById("zalanie").src = "images/gif/zalanie.gif";
            }
        }
        if (cookie.startsWith("wlamanie=")) {
            if (cookie.substring("wlamanie=".length) === "0") {
                document.getElementById("wlamanie").src = "images/normal/wlamanie.png";

            } else {
                document.getElementById("wlamanie").src = "images/gif/Cat_burglar.gif";
            }
        }
        if (cookie.startsWith("czujnik_co=")) {
            if (cookie.substring("czujnik_co=".length) === "0") {
                document.getElementById("czujnik_co").src = "images/normal/coo.png";

            } else {
                document.getElementById("czujnik_co").src = "images/gif/co alarm.gif";
            }
        }
    }

    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Pokój duży', room_1],
            ['Pokój mały', room_2],
            ['Salon', room_3]
        ]);

        var options = {
            width: 400, height: 120,
            redFrom: 90, redTo: 100,
            yellowFrom:75, yellowTo: 90,
            minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
</body>
</html>
