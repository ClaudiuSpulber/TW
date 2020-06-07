<?php include('server.php');
if(isset($_SESSION['loggedin'])){
    header('Location: principal.php', true, 307);
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style/welcome.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGshop</title>
</head>

<body style="background-color: #381D2A">
    <div class="content2">
        <div class="section-1">
            <h1 class="welcome-text">welcome to </h1>
            <h1 class="welcome-text1">FORG</h1>
        </div>
        <h1 class="sign-in">Sign in</h1>
        <div class="formular">
            <form method="POST" action="welcome.php" name="formular">
                <input type="text" id="username" name="username" class="form1" maxlength="255" placeholder="Username" required="required"><br>
                <input type="password" id="password" name="password" class="form1" maxlength="255" placeholder="Password" required="required">
                <br>
                <div class="centerbutton">
                    <button type="submit" name="login_user" value="Log in">Log in</button>
                </div>
            </form>
            <p class="word">or</p>
            <form method="get" action="welcomeSignUp.php">
                <div class="centerbutton2">
                    <button type="submit" name="redirect" value="Sign up">Sign up</button></div>
            </form>
        </div>
    </div>
</body>

</html>