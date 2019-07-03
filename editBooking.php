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
            firebase.initializeApp(firebaseConfig);</script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include("panel.php"); ?>
        <p id="index" style="display: none"><?php echo $id ?></p>
        <div class="card cardSchedule headerCards">
            <div class="card-header"><h4>Edit this Appointment</h4></div>
            <div class="card-body">
                <form id="form" method="post" action="managebooking.php" class="form-horizontal">
                    <div class="form-group">
                        <label for="datetimepicker">Date & Time:</label>
                        <input type="text" class="form-control" name="date_time" id="datetimepicker1">
                    </div>
                    <div class="form-group">
                        <label for="selService">Service:</label>
                        <select id="selService" name="service" class="form-control">
                            <option value="" selected>Please select...</option>
                            <option value="Braces">Braces</option>
                            <option value="Dentures">Dentures</option>
                            <option value="General Dental Treatment">General Dental Treatment</option>
                            <option value="Gum Disease">Gum Disease</option>
                            <option value="Implant">Implant</option>
                            <option value="Nerve Treatment">Nerve Treatment</option>
                            <option value="Wisdom Tooth">Wisdom Tooth</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selClinic">Preferred Clinic:</label>
                        <select id="selClinic" name="clinic" class="form-control">
                            <option value="" selected>Please select...</option>
                            <option value="Yew Tee Square Dental Clinic">Yew Tee Square Dental Clinic</option>
                            <option value="Clementi Dental Clinic">Clementi Dental Clinic</option>
                            <option value="Ang Mo Kio Dental Clinic">Ang Mo Kio Dental Clinic</option>
                            <option value="Beach Road Dental Clinic">Beach Road Dental Clinic</option>
                        </select>
                    </div>
                    <input class="btn btn-block btn-primary" id="submit" type="submit" value="Update"/>
                    <input class="btn btn-block btn-secondary" id="cancel" type="submit" value="Cancel"/>
                    <input class="btn btn-block btn-danger" id="delete" type="submit" value="Delete"/>
                </form>
            </div>
        </div>
        <script>
            var database = firebase.database();
            var uid = $("#index").text();
            console.log(uid);
            var ref = database.ref('data/appointment/' + uid);
            ref.on('value', function(snapshot){
               var value = snapshot.val();
               console.log(value);
               $("#datetimepicker1").val(value.datetime);
               $("#selService").val(value.service);
               $("#selClinic").val(value.clinic);
            });

            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
            
            $("#submit").on("click", function () {
                var datetime = $("#datetimepicker1").val();
                var selectedService = $("#selService :selected").text();
                var selectedClinic = $("#selClinic :selected").text();
                var data = {
                    datetime: datetime,
                    service: selectedService,
                    clinic: selectedClinic
                };
                database.ref('data/appointment/' + uid).set(data);
            });
            $("#delete").on("click", function() {
               database.ref('data/appointment/' + uid).remove(); 
            });
        </script>
    </body>
</html>
