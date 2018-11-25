<?php
/**
 * GuestBook
 * Autor: Mohamed Abdelrahman
 * Start der Session
 */
session_start();
/**
 * Cookie schreiben
 * Timestamp als Wert
 * Gültigkeitsdauer 120 Tage
 */
setcookie("VisitingTimes", time(), time() + (60 * 60 * 24 * 120));

// require lib codebird
@require_once "lib\codebird\codebird.php";
@require_once 'lib/php/MessageController.php';



$MessageController = new \MessageController();
$MessageController->getAll();


if (!empty(isset($_POST["submit"])) ) {
    
    $MessageController->addMessage();
    
    
} 
/*else {
    echo 'Please all field are requiered!!';
}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GuestBook</title>
    <meta name="author" content="Mohamed Abdelrahman">
    <meta name="description" content="Guest Book">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lib/css/stil.css">
</head>
<body style="background: maroon;">

<h1>Gästebuch</h1>


<form action="" method="POST">

    <h3>Sie können Ihre Nachricht hier schreiben</h3>
    <label><h3>Name : </h3></label>
    <input type="text" name="name" placeholder="Ihre Name Bitte!"><br><br>
    <label><h3>Nachricht : </h3></label>
    <textarea id="message" name="message" placeholder="Ihre Nachricht Bitte!" cols="30" rows="10"></textarea><br><br>
    <input type="submit" name="submit" value="Bestätigen"/>

</form>

</body>
</html>