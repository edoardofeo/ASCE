
<?php

session_start();
include("../DBconnection.php");


//var initialization



//input sanitizing
if ($_POST){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $nation = mysqli_real_escape_string($conn, $_POST['nation']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pw = mysqli_real_escape_string($conn, $_POST['pw']);
    $confirm_pw = mysqli_real_escape_string($conn, $_POST['confirm_pw']);


//input validation anche in php in caso il js venga disabilitato da browser
    function check_name($name){
        if (strlen($name) > 30) {
            echo "Name is too long";
            exit();
        }
        if (!preg_match("/^[a-zA-Z]+$/", $name)) {
            echo "Please enter valid name";
            exit();
        }
    }


    function check_surname($surname){

        if (strlen($surname) > 30) {
            echo "Surname is too long";
            exit();
        }
        if (!preg_match("/^[a-zA-Z]+$/", $surname)) {
            echo "Please enter valid surname";
            exit();
        }
    }


    if($name == null){$name ="*missing*";} else check_name($name);
    if($surname == null){$surname ="*missing*";} else check_surname($surname);
    if($nation == null){$nation ="---";}

    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        echo "Please enter valid username";
        exit();
    }

    if (strlen($username) > 15) {
        echo "Username is too long";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter valid email";
        exit();
    }


    if (strlen($pw) < 8) {
        echo "Password is too short";
        exit();
    }


    if ($pw !== $confirm_pw) {
        echo "Password doesn't match";
        exit();
    }



    //prepared stmt: check user già esistente
    $stmt = $conn->prepare("SELECT Username FROM users WHERE Username = ? ");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        echo "Username already exists!";
        $stmt->close();
        exit();
    }
    $stmt->close();



    //prepared stmt: check esistenza mail

    $stmt = $conn->prepare("SELECT Username FROM users WHERE Email = ? ");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        echo "Email already exists!";
        $stmt->close();
        exit();
    }
    $stmt->close();



//password encryption
    $pw = hash('sha256', $pw);


//prepared statement: insert in tabella users


   $stmt = $conn->prepare("INSERT INTO users (Nome, Cognome, Nazione, Username, Email, Password) VALUES (?,?,?,?,?,?)");
   $stmt->bind_param('ssssss', $name, $surname, $nation, $username, $email, $pw);
   if( !$stmt->execute()){
       echo $stmt->error;
   }
   $stmt->close();

   echo "ok";

}



