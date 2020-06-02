<?php include('server.php') ?>
<?php
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
        $insert->bindParam(5, $password);
        $insert->bindParam(6, $allergies);
        if ($insert->execute()) {
            echo ("succes");
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
		echo ("succes");
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
            <img class="logo" src="logo.jpg" alt="Logo">
        </div>
        <div class="search-wrapper">
            <form class="search" action="cautare.php">
                <input type="text" class="searchbar" placeholder="Căutare..">
                <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
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
                <img class="menu-image" src="Vegetarian.png" alt="vegetarian">
            </div>
            <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
        </div>
        <div class="menu-element">
            <div>
                <img class="menu-image" src="Peste.png" alt="peste">
            </div>
            <a href="peste.asp" class="menu-text">Fish and Seafood</a>
        </div>
        <div class="menu-element">
            <div>
                <img class="menu-image" src="Ciorba.png" alt="ciorba">
            </div>
            <a href="supe.asp" class="menu-text">Soups</a>
        </div>
        <div class="menu-element">
            <div>
                <img class="menu-image" src="garnituri.png" alt="garnituri">
            </div>
            <a href="Garnituri.asp" class="menu-text">Sides</a>
        </div>
        <div class="menu-element">
            <div>
                <img class="menu-image" src="Salata.png" alt="salata">
            </div>
            <a href="salate.asp" class="menu-text">Salads</a>
        </div>
        <div class="menu-element">
            <div>
                <img class="menu-image" src="Tort.png" alt="tort">
            </div>
            <a href="desert.asp" class="menu-text">Dessert</a>
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
    <div class="content">
        <div class="container">
            <h1 class="product-title">
                Add an user account
            </h1>
            <form method="post">
                <input type="text" id="fullname" class="form5" maxlength="255" placeholder="Full name"
                    required="required"><br>
                <input type="text" id="email" class="form5" maxlength="255" placeholder="E-mail"
                    required="required"><br>
                <input type="text" id="phonenumber" class="form5" maxlength="255" placeholder="Phone number"
                    required="required"><br>
                <input type="text" id="username" class="form5" maxlength="255" placeholder="Username"
                    required="required"><br> <input type="text" id="password" class="form5" maxlength="255"
                    placeholder="Password" required="required">

                <div class="allergies">
                    <div class="check-left">
                        <input type="checkbox">
                        <label> Gluten</label><br>
                        <input type="checkbox">
                        <label> Shellfish and derived products</label><br>
                        <input type="checkbox">
                        <label> Eggs and derived products</label><br>
                        <input type="checkbox">
                        <label> Fish and derived products</label>
                    </div>
                    <div class="check-right">
                        <input type="checkbox">
                        <label> Peanuts</label><br>
                        <input type="checkbox">
                        <label> Soy and derived products</label><br>
                        <input type="checkbox">
                        <label> Milk and derived products</label><br>
                        <input type="checkbox">
                        <label> Tree nuts</label>
                    </div>
                </div>
                <div class="add-button">
                    <button type="button">Add an user
                        account</button>
                </div>
            </form>
            <h1 class="product-title">
                Delete an user
            </h1>
            <form method="post">
                <input type="text" id="email2" class="form5" maxlength="255" placeholder="E-mail"
                    required="required"><br>
                <div class="add-button">
                    <button type="button">Delete the user</button>
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
                    <img class="menu-image" src="Vegetarian.png" alt="vegetarian">
                </div>
                <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png" alt="peste">
                </div>
                <a href="peste.asp" class="menu-text">Fish and Seafood</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png" alt="ciorba">
                </div>
                <a href="supe.asp" class="menu-text">Soups</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png" alt="garnituri">
                </div>
                <a href="Garnituri.asp" class="menu-text">Sides</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png" alt="salata">
                </div>
                <a href="salate.asp" class="menu-text">Salads</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png" alt="tort">
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