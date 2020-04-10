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

//Example of getting data from database
/*
db.collection("Vehicles")
    .get()
    .then(function(querySnapshot) {
        querySnapshot.forEach(function(doc) {
            // doc.data() is never undefined for query doc snapshots
            console.log(doc.id, " => ", doc.data().location);
            var coordinates = {
                lat: doc.data().location.latitude,
                lng: doc.data().location.longitude
            };

            markers.push(new google.maps.Marker({position: coordinates, map: map, icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                }}))
        });
    })
    .catch(function(error) {
        console.log("Error getting documents: ", error);
    });
*/