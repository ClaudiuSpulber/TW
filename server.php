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
$db = mysqli_connect('localhost','root','','forg');

//Inregistrare user

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

//LOGIN
$logok=0;
if (isset($_POST['login_user'])){
    
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password=mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }

    if(empty($password)){
        array_push($errors, "Password is required");  }
    if(count($errors)==0){
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if($raw=mysqli_fetch_array($results)){
            $_SESSION['username']=$username;
            $_SESSION['id']=$raw['id'];
            header('Location: principal.php',true,307);//cod de raspuns 
        }
        else{
            array_push($errors, "Wrong username/password");
           // echo("Wrong username/password");
           $logok=1;
        }
    }
    }

//Product page


?>