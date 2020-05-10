<?php 
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) { 
    include "server.php"; 
    $id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
    $var = "SELECT * FROM products WHERE id='$id' LIMIT 1";
	$sql = mysqli_query($db, $var);//cauta in bd daca exista id-ul respectiv
	$productCount = mysqli_num_rows($sql); // numara cate produse s-a gasit cu id-ul din url
    if ($productCount > 0) {
		//ia detaliile produsului din bd
		while($row = mysqli_fetch_array($sql)){ 
		$id=$row["id"];
			 $product_name = $row["product_name"];
			 $description = $row["description"];
			 $price = $row["price"];
			 $category = $row["category"];
			 $ingredients = $row["ingredients"];
			 $allergens= $row["allergens"];
             $perishable = $row["perishable"];
             $locations = $row["locations"];
             $season = $row["season"];
         }
		 
	} else {
		echo "That product does not exists.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
mysqli_close($db);
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORGshop</title>
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
    <div class="container">
    <div class="little-container">
      <h1 class="product-title">
      <?php echo $product_name;?>
      </h1>
      <div class="middle-section-container">
        <div class="section-image">
          <img alt="Tiramisu" class="image" src="Images/<?php echo $id;?>.jpg" />
        </div>
        <div class="section-description">
          <div class="description">
            <div class="title">Description</div>
            <div class="content">
            <?php echo $description;?>
            </div>
          </div>
          <div class="price">
            <div class="title">Price</div>
            <div class="content"><?php echo $price;?> RON</div>
          </div>
          <div class="actions">
            <button type="button">Add to list</button>
            <button type="button">Add to favorite</button>
          </div>
        </div>

      </div>
      <div class="section-3">
        <ul>
          <li>
            <div class="menu-item">Category</div>
            <div class="menu-item-details"><?php echo $category;?></div>
          </li>
          <li>
            <div class="menu-item">Ingredients</div>
            <div class="menu-item-details"><?php echo $ingredients;?></div>
          </li>
          <li>
            <div class="menu-item">Allergens</div>
            <div class="menu-item-details"><?php echo $allergens;?></div>
          </li>
          <li>
            <div class="menu-item">Perishable</div>
            <div class="menu-item-details"><?php echo $perishable;?></div>
          </li>
          <li>
            <div class="menu-item">Restaurant where you can find it</div>
            <div class="menu-item-details"><?php echo $locations;?></div>
          </li>

          <li>
            <div class="menu-item">Season</div>
            <div class="menu-item-details"><?php echo $season;?></div>
          </li>
        </ul>
      </div>
    </div>
    </div>
    <div class="menu">
      <div class="menu-element">
          <div>
              <img class="menu-image" src="Pui.png">
          </div>
          <div class="submenu-claus-container">
              <a href="carne.asp" class="menu-text">Preparate din carne</a>

              <div class="submenu-claus">
                  <div>
                      <a href="Subcategory.html" class="submenu-text">Pui</a>
                  </div>
                  <div>
                      <a href="Subcategory.html" class="submenu-text">Vita</a>
                  </div>
                  <div>
                      <a href="Subcategory.html" class="submenu-text">Rata</a>
                  </div>
                  <div>
                      <a href="Subcategory.html" class="submenu-text">Curcan</a>
                  </div>
                  <div>
                      <a href="Subcategory.html" class="submenu-text">Porc</a>
                  </div>
              </div>
          </div>



      </div>
      <div class="menu-element">
          <div>
              <img class="menu-image" src="Vegetarian.png">
          </div>
          <a href="Subcategory.html" class="menu-text">Preparate vegetariene</a>
      </div>
      <div class="menu-element">
          <div>
              <img class="menu-image" src="Peste.png">
          </div>
          <a href="Subcategory.html" class="menu-text">Peste si Fructe de mare</a>
      </div>
      <div class="menu-element">
          <div>
              <img class="menu-image" src="Ciorba.png">
          </div>
          <a href="Subcategory.html" class="menu-text">Supe/Ciorbe</a>
      </div>
      <div class="menu-element">
          <div>
              <img class="menu-image" src="garnituri.png">
          </div>
          <a href="Subcategory.html" class="menu-text">Garnituri</a>
      </div>
      <div class="menu-element">
          <div>
              <img class="menu-image" src="Salata.png">
          </div>
          <a href="Subcategory.html" class="menu-text">Salate</a>
      </div>
      <div class="menu-element">
          <div>
              <img class="menu-image" src="Tort.png">
          </div>
          <a href="Subcategory.html" class="menu-text">Desert</a>
      </div>
  </div>
  </div>
</body>

</html>
