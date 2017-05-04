<?php
// Defines custom functions 

function is_admin($name = 'Samuel', $value = 'Clemens')
{
	if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value))
	{
		return true;
	}
	else
	{
		return false;
	}
}