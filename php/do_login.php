<?php

//se utente già loggato rimandato alla memberarea
// il link non dovrebbe esserci ma si puo' arrivare tramite barra di ricerca
session_start();
if( isset($_SESSION['user'])!="" ){
    header("Location: ./memberarea.php");
}
include("../DBconnection.php");

//var initialization
$form_error = false;
$success =  $user = "";


// PASSWORD AL DATABASE


if ($_POST){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = mysqli_real_escape_string($conn, $_POST['pw']);

        $pw = hash('sha256', $pw);
        $stmt = $conn->prepare("SELECT Nome,Cognome, Nazione, Username, Email, Password FROM users WHERE  Email = ?  AND Password = ? ");
        $stmt->bind_param('ss', $email, $pw);
        $stmt->execute();
        $stmt->bind_result($name, $surname, $nation, $user, $email, $pw);
       // echo "$user,$email ";
        $stmt->store_result();
        $stmt->fetch();

        echo "$stmt->num_rows";
        //se il risultato della query è 1 e una sola riga
        if($stmt->num_rows==1){
            //echo"$user";
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['nation'] = $nation;
            $_SESSION['logged'] = 1;
            echo "ok";

            if (isset($_POST['checkbox'])) {
                setcookie("user", $user, time() + 3600);
                exit();
            }

            exit();

        } else{
            echo "Email or password is wrong!";
        }
        $stmt->free_result();
        $stmt->close();

}



?>