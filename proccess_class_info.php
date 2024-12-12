<<<<<<< HEAD
<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: project_login.php"); 
    exit();
}

ob_start();

require_once('mysqli_connect.php');
//var_dump($_POST['professorName']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    var_dump($_POST);

    $data = [
        "professorName" => $_POST['professorName'],
        "subject" => $_POST['subject']
    ];
    //adeiazo ta kena apo ta , 
    $professorNames = explode(",", $data["professorName"]);
    $subjects = explode(",", $data["subject"]);

    $professorNames = array_filter($professorNames, function($value) {
        return $value !== "";
    });
    $subjects = array_filter($subjects, function($value) {
        return $value !== "";
    });
    $professor_array = array_values($professorNames); 
    $subject_array = array_values($subjects); 

    print_r($professor_array);
    print_r($subject_array);    


    // ta globals apo tin forma mprosta
     $classId = $_POST['class_id'];
     $numStudents = $_POST['num_students'];

    // var_dump($professorList);
    for ($i = 0; $i < count($professor_array); $i++){
        // $uniqueUrl = uniqid();
        $professor = $professor_array[$i];
        $subject = $subject_array[$i]; 

        //Insert the data to the database 
        $queryEvaluations = "INSERT INTO professor (class_id, professor_name, subject) VALUES (?, ?, ?)";
        $stmtEvaluations = mysqli_prepare($dbc, $queryEvaluations);
        mysqli_stmt_bind_param($stmtEvaluations, 'iss', $classId, $professor, $subject);
        mysqli_stmt_execute($stmtEvaluations);
        mysqli_stmt_close($stmtEvaluations);
        
    }
    $evaluationId = mysqli_insert_id($dbc);

    for ($i = 1; $i <= $numStudents; $i++){
        $uniqueUrl = uniqid();
        $queryEvaluations_random = "INSERT INTO evaluations (class_id, evaluation_url) VALUES (?, ?)";
        $stmtEvaluations_random = mysqli_prepare($dbc, $queryEvaluations_random);
        mysqli_stmt_bind_param($stmtEvaluations_random, 'is', $classId, $uniqueUrl);
        mysqli_stmt_execute($stmtEvaluations_random);
        mysqli_stmt_close($stmtEvaluations_random);

    }
    header('Location: links.php');
    exit();

    
    // //header('Location: links.php');
    // exit();
    }
?>
=======
<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: project_login.php"); 
    exit();
}

ob_start();

require_once('mysqli_connect.php');
//var_dump($_POST['professorName']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    var_dump($_POST);

    $data = [
        "professorName" => $_POST['professorName'],
        "subject" => $_POST['subject']
    ];
    //adeiazo ta kena apo ta , 
    $professorNames = explode(",", $data["professorName"]);
    $subjects = explode(",", $data["subject"]);

    $professorNames = array_filter($professorNames, function($value) {
        return $value !== "";
    });
    $subjects = array_filter($subjects, function($value) {
        return $value !== "";
    });
    $professor_array = array_values($professorNames); 
    $subject_array = array_values($subjects); 

    print_r($professor_array);
    print_r($subject_array);    


    // ta globals apo tin forma mprosta
     $classId = $_POST['class_id'];
     $numStudents = $_POST['num_students'];

    // var_dump($professorList);
    for ($i = 0; $i < count($professor_array); $i++){
        // $uniqueUrl = uniqid();
        $professor = $professor_array[$i];
        $subject = $subject_array[$i]; 

        //Insert the data to the database 
        $queryEvaluations = "INSERT INTO professor (class_id, professor_name, subject) VALUES (?, ?, ?)";
        $stmtEvaluations = mysqli_prepare($dbc, $queryEvaluations);
        mysqli_stmt_bind_param($stmtEvaluations, 'iss', $classId, $professor, $subject);
        mysqli_stmt_execute($stmtEvaluations);
        mysqli_stmt_close($stmtEvaluations);
        
    }
    $evaluationId = mysqli_insert_id($dbc);

    for ($i = 1; $i <= $numStudents; $i++){
        $uniqueUrl = uniqid();
        $queryEvaluations_random = "INSERT INTO evaluations (class_id, evaluation_url) VALUES (?, ?)";
        $stmtEvaluations_random = mysqli_prepare($dbc, $queryEvaluations_random);
        mysqli_stmt_bind_param($stmtEvaluations_random, 'is', $classId, $uniqueUrl);
        mysqli_stmt_execute($stmtEvaluations_random);
        mysqli_stmt_close($stmtEvaluations_random);

    }
    header('Location: links.php');
    exit();

    
    // //header('Location: links.php');
    // exit();
    }
?>
>>>>>>> 48e1d74f5af58adfcc52d502163fe69c9db04bd7
