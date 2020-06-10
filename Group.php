<?php
session_start();

$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysqli_error());
}

$db = mysqli_select_db($link, 'forg');
if (!$db) {
    die ('Cannot connect to database ' . mysqli_error());}
  
    
    if($_SESSION['admin']==true){
        header('Location: addgroup.php', true, 307);}
        else
        if($_SESSION['loggedin']==true){
 $userId = $_SESSION['id'];
 $sql = "Select groups from users where id = '".$userId."';";
 $query = mysqli_query($link,$sql);
 $groupId = mysqli_fetch_row($query);

if($groupId[0] != 0){
    header('Location: createdGroup.php', true, 307);
} else {
   
    header('Location: createGroup.php', true, 307);  
}
        }
        
?>