
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f1f1f1;
            overflow:hidden;    
        }
        
        .login-form {
            margin: 100px auto;
            max-width: 400px;
            padding: 30px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        .loading-gif {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="login-form" class="login-form" action="#" method="post">
                    <div class="form-group">
                        <label for="user-type">User Type:</label>
                        <select class="form-control" id="user-type" name="user-type" required>
							<option value="">Select user type</option>
							<option value="admin">Admin</option>
							<option value="seller">Seller</option>
						</select>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <button id="login-button" type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="loading-gif">
                    <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="Loading...">
                </div>
            </div>
        </div>
    </div>
    <script>
    $(".alert").alert();

    $(".alert .close").click(function(e) {
        e.preventDefault();
        $(this).parent().removeClass("show");
    });
</script>
    </body>
</html>
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projects";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the user is an admin
    $user_type = $_POST["user-type"];

    if ($user_type == "admin") {
        // Fetch the data for the admin user from the database
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Redirect the user to page2.html if the login is successful
            header("Location: page2.php");
            exit();
        } else {
            
// Define the alert message


            // Define the alert message
            $message = "This alert box could indicate a dangerous or potentially negative action.";
            
            // Output the alert HTML code
            echo '<div class="alert alert-danger alert-dismissible" style="position: fixed; top: 0; left: 0; right: 0;">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<strong>Danger!</strong> '.$message;
            echo '</div>';
        
          
         
        }
    } else if ($user_type == "seller") {
        // Fetch the data for the seller user from the database
        $sql = "SELECT name,password FROM seller WHERE name = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Redirect the user to page2.html if the login is successful
            header("Location: page5.php");
            exit();
        } else {
            
            // Define the alert message
        
            // Define the warning message
        
            // Define the alert message
            $message = "This alert box could indicate the wrong username and password.";            
            // Output the alert HTML code
            echo '<div class="alert alert-danger alert-dismissible" style="position: fixed; top: 0; left: 0; right: 0;">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<strong>Danger!</strong> '.$message;
            echo '</div>';
        
        
            
        }
    }
    else{
      // Define the alert message
    
// Define the warning message

            // Define the alert message
            $message = "This alert box could indicate the wrong username and password.";            
            // Output the alert HTML code
            echo '<div class="alert alert-danger alert-dismissible" style="position: fixed; top: 0; left: 0; right: 0;">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<strong>Danger!</strong> '.$message;
            echo '</div>';
        
        
    }
}
