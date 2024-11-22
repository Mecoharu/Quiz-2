<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $friend_id = $_POST['friend_id'];
    $client_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $sql = "INSERT INTO reviews (friend_id, client_id, rating, review) VALUES ('$friend_id', '$client_id', '$rating', '$review')";
    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
