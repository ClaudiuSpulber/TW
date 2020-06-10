<?php include('server.php') ?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="page-wrapper">
        <header class="header-web">
            <div class="logo-wrapper">
                <a href="principal.php">
                <img class="logo" src="logo.jpg">
                </a>
            </div>
            <div class="search-wrapper">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare.." name="searched_product2">
                    <button type="submit" class="buttonsearch" name="search_for_product2"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="header-links-wrapper">
                <a href="semafor.php" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png">
                </a>
            </div>

            <div class="logout-wrapper">
                <a href="logout.php">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </header>
        <div class="header-mobile">
            <div class="header-mobile-burger" id="show-menu">
                <i class="fa fa-bars"></i>
            </div>
            <div class="logo-mobile">
                
                <img class="logo" src="logo.jpg">

            </div>
        </div>
        <div class="subheader-mobile">
            <div class="search-wrapper-mobile">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare.." name="searched_product">
                    <button type="submit" class="buttonsearch" name="search_for_product"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="mobile-menu" id="mobile-menu">
            <div class="infos-wrapper">
                <div class="close-menu-icon" id="close-menu">
                    <i class="fa fa-times"></i>
                </div>
                <div class="logo-mobile">
                    <img class="logo" src="logo.jpg">
                </div>
            </div>
            <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Pui.png">
                    </div>
                    <div class="submenu-claus-container">
                        <a href="carne.asp" class="menu-text">Meat products</a>

                        <div class="submenu-claus">
                            <div>
                            <form action="Subcategory.php" method="get">
                                <button class="submenu-text" name="subcategory" value="chicken">Chicken</button>
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
                        <img class="menu-image" src="Vegetarian.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="soups" class="menu-text">Soups</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="sides" class="menu-text">Sides</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="salads" class="menu-text">Salads</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
</form>
                </div>
            <div class="header-links-wrapper">
                <a href="semafor.php" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png">
                </a>
            </div>
            <div class="logout-wrapper">
                <a href="logout.php">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <span class="text-center">We found those products:</span>
				<br>
				<?php
				if (isset($_GET['search_for_product'])) { 
					$searched_product =  $_GET['searched_product'];

					$select = $dbh->prepare("SELECT * FROM products WHERE product_name LIKE ? ");
					$select->bindParam(1, '%' . $searched_product . '%');
					if ($select->execute()) {
						echo "<table style=\"border: 1px solid black;\">";
						echo "<tr> <th>#</th> <th>Name</th> <th>Description</th> <th>Price</th> <th>Category</th> <th>Ingredients</th> <th>Allergens</th> <th>Perishable</th> <th>Location</th> <th>Season</th> <th>Date</th> <th>Link</th> </tr>";
						while ($raw = $select->fetch()) {
							echo "<tr style=\"border-top: 1px solid black;\">";
							echo("<td style=\"border-top: 1px solid black;\">Product".$raw['id']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['product_name']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['description']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['price']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['category']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['ingredients']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['allergens']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['perishable']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['locations']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['season']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['product_date']."</td>");
							echo("<td style=\"border-top: 1px solid black;\"><a href=productPage.php?id=".$raw['id'].">Open product</td>");
							echo "</tr>";
						}
					}

				}

				if (isset($_GET['search_for_product2'])) {
					
					$searched_product =  '%' . $_GET['searched_product2'] . '%';
					
                    $select = $dbh->prepare("SELECT * FROM products WHERE product_name LIKE ? ");
					$select->bindParam(1,  $searched_product );
					if ($select->execute()) {
						echo "<table style=\"border: 1px solid black;\">";
						echo "<tr> <th>#</th> <th>Name</th> <th>Description</th> <th>Price</th> <th>Category</th> <th>Ingredients</th> <th>Allergens</th> <th>Perishable</th> <th>Location</th> <th>Season</th> <th>Date</th> <th>Link</th> </tr>";
						while ($raw = $select->fetch()) {
							echo "<tr style=\"border-top: 1px solid black;\">";
							echo("<td style=\"border-top: 1px solid black;\">".$raw['id']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['product_name']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['description']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['price']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['category']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['ingredients']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['allergens']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['perishable']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['locations']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['season']."</td>");
							echo("<td style=\"border-top: 1px solid black;\">".$raw['product_date']."</td>");
							echo("<td style=\"border-top: 1px solid black;\"><a href=productPage.php?id=".$raw['id'].">Open product</td>");
							echo "</tr>";
							// header('Location: principal.html', true, 307); //cod de raspuns 
						}
						echo "</table>";
					}
				}
				?>

            </div>
            <div class="menu">
            <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Pui.png">
                    </div>
                    <div class="submenu-claus-container">
                        <a href="carne.asp" class="menu-text">Meat products</a>

                        <div class="submenu-claus">
                            <div>
                            <form action="Subcategory.php" method="get">
                                <button class="submenu-text" name="subcategory" value="chicken">Chicken</button>
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
                        <img class="menu-image" src="Vegetarian.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="soups" class="menu-text">Soups</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="sides" class="menu-text">Sides</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="salads" class="menu-text">Salads</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
</form>
                </div>
            </div>
        </div>


        <footer style="background-color:#381D2A">
            <div class="contact">
                <a href="contact.php" target="_blank">Contact</a>
            </div>
        </footer>
    </div>
    <script src="./principal.js"></script>
</body>



</html>