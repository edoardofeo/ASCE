<?php

session_start();
include("DBconnection.php");


//var initialization
$username = $email = $pw = $confirm_pw = $success = "";
//$username_error = $email_error = $password_error = $confirm_error =  "";

//flag di validazione form
//$form_error = false;

//input sanitizing
if (isset($_POST['submit_btt'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pw = mysqli_real_escape_string($conn, $_POST['pw']);
    $confirm_pw = mysqli_real_escape_string($conn, $_POST['confirm_pw']);

    //$bday =  $_POST['bday'];
    //$name = mysqli_real_escape_string($conn, $_POST['name']);
    //$surname = mysqli_real_escape_string($conn, $_POST['surname']);

//input validation
    if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
        //$form_error = true;
        echo "Please enter valid username";
        exit();
    }





    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       // $form_error = true;
        echo "Please enter valid email";
        exit();
    }





    if (strlen($pw) < 8) {
        //$form_error = true;
        echo "Password is too short";
        exit();
    }


    if ($pw != $confirm_pw) {
        //$form_error = true;
        echo "Password doesn't match";
        exit();
    }



    //prepared stmt: check user existence
   // if($username_error == ""){
        $stmt = $conn->prepare("SELECT Username FROM users WHERE Username = ? ");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows>0){
            //$form_error = true;
            echo "<div>Username already exists! </div>";
            $stmt->close();
            exit();
        }
        $stmt->close();
    //}


    //prepared stmt: check esistenza mail
  //  if($email_error == ""){
        $stmt = $conn->prepare("SELECT Username FROM users WHERE Email = ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows>0){
            //$form_error = true;
            echo "Email already exists!";
            $stmt->close();
            exit();
        }
        $stmt->close();
    //}




//se il flag è FALSE: non ci sono errori e si procede all'inserimento
    //if (!$form_error) {

//password encryption
        $pw = hash('sha256', $pw);


//prepared statement: insert in tabella users
        $stmt = $conn->prepare("INSERT INTO users (Nome, Cognome, Username, Email, Password) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $name, $surname, $username, $email, $pw);
        $stmt->execute();
        $stmt->close();

        echo "L'account è stato creato con successo, verrai reindirizzato alla pagina di Login in 5secondi...";
    header("refresh: 4; login2.php");
    //}
}

?>