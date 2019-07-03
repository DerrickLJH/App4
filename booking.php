
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
    </head>
    <body>
        <?php include("panel.php"); ?>
        <div class="card cardSchedule">
            <div class="card headerCards">
                <div class="card-body">
                    <h4>Schedule an Appointment</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="background-color: whitesmoke;">
                     <form id="form" method="post" action="index.php" class="form-horizontal">
                     <div class="form-group">
                        <label for="idName">Name: </label>
                        <input type="text" name="name" id="idName" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="idEmail">Email: </label>
                        <input type="text" name="email" id="idEmail" class="form-control" placeholder="e.g. abc123@zxc.com"/>
                    </div>
                    <div class="form-group">
                        <label for="idPostal">Mobile:</label>
                        <input type="text" name="mobile"
                               placeholder="e.g. 91234567" id="idMobile" class="form-control"/>
                    </div>
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
                            <option value="GDT">General Dental Treatment</option>
                            <option value="Gum">Gum Disease</option>
                            <option value="Implant">Implant</option>
                            <option value="Nerve">Nerve Treatment</option>
                            <option value="WisTooth">Wisdom Tooth</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selClinic">Preferred Clinic:</label>
                        <select id="selClinic" name="clinic" class="form-control">
                            <option value="" selected>Please select...</option>
                            <option value="yewtee">Yew Tee Square Dental Clinic</option>
                            <option value="clementi">Clementi Dental Clinic</option>
                            <option value="amk">Ang Mo Kio Dental Clinic</option>
                            <option value="beachrd">Beach Road Dental Clinic</option>
                        </select>
                    </div>

                    <input class="btn btn-block btn-primary" id="submit" type="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var database = firebase.database();
            $("#submit").on("click", function () {
                var name = $("#idName").val();
                var email = $("#idEmail").val();
                var mobile = $("#idMobile").val();
                var datetime = $("#datetimepicker1").val();
                var selectedService = $("#selService :selected").text();
                var selectedClinic = $("#selClinic :selected").text();
                var data = {
                    name: name,
                    email: email,
                    mobile: mobile,
                    datetime: datetime,
                    service: selectedService,
                    clinic: selectedClinic
                };
                database.ref('data/appointment').push(data);
                alert("Successfully Scheduled an Appointment!");
            });


            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </body>
</html>
