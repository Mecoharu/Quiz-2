<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board - Find a Friend</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your CSS file -->
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #0f4279;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #002c5c;
            color: white;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
        }

        .header-container a {
            color: white;
            text-decoration: none;
        }

        .header-container a:hover {
            color: #60d3ec;
        }

        .header-container .feature {
            margin: 0 5px;
        }

        /* Message Board Container */
        .message-container {
            max-width: 900px;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 150px auto;
        }

        .message-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .message-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .message-container label {
            font-size: 16px;
        }

        .message-container textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            resize: vertical; /* Allow vertical resizing */
        }

        .message-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .message-container button:hover {
            background-color: #45a049;
        }

        #messages-container {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .message {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .message:last-child {
            border-bottom: none;
        }

        .timestamp {
            font-size: 0.9em;
            color: #888;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-button a {
            text-decoration: none;
            background-color: #2196F3;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .back-button a:hover {
            background-color: #0b7dda;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Find A Friend</h1>
        <div class="header-container">
            <div class="feature">
                <a href="browse.html">Browse Friends |</a>
            </div>
            <div class="feature">
                <a href="message_board.html">Message board |</a>
            </div>
            <div class="feature">
                <a href="schedule.html">Schedule a Meeting |</a>
            </div>
            <div class="feature">
                <a href="review.html">Review Your Friend |</a>
            </div>
            <div class="feature">
                <a href="mailto:azkizhraa@gmail.com">Contact Us</a>
            </div>            
            
        </div>
    </div>

    <div class="message-container">
        <h2>Message Board</h2>
        <form action="{{url('/store_message')}}" method="POST">
            @csrf
            <label for="message">Write a message:</label>
            <textarea id="message" name="message" placeholder="Type your message..." required></textarea>
            <button type="submit">Post Message</button>
        </form>

        <div id="messages-container">
            @foreach($messages as $message)
            <div class="message">
                <p>{{$message->message}}</p>
                <p class="timestamp">{{$message->created_at}}</p>
            </div>
            @endforeach

        </div>

        <div class="back-button">
            <a href="homepage.html">Back to Homepage</a>
        </div>
    </div>
</body>
</html>
