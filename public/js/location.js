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

