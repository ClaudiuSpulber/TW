<?php
if (isset($_GET['id'])) {
        include "server.php";   
        $idclient = $_SESSION['id'];
        /* Construieste vectorul cu alergeni ai clientului din sesiune */

        $variable = "SELECT * FROM users where id='$idclient'";
        $sql2 = mysqli_query($db, $variable);
        $count = mysqli_num_rows($sql2);

        if ($count > 0) {
            while ($row = mysqli_fetch_array($sql2)) {
                $allergies = strtolower($row['allergies']);
            }
        }

        $allergies_list = array();
        $x = explode(',', $allergies);
        for ($a = 0; $a < sizeof($x); $a++) {
            $allergies_list[$a] = strtolower($x[$a]);
        }

        $id = (int) $_GET['id'];
        $_SESSION['add']=$id;
        $var = "SELECT * FROM products WHERE id='$id' LIMIT 1";
        $sql = mysqli_query($db, $var); //cauta in bd daca exista id-ul respectiv
        $productCount = mysqli_num_rows($sql); // numara cate produse s-au gasit cu id-ul din url
        if ($productCount > 0) {
            //ia detaliile produsului din bd
            while ($row = mysqli_fetch_array($sql)) {
                $id = $row["id"];
                $product_name = $row["product_name"];
                $product_name2 = str_replace(" ", "", $product_name);
                $product_name3 = strtolower($product_name2);
                $description = $row["description"];
                $price = $row["price"];
                $category = $row["category"];
                $ingredients = $row["ingredients"];
                $allergens = $row["allergens"];
                $allergens2 = strtolower($row["allergens"]);
                $perishable = $row["perishable"];
                $locations = $row["locations"];
                $season = $row["season"];
            }
        } else {
            echo "That product does not exists.";
            exit();
        }

  /* verifica daca din vectorul cu alergeni ai clientului exista un alergen in stringul cu alergeni al produsului */
        $atentie = 0;
      
        if($allergies){       
        for ($i = 0; $i < sizeof($allergies_list); $i++) {
            if (strpos($allergens2, $allergies_list[$i]) !== false) {
                $atentie = 1;
            }
        }
    }
    mysqli_close($db);
}

 ?>
