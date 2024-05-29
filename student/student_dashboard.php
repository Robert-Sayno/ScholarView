<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .header {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .header h1 {
            margin: 0;
        }

        .nav {
            width: 100%;
            background-color: #3498db;
            overflow: hidden;
            border-radius: 0 0 10px 10px;
        }

        .nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .nav a:hover {
            background-color: #2980b9;
        }

        .content {
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px;
        }

        .feature {
            width: calc(25% - 20px);
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .feature h2 {
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .feature ul {
            list-style-type: none;
            padding: 0;
            margin-top: 10px;
        }

        .feature li {
            margin-bottom: 10px;
        }

        .feature a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .feature a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Student Dashboard</h1>
        </div>

        <div class="nav">
            <a href="#">Home</a>
            <a href="#">Profile</a>
            <a href="#">Courses</a>
            <a href="#">Results</a>
            <a href="#">Library</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="content">
            <div class="feature">
                <h2>Profile</h2>
                <ul>
                    <li><a href="#">View Profile</a></li>
                    <li><a href="#">Edit Profile</a></li>
                    <li><a href="#">Change Password</a></li>
                </ul>
            </div>

            <div class="feature">
                <h2>Courses</h2>
                <ul>
                    <li><a href="#">View Enrolled Courses</a></li>
                    <li><a href="#">Enroll in New Courses</a></li>
                </ul>
            </div>

            <div class="feature">
                <h2>Results</h2>
                <ul>
                    <li><a href="#">View Semester Results</a></li>
                    <li><a href="#">View Overall Performance</a></li>
                </ul>
            </div>

            <div class="feature">
                <h2>Library</h2>
                <ul>
                    <li><a href="#">Search Books</a></li>
                    <li><a href="#">View Borrowed Books</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
