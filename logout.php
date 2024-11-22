<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%
    // Invalidate the session
    HttpSession session = request.getSession(false); // Fetch existing session if it exists
    if (session != null) {
        session.invalidate(); // Destroy the session
    }

    // Redirect to the login page
    response.setHeader("Refresh", "3; URL=register.html"); // Redirect after 3 seconds
%>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out</title>
    <style>
        /* Optional: Add some styling for user experience */
        body {
            font-family: Arial, sans-serif;
            background-color: #0f4279;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <p>You have been logged out. Redirecting to the login page...</p>
</body>
</html>
