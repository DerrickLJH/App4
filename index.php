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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>  
        <script src="js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>    
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php include("panel.php"); ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid" src="img/thumbsupman.jpg" alt="900x400" style="width: 100%; height: 30%;" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="img/team10.jpg" alt="900x400" data-holder-rendered="true" style="width: 100%; height: 30%;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container-fluid">
            <div class="row" style="margin-top: 20px; margin-bottom: 80px;">
                <a href="booking.php" class="homebtns btn btn-dark font-weight-bold col-md-12 "><i class="fas fa-calendar-alt"></i> Schedule an Appointment</a>
                <a href="managebooking.php" class="homebtns btn btn-dark font-weight-bold col-md-12"><i class="fas fa-tasks"></i> Manage Appointments</a>
                <a href="services.php" class="homebtns btn btn-dark font-weight-bold col-md-12"><i class="fas fa-tooth"></i> View Provided Services</a>
                <a href="locateus.php" class="homebtns btn btn-dark font-weight-bold col-md-12"><i class="fas fa-search-location"></i> Locate a Dental Clinic</a>
                
            </div>
        </div>
        <div class="chatboticon">
            <a href="chatbot.php" class="chatboticon btn"><i class="fas fa-comments"></i></a>
        </div>



    </body>
</html>
