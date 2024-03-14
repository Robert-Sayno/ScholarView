<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Teachers</title>
    <style>
        body {
            background-image: url('lost_property_bg.jpg');
            background-size: cover;
            background-position: center;
            color: #7734eb;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .dashboard-container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        .dashboard-header {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
        }

        .dashboard-section {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #3498db;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .property-image {
            max-width: 100%;
            max-height: 100px;
        }

        .logout-btn {
            color: #fff;
            background-color: #e74c3c;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .search-filter-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 5px;
        }

        .nav-container {
            background-color: #3498db;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    // Include necessary files and authentication check
    include_once('../auth/connection.php');
    include_once('../auth/auth_functions.php');

    // Fetch teachers from the database
    $sql_teachers = "SELECT * FROM teacher_information";
    $result_teachers = mysqli_query($conn, $sql_teachers);

    // Check if the query was successful
    if ($result_teachers) {
        $teachers = mysqli_fetch_all($result_teachers, MYSQLI_ASSOC);
    } else {
        // Handle the error, you can customize this part based on your needs
        die('Error fetching teachers: ' . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Welcome to the Admin Dashboard - Teachers</h2>
        </div>

        <!-- Navigation Links -->
        <div class="nav-container">
            <a class="nav-link" href="teacher_dashboard.php">Home Dashboard</a>
            <!-- Add more navigation links as needed -->
        </div>

        <!-- Search and filter options -->
        <!-- You can add search and filter options if needed -->

        <!-- Display teachers in a table -->
        <div class="dashboard-section">
            <h3>All Teachers</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher) : ?>
                        <tr>
                            <td><?php echo $teacher['id']; ?></td>
                            <td><?php echo $teacher['user_id']; ?></td>
                            <td><?php echo $teacher['teacher_name']; ?></td>
                            <td><?php echo $teacher['teacher_contact']; ?></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Your existing JavaScript for search and filter... -->
</body>

</html>
