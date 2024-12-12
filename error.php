<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sphy Evaluation 2024</title>
    <link rel="stylesheet" type="text/css" href="css/error.css">
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
    <a onclick="navigateToAbout()">About</a>
    
</nav>

<div class="container">
    <h2>This questionnarie is already filled!</h2>
    <p>Please contact grafeio ekpedeuseos</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    
    function navigateToHome() {
        window.location.href = 'welcome.php';
    }

    function navigateToAbout() {
        window.location.href = 'about.php';
    }

</script>

</body>
</html>
