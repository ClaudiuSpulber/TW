<?php
// Diana//
include "server.php";
if($_SESSION['admin']){
$var = "SELECT * from messages";
$sql = mysqli_query($db, $var);
$count = mysqli_num_rows($sql);
$ok = 1;
$id_user = array();
$username = array();
$email = array();
$date = array();
$message = array();
if ($count) {
    while ($row = mysqli_fetch_array($sql)) {
        $id_user[] = $row['id_user'];
        $username[] = $row['username'];
        $email[] = $row['email'];
        $date[] = $row['date'];
        $message[] = $row['message'];
    }
} else {
    $ok = 0;
}
}
else{
    header('Location: html/principal.html', true, 307);
}

?>