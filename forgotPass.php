<?php
$conn = mysqli_connect("localhost", "root", "", "wourkout_web");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['enter'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $sql = "SELECT * FROM GymMember WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $resultPassword = $row['Passwordd']; 

        if(password_verify($password , $resultPassword)) {
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE GymMember SET Passwordd = '$hashed_password' WHERE Username = '$username'";
            if(mysqli_query($conn, $updateSql)) {
                echo "<script>alert('Password reset successful. Your new password is: $newPassword')</script>";
                header('Location: member1.html');
                exit();
            } else {
                echo "<script>alert('Password reset failed')</script>";
            }
        } else {
            echo "<script>alert('Incorrect password')</script>";
        }
    } else {
        echo "<script>alert('Username not found')</script>";
    }

    mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/11.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"],
        #forgetPassword {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover,
        #forgetPassword:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .forget-password-container {
            text-align: center;
            margin-top: 10px;
        }

        .error-message {
            color: #dc3545;
            margin-top: 5px;
            display: none;
            text-align: center;
        }

        .success-message {
            color: #28a745;
            margin-top: 5px;
            display: none;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <form id="loginForm" action="#" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Old Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="password">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>
            <input type="submit" value="Enter" name="enter">
            <div class="error-message" id="error-message"></div>
            <div class="success-message" id="success-message"></div>
        </form>
    </div>

    <script>
      

        document.getElementById('forgetPassword').addEventListener('click', function() {
          
            alert('Forgot Password clicked!');
        });

        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var isValid = true;

            var errorMessage = document.getElementById('error-message');
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';

            if (!username.trim() || !password.trim()) {
                errorMessage.textContent = 'Please enter both username and password.';
                errorMessage.style.display = 'block';
                isValid = false;
            }

            return isValid;
        }

        function resetForm() {
            document.getElementById('loginForm').reset();
            document.getElementById('error-message').textContent = '';
            document.getElementById('error-message').style.display = 'none';
            document.getElementById('username').classList.remove('input-error');
            document.getElementById('password').classList.remove('input-error');
        }
    </script>
</body>
</html>


