<html>
<head><title>Update all players</title>
<style type="text/css">
	B { color:gold; font-size:8pt; font-family:tahoma,arial; }
	Table { font-size:10pt; }
	INPUT { color:black; font-size:8pt; font-family:tahoma,arial; }
</style>
</head>

<body background="" aLink=white bgColor=#333333 link=white text=white topMargin=10  bottomMargin=0 leftmargin=0 rightmargin=0>



<?

include ($_['DOCUMENT_ROOT'] . 'logtop.php');

include ($_['DOCUMENT_ROOT'] . 'stats_update.php');


$query = "SELECT * FROM league.players";
$result = $utils->query($query);

while ($player = mysql_fetch_object($result))
{
	print "Updating $player->PlayerName...<br>\n";
	update_playerStats($utils, $player->Player_ID);
}

$query = "UPDATE killlist INNER JOIN league.gamestats ON gamestats.SubGame_ID = killlist.SubGame_ID SET killlist.Game_ID = gamestats.Game_ID WHERE gamestats.Official = '1'";
$utils->query($query);


print "<br>Done!\n";

?>