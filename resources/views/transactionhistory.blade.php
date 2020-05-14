<?php


session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction historyy</title>

    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>



</head>


<style>
.cener {
    text-align: center;
}
</style>

<body>

    <h1> This is the transaction History pagee </h1>


    <div class="center">

        <ul class="bookings"></ul>
        <div class="content">

            <form id="add-cafe-form"></form>

            <ul id="cafe-list"></ul>

        </div>

    </div>


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
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);


    const cafeList = document.querySelector('#cafe-list');

    function renderuser(doc) {

        let li = document.createElement("li");
        let carID = document.createElement("span");
        let datefrom = document.createElement("span");

        li.setAttribute("data-id", doc.id);

        carID.textContent = doc.data().carID;
        datefrom.textContent = doc.data().datefrom;

        li.appendChild(carID)
        li.appendChild(datefrom)

        li.appendChild(li)

    }


    db.collection("Bookings").get().then((snapshot) => {
        snapshot.docs.forEach(doc => {
            console.log(doc.data())
            renderuser(doc);
        })
    })
    </script>

</body>

</html>