document.addEventListener('DOMContentLoaded', function() {
    loadDoctors();

    document.getElementById('search').addEventListener('input', function() {
        loadDoctors(this.value);
    });

    document.getElementById('appointment-date').addEventListener('change', function() {
        const selectedDate = this.value;
        const selectedDoctorId = localStorage.getItem('selectedDoctorId');
        if (selectedDoctorId) {
            loadTimeSlots(selectedDoctorId, selectedDate);
        }
    });

    document.getElementById('submit-appointment').addEventListener('click', bookAppointment);

    // Set minimum date to tomorrow 
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1); // Add 1 day
    const tomorrowString = tomorrow.toISOString().split('T')[0];
    document.getElementById('appointment-date').min = tomorrowString;

});

function loadDoctors(search = '') {
    const xhr = new XMLHttpRequest();
    const url = new URL('http://localhost/curahub/doctors-get.php', window.location.href);

    url.searchParams.append('search', search);

    xhr.open('GET', url.toString(), true);

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const doctors = JSON.parse(this.responseText);
                let output = '';

                doctors.forEach(function(doctor) {
                    output += `
                        <div class="list-item" data-id="${doctor.doctor_id}">
                            <h3>${doctor.first_name} ${doctor.last_name}</h3>
                            <p>${doctor.specialization}</p>
                        </div>
                    `;
                });

                const doctorList = document.getElementById('doctors-list');
                doctorList.innerHTML = output || '<p>No doctors found.</p>';

                // Add click event listeners to doctor divs
                doctorList.querySelectorAll('.list-item').forEach(doctorDiv => {
                    doctorDiv.addEventListener('click', function() {
                        selectDoctor(this);
                    });
                });

                // Reselect the previously selected doctor if it's still in the list
                const selectedDoctorId = localStorage.getItem('selectedDoctorId');
                if (selectedDoctorId) {
                    const selectedDoctor = doctorList.querySelector(`.list-item[data-id="${selectedDoctorId}"]`);
                    if (selectedDoctor) {
                        selectDoctor(selectedDoctor);
                    }
                }
            } catch (e) {
                console.error('JSON parsing error:', e);
                document.getElementById('doctors-list').innerHTML = '<p>Error processing data. Please try again later.</p>';
            }
        } else {
            console.error('HTTP error:', this.status, this.statusText);
            document.getElementById('doctors-list').innerHTML = '<p>Error loading doctors. Please try again later.</p>';
        }
    }

    xhr.onerror = function() {
        console.error('Network error');
        document.getElementById('doctors-list').innerHTML = '<p>Network error. Please check your connection and try again.</p>';
    }

    xhr.send();
}

function selectDoctor(doctorDiv) {
     // Remove 'selected' class from all doctors
     document.querySelectorAll('.list-item').forEach(div => div.classList.remove('selected'));
     // Add 'selected' class to clicked doctor
     doctorDiv.classList.add('selected');
     // Save the selected doctor's ID
     localStorage.setItem('selectedDoctorId', doctorDiv.dataset.id);
     // Load doctor details
     loadDoctorDetails(doctorDiv.dataset.id);

     const timeSlotsDiv = document.getElementById('time-slots');
     timeSlotsDiv.innerHTML = ''; // Clear previous time slots

     document.getElementById('appointment-date').value = ''; 

    // Show appointment booking section
    document.getElementById('appointment-booking').style.display = 'flex';

    
}

