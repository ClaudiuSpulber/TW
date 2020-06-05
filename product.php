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
                $allergies = $row['allergies'];
            }
        }

        $allergies_list = array();

        $x = explode(',', $allergies);
        for ($a = 0; $a < sizeof($x); $a++) {
            $allergies_list[$a] = $x[$a];
        }

        $id = (int) $_GET['id'];
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
                /*var_dump($product_name3);*/
                $description = $row["description"];
                $price = $row["price"];
                $category = $row["category"];
                $ingredients = $row["ingredients"];
                $allergens = $row["allergens"];
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

        for ($i = 0; $i < sizeof($allergies_list); $i++) {
            if (strpos($allergens, $allergies_list[$i]) !== false) {
                $atentie = 1;
            }
        }


        $iduser = $_SESSION['id'];

        /* Add to favorites button */
        if (isset($_POST['favorites'])) {
            $var = "INSERT INTO favorites (id_user,id_product, product_name) VALUES ('$iduser','$id','$product_name')";
            $var1 = "SELECT * FROM favorites WHERE id_user='$iduser' and id_product = '$id'";
            $ceva = mysqli_query($db, $var1);
            $count = mysqli_num_rows($ceva);
            if (!$count)
                $sql1 = mysqli_query($db, $var);
        }

        /* Add to lists button */
        if (isset($_POST['all'])) {
            $var = "INSERT INTO lists (id_client, id_product, product_name, ingredients) VALUES ('$iduser','$id','$product_name','$ingredients')";
            $var1 = "SELECT * FROM lists WHERE id_client='$iduser' and id_product = '$id'";
            $ceva = mysqli_query($db, $var1);
            $count = mysqli_num_rows($ceva);
            if (!$count)
                $sql1 = mysqli_query($db, $var);
        }
    } else {
        echo "Data to render this page is missing.";
        exit();
    }
    mysqli_close($db);

    ?>