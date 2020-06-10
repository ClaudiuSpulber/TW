<?php $link = mysqli_connect('localhost', 'root', '');
    if (!$link) {
        die('Not connected : ' . mysqli_error());
    }


    $db = mysqli_select_db($link, 'forg');
    if (!$db) {
        die ('Cannot connect to database ' . mysqli_error());}
        
    $userId=$_GET['user'];
    $productId=$_GET['product'];
   $sql = "SELECT * from lists where id_client = '".$userId."' and id_product = '".$productId."'";
    $query = mysqli_query($link,$sql);
    $count = mysqli_num_rows($query);
    if ($count<1){
        $sql = "SELECT product_name, ingredients from products where id = '".$productId."';";
        $query = mysqli_query($link,$sql);
        $name = mysqli_fetch_row($query);

        $sql = "INSERT into lists (id_client, id_product, product_name, ingredients) VALUES ('".$userId."', '".$productId."', '".$name[0]."', '".$name[1]."');";
        $query = mysqli_query($link,$sql);
    }

        ?>