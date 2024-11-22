<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util.*, java.text.SimpleDateFormat" %>
<%
    // Get the session
    HttpSession session = request.getSession(false); // Use existing session if available
    if (session == null || session.getAttribute("loggedin") == null) {
        // Redirect if the user is not logged in
        response.sendRedirect("register.html");
        return;
    }

    // Initialize messages list in the session if not set
    if (session.getAttribute("messages") == null) {
        session.setAttribute("messages", new ArrayList<Map<String, String>>());
    }

    // Handle form submission
    if (request.getMethod().equalsIgnoreCase("POST")) {
        String message = request.getParameter("message").trim();
        if (message != null && !message.isEmpty()) {
            // Retrieve messages list from session
            List<Map<String, String>> messages = (List<Map<String, String>>) session.getAttribute("messages");

            // Create a message map
            Map<String, String> msg = new HashMap<>();
            msg.put("username", (String) session.getAttribute("username")); // Assuming username is stored in session
            msg.put("message", message.replaceAll("<", "&lt;").replaceAll(">", "&gt;")); // Sanitize message input
            msg.put("timestamp", new SimpleDateFormat("yyyy-MM-dd HH:mm:ss").format(new Date())); // Timestamp

            // Add the message to the list
            messages.add(msg);

            // Update session
            session.setAttribute("messages", messages);
        }
    }

    // Method to display messages
    void displayMessages(List<Map<String, String>> messages) {
%>
        <% if (messages == null || messages.isEmpty()) { %>
            <p>No messages yet.</p>
        <% } else { %>
            <% for (Map<String, String> msg : messages) { %>
                <div class="message">
                    <strong><%= msg.get("username") %></strong>
                    <p><%= msg.get("message") %></p>
                    <span class="timestamp"><%= msg.get("timestamp") %></span>
                </div>
            <% } %>
        <% } %>
<%
    }
%>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .message {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            background-color: #fff;
        }
        .timestamp {
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Message Board</h1>
    <form method="post">
        <textarea name="message" rows="4" cols="50" placeholder="Write your message..." required></textarea><br>
        <button type="submit">Send</button>
    </form>

    <h2>Messages:</h2>
    <% 
        // Retrieve messages from session and display them
        List<Map<String, String>> messages = (List<Map<String, String>>) session.getAttribute("messages");
        displayMessages(messages);
    %>
</body>
</html>
