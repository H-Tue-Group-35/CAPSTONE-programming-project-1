<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/style.css" rel="stylesheet" type="text/css" >
    <title>Payment</title>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>

    <script>
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

        db.collection("Bookings").add({
            carID: "<?php echo $carID ?>",
            datefrom: "<?php echo $datefrom ?>",
            dateto: "<?php echo $dateto ?>",
            name: "<?php echo $name ?>",
            email: "<?php echo $email ?>",
            phone: "<?php echo $phone ?>"
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
            window.open("https://car-for-all-273711.appspot.com/?dt="+(new Date()).getTime(),"_self");
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
    </script>

</head>

<body>

    <div class="center">
        <h1>Payment<br><?php echo $carID ?></h1>
    </div>
    <div class="center">
        <div class="texty">
            <p>We currently Only accept Paypal as a payment method, as it is very secure</p>
            <p>If you do not have an paypal account, you can pay as a guest</p>
            <p>and we well store your credit card details!</p>
            <div id="paypal-button-container"></div>
        </div>
    </div>

    <div class="center">



    </div>



    <style>
    .texty p {
        margin: 1;
        padding: 1;
        line-height: 0.3;

    }

    .center {
        text-align: center;
        padding: 20px;


    }


    h2 {
        color: red;
    }

    p {
        margin: 1;
        padding: 1;
    }
    </style>

</body>

</html>
