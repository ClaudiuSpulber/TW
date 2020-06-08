<?php
include('administrator-back.php');
if(!isset($_SESSION['loggedin'])){
    header('Location: welcome.php', true, 307);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subcategory</title>
    <link rel="stylesheet" href="administrator.css">
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
                    Administrator Homepage
                </h1>
                <div class="section-4">

                    <a href="adduser.html"><img alt="adduser" class="image" src="adduser.png" /></a>
                    <a href="addproduct.html"><img alt="addproduct" class="image" src="addprod.png" /></a>
                    <a href="addgroup.html"><img alt="addgroup" class="image" src="addgroup.png" /></a>

                    <div class="actions">
                        <h1 class="title-csv">Exporting data</h1>
                        <div class="csv-buttons">
                        <button type="submit" name="products_lists" value="1" onclick="showTable(this.value)">Top 10 products on Lists</button>
                        <button type="submit" name="products_favorites" value="2" onclick="showTable(this.value)">Top 10 products on Favorites</button><br>
                        <button type="submit" name="export_products" value="3" onclick="showTable(this.value)">Export products</button>
                        <button type="submit" name="export_users" value="4" onclick="showTable(this.value)">Export users</button>
                        </div>
                        <div id="show-table"></div>
                        <h1 class="title-csv1">If you want to see the products added on a specific month you just need to type here the number of the month and then press the button below</h1>
                        
                        <form method="post">
                            <div class="csv-buttons">
                                <input type="text" id="nr_month" name="nr_month" class="form7" maxlength="2" placeholder="Number of month" required="required"><br>
                                <button type="submit" name="csv_month" id="exp" value="CSV month">Export</button>
                            </div>
                        </form>

                        <h1 class="title-csv">See messages</h1>
                        <?php if ($ok == 0) { ?>
                            <h1 class="title-csv2"> Sorry! You dont have any messages. </h1>
                        <?php } else { ?>
                            <div class="table">
                                <table id="msg">
                                    <tr>
                                        <th>ID user</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Message</th>
                                    </tr>
                                    <?php for ($i = 0; $i < $count; $i = $i + 1) { ?>


                                        <tr>
                                            <td><?php echo $id_user[$i]; ?></td>
                                            <td><?php echo $username[$i]; ?></td>
                                            <td><?php echo $email[$i]; ?></td>
                                            <td><?php echo $date[$i]; ?></td>
                                            <td><?php echo $message[$i]; ?></td>
                                        </tr>
                                    <?php }; ?>
                                </table>
                            </div>
                        <?php }; ?>
                    </div>
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