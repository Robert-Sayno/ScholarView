<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link href="resorce/css/style.css" rel="stylesheet">
    
    <title>Employee Management System</title>
    
    <style>
        body, html {
            height: 100%;
            margin: 20px; /* Remove margin to avoid unwanted space */
        }
        
        .bg {
            background-image: url("bgsw.png");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .login-form-bg {
            height: 100%;
            display: flex; /* Use flexbox to center content vertically */
            justify-content: center;
            align-items: center;
        }
        
        .login-form {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px; /* Add padding for better appearance */
            max-width: 600px; /* Limit width for better readability on larger screens */
        }
        
        .btn-group {
            margin-top: 20px;
        }
        
        .btn-group .btn {
            width: 100%; /* Make buttons full width */
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="login-form-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mt-5">
                                <div class="card-body shadow">
                                    <h2 class="text-center pb-4">Online Results and Exam Management System</h2>
                                    <h6 class="text-center pb-4">Please Log-In According To Your Role</h6>
                                    <div class="container mt-4">
                                        <div class="btn-toolbar justify-content-center">
                                            <div class="btn-group col-md-4">
                                                <a href="employee/login.php" class="btn btn-primary btn-lg btn-block">Employee Login</a>
                                            </div>
                                            <div class="btn-group col-md-4">
                                                <a href="admin/login.php" class="btn btn-primary btn-lg btn-block">Admin Login</a>
                                            </div>
                                            <div class="btn-group col-md-4">
                                                <a href="lecturer/login.php" class="btn btn-primary btn-lg btn-block">Lecturer Login</a>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
