<?php
session_start();
if($_SESSION['loggedin']){
    if(!$_SESSION['admin']){
    header('Location: lists.php', true, 307); //cod de raspuns 
} else{
    header('Location: principal.php', true, 307); //cod de raspuns 
}
}
?>