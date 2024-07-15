$(document).ready(function() {
    // Load doctor list on page load
    loadDoctors();

    // Search functionality
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#doctor-list div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

function loadDoctors() {
    $.getJSON("doctors-get-details.php", function(data) {
        var doctorList = $("#doctor-list");
        doctorList.empty();
        $.each(data, function(index, doctor) {
            doctorList.append('<div class="doctor-item" data-provider-id="' + doctor.provider_id + '">' + doctor.first_name + ' ' + doctor.last_name + ' - ' + doctor.specialization + '</div>');
        });

        // Event listener for clicking a doctor
        $(".doctor-item").click(function() {
            loadDoctorDetails($(this).data("provider-id"));
        });
    });
}

function loadDoctorDetails(providerId) {
    $.getJSON("doctors-get-details.php", function(data) {
        var doctorDetails = $("#doctor-details");
        // ... (Code to filter data based on providerId and display details)
    });
}
