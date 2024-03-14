<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Add Teacher</title>
    <style>
        /* Your existing styles... */

        /* Styles for the Add Teacher page */
        .form-container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Your existing styles... */
    </style>
</head>

<body>
   

    <div class="content-container">
        <div class="form-container">
            <h2>Add Teacher</h2>
            <?php
            // Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Include necessary files and authentication check
                include_once('../auth/connection.php');
                include_once('../auth/auth_functions.php');

                // Get values from the form
                $teacher_name = $_POST["name"];
                $gender = $_POST["gender"];
                $class = $_POST["class"];
                // Function to generate a unique user ID
function generateUserID()
{
    // You can implement your own logic to generate a unique user ID
    // For simplicity, a random 6-character string is generated here
    return substr(md5(uniqid()), 0, 6);
}

// Function to generate an email based on the name
function generateEmail($name)
{
    // Replace spaces with underscores and convert to lowercase
    $username = strtolower(str_replace(' ', '', $name));

    // Generate a dummy email domain for simplicity
    $domain = 'nyakap/s.com';

    return $username . '@' . $domain;
}

                // Generate user ID and email
                $user_id = generateUserID();
                $username_email = generateEmail($teacher_name);

                // Handle image upload
                $targetDirectory = "/opt/lampp/htdocs/ScholarView/admin/uploads/";

                // Create the uploads directory if it doesn't exist
                if (!file_exists($targetDirectory)) {
                    mkdir($targetDirectory, 0775, true); // Set the appropriate permission (read/write/execute for owner and group, read/execute for others)
                }

                $targetFile = $targetDirectory . basename($_FILES["teachers_photo"]["name"]);

                if (move_uploaded_file($_FILES["teachers_photo"]["tmp_name"], $targetFile)) {
                    // Image uploaded successfully, now insert the teacher details into the database
                    $teacher_photo = $targetFile;

                    // Prepare the SQL query for insertion
                    $sql = "INSERT INTO teacher_information (user_id, username_email, teacher_name, gender, class, teachers_photo) 
                            VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    // Bind parameters
                    $stmt->bind_param("ssssss", $user_id, $username_email, $teacher_name, $gender, $class, $teacher_photo);
                    // Execute the query
if ($stmt->execute()) {
    echo '<script>alert("Teacher added successfully!");</script>';
    echo '<script>window.location.href = "teacher_list.php";</script>'; // Redirect to teacher list page
} else {
    echo '<script>alert("Error adding teacher: ' . $conn->error . '");</script>';
}



                // Close the database connection
                $conn->close();
            }
            ?>
        
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="teachers_photo">Teacher's Photo:</label>
                <input type="file" id="teachers_photo" name="teachers_photo" required>

                <label for="class">Class:</label>
                <select name="class" id="class" required>
                    <option value="P7">P7</option>
                    <option value="P6">P6</option>
                    <option value="P2">P2</option>
                    <!-- Add more classes as needed -->
                </select>

                <button type="submit">Add Teacher</button>
            </form>
        </div>
    </div>

    <!-- Your existing footer... -->
</body>

</html>
