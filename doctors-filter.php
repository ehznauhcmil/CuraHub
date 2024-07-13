<?php
require "connection.php";

$query = $_GET['query'];
$sql = "SELECT * FROM healthcarepro WHERE first_name LIKE '%$query%' OR last_name LIKE '%$query%' OR specialization LIKE '%$query%'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="list-item">';
        echo '<h3>' . $row["first_name"] . ' ' . $row["last_name"] . '</h3>';
        echo '<p>' . $row["specialization"] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No doctors found.</p>';
}

$connect->close();
?>