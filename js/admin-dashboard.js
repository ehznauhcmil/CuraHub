document.getElementById('user-button').classList.add('menu-buttons-selected');

function selectNavItem(selectedNav) {
    // Hide all content divs
    document.getElementById('users').style.display = 'none';
    document.getElementById('appointments').style.display = 'none';
    document.getElementById('register').style.display = 'none';

    document.getElementById('user-button').classList.remove('menu-buttons-selected');
    document.getElementById('appointments-button').classList.remove('menu-buttons-selected');
    document.getElementById('register-button').classList.remove('menu-buttons-selected');

    // Show the selected content div
    if (selectedNav === 'nav1') {
        document.getElementById('users').style.display = 'flex';
        document.getElementById('user-button').classList.add('menu-buttons-selected');
    } else if (selectedNav === 'nav2') {
        document.getElementById('appointments').style.display = 'flex';
        document.getElementById('appointments-button').classList.add('menu-buttons-selected');
    } else if (selectedNav === 'nav3') {
        document.getElementById('register').style.display = 'flex';
        document.getElementById('register-button').classList.add('menu-buttons-selected');
    }
}


function loadMoreAppointments(status) {
    // Select all hidden appointments and display them
    var hiddenAppointments = document.querySelectorAll('#' + status + '-section .details-container[style="display: none;"]');
    hiddenAppointments.forEach(function(appointment) {
        appointment.style.display = 'flex';
    });
 
    // Hide the load more button after displaying all appointments
    var loadMoreBtn = document.getElementById('expand-' + status + '-button');
    if (loadMoreBtn) {
        loadMoreBtn.style.display = 'none';
    }
}

document.getElementById("logoutButton").addEventListener("click", function() {

        window.location.href = "login.php";
});

document.addEventListener('DOMContentLoaded', function() {
       // Get all status elements
       var statusDivs = document.querySelectorAll('.status');
       
       // Iterate through each status element
       statusDivs.forEach(function(statusDiv) {
           // Get the status value from the data attribute
           var status = statusDiv.getAttribute('data-status');
           
           // Determine the background color based on the status
           var backgroundColor;
           switch (status) {
               case "Confirmed":
                   backgroundColor = "#28a745"; // Green for success
                   break;
               case "Completed":
                   backgroundColor = "#ffc107"; // Yellow for warning
                   break;
               case "Pending":
                   backgroundColor = "#BD0000"; // Red for error
                   break;
               default:
                   backgroundColor = "#6c757d"; // Grey for default or unknown status
                   break;
           }
           
           // Set the background color
           statusDiv.style.backgroundColor = backgroundColor;
       });
   });
   
   // Get the modal
   var modal = document.getElementById("statusModal");
   
   // Get the button that opens the modal
   var statusDivs = document.querySelectorAll('.status');
   
// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks on the status div, open the modal
statusDivs.forEach(function(statusDiv) {
    statusDiv.addEventListener('click', function() {
        var status = statusDiv.getAttribute('data-status');
        var appointmentId = statusDiv.getAttribute('data-appointment_id');
        document.getElementById("appointment_id").value = appointmentId;
        modal.style.display = "block";
    });
});

document.getElementById("closeButton").onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}