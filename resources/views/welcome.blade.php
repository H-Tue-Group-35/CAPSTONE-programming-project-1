<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Car4All</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

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
        var map, infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -37.806, lng: 144.954 },
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
                                    url: "http://maps.google.com/mapfiles/kml/pal4/icon15.png"
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
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-dbFSEA8jv-SxqQqhXELgftWtmIN7D4&callback=initMap"></script>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <style>
        #title {
            font-size: 30px;

        }
        </style>

      


        <!-- Banner -->
        <section id="banner" class="major">
            <div class="inner">
                <header class="major">
                    <center>
                        <h1 id="title">CAR4ALL(Testing)</h1>
                    </center>
                </header>
            </div>
        </section>

        <div class="center">
     
     <nav>


        <ul>
        
       
        <style>
.center{
    text-align:center;
}

        
        .navbar{
 text-align: center;
 display: inline;
 margin: 0;
 padding: 10px;
 font-family: "Source Sans Pro", Helvetica, sans-serif;

font-size: 1.6em;

        }
        
        </style>

    <li class="navbar"><a href="booking">Booking</a></li>
    
        
    
            <li class="navbar"><a href="contact">Contact</a></li>

            <li class="navbar" ><a href="login">Login</a></li>
        </ul>
      
      
      

        </nav>
     
     </div>
        
      
        
        
		
            <section id="two">
                <div class="inner">
                    <header class="major">
                        <h2>Locate Your Nearest vehicle</h2>

                    </header>
                    <div id="map" style="height:800px;"></div>
                    <ul class="actions">
                        <!-- <li><a href="about.php" class="button next">Read more</a></li> -->
                    </ul>
                </div>
            </section>

        <!-- Main -->
        <div id="main">

            <!-- One -->
            <section id="one" class="tiles">
                <article>
                    <span class="image">
                        <img src="images/image-1.jpg" alt="" />
                    </span>
                    <header class="major">
                        <h3>Large: Premium</h3>

                        <p>PRICE FROM: <strong>$ 140.00</strong></p>

                        <p>Available vehicles: <br> <span>Opel Astra</span> | <span>Tesla Model S</span> | <span>Mazda
                                6</span></p>

                        <div class="major-actions">
                            <a href="#contact" class="button small next scrolly">Book now</a>
                        </div>
                    </header>
                </article>
                <article>
                    <span class="image">
                        <img src="images/image-2.jpg" alt="" />
                    </span>
                    <header class="major">
                        <h3>Large: Station wagon</h3>
                        <p>PRICE FROM: <strong>$ 120.00</strong></p>
                        <p>Available vehicles: <br> <span>Opel Astra</span> | <span>Tesla Model S</span> | <span>Mazda
                                6</span></p>

                        <div class="major-actions">
                            <a href="#contact" class="button small next scrolly">Book now</a>
                        </div>
                    </header>
                </article>
                <article>
                    <span class="image">
                        <img src="images/image-3.jpg" alt="" />
                    </span>
                    <header class="major">
                        <h3>Medium: Low emission</h3>
                        <p>PRICE FROM: <strong>$ 75.00</strong></p>
                        <p>Available vehicles: <br> <span>Opel Astra</span> | <span>Tesla Model S</span> | <span>Mazda
                                6</span></p>

                        <div class="major-actions">
                            <a href="#contact" class="button small next scrolly">Book now</a>
                        </div>
                    </header>
                </article>
                <article>
                    <span class="image">
                        <img src="images/image-4.jpg" alt="" />
                    </span>
                    <header class="major">
                        <h3>Small: Economy</h3>
                        <p>PRICE FROM: <strong>$ 65.00</strong></p>
                        <p>Available vehicles: <br> <span>Opel Astra</span> | <span>Tesla Model S</span> | <span>Mazda
                                6</span></p>

                        <div class="major-actions">
                            <a href="#contact" class="button small next scrolly">Book now</a>
                        </div>
                    </header>
                </article>
                <article>
                    <span class="image">
                        <img src="images/image-5.jpg" alt="" />
                    </span>
                    <header class="major">
                        <h3>Small: Mini</h3>
                        <p>PRICE FROM: <strong>$ 55.00</strong></p>
                        <p>Available vehicles: <br> <span>Opel Astra</span> | <span>Tesla Model S</span> | <span>Mazda
                                6</span></p>

                        <div class="major-actions">
                            <a href="#contact" class="button small next scrolly">Book now</a>
                        </div>
                    </header>
                </article>
                <article>
                    <span class="image">
                        <img src="images/image-6.jpg" alt="" />
                    </span>
                    <header class="major">
                        <h3>Small: Mini Low emission</h3>
                        <p>PRICE FROM: <strong>$ 49.00</strong></p>
                        <p>Available vehicles: <br> <span>Opel Astra</span> | <span>Tesla Model S</span> | <span>Mazda
                                6</span></p>

                        <div class="major-actions">
                            <a href="#contact" class="button small next scrolly">Book now</a>
                        </div>
                    </header>
                </article>
            </section>

            <!-- Two -->
            <section id="two">
                <div class="inner">
                    <header class="major">
                        <h2>About us</h2>
                    </header>
                    <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna
                        magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna.
                        Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem
                        consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus
                        amet pharetra et feugiat tempus.</p>
                    <ul class="actions">
                        <li><a href="about.php" class="button next">Read more</a></li>
                    </ul>
                </div>
            </section>



        </div>

        <!-- inquiry -->
        <section id="contact">
            <div class="inner">
                <section>
                    <header class="major">
                        <h2>Book now</h2>
                    </header>

                    <form method="post" action="#">
                        <div class="fields">
                            <div class="field half">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" />
                            </div>

                            <div class="field half">
                                <label for="vehicle-type">Select Vehicle Type</label>

                                <select name="vehicle-type" id="vehicle-type">
                                    <option value="">- Vehicle Type -</option>
                                    <option value="1">Large: Premium</option>
                                    <option value="2">Large: Station wagon</option>
                                    <option value="3">Medium: Low emission</option>
                                    <option value="4">Small: Economy</option>
                                    <option value="5">Small: Mini</option>
                                    <option value="6">Small: Mini Low emission</option>
                                </select>
                            </div>

                            <div class="field half">
                                <label for="date-from">Date from</label>
                                <input type="text" name="date-from" id="date-from" />
                            </div>

                            <div class="field half">
                                <label for="date-to">Date to</label>
                                <input type="text" name="date-to" id="date-to" />
                            </div>

                            <div class="field">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" />
                            </div>

                            <div class="field half">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" />
                            </div>

                            <div class="field half">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" />
                            </div>

                            <div class="field">
                                <label for="message">Comment</label>
                                <textarea name="message" id="message" rows="3"></textarea>
                            </div>

                            <div class="field half">
                                <label for="captcha">Captcha</label>
                                <input type="text" name="captcha" id="captcha" />
                            </div>

                            <div class="field half text-right">
                                <label>&nbsp;</label>

                                <ul class="actions">
                                    <li><input type="submit" value="Send" class="primary" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
                <section class="split">
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-envelope"></span>
                            <h3>Email</h3>
                            <a href="#">carrentalwebsite@untitled.tld</a>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-phone"></span>
                            <h3>Phone</h3>
                            <span>(000) 000-0000 x12387</span>
                            <br>
                            <span>(000) 000-0000 x12387</span>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-home"></span>
                            <h3>Address</h3>
                            <span>1234 Somewhere Road #5432<br />
                                Melbourne, TN 00000<br />
                                Australia</span>
                        </div>
                    </section>
                    <section>
                        <h3>Terms</h3>

                        <div class="box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam quasi molestiae quo
                                repudiandae repellat dolore impedit alias soluta, excepturi aperiam aliquid numquam
                                dignissimos nulla exercitationem vel, fuga accusamus voluptate, ipsa quia. Possimus odit
                                ipsam deleniti nisi soluta voluptas! Nemo aperiam dignissimos, nisi. Necessitatibus cum
                                quos dolor incidunt! Ab voluptatum sapiente voluptas fuga in rem voluptatibus rerum
                                ipsam eos dolorem aspernatur saepe incidunt provident nihil, quos ad perspiciatis est
                                voluptatem commodi. Repellat dolores, ipsam facere ipsum, cumque deleniti perferendis
                                delectus consequatur harum fuga et architecto vitae neque suscipit. Aut vero architecto
                                non maxime molestiae autem dolores, corporis, molestias esse voluptatum nobis error
                                minima deserunt provident consectetur. Qui, ipsa assumenda voluptatum asperiores
                                laudantium nobis harum sint quis sed quia, officiis odit eaque a! Quos provident eos
                                earum facilis nam consequuntur reiciendis amet sunt? Quia, quasi sunt. Aliquam labore
                                vitae, officiis ullam itaque. Id non est earum praesentium incidunt officia quos modi at
                                suscipit quibusdam. Id nostrum beatae ea atque, fugiat mollitia, eius, sed eos quidem
                                itaque inventore hic reiciendis quas doloremque illum. Enim eum labore odio alias.
                                Consectetur molestias, suscipit, animi amet enim eius, voluptates nulla sapiente earum
                                tenetur explicabo iusto ad officiis! Praesentium minus illo saepe voluptatibus
                                obcaecati, excepturi, sit nam quaerat ab velit deserunt tenetur magni quae temporibus!
                                Iusto sapiente iste eos, ipsa dolores obcaecati voluptas commodi, nesciunt officiis at
                                quis magni quos, ducimus ad. Minus dicta blanditiis voluptatum ipsa, voluptatem sequi
                                eligendi nam est possimus libero aliquam, eos provident repellendus dolores. Distinctio
                                corrupti ea ipsam, dolore, dolorem similique eos illo iure ad maxime, cumque doloribus
                                iusto expedita quidem accusantium cum, voluptatibus ducimus! Neque eos cupiditate at
                                molestias sequi enim! Amet nesciunt dolorem quisquam sunt ad quos fugit at alias
                                distinctio nihil nostrum, itaque a repudiandae soluta dicta quasi, repellat quidem
                                autem. Architecto, esse porro iure repellat sed. Quidem?</p>
                        </div>
                    </section>
                </section>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <ul class="icons">
                    <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon alt fa-pinterest"><span class="label">Pinterest</span></a></li>
                    <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon alt fa-google-plus"><span class="label">Google plus</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; 2018 <a href="#">Car Rental Company Ltd</a> | All rights reserved.</li>
                    <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
                </ul>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>



    <style>
    /*!
 *  Font Awesome 4.7.0 by @davegandy - http://fontawesome.io - @fontawesome
 *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
 */
    @font-face {
        font-family: 'FontAwesome';
        src: url('../fonts/fontawesome-webfont.eot?v=4.7.0');
        src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('../fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
        font-weight: normal;
        font-style: normal
    }

    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale
    }

    .fa-lg {
        font-size: 1.33333333em;
        line-height: .75em;
        vertical-align: -15%
    }

    .fa-2x {
        font-size: 2em
    }

    .fa-3x {
        font-size: 3em
    }

    .fa-4x {
        font-size: 4em
    }

    .fa-5x {
        font-size: 5em
    }

    .fa-fw {
        width: 1.28571429em;
        text-align: center
    }

    .fa-ul {
        padding-left: 0;
        margin-left: 2.14285714em;
        list-style-type: none
    }

    .fa-ul>li {
        position: relative
    }

    .fa-li {
        position: absolute;
        left: -2.14285714em;
        width: 2.14285714em;
        top: .14285714em;
        text-align: center
    }

    .fa-li.fa-lg {
        left: -1.85714286em
    }

    .fa-border {
        padding: .2em .25em .15em;
        border: solid .08em #eee;
        border-radius: .1em
    }

    .fa-pull-left {
        float: left
    }

    .fa-pull-right {
        float: right
    }

    .fa.fa-pull-left {
        margin-right: .3em
    }

    .fa.fa-pull-right {
        margin-left: .3em
    }

    .pull-right {
        float: right
    }

    .pull-left {
        float: left
    }

    .fa.pull-left {
        margin-right: .3em
    }

    .fa.pull-right {
        margin-left: .3em
    }

    .fa-spin {
        -webkit-animation: fa-spin 2s infinite linear;
        animation: fa-spin 2s infinite linear
    }

    .fa-pulse {
        -webkit-animation: fa-spin 1s infinite steps(8);
        animation: fa-spin 1s infinite steps(8)
    }

    @-webkit-keyframes fa-spin {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    @keyframes fa-spin {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    .fa-rotate-90 {
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .fa-rotate-180 {
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .fa-rotate-270 {
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
        -webkit-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        transform: rotate(270deg)
    }

    .fa-flip-horizontal {
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
        -webkit-transform: scale(-1, 1);
        -ms-transform: scale(-1, 1);
        transform: scale(-1, 1)
    }

    .fa-flip-vertical {
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
        -webkit-transform: scale(1, -1);
        -ms-transform: scale(1, -1);
        transform: scale(1, -1)
    }

    :root .fa-rotate-90,
    :root .fa-rotate-180,
    :root .fa-rotate-270,
    :root .fa-flip-horizontal,
    :root .fa-flip-vertical {
        filter: none
    }

    .fa-stack {
        position: relative;
        display: inline-block;
        width: 2em;
        height: 2em;
        line-height: 2em;
        vertical-align: middle
    }

    .fa-stack-1x,
    .fa-stack-2x {
        position: absolute;
        left: 0;
        width: 100%;
        text-align: center
    }

    .fa-stack-1x {
        line-height: inherit
    }

    .fa-stack-2x {
        font-size: 2em
    }

    .fa-inverse {
        color: #fff
    }

    .fa-glass:before {
        content: "\f000"
    }

    .fa-music:before {
        content: "\f001"
    }

    .fa-search:before {
        content: "\f002"
    }

    .fa-envelope-o:before {
        content: "\f003"
    }

    .fa-heart:before {
        content: "\f004"
    }

    .fa-star:before {
        content: "\f005"
    }

    .fa-star-o:before {
        content: "\f006"
    }

    .fa-user:before {
        content: "\f007"
    }

    .fa-film:before {
        content: "\f008"
    }

    .fa-th-large:before {
        content: "\f009"
    }

    .fa-th:before {
        content: "\f00a"
    }

    .fa-th-list:before {
        content: "\f00b"
    }

    .fa-check:before {
        content: "\f00c"
    }

    .fa-remove:before,
    .fa-close:before,
    .fa-times:before {
        content: "\f00d"
    }

    .fa-search-plus:before {
        content: "\f00e"
    }

    .fa-search-minus:before {
        content: "\f010"
    }

    .fa-power-off:before {
        content: "\f011"
    }

    .fa-signal:before {
        content: "\f012"
    }

    .fa-gear:before,
    .fa-cog:before {
        content: "\f013"
    }

    .fa-trash-o:before {
        content: "\f014"
    }

    .fa-home:before {
        content: "\f015"
    }

    .fa-file-o:before {
        content: "\f016"
    }

    .fa-clock-o:before {
        content: "\f017"
    }

    .fa-road:before {
        content: "\f018"
    }

    .fa-download:before {
        content: "\f019"
    }

    .fa-arrow-circle-o-down:before {
        content: "\f01a"
    }

    .fa-arrow-circle-o-up:before {
        content: "\f01b"
    }

    .fa-inbox:before {
        content: "\f01c"
    }

    .fa-play-circle-o:before {
        content: "\f01d"
    }

    .fa-rotate-right:before,
    .fa-repeat:before {
        content: "\f01e"
    }

    .fa-refresh:before {
        content: "\f021"
    }

    .fa-list-alt:before {
        content: "\f022"
    }

    .fa-lock:before {
        content: "\f023"
    }

    .fa-flag:before {
        content: "\f024"
    }

    .fa-headphones:before {
        content: "\f025"
    }

    .fa-volume-off:before {
        content: "\f026"
    }

    .fa-volume-down:before {
        content: "\f027"
    }

    .fa-volume-up:before {
        content: "\f028"
    }

    .fa-qrcode:before {
        content: "\f029"
    }

    .fa-barcode:before {
        content: "\f02a"
    }

    .fa-tag:before {
        content: "\f02b"
    }

    .fa-tags:before {
        content: "\f02c"
    }

    .fa-book:before {
        content: "\f02d"
    }

    .fa-bookmark:before {
        content: "\f02e"
    }

    .fa-print:before {
        content: "\f02f"
    }

    .fa-camera:before {
        content: "\f030"
    }

    .fa-font:before {
        content: "\f031"
    }

    .fa-bold:before {
        content: "\f032"
    }

    .fa-italic:before {
        content: "\f033"
    }

    .fa-text-height:before {
        content: "\f034"
    }

    .fa-text-width:before {
        content: "\f035"
    }

    .fa-align-left:before {
        content: "\f036"
    }

    .fa-align-center:before {
        content: "\f037"
    }

    .fa-align-right:before {
        content: "\f038"
    }

    .fa-align-justify:before {
        content: "\f039"
    }

    .fa-list:before {
        content: "\f03a"
    }

    .fa-dedent:before,
    .fa-outdent:before {
        content: "\f03b"
    }

    .fa-indent:before {
        content: "\f03c"
    }

    .fa-video-camera:before {
        content: "\f03d"
    }

    .fa-photo:before,
    .fa-image:before,
    .fa-picture-o:before {
        content: "\f03e"
    }

    .fa-pencil:before {
        content: "\f040"
    }

    .fa-map-marker:before {
        content: "\f041"
    }

    .fa-adjust:before {
        content: "\f042"
    }

    .fa-tint:before {
        content: "\f043"
    }

    .fa-edit:before,
    .fa-pencil-square-o:before {
        content: "\f044"
    }

    .fa-share-square-o:before {
        content: "\f045"
    }

    .fa-check-square-o:before {
        content: "\f046"
    }

    .fa-arrows:before {
        content: "\f047"
    }

    .fa-step-backward:before {
        content: "\f048"
    }

    .fa-fast-backward:before {
        content: "\f049"
    }

    .fa-backward:before {
        content: "\f04a"
    }

    .fa-play:before {
        content: "\f04b"
    }

    .fa-pause:before {
        content: "\f04c"
    }

    .fa-stop:before {
        content: "\f04d"
    }

    .fa-forward:before {
        content: "\f04e"
    }

    .fa-fast-forward:before {
        content: "\f050"
    }

    .fa-step-forward:before {
        content: "\f051"
    }

    .fa-eject:before {
        content: "\f052"
    }

    .fa-chevron-left:before {
        content: "\f053"
    }

    .fa-chevron-right:before {
        content: "\f054"
    }

    .fa-plus-circle:before {
        content: "\f055"
    }

    .fa-minus-circle:before {
        content: "\f056"
    }

    .fa-times-circle:before {
        content: "\f057"
    }

    .fa-check-circle:before {
        content: "\f058"
    }

    .fa-question-circle:before {
        content: "\f059"
    }

    .fa-info-circle:before {
        content: "\f05a"
    }

    .fa-crosshairs:before {
        content: "\f05b"
    }

    .fa-times-circle-o:before {
        content: "\f05c"
    }

    .fa-check-circle-o:before {
        content: "\f05d"
    }

    .fa-ban:before {
        content: "\f05e"
    }

    .fa-arrow-left:before {
        content: "\f060"
    }

    .fa-arrow-right:before {
        content: "\f061"
    }

    .fa-arrow-up:before {
        content: "\f062"
    }

    .fa-arrow-down:before {
        content: "\f063"
    }

    .fa-mail-forward:before,
    .fa-share:before {
        content: "\f064"
    }

    .fa-expand:before {
        content: "\f065"
    }

    .fa-compress:before {
        content: "\f066"
    }

    .fa-plus:before {
        content: "\f067"
    }

    .fa-minus:before {
        content: "\f068"
    }

    .fa-asterisk:before {
        content: "\f069"
    }

    .fa-exclamation-circle:before {
        content: "\f06a"
    }

    .fa-gift:before {
        content: "\f06b"
    }

    .fa-leaf:before {
        content: "\f06c"
    }

    .fa-fire:before {
        content: "\f06d"
    }

    .fa-eye:before {
        content: "\f06e"
    }

    .fa-eye-slash:before {
        content: "\f070"
    }

    .fa-warning:before,
    .fa-exclamation-triangle:before {
        content: "\f071"
    }

    .fa-plane:before {
        content: "\f072"
    }

    .fa-calendar:before {
        content: "\f073"
    }

    .fa-random:before {
        content: "\f074"
    }

    .fa-comment:before {
        content: "\f075"
    }

    .fa-magnet:before {
        content: "\f076"
    }

    .fa-chevron-up:before {
        content: "\f077"
    }

    .fa-chevron-down:before {
        content: "\f078"
    }

    .fa-retweet:before {
        content: "\f079"
    }

    .fa-shopping-cart:before {
        content: "\f07a"
    }

    .fa-folder:before {
        content: "\f07b"
    }

    .fa-folder-open:before {
        content: "\f07c"
    }

    .fa-arrows-v:before {
        content: "\f07d"
    }

    .fa-arrows-h:before {
        content: "\f07e"
    }

    .fa-bar-chart-o:before,
    .fa-bar-chart:before {
        content: "\f080"
    }

    .fa-twitter-square:before {
        content: "\f081"
    }

    .fa-facebook-square:before {
        content: "\f082"
    }

    .fa-camera-retro:before {
        content: "\f083"
    }

    .fa-key:before {
        content: "\f084"
    }

    .fa-gears:before,
    .fa-cogs:before {
        content: "\f085"
    }

    .fa-comments:before {
        content: "\f086"
    }

    .fa-thumbs-o-up:before {
        content: "\f087"
    }

    .fa-thumbs-o-down:before {
        content: "\f088"
    }

    .fa-star-half:before {
        content: "\f089"
    }

    .fa-heart-o:before {
        content: "\f08a"
    }

    .fa-sign-out:before {
        content: "\f08b"
    }

    .fa-linkedin-square:before {
        content: "\f08c"
    }

    .fa-thumb-tack:before {
        content: "\f08d"
    }

    .fa-external-link:before {
        content: "\f08e"
    }

    .fa-sign-in:before {
        content: "\f090"
    }

    .fa-trophy:before {
        content: "\f091"
    }

    .fa-github-square:before {
        content: "\f092"
    }

    .fa-upload:before {
        content: "\f093"
    }

    .fa-lemon-o:before {
        content: "\f094"
    }

    .fa-phone:before {
        content: "\f095"
    }

    .fa-square-o:before {
        content: "\f096"
    }

    .fa-bookmark-o:before {
        content: "\f097"
    }

    .fa-phone-square:before {
        content: "\f098"
    }

    .fa-twitter:before {
        content: "\f099"
    }

    .fa-facebook-f:before,
    .fa-facebook:before {
        content: "\f09a"
    }

    .fa-github:before {
        content: "\f09b"
    }

    .fa-unlock:before {
        content: "\f09c"
    }

    .fa-credit-card:before {
        content: "\f09d"
    }

    .fa-feed:before,
    .fa-rss:before {
        content: "\f09e"
    }

    .fa-hdd-o:before {
        content: "\f0a0"
    }

    .fa-bullhorn:before {
        content: "\f0a1"
    }

    .fa-bell:before {
        content: "\f0f3"
    }

    .fa-certificate:before {
        content: "\f0a3"
    }

    .fa-hand-o-right:before {
        content: "\f0a4"
    }

    .fa-hand-o-left:before {
        content: "\f0a5"
    }

    .fa-hand-o-up:before {
        content: "\f0a6"
    }

    .fa-hand-o-down:before {
        content: "\f0a7"
    }

    .fa-arrow-circle-left:before {
        content: "\f0a8"
    }

    .fa-arrow-circle-right:before {
        content: "\f0a9"
    }

    .fa-arrow-circle-up:before {
        content: "\f0aa"
    }

    .fa-arrow-circle-down:before {
        content: "\f0ab"
    }

    .fa-globe:before {
        content: "\f0ac"
    }

    .fa-wrench:before {
        content: "\f0ad"
    }

    .fa-tasks:before {
        content: "\f0ae"
    }

    .fa-filter:before {
        content: "\f0b0"
    }

    .fa-briefcase:before {
        content: "\f0b1"
    }

    .fa-arrows-alt:before {
        content: "\f0b2"
    }

    .fa-group:before,
    .fa-users:before {
        content: "\f0c0"
    }

    .fa-chain:before,
    .fa-link:before {
        content: "\f0c1"
    }

    .fa-cloud:before {
        content: "\f0c2"
    }

    .fa-flask:before {
        content: "\f0c3"
    }

    .fa-cut:before,
    .fa-scissors:before {
        content: "\f0c4"
    }

    .fa-copy:before,
    .fa-files-o:before {
        content: "\f0c5"
    }

    .fa-paperclip:before {
        content: "\f0c6"
    }

    .fa-save:before,
    .fa-floppy-o:before {
        content: "\f0c7"
    }

    .fa-square:before {
        content: "\f0c8"
    }

    .fa-navicon:before,
    .fa-reorder:before,
    .fa-bars:before {
        content: "\f0c9"
    }

    .fa-list-ul:before {
        content: "\f0ca"
    }

    .fa-list-ol:before {
        content: "\f0cb"
    }

    .fa-strikethrough:before {
        content: "\f0cc"
    }

    .fa-underline:before {
        content: "\f0cd"
    }

    .fa-table:before {
        content: "\f0ce"
    }

    .fa-magic:before {
        content: "\f0d0"
    }

    .fa-truck:before {
        content: "\f0d1"
    }

    .fa-pinterest:before {
        content: "\f0d2"
    }

    .fa-pinterest-square:before {
        content: "\f0d3"
    }

    .fa-google-plus-square:before {
        content: "\f0d4"
    }

    .fa-google-plus:before {
        content: "\f0d5"
    }

    .fa-money:before {
        content: "\f0d6"
    }

    .fa-caret-down:before {
        content: "\f0d7"
    }

    .fa-caret-up:before {
        content: "\f0d8"
    }

    .fa-caret-left:before {
        content: "\f0d9"
    }

    .fa-caret-right:before {
        content: "\f0da"
    }

    .fa-columns:before {
        content: "\f0db"
    }

    .fa-unsorted:before,
    .fa-sort:before {
        content: "\f0dc"
    }

    .fa-sort-down:before,
    .fa-sort-desc:before {
        content: "\f0dd"
    }

    .fa-sort-up:before,
    .fa-sort-asc:before {
        content: "\f0de"
    }

    .fa-envelope:before {
        content: "\f0e0"
    }

    .fa-linkedin:before {
        content: "\f0e1"
    }

    .fa-rotate-left:before,
    .fa-undo:before {
        content: "\f0e2"
    }

    .fa-legal:before,
    .fa-gavel:before {
        content: "\f0e3"
    }

    .fa-dashboard:before,
    .fa-tachometer:before {
        content: "\f0e4"
    }

    .fa-comment-o:before {
        content: "\f0e5"
    }

    .fa-comments-o:before {
        content: "\f0e6"
    }

    .fa-flash:before,
    .fa-bolt:before {
        content: "\f0e7"
    }

    .fa-sitemap:before {
        content: "\f0e8"
    }

    .fa-umbrella:before {
        content: "\f0e9"
    }

    .fa-paste:before,
    .fa-clipboard:before {
        content: "\f0ea"
    }

    .fa-lightbulb-o:before {
        content: "\f0eb"
    }

    .fa-exchange:before {
        content: "\f0ec"
    }

    .fa-cloud-download:before {
        content: "\f0ed"
    }

    .fa-cloud-upload:before {
        content: "\f0ee"
    }

    .fa-user-md:before {
        content: "\f0f0"
    }

    .fa-stethoscope:before {
        content: "\f0f1"
    }

    .fa-suitcase:before {
        content: "\f0f2"
    }

    .fa-bell-o:before {
        content: "\f0a2"
    }

    .fa-coffee:before {
        content: "\f0f4"
    }

    .fa-cutlery:before {
        content: "\f0f5"
    }

    .fa-file-text-o:before {
        content: "\f0f6"
    }

    .fa-building-o:before {
        content: "\f0f7"
    }

    .fa-hospital-o:before {
        content: "\f0f8"
    }

    .fa-ambulance:before {
        content: "\f0f9"
    }

    .fa-medkit:before {
        content: "\f0fa"
    }

    .fa-fighter-jet:before {
        content: "\f0fb"
    }

    .fa-beer:before {
        content: "\f0fc"
    }

    .fa-h-square:before {
        content: "\f0fd"
    }

    .fa-plus-square:before {
        content: "\f0fe"
    }

    .fa-angle-double-left:before {
        content: "\f100"
    }

    .fa-angle-double-right:before {
        content: "\f101"
    }

    .fa-angle-double-up:before {
        content: "\f102"
    }

    .fa-angle-double-down:before {
        content: "\f103"
    }

    .fa-angle-left:before {
        content: "\f104"
    }

    .fa-angle-right:before {
        content: "\f105"
    }

    .fa-angle-up:before {
        content: "\f106"
    }

    .fa-angle-down:before {
        content: "\f107"
    }

    .fa-desktop:before {
        content: "\f108"
    }

    .fa-laptop:before {
        content: "\f109"
    }

    .fa-tablet:before {
        content: "\f10a"
    }

    .fa-mobile-phone:before,
    .fa-mobile:before {
        content: "\f10b"
    }

    .fa-circle-o:before {
        content: "\f10c"
    }

    .fa-quote-left:before {
        content: "\f10d"
    }

    .fa-quote-right:before {
        content: "\f10e"
    }

    .fa-spinner:before {
        content: "\f110"
    }

    .fa-circle:before {
        content: "\f111"
    }

    .fa-mail-reply:before,
    .fa-reply:before {
        content: "\f112"
    }

    .fa-github-alt:before {
        content: "\f113"
    }

    .fa-folder-o:before {
        content: "\f114"
    }

    .fa-folder-open-o:before {
        content: "\f115"
    }

    .fa-smile-o:before {
        content: "\f118"
    }

    .fa-frown-o:before {
        content: "\f119"
    }

    .fa-meh-o:before {
        content: "\f11a"
    }

    .fa-gamepad:before {
        content: "\f11b"
    }

    .fa-keyboard-o:before {
        content: "\f11c"
    }

    .fa-flag-o:before {
        content: "\f11d"
    }

    .fa-flag-checkered:before {
        content: "\f11e"
    }

    .fa-terminal:before {
        content: "\f120"
    }

    .fa-code:before {
        content: "\f121"
    }

    .fa-mail-reply-all:before,
    .fa-reply-all:before {
        content: "\f122"
    }

    .fa-star-half-empty:before,
    .fa-star-half-full:before,
    .fa-star-half-o:before {
        content: "\f123"
    }

    .fa-location-arrow:before {
        content: "\f124"
    }

    .fa-crop:before {
        content: "\f125"
    }

    .fa-code-fork:before {
        content: "\f126"
    }

    .fa-unlink:before,
    .fa-chain-broken:before {
        content: "\f127"
    }

    .fa-question:before {
        content: "\f128"
    }

    .fa-info:before {
        content: "\f129"
    }

    .fa-exclamation:before {
        content: "\f12a"
    }

    .fa-superscript:before {
        content: "\f12b"
    }

    .fa-subscript:before {
        content: "\f12c"
    }

    .fa-eraser:before {
        content: "\f12d"
    }

    .fa-puzzle-piece:before {
        content: "\f12e"
    }

    .fa-microphone:before {
        content: "\f130"
    }

    .fa-microphone-slash:before {
        content: "\f131"
    }

    .fa-shield:before {
        content: "\f132"
    }

    .fa-calendar-o:before {
        content: "\f133"
    }

    .fa-fire-extinguisher:before {
        content: "\f134"
    }

    .fa-rocket:before {
        content: "\f135"
    }

    .fa-maxcdn:before {
        content: "\f136"
    }

    .fa-chevron-circle-left:before {
        content: "\f137"
    }

    .fa-chevron-circle-right:before {
        content: "\f138"
    }

    .fa-chevron-circle-up:before {
        content: "\f139"
    }

    .fa-chevron-circle-down:before {
        content: "\f13a"
    }

    .fa-html5:before {
        content: "\f13b"
    }

    .fa-css3:before {
        content: "\f13c"
    }

    .fa-anchor:before {
        content: "\f13d"
    }

    .fa-unlock-alt:before {
        content: "\f13e"
    }

    .fa-bullseye:before {
        content: "\f140"
    }

    .fa-ellipsis-h:before {
        content: "\f141"
    }

    .fa-ellipsis-v:before {
        content: "\f142"
    }

    .fa-rss-square:before {
        content: "\f143"
    }

    .fa-play-circle:before {
        content: "\f144"
    }

    .fa-ticket:before {
        content: "\f145"
    }

    .fa-minus-square:before {
        content: "\f146"
    }

    .fa-minus-square-o:before {
        content: "\f147"
    }

    .fa-level-up:before {
        content: "\f148"
    }

    .fa-level-down:before {
        content: "\f149"
    }

    .fa-check-square:before {
        content: "\f14a"
    }

    .fa-pencil-square:before {
        content: "\f14b"
    }

    .fa-external-link-square:before {
        content: "\f14c"
    }

    .fa-share-square:before {
        content: "\f14d"
    }

    .fa-compass:before {
        content: "\f14e"
    }

    .fa-toggle-down:before,
    .fa-caret-square-o-down:before {
        content: "\f150"
    }

    .fa-toggle-up:before,
    .fa-caret-square-o-up:before {
        content: "\f151"
    }

    .fa-toggle-right:before,
    .fa-caret-square-o-right:before {
        content: "\f152"
    }

    .fa-euro:before,
    .fa-eur:before {
        content: "\f153"
    }

    .fa-gbp:before {
        content: "\f154"
    }

    .fa-dollar:before,
    .fa-usd:before {
        content: "\f155"
    }

    .fa-rupee:before,
    .fa-inr:before {
        content: "\f156"
    }

    .fa-cny:before,
    .fa-rmb:before,
    .fa-yen:before,
    .fa-jpy:before {
        content: "\f157"
    }

    .fa-ruble:before,
    .fa-rouble:before,
    .fa-rub:before {
        content: "\f158"
    }

    .fa-won:before,
    .fa-krw:before {
        content: "\f159"
    }

    .fa-bitcoin:before,
    .fa-btc:before {
        content: "\f15a"
    }

    .fa-file:before {
        content: "\f15b"
    }

    .fa-file-text:before {
        content: "\f15c"
    }

    .fa-sort-alpha-asc:before {
        content: "\f15d"
    }

    .fa-sort-alpha-desc:before {
        content: "\f15e"
    }

    .fa-sort-amount-asc:before {
        content: "\f160"
    }

    .fa-sort-amount-desc:before {
        content: "\f161"
    }

    .fa-sort-numeric-asc:before {
        content: "\f162"
    }

    .fa-sort-numeric-desc:before {
        content: "\f163"
    }

    .fa-thumbs-up:before {
        content: "\f164"
    }

    .fa-thumbs-down:before {
        content: "\f165"
    }

    .fa-youtube-square:before {
        content: "\f166"
    }

    .fa-youtube:before {
        content: "\f167"
    }

    .fa-xing:before {
        content: "\f168"
    }

    .fa-xing-square:before {
        content: "\f169"
    }

    .fa-youtube-play:before {
        content: "\f16a"
    }

    .fa-dropbox:before {
        content: "\f16b"
    }

    .fa-stack-overflow:before {
        content: "\f16c"
    }

    .fa-instagram:before {
        content: "\f16d"
    }

    .fa-flickr:before {
        content: "\f16e"
    }

    .fa-adn:before {
        content: "\f170"
    }

    .fa-bitbucket:before {
        content: "\f171"
    }

    .fa-bitbucket-square:before {
        content: "\f172"
    }

    .fa-tumblr:before {
        content: "\f173"
    }

    .fa-tumblr-square:before {
        content: "\f174"
    }

    .fa-long-arrow-down:before {
        content: "\f175"
    }

    .fa-long-arrow-up:before {
        content: "\f176"
    }

    .fa-long-arrow-left:before {
        content: "\f177"
    }

    .fa-long-arrow-right:before {
        content: "\f178"
    }

    .fa-apple:before {
        content: "\f179"
    }

    .fa-windows:before {
        content: "\f17a"
    }

    .fa-android:before {
        content: "\f17b"
    }

    .fa-linux:before {
        content: "\f17c"
    }

    .fa-dribbble:before {
        content: "\f17d"
    }

    .fa-skype:before {
        content: "\f17e"
    }

    .fa-foursquare:before {
        content: "\f180"
    }

    .fa-trello:before {
        content: "\f181"
    }

    .fa-female:before {
        content: "\f182"
    }

    .fa-male:before {
        content: "\f183"
    }

    .fa-gittip:before,
    .fa-gratipay:before {
        content: "\f184"
    }

    .fa-sun-o:before {
        content: "\f185"
    }

    .fa-moon-o:before {
        content: "\f186"
    }

    .fa-archive:before {
        content: "\f187"
    }

    .fa-bug:before {
        content: "\f188"
    }

    .fa-vk:before {
        content: "\f189"
    }

    .fa-weibo:before {
        content: "\f18a"
    }

    .fa-renren:before {
        content: "\f18b"
    }

    .fa-pagelines:before {
        content: "\f18c"
    }

    .fa-stack-exchange:before {
        content: "\f18d"
    }

    .fa-arrow-circle-o-right:before {
        content: "\f18e"
    }

    .fa-arrow-circle-o-left:before {
        content: "\f190"
    }

    .fa-toggle-left:before,
    .fa-caret-square-o-left:before {
        content: "\f191"
    }

    .fa-dot-circle-o:before {
        content: "\f192"
    }

    .fa-wheelchair:before {
        content: "\f193"
    }

    .fa-vimeo-square:before {
        content: "\f194"
    }

    .fa-turkish-lira:before,
    .fa-try:before {
        content: "\f195"
    }

    .fa-plus-square-o:before {
        content: "\f196"
    }

    .fa-space-shuttle:before {
        content: "\f197"
    }

    .fa-slack:before {
        content: "\f198"
    }

    .fa-envelope-square:before {
        content: "\f199"
    }

    .fa-wordpress:before {
        content: "\f19a"
    }

    .fa-openid:before {
        content: "\f19b"
    }

    .fa-institution:before,
    .fa-bank:before,
    .fa-university:before {
        content: "\f19c"
    }

    .fa-mortar-board:before,
    .fa-graduation-cap:before {
        content: "\f19d"
    }

    .fa-yahoo:before {
        content: "\f19e"
    }

    .fa-google:before {
        content: "\f1a0"
    }

    .fa-reddit:before {
        content: "\f1a1"
    }

    .fa-reddit-square:before {
        content: "\f1a2"
    }

    .fa-stumbleupon-circle:before {
        content: "\f1a3"
    }

    .fa-stumbleupon:before {
        content: "\f1a4"
    }

    .fa-delicious:before {
        content: "\f1a5"
    }

    .fa-digg:before {
        content: "\f1a6"
    }

    .fa-pied-piper-pp:before {
        content: "\f1a7"
    }

    .fa-pied-piper-alt:before {
        content: "\f1a8"
    }

    .fa-drupal:before {
        content: "\f1a9"
    }

    .fa-joomla:before {
        content: "\f1aa"
    }

    .fa-language:before {
        content: "\f1ab"
    }

    .fa-fax:before {
        content: "\f1ac"
    }

    .fa-building:before {
        content: "\f1ad"
    }

    .fa-child:before {
        content: "\f1ae"
    }

    .fa-paw:before {
        content: "\f1b0"
    }

    .fa-spoon:before {
        content: "\f1b1"
    }

    .fa-cube:before {
        content: "\f1b2"
    }

    .fa-cubes:before {
        content: "\f1b3"
    }

    .fa-behance:before {
        content: "\f1b4"
    }

    .fa-behance-square:before {
        content: "\f1b5"
    }

    .fa-steam:before {
        content: "\f1b6"
    }

    .fa-steam-square:before {
        content: "\f1b7"
    }

    .fa-recycle:before {
        content: "\f1b8"
    }

    .fa-automobile:before,
    .fa-car:before {
        content: "\f1b9"
    }

    .fa-cab:before,
    .fa-taxi:before {
        content: "\f1ba"
    }

    .fa-tree:before {
        content: "\f1bb"
    }

    .fa-spotify:before {
        content: "\f1bc"
    }

    .fa-deviantart:before {
        content: "\f1bd"
    }

    .fa-soundcloud:before {
        content: "\f1be"
    }

    .fa-database:before {
        content: "\f1c0"
    }

    .fa-file-pdf-o:before {
        content: "\f1c1"
    }

    .fa-file-word-o:before {
        content: "\f1c2"
    }

    .fa-file-excel-o:before {
        content: "\f1c3"
    }

    .fa-file-powerpoint-o:before {
        content: "\f1c4"
    }

    .fa-file-photo-o:before,
    .fa-file-picture-o:before,
    .fa-file-image-o:before {
        content: "\f1c5"
    }

    .fa-file-zip-o:before,
    .fa-file-archive-o:before {
        content: "\f1c6"
    }

    .fa-file-sound-o:before,
    .fa-file-audio-o:before {
        content: "\f1c7"
    }

    .fa-file-movie-o:before,
    .fa-file-video-o:before {
        content: "\f1c8"
    }

    .fa-file-code-o:before {
        content: "\f1c9"
    }

    .fa-vine:before {
        content: "\f1ca"
    }

    .fa-codepen:before {
        content: "\f1cb"
    }

    .fa-jsfiddle:before {
        content: "\f1cc"
    }

    .fa-life-bouy:before,
    .fa-life-buoy:before,
    .fa-life-saver:before,
    .fa-support:before,
    .fa-life-ring:before {
        content: "\f1cd"
    }

    .fa-circle-o-notch:before {
        content: "\f1ce"
    }

    .fa-ra:before,
    .fa-resistance:before,
    .fa-rebel:before {
        content: "\f1d0"
    }

    .fa-ge:before,
    .fa-empire:before {
        content: "\f1d1"
    }

    .fa-git-square:before {
        content: "\f1d2"
    }

    .fa-git:before {
        content: "\f1d3"
    }

    .fa-y-combinator-square:before,
    .fa-yc-square:before,
    .fa-hacker-news:before {
        content: "\f1d4"
    }

    .fa-tencent-weibo:before {
        content: "\f1d5"
    }

    .fa-qq:before {
        content: "\f1d6"
    }

    .fa-wechat:before,
    .fa-weixin:before {
        content: "\f1d7"
    }

    .fa-send:before,
    .fa-paper-plane:before {
        content: "\f1d8"
    }

    .fa-send-o:before,
    .fa-paper-plane-o:before {
        content: "\f1d9"
    }

    .fa-history:before {
        content: "\f1da"
    }

    .fa-circle-thin:before {
        content: "\f1db"
    }

    .fa-header:before {
        content: "\f1dc"
    }

    .fa-paragraph:before {
        content: "\f1dd"
    }

    .fa-sliders:before {
        content: "\f1de"
    }

    .fa-share-alt:before {
        content: "\f1e0"
    }

    .fa-share-alt-square:before {
        content: "\f1e1"
    }

    .fa-bomb:before {
        content: "\f1e2"
    }

    .fa-soccer-ball-o:before,
    .fa-futbol-o:before {
        content: "\f1e3"
    }

    .fa-tty:before {
        content: "\f1e4"
    }

    .fa-binoculars:before {
        content: "\f1e5"
    }

    .fa-plug:before {
        content: "\f1e6"
    }

    .fa-slideshare:before {
        content: "\f1e7"
    }

    .fa-twitch:before {
        content: "\f1e8"
    }

    .fa-yelp:before {
        content: "\f1e9"
    }

    .fa-newspaper-o:before {
        content: "\f1ea"
    }

    .fa-wifi:before {
        content: "\f1eb"
    }

    .fa-calculator:before {
        content: "\f1ec"
    }

    .fa-paypal:before {
        content: "\f1ed"
    }

    .fa-google-wallet:before {
        content: "\f1ee"
    }

    .fa-cc-visa:before {
        content: "\f1f0"
    }

    .fa-cc-mastercard:before {
        content: "\f1f1"
    }

    .fa-cc-discover:before {
        content: "\f1f2"
    }

    .fa-cc-amex:before {
        content: "\f1f3"
    }

    .fa-cc-paypal:before {
        content: "\f1f4"
    }

    .fa-cc-stripe:before {
        content: "\f1f5"
    }

    .fa-bell-slash:before {
        content: "\f1f6"
    }

    .fa-bell-slash-o:before {
        content: "\f1f7"
    }

    .fa-trash:before {
        content: "\f1f8"
    }

    .fa-copyright:before {
        content: "\f1f9"
    }

    .fa-at:before {
        content: "\f1fa"
    }

    .fa-eyedropper:before {
        content: "\f1fb"
    }

    .fa-paint-brush:before {
        content: "\f1fc"
    }

    .fa-birthday-cake:before {
        content: "\f1fd"
    }

    .fa-area-chart:before {
        content: "\f1fe"
    }

    .fa-pie-chart:before {
        content: "\f200"
    }

    .fa-line-chart:before {
        content: "\f201"
    }

    .fa-lastfm:before {
        content: "\f202"
    }

    .fa-lastfm-square:before {
        content: "\f203"
    }

    .fa-toggle-off:before {
        content: "\f204"
    }

    .fa-toggle-on:before {
        content: "\f205"
    }

    .fa-bicycle:before {
        content: "\f206"
    }

    .fa-bus:before {
        content: "\f207"
    }

    .fa-ioxhost:before {
        content: "\f208"
    }

    .fa-angellist:before {
        content: "\f209"
    }

    .fa-cc:before {
        content: "\f20a"
    }

    .fa-shekel:before,
    .fa-sheqel:before,
    .fa-ils:before {
        content: "\f20b"
    }

    .fa-meanpath:before {
        content: "\f20c"
    }

    .fa-buysellads:before {
        content: "\f20d"
    }

    .fa-connectdevelop:before {
        content: "\f20e"
    }

    .fa-dashcube:before {
        content: "\f210"
    }

    .fa-forumbee:before {
        content: "\f211"
    }

    .fa-leanpub:before {
        content: "\f212"
    }

    .fa-sellsy:before {
        content: "\f213"
    }

    .fa-shirtsinbulk:before {
        content: "\f214"
    }

    .fa-simplybuilt:before {
        content: "\f215"
    }

    .fa-skyatlas:before {
        content: "\f216"
    }

    .fa-cart-plus:before {
        content: "\f217"
    }

    .fa-cart-arrow-down:before {
        content: "\f218"
    }

    .fa-diamond:before {
        content: "\f219"
    }

    .fa-ship:before {
        content: "\f21a"
    }

    .fa-user-secret:before {
        content: "\f21b"
    }

    .fa-motorcycle:before {
        content: "\f21c"
    }

    .fa-street-view:before {
        content: "\f21d"
    }

    .fa-heartbeat:before {
        content: "\f21e"
    }

    .fa-venus:before {
        content: "\f221"
    }

    .fa-mars:before {
        content: "\f222"
    }

    .fa-mercury:before {
        content: "\f223"
    }

    .fa-intersex:before,
    .fa-transgender:before {
        content: "\f224"
    }

    .fa-transgender-alt:before {
        content: "\f225"
    }

    .fa-venus-double:before {
        content: "\f226"
    }

    .fa-mars-double:before {
        content: "\f227"
    }

    .fa-venus-mars:before {
        content: "\f228"
    }

    .fa-mars-stroke:before {
        content: "\f229"
    }

    .fa-mars-stroke-v:before {
        content: "\f22a"
    }

    .fa-mars-stroke-h:before {
        content: "\f22b"
    }

    .fa-neuter:before {
        content: "\f22c"
    }

    .fa-genderless:before {
        content: "\f22d"
    }

    .fa-facebook-official:before {
        content: "\f230"
    }

    .fa-pinterest-p:before {
        content: "\f231"
    }

    .fa-whatsapp:before {
        content: "\f232"
    }

    .fa-server:before {
        content: "\f233"
    }

    .fa-user-plus:before {
        content: "\f234"
    }

    .fa-user-times:before {
        content: "\f235"
    }

    .fa-hotel:before,
    .fa-bed:before {
        content: "\f236"
    }

    .fa-viacoin:before {
        content: "\f237"
    }

    .fa-train:before {
        content: "\f238"
    }

    .fa-subway:before {
        content: "\f239"
    }

    .fa-medium:before {
        content: "\f23a"
    }

    .fa-yc:before,
    .fa-y-combinator:before {
        content: "\f23b"
    }

    .fa-optin-monster:before {
        content: "\f23c"
    }

    .fa-opencart:before {
        content: "\f23d"
    }

    .fa-expeditedssl:before {
        content: "\f23e"
    }

    .fa-battery-4:before,
    .fa-battery:before,
    .fa-battery-full:before {
        content: "\f240"
    }

    .fa-battery-3:before,
    .fa-battery-three-quarters:before {
        content: "\f241"
    }

    .fa-battery-2:before,
    .fa-battery-half:before {
        content: "\f242"
    }

    .fa-battery-1:before,
    .fa-battery-quarter:before {
        content: "\f243"
    }

    .fa-battery-0:before,
    .fa-battery-empty:before {
        content: "\f244"
    }

    .fa-mouse-pointer:before {
        content: "\f245"
    }

    .fa-i-cursor:before {
        content: "\f246"
    }

    .fa-object-group:before {
        content: "\f247"
    }

    .fa-object-ungroup:before {
        content: "\f248"
    }

    .fa-sticky-note:before {
        content: "\f249"
    }

    .fa-sticky-note-o:before {
        content: "\f24a"
    }

    .fa-cc-jcb:before {
        content: "\f24b"
    }

    .fa-cc-diners-club:before {
        content: "\f24c"
    }

    .fa-clone:before {
        content: "\f24d"
    }

    .fa-balance-scale:before {
        content: "\f24e"
    }

    .fa-hourglass-o:before {
        content: "\f250"
    }

    .fa-hourglass-1:before,
    .fa-hourglass-start:before {
        content: "\f251"
    }

    .fa-hourglass-2:before,
    .fa-hourglass-half:before {
        content: "\f252"
    }

    .fa-hourglass-3:before,
    .fa-hourglass-end:before {
        content: "\f253"
    }

    .fa-hourglass:before {
        content: "\f254"
    }

    .fa-hand-grab-o:before,
    .fa-hand-rock-o:before {
        content: "\f255"
    }

    .fa-hand-stop-o:before,
    .fa-hand-paper-o:before {
        content: "\f256"
    }

    .fa-hand-scissors-o:before {
        content: "\f257"
    }

    .fa-hand-lizard-o:before {
        content: "\f258"
    }

    .fa-hand-spock-o:before {
        content: "\f259"
    }

    .fa-hand-pointer-o:before {
        content: "\f25a"
    }

    .fa-hand-peace-o:before {
        content: "\f25b"
    }

    .fa-trademark:before {
        content: "\f25c"
    }

    .fa-registered:before {
        content: "\f25d"
    }

    .fa-creative-commons:before {
        content: "\f25e"
    }

    .fa-gg:before {
        content: "\f260"
    }

    .fa-gg-circle:before {
        content: "\f261"
    }

    .fa-tripadvisor:before {
        content: "\f262"
    }

    .fa-odnoklassniki:before {
        content: "\f263"
    }

    .fa-odnoklassniki-square:before {
        content: "\f264"
    }

    .fa-get-pocket:before {
        content: "\f265"
    }

    .fa-wikipedia-w:before {
        content: "\f266"
    }

    .fa-safari:before {
        content: "\f267"
    }

    .fa-chrome:before {
        content: "\f268"
    }

    .fa-firefox:before {
        content: "\f269"
    }

    .fa-opera:before {
        content: "\f26a"
    }

    .fa-internet-explorer:before {
        content: "\f26b"
    }

    .fa-tv:before,
    .fa-television:before {
        content: "\f26c"
    }

    .fa-contao:before {
        content: "\f26d"
    }

    .fa-500px:before {
        content: "\f26e"
    }

    .fa-amazon:before {
        content: "\f270"
    }

    .fa-calendar-plus-o:before {
        content: "\f271"
    }

    .fa-calendar-minus-o:before {
        content: "\f272"
    }

    .fa-calendar-times-o:before {
        content: "\f273"
    }

    .fa-calendar-check-o:before {
        content: "\f274"
    }

    .fa-industry:before {
        content: "\f275"
    }

    .fa-map-pin:before {
        content: "\f276"
    }

    .fa-map-signs:before {
        content: "\f277"
    }

    .fa-map-o:before {
        content: "\f278"
    }

    .fa-map:before {
        content: "\f279"
    }

    .fa-commenting:before {
        content: "\f27a"
    }

    .fa-commenting-o:before {
        content: "\f27b"
    }

    .fa-houzz:before {
        content: "\f27c"
    }

    .fa-vimeo:before {
        content: "\f27d"
    }

    .fa-black-tie:before {
        content: "\f27e"
    }

    .fa-fonticons:before {
        content: "\f280"
    }

    .fa-reddit-alien:before {
        content: "\f281"
    }

    .fa-edge:before {
        content: "\f282"
    }

    .fa-credit-card-alt:before {
        content: "\f283"
    }

    .fa-codiepie:before {
        content: "\f284"
    }

    .fa-modx:before {
        content: "\f285"
    }

    .fa-fort-awesome:before {
        content: "\f286"
    }

    .fa-usb:before {
        content: "\f287"
    }

    .fa-product-hunt:before {
        content: "\f288"
    }

    .fa-mixcloud:before {
        content: "\f289"
    }

    .fa-scribd:before {
        content: "\f28a"
    }

    .fa-pause-circle:before {
        content: "\f28b"
    }

    .fa-pause-circle-o:before {
        content: "\f28c"
    }

    .fa-stop-circle:before {
        content: "\f28d"
    }

    .fa-stop-circle-o:before {
        content: "\f28e"
    }

    .fa-shopping-bag:before {
        content: "\f290"
    }

    .fa-shopping-basket:before {
        content: "\f291"
    }

    .fa-hashtag:before {
        content: "\f292"
    }

    .fa-bluetooth:before {
        content: "\f293"
    }

    .fa-bluetooth-b:before {
        content: "\f294"
    }

    .fa-percent:before {
        content: "\f295"
    }

    .fa-gitlab:before {
        content: "\f296"
    }

    .fa-wpbeginner:before {
        content: "\f297"
    }

    .fa-wpforms:before {
        content: "\f298"
    }

    .fa-envira:before {
        content: "\f299"
    }

    .fa-universal-access:before {
        content: "\f29a"
    }

    .fa-wheelchair-alt:before {
        content: "\f29b"
    }

    .fa-question-circle-o:before {
        content: "\f29c"
    }

    .fa-blind:before {
        content: "\f29d"
    }

    .fa-audio-description:before {
        content: "\f29e"
    }

    .fa-volume-control-phone:before {
        content: "\f2a0"
    }

    .fa-braille:before {
        content: "\f2a1"
    }

    .fa-assistive-listening-systems:before {
        content: "\f2a2"
    }

    .fa-asl-interpreting:before,
    .fa-american-sign-language-interpreting:before {
        content: "\f2a3"
    }

    .fa-deafness:before,
    .fa-hard-of-hearing:before,
    .fa-deaf:before {
        content: "\f2a4"
    }

    .fa-glide:before {
        content: "\f2a5"
    }

    .fa-glide-g:before {
        content: "\f2a6"
    }

    .fa-signing:before,
    .fa-sign-language:before {
        content: "\f2a7"
    }

    .fa-low-vision:before {
        content: "\f2a8"
    }

    .fa-viadeo:before {
        content: "\f2a9"
    }

    .fa-viadeo-square:before {
        content: "\f2aa"
    }

    .fa-snapchat:before {
        content: "\f2ab"
    }

    .fa-snapchat-ghost:before {
        content: "\f2ac"
    }

    .fa-snapchat-square:before {
        content: "\f2ad"
    }

    .fa-pied-piper:before {
        content: "\f2ae"
    }

    .fa-first-order:before {
        content: "\f2b0"
    }

    .fa-yoast:before {
        content: "\f2b1"
    }

    .fa-themeisle:before {
        content: "\f2b2"
    }

    .fa-google-plus-circle:before,
    .fa-google-plus-official:before {
        content: "\f2b3"
    }

    .fa-fa:before,
    .fa-font-awesome:before {
        content: "\f2b4"
    }

    .fa-handshake-o:before {
        content: "\f2b5"
    }

    .fa-envelope-open:before {
        content: "\f2b6"
    }

    .fa-envelope-open-o:before {
        content: "\f2b7"
    }

    .fa-linode:before {
        content: "\f2b8"
    }

    .fa-address-book:before {
        content: "\f2b9"
    }

    .fa-address-book-o:before {
        content: "\f2ba"
    }

    .fa-vcard:before,
    .fa-address-card:before {
        content: "\f2bb"
    }

    .fa-vcard-o:before,
    .fa-address-card-o:before {
        content: "\f2bc"
    }

    .fa-user-circle:before {
        content: "\f2bd"
    }

    .fa-user-circle-o:before {
        content: "\f2be"
    }

    .fa-user-o:before {
        content: "\f2c0"
    }

    .fa-id-badge:before {
        content: "\f2c1"
    }

    .fa-drivers-license:before,
    .fa-id-card:before {
        content: "\f2c2"
    }

    .fa-drivers-license-o:before,
    .fa-id-card-o:before {
        content: "\f2c3"
    }

    .fa-quora:before {
        content: "\f2c4"
    }

    .fa-free-code-camp:before {
        content: "\f2c5"
    }

    .fa-telegram:before {
        content: "\f2c6"
    }

    .fa-thermometer-4:before,
    .fa-thermometer:before,
    .fa-thermometer-full:before {
        content: "\f2c7"
    }

    .fa-thermometer-3:before,
    .fa-thermometer-three-quarters:before {
        content: "\f2c8"
    }

    .fa-thermometer-2:before,
    .fa-thermometer-half:before {
        content: "\f2c9"
    }

    .fa-thermometer-1:before,
    .fa-thermometer-quarter:before {
        content: "\f2ca"
    }

    .fa-thermometer-0:before,
    .fa-thermometer-empty:before {
        content: "\f2cb"
    }

    .fa-shower:before {
        content: "\f2cc"
    }

    .fa-bathtub:before,
    .fa-s15:before,
    .fa-bath:before {
        content: "\f2cd"
    }

    .fa-podcast:before {
        content: "\f2ce"
    }

    .fa-window-maximize:before {
        content: "\f2d0"
    }

    .fa-window-minimize:before {
        content: "\f2d1"
    }

    .fa-window-restore:before {
        content: "\f2d2"
    }

    .fa-times-rectangle:before,
    .fa-window-close:before {
        content: "\f2d3"
    }

    .fa-times-rectangle-o:before,
    .fa-window-close-o:before {
        content: "\f2d4"
    }

    .fa-bandcamp:before {
        content: "\f2d5"
    }

    .fa-grav:before {
        content: "\f2d6"
    }

    .fa-etsy:before {
        content: "\f2d7"
    }

    .fa-imdb:before {
        content: "\f2d8"
    }

    .fa-ravelry:before {
        content: "\f2d9"
    }

    .fa-eercast:before {
        content: "\f2da"
    }

    .fa-microchip:before {
        content: "\f2db"
    }

    .fa-snowflake-o:before {
        content: "\f2dc"
    }

    .fa-superpowers:before {
        content: "\f2dd"
    }

    .fa-wpexplorer:before {
        content: "\f2de"
    }

    .fa-meetup:before {
        content: "\f2e0"
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0
    }

    .sr-only-focusable:active,
    .sr-only-focusable:focus {
        position: static;
        width: auto;
        height: auto;
        margin: 0;
        overflow: visible;
        clip: auto
    }


    @import url(font-awesome.min.css);
    @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,600,600italic");

    /*
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block;
    }

    body {
        line-height: 1;
    }

    ol,
    ul {
        list-style: none;
    }

    blockquote,
    q {
        quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: '';
        content: none;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    body {
        -webkit-text-size-adjust: none;
    }

    mark {
        background-color: transparent;
        color: inherit;
    }

    input::-moz-focus-inner {
        border: 0;
        padding: 0;
    }

    input,
    select,
    textarea {
        -moz-appearance: none;
        -webkit-appearance: none;
        -ms-appearance: none;
        appearance: none;
    }

    /* Basic */

    @-ms-viewport {
        width: device-width;
    }

    body {
        -ms-overflow-style: scrollbar;
    }

    @media screen and (max-width: 480px) {

        html,
        body {
            min-width: 320px;
        }

    }

    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    body {
        background: #242943;
    }

    body.is-preload *,
    body.is-preload *:before,
    body.is-preload *:after {
        -moz-animation: none !important;
        -webkit-animation: none !important;
        -ms-animation: none !important;
        animation: none !important;
        -moz-transition: none !important;
        -webkit-transition: none !important;
        -ms-transition: none !important;
        transition: none !important;
    }

    /* Type */

    body,
    input,
    select,
    textarea {
        color: #ffffff;
        font-family: "Source Sans Pro", Helvetica, sans-serif;
        font-size: 17pt;
        font-weight: 300;
        letter-spacing: 0.025em;
        line-height: 1.65;
    }

    @media screen and (max-width: 1680px) {

        body,
        input,
        select,
        textarea {
            font-size: 14pt;
        }

    }

    @media screen and (max-width: 1280px) {

        body,
        input,
        select,
        textarea {
            font-size: 12pt;
        }

    }

    @media screen and (max-width: 360px) {

        body,
        input,
        select,
        textarea {
            font-size: 11pt;
        }

    }

    a {
        -moz-transition: color 0.2s ease-in-out, border-bottom-color 0.2s ease-in-out;
        -webkit-transition: color 0.2s ease-in-out, border-bottom-color 0.2s ease-in-out;
        -ms-transition: color 0.2s ease-in-out, border-bottom-color 0.2s ease-in-out;
        transition: color 0.2s ease-in-out, border-bottom-color 0.2s ease-in-out;
        border-bottom: dotted 1px;
        color: inherit;
        text-decoration: none;
    }

    a:hover {
        border-bottom-color: transparent;
        color: #9bf1ff !important;
    }

    a:active {
        color: #53e3fb !important;
    }

    strong,
    b {
        color: #ffffff;
        font-weight: 600;
    }

    em,
    i {
        font-style: italic;
    }

    p {
        margin: 0 0 2em 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #ffffff;
        font-weight: 600;
        line-height: 1.65;
        margin: 0 0 1em 0;
    }

    h1 a,
    h2 a,
    h3 a,
    h4 a,
    h5 a,
    h6 a {
        color: inherit;
        border-bottom: 0;
    }

    h1 {
        font-size: 2.5em;
    }

    h2 {
        font-size: 1.75em;
    }

    h3 {
        font-size: 1.35em;
    }

    h4 {
        font-size: 1.1em;
    }

    h5 {
        font-size: 0.9em;
    }

    h6 {
        font-size: 0.7em;
    }

    @media screen and (max-width: 736px) {

        h1 {
            font-size: 2em;
        }

        h2 {
            font-size: 1.5em;
        }

        h3 {
            font-size: 1.25em;
        }

    }

    hr {
        border: 0;
        border-bottom: solid 1px rgba(212, 212, 255, 0.1);
        margin: 2em 0;
    }

    hr.major {
        margin: 3em 0;
    }

    .align-left {
        text-align: left;
    }

    .align-center {
        text-align: center;
    }

    .align-right {
        text-align: right;
    }

    /* Row */

    .row {
        display: flex;
        flex-wrap: wrap;
        box-sizing: border-box;
        align-items: stretch;
    }

    .row>* {
        box-sizing: border-box;
    }

    .row.gtr-uniform>*> :last-child {
        margin-bottom: 0;
    }

    .row.aln-left {
        justify-content: flex-start;
    }

    .row.aln-center {
        justify-content: center;
    }

    .row.aln-right {
        justify-content: flex-end;
    }

    .row.aln-top {
        align-items: flex-start;
    }

    .row.aln-middle {
        align-items: center;
    }

    .row.aln-bottom {
        align-items: flex-end;
    }

    .row>.imp {
        order: -1;
    }

    .row>.col-1 {
        width: 8.3333333333%;
    }

    .row>.off-1 {
        margin-left: 8.3333333333%;
    }

    .row>.col-2 {
        width: 16.6666666667%;
    }

    .row>.off-2 {
        margin-left: 16.6666666667%;
    }

    .row>.col-3 {
        width: 25%;
    }

    .row>.off-3 {
        margin-left: 25%;
    }

    .row>.col-4 {
        width: 33.3333333333%;
    }

    .row>.off-4 {
        margin-left: 33.3333333333%;
    }

    .row>.col-5 {
        width: 41.6666666667%;
    }

    .row>.off-5 {
        margin-left: 41.6666666667%;
    }

    .row>.col-6 {
        width: 50%;
    }

    .row>.off-6 {
        margin-left: 50%;
    }

    .row>.col-7 {
        width: 58.3333333333%;
    }

    .row>.off-7 {
        margin-left: 58.3333333333%;
    }

    .row>.col-8 {
        width: 66.6666666667%;
    }

    .row>.off-8 {
        margin-left: 66.6666666667%;
    }

    .row>.col-9 {
        width: 75%;
    }

    .row>.off-9 {
        margin-left: 75%;
    }

    .row>.col-10 {
        width: 83.3333333333%;
    }

    .row>.off-10 {
        margin-left: 83.3333333333%;
    }

    .row>.col-11 {
        width: 91.6666666667%;
    }

    .row>.off-11 {
        margin-left: 91.6666666667%;
    }

    .row>.col-12 {
        width: 100%;
    }

    .row>.off-12 {
        margin-left: 100%;
    }

    .row.gtr-0 {
        margin-top: 0;
        margin-left: 0em;
    }

    .row.gtr-0>* {
        padding: 0 0 0 0em;
    }

    .row.gtr-0.gtr-uniform {
        margin-top: 0em;
    }

    .row.gtr-0.gtr-uniform>* {
        padding-top: 0em;
    }

    .row.gtr-25 {
        margin-top: 0;
        margin-left: -0.5em;
    }

    .row.gtr-25>* {
        padding: 0 0 0 0.5em;
    }

    .row.gtr-25.gtr-uniform {
        margin-top: -0.5em;
    }

    .row.gtr-25.gtr-uniform>* {
        padding-top: 0.5em;
    }

    .row.gtr-50 {
        margin-top: 0;
        margin-left: -1em;
    }

    .row.gtr-50>* {
        padding: 0 0 0 1em;
    }

    .row.gtr-50.gtr-uniform {
        margin-top: -1em;
    }

    .row.gtr-50.gtr-uniform>* {
        padding-top: 1em;
    }

    .row {
        margin-top: 0;
        margin-left: -2em;
    }

    .row>* {
        padding: 0 0 0 2em;
    }

    .row.gtr-uniform {
        margin-top: -2em;
    }

    .row.gtr-uniform>* {
        padding-top: 2em;
    }

    .row.gtr-150 {
        margin-top: 0;
        margin-left: -3em;
    }

    .row.gtr-150>* {
        padding: 0 0 0 3em;
    }

    .row.gtr-150.gtr-uniform {
        margin-top: -3em;
    }

    .row.gtr-150.gtr-uniform>* {
        padding-top: 3em;
    }

    .row.gtr-200 {
        margin-top: 0;
        margin-left: -4em;
    }

    .row.gtr-200>* {
        padding: 0 0 0 4em;
    }

    .row.gtr-200.gtr-uniform {
        margin-top: -4em;
    }

    .row.gtr-200.gtr-uniform>* {
        padding-top: 4em;
    }

    @media screen and (max-width: 1680px) {

        .row {
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
            align-items: stretch;
        }

        .row>* {
            box-sizing: border-box;
        }

        .row.gtr-uniform>*> :last-child {
            margin-bottom: 0;
        }

        .row.aln-left {
            justify-content: flex-start;
        }

        .row.aln-center {
            justify-content: center;
        }

        .row.aln-right {
            justify-content: flex-end;
        }

        .row.aln-top {
            align-items: flex-start;
        }

        .row.aln-middle {
            align-items: center;
        }

        .row.aln-bottom {
            align-items: flex-end;
        }

        .row>.imp-xlarge {
            order: -1;
        }

        .row>.col-1-xlarge {
            width: 8.3333333333%;
        }

        .row>.off-1-xlarge {
            margin-left: 8.3333333333%;
        }

        .row>.col-2-xlarge {
            width: 16.6666666667%;
        }

        .row>.off-2-xlarge {
            margin-left: 16.6666666667%;
        }

        .row>.col-3-xlarge {
            width: 25%;
        }

        .row>.off-3-xlarge {
            margin-left: 25%;
        }

        .row>.col-4-xlarge {
            width: 33.3333333333%;
        }

        .row>.off-4-xlarge {
            margin-left: 33.3333333333%;
        }

        .row>.col-5-xlarge {
            width: 41.6666666667%;
        }

        .row>.off-5-xlarge {
            margin-left: 41.6666666667%;
        }

        .row>.col-6-xlarge {
            width: 50%;
        }

        .row>.off-6-xlarge {
            margin-left: 50%;
        }

        .row>.col-7-xlarge {
            width: 58.3333333333%;
        }

        .row>.off-7-xlarge {
            margin-left: 58.3333333333%;
        }

        .row>.col-8-xlarge {
            width: 66.6666666667%;
        }

        .row>.off-8-xlarge {
            margin-left: 66.6666666667%;
        }

        .row>.col-9-xlarge {
            width: 75%;
        }

        .row>.off-9-xlarge {
            margin-left: 75%;
        }

        .row>.col-10-xlarge {
            width: 83.3333333333%;
        }

        .row>.off-10-xlarge {
            margin-left: 83.3333333333%;
        }

        .row>.col-11-xlarge {
            width: 91.6666666667%;
        }

        .row>.off-11-xlarge {
            margin-left: 91.6666666667%;
        }

        .row>.col-12-xlarge {
            width: 100%;
        }

        .row>.off-12-xlarge {
            margin-left: 100%;
        }

        .row.gtr-0 {
            margin-top: 0;
            margin-left: 0em;
        }

        .row.gtr-0>* {
            padding: 0 0 0 0em;
        }

        .row.gtr-0.gtr-uniform {
            margin-top: 0em;
        }

        .row.gtr-0.gtr-uniform>* {
            padding-top: 0em;
        }

        .row.gtr-25 {
            margin-top: 0;
            margin-left: -0.5em;
        }

        .row.gtr-25>* {
            padding: 0 0 0 0.5em;
        }

        .row.gtr-25.gtr-uniform {
            margin-top: -0.5em;
        }

        .row.gtr-25.gtr-uniform>* {
            padding-top: 0.5em;
        }

        .row.gtr-50 {
            margin-top: 0;
            margin-left: -1em;
        }

        .row.gtr-50>* {
            padding: 0 0 0 1em;
        }

        .row.gtr-50.gtr-uniform {
            margin-top: -1em;
        }

        .row.gtr-50.gtr-uniform>* {
            padding-top: 1em;
        }

        .row {
            margin-top: 0;
            margin-left: -2em;
        }

        .row>* {
            padding: 0 0 0 2em;
        }

        .row.gtr-uniform {
            margin-top: -2em;
        }

        .row.gtr-uniform>* {
            padding-top: 2em;
        }

        .row.gtr-150 {
            margin-top: 0;
            margin-left: -3em;
        }

        .row.gtr-150>* {
            padding: 0 0 0 3em;
        }

        .row.gtr-150.gtr-uniform {
            margin-top: -3em;
        }

        .row.gtr-150.gtr-uniform>* {
            padding-top: 3em;
        }

        .row.gtr-200 {
            margin-top: 0;
            margin-left: -4em;
        }

        .row.gtr-200>* {
            padding: 0 0 0 4em;
        }

        .row.gtr-200.gtr-uniform {
            margin-top: -4em;
        }

        .row.gtr-200.gtr-uniform>* {
            padding-top: 4em;
        }

    }

    @media screen and (max-width: 1280px) {

        .row {
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
            align-items: stretch;
        }

        .row>* {
            box-sizing: border-box;
        }

        .row.gtr-uniform>*> :last-child {
            margin-bottom: 0;
        }

        .row.aln-left {
            justify-content: flex-start;
        }

        .row.aln-center {
            justify-content: center;
        }

        .row.aln-right {
            justify-content: flex-end;
        }

        .row.aln-top {
            align-items: flex-start;
        }

        .row.aln-middle {
            align-items: center;
        }

        .row.aln-bottom {
            align-items: flex-end;
        }

        .row>.imp-large {
            order: -1;
        }

        .row>.col-1-large {
            width: 8.3333333333%;
        }

        .row>.off-1-large {
            margin-left: 8.3333333333%;
        }

        .row>.col-2-large {
            width: 16.6666666667%;
        }

        .row>.off-2-large {
            margin-left: 16.6666666667%;
        }

        .row>.col-3-large {
            width: 25%;
        }

        .row>.off-3-large {
            margin-left: 25%;
        }

        .row>.col-4-large {
            width: 33.3333333333%;
        }

        .row>.off-4-large {
            margin-left: 33.3333333333%;
        }

        .row>.col-5-large {
            width: 41.6666666667%;
        }

        .row>.off-5-large {
            margin-left: 41.6666666667%;
        }

        .row>.col-6-large {
            width: 50%;
        }

        .row>.off-6-large {
            margin-left: 50%;
        }

        .row>.col-7-large {
            width: 58.3333333333%;
        }

        .row>.off-7-large {
            margin-left: 58.3333333333%;
        }

        .row>.col-8-large {
            width: 66.6666666667%;
        }

        .row>.off-8-large {
            margin-left: 66.6666666667%;
        }

        .row>.col-9-large {
            width: 75%;
        }

        .row>.off-9-large {
            margin-left: 75%;
        }

        .row>.col-10-large {
            width: 83.3333333333%;
        }

        .row>.off-10-large {
            margin-left: 83.3333333333%;
        }

        .row>.col-11-large {
            width: 91.6666666667%;
        }

        .row>.off-11-large {
            margin-left: 91.6666666667%;
        }

        .row>.col-12-large {
            width: 100%;
        }

        .row>.off-12-large {
            margin-left: 100%;
        }

        .row.gtr-0 {
            margin-top: 0;
            margin-left: 0em;
        }

        .row.gtr-0>* {
            padding: 0 0 0 0em;
        }

        .row.gtr-0.gtr-uniform {
            margin-top: 0em;
        }

        .row.gtr-0.gtr-uniform>* {
            padding-top: 0em;
        }

        .row.gtr-25 {
            margin-top: 0;
            margin-left: -0.375em;
        }

        .row.gtr-25>* {
            padding: 0 0 0 0.375em;
        }

        .row.gtr-25.gtr-uniform {
            margin-top: -0.375em;
        }

        .row.gtr-25.gtr-uniform>* {
            padding-top: 0.375em;
        }

        .row.gtr-50 {
            margin-top: 0;
            margin-left: -0.75em;
        }

        .row.gtr-50>* {
            padding: 0 0 0 0.75em;
        }

        .row.gtr-50.gtr-uniform {
            margin-top: -0.75em;
        }

        .row.gtr-50.gtr-uniform>* {
            padding-top: 0.75em;
        }

        .row {
            margin-top: 0;
            margin-left: -1.5em;
        }

        .row>* {
            padding: 0 0 0 1.5em;
        }

        .row.gtr-uniform {
            margin-top: -1.5em;
        }

        .row.gtr-uniform>* {
            padding-top: 1.5em;
        }

        .row.gtr-150 {
            margin-top: 0;
            margin-left: -2.25em;
        }

        .row.gtr-150>* {
            padding: 0 0 0 2.25em;
        }

        .row.gtr-150.gtr-uniform {
            margin-top: -2.25em;
        }

        .row.gtr-150.gtr-uniform>* {
            padding-top: 2.25em;
        }

        .row.gtr-200 {
            margin-top: 0;
            margin-left: -3em;
        }

        .row.gtr-200>* {
            padding: 0 0 0 3em;
        }

        .row.gtr-200.gtr-uniform {
            margin-top: -3em;
        }

        .row.gtr-200.gtr-uniform>* {
            padding-top: 3em;
        }

    }

    @media screen and (max-width: 980px) {

        .row {
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
            align-items: stretch;
        }

        .row>* {
            box-sizing: border-box;
        }

        .row.gtr-uniform>*> :last-child {
            margin-bottom: 0;
        }

        .row.aln-left {
            justify-content: flex-start;
        }

        .row.aln-center {
            justify-content: center;
        }

        .row.aln-right {
            justify-content: flex-end;
        }

        .row.aln-top {
            align-items: flex-start;
        }

        .row.aln-middle {
            align-items: center;
        }

        .row.aln-bottom {
            align-items: flex-end;
        }

        .row>.imp-medium {
            order: -1;
        }

        .row>.col-1-medium {
            width: 8.3333333333%;
        }

        .row>.off-1-medium {
            margin-left: 8.3333333333%;
        }

        .row>.col-2-medium {
            width: 16.6666666667%;
        }

        .row>.off-2-medium {
            margin-left: 16.6666666667%;
        }

        .row>.col-3-medium {
            width: 25%;
        }

        .row>.off-3-medium {
            margin-left: 25%;
        }

        .row>.col-4-medium {
            width: 33.3333333333%;
        }

        .row>.off-4-medium {
            margin-left: 33.3333333333%;
        }

        .row>.col-5-medium {
            width: 41.6666666667%;
        }

        .row>.off-5-medium {
            margin-left: 41.6666666667%;
        }

        .row>.col-6-medium {
            width: 50%;
        }

        .row>.off-6-medium {
            margin-left: 50%;
        }

        .row>.col-7-medium {
            width: 58.3333333333%;
        }

        .row>.off-7-medium {
            margin-left: 58.3333333333%;
        }

        .row>.col-8-medium {
            width: 66.6666666667%;
        }

        .row>.off-8-medium {
            margin-left: 66.6666666667%;
        }

        .row>.col-9-medium {
            width: 75%;
        }

        .row>.off-9-medium {
            margin-left: 75%;
        }

        .row>.col-10-medium {
            width: 83.3333333333%;
        }

        .row>.off-10-medium {
            margin-left: 83.3333333333%;
        }

        .row>.col-11-medium {
            width: 91.6666666667%;
        }

        .row>.off-11-medium {
            margin-left: 91.6666666667%;
        }

        .row>.col-12-medium {
            width: 100%;
        }

        .row>.off-12-medium {
            margin-left: 100%;
        }

        .row.gtr-0 {
            margin-top: 0;
            margin-left: 0em;
        }

        .row.gtr-0>* {
            padding: 0 0 0 0em;
        }

        .row.gtr-0.gtr-uniform {
            margin-top: 0em;
        }

        .row.gtr-0.gtr-uniform>* {
            padding-top: 0em;
        }

        .row.gtr-25 {
            margin-top: 0;
            margin-left: -0.375em;
        }

        .row.gtr-25>* {
            padding: 0 0 0 0.375em;
        }

        .row.gtr-25.gtr-uniform {
            margin-top: -0.375em;
        }

        .row.gtr-25.gtr-uniform>* {
            padding-top: 0.375em;
        }

        .row.gtr-50 {
            margin-top: 0;
            margin-left: -0.75em;
        }

        .row.gtr-50>* {
            padding: 0 0 0 0.75em;
        }

        .row.gtr-50.gtr-uniform {
            margin-top: -0.75em;
        }

        .row.gtr-50.gtr-uniform>* {
            padding-top: 0.75em;
        }

        .row {
            margin-top: 0;
            margin-left: -1.5em;
        }

        .row>* {
            padding: 0 0 0 1.5em;
        }

        .row.gtr-uniform {
            margin-top: -1.5em;
        }

        .row.gtr-uniform>* {
            padding-top: 1.5em;
        }

        .row.gtr-150 {
            margin-top: 0;
            margin-left: -2.25em;
        }

        .row.gtr-150>* {
            padding: 0 0 0 2.25em;
        }

        .row.gtr-150.gtr-uniform {
            margin-top: -2.25em;
        }

        .row.gtr-150.gtr-uniform>* {
            padding-top: 2.25em;
        }

        .row.gtr-200 {
            margin-top: 0;
            margin-left: -3em;
        }

        .row.gtr-200>* {
            padding: 0 0 0 3em;
        }

        .row.gtr-200.gtr-uniform {
            margin-top: -3em;
        }

        .row.gtr-200.gtr-uniform>* {
            padding-top: 3em;
        }

    }

    @media screen and (max-width: 736px) {

        .row {
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
            align-items: stretch;
        }

        .row>* {
            box-sizing: border-box;
        }

        .row.gtr-uniform>*> :last-child {
            margin-bottom: 0;
        }

        .row.aln-left {
            justify-content: flex-start;
        }

        .row.aln-center {
            justify-content: center;
        }

        .row.aln-right {
            justify-content: flex-end;
        }

        .row.aln-top {
            align-items: flex-start;
        }

        .row.aln-middle {
            align-items: center;
        }

        .row.aln-bottom {
            align-items: flex-end;
        }

        .row>.imp-small {
            order: -1;
        }

        .row>.col-1-small {
            width: 8.3333333333%;
        }

        .row>.off-1-small {
            margin-left: 8.3333333333%;
        }

        .row>.col-2-small {
            width: 16.6666666667%;
        }

        .row>.off-2-small {
            margin-left: 16.6666666667%;
        }

        .row>.col-3-small {
            width: 25%;
        }

        .row>.off-3-small {
            margin-left: 25%;
        }

        .row>.col-4-small {
            width: 33.3333333333%;
        }

        .row>.off-4-small {
            margin-left: 33.3333333333%;
        }

        .row>.col-5-small {
            width: 41.6666666667%;
        }

        .row>.off-5-small {
            margin-left: 41.6666666667%;
        }

        .row>.col-6-small {
            width: 50%;
        }

        .row>.off-6-small {
            margin-left: 50%;
        }

        .row>.col-7-small {
            width: 58.3333333333%;
        }

        .row>.off-7-small {
            margin-left: 58.3333333333%;
        }

        .row>.col-8-small {
            width: 66.6666666667%;
        }

        .row>.off-8-small {
            margin-left: 66.6666666667%;
        }

        .row>.col-9-small {
            width: 75%;
        }

        .row>.off-9-small {
            margin-left: 75%;
        }

        .row>.col-10-small {
            width: 83.3333333333%;
        }

        .row>.off-10-small {
            margin-left: 83.3333333333%;
        }

        .row>.col-11-small {
            width: 91.6666666667%;
        }

        .row>.off-11-small {
            margin-left: 91.6666666667%;
        }

        .row>.col-12-small {
            width: 100%;
        }

        .row>.off-12-small {
            margin-left: 100%;
        }

        .row.gtr-0 {
            margin-top: 0;
            margin-left: 0em;
        }

        .row.gtr-0>* {
            padding: 0 0 0 0em;
        }

        .row.gtr-0.gtr-uniform {
            margin-top: 0em;
        }

        .row.gtr-0.gtr-uniform>* {
            padding-top: 0em;
        }

        .row.gtr-25 {
            margin-top: 0;
            margin-left: -0.3125em;
        }

        .row.gtr-25>* {
            padding: 0 0 0 0.3125em;
        }

        .row.gtr-25.gtr-uniform {
            margin-top: -0.3125em;
        }

        .row.gtr-25.gtr-uniform>* {
            padding-top: 0.3125em;
        }

        .row.gtr-50 {
            margin-top: 0;
            margin-left: -0.625em;
        }

        .row.gtr-50>* {
            padding: 0 0 0 0.625em;
        }

        .row.gtr-50.gtr-uniform {
            margin-top: -0.625em;
        }

        .row.gtr-50.gtr-uniform>* {
            padding-top: 0.625em;
        }

        .row {
            margin-top: 0;
            margin-left: -1.25em;
        }

        .row>* {
            padding: 0 0 0 1.25em;
        }

        .row.gtr-uniform {
            margin-top: -1.25em;
        }

        .row.gtr-uniform>* {
            padding-top: 1.25em;
        }

        .row.gtr-150 {
            margin-top: 0;
            margin-left: -1.875em;
        }

        .row.gtr-150>* {
            padding: 0 0 0 1.875em;
        }

        .row.gtr-150.gtr-uniform {
            margin-top: -1.875em;
        }

        .row.gtr-150.gtr-uniform>* {
            padding-top: 1.875em;
        }

        .row.gtr-200 {
            margin-top: 0;
            margin-left: -2.5em;
        }

        .row.gtr-200>* {
            padding: 0 0 0 2.5em;
        }

        .row.gtr-200.gtr-uniform {
            margin-top: -2.5em;
        }

        .row.gtr-200.gtr-uniform>* {
            padding-top: 2.5em;
        }

    }

    @media screen and (max-width: 480px) {

        .row {
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
            align-items: stretch;
        }

        .row>* {
            box-sizing: border-box;
        }

        .row.gtr-uniform>*> :last-child {
            margin-bottom: 0;
        }

        .row.aln-left {
            justify-content: flex-start;
        }

        .row.aln-center {
            justify-content: center;
        }

        .row.aln-right {
            justify-content: flex-end;
        }

        .row.aln-top {
            align-items: flex-start;
        }

        .row.aln-middle {
            align-items: center;
        }

        .row.aln-bottom {
            align-items: flex-end;
        }

        .row>.imp-xsmall {
            order: -1;
        }

        .row>.col-1-xsmall {
            width: 8.3333333333%;
        }

        .row>.off-1-xsmall {
            margin-left: 8.3333333333%;
        }

        .row>.col-2-xsmall {
            width: 16.6666666667%;
        }

        .row>.off-2-xsmall {
            margin-left: 16.6666666667%;
        }

        .row>.col-3-xsmall {
            width: 25%;
        }

        .row>.off-3-xsmall {
            margin-left: 25%;
        }

        .row>.col-4-xsmall {
            width: 33.3333333333%;
        }

        .row>.off-4-xsmall {
            margin-left: 33.3333333333%;
        }

        .row>.col-5-xsmall {
            width: 41.6666666667%;
        }

        .row>.off-5-xsmall {
            margin-left: 41.6666666667%;
        }

        .row>.col-6-xsmall {
            width: 50%;
        }

        .row>.off-6-xsmall {
            margin-left: 50%;
        }

        .row>.col-7-xsmall {
            width: 58.3333333333%;
        }

        .row>.off-7-xsmall {
            margin-left: 58.3333333333%;
        }

        .row>.col-8-xsmall {
            width: 66.6666666667%;
        }

        .row>.off-8-xsmall {
            margin-left: 66.6666666667%;
        }

        .row>.col-9-xsmall {
            width: 75%;
        }

        .row>.off-9-xsmall {
            margin-left: 75%;
        }

        .row>.col-10-xsmall {
            width: 83.3333333333%;
        }

        .row>.off-10-xsmall {
            margin-left: 83.3333333333%;
        }

        .row>.col-11-xsmall {
            width: 91.6666666667%;
        }

        .row>.off-11-xsmall {
            margin-left: 91.6666666667%;
        }

        .row>.col-12-xsmall {
            width: 100%;
        }

        .row>.off-12-xsmall {
            margin-left: 100%;
        }

        .row.gtr-0 {
            margin-top: 0;
            margin-left: 0em;
        }

        .row.gtr-0>* {
            padding: 0 0 0 0em;
        }

        .row.gtr-0.gtr-uniform {
            margin-top: 0em;
        }

        .row.gtr-0.gtr-uniform>* {
            padding-top: 0em;
        }

        .row.gtr-25 {
            margin-top: 0;
            margin-left: -0.3125em;
        }

        .row.gtr-25>* {
            padding: 0 0 0 0.3125em;
        }

        .row.gtr-25.gtr-uniform {
            margin-top: -0.3125em;
        }

        .row.gtr-25.gtr-uniform>* {
            padding-top: 0.3125em;
        }

        .row.gtr-50 {
            margin-top: 0;
            margin-left: -0.625em;
        }

        .row.gtr-50>* {
            padding: 0 0 0 0.625em;
        }

        .row.gtr-50.gtr-uniform {
            margin-top: -0.625em;
        }

        .row.gtr-50.gtr-uniform>* {
            padding-top: 0.625em;
        }

        .row {
            margin-top: 0;
            margin-left: -1.25em;
        }

        .row>* {
            padding: 0 0 0 1.25em;
        }

        .row.gtr-uniform {
            margin-top: -1.25em;
        }

        .row.gtr-uniform>* {
            padding-top: 1.25em;
        }

        .row.gtr-150 {
            margin-top: 0;
            margin-left: -1.875em;
        }

        .row.gtr-150>* {
            padding: 0 0 0 1.875em;
        }

        .row.gtr-150.gtr-uniform {
            margin-top: -1.875em;
        }

        .row.gtr-150.gtr-uniform>* {
            padding-top: 1.875em;
        }

        .row.gtr-200 {
            margin-top: 0;
            margin-left: -2.5em;
        }

        .row.gtr-200>* {
            padding: 0 0 0 2.5em;
        }

        .row.gtr-200.gtr-uniform {
            margin-top: -2.5em;
        }

        .row.gtr-200.gtr-uniform>* {
            padding-top: 2.5em;
        }

    }

    /* Section/Article */

    section.special,
    article.special {
        text-align: center;
    }

    header.major {
        width: -moz-max-content;
        width: -webkit-max-content;
        width: -ms-max-content;
        width: max-content;
        margin-bottom: 2em;
    }

    header.major> :first-child {
        margin-bottom: 0;
        width: calc(100% + 0.5em);
    }

    header.major> :first-child:after {
        content: '';
        background-color: #ffffff;
        display: block;
        height: 2px;
        margin: 0.325em 0 0.5em 0;
        width: 100%;
    }

    header.major>p {
        font-size: 0.7em;
        font-weight: 600;
        letter-spacing: 0.20em;
        margin-bottom: 0.5em;
        text-transform: uppercase;
    }

    header.major>p strong {
        font-size: 1.5em;
    }

    header.major>.major-actions {
        padding-top: 1.3em;
    }

    body.is-ie header.major> :first-child:after {
        max-width: 9em;
    }

    body.is-ie header.major>h1:after {
        max-width: 100% !important;
    }

    @media screen and (max-width: 736px) {

        header.major>p br {
            display: none;
        }

    }

    /* Form */

    form {
        margin: 0 0 2em 0;
    }

    form> :last-child {
        margin-bottom: 0;
    }

    form>.fields {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-flex-wrap: wrap;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        width: calc(100% + 3em);
        margin: -1.5em 0 2em -1.5em;
    }

    form>.fields>.field {
        -moz-flex-grow: 0;
        -webkit-flex-grow: 0;
        -ms-flex-grow: 0;
        flex-grow: 0;
        -moz-flex-shrink: 0;
        -webkit-flex-shrink: 0;
        -ms-flex-shrink: 0;
        flex-shrink: 0;
        padding: 1.5em 0 0 1.5em;
        width: calc(100% - 1.5em);
    }

    form>.fields>.field.half {
        width: calc(50% - 0.75em);
    }

    form>.fields>.field.third {
        width: calc(100%/3 - 0.5em);
    }

    form>.fields>.field.quarter {
        width: calc(25% - 0.375em);
    }

    @media screen and (max-width: 480px) {

        form>.fields {
            width: calc(100% + 3em);
            margin: -1.5em 0 2em -1.5em;
        }

        form>.fields>.field {
            padding: 1.5em 0 0 1.5em;
            width: calc(100% - 1.5em);
        }

        form>.fields>.field.half {
            width: calc(100% - 1.5em);
        }

        form>.fields>.field.third {
            width: calc(100% - 1.5em);
        }

        form>.fields>.field.quarter {
            width: calc(100% - 1.5em);
        }

    }

    label {
        color: #ffffff;
        display: block;
        font-size: 0.8em;
        font-weight: 600;
        letter-spacing: 0.25em;
        margin: 0 0 1em 0;
        text-transform: uppercase;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="tel"],
    input[type="search"],
    input[type="url"],
    select,
    textarea {
        -moz-appearance: none;
        -webkit-appearance: none;
        -ms-appearance: none;
        appearance: none;
        background: rgba(212, 212, 255, 0.035);
        border: none;
        border-radius: 0;
        color: inherit;
        display: block;
        outline: 0;
        padding: 0 1em;
        text-decoration: none;
        width: 100%;
    }

    input[type="text"]:invalid,
    input[type="password"]:invalid,
    input[type="email"]:invalid,
    input[type="tel"]:invalid,
    input[type="search"]:invalid,
    input[type="url"]:invalid,
    select:invalid,
    textarea:invalid {
        box-shadow: none;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="search"]:focus,
    input[type="url"]:focus,
    select:focus,
    textarea:focus {
        border-color: #9bf1ff;
        box-shadow: 0 0 0 2px #9bf1ff;
    }

    select {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' preserveAspectRatio='none' viewBox='0 0 40 40'%3E%3Cpath d='M9.4,12.3l10.4,10.4l10.4-10.4c0.2-0.2,0.5-0.4,0.9-0.4c0.3,0,0.6,0.1,0.9,0.4l3.3,3.3c0.2,0.2,0.4,0.5,0.4,0.9 c0,0.4-0.1,0.6-0.4,0.9L20.7,31.9c-0.2,0.2-0.5,0.4-0.9,0.4c-0.3,0-0.6-0.1-0.9-0.4L4.3,17.3c-0.2-0.2-0.4-0.5-0.4-0.9 c0-0.4,0.1-0.6,0.4-0.9l3.3-3.3c0.2-0.2,0.5-0.4,0.9-0.4S9.1,12.1,9.4,12.3z' fill='rgba(212, 212, 255, 0.1)' /%3E%3C/svg%3E");
        background-size: 1.25rem;
        background-repeat: no-repeat;
        background-position: calc(100% - 1rem) center;
        height: 2.75em;
        padding-right: 2.75em;
        text-overflow: ellipsis;
    }

    select option {
        color: #ffffff;
        background: #242943;
    }

    select:focus::-ms-value {
        background-color: transparent;
    }

    select::-ms-expand {
        display: none;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="tel"],
    input[type="search"],
    input[type="url"],
    select {
        height: 2.75em;
    }

    textarea {
        padding: 0.75em 1em;
    }

    ::-webkit-input-placeholder {
        color: rgba(244, 244, 255, 0.2) !important;
        opacity: 1.0;
    }

    :-moz-placeholder {
        color: rgba(244, 244, 255, 0.2) !important;
        opacity: 1.0;
    }

    ::-moz-placeholder {
        color: rgba(244, 244, 255, 0.2) !important;
        opacity: 1.0;
    }

    :-ms-input-placeholder {
        color: rgba(244, 244, 255, 0.2) !important;
        opacity: 1.0;
    }

    /* Box */

    .box {
        border: solid 1px rgba(212, 212, 255, 0.1);
        padding: 10px 15px;
        margin-bottom: 2em;
        max-height: 280px;
        overflow: auto;
    }

    .box> :last-child,
    .box> :last-child> :last-child,
    .box> :last-child> :last-child> :last-child {
        margin-bottom: 0;
    }

    .box.alt {
        border: 0;
        border-radius: 0;
        padding: 0;
    }

    /* Icon */

    .icon {
        text-decoration: none;
        border-bottom: none;
        position: relative;
    }

    .icon:before {
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        font-family: FontAwesome;
        font-style: normal;
        font-weight: normal;
        text-transform: none !important;
    }

    .icon>.label {
        display: none;
    }

    .icon.alt:before {
        background-color: #ffffff;
        border-radius: 100%;
        color: #242943;
        display: inline-block;
        height: 2em;
        line-height: 2em;
        text-align: center;
        width: 2em;
    }

    a.icon.alt:before {
        -moz-transition: background-color 0.2s ease-in-out;
        -webkit-transition: background-color 0.2s ease-in-out;
        -ms-transition: background-color 0.2s ease-in-out;
        transition: background-color 0.2s ease-in-out;
    }

    a.icon.alt:hover:before {
        background-color: #6fc3df;
    }

    a.icon.alt:active:before {
        background-color: #37a6cb;
    }

    /* Image */

    .image {
        border: 0;
        display: inline-block;
        position: relative;
    }

    .image img {
        display: block;
    }

    .image.left,
    .image.right {
        max-width: 30%;
    }

    .image.left img,
    .image.right img {
        width: 100%;
    }

    .image.left {
        float: left;
        margin: 0 1.5em 1.25em 0;
        top: 0.25em;
    }

    .image.right {
        float: right;
        margin: 0 0 1.25em 1.5em;
        top: 0.25em;
    }

    .image.fit {
        display: block;
        margin: 0 0 2em 0;
        width: 100%;
    }

    .image.fit img {
        width: 100%;
    }

    .image.main {
        display: block;
        margin: 2.5em 0;
        width: 100%;
    }

    .image.main img {
        width: 100%;
    }

    @media screen and (max-width: 736px) {

        .image.main {
            margin: 1.5em 0;
        }

    }

    /* List */

    ol {
        list-style: decimal;
        margin: 0 0 2em 0;
        padding-left: 1.25em;
    }

    ol li {
        padding-left: 0.25em;
    }

    ul {
        list-style: disc;
        margin: 0 0 2em 0;
        padding-left: 1em;
    }

    ul li {
        padding-left: 0.5em;
    }

    ul.alt {
        list-style: none;
        padding-left: 0;
    }

    ul.alt li {
        border-top: solid 1px rgba(212, 212, 255, 0.1);
        padding: 0.5em 0;
    }

    ul.alt li:first-child {
        border-top: 0;
        padding-top: 0;
    }

    dl {
        margin: 0 0 2em 0;
    }

    dl dt {
        display: block;
        font-weight: 600;
        margin: 0 0 1em 0;
    }

    dl dd {
        margin-left: 2em;
    }

    /* Actions */

    ul.actions {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        cursor: default;
        list-style: none;
        margin-left: -1em;
        padding-left: 0;
    }

    ul.actions li {
        padding: 0 0 0 1em;
        vertical-align: middle;
    }

    ul.actions.special {
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -ms-justify-content: center;
        justify-content: center;
        width: 100%;
        margin-left: 0;
    }

    ul.actions.special li:first-child {
        padding-left: 0;
    }

    ul.actions.stacked {
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-left: 0;
    }

    ul.actions.stacked li {
        padding: 1.3em 0 0 0;
    }

    ul.actions.stacked li:first-child {
        padding-top: 0;
    }

    ul.actions.fit {
        width: calc(100% + 1em);
    }

    ul.actions.fit li {
        -moz-flex-grow: 1;
        -webkit-flex-grow: 1;
        -ms-flex-grow: 1;
        flex-grow: 1;
        -moz-flex-shrink: 1;
        -webkit-flex-shrink: 1;
        -ms-flex-shrink: 1;
        flex-shrink: 1;
        width: 100%;
    }

    ul.actions.fit li>* {
        width: 100%;
    }

    ul.actions.fit.stacked {
        width: 100%;
    }

    /* Icons */

    ul.icons {
        cursor: default;
        list-style: none;
        padding-left: 0;
    }

    ul.icons li {
        display: inline-block;
        padding: 0 1em 0 0;
    }

    ul.icons li:last-child {
        padding-right: 0;
    }

    @media screen and (max-width: 736px) {

        ul.icons li {
            padding: 0 0.75em 0 0;
        }

    }

    /* Pagination */

    ul.pagination {
        cursor: default;
        list-style: none;
        padding-left: 0;
    }

    ul.pagination li {
        display: inline-block;
        padding-left: 0;
        vertical-align: middle;
    }

    ul.pagination li>.page {
        -moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        -ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        border-bottom: 0;
        display: inline-block;
        font-size: 0.8em;
        font-weight: 600;
        height: 1.5em;
        line-height: 1.5em;
        margin: 0 0.125em;
        min-width: 1.5em;
        padding: 0 0.5em;
        text-align: center;
    }

    ul.pagination li>.page.active {
        background-color: #ffffff;
        color: #242943;
    }

    ul.pagination li>.page.active:hover {
        background-color: #9bf1ff;
        color: #242943 !important;
    }

    ul.pagination li>.page.active:active {
        background-color: #53e3fb;
    }

    ul.pagination li:first-child {
        padding-right: 0.75em;
    }

    ul.pagination li:last-child {
        padding-left: 0.75em;
    }

    @media screen and (max-width: 480px) {

        ul.pagination li:nth-child(n+2):nth-last-child(n+2) {
            display: none;
        }

        ul.pagination li:first-child {
            padding-right: 0;
        }

    }

    /* Button */

    input[type="submit"],
    input[type="reset"],
    input[type="button"],
    button,
    .button {
        -moz-appearance: none;
        -webkit-appearance: none;
        -ms-appearance: none;
        appearance: none;
        -moz-transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out, color 0.2s ease-in-out;
        -webkit-transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out, color 0.2s ease-in-out;
        -ms-transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out, color 0.2s ease-in-out;
        transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out, color 0.2s ease-in-out;
        background-color: transparent;
        border: 0;
        border-radius: 0;
        box-shadow: inset 0 0 0 2px #ffffff;
        color: #ffffff;
        cursor: pointer;
        display: inline-block;
        font-size: 0.8em;
        font-weight: 600;
        height: 3.5em;
        letter-spacing: 0.25em;
        line-height: 3.5em;
        padding: 0 1.75em;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        white-space: nowrap;
    }

    input[type="submit"]:hover,
    input[type="submit"]:active,
    input[type="reset"]:hover,
    input[type="reset"]:active,
    input[type="button"]:hover,
    input[type="button"]:active,
    button:hover,
    button:active,
    .button:hover,
    .button:active {
        box-shadow: inset 0 0 0 2px #9bf1ff;
        color: #9bf1ff;
    }

    input[type="submit"]:active,
    input[type="reset"]:active,
    input[type="button"]:active,
    button:active,
    .button:active {
        background-color: rgba(155, 241, 255, 0.1);
        box-shadow: inset 0 0 0 2px #53e3fb;
        color: #53e3fb;
    }

    input[type="submit"].icon:before,
    input[type="reset"].icon:before,
    input[type="button"].icon:before,
    button.icon:before,
    .button.icon:before {
        margin-right: 0.5em;
    }

    input[type="submit"].fit,
    input[type="reset"].fit,
    input[type="button"].fit,
    button.fit,
    .button.fit {
        width: 100%;
    }

    input[type="submit"].small,
    input[type="reset"].small,
    input[type="button"].small,
    button.small,
    .button.small {
        font-size: 0.6em;
    }

    input[type="submit"].large,
    input[type="reset"].large,
    input[type="button"].large,
    button.large,
    .button.large {
        font-size: 1.25em;
        height: 3em;
        line-height: 3em;
    }

    input[type="submit"].next,
    input[type="reset"].next,
    input[type="button"].next,
    button.next,
    .button.next {
        padding-right: 4.5em;
        position: relative;
    }

    input[type="submit"].next:before,
    input[type="submit"].next:after,
    input[type="reset"].next:before,
    input[type="reset"].next:after,
    input[type="button"].next:before,
    input[type="button"].next:after,
    button.next:before,
    button.next:after,
    .button.next:before,
    .button.next:after {
        -moz-transition: opacity 0.2s ease-in-out;
        -webkit-transition: opacity 0.2s ease-in-out;
        -ms-transition: opacity 0.2s ease-in-out;
        transition: opacity 0.2s ease-in-out;
        background-position: center right;
        background-repeat: no-repeat;
        background-size: 36px 24px;
        content: '';
        display: block;
        height: 100%;
        position: absolute;
        right: 1.5em;
        top: 0;
        vertical-align: middle;
        width: 36px;
    }

    input[type="submit"].next:before,
    input[type="reset"].next:before,
    input[type="button"].next:before,
    button.next:before,
    .button.next:before {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='36px' height='24px' viewBox='0 0 36 24' zoomAndPan='disable'%3E%3Cstyle%3Eline %7B stroke: %23ffffff%3B stroke-width: 2px%3B %7D%3C/style%3E%3Cline x1='0' y1='12' x2='34' y2='12' /%3E%3Cline x1='25' y1='4' x2='34' y2='12.5' /%3E%3Cline x1='25' y1='20' x2='34' y2='11.5' /%3E%3C/svg%3E");
    }

    input[type="submit"].next:after,
    input[type="reset"].next:after,
    input[type="button"].next:after,
    button.next:after,
    .button.next:after {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='36px' height='24px' viewBox='0 0 36 24' zoomAndPan='disable'%3E%3Cstyle%3Eline %7B stroke: %239bf1ff%3B stroke-width: 2px%3B %7D%3C/style%3E%3Cline x1='0' y1='12' x2='34' y2='12' /%3E%3Cline x1='25' y1='4' x2='34' y2='12.5' /%3E%3Cline x1='25' y1='20' x2='34' y2='11.5' /%3E%3C/svg%3E");
        opacity: 0;
        z-index: 1;
    }

    input[type="submit"].next:hover:after,
    input[type="submit"].next:active:after,
    input[type="reset"].next:hover:after,
    input[type="reset"].next:active:after,
    input[type="button"].next:hover:after,
    input[type="button"].next:active:after,
    button.next:hover:after,
    button.next:active:after,
    .button.next:hover:after,
    .button.next:active:after {
        opacity: 1;
    }

    @media screen and (max-width: 1280px) {

        input[type="submit"].next,
        input[type="reset"].next,
        input[type="button"].next,
        button.next,
        .button.next {
            padding-right: 5em;
        }

    }

    input[type="submit"].primary,
    input[type="reset"].primary,
    input[type="button"].primary,
    button.primary,
    .button.primary {
        background-color: #ffffff;
        box-shadow: none;
        color: #242943;
    }

    input[type="submit"].primary:hover,
    input[type="submit"].primary:active,
    input[type="reset"].primary:hover,
    input[type="reset"].primary:active,
    input[type="button"].primary:hover,
    input[type="button"].primary:active,
    button.primary:hover,
    button.primary:active,
    .button.primary:hover,
    .button.primary:active {
        background-color: #9bf1ff;
        color: #242943 !important;
    }

    input[type="submit"].primary:active,
    input[type="reset"].primary:active,
    input[type="button"].primary:active,
    button.primary:active,
    .button.primary:active {
        background-color: #53e3fb;
    }

    input[type="submit"].disabled,
    input[type="submit"]:disabled,
    input[type="reset"].disabled,
    input[type="reset"]:disabled,
    input[type="button"].disabled,
    input[type="button"]:disabled,
    button.disabled,
    button:disabled,
    .button.disabled,
    .button:disabled {
        pointer-events: none;
        cursor: default;
        opacity: 0.25;
    }

    /* Tiles */

    .tiles {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-flex-wrap: wrap;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        border-top: 0 !important;
    }

    .tiles+* {
        border-top: 0 !important;
    }

    .tiles article {
        -moz-align-items: center;
        -webkit-align-items: center;
        -ms-align-items: center;
        align-items: center;
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-transition: -moz-transform 0.25s ease, opacity 0.25s ease, -moz-filter 1s ease, -webkit-filter 1s ease;
        -webkit-transition: -webkit-transform 0.25s ease, opacity 0.25s ease, -webkit-filter 1s ease, -webkit-filter 1s ease;
        -ms-transition: -ms-transform 0.25s ease, opacity 0.25s ease, -ms-filter 1s ease, -webkit-filter 1s ease;
        transition: transform 0.25s ease, opacity 0.25s ease, filter 1s ease, -webkit-filter 1s ease;
        padding: 4em 4em 2em 4em;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        cursor: default;
        height: 40vh;
        max-height: 40em;
        min-height: 23em;
        overflow: hidden;
        position: relative;
        width: 33.3333%;
    }

    .tiles article .image {
        display: none;
    }

    .tiles article header {
        position: relative;
        z-index: 3;
    }

    .tiles article h3 {
        font-size: 1.75em;
    }

    .tiles article h3 a:hover {
        color: inherit !important;
    }

    .tiles article .link.primary {
        border: 0;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 4;
    }

    .tiles article:before {
        -moz-transition: opacity 0.5s ease;
        -webkit-transition: opacity 0.5s ease;
        -ms-transition: opacity 0.5s ease;
        transition: opacity 0.5s ease;
        bottom: 0;
        content: '';
        display: block;
        height: 100%;
        left: 0;
        opacity: 0.65;
        position: absolute;
        width: 100%;
        z-index: 2;
    }

    .tiles article:after {
        background-color: rgba(36, 41, 67, 0.25);
        content: '';
        display: block;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    .tiles article:hover:before {
        opacity: 0;
    }

    .tiles article:hover {
        text-shadow: 0 0 2px #292929, 0 0 2px #292929;
    }

    .tiles article.is-transitioning {
        -moz-transform: scale(0.95);
        -webkit-transform: scale(0.95);
        -ms-transform: scale(0.95);
        transform: scale(0.95);
        -moz-filter: blur(0.5em);
        -webkit-filter: blur(0.5em);
        -ms-filter: blur(0.5em);
        filter: blur(0.5em);
        opacity: 0;
    }

    .tiles article:nth-child(6n - 5):before {
        background-color: #6fc3df;
    }

    .tiles article:nth-child(6n - 4):before {
        background-color: #8d82c4;
    }

    .tiles article:nth-child(6n - 3):before {
        background-color: #ec8d81;
    }

    .tiles article:nth-child(6n - 2):before {
        background-color: #e7b788;
    }

    .tiles article:nth-child(6n - 1):before {
        background-color: #8ea9e8;
    }

    .tiles article:nth-child(6n):before {
        background-color: #87c5a4;
    }

    @media screen and (max-width: 1280px) {

        .tiles article {
            padding: 4em 3em 2em 3em;
            height: 30vh;
            max-height: 30em;
            min-height: 20em;
        }

    }

    @media screen and (max-width: 980px) {

        .tiles article {
            width: 50% !important;
        }

    }

    @media screen and (max-width: 736px) {

        .tiles article {
            padding: 3em 1.5em 1em 1.5em;
            height: 16em;
            max-height: none;
            min-height: 0;
        }

        .tiles article h3 {
            font-size: 1.5em;
        }

    }

    @media screen and (max-width: 480px) {

        .tiles {
            display: block;
        }

        .tiles article {
            height: 20em;
            width: 100% !important;
        }

    }

    /* Contact Method */

    .contact-method {
        margin: 0 0 2em 0;
        padding-left: 3.25em;
        position: relative;
    }

    .contact-method .icon {
        left: 0;
        position: absolute;
        top: 0;
    }

    .contact-method h3 {
        margin: 0 0 0.5em 0;
    }

    /* Spotlights */

    .spotlights {
        border-top: 0 !important;
    }

    .spotlights+* {
        border-top: 0 !important;
    }

    .spotlights>section {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-flex-direction: row;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        background-color: #2e3450;
    }

    .spotlights>section>.image {
        background-position: center center;
        background-size: cover;
        border-radius: 0;
        display: block;
        position: relative;
        width: 30%;
    }

    .spotlights>section>.image img {
        border-radius: 0;
        display: block;
        width: 100%;
    }

    .spotlights>section>.image:before {
        background: rgba(36, 41, 67, 0.9);
        content: '';
        display: block;
        height: 100%;
        left: 0;
        opacity: 0;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .spotlights>section>.content {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -ms-justify-content: center;
        justify-content: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -ms-align-items: center;
        align-items: center;
        padding: 2em 3em 0.1em 3em;
        width: 70%;
    }

    .spotlights>section>.content>.inner {
        margin: 0 auto;
        max-width: 100%;
        width: 65em;
    }

    .spotlights>section:nth-child(2n) {
        -moz-flex-direction: row-reverse;
        -webkit-flex-direction: row-reverse;
        -ms-flex-direction: row-reverse;
        flex-direction: row-reverse;
        background-color: #333856;
    }

    .spotlights>section:nth-child(2n)>.content {
        -moz-align-items: -moz-flex-end;
        -webkit-align-items: -webkit-flex-end;
        -ms-align-items: -ms-flex-end;
        align-items: flex-end;
    }

    @media screen and (max-width: 1680px) {

        .spotlights>section>.image {
            width: 40%;
        }

        .spotlights>section>.content {
            width: 60%;
        }

    }

    @media screen and (max-width: 1280px) {

        .spotlights>section>.image {
            width: 45%;
        }

        .spotlights>section>.content {
            width: 55%;
        }

    }

    @media screen and (max-width: 980px) {

        .spotlights>section {
            display: block;
        }

        .spotlights>section>.image {
            width: 100%;
        }

        .spotlights>section>.content {
            padding: 4em 3em 2em 3em;
            width: 100%;
        }

    }

    @media screen and (max-width: 736px) {

        .spotlights>section>.content {
            padding: 3em 1.5em 1em 1.5em;
        }

    }

    /* Header */

    @-moz-keyframes reveal-header {
        0% {
            top: -4em;
            opacity: 0;
        }

        100% {
            top: 0;
            opacity: 1;
        }
    }

    @-webkit-keyframes reveal-header {
        0% {
            top: -4em;
            opacity: 0;
        }

        100% {
            top: 0;
            opacity: 1;
        }
    }

    @-ms-keyframes reveal-header {
        0% {
            top: -4em;
            opacity: 0;
        }

        100% {
            top: 0;
            opacity: 1;
        }
    }

    @keyframes reveal-header {
        0% {
            top: -4em;
            opacity: 0;
        }

        100% {
            top: 0;
            opacity: 1;
        }
    }

    #header {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        background-color: #2a2f4a;
        box-shadow: 0 0 0.25em 0 rgba(0, 0, 0, 0.15);
        cursor: default;
        font-weight: 600;
        height: 3.25em;
        left: 0;
        letter-spacing: 0.25em;
        line-height: 3.25em;
        margin: 0;
        position: fixed;
        text-transform: uppercase;
        top: 0;
        width: 100%;
        z-index: 10000;
    }

    #header .logo {
        border: 0;
        display: inline-block;
        font-size: 0.8em;
        height: inherit;
        line-height: inherit;
        padding: 0 1.5em;
    }

    #header .logo strong {
        -moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        -ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        background-color: #ffffff;
        color: #242943;
        display: inline-block;
        line-height: 1.65em;
        margin-right: 0.325em;
        padding: 0 0.125em 0 0.375em;
    }

    #header .logo:hover strong {
        background-color: #9bf1ff;
    }

    #header .logo:active strong {
        background-color: #53e3fb;
    }

    #header nav {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-justify-content: -moz-flex-end;
        -webkit-justify-content: -webkit-flex-end;
        -ms-justify-content: -ms-flex-end;
        justify-content: flex-end;
        -moz-flex-grow: 1;
        -webkit-flex-grow: 1;
        -ms-flex-grow: 1;
        flex-grow: 1;
        height: inherit;
        line-height: inherit;
    }

    #header nav a {
        border: 0;
        display: block;
        font-size: 0.8em;
        height: inherit;
        line-height: inherit;
        padding: 0 0.75em;
        position: relative;
        vertical-align: middle;
    }

    #header nav a:last-child {
        padding-right: 1.5em;
    }

    #header nav a[href="#menu"] {
        padding-right: 3.325em !important;
    }

    #header nav a[href="#menu"]:before,
    #header nav a[href="#menu"]:after {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='32' viewBox='0 0 24 32' preserveAspectRatio='none'%3E%3Cstyle%3Eline %7B stroke-width: 2px%3B stroke: %23ffffff%3B %7D%3C/style%3E%3Cline x1='0' y1='11' x2='24' y2='11' /%3E%3Cline x1='0' y1='21' x2='24' y2='21' /%3E%3Cline x1='0' y1='16' x2='24' y2='16' /%3E%3C/svg%3E");
        background-position: center;
        background-repeat: no-repeat;
        background-size: 24px 32px;
        content: '';
        display: block;
        height: 100%;
        position: absolute;
        right: 1.5em;
        top: 0;
        vertical-align: middle;
        width: 24px;
    }

    #header nav a[href="#menu"]:after {
        -moz-transition: opacity 0.2s ease-in-out;
        -webkit-transition: opacity 0.2s ease-in-out;
        -ms-transition: opacity 0.2s ease-in-out;
        transition: opacity 0.2s ease-in-out;
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='32' viewBox='0 0 24 32' preserveAspectRatio='none'%3E%3Cstyle%3Eline %7B stroke-width: 2px%3B stroke: %239bf1ff%3B %7D%3C/style%3E%3Cline x1='0' y1='11' x2='24' y2='11' /%3E%3Cline x1='0' y1='21' x2='24' y2='21' /%3E%3Cline x1='0' y1='16' x2='24' y2='16' /%3E%3C/svg%3E");
        opacity: 0;
        z-index: 1;
    }

    #header nav a[href="#menu"]:hover:after,
    #header nav a[href="#menu"]:active:after {
        opacity: 1;
    }

    #header nav a[href="#menu"]:last-child {
        padding-right: 3.875em !important;
    }

    #header nav a[href="#menu"]:last-child:before,
    #header nav a[href="#menu"]:last-child:after {
        right: 2em;
    }

    #header.reveal {
        -moz-animation: reveal-header 0.35s ease;
        -webkit-animation: reveal-header 0.35s ease;
        -ms-animation: reveal-header 0.35s ease;
        animation: reveal-header 0.35s ease;
    }

    #header.alt {
        -moz-transition: opacity 2.5s ease;
        -webkit-transition: opacity 2.5s ease;
        -ms-transition: opacity 2.5s ease;
        transition: opacity 2.5s ease;
        -moz-transition-delay: 0.75s;
        -webkit-transition-delay: 0.75s;
        -ms-transition-delay: 0.75s;
        transition-delay: 0.75s;
        -moz-animation: none;
        -webkit-animation: none;
        -ms-animation: none;
        animation: none;
        background-color: transparent;
        box-shadow: none;
        position: absolute;
    }

    #header.alt.style1 .logo strong {
        color: #6fc3df;
    }

    #header.alt.style2 .logo strong {
        color: #8d82c4;
    }

    #header.alt.style3 .logo strong {
        color: #ec8d81;
    }

    #header.alt.style4 .logo strong {
        color: #e7b788;
    }

    #header.alt.style5 .logo strong {
        color: #8ea9e8;
    }

    #header.alt.style6 .logo strong {
        color: #87c5a4;
    }

    body.is-preload #header.alt {
        opacity: 0;
    }

    @media screen and (max-width: 1680px) {

        #header nav a[href="#menu"] {
            padding-right: 3.75em !important;
        }

        #header nav a[href="#menu"]:last-child {
            padding-right: 4.25em !important;
        }

    }

    @media screen and (max-width: 1280px) {

        #header nav a[href="#menu"] {
            padding-right: 4em !important;
        }

        #header nav a[href="#menu"]:last-child {
            padding-right: 4.5em !important;
        }

    }

    @media screen and (max-width: 736px) {

        #header {
            height: 2.75em;
            line-height: 2.75em;
        }

        #header .logo {
            padding: 0 1em;
        }

        #header nav a {
            padding: 0 0.5em;
        }

        #header nav a:last-child {
            padding-right: 1em;
        }

        #header nav a[href="#menu"] {
            padding-right: 3.25em !important;
        }

        #header nav a[href="#menu"]:before,
        #header nav a[href="#menu"]:after {
            right: 0.75em;
        }

        #header nav a[href="#menu"]:last-child {
            padding-right: 4em !important;
        }

        #header nav a[href="#menu"]:last-child:before,
        #header nav a[href="#menu"]:last-child:after {
            right: 1.5em;
        }

    }

    @media screen and (max-width: 480px) {

        #header .logo span {
            display: none;
        }

        #header nav a[href="#menu"] {
            overflow: hidden;
            padding-right: 0 !important;
            text-indent: 5em;
            white-space: nowrap;
            width: 5em;
        }

        #header nav a[href="#menu"]:before,
        #header nav a[href="#menu"]:after {
            right: 0;
            width: inherit;
        }

        #header nav a[href="#menu"]:last-child:before,
        #header nav a[href="#menu"]:last-child:after {
            width: 4em;
            right: 0;
        }

    }

    /* Banner */

    #banner {
        -moz-align-items: center;
        -webkit-align-items: center;
        -ms-align-items: center;
        align-items: center;
        background-image: url("../../images/banner.jpg");
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        padding: 6em 0 2em 0;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-bottom: 0 !important;
        cursor: default;
        height: 60vh;
        margin-bottom: -3.25em;
        max-height: 32em;
        min-height: 22em;
        position: relative;
        top: -3.25em;
    }

    #banner:after {
        -moz-transition: opacity 2.5s ease;
        -webkit-transition: opacity 2.5s ease;
        -ms-transition: opacity 2.5s ease;
        transition: opacity 2.5s ease;
        -moz-transition-delay: 0.75s;
        -webkit-transition-delay: 0.75s;
        -ms-transition-delay: 0.75s;
        transition-delay: 0.75s;
        pointer-events: none;
        background-color: #242943;
        content: '';
        display: block;
        height: 100%;
        left: 0;
        opacity: 0.65;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    #banner h1 {
        font-size: 3.25em;
    }

    #banner>.inner {
        -moz-transition: opacity 1.5s ease, -moz-transform 0.5s ease-out, -moz-filter 0.5s ease, -webkit-filter 0.5s ease;
        -webkit-transition: opacity 1.5s ease, -webkit-transform 0.5s ease-out, -webkit-filter 0.5s ease, -webkit-filter 0.5s ease;
        -ms-transition: opacity 1.5s ease, -ms-transform 0.5s ease-out, -ms-filter 0.5s ease, -webkit-filter 0.5s ease;
        transition: opacity 1.5s ease, transform 0.5s ease-out, filter 0.5s ease, -webkit-filter 0.5s ease;
        padding: 0 !important;
        position: relative;
        z-index: 2;
    }

    #banner>.inner .image {
        display: none;
    }

    #banner>.inner header {
        width: auto;
    }

    #banner>.inner header> :first-child {
        width: auto;
    }

    #banner>.inner header> :first-child:after {
        max-width: 100%;
    }

    #banner>.inner .content {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-align-items: center;
        -webkit-align-items: center;
        -ms-align-items: center;
        align-items: center;
        margin: 0 0 2em 0;
    }

    #banner>.inner .content>* {
        margin-right: 1.5em;
        margin-bottom: 0;
    }

    #banner>.inner .content> :last-child {
        margin-right: 0;
    }

    #banner>.inner .content p {
        font-size: 0.7em;
        font-weight: 600;
        letter-spacing: 0.25em;
        text-transform: uppercase;
    }

    #banner.major {
        height: 75vh;
        min-height: 30em;
        max-height: 50em;
    }

    #banner.major.alt {
        opacity: 0.75;
    }

    #banner.style1:after {
        background-color: #6fc3df;
    }

    #banner.style2:after {
        background-color: #8d82c4;
    }

    #banner.style3:after {
        background-color: #ec8d81;
    }

    #banner.style4:after {
        background-color: #e7b788;
    }

    #banner.style5:after {
        background-color: #8ea9e8;
    }

    #banner.style6:after {
        background-color: #87c5a4;
    }

    body.is-preload #banner:after {
        opacity: 1.0;
    }

    body.is-preload #banner>.inner {
        -moz-filter: blur(0.125em);
        -webkit-filter: blur(0.125em);
        -ms-filter: blur(0.125em);
        filter: blur(0.125em);
        -moz-transform: translateX(-0.5em);
        -webkit-transform: translateX(-0.5em);
        -ms-transform: translateX(-0.5em);
        transform: translateX(-0.5em);
        opacity: 0;
    }

    @media screen and (max-width: 1280px) {

        #banner {
            background-attachment: scroll;
        }

    }

    @media screen and (max-width: 736px) {

        #banner {
            padding: 5em 0 1em 0;
            height: auto;
            margin-bottom: -2.75em;
            max-height: none;
            min-height: 0;
            top: -2.75em;
        }

        #banner h1 {
            font-size: 2em;
        }

        #banner>.inner .content {
            display: block;
        }

        #banner>.inner .content>* {
            margin-right: 0;
            margin-bottom: 2em;
        }

        #banner.major {
            height: auto;
            min-height: 0;
            max-height: none;
        }

    }

    @media screen and (max-width: 480px) {

        #banner {
            padding: 6em 0 2em 0;
        }

        #banner>.inner .content p br {
            display: none;
        }

        #banner.major {
            padding: 8em 0 4em 0;
        }

    }

    /* Main */

    #main {
        background-color: #2a2f4a;
    }

    #main>* {
        border-top: solid 1px rgba(212, 212, 255, 0.1);
    }

    #main>*:first-child {
        border-top: 0;
    }

    #main>*>.inner {
        padding: 4em 0 2em 0;
        margin: 0 auto;
        max-width: 65em;
        width: calc(100% - 6em);
    }

    @media screen and (max-width: 736px) {

        #main>*>.inner {
            padding: 3em 0 1em 0;
            width: calc(100% - 3em);
        }

    }

    #main.alt {
        background-color: transparent;
        border-bottom: solid 1px rgba(212, 212, 255, 0.1);
    }

    /* Contact */

    #contact {
        border-bottom: solid 1px rgba(212, 212, 255, 0.1);
        overflow-x: hidden;
    }

    #contact>.inner {
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        padding: 0 !important;
    }

    #contact>.inner> :nth-child(2n - 1) {
        padding: 4em 3em 2em 0;
        border-right: solid 1px rgba(212, 212, 255, 0.1);
        width: 60%;
    }

    #contact>.inner> :nth-child(2n) {
        padding-left: 3em;
        width: 40%;
    }

    #contact>.inner>.split {
        padding: 0;
    }

    #contact>.inner>.split>* {
        padding: 3em 0 1em 3em;
        position: relative;
    }

    #contact>.inner>.split>*:before {
        border-top: solid 1px rgba(212, 212, 255, 0.1);
        content: '';
        display: block;
        margin-left: -3em;
        position: absolute;
        top: 0;
        width: calc(100vw + 3em);
    }

    #contact>.inner>.split> :first-child:before {
        display: none;
    }

    @media screen and (max-width: 980px) {

        #contact>.inner {
            display: block;
        }

        #contact>.inner> :nth-child(2n - 1) {
            padding: 4em 0 2em 0;
            border-right: 0;
            width: 100%;
        }

        #contact>.inner> :nth-child(2n) {
            padding-left: 0;
            width: 100%;
        }

        #contact>.inner>.split>* {
            padding: 3em 0 1em 0;
        }

        #contact>.inner>.split> :first-child:before {
            display: block;
        }

    }

    @media screen and (max-width: 736px) {

        #contact>.inner> :nth-child(2n - 1) {
            padding: 3em 0 1em 0;
        }

    }

    /* Footer */

    #footer .copyright {
        font-size: 0.8em;
        list-style: none;
        padding-left: 0;
    }

    #footer .copyright li {
        border-left: solid 1px rgba(212, 212, 255, 0.1);
        color: rgba(244, 244, 255, 0.2);
        display: inline-block;
        line-height: 1;
        margin-left: 1em;
        padding-left: 1em;
    }

    #footer .copyright li:first-child {
        border-left: 0;
        margin-left: 0;
        padding-left: 0;
    }

    @media screen and (max-width: 480px) {

        #footer .copyright li {
            display: block;
            border-left: 0;
            margin-left: 0;
            padding-left: 0;
            line-height: inherit;
        }

    }

    /* Wrapper */

    #wrapper {
        -moz-transition: -moz-filter 0.35s ease, -webkit-filter 0.35s ease, opacity 0.375s ease-out;
        -webkit-transition: -webkit-filter 0.35s ease, -webkit-filter 0.35s ease, opacity 0.375s ease-out;
        -ms-transition: -ms-filter 0.35s ease, -webkit-filter 0.35s ease, opacity 0.375s ease-out;
        transition: filter 0.35s ease, -webkit-filter 0.35s ease, opacity 0.375s ease-out;
        padding-top: 3.25em;
    }

    #wrapper.is-transitioning {
        opacity: 0;
    }

    #wrapper>*>.inner {
        padding: 4em 0 2em 0;
        margin: 0 auto;
        max-width: 65em;
        width: calc(100% - 6em);
    }

    @media screen and (max-width: 736px) {

        #wrapper>*>.inner {
            padding: 3em 0 1em 0;
            width: calc(100% - 3em);
        }

    }

    @media screen and (max-width: 736px) {

        #wrapper {
            padding-top: 2.75em;
        }

    }

    /* Menu */

    #menu {
        -moz-transition: -moz-transform 0.35s ease, opacity 0.35s ease, visibility 0.35s;
        -webkit-transition: -webkit-transform 0.35s ease, opacity 0.35s ease, visibility 0.35s;
        -ms-transition: -ms-transform 0.35s ease, opacity 0.35s ease, visibility 0.35s;
        transition: transform 0.35s ease, opacity 0.35s ease, visibility 0.35s;
        -moz-align-items: center;
        -webkit-align-items: center;
        -ms-align-items: center;
        align-items: center;
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -ms-justify-content: center;
        justify-content: center;
        pointer-events: none;
        background: rgba(36, 41, 67, 0.9);
        box-shadow: none;
        height: 100%;
        left: 0;
        opacity: 0;
        overflow: hidden;
        padding: 3em 2em;
        position: fixed;
        top: 0;
        visibility: hidden;
        width: 100%;
        z-index: 10002;
    }

    #menu .inner {
        -moz-transition: -moz-transform 0.35s ease-out, opacity 0.35s ease, visibility 0.35s;
        -webkit-transition: -webkit-transform 0.35s ease-out, opacity 0.35s ease, visibility 0.35s;
        -ms-transition: -ms-transform 0.35s ease-out, opacity 0.35s ease, visibility 0.35s;
        transition: transform 0.35s ease-out, opacity 0.35s ease, visibility 0.35s;
        -moz-transform: rotateX(20deg);
        -webkit-transform: rotateX(20deg);
        -ms-transform: rotateX(20deg);
        transform: rotateX(20deg);
        -webkit-overflow-scrolling: touch;
        max-width: 100%;
        max-height: 100vh;
        opacity: 0;
        overflow: auto;
        text-align: center;
        visibility: hidden;
        width: 18em;
    }

    #menu .inner> :first-child {
        margin-top: 2em;
    }

    #menu .inner> :last-child {
        margin-bottom: 3em;
    }

    #menu ul {
        margin: 0 0 1em 0;
    }

    #menu ul.links {
        list-style: none;
        padding: 0;
    }

    #menu ul.links>li {
        padding: 0;
    }

    #menu ul.links>li>a:not(.button) {
        border: 0;
        border-top: solid 1px rgba(212, 212, 255, 0.1);
        display: block;
        font-size: 0.8em;
        font-weight: 600;
        letter-spacing: 0.25em;
        line-height: 4em;
        text-decoration: none;
        text-transform: uppercase;
    }

    #menu ul.links>li>.button {
        display: block;
        margin: 0.5em 0 0 0;
    }

    #menu ul.links>li:first-child>a:not(.button) {
        border-top: 0 !important;
    }

    #menu .close {
        -moz-transition: color 0.2s ease-in-out;
        -webkit-transition: color 0.2s ease-in-out;
        -ms-transition: color 0.2s ease-in-out;
        transition: color 0.2s ease-in-out;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        border: 0;
        cursor: pointer;
        display: block;
        height: 4em;
        line-height: 4em;
        overflow: hidden;
        padding-right: 1.25em;
        position: absolute;
        right: 0;
        text-align: right;
        text-indent: 8em;
        top: 0;
        vertical-align: middle;
        white-space: nowrap;
        width: 8em;
    }

    #menu .close:before,
    #menu .close:after {
        -moz-transition: opacity 0.2s ease-in-out;
        -webkit-transition: opacity 0.2s ease-in-out;
        -ms-transition: opacity 0.2s ease-in-out;
        transition: opacity 0.2s ease-in-out;
        background-position: center;
        background-repeat: no-repeat;
        content: '';
        display: block;
        height: 4em;
        position: absolute;
        right: 0;
        top: 0;
        width: 4em;
    }

    #menu .close:before {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='20px' height='20px' viewBox='0 0 20 20' zoomAndPan='disable'%3E%3Cstyle%3Eline %7B stroke: %23ffffff%3B stroke-width: 2%3B %7D%3C/style%3E%3Cline x1='0' y1='0' x2='20' y2='20' /%3E%3Cline x1='20' y1='0' x2='0' y2='20' /%3E%3C/svg%3E");
    }

    #menu .close:after {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='20px' height='20px' viewBox='0 0 20 20' zoomAndPan='disable'%3E%3Cstyle%3Eline %7B stroke: %239bf1ff%3B stroke-width: 2%3B %7D%3C/style%3E%3Cline x1='0' y1='0' x2='20' y2='20' /%3E%3Cline x1='20' y1='0' x2='0' y2='20' /%3E%3C/svg%3E");
        opacity: 0;
    }

    #menu .close:hover:after,
    #menu .close:active:after {
        opacity: 1;
    }

    body.is-ie #menu {
        background: rgba(42, 47, 74, 0.975);
    }

    body.is-menu-visible #wrapper {
        -moz-filter: blur(0.5em);
        -webkit-filter: blur(0.5em);
        -ms-filter: blur(0.5em);
        filter: blur(0.5em);
    }

    body.is-menu-visible #menu {
        pointer-events: auto;
        opacity: 1;
        visibility: visible;
    }

    body.is-menu-visible #menu .inner {
        -moz-transform: none;
        -webkit-transform: none;
        -ms-transform: none;
        transform: none;
        opacity: 1;
        visibility: visible;
    }

    /*
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

    /* Banner */

    body.is-preload #banner:after {
        opacity: 0.85;
    }

    body.is-preload #banner>.inner {
        -moz-filter: none;
        -webkit-filter: none;
        -ms-filter: none;
        filter: none;
        -moz-transform: none;
        -webkit-transform: none;
        -ms-transform: none;
        transform: none;
        opacity: 1;
    }
    </style>
</body>

</html>
