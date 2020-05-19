<?php


session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/style.css" rel="stylesheet" type="text/css" >
    <title>Book now!</title>


</head>

<body>



    <div class="center">
        <h1>Booking</h1>

        <br>
        <br>

        <style>
        #message {

            color: red;
            font-size: 2em;
            font-weight: 2em;
        }
        </style>



        <p id="message">
        </p>





        <form method="post" action="payment" name="form" id="form" onsubmit="return validateForm()">
            <div class="fields">


                <div class="field half">
                    <label for="date-from">Date from</label>
                    <input type="text" name="datefrom" id="date-from" />
                </div>

                <div class="field half">
                    <label for="date-to">Date to</label>
                    <input type="text" name="dateto" id="date-to" />
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






            </div>

            <div class="center">

                <div class="field half text-right">
                    <label>&nbsp;</label>


                    <input type="hidden" name="carID" value="<?php echo  $carid; ?>">
                    <input type="submit" value="Book Now" class="primary" name="submit" />



                </div>

            </div>
        </form>





    </div>




    <script>
    let message = document.getElementById("message");

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
    </script>






    <style>
    .center {
        text-align: center;


    }


    h2 {
        color: red;
    }
    </style>
	
</body>

</html>
