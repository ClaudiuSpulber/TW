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
 
     </header>
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

                       if (isset($_POST['nameEdit'])){
                        $sql = "UPDATE users SET full_name = '".$_POST['nameEdit']."' where id = '".$userId."';";
                        $query = mysqli_query($link,$sql);

                    
                        $sql = "UPDATE users SET email = '".$_POST['emailEdit']."' where id = '".$userId."';";
                        $query = mysqli_query($link,$sql);

                        $sql = "UPDATE users SET phone_number = '".$_POST['phoneEdit']."' where id = '".$userId."';";
                        $query = mysqli_query($link,$sql);

                    
                        $sql = "UPDATE users SET allergies = '".$_POST['ingredientsEdit']."' where id = '".$userId."';";
                        $query = mysqli_query($link,$sql);

                    }

                       $sql = "SELECT * from users where id = '".$userId."';";
                       $query = mysqli_query($link,$sql);
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
                               <TD><input type="text" size="50" maxlength="25" name="emailEdit" value="'.$row[2].'" /></TD>
                            </TR>
                            <TR ALIGN="center">
                                <TD>Phone number</TD>
                                <TD><input type="text" size="50" maxlength="25" name="phoneEdit" value="'.$row[5].'" /></TD>
                             </TR>
                            <TR ALIGN="center">
                                <TD>Avoided ingredients</TD>
                                <<TD><input type="text" size="50" maxlength="25" name="ingredientsEdit" value="'.$row[6].'" /></TD>
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
                                <div class="editeazaDatele">
                                    <form id="editButton">
                                            <button type="submit">Change password</button>
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
                            <TR ALIGN="center">
                                <TD>Avoided ingredients</TD>
                                <TD>'.$row[6].'</TD>
                            </TR>
                            </table>
                        </div>
                  </div>';}?>
                      </div>
        
                <div class="content2">
                    <P class="favorites">Your favorite items</P>
                    </div>    </div>
                 
            
            <div class="content3">
            <?php
                  $sql = "SELECT * from products where id in (SELECT product_id from favorites where client_id = '".$userId."');";
                  $query = mysqli_query($link,$sql);
                    $k=1;
                    echo '<div class="groups"> <ul class="groupsList" style="list-style-type:none;">';
                  while($row = mysqli_fetch_row($query)){
                      
                    $file = strtolower(str_replace(' ', '', $row[1]));
                    echo '<li class="li1">
                    <p class=favoriteParagraph>'.$row[1].'</p>
                    <img src="Images/'.$file.'.jpg" alt="'.$row[1].'">
                    <form action="myAccount.php" method="post">
                    <button class="productButton" type="submit" name = "remove" value = '.$row[1].' method = "post">Remove</button>
                </form>
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

		</body>
		</html>
		