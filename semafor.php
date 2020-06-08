<?php
session_start();
if($_SESSION['admin']==true){
    header('Location: administrator.php', true, 307); //cod de raspuns 
} else {
    if($_SESSION['loggedin']==true){
    header('Location: myAccount.php', true, 307); //cod de raspuns 
    }
}

?>