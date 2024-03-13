<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student</title>
    <!-- Add your styling here or link to an external stylesheet -->
</head>

<body>
    <?php
    // Include necessary files and authentication check
    include_once('../auth/connection.php');
    include_once('../auth/auth_functions.php');

    // Check if the student ID is provided in the URL
    if (isset($_GET['id'])) {
        $student_id = mysqli_real_escape_string($conn, $_GET['id']);

        // Fetch student details from the database
        $sql_student_details = "SELECT * FROM student_information WHERE id = '$student_id'";
        $result_student_details = mysqli_query($conn, $sql_student_details);

        // Check if the query was successful
        if ($result_student_details && mysqli_num_rows($result_student_details) > 0) {
            $student_details = mysqli_fetch_assoc($result_student_details);
        } else {
            // Handle the error or redirect to an error page
            die('Error fetching student details: ' . mysqli_error($conn));
        }
    } else {
        // Redirect to the dashboard or another appropriate page if student ID is not provided
        header("Location: dashboard.php");
        exit();
    }
    ?>

    <div>
        <!-- Display student details here -->
        <h2>Student Details</h2>
        <img src="<?php echo $student_details['photo_url']; ?>" alt="Student Photo">
        <p>Name: <?php echo $student_details['students_name']; ?></p>
        <p>Student ID: <?php echo $student_details['student_id']; ?></p>
        <!-- Add other student details as needed -->

        <!-- Display performance recording form -->
        <h2>Record Performance</h2>
        <form action="record_performance.php" method="post">
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">

            <!-- Add input fields for subjects and performance -->
            <!-- Example: Subject 1 -->
            <label for="subject1">Subject 1:</label>
            <input type="text" name="subject1" id="subject1" required>
            <br>

            <!-- Example: Subject 2 -->
            <label for="subject2">Subject 2:</label>
            <input type="text" name="subject2" id="subject2" required>
            <br>

            <!-- Add more subjects as needed -->

            <!-- Term selection -->
            <label for="term">Select Term:</label>
            <select name="term" id="term" required>
                <option value="term1">Term 1</option>
                <option value="term2">Term 2</option>
                <option value="term3">Term 3</option>
                <!-- Add more terms as needed -->
            </select>
            <br>

            <!-- Performance input -->
            <label for="performance">Performance:</label>
            <input type="text" name="performance" id="performance" required>
            <br>

            <input type="submit" value="Record Performance">
        </form>

        <!-- Add any other sections you need for managing the student -->
    </div>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>
