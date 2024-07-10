<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/user-login.css">
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

                <form class="login-form" action="index.php" method="POST">
                    <input type="email" id="email" placeholder="E-mail" name="email" autocomplete="off"><br />

                    <input type="password" id="password" name="password" placeholder="Password"
                        autocomplete="off"><br />

                    <div class="buttons">
                        <button type="submit" id="login-button">Login</button><br /><br />

                        <a href="signup.php"> <button type="button" id="signup-button">Sign Up</button>
                        </a><br /><br />
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