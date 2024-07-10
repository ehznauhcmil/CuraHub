<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user-login.css">
    <title>User Sign Up</title>
</head>

<body>
    <div class="login-block">
        <div class="login-side">
            <h1>CuraHub</h1>
            <div class="login-content">
                <div class="title">
                    <h3>Create Account</h3>
                    <h6>Please provide the details as required below to register for an account.</h6>
                </div>

                <form class="login-form" action="index.php" method="POST">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" placeholder="Enter Your Email Address" name="email"
                        autocomplete="off"><br />

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="********************"
                        autocomplete="off"><br />

                    <button type="submit" id="login-button">LOGIN ACCOUNT</button><br /><br />
                    <div class="signup-link">
                        <p>
                            Already have an account? <a href="user-login.php"> Sign In Here</a>
                        </p>
                    </div>

                </form>

            </div>




        </div>
        <div class="illustration-side">
            <img src="images\login-illustration.png" alt="">
        </div>
    </div>
</body>

</html>