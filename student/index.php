<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start session

// Include your database connection file
include 'connection.php';

// Define $sql variable and set it to an empty string
$sql = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get entered username/email and password
    $username = $_POST['username_email'];
    $userid = $_POST['user_id'];

    // Validate user inputs (you can add more validation as needed)
    if (empty($username) || empty($userid)) {
        echo "<script>alert('Please enter both username/email and password.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        // Assuming a default user type (e.g., teacher)
        // Query to check if teacher exists with the provided credentials
        $sql = "SELECT * FROM teacher_information WHERE username_email = '$username' AND user_id = '$userid'";
        $dashboard = "student_dashboard.php";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there's a match
        if (mysqli_num_rows($result) == 1) {
            // Authentication successful, redirect to respective dashboard
            $_SESSION['userType'] = 'teacher'; // Store user type in session
            header("Location: $dashboard"); // Redirect to dashboard
            exit();
        } else {
            // Query to check if parent exists with the provided credentials
            $sql = "SELECT * FROM student_information WHERE username_email = '$username' AND user_id = '$userid'";
            $dashboard = "../parent/parent_dashboard.php";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if there's a match
            if (mysqli_num_rows($result) == 1) {
                // Authentication successful, redirect to respective dashboard
                $_SESSION['userType'] = 'parent'; // Store user type in session
                header("Location: $dashboard"); // Redirect to dashboard
                exit();
            } else {
                // Authentication failed
                echo "<script>alert('Invalid username/email or password.');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Dan Aleko</title>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    /* Your existing styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url(bg.jpg) no-repeat;
      background-size: cover;
      background-position: center;
    }

    .wrapper {
      width: 420px;
      background: rgba(255, 255, 255, 0.5); /* Semi-transparent background */
      border: 2px solid rgba(255, 255, 255, .2);
      border-radius: 12px;
      padding: 30px 40px;
      color: #333; /* Text color */
      position: relative; /* Add relative positioning for welcome message */
    }

    .welcome-message {
      position: absolute;
      top: -70px; /* Adjust top position */
      left: 50%;
      transform: translateX(-50%);
      font-size: 18px; /* Reduce font size */
      font-weight: bold;
      color: #fff; /* Text color */
      background-color: #3498db; /* Background color */
      padding: 8px 16px; /* Reduce padding */
      border-radius: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .input-box {
      position: relative;
      width: 100%;
      margin: 15px 0; /* Adjust margin for better spacing */
    }

    .input-box input {
      width: 100%;
      height: 45px;
      background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
      border: none;
      outline: none;
      border-radius: 40px;
      font-size: 16px;
      color: #333;
      padding: 0 20px;
    }

    .input-box input::placeholder {
      color: #666; /* Placeholder text color */
    }

    .input-box i {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center; /* Align vertically */
      margin-top: 15px; /* Add some space */
    }

    .remember-forgot label {
      display: flex;
      align-items: center; /* Align vertically */
      color: #666; /* Checkbox text color */
    }

    .remember-forgot input[type="checkbox"] {
      margin-right: 5px;
    }

    .btn {
      width: 100%;
      height: 45px;
      background-color: #3498db;
      border: none;
      outline: none;
      border-radius: 40px;
      box-shadow: 0 0 10px rgba(0, 0, 0, .1);
      cursor: pointer;
      font-size: 16px;
      color: #fff;
      font-weight: 600;
      margin-top: 20px;
      transition: background-color 0.3s; /* Add transition effect */
    }

    .btn:hover {
      background-color: #2980b9; /* Change color on hover */
    }

    .register-link {
      text-align: center;
      margin-top: 20px; /* Adjust margin for better spacing */
    }

    .register-link p a {
      color: #3498db;
      text-decoration: none;
      font-weight: 600;
    }

    .register-link p a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
<div class="wrapper">
    <div class="welcome-message">Welcome, Nakisenyi P/S-ScholarView</div>
    
    <form action="index.php" method="POST">
      <div class="input-box">
        <input type="text" id="username_email" name="username_email" placeholder="Username/Email" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" id="user_id" name="user_id" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label>
          <input type="checkbox">Remember Me
        </label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div>
    </form>
  </div>

</body>
</html>
