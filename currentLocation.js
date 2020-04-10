
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
       console.log(position.coords.latitude);

        var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };


        var marker = new google.maps.Marker({position: pos, map: map});
        map.setCenter(pos);

        
        var markers = []
        console.log(typeof(markers));

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

