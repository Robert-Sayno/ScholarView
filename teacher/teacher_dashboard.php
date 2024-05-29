<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        body {
            background-image: url('tugume.jpeg');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding: 30px 20px;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.2);
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 20px;
        }

        .sidebar nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar nav ul li a:hover {
            background-color: #3498db;
        }

        .dashboard-container {
            margin-left: 250px;
            padding: 30px;
        }

        .welcome {
            text-align: right;
            margin-bottom: 20px;
            padding-right: 30px;
        }

        .welcome p {
            margin: 0;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .section {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-bottom: 30px;
        }

        .section h3 {
            color: #3498db;
            margin-bottom: 15px;
        }

        .section form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .section input,
        .section select,
        .section textarea {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .section button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .section button:hover {
            background-color: #2980b9;
        }

        @media only screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .dashboard-container {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="view_students.php">View All Students</a></li>
                <li><a href="add_student.php">Add Student</a></li>
                <li><a href="enter_grades.php">Enter Grades</a></li>
                <li><a href="view_grades.php">View Grades</a></li>
                <li><a href="attendance.php">Record Attendance</a></li>
                <li><a href="attendance_reports.php">Attendance Reports</a></li>
                <li><a href="notifications.php">Send Notifications</a></li>
                <li><a href="announcements.php">Post Announcements</a></li>
            </ul>
        </nav>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <!-- Welcome Message -->
        <div class="welcome">
            <h2>Welcome to the Teacher Dashboard</h2>
            <p>Hello <?php echo isset($teacher_name) ? $teacher_name : 'Admin'; ?>! You are currently logged in as <?php echo $_SESSION['email']; ?>. Feel free to navigate through the dashboard options below.</p>
            <a class="logout-btn" href="logout.php">Logout</a>
        </div>

        <!-- Dashboard Image -->
        <div class="image-container">
            <img src="dashboard_image.jpg" alt="Dashboard Image">
        </div>

        <!-- Section: View Student Information -->
        <div class="section">
            <h3>View Student Information</h3>
            <p>Here you can access all student information, including their details, grades, attendance records, and more.</p>
            <p>Use the navigation menu on the left to explore the various options available.</p>
        </div>

        <!-- Section: Record Attendance -->
        <div class="section">
            <h3>Record Attendance</h3>
            <p>Record the attendance of students by marking them present or absent for each class session.</p>
            <p>Make sure to update the attendance regularly to keep accurate records.</p>
        </div>

        <!-- Section: Send Notifications -->
        <div class="section">
            <h3>Send Notifications</h3>
            <p>Stay connected with students and parents by sending notifications about upcoming events, assignments, and important announcements.</p>
            <p>Use this feature to communicate effectively with everyone involved.</p>
        </div>

        <!-- Section: Post Announcements -->
        <div class="section">
            <h3>Post Announcements</h3>
            <p>Keep everyone informed about the latest news, events, and updates by posting announcements on the dashboard.</p>
            <p>Make sure to provide relevant information to students and parents to enhance their overall experience.</p>
        </div>

        <!-- Add more sections as needed -->

    </div>
</body>

</html>
