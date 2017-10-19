<?php

//se l'utente è gia loggato (con cookie o sessione) rimandato a memberarea
include("authentication.php");
include ("DBconnection.php");


//if(isset($_COOKIE['new_cookie']) || isset($_SESSION['user'])!="" ){
//    header("Location:memberarea.php");
//}

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

    <body style="padding-top:10.5%">
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
            <li><a href="memberarea.php">Home</a>
            </li>
            <li><a href="#" target="_blank">Community</a>
            </li>
            <li><a href="#">Support</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a>
            </li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout (<?php echo $_SESSION['user']?>)</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>



    <!-- Contenuto pagina -->


    <div class="map-container">
      <div id="mapid">
        <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

        <!--S c r i p t   M A P P A  -->
        <script>
            var mymap = L.map('mapid').setView([44.40324, 8.97242], 13);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);
        </script>
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



