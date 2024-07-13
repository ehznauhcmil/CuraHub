<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/doctors-booking.css">
    <title>Doctor Selection</title>
</head>

<?php
require "connection.php";
$sql = "SELECT * FROM healthcarepro";
$result = $connect->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

$connect->close();
?>

<body>
    <div class="main">
        <div class="doctor-selection">
            <h2>Search for a doctor in our partner facilities</h2>
            <input type="text" id="searchInput" placeholder="Search doctors...">

            <div class="doctor-list">
                <?php foreach ($items as $index => $item): ?>
                    <div class="list-item" data-index="<?php echo $index; ?>">
                        <h3><?php echo $item["first_name"] . " " . $item["last_name"]; ?></h3>
                        <p><?php echo $item["specialization"]; ?></p>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="doctor-details">
            <div class="doctor-info"></div>
            <div class="doctor-availability"></div>
            <div class="booking"></div>
        </div>
    </div>
</body>

<footer>
    <script src="js/doctors-selected.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/doctors-filter.js"></script>
</footer>

</html>