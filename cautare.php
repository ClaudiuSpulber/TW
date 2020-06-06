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
                <img class="logo" src="logo.jpg">
            </div>
            <div class="search-wrapper">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare.." name="searched_product2">
                    <button type="submit" class="buttonsearch" name="search_for_product2"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="header-links-wrapper">
                <a href="#" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="#" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="#" class="header-link">
                    <img src="list.png">
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
                    <img class="menu-image" src="Vegetarian.png">
                </div>
                <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png">
                </div>
                <a href="peste.asp" class="menu-text">Fish and Seafood</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png">
                </div>
                <a href="supe.asp" class="menu-text">Soups</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png">
                </div>
                <a href="Garnituri.asp" class="menu-text">Sides</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png">
                </div>
                <a href="salate.asp" class="menu-text">Salads</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png">
                </div>
                <a href="desert.asp" class="menu-text">Dessert</a>
            </div>
            <div class="header-links-wrapper">
                <a href="#" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="#" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="#" class="header-link">
                    <img src="list.png">
                </a>
            </div>
            <div class="logout-wrapper">
                <a href="/">Logout</a>
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
						while ($raw = $query->fetch()) {
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
							// header('Location: principal.html', true, 307); //cod de raspuns 
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
                        <img class="menu-image" src="Vegetarian.png">
                    </div>
                    <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png">
                    </div>
                    <a href="peste.asp" class="menu-text">Fish and Seafood</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png">
                    </div>
                    <a href="supe.asp" class="menu-text">Soups</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png">
                    </div>
                    <a href="Garnituri.asp" class="menu-text">Sides</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png">
                    </div>
                    <a href="salate.asp" class="menu-text">Salads</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png">
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