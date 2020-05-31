 <?php
if (isset($_GET['id'])) {
    include "server.php";
    /*$id = preg_replace('#[^0-9]#i', '', $_GET['id']);*/
    $id = (int) $_GET['id'];
    $var = "SELECT * FROM products WHERE id='$id' LIMIT 1";
    $sql = mysqli_query($db, $var);//cauta in bd daca exista id-ul respectiv
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
    $iduser = $_SESSION['id'];

    if (isset($_POST['favorites'])) {
        $var = "INSERT INTO favorites (id_user,id_product, product_name) VALUES ('$iduser','$id','$product_name')";
        $var1 = "SELECT * FROM favorites WHERE id_user='$iduser' and id_product = '$id'";
        $ceva = mysqli_query($db, $var1);
        $count = mysqli_num_rows($ceva);
        if (!$count)
            $sql1 = mysqli_query($db, $var);
    }

    if (isset($_POST['all'])) {
        $var = "INSERT INTO lists (id_client, id_product, product_name) VALUES ('$iduser','$id','$product_name')";
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Subcategory</title>
    <link rel="stylesheet" href="productPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #381D2A">
    <header style="background-color:#381D2A">
        <img class="logo" src="logo.jpg" style="width:10%;">
        <div class="search">
            <form class="search" action="cautare.php">
                <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
                <input type="text" class="searchbar" placeholder="Căutare..">
            </form>
        </div>
        <a href="myAccount.html" class="blabla">
            <img class="account" src="persoana.png">
        </a>
        <a href="Group.html" class="blabla">
            <img class="grup" src="grup.png">
        </a>
        <a href="Lists.html" class="blabla">
            <img class="list" src="list.png">
        </a>

    </header>
    <div class="content2">
        <div class="menu">
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Pui.png">
                </div>
                <div class="submenu-claus-container">
                    <a href="carne.asp" class="menu-text">Preparate din carne</a>

                    <div class="submenu-claus">
                        <div>
                            <a href="pui.asp" class="submenu-text">Pui</a>
                        </div>
                        <div>
                            <a href="vita.asp" class="submenu-text">Vita</a>
                        </div>
                        <div>
                            <a href="rata.asp" class="submenu-text">Rata</a>
                        </div>
                        <div>
                            <a href="curcan.asp" class="submenu-text">Curcan</a>
                        </div>
                        <div>
                            <a href="porc.asp" class="submenu-text">Porc</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Vegetarian.png">
                </div>
                <a href="vegetarian.asp" class="menu-text">Preparate vegetariene</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png">
                </div>
                <a href="peste.asp" class="menu-text">Peste si Fructe de mare</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png">
                </div>
                <a href="supe.asp" class="menu-text">Supe/Ciorbe</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png">
                </div>
                <a href="Garnituri.asp" class="menu-text">Garnituri</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png">
                </div>
                <a href="salate.asp" class="menu-text">Salate</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png">
                </div>
                <a href="desert.asp" class="menu-text">Desert</a>
            </div>
        </div>
        <div class="container">
        <h1 class="product-title">
        <?php echo $product_name; ?>
      </h1>

      <div class="middle-section-container">


        <img alt="Tiramisu" class="image" src="Images/<?php echo $product_name3; ?>.jpg">



        <div class="section-description">

          <div class="description">
            <div class="title">Description</div>
            <div class="content">
              <?php echo $description; ?>
            </div>
          </div>

          <div class="price">
            <div class="title">Price</div>
            <div class="content"><?php echo $price; ?> RON</div>
          </div>

          <div class="actions">
            <form method="post" action="">
              <button type="submit" name="all">Add all ingredients to list</button>
              <button type="submit" name="favorites">Add to favorite</button>
            </form>
          </div>

        </div>

        <div class="c"></div>

      </div>

      <div class="section-3">
        <ul>
          <li>
            <div class="menu-item">Category</div>
            <div class="menu-item-details"><?php echo $category; ?></div>
          </li>
          <li>
            <div class="menu-item">Ingredients</div>
            <div class="menu-item-details"><?php echo $ingredients ?></div>
          </li>
          <li>
            <div class="menu-item">Allergens</div>
            <div class="menu-item-details"><?php echo $allergens; ?></div>
          </li>
          <li>
            <div class="menu-item">Perishable</div>
            <div class="menu-item-details"><?php echo $perishable; ?></div>
          </li>
          <li>
            <div class="menu-item">Restaurant where you can find it</div>
            <div class="menu-item-details"><?php echo $locations; ?></div>
          </li>

          <li>
            <div class="menu-item">Season</div>
            <div class="menu-item-details"><?php echo $season; ?></div>
          </li>
        </ul>
      </div>
        </div>
    </div>
</body>

</html>