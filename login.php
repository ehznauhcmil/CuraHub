<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="login-block">
        <div class="login-side">
            <h1>CuraHub</h1>
            <div class="login-content">
                <div class="title">
                    <h3>Welcome to CuraHub.</h3>
                    <h6>Login with your CuraHub Account.</h6>
                </div>

                <form class="login-form" action="login-validation.php" method="POST">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" placeholder="Enter Your Email Address" name="email"
                        autocomplete="off" required><br />

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="********************"
                        autocomplete="off" required><br />

                    <button type="submit" id="login-button">
                        LOGIN
                    </button><br /><br />
                    <div class="signup-link">
                        <p>
                            Don't have an account? <a href="signup.php"> Sign Up Here</a>
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