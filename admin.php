<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: project_login.php"); 
    exit();
}
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sphy Evaluation 2024</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        
        form.left-form input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body>

<header>
    <h1>Sphy Evaluation 2024 - Admin Page</h1>
</header>

<nav>
    <a onclick="navigateToHome()">Home</a>
    <a onclick="navigateToLogout()">Logout</a>
    <a onclick="navigateToAbout()">About</a>
    <a onclick="navigateToEvaluation()">Evaluation</a>
</nav>

<div class="container">
    <h2>Welcome to Sphy Evaluation 2024, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Successfull submition of the class!</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    function navigateToLogout() {
        window.location.href = 'logout.php';
    }

    function navigateToHome() {
        window.location.href = 'welcome.php';
    }

    function navigateToAbout() {
        window.location.href = 'about.php';
    }

    function navigateToEvaluation() {
        window.location.href = 'evaluation.php';
    }
</script>

</body>
</html>
