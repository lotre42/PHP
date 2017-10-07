<?php
function print_error()
{
	echo("ERROR\n");
	exit(0);
}

if (($_POST['submit']) && ($_POST['login']) !== '' && ($_POST['passwd']) !== '')
{
	if (!file_exists("../private"))
		mkdir("../private");
	$user['login'] = ($_POST['login']);
	$user['passwd'] = (hash(sha224,$_POST['passwd']));
	if (!file_exists("../private/passwd"))
		file_put_contents("../private/passwd", "");
	if($bdd = unserialize(file_get_contents("../private/passwd")))
		foreach($bdd as $v)
			if($v['login'] === $user['login'])
				print_error();
	$bdd[] = $user;
	file_put_contents("../private/passwd", serialize($bdd));
	echo ("OK\n");
}
else
	print_error();
?>