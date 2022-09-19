<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta cahrset="utf-8" ?>
    <title>Piekarnia</title>
    <script type="text/javascript" src="timer.js"></script> <!--kod javascpirt ze żródła timer.js-->
</head>
<?php
session_start();
unset($_SESSION['suma']);
unset($_SESSION['paczkow']);
unset($_SESSION['grzebieni']);
?>

<body onload="odliczanie();"> <!--wywowałanie funkcji odliczanie powoduje ze strona odswieza sięco 1s-->
    <h1>Zamówienie online</h1>
    <form action="order.php" method="post">  <!--action to plik do ktorego wyslemy formularz, metodą post czyli nie widoczny "w opakowaniu" -->
        Ile pączków (0.99 PLN.szt):
        <input type="text" name="paczkow"/>
            <br/> <br/>
        Ile grzebieni(1.29 PLN.szt):
        <input type="text" name="grzebieni" />
            <br/> <br/>
        <input type="submit" value="Wyslij zamówienie" />
    </form>
    <br/><br/>
    <div id="zegar"></div> <!-- wywołanie z timer.js elemntu do wyswieltneia id=zegar-->
</body>
</html>