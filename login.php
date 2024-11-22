
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util.*, javax.servlet.http.*, javax.servlet.*" %>
<%
    // Simulated user data (replace with actual user authentication and registration logic)
    List<Map<String, String>> users = new ArrayList<>();
    users.add(Map.of("username", "user1", "password", "password1", "email", "user1@example.com"));
    users.add(Map.of("username", "user2", "password", "password2", "email", "user2@example.com"));

    HttpSession session = request.getSession();
    String action = request.getParameter("action");

    if (request.getMethod().equalsIgnoreCase("POST") && action != null) {
        if (action.equals("login")) {
            // Handle login logic
            String username = request.getParameter("username");
            String password = request.getParameter("password");

            boolean validUser = false;
            for (Map<String, String> user : users) {
                if (user.get("username").equals(username) && user.get("password").equals(password)) {
                    validUser = true;
                    session.setAttribute("loggedin", true); // Set session variable
                    response.sendRedirect("homepage.html"); // Redirect to homepage
                    return;
                }
            }

            if (!validUser) {
                out.println("<script>alert('Invalid username or password!'); window.location.href='register.html';</script>");
            }

        } else if (action.equals("register")) {
            // Handle registration logic
            String username = request.getParameter("username");
            String password = request.getParameter("password");
            String email = request.getParameter("email");

            boolean usernameExists = users.stream()
                                          .anyMatch(user -> user.get("username").equals(username));

            if (usernameExists) {
                out.println("<script>alert('Username already taken!'); window.location.href='register.html';</script>");
                return;
            }

            // Add user to the simulated users list (Note: Not persistent, just for demo purposes)
            users.add(Map.of("username", username, "password", password, "email", email));
            session.setAttribute("loggedin", true); // Automatically log in the user
            response.sendRedirect("homepage.html"); // Redirect to homepage
            return;
        }
    }
%>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register - Find a Friend</title>
    <style>
        /* Add your styling here */
        body {
            font-family: Arial, sans-serif;
            background-color: #0f4279;
            margin: 0;
            padding: 0;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Login or Register</h2>
    <form method="post" action="">
        <!-- Login Form -->
        <h3>Login</h3>
        <input type="hidden" name="action" value="login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    
    <form method="post" action="">
        <!-- Register Form -->
        <h3>Register</h3>
        <input type="hidden" name="action" value="register">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>

			
