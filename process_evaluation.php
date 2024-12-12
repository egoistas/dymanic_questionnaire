<?php

require_once('mysqli_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    var_dump($_POST);
    $uniqueUrl = isset($_GET['id']) ? $_GET['id'] : null;
    $class_id = isset($_POST['classid']) ? $_POST['classid'] : null;

    try{

        $insertUrlQuery = "INSERT INTO check_url (url) VALUES (?)"; 


        $stmturl = mysqli_prepare($dbc, $insertUrlQuery);


        mysqli_stmt_bind_param($stmturl, 's', $uniqueUrl);
        mysqli_stmt_execute($stmturl);
        
        
        
    
    if (empty($uniqueUrl)) {
        header("Location: error.php");
        exit();
    }
    $groupedData = array();

    //var_dump($_POST);

    // xxx_xxx_xxx 
    
    foreach ($_POST as $key => $value) {
        
        if (strpos($key, '_') !== false) {
            // "_" spasimo
            $parts = explode('_', $key);

            
            $criteriaName = $parts[0];
            $professorName = $parts[1];
            $subject = $parts[2];

            
            $groupKey = "{$professorName}_{$subject}";

            
            if (!isset($groupedData[$groupKey])) {
                $groupedData[$groupKey] = array(
                    'professor' => $professorName,
                    'subject' => $subject,
                );  
            }        
            $groupedData[$groupKey][$criteriaName] = $value;
        }
    }
    
    foreach ($groupedData as $group) {
        
        $insertQuery = "INSERT INTO statistics (fairness, expertise, adaptability, 
        use_of_tech, responsiveness, engagment, 
        class, profesor, subject) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; 


        $stmt = mysqli_prepare($dbc, $insertQuery);


        mysqli_stmt_bind_param($stmt, 'iiiiissss', $group['Fairness'], $group['Expertise'], $group['Adaptability'],
         $group['UseofTechnoslogy'], $group['Responsiveness'], $group['Engagement'], $class_id, $group['professor'], 
         $group['subject']);
        mysqli_stmt_execute($stmt);

        
        mysqli_stmt_close($stmt);
    }

    
    header("Location: submited.php");
    exit();
} catch (Exception $e) {
    echo 'exception';
    header("Location: error.php");

}
}
?>
