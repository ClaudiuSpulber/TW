<?php
// Diana//
include "server.php";
if (isset($_POST['products_lists'])) {

    $var = "SELECT count(product_name), product_name  FROM lists group by id_product order by count(product_name) LIMIT 10";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('top10lists.csv', 'w');
        $product_name = array();
        $name = array();
        $count = array();
        while ($row = mysqli_fetch_array($sql)) {
            $name[] = $row['product_name'];
            $count[] = $row['count(product_name)'];
        }
        $product_name = array_map(null, $name, $count);
        //var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

if (isset($_POST['products_favorites'])) {

    $var = "SELECT count(product_name), product_name  FROM favorites group by id_product order by count(product_name) LIMIT 10";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('top10fav.csv', 'w');
        $product_name = array();
        $name = array();
        $count = array();
        while ($row = mysqli_fetch_array($sql)) {
            $name[] = $row['product_name'];
            $count[] = $row['count(product_name)'];
        }
        $product_name = array_map(null, $name, $count);
        //var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

if (isset($_POST['export_products'])) {

    $var = "SELECT id, product_name, description, price, category, ingredients, allergens, perishable, locations, season, product_date  FROM products order by id";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('export_products.csv', 'w');
        $product_name = array();
        $id = array();
        $description = array();
        $price = array();
        $category = array();
        $ingredients = array();
        $allergens = array();
        $perishable = array();
        $locations = array();
        $season = array();
        $product_date = array();
        while ($row = mysqli_fetch_array($sql)) {
            $id[] = $row['id'];
            $product_name[] = $row['product_name'];
            $description[] = $row['description'];
            $price[] = $row['price'];
            $category[] = $row['category'];
            $ingredients[] = $row['ingredients'];
            $allergens[] = $row['allergens'];
            $perishable[] = $row['perishable'];
            $locations[] = $row['locations'];
            $season[] = $row['season'];
            $product_date[] = $row['product_date'];
        }
        $product_name = array_map(null, $id, $product_name, $description, $price, $category, $ingredients, $allergens, $perishable, $locations, $season, $product_date);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

if (isset($_POST['export_users'])) {

    $var = "SELECT *  FROM users order by id";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('export_users.csv', 'w');
        $full_name = array();
        $id = array();
        $email = array();
        $username = array();
        $password = array();
        $phone_number = array();
        $allergies = array();
        $group = array();
        while ($row = mysqli_fetch_array($sql)) {
            $id[] = $row['id'];
            $full_name[] = $row['full_name'];
            $email[] = $row['email'];
            $username[] = $row['username'];
            $password[] = $row['password'];
            $phone_number[] = $row['phone_number'];
            $allergies[] = $row['allergies'];
            $group[] = $row['group'];
        }
        $full_name = array_map(null, $id, $full_name, $email, $username, $password, $phone_number, $allergies, $group);
        foreach ($full_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}


if (isset($_POST['csv_month'])) {
    $nr_month = $_REQUEST['nr_month'];
    $var = "SELECT product_name, product_date FROM products where extract(month from product_date) = $nr_month ";
    $sql = mysqli_query($db, $var);
    $count = mysqli_num_rows($sql);
    if ($count) {
        $file = fopen('monthly_products.csv', 'w');
        $product_name = array();
        $product_date = array();

        while ($row = mysqli_fetch_array($sql)) {
            $product_name[] = $row['product_name'];
            $product_date[] = $row['product_date'];
        }
        $product_name = array_map(null, $product_name, $product_date);
        //var_dump($product_name);
        foreach ($product_name as $fields) {
            fputcsv($file, $fields);
        }
    } else {
        echo "False";
    }
}

$var = "SELECT * from messages";
$sql = mysqli_query($db, $var);
$count = mysqli_num_rows($sql);
$ok = 1;
$id_user = array();
$username = array();
$email = array();
$date = array();
$message = array();
if ($count) {
    while ($row = mysqli_fetch_array($sql)) {
        $id_user[] = $row['id_user'];
        $username[] = $row['username'];
        $email[] = $row['email'];
        $date[] = $row['date'];
        $message[] = $row['message'];
    }
} else {
    $ok = 0;
}
//Diana//


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Subcategory</title>
    <link rel="stylesheet" href="administrator.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>

<body style="background-color: #381D2A">
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
                    <form method="post">

                        <div class="csv-buttons">
                            <button type="submit" name="products_lists">Top 10 products on Lists</button>
                            <button type="submit" name="products_favorites">Top 10 products on Favorites</button><br>
                            <button type="submit" name="export_products">Export products</button>
                            <button type="submit" name="export_users">Export users</button>
                        </div>
                    </form>
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