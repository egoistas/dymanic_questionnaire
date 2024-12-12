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
    
    if (isset($_POST['class'])) {
        
        $selectedClass = $_POST['class'];

        $profesorQuery = "Select profesor, sum(fairness)/count(fairness) as fairness, sum(expertise)/count(expertise) as expertise,
        sum(adaptability)/count(adaptability) as adaptability, sum(use_of_tech)/count(use_of_tech) as useOfTech,
        sum(responsiveness)/count(responsiveness) as responsiveness, sum(engagment)/count(engagment) as engagment
        from statistics
        where class = ?
        group by profesor;";

        $profstmt = mysqli_prepare($dbc, $profesorQuery);
        mysqli_stmt_bind_param($profstmt, 's', $selectedClass);
        mysqli_stmt_execute($profstmt);
        $profresult = mysqli_stmt_get_result($profstmt);
        
        if ($profresult) {
            
            $professors = mysqli_fetch_all($profresult , MYSQLI_ASSOC);
        } else {
            echo "Error executing the query for professors. <br>";
        }
        mysqli_stmt_close($profstmt);

        // Your new query
        $newQuery = "SELECT 
                        SUM(fairness)/COUNT(fairness) AS fairness,
                        SUM(expertise)/COUNT(expertise) AS expertise,
                        SUM(adaptability)/COUNT(adaptability) AS adaptability,
                        SUM(use_of_tech)/COUNT(use_of_tech) AS useOfTech,
                        SUM(responsiveness)/COUNT(responsiveness) AS responsiveness,
                        SUM(engagment)/COUNT(engagment) AS engagment
                    FROM statistics
                    WHERE class = ?
                    GROUP BY class";

        // Prepare and execute the new query
        $stmt = mysqli_prepare($dbc, $newQuery);
        mysqli_stmt_bind_param($stmt, 's', $selectedClass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            
            $resultData = mysqli_fetch_assoc($result);

        } else {
            echo "Error executing the query. <br>";
        }

        mysqli_stmt_close($stmt);
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
    <h1>Welcome to the statistics section for the class: <?php echo $_POST['class'];?></h1>
    <div class="container">
        <h2>Class Overall Statistics</h2>
        <p>This chart displays the overall evaluation scores for the selected class based on various criteria.</p>
        <canvas id="classChart" width="400" height="200"></canvas>
    </div>
</div>
<div class="container">
    <h1>Welcome to the statistics section for the class: <?php echo $_POST['class'];?></h1>
    
    <?php foreach ($professors as $professor) : ?>
        <div class="container">
            <h2>Professor <?php echo $professor['profesor']; ?> Statistics</h2>
            <p>This chart displays the overall evaluation scores for Professor <?php echo $professor['profesor']; ?> based on various criteria.</p>
            <canvas id="professorChart_<?php echo $professor['profesor']; ?>" width="400" height="200"></canvas>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php foreach ($professors as $professor) : ?>
            var ctx_<?php echo $professor['profesor']; ?> = document.getElementById('professorChart_<?php echo $professor['profesor']; ?>').getContext('2d');
            var myChart_<?php echo $professor['profesor']; ?> = new Chart(ctx_<?php echo $professor['profesor']; ?>, {
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('classChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Fairness', 'Expertise', 'Adaptability', 'Responsiveness', 'Use of Tech', 'Engagement'],
                datasets: [{
                    label: 'Scores',
                    data: [
                        <?php
                        echo $resultData['fairness'] . ',';
                        echo $resultData['expertise'] . ',';
                        echo $resultData['adaptability'] . ',';
                        echo $resultData['useOfTech'] . ',';
                        echo $resultData['responsiveness'] . ',';
                        echo $resultData['engagment'];
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
    });
</script>

</body>
</html>
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
    
    if (isset($_POST['class'])) {
        
        $selectedClass = $_POST['class'];

        $profesorQuery = "Select profesor, sum(fairness)/count(fairness) as fairness, sum(expertise)/count(expertise) as expertise,
        sum(adaptability)/count(adaptability) as adaptability, sum(use_of_tech)/count(use_of_tech) as useOfTech,
        sum(responsiveness)/count(responsiveness) as responsiveness, sum(engagment)/count(engagment) as engagment
        from statistics
        where class = ?
        group by profesor;";

        $profstmt = mysqli_prepare($dbc, $profesorQuery);
        mysqli_stmt_bind_param($profstmt, 's', $selectedClass);
        mysqli_stmt_execute($profstmt);
        $profresult = mysqli_stmt_get_result($profstmt);
        
        if ($profresult) {
            
            $professors = mysqli_fetch_all($profresult , MYSQLI_ASSOC);
        } else {
            echo "Error executing the query for professors. <br>";
        }
        mysqli_stmt_close($profstmt);

        // Your new query
        $newQuery = "SELECT 
                        SUM(fairness)/COUNT(fairness) AS fairness,
                        SUM(expertise)/COUNT(expertise) AS expertise,
                        SUM(adaptability)/COUNT(adaptability) AS adaptability,
                        SUM(use_of_tech)/COUNT(use_of_tech) AS useOfTech,
                        SUM(responsiveness)/COUNT(responsiveness) AS responsiveness,
                        SUM(engagment)/COUNT(engagment) AS engagment
                    FROM statistics
                    WHERE class = ?
                    GROUP BY class";

        // Prepare and execute the new query
        $stmt = mysqli_prepare($dbc, $newQuery);
        mysqli_stmt_bind_param($stmt, 's', $selectedClass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            
            $resultData = mysqli_fetch_assoc($result);

        } else {
            echo "Error executing the query. <br>";
        }

        mysqli_stmt_close($stmt);
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
    <h1>Welcome to the statistics section for the class: <?php echo $_POST['class'];?></h1>
    <div class="container">
        <h2>Class Overall Statistics</h2>
        <p>This chart displays the overall evaluation scores for the selected class based on various criteria.</p>
        <canvas id="classChart" width="400" height="200"></canvas>
    </div>
</div>
<div class="container">
    <h1>Welcome to the statistics section for the class: <?php echo $_POST['class'];?></h1>
    
    <?php foreach ($professors as $professor) : ?>
        <div class="container">
            <h2>Professor <?php echo $professor['profesor']; ?> Statistics</h2>
            <p>This chart displays the overall evaluation scores for Professor <?php echo $professor['profesor']; ?> based on various criteria.</p>
            <canvas id="professorChart_<?php echo $professor['profesor']; ?>" width="400" height="200"></canvas>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php foreach ($professors as $professor) : ?>
            var ctx_<?php echo $professor['profesor']; ?> = document.getElementById('professorChart_<?php echo $professor['profesor']; ?>').getContext('2d');
            var myChart_<?php echo $professor['profesor']; ?> = new Chart(ctx_<?php echo $professor['profesor']; ?>, {
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('classChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Fairness', 'Expertise', 'Adaptability', 'Responsiveness', 'Use of Tech', 'Engagement'],
                datasets: [{
                    label: 'Scores',
                    data: [
                        <?php
                        echo $resultData['fairness'] . ',';
                        echo $resultData['expertise'] . ',';
                        echo $resultData['adaptability'] . ',';
                        echo $resultData['useOfTech'] . ',';
                        echo $resultData['responsiveness'] . ',';
                        echo $resultData['engagment'];
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
    });
</script>

</body>
</html>
>>>>>>> 48e1d74f5af58adfcc52d502163fe69c9db04bd7
