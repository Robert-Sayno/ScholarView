<?php
// Include necessary files and authentication check
include_once('../auth/connection.php');
include_once('../auth/auth_functions.php');

// Function to fetch teacher details
function getTeacherDetails($conn, $teacher_id)
{
    $sql_teacher = "SELECT * FROM teacher_information WHERE id = $teacher_id";
    $result_teacher = mysqli_query($conn, $sql_teacher);

    if ($result_teacher && mysqli_num_rows($result_teacher) > 0) {
        return mysqli_fetch_assoc($result_teacher);
    } else {
        return null;
    }
}

// Handle form submission for updating teacher details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['teacher_id'])) {
    $teacher_id = $_POST['teacher_id'];
    $teacher_name = $_POST['teacher_name'];
    $teacher_contact = $_POST['teacher_contact'];

    // SQL query to update the teacher details
    $sql_update_teacher = "UPDATE teacher_information SET teacher_name = '$teacher_name', teacher_contact = '$teacher_contact' WHERE id = $teacher_id";

    // Execute the query
    if (mysqli_query($conn, $sql_update_teacher)) {
        echo '<script>alert("Teacher details updated successfully!");</script>';
        echo '<script>window.location.href = "teachers.php";</script>'; // Redirect to the teachers page
    } else {
        echo '<script>alert("Error updating teacher details: ' . mysqli_error($conn) . '");</script>';
    }
}

// Check if the teacher ID is provided in the URL parameters
if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];

    // Fetch teacher details
    $teacher = getTeacherDetails($conn, $teacher_id);

    if (!$teacher) {
        echo '<script>alert("Lecturer not found!");</script>';
        echo '<script>window.location.href = "teachers.php";</script>'; // Redirect to the teachers page if teacher not found
    }
} else {
    // Redirect to the teachers page if the teacher ID is not provided
    echo '<script>window.location.href = "teachers.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <style>
        /* Your styles... */
    </style>
</head>

<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Edit Teacher</h2>
        </div>

        <div class="form-container">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="teacher_id" value="<?php echo $teacher['id']; ?>">

                <label for="teacher_name">Name:</label>
                <input type="text" name="teacher_name" id="teacher_name" value="<?php echo $teacher['teacher_name']; ?>" required>

                <label for="teacher_contact">Contact:</label>
                <input type="text" name="teacher_contact" id="teacher_contact" value="<?php echo $teacher['teacher_contact']; ?>" required>

                <button type="submit">Update Teacher</button>
            </form>
        </div>
    </div>
</body>

</html>
