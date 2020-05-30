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
            if ($productsList->execute(array($id_product))) {
                while ($row2 = $productsList->fetch()) {
                    $product_name[] = $row2["product_name"];
                    $product_name2[] = strtolower(str_replace(" ", "", $row2["product_name"]));
                    $ingredients1[] = $row2["ingredients"];
                }
            }
        }
        $lista_ingrediente = array();
        for ($k = 0; $k < sizeof($ingredients1); $k = $k + 1) {
            $x = explode(',', $ingredients1[$k]);
            for ($a = 0; $a < sizeof($x); $a++) {
                $lista_ingrediente[$k][$a] = $x[$a];
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGshop</title>
</head>

<body style="background-color: #381D2A">
    <header style="background-color:#381D2A">
        <img class="logo" src="logo.jpg" alt="logo" style="width:10%;">
        <div class="search">
            <form class="search" action="cautare.php">
                <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
                <input type="text" class="searchbar" placeholder="Căutare..">
            </form>
        </div>
        <a href="myAccount.html" class="blabla">
            <img class="account" alt="account" src="persoana.png">
        </a>
        <a href="Group.html" class="blabla">
            <img class="grup" alt="grup" src="grup.png">
        </a>
        <a href="Lists.html" class="blabla">
            <img class="list" alt="list" src="list.png">
        </a>

    </header>
    <div class="content2">
        <div class="container">
            <div class="little-container">
                <h1 class="product-title">
                    My lists
                </h1>
                <div class="section-2">
                    <ul>
                        <?php
                        if ($ok == 0) {
                        ?>
                            <h1 class="product-title"> Sorry! No lists found </h1>
                            <?php
                        } else {
                            $i = 0;
                            foreach ($product_name as $value) { ?>
                                <li class="card">
                                    <div class="list-image">
                                        <img alt ="photo" class="image-size" src="Images/<?php echo $product_name2[$i];?>.jpg">
                                    </div>
                                    <div class="list-description">
                                        <div class="list-title"><?php echo $value; ?></div>
                                        <div class="ingredients-title">Ingredients</div>
                                        <div class="list-ingredients">
                                            <?php echo $ingredients1[$i]; ?>
                                        </div>
                                        <form method="post" class="buttoncard" action="">
                                            <input type="hidden" name="idprod" value="<?php echo $id_product2[$i];?>">
                                            <button id="cardbutton" type="submit" name="delete">Delete from list</button>
                                        </form>
                                    </div>
                                   
        
                                </li>
                        <?php $i++;
                            };
                        }; ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="menu-element">
                <div>
                    <img class="menu-image" alt="menu-image" src="Pui.png">
                </div>
                <div class="submenu-claus-container">
                    <a href="carne.asp" class="menu-text">Meat products</a>

                    <div class="submenu-claus">
                        <div>
                            <a href="pui.asp" class="submenu-text">Chicken</a>
                        </div>
                        <div>
                            <a href="vita.asp" class="submenu-text">Beef</a>
                        </div>
                        <div>
                            <a href="rata.asp" class="submenu-text">Duck</a>
                        </div>
                        <div>
                            <a href="curcan.asp" class="submenu-text">Turkey</a>
                        </div>
                        <div>
                            <a href="porc.asp" class="submenu-text">Pork</a>
                        </div>
                    </div>
                </div>



            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" alt="menu-image" src="Vegetarian.png">
                </div>
                <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" alt="menu-image" src="Peste.png">
                </div>
                <a href="peste.asp" class="menu-text">Fish and Seafood</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" alt="menu-image" src="Ciorba.png">
                </div>
                <a href="supe.asp" class="menu-text">Soups</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" alt="menu-image" src="garnituri.png">
                </div>
                <a href="Garnituri.asp" class="menu-text">Sides</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" alt="menu-image" src="Salata.png">
                </div>
                <a href="salate.asp" class="menu-text">Salads</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" alt="menu-image" src="Tort.png">
                </div>
                <a href="desert.asp" class="menu-text">Dessert</a>
            </div>
        </div>
    </div>
</body>
<footer style="background-color:#381D2A">
    <div class="contact">
        <a href="contact.html" target="_blank">Contact</a>
    </div>
</footer>
</html>