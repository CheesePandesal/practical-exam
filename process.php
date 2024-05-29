<?php
// Retrieve form data
$plateNo = $_POST['plate-no'];
$currentColor = $_POST['current-color-selection'];
$targetColor = $_POST['target-color-selection'];



$conn = new mysqli('localhost', 'root', '', 'paint-jobs');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT COUNT(*) AS count FROM paint_progress";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$count = $row['count'];


if ($count < 5) {
    $query = "INSERT INTO paint_progress (plateNo, currentColor, targetColor) VALUES ('$plateNo', '$currentColor', '$targetColor')";
} else {

    $query = "INSERT INTO paint_job_queue (plateNo, currentColor, targetColor) VALUES ('$plateNo', '$currentColor', '$targetColor')";
}


if ($conn->query($query) === TRUE) {
    header("Location: paint-jobs.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
