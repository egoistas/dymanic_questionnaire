<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sphy Evaluation 2024</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            animation: fadeInDown 1s ease-in-out;
        }

        nav {
            background-color: #444;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            cursor: pointer;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 0.1em 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Sphy Evaluation 2024</h1>
</header>

<nav>
    <a onclick="navigateToHome()">Home</a>
    <a onclick="navigateToLogin()">Login</a>
    <a onclick="navigateToAbout()">About</a>
</nav>

<div class="container">
    <h2>Welcome to Sphy Evaluation 2024</h2>
    <p>Explore our innovative evaluation platform for a better learning experience.</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
  function navigateToLogin() {
    window.location.href = 'project_login.php';
}
function navigateToHome() {
    window.location.href = 'welcome.php';
}

function navigateToAbout() {
    window.location.href = 'about.php';
}


</script>
<footer>
        <p>&copy; 2024 Sphy Evaluation. All rights reserved.</p>
    </footer>
</body>
</html>
