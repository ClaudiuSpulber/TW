<?php
// Diana//
include "server.php";
if (isset($_POST['products_lists'])) {

    $var = "SELECT count(product_name), product_name  FROM lists group by id_product order by count(product_name) LIMIT 10";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('top10lists.csv', 'w');
        $product_name = array();
        $name = array();
        $count = array();
        while ($row = mysqli_fetch_array($sql)) {
            $name[] = $row['product_name'];
            $count[] = $row['count(product_name)'];
        }
        $product_name = array_map(null, $name, $count);
        //var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

if (isset($_POST['products_favorites'])) {

    $var = "SELECT count(product_name), product_name  FROM favorites group by id_product order by count(product_name) LIMIT 10";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('top10fav.csv', 'w');
        $product_name = array();
        $name = array();
        $count = array();
        while ($row = mysqli_fetch_array($sql)) {
            $name[] = $row['product_name'];
            $count[] = $row['count(product_name)'];
        }
        $product_name = array_map(null, $name, $count);
        //var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

if (isset($_POST['export_products'])) {

    $var = "SELECT id, product_name, description, price, category, ingredients, allergens, perishable, locations, season, product_date  FROM products order by id";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('export_products.csv', 'w');
        $product_name = array();
        $id = array();
        $description = array();
        $price = array();
        $category = array();
        $ingredients = array();
        $allergens = array();
        $perishable = array();
        $locations = array();
        $season = array();
        $product_date = array();
        while ($row = mysqli_fetch_array($sql)) {
            $id[] = $row['id'];
            $product_name[] = $row['product_name'];
            $description[] = $row['description'];
            $price[] = $row['price'];
            $category[] = $row['category'];
            $ingredients[] = $row['ingredients'];
            $allergens[] = $row['allergens'];
            $perishable[] = $row['perishable'];
            $locations[] = $row['locations'];
            $season[] = $row['season'];
            $product_date[] = $row['product_date'];
        }
        $product_name = array_map(null, $id, $product_name, $description, $price, $category, $ingredients, $allergens, $perishable, $locations, $season, $product_date);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

if (isset($_POST['export_users'])) {

    $var = "SELECT *  FROM users order by id";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('export_users.csv', 'w');
        $full_name = array();
        $id = array();
        $email = array();
        $username = array();
        $password = array();
        $phone_number = array();
        $allergies = array();
        $group = array();
        while ($row = mysqli_fetch_array($sql)) {
            $id[] = $row['id'];
            $full_name[] = $row['full_name'];
            $email[] = $row['email'];
            $username[] = $row['username'];
            $password[] = $row['password'];
            $phone_number[] = $row['phone_number'];
            $allergies[] = $row['allergies'];
            $group[] = $row['group'];
        }
        $full_name = array_map(null, $id, $full_name, $email, $username, $password, $phone_number, $allergies, $group);
        foreach ($full_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}


if (isset($_POST['csv_month'])) {
    $nr_month = $_REQUEST['nr_month'];
    $var = "SELECT product_name, product_date FROM products where extract(month from product_date) = $nr_month ";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('monthly_products.csv', 'w');
        $product_name = array();
        $product_date = array();

        while ($row = mysqli_fetch_array($sql)) {
            $product_name[] = $row['product_name'];
            $product_date[] = $row['product_date'];
        }
        $product_name = array_map(null, $product_name, $product_date);
        //var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

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

?>