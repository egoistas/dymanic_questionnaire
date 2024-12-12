<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: project_login.php"); 
    exit();
}

ob_start();

require_once('mysqli_connect.php');

$query = "SELECT class_id, evaluation_url FROM evaluations";
$result = mysqli_query($dbc, $query);

if ($result) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    
    echo "Error fetching data: " . mysqli_error($dbc);
}

mysqli_close($dbc);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Links</title>
    <link rel="stylesheet" type="text/css" href="css/links.css">
</head>
<body>
    <header>
        <h1>Sphy Evaluation 2024 - Admin Page</h1>
    </header>
    <nav>
        <a href="welcome.php">Home</a>
        <a href="logout.php">Logout</a>
        <a href="about.php">About</a>
        <a href="controller.php">Control Dasboard</a>
    </nav>
    
    <div class="container">
        <h2>Easy visit</h2>
        <?php
        $currentClass = null;
        foreach ($data as $item):
            $classId = $item['class_id'];
            $studentUrl = $item['evaluation_url'];

            
            if ($currentClass !== $classId) {
                
                if ($currentClass !== null) {
                    echo '</ul></div>';
                }

                
                echo '<div class="class-box"><h2>Class ' . $classId . '</h2><ul>';
                $currentClass = $classId;
            }

            
            echo '<li><a href="evaluation.php?url=' . $studentUrl . '">' . $studentUrl . '</a></li>';
        endforeach;

        
        if ($currentClass !== null) {
            echo '</ul></div>';
        }
        ?>
    </div>
    
    <div class="container">
    <h2>URL list</h2>
    <?php
    $currentClass = null;
    foreach ($data as $item):
        $classId = $item['class_id'];
        $studentUrl = $item['evaluation_url'];

        
        if ($currentClass !== $classId) {
            
            if ($currentClass !== null) {
                echo '</ul></div>';
            }

            // Anoikse
            echo '<div class="class-box"><h2>Class ' . $classId . '</h2><ul>';
            $currentClass = $classId;
        }

        // San text to deixnei
        echo '<li class="url-list-item">localhost/project/questionarie/evaluation.php?url=' . $studentUrl . '</li>';
    endforeach;

    // Kleise kouti
    if ($currentClass !== null) {
        echo '</ul></div>';
    }
    ?>
</div>


<!--  
    <div class="url-list-container">
        <h2>URL List</h2>
        <ul>
            <?php foreach ($data as $item): ?>
                <li class="url-list-item"><?php echo "localhost/project/questionarie/evaluation.php?url=" . $item['student_url']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div> -->
    
</body>
</html>
