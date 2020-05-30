<?php
session_start();

//initializez variabile
$full_name = "";
$email = "";
$phone_number = "";
$username = "";
$password = "";
$allergies = "";
$errors = array();

//conectare la baza de date
$db = mysqli_connect('localhost', 'root', '', 'forg');

try {
    $dbh = new PDO('mysql:host=localhost;dbname=forg', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

//Inregistrare user
/*
$userok = 0;
$emailok = 0;
if(isset($_POST['register_user'])){
    $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $allergies = mysqli_real_escape_string($db, implode(",", $_POST['allergies']));//dintr-un vector am facut un string cu virgula intre ele EXPLODE


//verifica daca mai exista
$user_check_query ="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {//daca exista
    if($user['username']===$username){
        array_push($errors,"Username already exists");
        //echo("Username already exists");
        $userok=1;
    }
    if ($user['email']===$email){
        array_push($errors, "Email already exists");
        //echo("Email already exists");
        $emailok=1;
    }
}

//daca nu sunt erori
if(count($errors)==0){
    $query = "INSERT INTO users (full_name, email, phone_number, username, password, allergies) VALUES ('$full_name','$email','$phone_number','$username','$password','$allergies')";
    $rez= mysqli_query($db, $query);
    $query2 = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $results = mysqli_query($db,$query2);
    if($raw=mysqli_fetch_array($results)){
        $_SESSION['username']=$username;
        $_SESSION['id']=$raw['id'];
        header('Location: principal.php',true,307);
    }
}
}
*/

$userok = 0;
$emailok = 0;

if (isset($_POST['register_user'])) {
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
                $userok = 1;
            }
            if ($row['email'] === $email) {
                array_push($errors, "Email already exists");
                $emailok = 1;
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
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $raw['id'];
            header('Location: principal.php', true, 307);
        } else {
            array_push($errors, "cant insert");
        }
    }
}
//LOGIN
/*
$logok = 0;
if (isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if ($raw = mysqli_fetch_array($results)) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $raw['id'];
            header('Location: principal.php', true, 307); //cod de raspuns 
        } else {
            array_push($errors, "Wrong username/password");
            // echo("Wrong username/password");
            $logok = 1;
        }
    }
} else {
    if (isset($_POST['redirect'])) {
        header('Location: /welcomeSignUp.php', true, 307);
    }
} 
*/

$logok = 0;
if (isset($_POST['login_user'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) === 0) {
        $query = $dbh->prepare("SELECT * FROM users WHERE username= ? AND password= ?");
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        if ($query->execute()) {
            if ($raw = $query->fetch()) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $raw['id'];
                header('Location: principal.php', true, 307); //cod de raspuns 
            } else {
                array_push($errors, "Wrong username/password");
                // echo("Wrong username/password");
                $logok = 1;
            }
        }
    }
} else {
    if (isset($_POST['redirect'])) {
        header('Location: /welcomeSignUp.php', true, 307);
    }
} 

//Product page
?>