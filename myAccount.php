<?php include "server.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Account</title>
        <link rel="stylesheet" href="myAccount.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
   <body>
   <header class="header-web">
            <div class="logo-wrapper">
                <a href="principal.php">
                <img class="logo" src="logo.jpg">
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
                    <img src="persoana.png">
                </a>
                <a href="Group.php" class="header-link">
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
                <a href="Group.php" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="semafor_list.php" class="header-link">
                    <img src="list.png">
                </a>
            </div>
            <div class="logout-wrapper">
                <a href="logout.php">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </div>
 
     </header>
    <div class="content">
		          
                  <?php
                
                   $userId = $_SESSION['id'];
                 /*  $link = mysqli_connect('localhost', 'root', '');
                   if (!$link) {
                       die('Not connected : ' . mysqli_error());
                   }

                   $db = mysqli_select_db($link, 'forg');
                   if (!$db) {
                       die ('Cannot connect to database ' . mysqli_error());} */

                       if (isset($_POST['nameEdit'])){
                      /*  $sql = "UPDATE users SET full_name = '".$_POST['nameEdit']."' where id = '".$userId."';";
                        $query = mysqli_query($db,$sql);

                    
                        $sql = "UPDATE users SET email = '".$_POST['emailEdit']."' where id = '".$userId."';";
                        $query = mysqli_query($db,$sql);

                        $sql = "UPDATE users SET phone_number = '".$_POST['phoneEdit']."' where id = '".$userId."';";
                        $query = mysqli_query($db,$sql);*/

                        $phone = strval($_POST['phoneEdit']);
                        $stmt = $dbh->prepare("Update users set full_name = ?, email = ?, phone_number = ? where id = ?");
                       // $stmt->bindparam("sssi", $_POST['nameEdit'], $_POST['emailEdit'], $phone, $userId);

                        $stmt->bindParam(1, $_POST['nameEdit'], PDO::PARAM_STR);
                        $stmt->bindParam(2, $_POST['emailEdit'], PDO::PARAM_STR);
                        $stmt->bindParam(3, $phone, PDO::PARAM_STR);
                        $stmt->bindParam(4, $userId, PDO::PARAM_STR);

                        $stmt->execute();




                    }

                       $sql = "SELECT * from users where id = '".$userId."';";
                       $query = mysqli_query($db,$sql);
                       $row = mysqli_fetch_row($query);
                  ?>
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
    

                    <?php 
                    
                    if (isset($_POST['edit'])){
                    echo
                  '<div class="date"><form id="editButton" action = "myAccount.php" method = post>
                        <table class="dataTable" BORDER="5"  CELLPADDING="4" CELLSPACING="3">
                            <TR>
                               <TH class="titlu" COLSPAN="2"><BR><'.$row[3].'`s account
                                <div class="editeazaDatele">
                                    
                                            <button type="submit">Save</button>
                                </div>
                               </TH>
                            </TR>
                            <TR ALIGN="center">
                               <TD>Full name</TD>
                               <TD><input type="text" size="50" maxlength="25" name="nameEdit" value="'.$row[1].'" /></TD>
                            </TR>
                            <TR ALIGN="center">
                               <TD><p>E-mail</p>
                               <TD><input type="email" size="50" maxlength="25" name="emailEdit" value="'.$row[2].'" /></TD>
                            </TR>
                            <TR ALIGN="center">
                                <TD>Phone number</TD>
                                <TD><input type="tel" pattern="[0-9]*" size="50" maxlength="25" name="phoneEdit" value="'.$row[5].'" /></TD>
                             </TR>
                            </table>
                            </form>
                        </div>
                  </div>';}
                else{
                echo
                    '<div class="date">
                        <table class="dataTable" BORDER="5"  CELLPADDING="4" CELLSPACING="3">
                            <TR>
                               <TH class="titlu" COLSPAN="2"><BR>'.$row[3].'`s account
                                <div class="editeazaDatele">
                                <form id="editButton" action="myAccount.php" method="post">
                                            <button type="submit" name="edit" method="post">Edit details</button></form>
                                </div>
                               </TH>
                            </TR>
                            <TR ALIGN="center">
                               <TD>Full name</TD>
                               <TD>'.$row[1].'</TD>
                            </TR>
                            <TR ALIGN="center">
                               <TD><p>E-mail</p>
                               <TD>'.$row[2].'</TD>
                            </TR>
                            <TR ALIGN="center">
                                <TD>Phone number</TD>
                                <TD>'.$row[5].'</TD>
                             </TR>
                            </table>
                        </div>
                  </div>';}
                  
                  if (isset($_POST['remove'])){
                    $sql = "DELETE from favorites where id_user = '".$_SESSION['id']."' and id_product = '".$_POST['remove']."';";
                    $query = mysqli_query($db,$sql);
                  }
                  
                  ?>
                      </div>
        
                <div class="content2">
                    <P class="favorites">Your favorite items</P>
                    </div>    </div>
                 
            
            <div class="content3">
            <?php
                  $sql = "SELECT * from products where id in (SELECT id_product from favorites where id_user = '".$userId."');";
                  $query = mysqli_query($db,$sql);
                    $k=1;
                    echo '<div class="groups"> <ul class="groupsList" style="list-style-type:none;">';
                  while($row = mysqli_fetch_row($query)){
                      
                    $file = strtolower(str_replace(' ', '', $row[1]));
                    echo '<li class="li1">
                    <form action="productPage.php" method="get">
                  <button class="favoriteParagraph" type="submit" name = "id" value = "'.$row[0].'" method = "get">'.$row[1].'</button></form>
                    <img src="Images/'.$file.'.jpg" alt="'.$row[1].'">
                    <div class= "removeButton">
                    <form action="myAccount.php" method="post">
                    <button class="productButton" type="submit" name = "remove" value = '.$row[0].' method = "post">Remove</button>
                </form></div>
                  </li>';
                  $k=$k+1;
                  if ($k == 4){
                    echo '</ul> </div>';
                    echo '<div class="groups"> <ul class="groupsList" style="list-style-type:none;">';
                    $k=1;
               } 

                  }echo '</ul> </div>';
            ?>

            <?php
                /*<div class="groups">
                    <ul class="groupsList" style="list-style-type:none;">
                        <li class="li1">
                          <p class=favoriteParagraph>Tiramisu</p>
                          
                          <img src="Images/tiramisu.jpg" alt="Tiramisu">
                          <p class=removeParagraph>remove</p> 
                        </li>
                        <li class="li1">
                            <p class=favoriteParagraph>Tiramisu</p>
                            <img src="Images/tiramisu.jpg" alt="Tiramisu">
                          </li>
                          <li class="li1">
                            <p class=favoriteParagraph>Tiramisu</p>
                            <img src="Images/tiramisu.jpg" alt="Tiramisu">
                          </li>
                      </ul>
                   
                    </div>
                    <div class="groups">
                        <ul class="groupsList" style="list-style-type:none;">
                            <li class="li1">
                              <p class=favoriteParagraph>Tiramisu</p>
                              <img src="Images/tiramisu.jpg" alt="Tiramisu">
                            </li>
                            <li class="li1">
                                <p class=favoriteParagraph>Tiramisu</p>
                                <img src="Images/tiramisu.jpg" alt="Tiramisu">
                              </li>
                              <li class="li1">
                                <p class=favoriteParagraph>Tiramisu</p>
                                <img src="Images/tiramisu.jpg" alt="Tiramisu">
                              </li>
                          </ul>
                       
                        </div>*/
               ?>
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
		