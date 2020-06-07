 <?php
   include('product-back.php');
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