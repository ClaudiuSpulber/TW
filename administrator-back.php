<?php
// Diana//
include "server.php";
if($_SESSION['admin']){

    if (isset($_POST['csv_month'])) {
    $nr_month = intval($_REQUEST['nr_month']);

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
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

if(isset($_POST['stergeremsg'])){
    $idmesaj = $_REQUEST['mesaj'];
    $sql = $dbh->prepare("SELECT * FROM messages WHERE id= ?");
    $sql2 = $dbh->prepare("DELETE FROM messages WHERE id= ?");
    $sql->bindParam(1, $idmesaj);
    $sql2->bindParam(1, $idmesaj);
    if ($sql->execute()) {
        try {
            if ($sql2->execute()) {
                // Delete was a SUCCESS
            } else {
                // Delete was a FAILURE
            }
        } catch (PDOException $e) {
            print "Error deleting product!: " . $e->getMessage() . "<br/>";
            var_dump($e->getMessage());
            die();
        }
    }

}

$var = "SELECT * from messages";
$sql = mysqli_query($db, $var);
$count = mysqli_num_rows($sql);
$ok = 1;
$idmesaj= array();
$id_user = array();
$username = array();
$email = array();
$date = array();
$message = array();
$subject = array();
if ($count) {
    while ($row = mysqli_fetch_array($sql)) {
        $idmesaj[]=$row['id'];
        $id_user[] = $row['id_user'];
        $username[] = $row['username'];
        $email[] = $row['email'];
        $date[] = $row['date'];
        $message[] = $row['message'];
        $subject[] = $row['subject'];    
    }
    
} else {
    $ok = 0;
}


}
else{
    header('Location: principal.php', true, 307);
}
