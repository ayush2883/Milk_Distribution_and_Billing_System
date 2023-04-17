<?php
session_start();
include('includes/config.php');

if(isset($_POST['register'])) {
    $adminname = mysqli_real_escape_string($con, $_POST['adminname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $emailid = mysqli_real_escape_string($con, $_POST['emailid']);
    $mobilenumber = mysqli_real_escape_string($con, $_POST['mobilenumber']);
    $password=md5($_POST['password']);
    

    // Check if passwords match
    if ($password != $password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Check if username or email already exist
        $check_query = "SELECT * FROM tbladmin WHERE username='$username' OR email='$emailid'";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if ($check_rows > 0) {
        echo "<script>alert('Username or email already exists');</script>";
        } else {
        // Insert user data into database
        $insert_query = "INSERT INTO tbladmin (adminname, username, email, mobilenumber, password) VALUES ('$adminname','$username', '$emailid','$mobilenumber', '$password')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
        echo "<script>alert('Registration successful');</script>";
        } else {
        echo "<script>alert('Registration failed');</script>";
        }
        }
        }
        }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0069d9;
}

p {
    margin-top: 20px;
    text-align: center;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>    
    <div class="container">
        <h2>Registration Form</h2>
        <form action="reg.php" method="post">
           <div class="form-group">
                <label for="adminname">Vendor Name</label>
                <input type="text" name="adminname" id="adminname" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="emailid" id="emailid" required>
            </div>
            <div class="form-group">
                <label for="mobilenumber">MobileNumber</label>
                <input type="tel" name="mobilenumber" id="mobilenumber" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
           
            <div class="form-group">
                <button type="submit" name="register">Register</button>
            </div>
            <p>Already have an account? <a href="index.php">Login here</a></p>
        </form>
    </div>

</body>
</html>
