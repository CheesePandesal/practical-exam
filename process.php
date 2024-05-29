<?php
// Retrieve form data
$plateNo = $_POST['plate-no'];
$currentColor = $_POST['current-color-selection'];
$targetColor = $_POST['target-color-selection'];



$conn = new mysqli('localhost', 'root', '', 'paint-jobs');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO `paint-progress` (plateNo, currentColor, targetColor) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plateNo, $currentColor, $targetColor);
    $stmt->execute();
    echo "registration sucessfully";
    $stmt->close();
    $conn->close();
    header("Location: paint-jobs.html");
}
