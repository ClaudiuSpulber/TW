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
                <input type="text" id="password" class="form5" maxlength="255"
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
    </div>
</body>

</html>