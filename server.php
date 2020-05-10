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
if(isset($_POST['register_user'])){
    $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $allergies = mysqli_real_escape_string($db, implode(",", $_POST['allergies']));//dintr-un vector am facut un string cu virgula intre ele EXPLODE
    var_dump($allergies);

//verifica daca mai exista
$user_check_query ="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {//daca exista
    if($user['username']===$username){
        array_push($errors,"Username already exists");
    }
    if ($user['email']===$email){
        array_push($errors, "Email already exists");
    }
}

//daca nu sunt erori
if(count($errors)==0){
    $query = "INSERT INTO users (full_name, email, phone_number, username, password, allergies) VALUES ('$full_name','$email','$phone_number','$username','$password','$allergies')";
    mysqli_query($db, $query);
    $_SESSION['username']=$username;
    header('Location: /Lists.html',true,307);
}
}

//LOGIN
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
        if(mysqli_num_rows($results)==1){
            $_SESSION['username']=$username;
            header('Location: /principal.html',true,307);//cod de raspuns
        }
        else{
            array_push($errors, "Wrong username/password");
        }
    }
    }

?>