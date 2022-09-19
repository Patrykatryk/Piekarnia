<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta cahrset="utf-8" ?>
    <title>Podsumowanie zamówienia</title>
    <style>
		.error  /*  klasa error */
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>

<?php
    session_start();
    
    
    if(!isset($_SESSION['paczkow']))
    {
        $paczkow = $_POST['paczkow'];
        $_SESSION['paczkow']=$paczkow;
    }
    if (!isset($_SESSION['suma']))
    {
        if (empty($paczkow)==true) //jesli zmienna paczkow jest pusta program cofnie do index.php poniewaz musi byc jakas wartość
        {
            header('Location: index.php');
            exit();
        }
    }
    if(!isset($_SESSION['grzebieni']))
    {
        $grzebieni = $_POST['grzebieni'];
        $_SESSION['grzebieni']=$grzebieni;
    }
    if (!isset($_SESSION['suma']))
    {
        if (empty($grzebieni)==true)
        {
            header('Location: index.php');
            exit();
        }
    }
    $grzebieni=$_SESSION['grzebieni'];
    $paczkow=$_SESSION['paczkow'];
    $suma=0.99*$paczkow + 1.29*$grzebieni;
    $_SESSION['suma']=$suma; //stowrznie seseji zmiennej do przesłania
    
echo<<<END

    <h2>Podsumowanie zamówienia</h2>
    <table border="1" cellpadding="10" cellspacing="1">
    <tr>
        <td>Pączek (0.99PLN/szt)</td> <td>$paczkow</td>
    </tr>
    <tr>
        <td>Grzebień (1.29PLN/szt)</td> <td>$grzebieni</td>
    </tr>
    <tr>
        <td>SUMA</td> <td>$suma</td>
    </tr>
    </table>
    </br><a href="index.php">Powrót do strony głównej</a>

END;
?>
<h4>Potwierdź zamówienie (nazwa zamówienia):</h4>
    <form action="potwierdzenie.php" method="post">  <!--action to plik do ktorego wyslemyu formularz, metodą post czyli nie widoczny "w opakowaniu" -->
        </br>
        <input type="text" name="nazwa"/> </br>
        <?php
        if (isset($_SESSION['brak_nazwy']))
        {
            echo '<div class="error">'.$_SESSION['brak_nazwy'].'</div>';
            unset($_SESSION['brak_nazwy']);
        } 
        ?>
        <br/> <br/>
        <input type="submit" value="Potwierdzam" />

    </form>

</body>
</html>