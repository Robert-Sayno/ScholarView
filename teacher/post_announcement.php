<?php
// Start the session at the beginning of the script
session_start();

// Database connection parameters
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'student360';

// Create a new mysqli connection using the provided parameters
$conn = new mysqli($server, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcement_title = $_POST['announcement_title'];
    $announcement_body = $_POST['announcement_body'];

    // Insert the new announcement into the database
    $sql = "INSERT INTO announcements (title, body, posted_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $announcement_title, $announcement_body);

    if ($stmt->execute()) {
        echo "<script>alert('Announcement posted successfully'); window.location.href='post_announcement.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Fetch announcements from the database
$sql = "SELECT title, body, posted_at FROM announcements ORDER BY posted_at DESC";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Announcements</title>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            color: #3498db;
        }

        .nav-header {
            width: 100%;
            background-color: #3498db;
            color: #fff;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .nav-header ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .nav-header li {
            margin: 0;
        }

        .nav-header a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h3 {
            margin-bottom: 10px;
            color: #3498db;
        }

        .form-section input,
        .form-section textarea,
        .form-section button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-section textarea {
            resize: vertical;
        }

        .form-section button {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-section button:hover {
            background-color: #2980b9;
        }

        .announcement {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .announcement h4 {
            margin: 0;
            color: #333;
        }

        .announcement p {
            margin: 10px 0;
        }

        .announcement time {
            font-size: 12px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="nav-header">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="post_announcement.php">Post Announcement</a></li>
            <li><a href="view_announcements.php">View Announcements</a></li>
            <li><a href="manage_students.php">Manage Students</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h2>Teacher Announcements</h2>

        <div class="form-section">
            <h3>Post Announcement</h3>
            <form action="post_announcement.php" method="POST">
                <input type="text" name="announcement_title" placeholder="Title" required>
                <textarea name="announcement_body" placeholder="Body" rows="5" required></textarea>
                <button type="submit">Post Announcement</button>
            </form>
        </div>

        <div class="announcement-section">
            <h3>Recent Announcements</h3>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='announcement'>";
                    echo "<h4>" . htmlspecialchars($row['title']) . "</h4>";
                    echo "<p>" . nl2br(htmlspecialchars($row['body'])) . "</p>";
                    echo "<time>Posted on: " . date('F d, Y h:i A', strtotime($row['posted_at'])) . "</time>";
                    echo "</div>";
                }
            } else {
                echo "<p>No announcements posted yet.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>
