<?php include('server.php') ?>
<?php
if (isset($_POST["addgrup"])) {
	$group_name = $_POST["groupname"]; 
	
    $insert = $dbh->prepare("INSERT INTO groups(name) VALUES (?)");
	$insert->bindParam(1, $group_name);
	if ($insert->execute()) {
		//echo ("succes");
	} else {
		//echo("cant insert");
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subcategory</title>
    <link rel="stylesheet" href="addgroup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #381D2A">
<div class="page-wrapper">
        <header class="header-web">
            <div class="logo-wrapper">
            <a href="principal.php">
                <img class="logo" src="logo.jpg" alt="Logo">
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
    <div class="content2">
        <div class="container">
            <h1 class="product-title">
                Add a new group
            </h1>
            <form method="post">
                <input type="text" id="groupname" class="form6" maxlength="255" placeholder="Group name"
                    required="required" name="groupname"><br>
                <div class="add-button">
                    <button type="submit" name="addgrup" id="addgrup">Add group</button>
                </div>
            </form>
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
                <a href="semafor-contact.php">Contact</a>
            </div>
        </footer>

    </div>
    <script src="./principal.js"></script>
</body>

</html>