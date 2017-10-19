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
    <script src="js/signup_script.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
</head>


<body style="border-top:145px solid #eee">
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
                        </li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



<!-- Contenuto centrale -->


    <div class="map-container">
        <div id="mapid">
            <div class="title" align = middle> REGISTRATION </div><br>
            <form id="registration_form" method="post"  > <!-- action="account_creation.php" > -->

                <table align="center">


                    <tr><td> <input type="text" class="form-control" name="name"  placeholder="Name"  id="form_name" > </td></tr>
                    <tr><td> <div style="min-height: 20px" class="error_form" id="name_error_msg">   </div> </td></tr>

                    <tr><td ><input style="display: block;" type="text" class="form-control" name="surname"  placeholder="Surname"  id="form_surname" > </td></tr>
                    <tr><td> <div style="min-height: 20px"   class="error_form" id="surname_error_msg">  </div> </td></tr>

                    <tr><td> <select class="form-control" name="nation"  id="form_nation">
                            <option value="" selected>(Please select a country)</option>
                               <option value="USA">United States</option>
                               <option value="GBR">United Kingdom</option>
                               <option value="AUS">Australia</option>
                               <option value="CAN">Canada</option>
                               <option value="IND">India</option>
                               <option value="ITA">Italy</option>
                               <option value="BRA">Brazil</option>
                               <option value="ALB">Albania</option>
                               <option value="DZA">Algeria</option>
                               <option value="AND">Andorra</option>
                               <option value="AGO">Angola</option>
                               <option value="AIA">Anguilla</option>
                               <option value="ATG">Antigua and Barbuda</option>
                               <option value="ARG">Argentina</option>
                               <option value="ARM">Armenia</option>
                               <option value="ABW">Aruba</option>
                               <option value="AUT">Austria</option>
                               <option value="AZE">Azerbaijan Republic</option>
                               <option value="BHS">Bahamas</option>
                               <option value="BHR">Bahrain</option>
                               <option value="BRB">Barbados</option>
                               <option value="BEL">Belgium</option>
                               <option value="BLZ">Belize</option>
                               <option value="BEN">Benin</option>
                               <option value="BMU">Bermuda</option>
                               <option value="BTN">Bhutan</option>
                               <option value="BOL">Bolivia</option>
                               <option value="BIH">Bosnia and Herzegovina</option>
                               <option value="BWA">Botswana</option>
                               <option value="VGB">British Virgin Islands</option>
                               <option value="BRN">Brunei</option>
                               <option value="BGR">Bulgaria</option>
                               <option value="BFA">Burkina Faso</option>
                               <option value="BDI">Burundi</option>
                               <option value="KHM">Cambodia</option>
                               <option value="CPV">Cape Verde</option>
                               <option value="CYM">Cayman Islands</option>
                               <option value="TCD">Chad</option>
                               <option value="CHL">Chile</option>
                               <option value="CHN">China Worldwide</option>
                               <option value="COL">Colombia</option>
                               <option value="COM">Comoros</option>
                               <option value="COK">Cook Islands</option>
                               <option value="CRI">Costa Rica</option>
                               <option value="HRV">Croatia</option>
                               <option value="CYP">Cyprus</option>
                               <option value="CZE">Czech Republic</option>
                               <option value="COD">Democratic Republic of the Congo</option>
                               <option value="DNK">Denmark</option>
                               <option value="DJI">Djibouti</option>
                               <option value="DMA">Dominica</option>
                               <option value="DOM">Dominican Republic</option>
                               <option value="ECU">Ecuador</option>
                               <option value="SLV">El Salvador</option>
                               <option value="ERI">Eritrea</option>
                               <option value="EST">Estonia</option>
                               <option value="ETH">Ethiopia</option>
                               <option value="FLK">Falkland Islands</option>
                               <option value="FRO">Faroe Islands</option>
                               <option value="FSM">Federated States of Micronesia</option>
                               <option value="FJI">Fiji</option>
                               <option value="FIN">Finland</option>
                               <option value="FRA">France</option>
                               <option value="GUF">French Guiana</option>
                               <option value="PYF">French Polynesia</option>
                               <option value="GAB">Gabon Republic</option>
                               <option value="GMB">Gambia</option>
                               <option value="DEU">Germany</option>
                               <option value="GIB">Gibraltar</option>
                               <option value="GRC">Greece</option>
                               <option value="GRL">Greenland</option>
                               <option value="GRD">Grenada</option>
                               <option value="GLP">Guadeloupe</option>
                               <option value="GTM">Guatemala</option>
                               <option value="GIN">Guinea</option>
                               <option value="GNB">Guinea Bissau</option>
                               <option value="GUY">Guyana</option>
                               <option value="HND">Honduras</option>
                               <option value="HKG">Hong Kong</option>
                               <option value="HUN">Hungary</option>
                               <option value="ISL">Iceland</option>
                               <option value="IDN">Indonesia</option>
                               <option value="IRL">Ireland</option>
                               <option value="ISR">Israel</option>
                               <option value="JAM">Jamaica</option>
                               <option value="JPN">Japan</option>
                               <option value="JOR">Jordan</option>
                               <option value="KAZ">Kazakhstan</option>
                               <option value="KEN">Kenya</option>
                               <option value="KIR">Kiribati</option>
                               <option value="KWT">Kuwait</option>
                               <option value="KGZ">Kyrgyzstan</option>
                               <option value="LAO">Laos</option>
                               <option value="LVA">Latvia</option>
                               <option value="LSO">Lesotho</option>
                               <option value="LIE">Liechtenstein</option>
                               <option value="LTU">Lithuania</option>
                               <option value="LUX">Luxembourg</option>
                               <option value="MDG">Madagascar</option>
                               <option value="MWI">Malawi</option>
                               <option value="MYS">Malaysia</option>
                               <option value="MDV">Maldives</option>
                               <option value="MLI">Mali</option>
                               <option value="MLT">Malta</option>
                               <option value="MHL">Marshall Islands</option>
                               <option value="MTQ">Martinique</option>
                               <option value="MRT">Mauritania</option>
                               <option value="MUS">Mauritius</option>
                               <option value="MYT">Mayotte</option>
                               <option value="MEX">Mexico</option>
                               <option value="MNG">Mongolia</option>
                               <option value="MSR">Montserrat</option>
                               <option value="MAR">Morocco</option>
                               <option value="MOZ">Mozambique</option>
                               <option value="NAM">Namibia</option>
                               <option value="NRU">Nauru</option>
                               <option value="NPL">Nepal</option>
                               <option value="NLD">Netherlands</option>
                               <option value="ANT">Netherlands Antilles</option>
                               <option value="NCL">New Caledonia</option>
                               <option value="NZL">New Zealand</option>
                               <option value="NIC">Nicaragua</option>
                               <option value="NER">Niger</option>
                               <option value="NIU">Niue</option>
                               <option value="NFK">Norfolk Island</option>
                               <option value="NOR">Norway</option>
                               <option value="OMN">Oman</option>
                               <option value="PLW">Palau</option>
                               <option value="PAN">Panama</option>
                               <option value="PNG">Papua New Guinea</option>
                               <option value="PER">Peru</option>
                               <option value="PHL">Philippines</option>
                               <option value="PCN">Pitcairn Islands</option>
                               <option value="POL">Poland</option>
                               <option value="PRT">Portugal</option>
                               <option value="QAT">Qatar</option>
                               <option value="COD">Republic of the Congo</option>
                               <option value="REU">Reunion</option>
                               <option value="ROM">Romania</option>
                               <option value="RUS">Russia</option>
                               <option value="RWA">Rwanda</option>
                               <option value="VCT">Saint Vincent and the Grenadines</option>
                               <option value="WSM">Samoa</option>
                               <option value="SMR">San Marino</option>
                               <option value="STP">São Tomé and Príncipe</option>
                               <option value="SAU">Saudi Arabia</option>
                               <option value="SEN">Senegal</option>
                               <option value="SYC">Seychelles</option>
                               <option value="SLE">Sierra Leone</option>
                               <option value="SGP">Singapore</option>
                               <option value="SVK">Slovakia</option>
                               <option value="SVN">Slovenia</option>
                               <option value="SLB">Solomon Islands</option>
                               <option value="SOM">Somalia</option>
                               <option value="ZAF">South Africa</option>
                               <option value="KOR">South Korea</option>
                               <option value="ESP">Spain</option>
                               <option value="LKA">Sri Lanka</option>
                               <option value="SHN">St. Helena</option>
                               <option value="KNA">St. Kitts and Nevis</option>
                               <option value="LCA">St. Lucia</option>
                               <option value="SPM">St. Pierre and Miquelon</option>
                               <option value="SUR">Suriname</option>
                               <option value="SJM">Svalbard and Jan Mayen Islands</option>
                               <option value="SWZ">Swaziland</option>
                               <option value="SWE">Sweden</option>
                               <option value="CHE">Switzerland</option>
                               <option value="TWN">Taiwan</option>
                               <option value="TJK">Tajikistan</option>
                               <option value="TZA">Tanzania</option>
                               <option value="THA">Thailand</option>
                               <option value="TGO">Togo</option>
                               <option value="TON">Tonga</option>
                               <option value="TTO">Trinidad and Tobago</option>
                               <option value="TUN">Tunisia</option>
                               <option value="TUR">Turkey</option>
                               <option value="TKM">Turkmenistan</option>
                               <option value="TCA">Turks and Caicos Islands</option>
                               <option value="TUV">Tuvalu</option>
                               <option value="UGA">Uganda</option>
                               <option value="UKR">Ukraine</option>
                               <option value="ARE">United Arab Emirates</option>
                               <option value="URY">Uruguay</option>
                               <option value="VUT">Vanuatu</option>
                               <option value="VAT">Vatican City State</option>
                               <option value="VEN">Venezuela</option>
                               <option value="VNM">Vietnam</option>
                               <option value="WLF">Wallis and Futuna Islands</option>
                               <option value="YEM">Yemen</option>
                               <option value="ZMB">Zambia</option>
                        </select></td></tr>
                    <tr><td> <div style="min-height: 20px"  class="error_form" id="nation_error_msg">  </div> </td></tr>


                    <tr><td><input type="text" class="form-control" name="username"  placeholder="Username"  id="form_username" required></td></tr>
                    <tr><td> <div style="min-height: 20px"  class="error_form" id="username_error_msg">  </div> </td></tr>


                    <tr><td><input type="email" class="form-control" name="email" placeholder="Email" id="form_email" required></td></tr>
                    <tr><td> <div style="min-height: 20px"  class="error_form" id="email_error_msg">  </div> </td></tr>


                    <tr><td><input type="password" class="form-control" name="pw" placeholder="********"  id ="form_pw" required></td></tr>
                    <tr><td> <div style="min-height: 20px"  class="error_form" id="pw_error_msg">  </div> </td></tr>

                    <tr><td><input type="password" class="form-control" name="confirm_pw" placeholder="********"  id="form_confirm" required></td></tr>
                    <tr><td> <div style="min-height: 20px"  class="error_form" id="confirm_error_msg">  </div> </td></tr>

                    <tr><td><div id="signup_result"> </div></td></tr>

                    <tr><td>
                        <br>
                                <input type="submit" class="botton-1" name="submit_btt" id="submit_btt" value="Create Account"/>

                    </td></tr>

                </table>
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
    <!--per il metodo "validation" jquery in script.js -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>



