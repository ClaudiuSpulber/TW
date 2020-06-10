<?php $link = mysqli_connect('localhost', 'root', '');
    if (!$link) {
        die('Not connected : ' . mysqli_error());
    }


    $db = mysqli_select_db($link, 'forg');
    if (!$db) {
        die ('Cannot connect to database ' . mysqli_error());}
        
    $userId=$_GET['user'];
	$name=$_GET['name'];

	
	$sql = "INSERT into groups (name) VALUES ('$name');";
    $query = mysqli_query($link,$sql);
	
	$sql = "SELECT MAX(id) from groups group by id;"; 
    $query = mysqli_query($link,$sql);
	$row = mysqli_num_rows($query);
	echo $row;
	
	$sql = "UPDATE users set groups = '".$row."' where id = '".$userId."';"; 
    $query = mysqli_query($link,$sql);

 ?>