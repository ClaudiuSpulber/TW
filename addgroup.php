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
                Add a new group
            </h1>
            <form method="post">
                <input type="text" id="groupname" class="form6" maxlength="255" placeholder="Group name"
                    required="required" name="groupname"><br>
                <input type="text" id="description" class="form6" maxlength="255" placeholder="Group description"
                    required="required" name="description"><br>
                <div class="add-button">
                    <button type="submit" name="addgrup" id="addgrup">Add group</button>
                </div>
            </form>
        </div>

    </div>


</body>

</html>