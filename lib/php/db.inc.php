<?php

$servername = "localhost"; //hostname
$username = "root";        //username
$password = "";            //Password
$dbname = "Gastbuch";       //databank Nmae

//connection with PDO more secure
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
     echo $e->getMessage();
    }

?>

