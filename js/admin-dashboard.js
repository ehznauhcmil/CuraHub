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

