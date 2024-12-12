<?php
require_once('mysqli_connect.php');

$evaluation_url = isset($_GET['url']) ? $_GET['url'] : null;

if (empty($evaluation_url)) {
    header("Location: error.php");
    exit();
}

$query = "SELECT e.class_id, professor_name, subject FROM evaluations e 
left join professor p on e.class_id = p.class_id WHERE evaluation_url = ?";
$stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt, 's', $evaluation_url);

if (!$stmt) {
    echo "Failed to prepare the statement: " . mysqli_error($dbc);
    header("Location: error.php");
    exit();
}

mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);


mysqli_stmt_bind_result($stmt, $class_id, $professor_name, $subject);


$data = array();
while (mysqli_stmt_fetch($stmt)) {
    $data[] = array('class_id' => $class_id, 'professor_name' => $professor_name, 'subject' => $subject);
}


//var_dump($data);

mysqli_stmt_close($stmt);
mysqli_close($dbc);
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <link rel="stylesheet" type="text/css" href="css/evaluation.css">
    <style>
        footer {
        position: static;
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
        <h1>Professors Evaluation Form</h1>
    </header>
    
    <div class="container">
        <h1>Evaluate for Class : <?php echo $class_id; ?></h1>

        <form id="evaluationForm" action="process_evaluation.php?id=<?php echo $evaluation_url; ?>" method="post">
            <input type="hidden" id="pickMe" name="pickMe" value="<?php echo $evaluation_url; ?>">
            <input type="hidden" name="classid" value="<?php echo $class_id; ?>">

            <?php
            foreach ($data as $item):
                $classId = $item['class_id'];
                $professorName = $item['professor_name'];
                $subject = $item['subject'];

                
                echo "<h2>Professor: $professorName - Subject: $subject</h2>";

                $criteria = array(
                    'Fairness', 
                    'Expertise',
                    'Adaptability', 
                    'UseofTechnoslogy', 
                    'Responsiveness', 
                    'Engagement',
                );

                foreach ($criteria as $label):
            ?>
                    <label for="<?php echo $professorName; ?>"><?php echo $label; ?>:</label>
                    <input type="number" name="<?php echo $label."_".$professorName."_".$subject; ?>" id="<?php 
                    echo $professorName; ?>" min="1" max="5" pattern="[1-5]" title="Please enter a value between 1 and 5">
                    <br>
            <?php
                endforeach;
            endforeach;
            ?>
            <button type="submit">Submit Evaluation</button>
        </form>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
<footer>
        <p>&copy; 2024 Sphy Evaluation. All rights reserved.</p>
    </footer>
</html>
