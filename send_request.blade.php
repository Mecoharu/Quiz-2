<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $friend_id = $_POST['friend_id'];
    $client_id = $_SESSION['user_id']; // Assume the user is logged in and stored in session
    $message = $_POST['message'];

    $sql = "INSERT INTO requests (client_id, friend_id, message, status) VALUES ('$client_id', '$friend_id', '$message', 'pending')";
    if ($conn->query($sql) === TRUE) {
        echo "Request sent successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
