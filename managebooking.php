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
            var ref = database.ref('data/appointment');
            ref.on('value', gotData, errData);
            var index = 0;
            function gotData(data) {
                var appointments = data.val();
                var keys = Object.keys(appointments);
                console.log(keys);
                var message = "";
                for (var i = 0; i < keys.length; i++) {
                    var k = keys[i];
                    var datetime = appointments[k].datetime;
                    var service = appointments[k].service;
                    var prefclinic = appointments[k].clinic;
                    //console.log(name, email,mobile,datetime, service, prefclinic);
                    message += "<div class='cardLoc card' style='width:400px'><div class='card-body'><span style='float: right;'><a href='editBooking.php?id=" + k +"' class='btn btn-light text-light'><i class='fas fa-edit'></i> Edit</a></span><h4>"
                            + prefclinic + "</h4><p>" + service + "<br>" + datetime + "</p></div></div><br/>";
                }
                $("#content").html(message);
            }

            function errData(err) {
                console.log('Error!');
                console.log(err);
            }
        </script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            .btn {
                background-color: #1B1B1B;
            }
        </style>
    </head>
    <body>
        <?php include("panel.php") ?>
        <div class="card headerCards">
            <div class="card-body">               
                <h4>Manage Appointments</h4>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" id="content">
            </div>
        </div>
    </body>
</html>
