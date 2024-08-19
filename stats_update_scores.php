<? session_start(); ?>

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

if (empty($_SESSION['PlId']) || $_SESSION['IsStaff'] == 0)
	return;


if (!empty($_SESSION['LgId']))
	$lid = $_SESSION['LgId'];
else
	$lid = $utils->defaultLgId;


print "Updating $player->PlayerName...<br>\n";
update_squadRecords($utils, $lid);


print "<br>Done!\n";

?>