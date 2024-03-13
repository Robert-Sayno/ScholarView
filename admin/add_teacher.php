<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Add Teacher</title>
    <style>
        /* Your styles... */

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

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

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

        /* Your styles... */
    </style>
</head>

<body>
    <!-- Your existing header and navigation... -->

    <div class="content-container">
        <div class="form-container">
            <h2>Add Teacher</h2>
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Database connection parameters
                $server = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'ScholarView';

                // Create a new mysqli connection using the provided parameters
                $conn = new mysqli($server, $username, $password, $database);

                // Check if the connection was successful
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Get values from the form
                $teacher_name = $_POST["teacher_name"];
                $teacher_contact = $_POST["teacher_contact"];
                $teacher_contact = $_POST["teacher_contact"];
            

    // Generate random user ID
    $user_id = generateUserID();

    // Generate username/email from the student's name
    $username_email = strtolower(str_replace(' ', '', $students_name)) . '@.com';

    // Handle image upload
    $targetDirectory = "/opt/lampp/htdocs/ScholarView/admin/uploads/";

    // Create the uploads directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0775, true); // Set the appropriate permission (read/write/execute for owner and group, read/execute for others)
    }

    $targetFile = $targetDirectory . basename($_FILES["students_image"]["name"]);

    if (move_uploaded_file($_FILES["teachers_photo"]["tmp_name"], $targetFile)) {
        // Image uploaded successfully, now insert the student details into the database
        $student_image = $targetFile;


                // Prepare the SQL query for insertion
                $sql = "INSERT INTO teacher_information (user_id, username_email, teacher_name,  teacher_contact,) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                // Bind parameters
                $stmt->bind_param("ssssss", $user_id, $teacher_name, $teacher_contact, $username_email);

                // Execute the query
                $stmt->execute();

                // Close the statement
                $stmt->close();

                // Close the database connection
                $conn->close();

                echo '<p>Teacher added successfully!</p>';
            }

            // Function to generate a unique user ID
            function generateUserId()
            {
                // You can implement your own logic to generate a unique user ID
                // For simplicity, a random 6-character string is generated here
                return substr(md5(uniqid()), 0, 6);
            }

            // Function to generate an email based on the name
            function generateEmail($name)
            {
                // Replace spaces with underscores and convert to lowercase
                $username = strtolower(str_replace(' ', '_', $name));

                // Generate a dummy email domain for simplicity
                $domain = 'nakasenyip/s.com';

                return $username . '@' . $domain;
            }
            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="teacher_id">Teacher ID:</label>
                <input type="text" name="teacher_id" id="teacher_id" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="students_image">teacher's photo:</label>
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
