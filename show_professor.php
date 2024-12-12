<<<<<<< HEAD
<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: project_login.php"); 
    exit();
}
ob_start();
require_once('mysqli_connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['profesor'])) {
        
        $selectedProf = $_POST['profesor'];
        // var_dump($selectedProf);

        $profesorQuery = "Select profesor, sum(fairness)/count(fairness) as fairness, sum(expertise)/count(expertise) as expertise,
        sum(adaptability)/count(adaptability) as adaptability, sum(use_of_tech)/count(use_of_tech) as useOfTech,
        sum(responsiveness)/count(responsiveness) as responsiveness, sum(engagment)/count(engagment) as engagment
        from statistics
        where profesor = ?
        group by profesor;";

        $profstmt = mysqli_prepare($dbc, $profesorQuery);
        mysqli_stmt_bind_param($profstmt, 's', $selectedProf);
        mysqli_stmt_execute($profstmt);
        $profresult = mysqli_stmt_get_result($profstmt);
        
        if ($profresult) {
            
            $professors = mysqli_fetch_all($profresult , MYSQLI_ASSOC);
        } else {
            echo "Error executing the query for professors. <br>";
        }
        mysqli_stmt_close($profstmt);
       // var_dump($professors);
    }
}

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
    <h1>Welcome to the statistics section for the professor <?php echo $_POST['profesor'];?></h1>
    <div class="container">
        <h2>Professor Overall Statistics</h2>
        <p>This chart displays the overall evaluation scores for the selected professor based on various criteria.</p>
        <?php foreach ($professors as $professor) : ?>
            <canvas id="professorChart_<?php echo $professor['profesor']; ?>" width="400" height="200"></canvas>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    <?php foreach ($professors as $professor) : ?>
        var ctx = document.getElementById('professorChart_<?php echo $professor['profesor']; ?>').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Fairness', 'Expertise', 'Adaptability', 'Responsiveness', 'Use of Tech', 'Engagement'],
                datasets: [{
                    label: 'Scores',
                    data: [
                        <?php
                        echo $professor['fairness'] . ',';
                        echo $professor['expertise'] . ',';
                        echo $professor['adaptability'] . ',';
                        echo $professor['useOfTech'] . ',';
                        echo $professor['responsiveness'] . ',';
                        echo $professor['engagment'];
                        ?>
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.3)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5.0
                    }
                }
            }
        });
    <?php endforeach; ?>
    });
</script>

</body>
=======
<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: project_login.php"); 
    exit();
}
ob_start();
require_once('mysqli_connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['profesor'])) {
        
        $selectedProf = $_POST['profesor'];
        // var_dump($selectedProf);

        $profesorQuery = "Select profesor, sum(fairness)/count(fairness) as fairness, sum(expertise)/count(expertise) as expertise,
        sum(adaptability)/count(adaptability) as adaptability, sum(use_of_tech)/count(use_of_tech) as useOfTech,
        sum(responsiveness)/count(responsiveness) as responsiveness, sum(engagment)/count(engagment) as engagment
        from statistics
        where profesor = ?
        group by profesor;";

        $profstmt = mysqli_prepare($dbc, $profesorQuery);
        mysqli_stmt_bind_param($profstmt, 's', $selectedProf);
        mysqli_stmt_execute($profstmt);
        $profresult = mysqli_stmt_get_result($profstmt);
        
        if ($profresult) {
            
            $professors = mysqli_fetch_all($profresult , MYSQLI_ASSOC);
        } else {
            echo "Error executing the query for professors. <br>";
        }
        mysqli_stmt_close($profstmt);
       // var_dump($professors);
    }
}

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
    <h1>Welcome to the statistics section for the professor <?php echo $_POST['profesor'];?></h1>
    <div class="container">
        <h2>Professor Overall Statistics</h2>
        <p>This chart displays the overall evaluation scores for the selected professor based on various criteria.</p>
        <?php foreach ($professors as $professor) : ?>
            <canvas id="professorChart_<?php echo $professor['profesor']; ?>" width="400" height="200"></canvas>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    <?php foreach ($professors as $professor) : ?>
        var ctx = document.getElementById('professorChart_<?php echo $professor['profesor']; ?>').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Fairness', 'Expertise', 'Adaptability', 'Responsiveness', 'Use of Tech', 'Engagement'],
                datasets: [{
                    label: 'Scores',
                    data: [
                        <?php
                        echo $professor['fairness'] . ',';
                        echo $professor['expertise'] . ',';
                        echo $professor['adaptability'] . ',';
                        echo $professor['useOfTech'] . ',';
                        echo $professor['responsiveness'] . ',';
                        echo $professor['engagment'];
                        ?>
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.3)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5.0
                    }
                }
            }
        });
    <?php endforeach; ?>
    });
</script>

</body>
>>>>>>> 48e1d74f5af58adfcc52d502163fe69c9db04bd7
</html>