<?php
function print_error()
{
	echo("ERROR\n");
	exit(0);
}

if (($_POST['submit']) && ($_POST['login']) !== '' && ($_POST['oldpw']) !== '' &&  ($_POST['newpw']) !== '')
{
	$check = FALSE;
	if (!file_exists("../private/passwd"))
		print_error();
	$user['login'] = ($_POST['login']);
	$user['oldpw'] = (hash(sha224,$_POST['oldpw']));
	$user['newpw'] = (hash(sha224,$_POST['newpw']));
	if($bdd = unserialize(file_get_contents("../private/passwd")))
		foreach($bdd as $i => $v)
			if($v['login'] === $user['login'] && $v['passwd'] === $user['oldpw'])
				{
					$check = TRUE;
					$bdd[$i]['passwd'] = $user['newpw'];
					echo("OK\n");
					file_put_contents("../private/passwd", serialize($bdd));
				}
	if ($check == FALSE)
		print_error();
}
else
	print_error();
?>