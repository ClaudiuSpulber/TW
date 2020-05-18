<?php 
// Diana//
if (isset($_POST['products_lists'])){
    include "server.php";
    $var= "SELECT count(product_name), product_name  FROM lists group by id_product order by count(product_name) LIMIT 10";
    $sql= mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if($count){
        $file=fopen('top10lists.csv','w');
        $product_name=array();
        $name = array();
        $count = array();
        while($row=mysqli_fetch_array($sql)){
            $name[] = $row['product_name'];
            $count[] = $row['count(product_name)']; 
        }
        $product_name = array_map(null,$name,$count);
        var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    }
    else{
        echo "False";
    }
  } 

  if (isset($_POST['products_favorites'])){
    include "server.php";
    $var= "SELECT count(product_name), product_name  FROM favorites group by id_product order by count(product_name) LIMIT 10";
    $sql= mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if($count){
        $file=fopen('top10fav.csv','w');
        $product_name=array();
        $name = array();
        $count = array();
        while($row=mysqli_fetch_array($sql)){
            $name[] = $row['product_name'];
            $count[] = $row['count(product_name)']; 
        }
        $product_name = array_map(null,$name,$count);
        var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    }
    else{
        echo "False";
    }
  }
  //Diana//


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
                    Homepage Administrator
                </h1>
                <div class="section-4">
                    <a href="adduser.html"><img alt="adduser" class="image" src="adduser.png" /></a>
                    <a href="addproduct.html"><img alt="addproduct" class="image" src="addprod.png" /></a>
                    <a href="addgroup.html"><img alt="addgroup" class="image" src="addgroup.png" /></a>
                    <div class="actions">
            <form method="post" action="" >
            <button  type="submit" name="products_lists">Top 10 products added on Lists</button>
            <button  type="submit" name="products_favorites">Top 10 products added on Favorites</button>
            </form>
          </div>
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