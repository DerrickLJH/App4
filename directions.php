<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tooth Aid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            firebase.initializeApp(firebaseConfig);</script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>    
        <link href="css/all.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>    
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            html, body, #map_canvas {
                padding: 0;
                height: 90%;
                width: 100%;
            }
        </style>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA1tS0JKZ8FG7AvAGHHWmOUT7csAJSDDVY&libraries=places"></script>
        <script>
            $(document).ready(function () {
                var database = firebase.database();
                var uid = $("#index").text();
                console.log(uid);
                var ref = database.ref('data/clinics/' + uid);
                ref.on('value', function (snapshot) {
                    var value = snapshot.val();
                    $("#clinicName").text(value.name);
                    console.log(value);

                    var directionsDisplay = new google.maps.DirectionsRenderer();
                    var directionsService = new google.maps.DirectionsService();
                    var map;
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var currentLoc = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                            var myOptions = {
                                zoom: 14,
                                center: currentLoc
                            };
                            map = new google.maps.Map(document.getElementById('map_canvas'),
                                    myOptions);
                            directionsDisplay.setMap(map);

                            var desLat = value.lat;
                            var desLng = value.lng;
                            destinationLoc = new google.maps.LatLng(desLat, desLng);

                            var request = {
                                origin: currentLoc,
                                destination: destinationLoc,
                                travelMode: 'DRIVING'
                            };
                            directionsService.route(request, function (result, status) {
                                console.log(result, status);
                                if (status == "OK") {
                                    directionsDisplay.setDirections(result);
                                }
                            });
                        });
                    }
                    ;
                });
            });
        </script>
    </head>
    <body>
        <?php include("panel.php"); ?>
        <p id="index" style="display: none"><?php echo $id ?></p>
        <div class="card">
            <div class="card-header headerCards"><h4 id="clinicName" style="margin: 25px; text-align: center"></h4></div>
        </div>
        <div id="map_canvas"></div>
    </body>
</html>
