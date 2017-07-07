<?php

//se utente già loggato rimandato alla homepage
session_start();
if( isset($_SESSION['user'])!="" ){
    header("Location: memberarea.php");
}
include("DBconnection.php");


//var initialization
$username = $email = $pw = $confirm_pw = $success = "";
$username_error = $email_error = $password_error = $confirm_error =  "";

//flag di validazione form
$form_error = false;

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
        $form_error = true;
        $username_error = "Special chars are not permitted";
    }

//prepared stmt: check user existence
    if($username_error == ""){
        $stmt = $conn->prepare("SELECT Username FROM users WHERE Username = ? ");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows>0){
            $form_error = true;
            $username_error = "Username already exists!";
        }
        $stmt->close();
    }



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = true;
        $email_error = "Please enter valid email";
    }

//prepared stmt: check esistenza mail
    if($email_error == ""){
        $stmt = $conn->prepare("SELECT Username FROM users WHERE Email = ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows>0){
            $form_error = true;
            $email_error = "Email already exists!";
        }
        $stmt->close();
    }



    if (strlen($pw) < 5) {
        $form_error = true;
        $password_error = "Password is too short";
    }


    if ($pw != $confirm_pw) {
        $form_error = true;
        $confirm_error = "Password doesn't match";
    }

//se il flag è FALSE: non ci sono errori e si procede all'inserimento
    if (!$form_error) {

//password encryption
        $pw = hash('sha256', $pw);


//prepared statement: insert in tabella users
        $stmt = $conn->prepare("INSERT INTO users (Nome, Cognome, Username, Email, Password) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $name, $surname, $username, $email, $pw);
        $stmt->execute();
        $stmt->close();

        $success = "L'account è stato creato con successo, verrai reindirizzato alla home in 5secondi...";
    }
}



    /*
    if (strlen($name) < 2 || strlen($name)>19){
        $form_error = true;
        $name_error = "Too long or short name";
    }


    if(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $form_error = true;
        $name_error = "Only letters and spaces allowed";
    }


    if (strlen($surname) < 2 || strlen($surname)>19){
        $form_error = true;
        $surname_error = "Too long or short surname";
    }

    if(!preg_match("/^[a-zA-Z ]*$/", $surname)){
        $form_error = true;
        $surname_error = "Only letters and spaces allowed";
    }

   */
    /*
        if($bday >= date("d/ m/ Y")){
            $form_error = true;
            $bday_error = "Please enter valid email";
        }
    */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Edoardo Collu & Riccardo Di Dio">

    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">
    <title>Animali Selvatici</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/stiles.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />



</head>




<body style="padding-top:122px">
<div class="navbar navbar-fixed-top" role="navigation">
    <div id="header-top">
        <div class="cover">
            <div class="header-text">
            <span> <img src="cinghiale2.png" width="70" height="70">
                 <span class="main">ANIMALI SELVATCI</span><span class="secondary"> e come evitarli</span>
            </span>
            </div>
        </div>
    </div>




    <!--  NAVBAR -->
    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-menubuilder">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index2.php">Home</a>
                    </li>
                    <li><a href="#" target="_blank">Community</a>
                    </li>
                    <li><a href="#">Support</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup2.php"><span class="glyphicon glyphicon-user"></span> Signup</a>
                    </li>
                    <li><a href="login2.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- Contenuto centrale -->


<div class="map-container">
    <div id="mapid">


        <h1 class="title" align = middle> REGISTRATION </h1>

        <form id="registration_form" method="POST"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >

        <!--
         <div style="display: flex;">


             <div style="width: 50%;">
                 <div> <label>Nome</label></div>
                 <span><input type="text" size="20%" name="name" placeholder="" ></span>
                 <span class="error">< // ?php echo $name_error; ?></span><br><br>

                 <div> <label>Cognome</label></div>
                 <span><input type="text" size="20%" name="surname" placeholder="" ></span>
                 <span class="error">< // ? php echo $surname_error; ?></span><br><br>

                 <div> <label>Data di nascita</label></div>
                 <span><input type="date" size="20%" name="bday" placeholder="" required></span>
                 <span class="error"> < // ?php  echo $bday_error; ?></span><br><br>


             </div>
             -->

            <div>
                <table align="center">
                <tr><td> <label>Username</label> </td></tr>
                <tr><td> <span><input type="text" size="20%" name="username"  placeholder=""  id="form_username" required></span> </td></tr>
                <tr><td> <div class="error_form" id="username_error_msg"> <?php echo $username_error; ?></div> </td></tr>


                <tr><td> <label>Email</label> </td></tr>
                <tr><td> <span><input type="email" size="20%" name="email" placeholder="" id="form_email" required></span>  </td></tr>
                <tr><td> <div class="error_form" id="email_error_msg"> <?php echo $email_error; ?></div> </td></tr>


                <tr><td> <label>Password</label> </td></tr>
                <tr><td> <span><input type="password" size="20%" name ="pw" placeholder=""  id ="form_pw" required></span> </td></tr>
                <tr><td> <div class="error_form" id="pw_error_msg"><?php echo $password_error; ?></div> </td></tr>

                <tr><td> <label>Re-type password</label> </td></tr>
                <tr><td> <span><input type="password" size="20%" name = "confirm_pw" placeholder=""  id="form_confirm" required></span> </td></tr>
                <tr><td> <div class="error_form" id="confirm_error_msg"><?php echo $confirm_error; ?></div> </td></tr>

                </table>
            </div>

            <br>
            <?php echo $success; ?>
            <br><br>

        </div>


        <div align="middle"><input type="submit" class="botton-1" name="submit_btt" value="Create Account" /> </div><br>



    </div>
</div>

<!-- sotto la mappa -->
<div class="prefooter">


</div>


<footer>
    <p> Progetto finale SAW &copy; 2017</p>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>

</html>



