<?php include('server.php'); ?>
<?php
if(isset($_POST["send"])) {
    $id = $_SESSION['id'];
	$userName = $_POST['userName'];
	$userEmail = $_POST['userEmail'];
	$subject = $_POST['subject'];
    $message = $_POST['message'];
    $date= date("Y/m/d");

    $insert = $dbh->prepare("INSERT INTO messages ( `id_user`, `username`, `email`,  `date`, `message`, `subject` ) VALUES (?, ?, ?, ?, ?, ?)");
    
	$insert->bindParam(1, $id );
	$insert->bindParam(2, $userName );
    $insert->bindParam(3, $userEmail);
    $insert->bindParam(4, $date);
    $insert->bindParam(5, $message );
    $insert->bindParam(6, $subject);

    $rc = $insert->execute();
    if ( false===$rc ) {
        echo("cant insert");
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="page-wrapper">
        <header class="header-web">
            <div class="logo-wrapper">
                <a href="principal.php">
                <img class="logo" src="logo.jpg">
</a>
            </div>
            <div class="search-wrapper">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare.." name="searched_product2">
                    <button type="submit" class="buttonsearch" name="search_for_product2"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="header-links-wrapper">
                <a href="semafor.php" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png">
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
                <img class="logo" src="logo.jpg">
            </div>
        </div>
        <div class="subheader-mobile">
            <div class="search-wrapper-mobile">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare.." name="searched_product">
                    <button type="submit" class="buttonsearch" name="search_for_product"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="mobile-menu" id="mobile-menu">
            <div class="infos-wrapper">
                <div class="close-menu-icon" id="close-menu">
                    <i class="fa fa-times"></i>
                </div>
                <div class="logo-mobile">
                    <img class="logo" src="logo.jpg">
                </div>
            </div>
            <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Pui.png">
                    </div>
                    <div class="submenu-claus-container">
                        <a href="carne.asp" class="menu-text">Meat products</a>

                        <div class="submenu-claus">
                            <div>
                            <form action="Subcategory.php" method="get">
                                <button class="submenu-text" name="subcategory" value="chicken">Chicken</button>
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
                        <img class="menu-image" src="Vegetarian.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="soups" class="menu-text">Soups</button>
</form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="sides" class="menu-text">Sides</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="salads" class="menu-text">Salads</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                    <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
</form>
                </div>
            <div class="header-links-wrapper">
                <a href="semafor.php" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="group.php" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="semafor_liste.php" class="header-link">
                    <img src="list.png">
                </a>
            </div>
            <div class="logout-wrapper">
                <a href="logout.php">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="contact-form">
                        <h1 class="contact-text">Contact Forg</h1>
                        <p class="address">Bulevardul Metalurgiei, Nr.99</p>
                        <p>
                            "Phone: "
                            <a href="tel:0753 694 317">0753694317</a>
                        </p>
                        <p>Monday-Sunday: 10:00-20:00</p>
                    </div>
                    <form name="frmContact" id="formContact" frmContact="" method="post" action="" enctype="multipart/form-data"
                        >

                        <div class="input-row">
                            <label style="padding-top: 20px;">Name</label> <span id="userName-info"
                                class="info"></span><br /> <input type="text" class="input-field" name="userName"
                                id="userName" />
                        </div>
                        <div class="input-row">
                            <label>Email</label> <span id="userEmail-info" class="info"></span><br /> <input type="text"
                                class="input-field" name="userEmail" id="userEmail" />
                        </div>
                        <div class="input-row">
                            <label>Subject</label> <span id="subject-info" class="info"></span><br /> <input type="text"
                                class="input-field" name="subject" id="subject" />
                        </div>
                        <div class="input-row">
                            <label>Message</label> <span id="userMessage-info" class="info"></span><br />
                            <textarea name="message" id="content" class="input-field" cols="60" rows="6"></textarea>
                        </div>
                        <div>
                            <input type="submit" name="send" value="SEND" class="btn-submit" id="submit-form"/>
                            <!-- </button> -->


                            <div id="statusMessage">
                                <?php
                                if (! empty($message)) {
                                    ?>
                                <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>

            </div>
            <div class="menu">
            <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Pui.png">
                    </div>
                    <div class="submenu-claus-container">
                        <a href="carne.asp" class="menu-text">Meat products</a>

                        <div class="submenu-claus">
                            <div>
                                <form action="Subcategory.php" method="get">
                                    <button class="submenu-text" name="subcategory" value="chicken">Chicken</button>
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
                        <img class="menu-image" src="Vegetarian.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                        <button name="subcategory" value="vegetarian" class="menu-text">Vegetarian products</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                        <button name="subcategory" value="fish" class="menu-text">Fish and Seafood</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                        <button name="subcategory" value="soups" class="menu-text">Soups</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                        <button name="subcategory" value="sides" class="menu-text">Sides</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                        <button name="subcategory" value="salads" class="menu-text">Salads</button>
                    </form>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png">
                    </div>
                    <form action="Subcategory.php" method="get">
                        <button name="subcategory" value="desserts" class="menu-text">Dessert</button>
                    </form>
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


<script type="text/javascript">
    let submitForm = document.getElementById('submit-form')
    let formContact = document.getElementById('formContact')
    console.log(submitForm)

    
    formContact.addEventListener('submit', 
    function submitFormFunc(event){
		var valid = true;
        let info = document.querySelector('.info')
        let inputField = document.querySelector('.input-field')
        inputField.style.border = '#e0dfdf 1px solid'
        let userName = document.getElementById('userName')
        let userEmail = document.getElementById('userEmail')
        let subject = document.getElementById('subject')
        let content = document.getElementById('content')
		// $(".info").html("");
		// $(".input-field").css('border0', '#e0dfdf 1px solid');
		// var userName = $("#userName").val();
		// var userEmail = $("#userEmail").val();
		// var subject = $("#subject").val();
		// var content = $("#content").val();

        let userNameInfos = document.getElementById('userName-info')
		if (userName.value == "") {
            userNameInfos.innerHTML ='required'
            userName.style.border='#e66262 1px solid'
			valid = false;
		} else {
            userNameInfos.innerHTML = ''
            userName.style.border = '1px solid black'
        }

        let userEmailInfos = document.getElementById('userEmail-info')
		if (userEmail.value == "") {
            console.log('gwgwga',userEmail.value)
            userEmailInfos.innerHTML='required'
            userEmail.style.border = '#e66262 1px solid'
			valid = false;
		} else {
            userEmailInfos.innerHTML = ''
            userEmail.style.border = '1px solid black'
        }
		if (!userEmail.value.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            let userEmailInfos = document.getElementById('userEmail-info').innerHTML='Invalid Email Address.'
            userEmail.style.border='#e66262 1px solid'
			valid = false;
		}

        let subjectInfos = document.getElementById('subject-info')
		if (subject.value == "") {
            subjectInfos.innerHTML = 'required'
            subject.style.border = '#e66262 1px solid'
			valid = false;
		} else {
            subject.style.border = '1px solid black'
            subjectInfos.innerHTML = ''
        }

        let userMsgInfo = document.getElementById('userMessage-info')
		if (content.value == "") {
            userMsgInfo.innerHTML = 'required'
            content.style.border = '#e66262 1px solid'
			valid = false;
		} else {
            content.style.border = '1px solid black'
            userMsgInfo.innerHTML = ''
        }

        if(!valid) {
            event.preventDefault()
        }
		return valid;
    })

</script>
