<?php


session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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

        input {
            color: white;
            background: #292929;
        }

        </style>



        <p id="message">
        </p>





        <form method="post" action="payment" name="form" id="form" onsubmit="return validateForm()" autocomplete="on">
            <div class="fields">


                <div class="field half">
                    <label for="date-from">Date from</label>
                    <input type="date" name="datefrom" id="date-from" onchange="changeMinDate(this.value)" required/>
                </div>

                <div class="field half">
                    <label for="date-to">Date to</label>
                    <input type="date" name="dateto" id="date-to" onchange="changeMaxDate(this.value)" required/>
                </div>

                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" required />
                </div>

                <div class="field half">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required/>
                </div>

                <div class="field half">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" placeholder="10 digit mobile number" pattern="[0-9]{10}" required/>
                </div>






            </div>

            <div class="center">

                <div class="field half text-right">
                    <label>&nbsp;</label>


                    <input type="hidden" name="carID" value="<?php echo  $carid; ?>">
                    <input type="submit" value="Proceed to Checkout" class="primary" name="submit" />



                </div>

            </div>
        </form>





    </div>




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
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        return today;
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
