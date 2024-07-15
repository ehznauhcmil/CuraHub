<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/doctors-booking.css">
    <title>Doctor Selection</title>

</head>



<body>
    <div class="main">
        <div class="doctor-selection">
            <div class="spacer"></div>
            <h2>Search for a doctor in our partner facilities</h2>
            <div class="spacer"></div>
            <input type="text" id="search" placeholder="Search doctors...">

            <div id="doctors-list">

            </div>
        </div>
        <div id="doctor-details">
            <p id="choose-doctor">Choose a doctor to proceed</p>
            <div id="details-content" style="display: none;"></div>
            <div id="appointment-booking" style="display: none;">
                <h2>Book Appointment</h2>
                <div class="spacer"></div>
                <input type="date" id="appointment-date">
                <div id="time-slots"></div>
                <button id="submit-appointment" style="display: none;">Book Appointment</button>
            </div>
        </div>
    </div>
</body>

<footer>
    <script src="js/doctors-booking.js"></script>

</footer>

</html>