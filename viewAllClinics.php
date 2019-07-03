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
        <script src="https://www.gstatic.com/firebasejs/6.0.4/firebase-app.js"></script>
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
        </script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>    
        <link href="css/all.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>  
        <script src="js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>    
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            html, body, #map_canvas {
                padding: 0;
                height: 90%;
                width: 100%; 
            }
        </style>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA1tS0JKZ8FG7AvAGHHWmOUT7csAJSDDVY"></script>
        <script type="text/javascript">
    $(document).ready(function () {

        var myOptions = {
            zoom: 11,
            center: {lat: 1.3521, lng: 103.8198},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
                myOptions);


        //For Clementi Clinic
        var marker1 = new google.maps.Marker({
            position: {lat: 1.312530, lng: 103.764890},
            animation: google.maps.Animation.BOUNCE,
            map: map,
            icon: 'img/teeth.png',
            title: "Clementi Clinic is Here!"
        });

        google.maps.event.addListener(marker1, 'click', function (event) {
            map.setZoom(15);
            var infowindow = new google.maps.InfoWindow({
                content: "Clementi Clinic is Here!"
            });
            infowindow.open(map, marker1);
        });

        //For Yew Tee Clinic
        var marker2 = new google.maps.Marker({
            position: {lat: 1.397750, lng: 103.745480},
            animation: google.maps.Animation.BOUNCE,
            map: map,
            icon: 'img/teeth.png'
        });

        google.maps.event.addListener(marker2, 'click', function (event) {
            map.setZoom(15);
            var infowindow = new google.maps.InfoWindow({
                content: "Yew Tee Square Clinic is Here!"
            });
            infowindow.open(map, marker2);
        });

        //For Beach Road Clinic
        var marker3 = new google.maps.Marker({
            position: {lat: 1.302030, lng: 103.862990},
            animation: google.maps.Animation.BOUNCE,
            map: map,
            icon: 'img/teeth.png'
        });

        google.maps.event.addListener(marker3, 'click', function (event) {
            map.setZoom(15);
            var infowindow = new google.maps.InfoWindow({
                content: "Beach Road Clinic is Here!"
            });
            infowindow.open(map, marker3);
        });

        //For Ang Mo Kio Clinic
        var marker4 = new google.maps.Marker({
            position: {lat: 1.372680, lng: 103.846060},
            animation: google.maps.Animation.BOUNCE,
            map: map,
            icon: 'img/teeth.png'
        });

        google.maps.event.addListener(marker4, 'click', function (event) {
            map.setZoom(15);
            var infowindow = new google.maps.InfoWindow({
                content: "Ang Mo Kio Clinic is Here!"
            });
            infowindow.open(map, marker4);
        });

        //For user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var userMarker = new google.maps.Marker({
                    position: {lat: position.coords.latitude, lng: position.coords.longitude},
                    map: map
                });
                var infowindow = new google.maps.InfoWindow({
                    content: "<b>You are Here!</b>"
                });
                infowindow.open(map, userMarker);
            });
        }
        /* google.maps.event.addListener(map, 'click', function (event) {
         var marker = new google.maps.Marker({
         position: {lat: event.latLng.lat(), lng: event.latLng.lng()},
         map: map,
         title: "I clicked here!"
         });
         }); 
         google.maps.event.addListener(map, 'click', function (event) {
         placeMarker(map, event.latLng);
         });
         
         function placeMarker(map, location) {
         var marker = new google.maps.Marker({
         position: location,
         map: map
         });
         var infowindow = new google.maps.InfoWindow({
         content: 'Latitude: ' + location.lat() +
         '<br>Longitude: ' + location.lng()
         });
         infowindow.open(map, marker);
         } */
    });
        </script>
    </head>
    <body>
        <?php include("panel.php"); ?>
        <div class="card headerCards">
            <div class="card-body">
                <h4 style="text-align: center">View All Clinics<img src="img/teeth.png" class="align-bottom" alt="teeth"></h4>
            </div>
        </div>

        <div id="map_canvas"></div>

    </body>
</html>
