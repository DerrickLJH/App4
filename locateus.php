<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tooth Aid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/6.0.4/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/6.0.4/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/6.0.4/firebase-database.js"></script>
        <script>
            
            var firebaseConfig = {
                apiKey: "AIzaSyB6e0LFKNwLXDeMiZPbl6bdpf8ab5BMNMQ",
                authDomain: "toothaid-1558875904634.firebaseapp.com",
                databaseURL: "https://toothaid-1558875904634.firebaseio.com",
                projectId: "toothaid-1558875904634",
                storageBucket: "toothaid-1558875904634.appspot.com",
                messagingSenderId: "289974946400",
                appId: "1:289974946400:web:65ecb9d90373f3f3"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            database = firebase.database();

            var ref = database.ref('data/clinics');
            ref.on('value', gotData, errData);

            function gotData(data) {
                var clinics = data.val();
                var keys = Object.keys(clinics);
                console.log(keys);
                var message = "";
                for (var i = 0; i < keys.length; i++) {
                    var k = keys[i];
                    var name = clinics[k].name;
                    var img = clinics[k].img;
                    console.log(name, img);
                    message += "<div class='cardLoc card'><img class='loc card-img-top' id='clinicImg' src='img/" + img + "' alt='" + name
                            + "'><div class='card-body'><h4 class='card-title' id='clinicName'>" + name
                            + "</h4><a href='directions.php?id="+ k +"' class='btn btn-primary' id='btndirect'>Directions <i class='fas fa-directions'></i></a></div></div>";
                }
                $("#content").html(message);
            }

            function errData(err) {
                console.log('Error!');
                console.log(err);
            }

        </script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            .viewAll{
                background-color: whitesmoke;
                font-weight: bold;
                box-shadow: 1px 2px 2px rgba(0,0,0,0.2) !important;
            }
        </style>
    </head>
    <body>
        <?php include("panel.php"); ?>
        <div class="card headerCards">
            <div class="card-body">
                <a href="viewAllClinics.php" class="viewAll btn btn-light" style="float: right;">View All Clinics</a>
                <h4>Locate a Clinic</h4>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" id="content">
            </div>
        </div>
    </body>
</html>
