<?php
// auto einai test file na blepo ta hash ton kodikon ton users
$password = "six";
$options = ['cost' => 10];
$hash = password_hash($password, PASSWORD_DEFAULT, $options);

echo $hash;

?>