<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Car4All</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Used by CircleCI deplyed project -->
    <link rel="stylesheet" href="/public/css/booking.css">

    <!-- Used by local testing -->
    <link rel="stylesheet" href="/css/booking.css">

</head>

<body>

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
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">LOGIN</a></li>
                    <li><a href="#">REGISTER</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mapcontainer">
        <div class="map" id="map">
            <div class="main-block">
                <h1>Booking</h1>
                <form method="post" action="payment" name="form" id="form" onsubmit="return validateForm()" autocomplete="on">
                    <hr>
                    <label id="icon" for="name"><i class="fas fa-user"></i></label>
                    <input type="text" name="name" id="name" placeholder="Name" required />
                    <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <label id="icon" for="name"><i class="fas fa-phone"></i></label>
                    <input type="tel" name="phone" id="phone" placeholder="10 digit mobile number" pattern="[0-9]{10}" required />
                    <label id="icon" for="name"><i class="fas fa-calendar"></i></label>
                    <input type="text" name="dateto" id="date-to" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Book Until When" onchange="changeMaxDate(this.value)" required />
                    <input class="hide" type="date" name="datefrom" id="date-from" onchange="changeMinDate(this.value)" hidden />
                    

                    <hr>
                    <div class="btn-block">
                        <input type="hidden" name="carID" value="<?php echo  $carid; ?>">
                        <p>By clicking Register, you agree on our <a>Privacy Policy</a>.</p>
                        <button type="submit" class="button"><span>Checkout</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="container-fluid bg-4 text-center" style="padding:10px">
        <p>© 2020 Copyright: H-Tue-Group-35</p>
    </footer>


    <script>
        let message = document.getElementById("message");
        document.getElementById("date-from").setAttribute("min", currentDate());
        document.getElementById("date-to").setAttribute("min", currentDate());


        function changeMinDate(date) {
            if (date == "") {
                document.getElementById("date-to").setAttribute("min", currentDate());
            }
            document.getElementById("date-to").setAttribute("min", date);
        }

        function changeMaxDate(date) {
            document.getElementById("date-from").setAttribute("max", date);
        }


        function validateForm() {
            var datefrom = document.forms["form"]["datefrom"].value;
            var dateto = document.forms["form"]["dateto"].value;
            var phone = document.forms["form"]["phone"].value;
            var name = document.forms["form"]["name"].value;
            var email = document.forms["form"]["email"].value;

            if (datefrom == "") {
                message.innerHTML = "Date from must be filled out"
                return false;
            } else if (dateto == "") {
                message.innerHTML = "Date to must be filled out"
                return false;
            } else if (phone == "") {
                message.innerHTML = "Phone to must be filled out"
                return false;
            } else if (name == "") {
                message.innerHTML = "Name to must be filled out"
                return false;
            } else if (email == "") {
                message.innerHTML = "Email to must be filled out"
                return false;
            } else {
                console.log("ready")
            }
        }

        function currentDate() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }

            today = yyyy + '-' + mm + '-' + dd;
            return today;
        }
    </script>

</body>

</html>