<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Your Group</title>
        <link rel="stylesheet" href="Group.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
   <body>
    
    <header class="header-web">
            <div class="logo-wrapper">
            <a href="principal.php">
                <img class="logo" src="logo.jpg" alt="logo">
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
                    <img src="persoana.png" alt="persoana">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png"  alt="grup">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png" alt="list">
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
                    <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
</form>
                </div>
            <div class="header-links-wrapper">
                <a href="semafor.php" class="header-link">
                    <img src="persoana.png" alt="persoana">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png" alt="grup">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png" alt="list">
                </a>
            </div>
            <div class="logout-wrapper">
                <a href="logout.php">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </div>
        <div class="content">
        <script src="./groupScript.js"></script>
        <?php
                   $userId = $_SESSION['id'];
                   
                   $link = mysqli_connect('localhost', 'root', '');
                   if (!$link) {
                       die('Not connected : ' . mysqli_error());
                   }

                   $db = mysqli_select_db($link, 'forg');
                   if (!$db) {
                       die ('Cannot connect to database ' . mysqli_error());}
                    
                    $sql = "Select groups from users where id = '".$userId."';";
                    $query = mysqli_query($link,$sql);
                    $groupId = mysqli_fetch_row($query);
                 

                    $sql = "Select name from groups where id = '".$groupId[0]."';";
                    $query = mysqli_query($link,$sql);
                    $groupName = mysqli_fetch_row($query);
                      

                    $sql = "Select full_name from users where id = '".$userId."';";
                    $query = mysqli_query($link,$sql);
                    $row = mysqli_fetch_row($query);

                    if (isset($_POST['usersMail'])){

                        $sql = "Update users set groups = '".$groupId[0]."' where email = '".$_POST['usersMail']."';";
                        $query = mysqli_query($link,$sql);
                    }
                    
                    $sql2 = "Select full_name from users where id <> '".$userId."' and groups = '".$groupId[0]."';";
                    $query2 = mysqli_query($link,$sql2);
                    
                    if (isset($_POST['planDate'])){
                       /* $sql = "Insert into plans (date, group_id) values ('".$_POST['planDate']."','".$groupId[0]."');";
                        $query = mysqli_query($link,$sql);*/

                    $stmt = $link->prepare("Insert into plans (date, group_id) VALUES (?, ?)");
                    $stmt->bind_param("ii", $_POST['planDate'], $groupId[0]);
                    $stmt->execute();
                    }
                       
                    if (isset($_POST['product']) && isset($_POST['groupId'])){
                        $sql = "Select id from products where product_name='".$_POST['product']."';";
                        $query = mysqli_query($link,$sql);
                        $rowTemp=mysqli_fetch_row($query);
                        if($rowTemp!=NULL){
                        $sql = "Insert into plan_details (plan_id, product_id) values ('".$_POST['groupId']."','".$rowTemp[0]."');";
                        $query = mysqli_query($link,$sql);}
                    }

                    if (isset($_POST['deletePlan'])){
                        $sql = "Delete from plans where id = '".$_POST['deletePlan']."';";
                        $query = mysqli_query($link,$sql);

                        $sql = "Delete from plan_details where group_id = '".$_POST['deletePlan']."';";
                        $query = mysqli_query($link,$sql);
                    }

                    
                    if (isset($_POST['deleteProduct']) && isset($_POST['deleteFromPlan'])){
                        $sql = "Delete from plan_details where plan_id = '".$_POST['deleteFromPlan']."' and product_id='".$_POST['deleteProduct']."';";
                        $query = mysqli_query($link,$sql);
                    }
                       ?>
    <div class="pageContent">
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
                        <form action="createdGroup.php" method="POST">
                        <input class="mailInput" type="email" name="usersMail" placeholder="user`s mail">
                        <input class="invite" type="submit" name="invite" value="Invite new member">
                        </form>
                        
                </div></div>
  <div class="posts"><p class="postsP">
    <?php echo $groupName[0]; ?>
  </p>
  <div class="groups">
  <div class="addPlan">
  <form action="createdGroup.php" method="POST">
            <div class="addPlan"><input type="date" name="planDate">
            <button class="addNewPlan" type="submit" name="invite">Add new plan</button></div>
                        </form>
        </div>
    <ul class="groupsList" style="list-style-type:none;">
    <?php
          $sql = "Select * from plans where group_id= '".$groupId[0]."';";
          $query = mysqli_query($link,$sql);
          $k=1;
          while($row = mysqli_fetch_row($query)){
            if ($k==1) echo '<li class="li1">';
            $sql2 = "Select * from plan_details where plan_id= '".$row[0]."';";
            $query2 = mysqli_query($link,$sql2);
            echo '<div class="plan">';
            echo '<p>'.date('D, d. m', strtotime($row[1])).'</p><ul>';
            echo '<li><form action="createdGroup.php" method="POST"> <input type="text" onkeyup="findProduct(this.value)" name="product">';
            echo '<input type="hidden" name="groupId" value="'.$row[0].'">';
            echo '<div id="livesearch"></div></form>';

            while($row2 = mysqli_fetch_row($query2)){
                $sql3 = "Select product_name from products where id = '".$row2[2]."';";
                $query3 = mysqli_query($link,$sql3);
                $row3 = mysqli_fetch_row($query3);
                echo '<li>'.'<form action="productPage.php" method="get">
                <button class="productButton" type="submit" name = "id" value = '.$row2[2].'>'.$row3[0].'</button></form>';
            } echo '<li>';
            echo '<li>'.'<form action="createdGroup.php" method="post">
            <button class="productButton" type="submit" name = "deletePlan" value="'.$row[0].'">Delete</button></form>'.'</li>';
            echo'</ul></div>';
            $k = $k+1;
            if ($k == 5){
                echo '</li><br>';
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
  </div>    
    <div class="menu">
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Pui.png" alt="pui">
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
                    <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
</form>
                </div>
            </div>
        </div>
     
                  <footer style="background-color:#381D2A">
            <div class="contact">
                <a href="contact.php">Contact</a>
            </div>
        </footer>
    
    <script src="./principal.js"></script>

		</body>
		</html>