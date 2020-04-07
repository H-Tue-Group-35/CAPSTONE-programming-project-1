
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

var firebaseConfig = {
    apiKey: "AIzaSyC1g9Lz5V3kkO1zFc_Kxsw4bvwo1_q2Ueo",
    authDomain: "capstone-project1.firebaseapp.com",
    databaseURL: "https://capstone-project1.firebaseio.com",
    projectId: "capstone-project1",
    storageBucket: "capstone-project1.appspot.com",
    messagingSenderId: "841627456141",
    appId: "1:841627456141:web:3d29dd6d5445a5119c88c4",
    measurementId: "G-23Q95ENL72"
};

firebase.initializeApp(firebaseConfig);
var db = firebase.firestore();

var map, infoWindow;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 17
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            var marker = new google.maps.Marker({position: pos, map: map});
            map.setCenter(pos);

            
            var markers = []
            console.log(typeof(markers));

            db.collection("locations")
                .get()
                .then(function(querySnapshot) {
                    querySnapshot.forEach(function(doc) {
                        // doc.data() is never undefined for query doc snapshots
                        console.log(doc.id, " => ", doc.data().location);
                        var temp = JSON.stringify(doc.data().location);
                        var obj = JSON.parse(temp);
                        console.log(obj.Wa);
                        var coordinates = {
                            lat: obj.Wa,
                            lng: obj.za
                        };

                        markers.push(new google.maps.Marker({position: coordinates, map: map, icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                          }}))
                    });
                })
                .catch(function(error) {
                    console.log("Error getting documents: ", error);
                });

                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}



  
