<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students Details</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h2>Add Student Details</h2>
    <label for="students_name">Student's Name:</label>
    <input type="text" id="students_name" name="students_name" required>

    <label for="class">Class:</label>
    <input type="text" id="class" name="class" required>

    <label for="DOB">Date of Birth:</label>
    <input type="date" id="DOB" name="DOB" required>

    <label for="parents_name">Parent's Name:</label>
    <input type="text" id="parents_name" name="parents_name" required>

    <label for="relationship">Relationship to Student:</label>
    <input type="text" id="relationship" name="relationship" required>

    <label for="parents_contact">Parent's Contact:</label>
    <input type="text" id="parents_contact" name="parents_contact" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="students_image">Student's Image:</label>
    <input type="file" id="students_image" name="students_image" required>

    <input type="submit" name="submit" value="Add Student">
</form>
<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Database connection parameters
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'ScholarView';

// Function to generate a random user ID
function generateUserID() {
    return 'USR' . rand(1000, 9999);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Create a new mysqli connection using the provided parameters
    $conn = new mysqli($server, $username, $password, $database);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $students_name = $_POST["students_name"];
    $class = $_POST["class"];
    $DOB = $_POST["DOB"];
    $parents_name = $_POST["parents_name"];
    $relationship = $_POST["relationship"];
    $parents_contact = $_POST["parents_contact"];
    $gender = $_POST["gender"];

    // Generate random user ID
    $user_id = generateUserID();

    // Generate username/email from the student's name
    $username_email = strtolower(str_replace(' ', '', $students_name)) . '@.com';
    

    // Handle image upload
    $targetDirectory = "/opt/lampp/htdocs/ScholarView/parent/uploads/";

    // Create the uploads directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0775, true); // Set the appropriate permission (read/write/execute for owner and group, read/execute for others)
    }

    $targetFile = $targetDirectory . basename($_FILES["students_image"]["name"]);

    if (move_uploaded_file($_FILES["students_image"]["tmp_name"], $targetFile)) {
        // Image uploaded successfully, now insert the student details into the database
        $student_image = $targetFile;

        // Prepare SQL statement to insert data into the student information table
        $sql = "INSERT INTO student_information (user_id, username_email, students_name, class, DOB, parents_name, relationship, parents_contact, gender, student_image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $user_id, $username_email, $students_name, $class, $DOB, $parents_name, $relationship, $parents_contact, $gender, $student_image);

        // Execute the SQL query
        if ($stmt->execute()) {
            echo "<script>alert('Student added successfully. User ID: $user_id, Username/Email: $username_email'); window.location.href = 'add_student.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href = 'add_student.php';</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Sorry, there was an error uploading your file.</p>";
    }

    // Close the database connection
    $conn->close();
}
?>

</body>
</html>
