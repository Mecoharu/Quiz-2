<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_id = $_POST['request_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];

    $sql = "UPDATE requests SET meeting_date = '$date', meeting_time = '$time', location = '$location', status = 'scheduled' WHERE id = '$request_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Meeting scheduled successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
