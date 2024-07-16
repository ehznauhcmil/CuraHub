<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="signup-block">
        <div class="signup-side">
            <h1>CuraHub</h1>
            <div class="signup-content">
                <div class="title">
                    <h3>Welcome to CuraHub.</h3>
                    <h6>Sign up for a CuraHub account.</h6>
                </div>

                <form class="signup-form" action="signup-validation.php" method="POST">
                    <div class="signup-fields">
                        <div>
                            <label for="email">Email Address:</label>
                        </div>

                        <div>
                            <input type="email" id="email" placeholder="Enter Your Email Address" name="email"
                                autocomplete="off" required><br />
                        </div>

                        <div>
                            <label for="password">Password:</label>
                        </div>

                        <div>
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                autocomplete="off" required><br />
                        </div>

                        <div>
                            <label for="first_name">First Name:</label>
                        </div>

                        <div>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name"
                                autocomplete="off" required><br />
                        </div>

                        <div>
                            <label for="last_name">Last Name:</label>
                        </div>

                        <div>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"
                                autocomplete="off" required><br />
                        </div>

                        <div>
                            <label for="date">Date of Birth:</label>
                        </div>

                        <div>
                            <input type="date" id="dob" name="dob" autocomplete="off" required><br />
                        </div>

                        <div>
                            <label for="gender">Gender:</label>
                        </div>

                        <div>
                            <input type="text" id="gender" name="gender" placeholder="Enter your biological gender"
                                autocomplete="off" required><br />
                        </div>

                        <div>
                            <label for="identity">Identity No.:</label>
                        </div>

                        <div>
                            <input type="text" id="identity" name="identity" placeholder="Enter your identity no."
                                autocomplete="off" required><br />
                        </div>

                        <div>
                            <label for="phone">Phone No.:</label>
                        </div>

                        <div>
                            <input type="text" id="phone" name="phone" placeholder="Enter your phone number"
                                autocomplete="off" required><br />
                        </div>


                    </div>
                    <button type="submit" id="login-button">SIGN UP</button><br /><br />
                    <div class="signup-link">
                        <p>
                            Have an account already? <a href="login.php"> Log In Here</a>
                        </p>
                    </div>

                    </for>

            </div>




        </div>
        <div class="illustration-side">
            <img src="images\login-illustration.png" alt="">
        </div>
    </div>
</body>

</html>