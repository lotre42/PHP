<?php
include ('auth.php');
session_start();
if (auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	echo '<iframe name="chat" src="chat.php" width=100% height="550"></iframe>'."\n";
	echo '<iframe name="speak" src="speak.php" width=100% height="50"></iframe>'."\n";
}
else
{	
	$_SESSION['loggued_on_user'] = NULL;
	echo("ERROR\n");
}
?>