<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: register.html");
    exit();
}

// Initialize messages array
if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = []; // Initialize message array if not set
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = trim($_POST['message']);
    if (!empty($message)) {
        // Store message with username (this would typically come from session)
        $_SESSION['messages'][] = [
            'username' => $_SESSION['username'], // Assuming you have stored the username in the session
            'message' => htmlspecialchars($message),
            'timestamp' => date('Y-m-d H:i:s') // Add timestamp for messages
        ];
    }
}

// Display messages
function displayMessages() {
    if (empty($_SESSION['messages'])) {
        echo '<p>No messages yet.</p>';
    } else {
        foreach ($_SESSION['messages'] as $msg) {
            echo '<div class="message">';
            echo '<strong>' . htmlspecialchars($msg['username']) . '</strong>';
            echo '<p>' . $msg['message'] . '</p>';
            echo '<span class="timestamp">' . $msg['timestamp'] . '</span>';
            echo '</div>';
        }
    }
}

// Call the function to display messages
displayMessages();
?>
