 <?php
    if (isset($_GET['id'])) {
        include "server.php";
        /* */
        $idclient = $_SESSION['id'];
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

        $atentie = 0;

        for ($i = 0; $i < sizeof($allergies_list); $i++) {
            if (strpos($allergens, $allergies_list[$i]) !== false) {
                $atentie = 1;
            }
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
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <title>Subcategory</title>
     <link rel="stylesheet" href="productPage.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
 </head>

 <body style="background-color: #381D2A">
     <div class="page-wrapper">
         <header class="header-web">
             <div class="logo-wrapper">
                 <img class="logo" src="logo.jpg" alt="Logo">
             </div>
             <div class="search-wrapper">
                 <form class="search" action="cautare.php">
                     <input type="text" class="searchbar" placeholder="Căutare..">
                     <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
                 </form>
             </div>
             <div class="header-links-wrapper">
                 <a href="#" class="header-link">
                     <img src="persoana.png" alt="persoana">
                 </a>
                 <a href="#" class="header-link">
                     <img src="grup.png" alt="grup">
                 </a>
                 <a href="#" class="header-link">
                     <img src="list.png" alt="list">
                 </a>
             </div>

             <div class="logout-wrapper">
                 <a href="/">Logout</a>
                 <i class="fa fa-sign-out"></i>
             </div>
         </header>
         <div class="header-mobile">
             <div class="header-mobile-burger" id="show-menu">
                 <i class="fa fa-bars"></i>
             </div>
             <div class="logo-mobile">
                 <img class="logo" src="logo.jpg" alt="logo">
             </div>
         </div>
         <div class="subheader-mobile">
             <div class="search-wrapper-mobile">
                 <form class="search" action="cautare.php">
                     <input type="text" class="searchbar" placeholder="Căutare..">
                     <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
                 </form>
             </div>
         </div>

         <div class="mobile-menu" id="mobile-menu">
             <div class="infos-wrapper">
                 <div class="close-menu-icon" id="close-menu">
                     <i class="fa fa-times"></i>
                 </div>
                 <div class="logo-mobile">
                     <img class="logo" src="logo.jpg" alt="logo">
                 </div>
             </div>
             <div class="menu-element">
                 <div>
                     <img class="menu-image" src="Pui.png" alt="pui">
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
                     <img class="menu-image" src="Vegetarian.png" alt="vegetarian">
                 </div>
                 <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
             </div>
             <div class="menu-element">
                 <div>
                     <img class="menu-image" src="Peste.png" alt="peste">
                 </div>
                 <a href="peste.asp" class="menu-text">Fish and Seafood</a>
             </div>
             <div class="menu-element">
                 <div>
                     <img class="menu-image" src="Ciorba.png" alt="ciorba">
                 </div>
                 <a href="supe.asp" class="menu-text">Soups</a>
             </div>
             <div class="menu-element">
                 <div>
                     <img class="menu-image" src="garnituri.png" alt="garnituri">
                 </div>
                 <a href="Garnituri.asp" class="menu-text">Sides</a>
             </div>
             <div class="menu-element">
                 <div>
                     <img class="menu-image" src="Salata.png" alt="salata">
                 </div>
                 <a href="salate.asp" class="menu-text">Salads</a>
             </div>
             <div class="menu-element">
                 <div>
                     <img class="menu-image" src="Tort.png" alt="tort">
                 </div>
                 <a href="desert.asp" class="menu-text">Dessert</a>
             </div>
             <div class="header-links-wrapper">
                 <a href="#" class="header-link">
                     <img src="persoana.png" alt="persoana">
                 </a>
                 <a href="#" class="header-link">
                     <img src="grup.png" alt="grup">
                 </a>
                 <a href="#" class="header-link">
                     <img src="list.png" alt="list">
                 </a>
             </div>
             <div class="logout-wrapper">
                 <a href="/">Logout</a>
                 <i class="fa fa-sign-out"></i>
             </div>
         </div>
         <div class="content2">
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
                             <div class="menu-item-details"><?php echo $allergens;
                                                            if ($atentie == 1) { ?>
                                     <p class="menu-item2">This is important! This product contains ingredients that you are allergic to.</p><?php }; ?></div>
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

             <div class="menu">
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Pui.png" alt="pui">
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
                        <img class="menu-image" src="Vegetarian.png" alt="vegetarian">
                    </div>
                    <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png" alt="peste">
                    </div>
                    <a href="peste.asp" class="menu-text">Fish and Seafood</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png" alt="ciorba">
                    </div>
                    <a href="supe.asp" class="menu-text">Soups</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png" alt="garnituri">
                    </div>
                    <a href="Garnituri.asp" class="menu-text">Sides</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png" alt="salata">
                    </div>
                    <a href="salate.asp" class="menu-text">Salads</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png" alt="tort">
                    </div>
                    <a href="desert.asp" class="menu-text">Dessert</a>
                </div>
            </div>
         </div>
         <footer style="background-color:#381D2A">
            <div class="contact">
                <a href="contact.html" target="_blank">Contact</a>
            </div>
        </footer>

    </div>
    <script src="./principal.js"></script>
 </body>

 </html>