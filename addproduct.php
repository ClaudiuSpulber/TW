<?php include('server.php') ?>
<?php

$target_dir = getcwd().'\\Images\\';

$uploadOk = 1;


if (isset($_POST['add_new_product'])) { 

	echo($target_dir);

	$target_file = $target_dir . basename($_FILES["productFile"]["name"]);

	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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

 
	
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["productFile"]["tmp_name"]);
	if($check !== false) {
		echo( "File is an image - " . $check["mime"] . ".");
		$uploadOk = 1;
	} else {
		echo( "File is not an image.");
		$uploadOk = 0;
	}
    

    // Check if file already exists
    if (file_exists($target_file)) {
    echo( "Sorry, file already exists.");
    $uploadOk = 0;
    }

    // Check file size
    
    if ($_FILES["productFile"]["size"] > 5000000000) {
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
    if (move_uploaded_file($_FILES["productFile"]["tmp_name"], $target_file)) {
        echo("The file ". basename( $_FILES["productFile"]["name"]). " has been uploaded.");
    } else {
        echo("Sorry, there was an error uploading your file.");
    }
    }

    $insert = $dbh->prepare("INSERT INTO products(product_name, `description`, price, category, ingredients, allergens, perishable, locations, season, product_date, file_path) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $insert->bindParam(1, $product_name);
    $insert->bindParam(2, $description);
    $insert->bindParam(3, $price);
    $insert->bindParam(4, $category);
    $insert->bindParam(5, $ingredients);
    $insert->bindParam(6, $allergens);
    $insert->bindParam(7, $perishable);
    $insert->bindParam(8, $restaurants);
    $insert->bindParam(9, $season);
    $insert->bindParam(10, $product_date);
    $insert->bindParam(11, $target_file);
	if ($insert->execute()) {
		echo ("succes");
	} else {
		echo("cant insert");
	}
}

if (isset($_POST['delete_product'])) {
	$productname2 = $_POST['productname2'];
	$delete = $dbh->prepare("DELETE FROM products WHERE product_name=?");
	$delete->bindParam(1, $productname2);
	if ($delete->execute()) {
		echo ("succes");
	} else {
		echo("cant insert");
	}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Subcategory</title>
    <link rel="stylesheet" href="addproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #381D2A">
    <header style="background-color:#381D2A">
        <img class="logo" src="logo.jpg" style="width:10%;">
        <div class="search">
            <form class="search" action="cautare.php">    
                    <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
                    <input type="text" class="searchbar" placeholder="Căutare..">
            </form> 	
        </div>
            <a href="myAccount.html" class="blabla">
                <img class="account" src="persoana.png">
            </a>
            <a href="Group.html" class="blabla">
                <img class="grup" src="grup.png">
            </a>
            <a href="Lists.html" class="blabla">
                <img class="list" src="list.png">
            </a>
 
     </header>
    <div class="content2">
        <div class="menu">
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Pui.png">
                </div>
                <div class="submenu-claus-container">
                    <a href="carne.asp" class="menu-text">Preparate din carne</a>
    
                    <div class="submenu-claus">
                        <div>
                            <a href="pui.asp" class="submenu-text">Pui</a>
                        </div>
                        <div>
                            <a href="vita.asp" class="submenu-text">Vita</a>
                        </div>
                        <div>
                            <a href="rata.asp" class="submenu-text">Rata</a>
                        </div>
                        <div>
                            <a href="curcan.asp" class="submenu-text">Curcan</a>
                        </div>
                        <div>
                            <a href="porc.asp" class="submenu-text">Porc</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Vegetarian.png">
                </div>
                <a href="vegetarian.asp" class="menu-text">Preparate vegetariene</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png">
                </div>
                <a href="peste.asp" class="menu-text">Peste si Fructe de mare</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png">
                </div>
                <a href="supe.asp" class="menu-text">Supe/Ciorbe</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png">
                </div>
                <a href="Garnituri.asp" class="menu-text">Garnituri</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png">
                </div>
                <a href="salate.asp" class="menu-text">Salate</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png">
                </div>
                <a href="desert.asp" class="menu-text">Desert</a>
            </div>
        </div>
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

                <form method="post" id="formular" action="addproduct.php" enctype="multipart/form-data">
                    <input type="text" id="productname" class="form5" maxlength="255" placeholder="Product name"
                        required="required" name="product_name"><br>
                    <input type="text" id="description" class="form5" maxlength="255" placeholder="Product description"
                        required="required" name="description"><br>
                    <input type="text" id="price" class="form5" maxlength="255" placeholder="Product price"
                        required="required" name="price"><br>
					<input type="text" id="category" class="form5" maxlength="255" placeholder="Category"
                        required="required" name="category"><br>
                    <input type="text" id="ingredients" class="form5" maxlength="255" placeholder="Product ingredients"
                        required="required" name="ingredients"><br>
                    <input type="text" id="allergens" class="form5" maxlength="255" placeholder="Product allergens"
                        required="required" name="allergens"><br>
					<input type="text" id="perishable" class="form5" maxlength="255" placeholder="Perishable"
                        required="required" name="perishable"><br>
                    <input type="text" id="restaurants" class="form5" maxlength="255"
                        placeholder="Restaurant where you find" required="required" name="restaurants"><br>
                    <input type="text" id="season" class="form5" maxlength="255" placeholder="Season"
                        required="required" name="season"><br>
					<input type="text" id="product_date" class="form5" maxlength="255" placeholder="Product Date"
                        required="required" name="product_date"><br>

					  
                    <input type="file" class="form5" name="productFile" id="productFile">
                    <div class="add-button">
                        <button type="submit" name="add_new_product">Add product</button>
                    </div>
                </form>
                <h1 class="product-title2">
                    Delete product
                </h1>
                <form method="post">
                    <input type="text" id="productname2" name="productname2" class="form5" maxlength="255" placeholder="Product name"
                        required="required"><br>
					<div class="add-button">
						<button type="submit" name="delete_product">Delete product</button>
					</div>
                </form>
        </div>

    </div>


</body>

</html>