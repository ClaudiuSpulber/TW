<<<<<<< HEAD
<?php

include('server.php');

$id= $_SESSION['add'];
$iduser = $_SESSION['id'];

$var = "SELECT * FROM products WHERE id='$id' LIMIT 1";
$sql = mysqli_query($db, $var); //cauta in bd daca exista id-ul respectiv
$productCount = mysqli_num_rows($sql); // numara cate produse s-au gasit cu id-ul din url
if ($productCount > 0) {
    //ia detaliile produsului din bd
    while ($row = mysqli_fetch_array($sql)) {
        $product_name = $row["product_name"];
        $ingredients = $row["ingredients"];
    }
}

$q = intval($_GET['q']);
        if($q==1){
            $var= "INSERT INTO lists (id_client, id_product, product_name, ingredients) VALUES ('$iduser','$id','$product_name','$ingredients')";
            $var1 = "SELECT * FROM lists WHERE id_client='$iduser' and id_product = '$id'";
            $ceva = mysqli_query($db, $var1);
            $count = mysqli_num_rows($ceva);
           
            if (!$count)
                {    
                    $sql1 = mysqli_query($db, $var);
                    echo "This product was added succesfully to your list.";
                } else if($count>0) {
                    echo "The product is already on your list.";
                }
             
        } else if ($q==2){
            
            $var = "INSERT INTO favorites (id_user,id_product, product_name) VALUES ('$iduser','$id','$product_name')";
            $var1 = "SELECT * FROM favorites WHERE id_user='$iduser' and id_product = '$id'";
            $ceva = mysqli_query($db, $var1);
            $count = mysqli_num_rows($ceva);
            if (!$count)
            {    
                $sql1 = mysqli_query($db, $var);
                echo "This product was added succesfully to your list.";
            } else if($count>0) {
                echo "The product is already on your list.";
            }
              
        }
?>
=======
<?php

include('server.php');

$id= $_SESSION['add'];
$iduser = $_SESSION['id'];

$var = "SELECT * FROM products WHERE id='$id' LIMIT 1";
$sql = mysqli_query($db, $var); //cauta in bd daca exista id-ul respectiv
$productCount = mysqli_num_rows($sql); // numara cate produse s-au gasit cu id-ul din url
if ($productCount > 0) {
    //ia detaliile produsului din bd
    while ($row = mysqli_fetch_array($sql)) {
        $product_name = $row["product_name"];
        $ingredients = $row["ingredients"];
    }
}

$q = intval($_GET['q']);
        if($q==1){
            $var= "INSERT INTO lists (id_client, id_product, product_name, ingredients) VALUES ('$iduser','$id','$product_name','$ingredients')";
            $var1 = "SELECT * FROM lists WHERE id_client='$iduser' and id_product = '$id'";
            $ceva = mysqli_query($db, $var1);
            $count = mysqli_num_rows($ceva);
           
            if (!$count)
                {    
                    $sql1 = mysqli_query($db, $var);
                    echo "This product was added succesfully to your list.";
                } else if($count>0) {
                    echo "The product is already on your list.";
                }
             
        } else if ($q==2){
            
            $var = "INSERT INTO favorites (id_user,id_product, product_name) VALUES ('$iduser','$id','$product_name')";
            $var1 = "SELECT * FROM favorites WHERE id_user='$iduser' and id_product = '$id'";
            $ceva = mysqli_query($db, $var1);
            $count = mysqli_num_rows($ceva);
            if (!$count)
            {    
                $sql1 = mysqli_query($db, $var);
                echo "This product was added succesfully to your list.";
            } else if($count>0) {
                echo "The product is already on your list.";
            }
              
        }
?>
>>>>>>> 8dd07b3a47f3663338cbd2d40e0743af0b3296c7
