<?php  include "server.php"; ?>
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
            <a href="principal.php">
                <img class="logo" src="logo.jpg" alt ="logo">
</a>
            </div>
            <div class="search-wrapper">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare..">
                    <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="header-links-wrapper">
                <a href="semafor.php" class="header-link">
                    <img src="persoana.png" alt ="persoana">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png" alt ="grup">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png" alt ="list">
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
                <img class="logo" src="logo.jpg" alt ="logo">
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
                    <img class="logo" src="logo.jpg" alt ="logo">
                </div>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Pui.png" alt ="pui">
                </div>
                <div class="submenu-claus-container">
                    <p class="menu-text">Meat products</p>

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
                        <img class="menu-image" src="Vegetarian.png" alt ="Vegetarian">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png" alt ="Peste">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png" alt ="Ciorba">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="soups" class="menu-text">Soups</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png" alt ="garnituri">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="sides" class="menu-text">Sides</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png" alt ="Salata">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="salads" class="menu-text">Salads</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png" alt ="Tort">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
</form>
                </div>
            <div class="header-links-wrapper">
                <a href="semafor.php" class="header-link">
                    <img src="persoana.png" alt ="persoana">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png" alt ="grup">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png" alt ="list">
                </a>
            </div>
            <div class="logout-wrapper">
                <a href="logout.php">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </div>
        <div class="content">
       
     <?php
     
   
    $userId=$_SESSION['id'];
    
    /*$link = mysqli_connect('localhost', 'root', '');
    if (!$link) {
        die('Not connected : ' . mysqli_error());
    }


    $db = mysqli_select_db($link, 'forg');
    if (!$db) {
        die ('Cannot connect to database ' . mysqli_error());}*/

        $category = $_GET['subcategory'];
      /*  if (isset($_POST['favorite'])){
            $sql = "SELECT * from favorites where id_user = '".$userId."' and id_product = '".$_POST['favorite']."';";
            $query = mysqli_query($db,$sql);
            $count = mysqli_num_rows($query);
            if ($count>0){
                $sql = "DELETE from favorites where id_user= '".$userId."' and id_product = '".$_POST['favorite']."';";
                $query = mysqli_query($db,$sql);
                unset($_POST['favorite']);
            }
            else {
                $sql = "INSERT into favorites (client_id, product_id) VALUES ('".$userId."', '".$_POST['favorite']."');";
                $query = mysqli_query($db,$sql);
            }
        }

        if (isset($_POST['list'])){
            $sql = "SELECT * from lists where id_client = '".$userId."' and id_product = '".$_POST['list']."';";
            $query = mysqli_query($db,$sql);
            $count = mysqli_num_rows($query);
            if ($count>0){
                $sql = "DELETE from favorites where id_client = '".$userId."' and id_product = '".$_POST['list']."';";
                $query = mysqli_query($db,$sql);
                unset($_POST['list']);
            }
            else {
                $sql = "SELECT product_name from products where id = '".$_POST['list']."';";
                $query = mysqli_query($db,$sql);
                $product_name =  mysqli_fetch_array($query);
                $query = mysqli_query($db,$sql);
                $sql = "INSERT into lists (client_id, product_id, product_name) VALUES ('".$userId."', '".$_POST['list']."', '".$product_name[0].");";
                $query = mysqli_query($db,$sql);          
            }
        }*/

    ?>

<script src="./subcategoryScript.js"></script>
     <div class="content2">
       
        <div class="posts"><p class="postsP">
            <?php echo ucfirst($category)?>
        </p>
        
        <?php
        $sql = "SELECT * from favorites where id_user = '".$userId."';";
        $query = mysqli_query($db,$sql);
        $sql = "SELECT * from products where category = '".$category."';";
        $query2 = mysqli_query($db,$sql);
        $sql = "SELECT * from lists where id_client = '".$userId."';";
        $query3 = mysqli_query($db,$sql);
       // $favArray = [];
      //  $listArray = [];
    //    while($row = mysqli_fetch_row($query)) {array_push($favArray, $row[2]);}
     //   while($row3 = mysqli_fetch_row($query3)) {array_push($listArray, $row3[2]);}

        if($query2){echo '<div class="groups"> <ul class="groupsList" style="list-style-type:none;">';
            $k = 1;
            while($row2 = mysqli_fetch_row($query2)){
                $fButton = "Add to favorites";
                $lButton = "Add to shopping list";
               // if(in_array($row2[0],$favArray)) $fButton = "Remove from favorites";
               // if(in_array($row2[0],$listArray)) $lButton = "Remove from shopping list";
                $file = strtolower(str_replace(' ', '', $row2[1]));
                echo '
                <li class="li1">
                <p class=favoriteParagraph>';echo$row2[1];echo'</p>
                <img src="Images/'.$file.'.jpg" alt="'.$row2[1].'">
                <div class="buttons">
                <form action="productPage.php" method="get">
                  <button class="productButton" type="submit" name = "id" value = '.$row2[0].' method = "get">View Product</button></form>                  
                  <button class="productButton" type="submit" name = "favorite" value = '.$row2[0].' onclick="favorite('.$row2[0].','.$userId.')">'.$fButton.'</button>
                  <button class="productButton" type="submit" name = "list" value = '.$row2[0].' onclick="list('.$row2[0].','.$userId.')">'.$lButton.'</button>
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
                        <p class="menu-text">Meat products</p>

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
                        <img class="menu-image" src="Vegetarian.png" alt ="Vegetarian">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png" alt ="Peste">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png" alt ="Ciorba">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="soups" class="menu-text">Soups</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png" alt ="garnituri">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="sides" class="menu-text">Sides</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png" alt ="Salata">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="salads" class="menu-text">Salads</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png" alt ="Tort">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
</form>
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
                <a href="contact.php">Contact</a>
            </div>
        </footer>
    </div>
    <script src="./principal.js"></script>

		</body>
		</html>