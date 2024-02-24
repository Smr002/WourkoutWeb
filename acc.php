<?php
$conn = mysqli_connect("localhost", "root", "", "wourkout_web");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['Submit'])){
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $memberId = rand(0,1000); 
    $phoneNumber = $_POST['phoneNumber'];


    $check_username_sql = "SELECT * FROM GymMember WHERE Username = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_sql);

    if(mysqli_num_rows($check_username_result) > 0) {
        echo "<script>alert('Username already exists')</script>";
    } else {
      
        $insert_sql = "INSERT INTO GymMember (MemberID, PhoneNumber, FirstName, LastName, Username, Passwordd, Email, Gender) VALUES ($memberId, '$phoneNumber', '$fName', '$lName', '$username', '$password', '$email', '$gender')";
        if(mysqli_query($conn, $insert_sql)) {
            echo "<script>alert('Registration successful')</script>";
        } else {
            echo "<script>alert('Registration failed')</script>";
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Page</title>
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
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: calc(100% - 22px); /* Adjusted width for border */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        select {
            appearance: none;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .contact-details {
            text-align: center;
            margin-top: 30px;
        }

        .contact-details p {
            margin-bottom: 10px;
        }

        .error-message,
        .success-message {
            color: white;
            margin-top: 5px;
            padding: 5px 10px;
            border-radius: 5px;
            display: none;
        }

        .error-message {
            background-color: #dc3545;
        }

        .success-message {
            background-color: #28a745;
        }

        .footer {
            text-align: center;
            color: gray;
            margin-top: 20px;
        }

        .mot {
            color: gray;
            margin-left: 30px;
            animation: moveLeftRight 2s infinite;
        }

        @keyframes moveLeftRight {
            0% { transform: translateX(0); }
            50% { transform: translateX(50px); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create an account</h1>
        <form id="contactForm" action="#" method="post">
            <div style="display: flex; flex-wrap: wrap;">
                <div style="flex-basis: 48%;">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                <div style="flex-basis: 100%;">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div style="flex-basis: 100%;">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" id="phoneNumber" name="phoneNumber" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <div style="flex-basis: 100%;">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div style="flex-basis: 100%;">
                    <input type="submit" value="Submit" name = "Submit">
                    <p class="success-message"></p>
                    <p class="error-message"></p>
                </div>
            </div>
        </form>
        <div class="footer">
            &copy; 2023 Your Fitness Journey. All rights reserved.
        </div>
        <div class="mot">
            "Push yourself because no one else is going to do it for you &amp; Train like a beast, look like a beauty."
        </div>
    </div>

    <script>
       document.getElementById('contactForm').addEventListener('submit', function(event) {
    if (!validateForm()) {
        event.preventDefault();
    } else {
        var formData = new FormData(this);
        setTimeout(function() {
            console.log('Form data:', formData);
            var successMessage = document.querySelector('.success-message');
            successMessage.textContent = 'Account created successfully';
            successMessage.style.display = 'block';
            document.getElementById('contactForm').reset();
        }, 1000);
    }
});

        function validateForm() {
            var inputs = document.querySelectorAll('input, select, textarea');
            var errorMessage = document.querySelector('.error-message');
            var isValid = true;
            errorMessage.style.display = 'none';

            inputs.forEach(function(input) {
                if (!input.value.trim()) {
                    displayErrorMessage('Please enter your ' + input.name);
                    isValid = false;
                }
            });

            var emailInput = document.getElementById('email');
            if (!validateEmail(emailInput.value)) {
                displayErrorMessage('Please enter a valid email address');
                isValid = false;
            }

            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('confirmPassword');
            if (passwordInput.value !== confirmPasswordInput.value) {
                displayErrorMessage('Passwords do not match');
                isValid = false;
            }

            return isValid;
        }

        function displayErrorMessage(message) {
            var errorMessage = document.querySelector('.error-message');
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
        }

        function validateEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

    </script>
</body>
</html>

