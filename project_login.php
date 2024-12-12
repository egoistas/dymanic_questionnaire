<<<<<<< HEAD
<?php
$title = "Σύνδεση";
include('includes/helper_functions.inc.php');
check_no_session();

require_once('mysqli_connect.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$loginSuccess = false; 
$errors = array(); 


session_start();
if (isset($_SESSION['username'])) {
    header("Location: user.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($username) || empty($password)) {
        $errors[] = "Παρακαλώ συμπληρώστε το όνομα χρήστη και τον κωδικό.";
    }

    if (empty($errors)) {
        $q = "SELECT user, password, role FROM users WHERE user=?";
        $stmt = mysqli_prepare($dbc, $q);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $usernameResult, $passwordResult, $role);
            mysqli_stmt_fetch($stmt);

            if (password_verify($password, $passwordResult)) {
                // Successful login
                $_SESSION['username'] = $usernameResult;
                $_SESSION['role'] = $role;
                $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
                $_SESSION['time'] = time();

                $loginSuccess = true;

                mysqli_stmt_close($stmt);
                mysqli_close($dbc);

                if ($role == 'admin') {
                    header("Location: controller.php");
                    exit();
                } elseif ($role == 'user') {
                    header("Location: viewer.php");
                    exit();
                }
            }
        }

        // Unsuccessful login
        if (!$loginSuccess) {
            $errors[] = "Ο συνδυασμός όνομα χρήστη/κωδικού δεν είναι αποδεκτός!";
        }
    }
}

// Display error messages
if (!empty($errors)) {
    print_error_messages($errors);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sphy Evaluation 2024</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            cursor: pointer;
            user-select: none;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
            margin-top: 100px;
            position: relative;
            z-index: 2;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25%, 75% {
                transform: translateX(-5px);
            }
            50% {
                transform: translateX(5px);
            }
        }

        .login-container h2 {
            color: #333;
        }

        .login-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #555;
        }

        .bottom-text {
            margin-top: 20px;
            color: #555;
        }

        .text--error {
            color: red;
            margin-bottom: 10px; /* Add margin to separate from the form */
        }
    </style>
</head>
<body>

<header onclick="goToHomePage()">
    <h1>Sphy Evaluation 2024</h1>
</header>

<div class="login-container">
    <h2>Login to Sphy Evaluation 2024</h2>

    <!-- Display the login form only if login was not successful -->
    <?php if (!$loginSuccess): ?>
        <!-- Display error messages if there are any -->
        <?php print_error_messages($errors); ?>

        <form class="login-form" action="#" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    <?php endif; ?>
</div>

<script>
    function goToHomePage() {
        window.location.href = 'welcome.php';
    }
</script>

</body>
</html>
=======
<?php
$title = "Σύνδεση";
include('includes/helper_functions.inc.php');
check_no_session();

require_once('mysqli_connect.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$loginSuccess = false; 
$errors = array(); 


session_start();
if (isset($_SESSION['username'])) {
    header("Location: user.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($username) || empty($password)) {
        $errors[] = "Παρακαλώ συμπληρώστε το όνομα χρήστη και τον κωδικό.";
    }

    if (empty($errors)) {
        $q = "SELECT user, password, role FROM users WHERE user=?";
        $stmt = mysqli_prepare($dbc, $q);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $usernameResult, $passwordResult, $role);
            mysqli_stmt_fetch($stmt);

            if (password_verify($password, $passwordResult)) {
                // Successful login
                $_SESSION['username'] = $usernameResult;
                $_SESSION['role'] = $role;
                $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
                $_SESSION['time'] = time();

                $loginSuccess = true;

                mysqli_stmt_close($stmt);
                mysqli_close($dbc);

                if ($role == 'admin') {
                    header("Location: controller.php");
                    exit();
                } elseif ($role == 'user') {
                    header("Location: viewer.php");
                    exit();
                }
            }
        }

        // Unsuccessful login
        if (!$loginSuccess) {
            $errors[] = "Ο συνδυασμός όνομα χρήστη/κωδικού δεν είναι αποδεκτός!";
        }
    }
}

// Display error messages
if (!empty($errors)) {
    print_error_messages($errors);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sphy Evaluation 2024</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            cursor: pointer;
            user-select: none;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
            margin-top: 100px;
            position: relative;
            z-index: 2;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25%, 75% {
                transform: translateX(-5px);
            }
            50% {
                transform: translateX(5px);
            }
        }

        .login-container h2 {
            color: #333;
        }

        .login-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #555;
        }

        .bottom-text {
            margin-top: 20px;
            color: #555;
        }

        .text--error {
            color: red;
            margin-bottom: 10px; /* Add margin to separate from the form */
        }
    </style>
</head>
<body>

<header onclick="goToHomePage()">
    <h1>Sphy Evaluation 2024</h1>
</header>

<div class="login-container">
    <h2>Login to Sphy Evaluation 2024</h2>

    <!-- Display the login form only if login was not successful -->
    <?php if (!$loginSuccess): ?>
        <!-- Display error messages if there are any -->
        <?php print_error_messages($errors); ?>

        <form class="login-form" action="#" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    <?php endif; ?>
</div>

<script>
    function goToHomePage() {
        window.location.href = 'welcome.php';
    }
</script>

</body>
</html>
>>>>>>> 48e1d74f5af58adfcc52d502163fe69c9db04bd7
