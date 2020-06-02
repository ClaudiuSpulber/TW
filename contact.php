<?php
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$conn = mysqli_connect("localhost", "root", "test", "blog_samples") or die("Connection Error: " . mysqli_error($conn));
	mysqli_query($conn, "INSERT INTO tblcontact (user_name, user_email,subject,content) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $content. "')");
	$insert_id = mysqli_insert_id($conn);
	if(!empty($insert_id)) {
	   $message = "Your contact information is saved successfully.";
	   $type = "success";
    }
    
    console.log($conn)
}
require_once "contact_view.php";
?>


    <header style="background-color:#381D2A">
        <img class="logo" src="logo.jpg" style="width:10%;">
        <div class="search">
            <form class="search" action="cautare.php">
                <button type="submit" class="buttonsearch"><i class="fa fa-search"></i></button>
                <input type="text" class="searchbar" placeholder="Căutare..">
            </form>
        </div>
        <a href="#" class="blabla">
            <img class="account" src="persoana.png">
        </a>
        <a href="#" class="blabla">
            <img class="grup" src="grup.png">
        </a>
        <a href="#" class="blabla">
            <img class="list" src="list.png">
        </a>

    </header>
    <div class="content">
        <div class="container">
            <div class="boxx">
                <div class="another-container">
                    <div class="contact-form">
                        <h1 class="contact-text">Contact Forg</h1>
                        <p class="address">Bulevardul Metalurgiei, Nr.99</p>
                        <p>
                            "Phone: "
                            <a href="tel:0753 694 317">0753694317</a>
                        </p>
                        <p>Monday-Sunday: 10:00-20:00</p>
                    </div>
                    <form name="frmContact" id="" frmContact="" method="post" action="" enctype="multipart/form-data"
                        onsubmit="return validateContactForm()">

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
                            <textarea name="content" id="content" class="input-field" cols="60" rows="6"></textarea>
                        </div>
                        <div>
                            <input type="submit" name="send" class="btn-submit" value="Send" />


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
            </div>
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
                    <img class="menu-image" src="Vegetarian.png">
                </div>
                <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png">
                </div>
                <a href="peste.asp" class="menu-text">Fish and Seafood</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png">
                </div>
                <a href="supe.asp" class="menu-text">Soups</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png">
                </div>
                <a href="Garnituri.asp" class="menu-text">Sides</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png">
                </div>
                <a href="salate.asp" class="menu-text">Salads</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png">
                </div>
                <a href="desert.asp" class="menu-text">Dessert</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();

            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
            return valid;
        }
    </script>
