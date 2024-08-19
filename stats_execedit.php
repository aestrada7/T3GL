<? session_start(); ?>

<body background="" aLink=white bgColor=#333333 link=white text=white topMargin=10  bottomMargin=0 leftmargin=0 rightmargin=0>

<?

include ($_['DOCUMENT_ROOT'] . 'logtop.php');

include ($_['DOCUMENT_ROOT'] . 'stats_update.php');

if (empty($_SESSION['PlId']) || $_SESSION['IsStaff'] == 0)
	return;



$query = "SELECT * FROM league.games WHERE Game_ID = 0";
$list = $utils->query($query);

?>
<table>
<tr>
<td>Squad A</td><td>Squad B</td><td>Score A</td><td>Score B</td><td>Start Date</td><td>End Date</td><td><b>GameID</b>
</tr>
<?

while ($game = mysql_fetch_object($list))
{
	$s = $game->EDate;

	if (!empty($HTTP_POST_VARS[$s]))
	{
		$tgid = $HTTP_POST_VARS[$s];

		$lid = $HTTP_POST_VARS['leagueId'];

		$query = "UPDATE league.games SET Game_ID = '$tgid' WHERE EDate = '$s' and League_ID = '$lid'";
		$utils->query($query);
		//print "$query<br>\n";

		$query = "UPDATE league.gamestats SET Game_ID = $tgid, Official = 1 WHERE abs(Date - $s) < 60 AND League_ID = '$lid'";
		$utils->query($query);

		$query = "UPDATE killlist INNER JOIN league.gamestats ON gamestats.SubGame_ID = killlist.SubGame_ID SET killlist.Game_ID = gamestats.Game_ID WHERE gamestats.Game_ID = '$tgid' AND gamestats.League_ID = '$lid'";
		$utils->query($query);

		$dList = $utils->getGameStatPids($tgid);

		for ($j = 0; $j < count($dList); $j++)
		{
			update_playerStats($utils, $dList[$j]);
			print "Updating player pid $dList[$j]....done<br>\n";
		}
		print "$j players were updated.<br>\n";

		print "<tr>\n";
		print "<td>$game->SquadA</td>";
		print "<td>$game->SquadB</td>";
		print "<td>$game->ScoreA</td>";
		print "<td>$game->ScoreB</td>";
		print "<td>$game->SDate</td>";
		print "<td>$game->EDate</td>";
		print "<td><b>$tgid</b></td>";
		print "</tr>\n\n";
	}
}
?>
</table>
