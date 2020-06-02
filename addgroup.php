<?php
// Diana//
include "server.php";
if (isset($_POST['addgrup'])) {
    $var = "INSERT INTO groups(group_name, group_description) VALUES ('".$_POST["groupname"]."','".$_POST["description"]."')";
    $sql = mysqli_query($db, $var);

}

?>
<!DOCTYPE html>
<html>

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
                Add a new group
            </h1>
            <form method="post">
                <input type="text" id="groupname" class="form6" maxlength="255" placeholder="Group name"
                    required="required"><br>
                <input type="text" id="description" class="form6" maxlength="255" placeholder="Group description"
                    required="required"><br>
            </form>
            <div class="add-button">
                <button type="button" id="addgrup">Add group</button>
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