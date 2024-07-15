<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medications</title>
    <link rel="icon" href="resources/site-logo.png" type="image/png"> <!-- INSERT SITE LOGO -->
    <!-- IMPORT FILES -->
    <link rel="stylesheet" href="medication.css">
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
        <div class="past-appointment-prescriptions-container">
            <h2>Past Appointment Prescriptions</h2>
            <div class="scroller">
                <div class="past-appointment-prescription-card">    
                    <h2>21 June 2024 | Cough and Flu</h2>
                    <hr class="horizontal-divider">
                    <div class="card-content">
                        <div class="left">
                            <p><strong>Type: </strong>General Consultation</p>
                            <p><strong>Doctor: </strong>Dr. Amalina Skridri</p>
                            <p><strong>Symptoms Log: </strong></p>
                            <ul>
                                <li>Shortness of Breath</li>
                                <li>Chest Pain</li>
                                <li>Blocked Nose</li>
                            </ul>
                            <p><strong>Notes: </strong></p>
                            <p>Been having these symptoms for one week</p>
                        </div>
                        <hr class="vertical-divider">
                        <div class="right">
                            <p><strong>Prescription: </strong></p>
                            <p><strong>Bromhexine | 8 mg</strong></p>
                            <p>Twice daily (morning and evening)</p>
                            <p>Before food, take as required</p>
                            <p><strong>Dextromethorphan | 30 mg</strong></p>
                            <p>Every 6-8 hours as needed</p>
                            <p>Before food, chew before swallowing</p>
                        </div>
                    </div>
                </div>

                <div class="past-appointment-prescription-card">    
                    <h2>13 April 2024  |  Gastritis</h2>
                    <hr class="horizontal-divider">
                    <div class="card-content">
                        <div class="left">
                            <p><strong>Type: </strong>Emergency Walk-in</p>
                            <p><strong>Doctor: </strong>Dr. Khairul Ali Khan</p> <!-- check point --> 
                            <p><strong>Symptoms Log: </strong></p>
                            <ul>
                                <li>Stomach Bloating</li>
                                <li>Heartburn</li>
                                <li>Bleching</li>
                            </ul>
                            <p><strong>Notes: </strong></p>
                            <p>Started experiencing all listed symptoms after eating spicy food.</p>
                        </div>
                        <hr class="vertical-divider">
                        <div class="right">
                            <p><strong>Prescription: </strong></p>
                            <p><strong>Famotidine | 40 mg</strong></p>
                            <p>Thrice daily (morning, noon and evening)</p>
                            <p>After food, take as required</p>
                            <p><strong>Alumag | 250 mg</strong></p>
                            <p>Take as required, at most twice a day</p>
                            <p>After food, chew before swallowing</p>
                        </div>
                    </div>
                </div>

                <div class="past-appointment-prescription-card">    
                    <h2>05 January 2024  |  Food Poisoning</h2>
                    <hr class="horizontal-divider">
                    <div class="card-content">
                        <div class="left">
                            <p><strong>Type: </strong>Outpatient</p>
                            <p><strong>Doctor: </strong>Dr. Terrance Goh</p> <!-- check point --> 
                            <p><strong>Symptoms Log: </strong></p>
                            <ul>
                                <li>Diarrhea</li>
                                <li>Stomachache</li>
                                <li>Nausea</li>
                            </ul>
                            <p><strong>Notes: </strong></p>
                            <p>Just came back from travels in Indonesia. Already went to the doctors before flying back but symptoms still persisted.</p>
                        </div>
                        <hr class="vertical-divider">
                        <div class="right">
                            <p><strong>Prescription: </strong></p>
                            <p><strong>Oral electrolytes | 10 packets</strong></p>
                            <p>Mix thoroughly with 250ml of water</p>
                            <p>Take as required, suggested to finish</p>
                            <p><strong>Saccharomyces boulardii | 250 mg</strong></p>
                            <p>Take twice daily as instructed</p>
                            <p>Must finished the course of medication</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>