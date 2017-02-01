<?php

require_once '_include/connection.php';

$sql = 'INSERT INTO users(email, password, full_name, token)
        VALUES(:email, :password, :full_name, :token)';

$token = mt_rand();

$req = $db->prepare($sql);
$req->execute(array(
	'email'     => $_POST['email'],
	'password'  => $_POST['password'],
  'full_name' => $_POST['full_name'],
	'token'     => $token
));

require_once 'login-post.php'

?>
