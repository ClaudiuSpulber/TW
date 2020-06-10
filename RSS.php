<?php
	 /*$link = mysqli_connect('localhost', 'root', '');
    if (!$link) {
        die('Not connected : ' . mysqli_error());
    }


    $db = mysqli_select_db($link, 'tw');
    if (!$db) {
		die ('Cannot connect to database ' . mysqli_error());}*/
		include("server.php");
		
	$sql = "SELECT id_product FROM favorites group by id, id_product ORDER BY count(id_product) DESC LIMIT 10";
	$query = mysqli_query($db,$sql);
	
	header( "Content-type: text/xml");
	
	 echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>RSS</title> 
 <link>/</link>
 <description>RSS</description>
 <language>en-us</language>";
	
	while($row = mysqli_fetch_row($query)){
		$sql2 = "SELECT product_name FROM products where id = '".$row[0]."';";
		$query2 = mysqli_query($db,$sql2);
		$row2 = mysqli_fetch_row($query2);
		echo"<item>
		<product>".$row2[0]."</product>
		</item>";}
   echo "</channel></rss>";
	

?>