function loadDoctorDetails(doctorId) {
    const xhr = new XMLHttpRequest();
    const url = new URL('doctors-details.php', window.location.href);
    url.searchParams.append('doctor_id', doctorId);

    xhr.open('GET', url.toString(), true);

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const details = JSON.parse(this.responseText);
                const detailsContent = document.getElementById('details-content');
                detailsContent.innerHTML = `
                <div><h2>Dr. ${details.first_name} ${details.last_name}</h2></div>
                <div></div>
                <div><p>Specialization:</p></div>
                <div><p>${details.specialization}</p></div>
                <div><p>Qualification:</p></div>
                <div><p>${details.qualification}</p></div>
                <div><p>University:</p></div>
                <div><p>${details.university}</p></div>
                <div><p>Contact:</p></div>
                <div><p>${details.contact}</p></div>
                <div><h3>Hospital Information:</h3></div>
                <div></div>
                <div><p>Name:</p></div>
                <div><p>${details.hospital_name}</p></div>
                <div><p>Type:</p></div>
                <div><p>${details.hospital_type}</p></div>
                <div><p>Address:</p></div>
                <div><p>${details.hospital_address}</p></div>
                <div><p>Contact:</p></div>
                <div><p>${details.hospital_contact}</p></div>
                `;

                requestAnimationFrame(() => {
                    detailsContent.classList.add('details-grid');
                });

                document.getElementById('choose-doctor').style.display = 'none';
                detailsContent.style.display = 'grid';
            } catch (e) {
                console.error('JSON parsing error:', e);
                document.getElementById('details-content').innerHTML = '<p>Error loading doctor details. Please try again later.</p>';
            }
        } else {
            console.error('HTTP error:', this.status, this.statusText);
            document.getElementById('details-content').innerHTML = '<p>Error loading doctor details. Please try again later.</p>';
        }
    }

    xhr.onerror = function() {
        console.error('Network error');
        document.getElementById('details-content').innerHTML = '<p>Network error. Please check your connection and try again.</p>';
    }

    xhr.send();
}

function loadTimeSlots(doctorId, date) {
    const xhr = new XMLHttpRequest();
    const url = new URL('http://localhost/curahub/time-slots-get.php', window.location.href);
    url.searchParams.append('doctor_id', doctorId);
    url.searchParams.append('date', date);

    xhr.open('GET', url.toString(), true);

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const slots = JSON.parse(this.responseText);
                let output = '';

                slots.forEach(function(slot) {
                    const slotClass = slot.is_booked ? 'time-slot booked' : 'time-slot available';
                    output += `
                        <div class="${slotClass}" data-slot-id="${slot.slot_id}">
                            ${slot.start_time} - ${slot.end_time}
                        </div>
                    `;
                });

                document.getElementById('time-slots').innerHTML = output;

                // Add click event listeners to available time slots
                document.querySelectorAll('.time-slot.available').forEach(slotDiv => {
                    slotDiv.addEventListener('click', function() {
                        selectTimeSlot(this);
                    });
                });
            } catch (e) {
                console.error('JSON parsing error:', e);
                document.getElementById('time-slots').innerHTML = '<p>Error loading time slots. Please try again later.</p>';
            }
        } else {
            console.error('HTTP error:', this.status, this.statusText);
            document.getElementById('time-slots').innerHTML = '<p>Error loading time slots. Please try again later.</p>';
        }
    }

    xhr.onerror = function() {
        console.error('Network error');
        document.getElementById('time-slots').innerHTML = '<p>Network error. Please check your connection and try again.</p>';
    }

    xhr.send();
}

function selectTimeSlot(slotDiv) {
    // Remove 'selected' class from all time slots
    document.querySelectorAll('.time-slot').forEach(div => div.classList.remove('selected'));
    // Add 'selected' class to clicked time slot
    slotDiv.classList.add('selected');
    // Show submit button
    document.getElementById('submit-appointment').style.display = 'block';
}

function bookAppointment() {
    const doctorId = localStorage.getItem('selectedDoctorId');
    const date = document.getElementById('appointment-date').value;
    const selectedSlot = document.querySelector('.time-slot.selected');
    
    if (!doctorId || !date || !selectedSlot) {
        alert('Please select a doctor, date, and time slot.');
        return;
    }

    const slotId = selectedSlot.dataset.slotId;
    const userDataElement = document.getElementById('user-data');
    const userId = userDataElement.dataset.userId; 


    const xhr = new XMLHttpRequest();
    const url = new URL('http://localhost/curahub/appointment-book.php', window.location.href);
    
    xhr.open('POST', url.toString(), true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                if (response.success) {
                    alert('Appointment booked successfully!');
                    // Reload time slots to reflect the new booking
                    loadTimeSlots(doctorId, date);
                } else {
                    alert('Failed to book appointment: ' + response.error);
                }
            } catch (e) {
                console.error('JSON parsing error:', e);
                alert('Error processing response. Please try again later.');
            }
        } else {
            console.error('HTTP error:', this.status, this.statusText);
            alert('Error booking appointment. Please try again later.');
        }
    }

    xhr.onerror = function() {
        console.error('Network error');
        alert('Network error. Please check your connection and try again.');
    }

    const data = `doctor_id=${doctorId}&date=${date}&slot_id=${slotId}&user_id=${userId}`;
    xhr.send(data);
}