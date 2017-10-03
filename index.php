<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">

    <style>
    body{
        padding: 1.5em;
    }
    </style>
</head>
<body>

<?php
//Dummy Variable, sollte aus Datenbank kommen
$correctPwd = "1234";
$passwordMessage = "";
$formMessage = "";

//print_r($_POST);

    if(count($_POST) > 0) {
        /*
            Aus %_POST wird der Wert mit dem Index "password" ausgelesen.
            Der Index ergibt sich aus dem :name: Attritbut der gesendeten Formularfelder
        
        */

        /* :Formulare prüfen:

            1. wurden daten gesendet
            2. gibt es dir erforderlichen felder
            3. prüfen der daten
                3.1 required? (Pflichtfeld, wenn nicht ausgefüllt -> Error)
                3.2 Datentyp stimmt überein?
                3.3 weitere Prüfungen.. /Min, Max, Length, Datumsfelder

        
        */

        if (array_key_exists ("password", $_POST)) {
            $pwd = $_POST["password"];
        
            //Prüfen ob Korrektes Passwort eingegeben wurde
            if( $pwd == $correctPwd ){
                $formMessage = "PWD: OK";
            }
            elseif( $pwd == "" ) {
                $passwordMessage = "PWD Field EMPTY";
            }
            else {
                $passwordMessage = "PWD: WRONG!";
            }
        }
        else {
            $formMessage = "Formular not sent";
        }
    }


?>

<h1>LOGIN</h1>
<hr>

<form class="pure-form pure-form-stacked" method="post">
    <label for="passWord">Password:</label>
    <input type="password" name="password" id="password">
    <?php echo $passwordMessage; ?>
    <input type="submit" value="submit">
    <?php echo $formMessage; ?>
</form>

</body>

<hr> Lukas Blaha
</html>