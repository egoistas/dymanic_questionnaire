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
    <link rel="stylesheet" type="text/css" href="css/controller.css">
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
    <a onclick="navigateToLinks()">Links</a>
</nav>

<div class="container">
    <h2>Welcome to Sphy Evaluation 2024, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Ready to start evaluating?</p>
</div>

<form id="professorsForm" action="proccess_class_info.php" method="post" class="left-form" novalidate>

    <h2>Class Information</h2>

    <!-- Class ID -->
    <label for="class_id">Class ID:</label>
    <input type="text" name="class_id" id="class_id" required>

    <!-- Number of Students -->
    <label for="num_students">Number of Students:</label>
    <input type="number" name="num_students" id="num_students" min="1" required>

    <!-- Professor Information -->
    <div id="professorsContainer">
        <h3>Professors</h3>
        <label for="professorName">Professor Name:</label>
        <input type="text" id="professorName" name="professorName" required>
        
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>
        
        <button type="button" onclick="addProfessor()">Add Professor</button>

        <!-- Professor List -->
        <ul class="professor-list" id="professorList" name="prof_list"></ul>

        <!-- Hidden/Disabled Fields -->
        <!-- <input type="hidden" id="hiddenProfessorName" name="professorName" style="display:none;" >
        <input type="hidden" id="hiddenSubject" name="subject" style="display:none;" > -->
        <input type="hidden" id="hiddenProfessorName" name="professorName"  >
        <input type="hidden" id="hiddenSubject" name="subject" >


    </div>
    <input type="submit" value="Submit">
</form>

<script>
    function addProfessor() {
    var professorName = document.getElementById("professorName").value;
    var subject = document.getElementById("subject").value;

    console.log("professorName:", professorName);
    console.log("subject:", subject);

    if (professorName && subject) {
        var professorList = document.getElementById("professorList");
        var listItem = document.createElement("li");
        listItem.textContent = professorName + " - " + subject;
        professorList.appendChild(listItem);
    
        updateHiddenInputs(professorName, subject);

       
        document.getElementById("professorName").value = "";
        document.getElementById("subject").value = "";
    } else {
        alert("Please enter both professor name and subject.");
    }
}

function updateHiddenInputs(professorName, subject) {
    // var hiddenProfessorName = document.getElementById("hiddenProfessorName");
    // var hiddenSubject = document.getElementById("hiddenSubject");


    document.getElementById("hiddenProfessorName").value += professorName + ",";
    //console.log(professorName + "-" +  document.getElementById("hiddenProfessorName").value);
    document.getElementById("hiddenSubject").value += subject + ",";
    //console.log(document.getElementById("hiddenSubject").value + "-" + subject );
    // na do an o kathigitis einai koma
}

console.log("I am here");

function prepareSubmit() {
    var hiddenProfessorName = document.getElementById("hiddenProfessorName");
    var hiddenSubject = document.getElementById("hiddenSubject");

    
}

    

    function navigateToLogout() {
        window.location.href = 'logout.php';
    }

    function navigateToHome() {
        window.location.href = 'welcome.php';
    }

    function navigateToAbout() {
        window.location.href = 'about.php';
    }

    function navigateToLinks(){
        window.location.href = 'links.php';
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>

</body>
</html>
