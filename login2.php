

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />


</head>


<?php
//se utente già loggato rimandato alla memberarea
// il link non dovrebbe esserci ma si puo' arrivare tramite barra di ricerca
session_start();
if( isset($_SESSION['user'])!="" ){
    header("Location: memberarea2.php");
}
include("DBconnection.php");

//var initialization
$form_error = false;
$success = $email = $pw = $user = "";


// PASSWORD AL DATABASE


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = mysqli_real_escape_string($conn, $_POST['pw']);

        $pw = hash('sha256', $pw);
        $stmt = $conn->prepare("SELECT Username, Email, Password FROM users WHERE  Email = ?  AND Password = ? ");
        $stmt->bind_param('ss', $email, $pw);
        $stmt->execute();
        $stmt->bind_result($user, $email, $pw);
        $stmt->store_result();
        $stmt->fetch();


        //se il risultato della query è 1 e una sola riga
        if($stmt->num_rows==1){
            $success = "Success!<br> You will redirect to home in 5sec...";

            $_SESSION['user'] = $user;
            $_SESSION['email'] = $email;
            $_SESSION['logged'] = 1;

            if (isset($_POST['checkbox'])) {
                setcookie("user", $user, time() + 3600);
                header("refresh:4 ; memberarea2.php");
            }

            header("refresh: 4; memberarea2.php");

        } else{
            $form_error = true;
            $success = "Email or password are wrong!";
        }
        $stmt->free_result();
        $stmt->close();

    }


}



?>

<body style="border-top:200px solid #eee">
<div class="navbar navbar-fixed-top" role="navigation">
    <div id="header-top">
        <div class="cover">
            <div class="header-text">
            <span> <img src="cinghiale2.png" width="50" height="50">
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
                   <!-- <li><a href="login2.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>  -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- Contenuto pagina -->


<div class="map-container">
    <div id="mapid">


                <span class="title" align="middle" > LOGIN </span>

                <form id="form-std" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
                <div>

                    <label>Email</label><br>
                    <input type="email" placeholder="" name="email" required/>
                    <br><br>
                    <label>Password</label><br>
                    <input type="password" placeholder="" name="pw" required/>
                    <br><br>
                    <label id="smaller"><input type="checkbox" name="checkbox"/> Remember me</label>
                    <br>
                    <span>    </span>
                    <span class="error"><?php echo $success; ?></span> </td>
                    <br><br>
                    <input type="submit" class="botton-1" name="login" value="Login"/>

                </div>
                    <div>
                        <?php

                        ?>
                    </div>

                </form>



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



