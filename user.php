<<<<<<< HEAD
<?php
session_start();

if (!isset($_SESSION['username'])) {
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
    <link rel="stylesheet" type="text/css" href="css/user.css">
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
    <?php if ($_SESSION['username'] == 'admin') print '<a onclick="navigateToLinks()">Links</a>' ?>
    <?php if ($_SESSION['username'] == 'user') print '<a onclick="navigateToStatistics()">Statistics</a>' ?>
    <!-- <a onclick="navigateToLinks()">Links</a> -->
</nav>

<div class="container">
    <h2>Welcome to Sphy Evaluation 2024, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You are already logged in as <?php echo $_SESSION['username']?></p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    function navigateToLogout() {
        window.location.href = 'logout.php';
    }

    function navigateToHome() {
        window.location.href = 'welcome.php';
    }
    function navigateToLinks(){
        window.location.href = 'links.php';
    }
    function navigateToStatistics(){
        window.location.href = 'viewer.php';
    }

    
</script>

</body>
</html>
=======
<?php
session_start();

if (!isset($_SESSION['username'])) {
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
    <link rel="stylesheet" type="text/css" href="css/user.css">
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
    <?php if ($_SESSION['username'] == 'admin') print '<a onclick="navigateToLinks()">Links</a>' ?>
    <?php if ($_SESSION['username'] == 'user') print '<a onclick="navigateToStatistics()">Statistics</a>' ?>
    <!-- <a onclick="navigateToLinks()">Links</a> -->
</nav>

<div class="container">
    <h2>Welcome to Sphy Evaluation 2024, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You are already logged in as <?php echo $_SESSION['username']?></p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    function navigateToLogout() {
        window.location.href = 'logout.php';
    }

    function navigateToHome() {
        window.location.href = 'welcome.php';
    }
    function navigateToLinks(){
        window.location.href = 'links.php';
    }
    function navigateToStatistics(){
        window.location.href = 'viewer.php';
    }

    
</script>

</body>
</html>
>>>>>>> 48e1d74f5af58adfcc52d502163fe69c9db04bd7
