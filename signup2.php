
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




<body style="border-top:200px solid #eee">
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


        <span class="title" align = middle> REGISTRATION </span>

        <form id="registration_form" method="post"  action="account_creation.php" >

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
                <tr><td> <div class="error_form" id="username_error_msg"> </div> </td></tr>


                <tr><td> <label>Email</label> </td></tr>
                <tr><td> <span><input type="email" size="20%" name="email" placeholder="" id="form_email" required></span>  </td></tr>
                <tr><td> <div class="error_form" id="email_error_msg"> </div> </td></tr>


                <tr><td> <label>Password</label> </td></tr>
                <tr><td> <span><input type="password" size="20%" name ="pw" placeholder=""  id ="form_pw" required></span> </td></tr>
                <tr><td> <div class="error_form" id="pw_error_msg"> </div> </td></tr>

                <tr><td> <label>Re-type password</label> </td></tr>
                <tr><td> <span><input type="password" size="20%" name = "confirm_pw" placeholder=""  id="form_confirm" required></span> </td></tr>
                <tr><td> <div class="error_form" id="confirm_error_msg"> </div> </td></tr>

                </table>
            </div>

            <br>
            <div id="success"> </div>
            <br><br>

        </div>


        <div align="middle"><input type="submit" class="botton-1" name="submit_btt" id="submit" value="Create Account" /> </div><br>



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



