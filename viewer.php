<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: project_login.php"); 
    exit();
}
ob_start();
require_once('mysqli_connect.php');

// query for class op

$initialQuery = "SELECT distinct class from statistics";
$initialRequest = mysqli_query($dbc, $initialQuery);

if ($initialRequest){

    $initial_data = mysqli_fetch_all($initialRequest, MYSQLI_ASSOC);

} else {

    echo "Error. <br>";
}

$initialProf = "SELECT distinct profesor from statistics";
$initialProf = mysqli_query($dbc, $initialProf);

if ($initialProf){

    $initial_data_prof = mysqli_fetch_all($initialProf, MYSQLI_ASSOC);

} else {
    echo "Error. <br> \n";
}

// query for class op

mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sphy Evaluation 2024</title>
    <link rel="stylesheet" type="text/css" href="css/viewer.css">
</head>
<body>


<header>
    <h1>Sphy Evaluation 2024</h1>
</header>

<nav>
    <a onclick="navigateToHome()">Home</a>
    <a onclick="navigateToLogout()">Logout</a>
    <a onclick="navigateToAbout()">About</a>
</nav>


<div class="container">
    <h1>Welcome to the statistics section</h1>
    <p>Here you can see the various statistic based on the overall class sentiment ,
         and each professors individual overall sentiment</p>
</div>
<div class="container">
<form action="show_statistics.php" method="post">
    <label for="class">Generate statistics by class:</label>
    <select name="class" id="class">
        <?php
        foreach ($initial_data as $class) {
            echo '<option value="' . $class['class'] . '">' . $class['class'] . '</option>';
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Generate">
</form>
    </div>

    <div class="container">
<form action="show_professor.php" method="post">
    <label for="profesor">Generate statistics by professor:</label>
    <select name="profesor" id="profesor">
        <?php
        foreach ($initial_data_prof as $prof) {
            echo '<option value="' . $prof['profesor'] . '">' . $prof['profesor'] . '</option>';
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Generate">
</form>
    </div>
   
<!-- gia to chart to lib -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
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
    </script>



</body>
</html>
