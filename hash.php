<<<<<<< HEAD
<?php
// auto einai test file na blepo ta hash ton kodikon ton users
$password = "six";
$options = ['cost' => 10];
$hash = password_hash($password, PASSWORD_DEFAULT, $options);

echo $hash;

=======
<?php
// auto einai test file na blepo ta hash ton kodikon ton users
$password = "six";
$options = ['cost' => 10];
$hash = password_hash($password, PASSWORD_DEFAULT, $options);

echo $hash;

>>>>>>> 48e1d74f5af58adfcc52d502163fe69c9db04bd7
?>