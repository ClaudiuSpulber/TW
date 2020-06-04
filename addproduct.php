<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["product_file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($_POST['add_new_product'])) {
    $product_name =  $_POST['product_name'];
    $description =  $_POST['description'];
    $price =  $_POST['price'];
    $category =  $_POST['category'];
    $ingredients =  $_POST['ingredients'];
    $allergens =  $_POST['allergens'];
    $perishable =  $_POST['perishable'];
    $restaurants =  $_POST['restaurants'];
    $season =  $_POST['season'];
    $product_date =  $_POST['product_date'];
    $product_file =  $_POST['product_file'];


    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["product_file"]["tmp_name"]);
    if($check !== false) {
        echo( "File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
        echo( "File is not an image.");
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo( "Sorry, file already exists.");
    $uploadOk = 0;
    }

    // Check file size
    
    if ($_FILES["product_file"]["size"] > 5000000) {
    echo( "Sorry, your file is too large.");
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo( "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo("Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["product_file"]["tmp_name"], $target_file)) {
        echo("The file ". basename( $_FILES["product_file"]["name"]). " has been uploaded.");
    } else {
        echo("Sorry, there was an error uploading your file.");
    }
    }

    $insert = $dbh->prepare("INSERT INTO products(product_name, `description`, price, category, ingredients, allergens, perishable, locations, season, product_date, file_path) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $insert->bindParam(1, $product_name);
    $insert->bindParam(1, $description);
    $insert->bindParam(1, $price);
    $insert->bindParam(1, $category);
    $insert->bindParam(1, $ingredients);
    $insert->bindParam(1, $allergens);
    $insert->bindParam(1, $perishable);
    $insert->bindParam(1, $restaurants);
    $insert->bindParam(1, $season);
    $insert->bindParam(1, $product_date);
    $insert->bindParam(1, $product_file);
	if ($insert->execute()) {
		echo ("succes");
	} else {
		echo("cant insert");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subcategory</title>
    <link rel="stylesheet" href="style/addproduct.css">
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
                Add a new product
            </h1>
            <h1 class="product-title2"> 
                Allergens
                </h1>
                <table id="allerg">
                    <tr>
                        <th>Gluten</th>
                        <th>Shellfish</th>
                        <th>Eggs</th>
                        <th>Fish</th>
                        <th>Peanuts</th>
                        <th>Soy</th>
                        <th>Milk</th>
                        <th>Tree nuts</th>
                    </tr>
                </table>

                <form method="post" id="formular">
                    <input type="text" id="productname" class="form5" maxlength="255" placeholder="Product name"
                        required="required"><br>
                    <input type="text" id="description" class="form5" maxlength="255" placeholder="Product description"
                        required="required"><br>
                    <input type="text" id="price" class="form5" maxlength="255" placeholder="Product price"
                        required="required"><br>
                    <input type="text" id="ingredients" class="form5" maxlength="255" placeholder="Product ingredients"
                        required="required"><br>
                    <input type="text" id="allergens" class="form5" maxlength="255" placeholder="Product allergens"
                        required="required"><br>
                    <input type="text" id="restaurants" class="form5" maxlength="255"
                        placeholder="Restaurant where you find" required="required"><br>
                    <input type="text" id="season" class="form5" maxlength="255" placeholder="Season"
                        required="required"><br>

                    <input type="file" class="form5">
                        <div class="add-button">
                            <button type="submit">Add product</button>
                        </div>
                </form>
                <h1 class="product-title2">
                    Delete product
                </h1>
                <form method="post">
                    <input type="text" id="productname2" class="form5" maxlength="255" placeholder="Product name"
                        required="required"><br>
                        <div class="add-button">
                            <button type="submit">Delete product</button>
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