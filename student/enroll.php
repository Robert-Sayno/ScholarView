<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $student_type = $_POST['student_type'];

    // Get the email of the logged-in student
    session_start();
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        $sql = "INSERT INTO students (email, year, semester, student_type) VALUES ('$email', '$year', '$semester', '$student_type')";
        if ($conn->query($sql) === TRUE) {
            $success_message = "Enrollment successful!";
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $error_message = "User not logged in!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll for Semester</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
            text-align: center;
            padding-top: 50px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        select, button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success {
            color: green;
            margin-top: 10px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .nav {
            background-color: #333;
            padding: 10px 0;
        }
        .nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }
        .nav a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <h1>Enroll for a Semester</h1>
        <div class="form-container">
            <form action="enroll.php" method="post">
                <select name="year" required>
                    <option value="">Select Year</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                </select>
                <select name="semester" required>
                    <option value="">Select Semester</option>
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                </select>
                <select name="student_type" required>
                    <option value="">Select Student Type</option>
                    <option value="Fresh Student">Fresh Student</option>
                    <option value="Continuing Student">Continuing Student</option>
                    <option value="Finalist">Finalist</option>
                </select>
                <button type="submit">Enroll</button>
            </form>
            <?php
            if(isset($success_message)) {
                echo "<p class='success'>$success_message</p>";
            }
            if(isset($error_message)) {
                echo "<p class='error'>$error_message</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
