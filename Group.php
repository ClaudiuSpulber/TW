 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Your Group</title>
        <link rel="stylesheet" href="Group.css">
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
                   $groupId = 1;
                   $link = mysqli_connect('localhost', 'root', '');
                   if (!$link) {
                       die('Not connected : ' . mysqli_error());
                   }

                   $db = mysqli_select_db($link, 'tw');
                   if (!$db) {
                       die ('Cannot connect to database ' . mysqli_error());}
                       
                    $sql = "Select full_name from users where id = '".$userId."';";
                    $query = mysqli_query($link,$sql);
                    $row = mysqli_fetch_row($query);

                    $sql2 = "Select full_name from users where id <> '".$userId."' and group_id = '".$groupId."';";
                    $query2 = mysqli_query($link,$sql2);
                    
                       
                       ?>

            <div class="members">
                <p>Group Members</p>
                <div class="memberList">
                    <ul>
                        <li><?php echo $row[0]?> (You)</li>
                        <?php
                        while($row2 = mysqli_fetch_row($query2)){
                            echo "<li>".$row2[0]."</li>";
                        }
                        ?>
                    </ul>
              
                        <button class="invite" type="submit" formaction="Invite.html">Invite new member</button>
                </div></div>
  <div class="posts"><p class="postsP">
    Group description here
  </p>
  <div class="groups">
    <ul class="groupsList" style="list-style-type:none;">
    <?php
          $sql = "Select * from plans where group_id= '".$groupId."';";
          $query = mysqli_query($link,$sql);
          $k=1;
          while($row = mysqli_fetch_row($query)){
            if ($k==1) echo '<li class="li1">';
            $sql2 = "Select * from plan_details where plan_id= '".$row[0]."';";
            $query2 = mysqli_query($link,$sql2);
            echo '<div class="plan">';
            echo '<p>'.date('D, d. m', strtotime($row[1])).'</p><ul>';
            while($row2 = mysqli_fetch_row($query2)){
                $sql3 = "Select product_name from products where id = '".$row2[2]."';";
                $query3 = mysqli_query($link,$sql3);
                $row3 = mysqli_fetch_row($query3);
                echo '<li>'.'<form action="productPage.php" method="get">
                <button class="productButton" type="submit" name = "product" value = '.$row2[2].' method = "get">'.$row3[0].'</button></form>'.'</li>';
            }
            echo'</ul></div>';
            $k = $k+1;
            if ($k == 5){
                echo '</li>';
                $k = 1;
            }
          }
      /*  <li class="li1">
          <div class="plan">
              <p>Monday, 08.06</p>
              <ul>
                  <li>Ceasar Salad</li>
                  <li>Tiramisu</li>
              </ul>
          </div>
          <div class="plan">
            <p>Monday, 08.06</p>
            <ul>
                <li>Ceasar Salad</li>
                <li>Tiramisu</li>
            </ul>
        </div>
        <div class="plan">
            <p>Monday, 08.06</p>
            <ul>
                <li>Ceasar Salad</li>
                <li>Tiramisu</li>
            </ul>
        </div>
        <div class="plan">
            <p>Monday, 08.06</p>
            <ul>
                <li>Ceasar Salad</li>
                <li>Tiramisu</li>
            </ul>
        </div>
        <div class="plan">
            <p>Monday, 08.06</p>
            <ul>
                <li>Ceasar Salad</li>
                <li>Tiramisu</li>
            </ul>
        </div>
        </li>
        
    </ul>*/?>
    </div>
    
  
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