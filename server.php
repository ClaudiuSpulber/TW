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

$userok = 0;
$emailok = 0;

if (isset($_POST['register_user'])) {
    $full_name =  $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number =  $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $okallergens = $_POST['allergens'];
    if($okallergens){
    $allergies = implode(",", $okallergens); //dintr-un vector am facut un string cu virgula intre ele EXPLODE
    }
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
        $insert->bindParam(5, md5($password));
        $insert->bindParam(6, $allergies);
        if ($insert->execute()) {
            echo ("succes");
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $raw['id'];
            if($_SESSION['id']==1){
            $_SESSION['admin']=true;
            }else{
                $_SESSION['admin']=false;
            }
            header('Location: principal.php', true, 307);
        } else {
            array_push($errors, "cant insert");
        }
    }
}
//LOGIN

$logok = 0;
if (isset($_POST['login_user'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) === 0) {
        $query = $dbh->prepare("SELECT * FROM users WHERE binary username= ? AND binary password= ?");
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        if ($query->execute()) {
            if ($raw = $query->fetch()) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $raw['id'];
                $_SESSION['loggedin']=true;
                if($raw['id']==1){
                $_SESSION['admin']=true;
                }else{
                    $_SESSION['admin']=false;
                }
                header('Location: principal.php', true, 307); //cod de raspuns 
            } else {
                array_push($errors, "Wrong username/password");
                $logok = 1;
            }
        }
    }
} else {
    if (isset($_POST['redirect'])) {
        header('Location: welcomeSignUp.php', true, 307);
    }
} 
?>