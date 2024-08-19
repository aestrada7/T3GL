<? session_start(); ?>



<html>
<head><title>Edit Recently Played League Matches</title>
<style type="text/css">
	B { color:gold; font-size:8pt; font-family:tahoma,arial; }
	Table { font-size:10pt; }
	INPUT { color:black; font-size:8pt; font-family:tahoma,arial; }
</style>
</head>

<body background="" aLink=white bgColor=#333333 link=white text=white topMargin=10  bottomMargin=0 leftmargin=0 rightmargin=0>

<?


include ($_['DOCUMENT_ROOT'] . 'logtop.php');
include ($_['DOCUMENT.ROOT'] . 'common/dbconn.php');


if (empty($_SESSION['PlId']) || $_SESSION['IsStaff'] == 0)
	return;


if (!empty($_SESSION['LgId']))
	$lid = $_SESSION['LgId'];
else
	$lid = $utils->defaultLgId;

$curdate = time();
$diff = 7 * 24 * 60 * 60;

//$sdb = new stats_DB();
//$sdb->initDB();

$query = "SELECT * FROM league.numatches WHERE abs($curdate - Date) < $diff ORDER BY Date DESC";
$list = $utils->query($query);

?>
<table width=100%><tr><td align='center'>

	scheduled matches<br>
	<table border=1 cellpadding=2>
	<tr>
	<td><b>Game_ID</b></td><td><b>Squad A</b></td><td><b>Squad B</b></td><td><b>Date</b></td>
	</tr>
	<?

	while ($match = mysql_fetch_object($list))
	{
		$a = mysql_fetch_object($utils->getSquad2($match->SID_A));
		$b = mysql_fetch_object($utils->getSquad2($match->SID_B));


		$date = date("D M jS",$match->Date);
		print "<tr>\n";
		print "<td>$match->Game_ID</td>";
		print "<td>$a->SquadName</td>";
		print "<td>$b->SquadName</td>";
		print "<td>$date</td>";
		print "</tr>\n\n";
	}
	print "</table>\n";

	$query = "SELECT * FROM league.games WHERE Game_ID = 0 AND League_ID = '$lid'";
	$list = $utils->query($query);

	?>
</td><td align='center'>

	Recently played official matches, not yet appended to player stats db
	<table border=1 cellpadding=2>
	<tr>
	<td><b>Squad A</b></td><td><b>Squad B</b></td><td><b>Score A</b></td><td><b>Score B</b></td><td><b>Date</b></td><td><b>Start Time</b></td><td><b>End Time</b></td><td><b>GameID</b></td>
	</tr>

	<form action="stats_execedit.php" method="post">

	<?

	print "<input type='hidden' name='leagueId' value='$lid'>";

	while ($game = mysql_fetch_object($list))
	{
		$date = date("D M jS",$game->SDate);
		$stime = date("g:ia", $game->SDate);
		$etime = date("g:ia", $game->EDate);

		print "<tr>\n";
		print "<td>$game->SquadA</td>";
		print "<td>$game->SquadB</td>";
		print "<td>$game->ScoreA</td>";
		print "<td>$game->ScoreB</td>";
		print "<td>$date</td>";
		print "<td>$stime</td>";
		print "<td>$etime</td>";
		print "<td><input type='text' name='$game->EDate' size=2></td>";
		print "</tr>\n\n";
	} ?>

	</tr>

	</table>


</td></tr>
<tr><td colspan=2 align='center'><br><br><input type="submit" value="Update"></td></tr>

</form>
</table>
<?