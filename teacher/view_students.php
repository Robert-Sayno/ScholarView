<?php
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

// Initialize $result to an empty array
$result = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected class and search input
    $selectedClass = $_POST["class"];
    $searchInput = $_POST["search"];

    // Prepare the SQL query based on the selected class and search input
    $sql = "SELECT * FROM student_information WHERE class = ? AND students_name LIKE ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $selectedClass = '%' . $selectedClass . '%'; // For partial matches
    $searchInput = '%' . $searchInput . '%'; // For partial matches
    $stmt->bind_param("ss", $selectedClass, $searchInput);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Users</title>
    <style>
        /* Your styles... */

        /* Styles for the Manage Users page */
        .table-container {
            margin-top: 20px;
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .actions-container {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #2ecc71;
            color: #fff;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
        }
        /* Your styles... */
    </style>
</head>

<body>
    <!-- Your existing header and navigation... -->

    <div class="content-container">
        <div class="filter-container">
            <form class="filter-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="class-filter">Filter by Class:</label>
                <select name="class" id="class-filter">
                    <option value="P7">P7</option>
                    <option value="P6">P6</option>
                    <option value="P2">P2</option>
                    <!-- Add more classes as needed -->
                </select>
                <label for="search-input">Search:</label>
                <input type="text" name="search" id="search-input" placeholder="Enter user name">
                <input type="submit" value="Apply Filter">
            </form>
        </div>

        <div class="table-container">
            <?php
            // Check if $result is not empty before proceeding
            if (!empty($result)) {
                if ($result->num_rows > 0) {
                    echo '<table>';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Student ID</th>';
                    echo '<th>User ID</th>';
                    echo '<th>Class</th>';
                    echo '<th>Actions</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Fetch and display the student details
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['students_name'] . '</td>';
                        echo '<td>' . $row['student_id'] . '</td>';
                        echo '<td>' . $row['user_id'] . '</td>';
                        echo '<td>' . $row['class'] . '</td>';
                        echo '<td class="actions-container">';
                        echo '<button class="action-btn edit-btn">Edit</button>';
                        echo '<button class="action-btn delete-btn">Delete</button>';
                        // Add more action buttons as needed
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>No results found.</p>';
                }
            }
            ?>
        </div>
    </div>

    <!-- Your existing footer... -->
</body>

</html>