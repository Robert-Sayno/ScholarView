<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-image: url('../tugume.jpeg');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 20%;
            background-color: #2c3e50;
            padding: 20px;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .dashboard-container {
            width: 80%;
            max-width: 1200px;
            padding: 20px;
        }

        h2 {
            color: #3498db;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin-top: 100px;
        }

        nav li {
            margin-bottom: 20px;
            font-size: 20px;
        
        }

        nav a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #3498db;
        }

        .content-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .main-content {
            width: 70%; /* Adjusted to 70% for better layout */
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 120px;
        }
        p{
            font-size: 30px;
        }

        .logout-btn {
            display: block; /* Make the logout link a block element for better spacing */
            margin-top: 20px; /* Add some top margin for separation */
            color: #fff;
            background-color: #e74c3c;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="display_users.php">Manage Users</a></li>
                <li><a href="display_messages.php">View Messages</a></li>
                <li><a href="display_tours.php">Manage Tours</a></li>
            </ul>
        </nav>
    </div>

    <div class="dashboard-container">
        <h2>Welcome to the Admin Dashboard</h2>

        <div class="content-section">
            <div class="main-content">
                <!-- Add more content specific to the main admin dashboard if needed -->
                <p>Manage and monitor your platform with ease. Use the sidebar to navigate through different sections and take 
                    control of user data, messages, and tour information.</p>
            </div>
        </div>

        <a class="logout-btn" href="logout.php">Logout</a>
    </div>
</body>

</html>