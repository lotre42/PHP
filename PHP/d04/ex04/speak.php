<?php
session_start();
if ($_SESSION['loggued_on_user'] === '')
	{
		echo("ERROR\n");
		exit(0);
	}
date_default_timezone_set('UTC');
echo "<script langage=\"javascript\">top.frames['chat'].location = 'chat.php';</script>";
echo '<form action="speak.php" method="POST">';
echo '<input type="text" name="msg" style="width: 100%; height: 75%;">';
if (($_POST['msg']))
{
	if (!file_exists("../private"))
		mkdir("../private");
	if ($fd = fopen("../private/chat", "r+"))
		flock($fd, LOCK_EX);
	$user['login'] = ($_SESSION['loggued_on_user']);
	$user['msg'] = $_POST['msg'];
	$user['time'] = date('[h:i]', time());
	if (!file_exists("../private/chat"))
		file_put_contents("../private/chat", "");
if($bdd = unserialize(file_get_contents("../private/chat")))
	if(!$bdd)
		file_put_contents("../private/chat", serialize(array($bdd)));
	$bdd[] = $user;
	file_put_contents("../private/chat", serialize($bdd));
}
?>