<?php 
session_start();
if (!file_exists("../private"))
	mkdir("../private");
if (!file_exists("../private/chat"))
	file_put_contents("../private/chat", "");
if($bdd = unserialize(file_get_contents("../private/chat")))
	foreach($bdd as $v)
		echo($v['time']." <b>".$v['login']."</b>: ".$v['msg']."<br />\n");
	$bdd[] = $user;
?>