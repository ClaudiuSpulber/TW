<?php include ('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGshop</title>
</head>

<body style="background-color: #381D2A">
    <div class="center-content">
        <div class="box2">
            <div class="little-container">
                <div class="section-1">
                    <h1 class="welcome-text">welcome to</h1>
                    <h1 class="welcome-text1"><b>FORG</b></h1>
                </div>
                <div class="sign-in">Sign in</div>
                <form method="POST" action="welcome.php" name="formular">
                    <input type="text" id="username" name="username" class="form1" maxlength="255" placeholder="Username"
                        required="required"><br>
                    <input type="text" id="password" name="password" class="form1" maxlength="255" placeholder="Password"
                        required="required">
                
                <buttons>
                    <button type="submit" name="login_user" value="Log in">Log in</button>
                    <word>or</word>
                    <a href="welcomeSignUp.php"><button type="button">Sign up</button></a>
                </buttons>
                </form>
            </div>
        </div>
    </div>
</body>

</html>