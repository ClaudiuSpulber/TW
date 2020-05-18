<?php include('server.php') ?>
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
                <div class="account-text">
                    In order to enjoy what our web platform offers, you must create an user account.</div>
                <form method="post" action="welcomeSignUp.php">
                    <input type="text" id="full_name" name="full_name" value="<?php echo $full_name; ?>" class="form2" maxlength="255" placeholder="Full name"
                        required="required"><br>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form2" maxlength="255" placeholder="E-mail"
                        required="required"><br>
                    <input type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" class="form2" maxlength="255" placeholder="Phone number"
                        required="required"><br>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" class="form2" maxlength="255" placeholder="Username"
                        required="required"><br>
                    <input type="password" id="password" name="password" class="form2" maxlength="255" placeholder="Password"
                        required="required">
                
                <div class="account-text2">
                    To make you feel safe in choosing us, we need to know if you have a certain sensitivity to some
                    ingredients</div>
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
                        <input type="checkbox" name="allergies[]" value="Tree nuts">
                        <label> Tree nuts</label>
                    </div>
                </div>
                <buttons2>
                    <button class="button" type="submit" name="register_user">Sign up</button>
                </buttons2>
                <?php if ($userok==1){?>
                <h1 style="text-align:center; margin-top:10px;">Username already exists.</h1>
                <?php }
                else { if ($emailok==1){?>
               <h1 style="text-align:center; margin-top:10px;"> Email already exists.</h1>
                <?php } } ?>

                </form>
            </div>
        </div>
    </div>
</body>

</html>