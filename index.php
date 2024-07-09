<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/homepage.css">

</head>

<body>
    <div class="main">
        <div class="sidebar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="content"></div>
    </div>
    <div class="copyright">
        <p>Copyright © 2024 GamerHub. All rights reserved.</p>
    </div>
    <script>
        function toggleMenu() {
            var navLinks = document.querySelector(".nav-links");
            navLinks.classList.toggle("active");
        }
    </script>
    <script src="js/profile_controller.js"></script>
    <script src="js/file_upload.js"></script>
    </footer>
</body>

</html>