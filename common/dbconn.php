<?php
	$defaultLeagueId = 72;
        
	include('common/utils.php');

	$link = mysql_connect("gauntlet-server.winbeam.com", "nighthawk", "EssQueElle");
	$db = mysql_select_db("league",$link);

	$utils = new Utils();
        include_once('common/common.php');

?>
