<?php include('server.php') ?>
<?php
/* DIANA */
if (isset($_POST['add_new_admin'])) {
    $full_name =  $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number =  $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isadmin = 1;

    $user_check_query = $dbh->prepare("SELECT * FROM users WHERE username= ? OR email= ? LIMIT 1");
    $user_check_query->bindParam(1, $username);
    $user_check_query->bindParam(2, $email);

    if ($user_check_query->execute()) {
        while ($row = $user_check_query->fetch()) {
            if ($row['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($row['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }
    }

    if (count($errors) == 0) {
       
        $insert = $dbh->prepare("INSERT INTO users (full_name, email, phone_number, username, password, isadmin) VALUES ( ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $full_name);
        $insert->bindParam(2, $email);
        $insert->bindParam(3, $phone_number);
        $insert->bindParam(4, $username);
        $password=md5($password);
        $insert->bindParam(5, $password);
        $insert->bindParam(6, $isadmin);
        if ($insert->execute()) {
            /*echo ("succes");*/
        } else {
            array_push($errors, "cant insert");
        }
    }
}

/* DIANA */

if (isset($_POST['add_new_user'])) {
    $full_name =  $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number =  $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $allergies = implode(",", $_POST['allergies']); //dintr-un vector am facut un string cu virgula intre ele EXPLODE

    $user_check_query = $dbh->prepare("SELECT * FROM users WHERE username= ? OR email= ? LIMIT 1");
    $user_check_query->bindParam(1, $username);
    $user_check_query->bindParam(2, $email);

    if ($user_check_query->execute()) {
        while ($row = $user_check_query->fetch()) {
            if ($row['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($row['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }
    }

    if (count($errors) == 0) {
       
        $insert = $dbh->prepare("INSERT INTO users (full_name, email, phone_number, username, password, allergies) VALUES ( ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $full_name);
        $insert->bindParam(2, $email);
        $insert->bindParam(3, $phone_number);
        $insert->bindParam(4, $username);
        $insert->bindParam(5, md5($password));
        $insert->bindParam(6, $allergies);
        if ($insert->execute()) {
           /* echo ("succes"); */
        } else {
            array_push($errors, "cant insert");
        }
    }
}

if (isset($_POST['delete_user'])) {
	$email2 = $_POST['email2'];
	$delete = $dbh->prepare("DELETE FROM users WHERE email=?");
	$delete->bindParam(1, $email2);
	if ($delete->execute()) {
		/*echo ("succes");*/
	} else {
		array_push($errors, "cant insert");
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Subcategory</title>
    <link rel="stylesheet" href="adduser.css">
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
                <a href="semafor_liste.php"class="header-link">
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
                Add an user account
            </h1>
            <form method="post" action="adduser.php">
                <input type="text" id="fullname" class="form5" maxlength="255" placeholder="Full name"
                    required="required" name="full_name"><br>
                <input type="text" id="email" class="form5" maxlength="255" placeholder="E-mail"
                    required="required" name="email"><br>
                <input type="text" id="phonenumber" class="form5" maxlength="255" placeholder="Phone number"
                    required="required" name="phone_number"><br>
                <input type="text" id="username" class="form5" maxlength="255" placeholder="Username"
                    required="required" name="username"><br> 
                <input type="password"" id="password" class="form5" maxlength="255"
                    placeholder="Password" required="required" name="password">
            
            <div class="allergies">
                <div class="check-left">
                    <input type="checkbox" name="allergies[]" value="Gluten">
                    <label> Gluten</label><br>
                    <input type="checkbox" name="allergies[]" value="Shellfish">
                    <label> Shellfish and derived products</label><br>
                    <input type="checkbox" name="allergies[]" value="Eggs">
                    <label> Eggs and derived products</label><br>
                    <input type="checkbox" name="allergies[]" value="Fish">
                    <label> Fish and derived products</label>
                </div>
                <div class="check-right">
                    <input type="checkbox" name="allergies[]" value="Peanuts">
                    <label> Peanuts</label><br>
                    <input type="checkbox" name="allergies[]" value="Soy">
                    <label> Soy and derived products</label><br>
                    <input type="checkbox" name="allergies[]" value="Milk">
                    <label> Milk and derived products</label><br>
                    <input type="checkbox" name="allergies[]" value="Tree">
                    <label> Tree nuts</label>
                </div>
            </div>
            <div class="add-button">
                <button type="submit" name="add_new_user">Add an user
                    account</button>
            </div>
        </form>
        <h1 class="product-title">Add an administrator account</h1>
        <form method="post" action="adduser.php">
                <input type="text" id="fullname" class="form5" maxlength="255" placeholder="Full name"
                    required="required" name="full_name"><br>
                <input type="text" id="email" class="form5" maxlength="255" placeholder="E-mail"
                    required="required" name="email"><br>
                <input type="text" id="phonenumber" class="form5" maxlength="255" placeholder="Phone number"
                    required="required" name="phone_number"><br>
                <input type="text" id="username" class="form5" maxlength="255" placeholder="Username"
                    required="required" name="username"><br> 
                <input type="password" id="password" class="form5" maxlength="255"
                    placeholder="Password" required="required" name="password">
            <div class="add-button">
                <button type="submit" name="add_new_admin">Add an administrator account</button>
            </div>
        </form>
            <h1 class="product-title">
                Delete an user
            </h1>
            <form method="post"  action="adduser.php">
                <input type="text" id="email2" class="form5" maxlength="255" placeholder="E-mail"
                    required="required" name="email2"><br>
                    <div class="add-button">
                        <button type="submit" name="delete_user">Delete the user</button>
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
                <a href="contact.php" target="_blank">Contact</a>
            </div>
        </footer>

    </div>
    <script src="./principal.js"></script>
</body>

</html>