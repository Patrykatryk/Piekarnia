<?php
    session_start();
    if (empty($_POST['nazwa'])==false) //nie wykona sie jesli pole nazwa jest puste
    {
        echo "<h3>Nazwa Twojego zamówienia:</h3>";
        $nazwa=$_POST['nazwa'];
        echo $nazwa;
        $suma=$_SESSION['suma'];
        $dataczas = new DateTime();
        $dataczas = $dataczas -> format('Y-m-d  H:i:s');
        require_once "connect.php";
        try
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno()); //rzuć nowym wyjątkiem, po to abby sekcja catch zlapala go i wyswietliła
            }
            else
            {
            $polaczenie->query("INSERT INTO zamowienia VALUES ('$nazwa', '$suma','$dataczas')");
            //if (!$rezultat) throw new Exception($polaczenie->error);
            }
            $polaczenie->close();
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;"> Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie! </span>';
            echo '<br/> Informacja developerska: '.$e;
        }
    }
    else 
    {
        $_SESSION['brak_nazwy']='nie podano nazwy';
        header('Location: order.php');
        exit();

    }
   
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta cahrset="utf-8" ?>
    <title>Potwierdzenie</title>
</head>
    </br></br>
    <h3>Potwierdzona kwota:</h3>
<body>

<?php
    
    echo $_SESSION['suma'].' zł'; //odebranie zmiennej z użyciem sesji
    echo '</br></br>';
    
    echo '</br/><a href="index.php">Złóż kolejne zamówienie </a>'

        
?>

</body>
</html>