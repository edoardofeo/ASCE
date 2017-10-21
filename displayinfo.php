

<?php
include("authentication.php");


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
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/modify_script.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />


</head>


<body style="border-top:145px solid #eee; margin:0;padding:0; ">
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
                    <li><a href="index.php">Home</a>
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



<!-- Contenuto pagina --->


    <div class="map-container">
        <div id="mapid">

            <div class="title" align = middle> YOUR INFOs </div><br>


                <table align="center">

                    <tr><td> <h4 class="text-success"><big>Email &emsp;</big></h4> </td>
                        <td><div class="input-group"> <input class="form-control" id="mod_email" value="<?php echo $_SESSION['email']?>" disabled>
                            <span class="input-group-btn"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>
                        </div></td>
                    </tr>

                    <tr><td> <h4 class="text-success"><big>Username &emsp;</big></h4> </td>
                    <td><div class="input-group"> <input class="form-control" id="change_user" value="<?php echo $_SESSION['user']?>" disabled>
                                <span class="input-group-btn"><button type="button" class="btn btn-default" id="mod_user"><span class="glyphicon glyphicon-pencil"></span>
                            </div></td>

                    <tr><td> <h4 class="text-success"> <big>Nationality &emsp;</big></h4>  </td>
                    <td><div class="input-group"> <input class="form-control" id="change_nation" value="<?php echo $_SESSION['nation']?>" disabled>
                                <span class="input-group-btn"><button type="button" class="btn btn-default" id="mod_nation"><span class="glyphicon glyphicon-pencil"></span>
                            </div></td>

                    <tr><td> <h4 class="text-success"><big>Name &emsp;</big></h4>  </td>
                    <td><div class="input-group"> <input class="form-control" id="change_name" value="<?php echo $_SESSION['name']?>" disabled>
                                <span class="input-group-btn"><button type="button" class="btn btn-default" id="mod_name"><span class="glyphicon glyphicon-pencil"></span>
                            </div></td>

                    <tr><td> <h4 class="text-success"> <big>Surname &emsp;</big></h4>  </td>
                    <td><div class="input-group"> <input class="form-control" id="change_surname"  value="<?php echo $_SESSION['surname']?>" disabled>
                                <span class="input-group-btn"><button type="button" class="btn btn-default" id="mod_surname"><span class="glyphicon glyphicon-pencil"></span>
                            </div></td>
                </table><br>

            <div align="middle"><input type="submit" class="btn btn-warning" name="modify_btt" id="modify-btt" value="Modify Info" /> </div><br>

        </div>
    </div>





<!--
                <table align="center">

                    <tr><td> <h4 class="text-success"><big>Email &emsp;</big></h4> </td>
                        <td> <span class="glyphicon glyphicon-envelope"></span> <span id="mod_email"><?php //echo $_SESSION['email']?></span>  </td></tr>

                    <tr><td> <h4 class="text-success"><big>Username &emsp;</big></h4> </td>
                    <td id="mod_user"><span class="glyphicon glyphicon-user"></span> <span > <?php// echo $_SESSION['user']?></span> </td></tr>


                    <tr><td> <h4 class="text-success"> <big>Nationality &emsp;</big></h4>  </td>
                    <td  id="mod_nation"> <span class="glyphicon glyphicon-map-marker"></span> <span> <?php //echo $_SESSION['nation']; ?></span> </td></tr>

                    <tr><td> <h4 class="text-success"><big>Name &emsp;</big></h4>  </td>
                    <td id="mod_name"> <span > <?php //echo $_SESSION['name'];?></span> </td></tr>

                    <tr><td> <h4 class="text-success"> <big>Surname &emsp;</big></h4>  </td>
                    <td id="mod_surname"> <span > <?php // echo $_SESSION['surname'];?></span> </td></tr>

                </table><br>
  -->






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
















