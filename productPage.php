 <?php
   include('product-back.php');
   if(!isset($_SESSION['loggedin'])){
    header('Location: welcome.php', true, 307);
}
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <title>Subcategory</title>
     <link rel="stylesheet" href="productPage.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
     <script type="text/javascript" src="javascript/functions.js"></script>
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
                 <a href="semafor.php" class="header-link">
                     <img src="persoana.png" alt="persoana">
                 </a>
                 <a href="#" class="header-link">
                     <img src="grup.png" alt="grup">
                 </a>
                 <a href="semafor_liste.php" class="header-link">
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
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="chicken" class="submenu-text">Chicken</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="beef" class="submenu-text">Beef</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="duck" class="submenu-text">Duck</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="turkey" class="submenu-text">Turkey</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="pork" class="submenu-text">Pork</button>
</form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Vegetarian.png" alt="vegetarian">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png" alt="peste">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png" alt="ciorba">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="soups" class="menu-text">Soups</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png" alt="garnituri">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="sides" class="menu-text">Sides</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png" alt="salata">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="salads" class="menu-text">Salads</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png" alt="tort">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="desserts" class="menu-text">Desserts</a>
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
                                 <button type="submit" name="all" value="1" onclick="add(this.value)">Add all ingredients to list</button>
                                 <button type="submit" name="favorites" value="2" onclick="add(this.value)">Add to favorite</button>
                                 <p id="succes"></p>
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
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="chicken" class="submenu-text">Chicken</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="beef" class="submenu-text">Beef</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="duck" class="submenu-text">Duck</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="turkey" class="submenu-text">Turkey</button>
</form>
                        </div>
                        <div>
                        <form action="Subcategory.php" method="get">
                            <button name="subcategory" value="pork" class="submenu-text">Pork</button>
</form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Vegetarian.png" alt="vegetarian">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png" alt="peste">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png" alt="ciorba">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="soups" class="menu-text">Soups</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png" alt="garnituri">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="sides" class="menu-text">Sides</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png" alt="salata">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="salads" class="menu-text">Salads</button>
</form>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png" alt="tort">
                </div>
                <form action="Subcategory.php" method="get">
                <button name="subcategory" value="desserts" class="menu-text">Desserts</a>
</form>
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