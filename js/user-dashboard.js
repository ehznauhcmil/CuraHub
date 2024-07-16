document.addEventListener('DOMContentLoaded', function() {
    
    loadAppointments();
});


function loadAppointments() {
    const userDataElement = document.getElementById('user-data');
    const userId = userDataElement.dataset.userId;

    const xhr = new XMLHttpRequest();
    const url = new URL('http://localhost/curahub/appointment-get.php', window.location.href); // Assuming you have this PHP file
    url.searchParams.append('user_id', userId);

    xhr.open('GET', url.toString(), true);

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const appointments = JSON.parse(this.responseText);
                displayAppointments(appointments);
            } catch (e) {
                console.error('JSON parsing error:', e);
                showError('upcoming-list', 'Error loading appointments.');
                showError('past-list', 'Error loading appointments.');
            }
        } else {
            console.error('HTTP error:', this.status, this.statusText);
            showError('upcoming-list', 'Error loading appointments.');
            showError('past-list', 'Error loading appointments.');
        }
    };

    xhr.onerror = function() {
        console.error('Network error');
        showError('upcoming-list', 'Network error. Please try again later.');
        showError('past-list', 'Network error. Please try again later.');
    };

    xhr.send();
}

function displayAppointments(appointments) {
    const today = new Date();
    const upcomingList = document.getElementById('upcoming-list');
    const pastList = document.getElementById('past-list');
    
    
    upcomingList.innerHTML = '';
    pastList.innerHTML = '';

    appointments.forEach(appointment => {
        const appointmentDate = new Date(appointment.date);
        let statusClass = 'pending'; 
        let statusType = "Pending";
        if (appointment.status && appointment.status.toLowerCase() === 'confirmed') {
            statusClass = 'confirmed';
            statusType = "Confirmed";
        } else if (appointment.status && appointment.status.toLowerCase() === 'completed') {
            statusClass = 'completed';
            statusType = "Completed";
        }
        const listItem = document.createElement('div');
        listItem.innerHTML = `
        <div class="list-item">
            <div class="list-item-header">
                <h3>Dr. ${appointment.first_name} ${appointment.last_name} (${appointment.specialization})</h3>
                <div class="status ${statusClass}">${statusType}</div> 
            </div>
            <div class="item-details">
                <div><p>Date:</p></div>
                <div><p>${appointment.date}</p></div>
                <div><p>Time:</p></div>
                <div><p>${appointment.start_time} - ${appointment.end_time}</p></div>
                <div><p>Hospital:</p></div>
                <div><p>${appointment.hospital_name}</p></div>
            </div>
        </div>
        `;

        if (appointmentDate >= today) {
            upcomingList.appendChild(listItem);
        } else {
            pastList.appendChild(listItem);
        }
    });
}

