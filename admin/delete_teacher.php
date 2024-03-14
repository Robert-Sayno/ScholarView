<?php
// Include necessary files and authentication check
include_once('../auth/connection.php');
include_once('../auth/auth_functions.php');

// Function to handle teacher deletion
if (isset($_GET['id'])) {
    $teacher_id = $_GET['id'];

    // SQL query to delete the teacher
    $sql_delete_teacher = "DELETE FROM teacher_information WHERE id = $teacher_id";

    // Execute the query
    if (mysqli_query($conn, $sql_delete_teacher)) {
        echo '<script>alert("Teacher deleted successfully!");</script>';
        echo '<script>window.location.href = "teachers.php";</script>'; // Redirect to the teachers page
    } else {
        echo '<script>alert("Error deleting teacher: ' . mysqli_error($conn) . '");</script>';
        echo '<script>window.location.href = "teachers.php";</script>'; // Redirect to the teachers page
    }
} else {
    // Redirect to the teachers page if the teacher ID is not provided
    echo '<script>window.location.href = "teachers.php";</script>';
}
?>
