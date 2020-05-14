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
    // db.collection("user").get().then((snapshot) => {
    // snapshot.docs.forEach(doc => {
    // console.log(doc.data())
    // })
    // })
    </script>

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



    const Bookings = document.getElementById("Bookings");

    function renderuser(doc) {

        let li = document.createElement("li");
        let username = document.createElement("span");
        let password = document.createElement("span");

        li.setAttribute("data-id", doc.id);

        username.textContent = doc.data().carID;
        password.textContent = doc.data().datefrom;

        li.appendChild(username)
        li.appendChild(password)

        users.appendChild(li)

    }


    db.collection("user").get().then((snapshot) => {
        snapshot.docs.forEach(doc => {
            console.log(doc.data())
            renderuser(doc);
        })
    })
    </script>

</body>

</html>
