<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Athens');
require_once('includes/helper_functions.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php if (isset($title)) print $title; else print "Το καλύτερο site"; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/concise.min.css">
    <link rel="stylesheet" href="css/masthead.css">
</head>
<body>
    <header container class="siteHeader">
        <div row>
            <h1 column="4"><a href="index.php">Το site!</a></h1>
            <nav column="8" class="nav">
                <ul>
                    <li><a href="index.php">Αρχική</a></li>
                    <li><a href='view_quotes.php'>Ρητά</a></li>
                    <?php
$prog_name = basename($_SERVER['PHP_SELF']);
if (is_loggedin() && $prog_name != 'logout.php') {
    print "<li><a href='add_quote.php'>Προσθήκη ρητού</a>\n";
    print "<li><a href='logout.php'>Logout</a></li>\n";
    print "<li><a href='welcome.php'>{$_SESSION['username']}</a></li>\n";
} else {
    print "<li><a href='#'>-</a>\n";
    print "<li><a href='login.php'>Σύνδεση</a></li>\n";
    print "<li><a href='register.php'>Εγγραφή</a></li>\n";
}
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <main container class="siteContent">