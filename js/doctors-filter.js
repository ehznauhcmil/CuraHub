$(document).ready(function () {
    $("#searchInput").on("input", function () {
        var searchTerm = $(this).val();
        $.ajax({
            url: "doctors-filter.php",
            method: "GET",
            data: { query: searchTerm },
            success: function (response) {
                $(".doctor-list").html(response);
            }
        });
    });
});