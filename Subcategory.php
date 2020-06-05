<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Subcategory</title>
        <link rel="stylesheet" href="Subcategory.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
   <body>
    
    <header class="header-web">
            <div class="logo-wrapper">
                <img class="logo" src="logo.jpg">
            </div>
            <div class="search-wrapper">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare..">
                    <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
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
       
     <?php
    $userId = 1;
    $link = mysqli_connect('localhost', 'root', '');
    if (!$link) {
        die('Not connected : ' . mysqli_error());
    }


    $db = mysqli_select_db($link, 'tw');
    if (!$db) {
        die ('Cannot connect to database ' . mysqli_error());}

        $category = 'Desserts';
        if (isset($_POST['favorite'])){
            $sql = "SELECT * from favorites where client_id = '".$userId."' and product_id = '".$_POST['favorite']."';";
            $query = mysqli_query($link,$sql);
            $count = mysqli_num_rows($query);
            if ($count>0){
                $sql = "DELETE from favorites where client_id = '".$userId."' and product_id = '".$_POST['favorite']."';";
                $query = mysqli_query($link,$sql);
                unset($_POST['favorite']);
            }
            else {
                $sql = "INSERT into favorites (client_id, product_id) VALUES ('".$userId."', '".$_POST['favorite']."');";
                $query = mysqli_query($link,$sql);
            }
        }

        if (isset($_POST['list'])){
            $sql = "SELECT * from lists where id_client = '".$userId."' and id_product = '".$_POST['list']."';";
            $query = mysqli_query($link,$sql);
            $count = mysqli_num_rows($query);
            if ($count>0){
                $sql = "DELETE from favorites where id_client = '".$userId."' and id_product = '".$_POST['list']."';";
                $query = mysqli_query($link,$sql);
                unset($_POST['list']);
            }
            else {
                $sql = "SELECT product_name from products where id = '".$_POST['list']."';";
                $query = mysqli_query($link,$sql);
                $product_name =  mysqli_fetch_array($query);
                $query = mysqli_query($link,$sql);
                $sql = "INSERT into lists (client_id, product_id, product_name) VALUES ('".$userId."', '".$_POST['list']."', '".$product_name[0].");";
                $query = mysqli_query($link,$sql);          
            }
        }

    ?>

     <div class="content2">
       
        <div class="posts"><p class="postsP">
            <?php echo $category?>
        </p>
        
        <?php
        $sql = "SELECT * from favorites where client_id = '".$userId."';";
        $query = mysqli_query($link,$sql);
        $sql = "SELECT * from products where category = '".$category."';";
        $query2 = mysqli_query($link,$sql);
        $sql = "SELECT * from lists where id_client = '".$userId."';";
        $query3 = mysqli_query($link,$sql);
        $favArray = [];
        $listArray = [];
        while($row = mysqli_fetch_row($query)) {array_push($favArray, $row[2]);}
        while($row3 = mysqli_fetch_row($query3)) {array_push($listArray, $row3[2]);}

        if($query2){echo '<div class="groups"> <ul class="groupsList" style="list-style-type:none;">';
            $k = 1;
            while($row2 = mysqli_fetch_row($query2)){
                $fButton = "Add to favorites";
                $lButton = "Add to shopping list";
                if(in_array($row2[0],$favArray)) $fButton = "Remove from favorites";
                if(in_array($row2[0],$listArray)) $lButton = "Remove from shopping list";
                $file = strtolower(str_replace(' ', '', $row2[1]));
                echo '
                <li class="li1">
                <p class=favoriteParagraph>';echo$row2[1];echo'</p>
                <img src="Images/'.$file.'.jpg" alt="'.$row2[1].'">
                <div class="buttons">
                <form action="productPage.php" method="get">
                  <button class="productButton" type="submit" name = "product" value = '.$row2[0].' method = "get">View Product</button></form>
                  <form action="Subcategory.php" method="post">
                  <button class="productButton" type="submit" name = "favorite" value = '.$row2[0].' method = "post">'.$fButton.'</button>
                  <button class="productButton" type="submit" name = "list" value = '.$row2[0].' method = "post">'.$lButton.'</button>
              </form>
              </li>
                ';
                $k = $k+1;
               if ($k == 4){
                    echo '</ul> </div>';
                    echo '<div class="groups"> <ul class="groupsList" style="list-style-type:none;">';
                    $k=1;

               } 
            }
            echo '</ul> </div>';
         
        }
        ?></div>

            <?php /*<ul class="groupsList" style="list-style-type:none;">
                <li class="li1">
                  <p class=favoriteParagraph>Tiramisu</p>
                  <img src="Images/tiramisu.jpg" alt="Tiramisu">
                  <div class="buttons">
                    <button class="productButton" type="submit" >View Product</button>
                    <button class="productButton" type="submit" >Add to favorites</button>
                    <button class="productButton" type="submit" >Add to shopping list</button>
                
				</li>
				<li class="li1">
					<p class=favoriteParagraph>Tiramisu</p>
                    <img src="Images/tiramisu.jpg" alt="Tiramisu">
                    <div class="buttons">
                        <button class="productButton" type="submit" >View Product</button>
                        <button class="productButton" type="submit" >Add to favorites</button>
                        <button class="productButton" type="submit" >Add to shopping list</button>
                    </div>
				  </li>
				  <li class="li1">
					<p class=favoriteParagraph>Tiramisu</p>
                    <img src="Images/tiramisu.jpg" alt="Tiramisu">
                    <div class="buttons">
                        <button class="productButton" type="submit" >View Product</button>
                        <button class="productButton" type="submit" >Add to favorites</button>
                        <button class="productButton" type="submit" >Add to shopping list</button>
                    </div>
				  </li>
              </ul>
           
			</div>
			<div class="groups">
				<ul class="groupsList" style="list-style-type:none;">
					<li class="li1">
					  <p class=favoriteParagraph>Tiramisu</p>
                      <img src="Images/tiramisu.jpg" alt="Tiramisu">
                      <div class="buttons">
                        <button class="productButton" type="submit" >View Product</button>
                        <button class="productButton" type="submit" >Add to favorites</button>
                        <button class="productButton" type="submit" >Add to shopping list</button>
                    </div>
					</li>
					<li class="li1">
						<p class=favoriteParagraph>Tiramisu</p>
                        <img src="Images/tiramisu.jpg" alt="Tiramisu">
                        <div class="buttons">
                            <button class="productButton" type="submit" >View Product</button>
                            <button class="productButton" type="submit" >Add to favorites</button>
                            <button class="productButton" type="submit" >Add to shopping list</button>
                        </div>
					  </li>
				
				  </ul>
			   
				</div>
    </div>*/?>
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
        </div>
      </div>
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