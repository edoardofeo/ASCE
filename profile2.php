
<?php
include ("authentication2.php");


    include("DBconnection.php");
/*
    $current_user = $_SESSION['user'];

    $stmt = $conn->prepare("SELECT ID, Username, Email FROM users WHERE Username = ?");
    $stmt->bind_param('s', $current_user);

    $stmt->execute();

    $stmt->bind_result($id, $user, $email);
    $stmt->store_result();
    $stmt->fetch();
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />


</head>


<body style="border-top:160px solid #eee; margin:0;padding:0; ">
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
                    </li>
                    <li><a href="login2.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- Contenuto pagina --->


<div class="map-container">
    <div id="mapid">
        <div align="center">
            <div class="contenitore">

                <span class="title" align = middle> MANAGE YOUR PROFILE </span>
                <div class="manageicons">
                    <ul>
                        <li>  <a><img src="img/user.png" width="80" height="80"></a>  <figcaption>Update info</figcaption> </li>
                        <li>  <a><img src="img/password.png" width="80" height="80"></a> <figcaption>Manage your password</figcaption> </li>
                        <li>  <a><img src="img/chat.png" width="80" height="80"></a> <figcaption>Inbox Messages</figcaption> </li>
                        <li>  <a><img src="img/email.png" width="80" height="80"></a> <figcaption>Manage your email</figcaption> </li>
                        <li>  <a><img src="img/contact-info.png" width="80" height="80"></a> <figcaption>Display info</figcaption> </li>

                    </ul>
                </div>

            </div>
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



































