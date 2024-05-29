<?php
$conn = new mysqli('localhost', 'root', '', 'paint-jobs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$query = "SELECT * FROM `paint_progress` WHERE plateNo = $id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $insertQuery = "INSERT INTO `shop_performance` (plateNo, currentColor, targetColor) VALUES ('" . $row["plateNo"] . "', '" . $row["currentColor"] . "', '" . $row["targetColor"] . "')";

    if ($conn->query($insertQuery) === TRUE) {
        $deleteQuery = "DELETE FROM `paint_progress` WHERE plateNo = $id";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "Row inserted into shop_performance table and deleted from paint_progress table successfully";
        } else {
            echo "Error deleting row from paint_progress table: " . $conn->error;
        }
    } else {
        echo "Error inserting row into shop_performance table: " . $conn->error;
    }
} else {
    echo "No row found with the given id";
}

$conn->close();
