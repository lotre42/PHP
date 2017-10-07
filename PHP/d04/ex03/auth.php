<?php
function auth($login, $passwd)
{
	if($bdd = unserialize(file_get_contents("../private/passwd")))
		foreach($bdd as $i => $v)
			if($v['login'] === $login && $v['passwd'] === hash(sha224, $passwd))
				return(TRUE);
	return(FALSE);
}
?>