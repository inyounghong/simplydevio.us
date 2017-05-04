<?php

if(isset($_COOKIE['Samuel']))
{
	setcookie('Samuel', FALSE, time()-300);
}

define('TITLE', 'logout');
include('templates/header.php');

print '<p>You are now logged out. <a href="login.php">Login</a> again.</p>'

?>