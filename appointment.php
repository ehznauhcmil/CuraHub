<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="icon" href="resources/site-logo.png" type="image/png"> <!-- INSERT SITE LOGO -->
    <!-- IMPORT FILES -->
    <link rel="stylesheet" href="css/appointment.css.css">
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-navtop">
            <p><a href="home-screen.php"><img src="resources/back-icon.png" alt="Go Back to Homepage Icon"></a></p>
            <p><a href="userdashboard.html"><img src="resources/dashboard-icon.png" alt="User Dashboard Icon"></a></p>
            <p><a href="appointment.html"><img src="resources/calendar-icon.png" alt="Appointment Icon"></a></p>
            <p><a href="userprofile.php"><img src="resources/profile-icon.png" alt="Profile Icon"></a></p>
            <p><a href="medication.html"><img src="resources/medication-icon.png" alt="Medication Icon"></a></p>
            <p><a href="medicalReport.php"><img src="resources/medreport-icon.png" alt="Medical Report Icon"></a></p>
            <p><a href="#"><img src="resources/settings-icon.png" alt="Settings Icon"></a></p>
        </div>
        <div class="sidebar-navbottom">
            <p><a href="#"><img src="resources/signout-icon.png" alt="Sign Out Icon"></a></p>
        </div>
    </aside>

    <main>

        <!-- Calendar Section -->
        <div class="row">
            <div class="calendar-container">
                <header>
                    <h2 class="calendar-month">July 2024</h2>
                    <div class="calendar-icons">
                        <span><img src="resources/chevron-left.png" alt="Go to Previous Month"></span>
                        <span><img src="resources/chevron-right.png" alt="Go to Next Month Icon"></span>
                    </div>
                </header>
                <div class="calendar-body">
                    <ul class="days-of-the-week">
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                        <li>Sun</li>
                    </ul>
                    <ul class="dates">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li class="active">7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                        <li>16</li>
                        <li>17</li>
                        <li>18</li>
                        <li>19</li>
                        <li>20</li>
                        <li>21</li>
                        <li>22</li>
                        <li>23</li>
                        <li>24</li>
                        <li>25</li>
                        <li>26</li>
                        <li>27</li>
                        <li>28</li>
                        <li>29</li>
                        <li>30</li>
                        <li>31</li>
                        <li class="inactive">1</li>
                        <li class="inactive">2</li>
                        <li class="inactive">3</li>
                        <li class="inactive">4</li>
                    </ul>
                </div>
            </div>

            <!-- Schedule Again Section -->
            <div class="schedule-again-container">
                <h2>Schedule Again</h2>
                <div class="schedule-again-icons">
                    <a href="#"><img src="resources/general-consultation-icon.png" alt="General Consultation Icon"></a>
                    <a href="#"><img src="resources/dental-icon.png" alt="Dental Icon"></a>
                    <a href="#"><img src="resources/blood-test-icon.png" alt="Blood Test Icon"></a>
                    <a href="#"><img src="resources/diabetes-test-icon.png" alt="Diabetes Test Icon"></a>
                    <a href="#"><img src="resources/medicine-icon.png" alt="Medicine Icon"></a>
                    <a href="#"><img src="resources/bandage-icon.png" alt="Bandage Icon"></a>
                    <a href="#"><img src="resources/vaccine-icon.png" alt="Vaccine Icon"></a>
                    <a href="#"><img src="resources/pregnancy-care-icon.png" alt="Pregnancy Test Icon"></a>
                </div>
            </div>
        </div>

        <!-- Appointment Details Section -->
        <div class="appointments-container">
            <div class="apptmt-buttons">
                <div class="toggler-container">
                    <button class="upcoming-apptmt-button">Upcoming</button>
                    <button class="past-apptmt-button">Past</button>
                </div>
                <div class="appointment-buttons-container">
                    <button class="edit-apptmt-button">Edit</button>
                    <button class="add-apptmt-button">Add Appointment</button>
                </div>
            </div>
            <div class="appointment-list">
                <div class="appointment-card">
                    <div class="apptmt-schedule">
                        <h3>14 June 2024</h3>
                        <p class="time">11:00 AM</p>
                    </div>
                    <hr>
                    <div class="apptmt-type">
                        <h4>Type</h4>
                        <p>Consultation</p>
                    </div>
                    <hr>
                    <div class="apptmt-doctor">
                        <h4>Doctor</h4>
                        <p>Dr. Alan</p>
                    </div>
                    <hr>
                    <div class="apptmt-dept">
                        <h4>Department</h4>
                        <p>Outpatient</p>
                    </div>
                </div>
                <div class="appointment-card">
                    <div class="apptmt-schedule">
                        <h3>11 July 2024</h3>
                        <p class="time"> 9:00 AM</p>
                    </div>
                    <hr>
                    <div class="apptmt-type">
                        <h4>Type</h4>
                        <p>Blood Test</p>
                    </div>
                    <hr>
                    <div class="apptmt-doctor">
                        <h4>Doctor</h4>
                        <p>Dr. Albert</p>
                    </div>
                    <hr>
                    <div class="apptmt-dept">
                        <h4>Department</h4>
                        <p>Pathology</p>
                    </div>
                </div>
                <div class="appointment-card">
                    <div class="apptmt-schedule">
                        <h3>02 Aug 2024</h3>
                        <p class="time"> 2:00 PM</p>
                    </div>
                    <hr>
                    <div class="apptmt-type">
                        <h4>Type</h4>
                        <p>Vaccination</p>
                    </div>
                    <hr>
                    <div class="apptmt-doctor">
                        <h4>Doctor</h4>
                        <p>Dr. Shanice</p>
                    </div>
                    <hr>
                    <div class="apptmt-dept">
                        <h4>Department</h4>
                        <p>Immunology</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.querySelector('.edit-apptmt-button').addEventListener('click', function() {
            const editButton = this;
            // switch between edit and done button
            const isEditing = editButton.textContent === 'Edit'; // check if button is edit
            editButton.textContent = isEditing ? 'Done' : 'Edit'; // if-else

            // select the appointment cards to be edited 
            const appointmentCards = document.querySelectorAll('.appointment-card');

            // loop throught each card
            appointmentCards.forEach(card => {
                if (isEditing) { // if in editing mode
                    if (!card.querySelector('.delete-apptmt-button')) { // check if button alrdy exist
                        const deleteButton = document.createElement('button');  // create delete button
                        deleteButton.textContent = 'Delete';
                        deleteButton.classList.add('delete-apptmt-button'); // add class name to button
                        deleteButton.addEventListener('click', function() {
                            card.remove(); // remove card when clicked
                        });
                        card.appendChild(deleteButton); // attach the button to the card
                    }
                } else { // if not in editing mode 
                    const deleteButton = card.querySelector('.delete-apptmt-button');
                    if (deleteButton) { // if delete button exist 
                        deleteButton.remove(); // remove the delete button
                    }
                }
            });
        });
    </script>
</body>

</html>