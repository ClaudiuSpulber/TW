<?php
session_start();
if($_SESSION['loggedin']){
    if(!$_SESSION['admin']){
    header('Location: principal.php', true, 307); //cod de raspuns 
} else{
    header('Location: contact.php', true, 307); //cod de raspuns 
}
}
?>