<?php
/*session_start(); */
/*if (isset($_GET['id'])) { */
// try {
//     $dbh = new PDO('mysql:host=localhost;dbname=forg', 'root', '');
//     // $dbh = null;
// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }

include "server.php";
$idclient = $_SESSION['id'];
$user_id = preg_replace('#[^0-9]#i', '', $idclient);
$productsList = $dbh->prepare("SELECT * FROM products WHERE id = ?");
$userLists = $dbh->prepare("SELECT * FROM lists WHERE id_client = ?");
$ok = 1;

if (isset($_POST['delete'])) {

    $id_produs = $_REQUEST['idprod'];
    $userList = $dbh->prepare("SELECT * FROM lists WHERE id_client= ? and id_product = ?");
    $deleteList = $dbh->prepare("DELETE FROM lists WHERE id_client= ? and id_product = ?");
    $userList->bindParam(1, $user_id);
    $userList->bindParam(2, $id_produs);
    $deleteList->bindParam(1, $user_id);
    $deleteList->bindParam(2, $id_produs);
    if ($userList->execute()) {
        try {
            if ($deleteList->execute()) {
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

if (isset($_POST['stergere'])) {
    $ingredient = $_REQUEST['ingredient'];
    $produs = $_REQUEST['produs'];
    $var = $dbh->prepare("SELECT ingredients from lists where id_client=? and id_product= ?");
    $var->bindParam(1, $user_id);
    $var->bindParam(2, $produs);
    if ($var->execute()) {
        try {
            $row = $var->fetch();
            $ingrediente = $row['ingredients'];
            $spatiu = " ";
            $ingrediente = str_replace(",", "", $ingrediente);
            $ingrediente = $ingrediente . $spatiu;
            $ingredient = $ingredient . $spatiu;
            $ingredientsnou = str_replace($ingredient, "", $ingrediente);
            $ingredientsnou = substr($ingredientsnou, 0, -1);
            $ingredientsnou = str_replace(" ", ", ", $ingredientsnou);

            $var = "UPDATE lists set ingredients='$ingredientsnou' where id_client='$user_id' and id_product='$produs'";
            $sql = mysqli_query($db, $var);
            $var1 = "SELECT ingredients from lists where id_client='$user_id' and id_product='$produs'";
            $sql1 = mysqli_query($db, $var1);
            $row = mysqli_fetch_array($sql1);
            $ingrediente = $row['ingredients'];
            if ($ingrediente == "") {
                $var = "DELETE from lists where id_client='$user_id' and id_product='$produs'";
                $sql = mysqli_query($db, $var);
            }
        } catch (PDOException $e) {
            print "Error in deleting this ingredient!" . $e->getMessage() . "<br/>";
            var_dump($e->getMessage());
            die();
        }
    }
}

if ($userLists->execute(array($user_id))) {
    if (!$userLists->rowCount()) {
        $ok = 0;
    } else {
        //ia detaliile listei din bd
        $product_name = array();
        $ingredients1 = array();
        $ingredients = array();
        $id_product2 = array();
        $product_name2 = array();
        while ($row = $userLists->fetch()) {
            $id_list = $row["id_list"];
            $id_client = $row["id_client"];
            $id_product = $row["id_product"];
            $id_product2[] = $row["id_product"];
            $ingredients1[] = $row["ingredients"];
            if ($productsList->execute(array($id_product))) {
                while ($row2 = $productsList->fetch()) {
                    $product_name[] = $row2["product_name"];
                    $product_name2[] = strtolower(str_replace(" ", "", $row2["product_name"]));
                }
            }
        }
        $lista_ingrediente = array();
        if ($ingredients1[0] !== "") {
            for ($k = 0; $k < sizeof($ingredients1); $k = $k + 1) {
                $x = explode(',', $ingredients1[$k]);
                for ($a = 0; $a < sizeof($x); $a++) {
                    $lista_ingrediente[$k][$a] = $x[$a];
                }
            }
        }
    }
}


?>