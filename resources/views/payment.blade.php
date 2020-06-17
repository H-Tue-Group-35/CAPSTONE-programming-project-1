<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Car4All</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Used by CircleCI deplyed project -->
    <link rel="stylesheet" href="/public/css/payment.css">

    <!-- Used by local testing -->
    <link rel="stylesheet" href="/css/payment.css">


    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>

    <script>
        console.log("<?php echo $datefrom ?>");

        var firebaseConfig = {
            apiKey: "AIzaSyC2ZMCg8GIWJeW1Y5n3cjsQ4Wk1fDM4J-8",
            authDomain: "car-for-all-273711.firebaseapp.com",
            databaseURL: "https://car-for-all-273711.firebaseio.com",
            projectId: "car-for-all-273711",
            storageBucket: "car-for-all-273711.appspot.com",
            messagingSenderId: "548693459929",
            appId: "1:548693459929:web:3b914dd957d24cf9358fc8"
        };

        firebase.initializeApp(firebaseConfig);
        var db = firebase.firestore();

        function book() {
            var userid = sessionStorage.getItem("loginid");
            db.collection("Bookings").add({
                    carID: "<?php echo $carID ?>",
                    datefrom: "<?php echo $datefrom ?>",
                    dateto: "<?php echo $dateto ?>",
                    name: "<?php echo $name ?>",
                    email: "<?php echo $email ?>",
                    phone: "<?php echo $phone ?>",
                    user: userid
                })
                .then(function(docRef) {
                    console.log("Document written with ID: ", docRef.id);
                })
                .catch(function(error) {
                    console.error("Error adding document: ", error);
                });

            db.collection("Vehicles").doc("<?php echo $carID ?>").update({
                    available: false
                })
                .then(function() {
                    console.log("Document successfully updated!");
                    window.open("https://car-for-all-273711.appspot.com/?dt=" + (new Date()).getTime(), "_self");
                })
                .catch(function(error) {
                    // The document probably doesn't exist.
                    console.error("Error updating document: ", error);
                });


        }
    </script>


    <script src="https://www.paypal.com/sdk/js?client-id=AbV9Q5txmsUY5w0vRyP7P3lkzRAlfOnkijns2CRZYx4y6a1Cw2evkROAwedNEttZ9Ln7CrziKVe3xsy3&currency=AUD" data-sdk-integration-source="button-factory"></script>
    <script>
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'paypal',

            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Booking completed');
                    book();
                });
            }
        }).render('#paypal-button-container');

        function initHeader() {

            var userid = sessionStorage.getItem("loginid");

            if (userid && userid != '') {
                document.getElementById("fHeader").innerHTML =
                '<li style="letter-spacing: 1px;float: right;padding-right: 20px;padding-top: 10px;">Logged in as ' + userid + '</li><hr><li><a href="account ">ACCOUNT</a></li><li><a href="logout ">LOGOUT</a></li>';
            } else {
                sessionStorage.loginid = '';
                document.getElementById("fHeader").innerHTML =
                    '<li><a href="login">LOGIN</a></li><li><a href="register">REGISTER</a></li>';
            }

        }
    </script>


</head>

<body>
    <div class="box">
        <div class="row header">
            <!-- Navbar -->
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/">
                            <img class="logo" id="logopic" src="https://firebasestorage.googleapis.com/v0/b/car-for-all-273711.appspot.com/o/Car%20Pictures%2Flogo.png?alt=media&token=49b7996f-637c-460d-844e-22633123798d">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="links nav navbar-nav navbar-right" id="fHeader">
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row content">
            <div class="mapcontainer">
                <div class="map" id="map">
                    <div class="main-block">
                        <div class="texty">
                            <hr>
                            <p>We currently charge 0.01AUD regardless of duration of booking or type of vehicle.</p>
                            <p>Pricing will need to further dicussed with the financial department of the company to implement vehicle and duration based charges.</p>
                            <hr>
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer">
            <!-- Footer -->
            <footer class="container-fluid bg-4 text-center" style="padding:10px">
                <p>© 2020 Copyright: H-Tue-Group-35</p>
            </footer>
        </div>
    </div>
    <script>
        initHeader();
    </script>
</body>

</html>