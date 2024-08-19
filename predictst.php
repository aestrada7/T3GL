<? session_start(); 
$lid = $defaultLeagueId;
$lid = $_SESSION['LgId'];
?> 
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body>
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Prediction Standings";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prediction Standings</p>
          <p class="classicText">
          Click on the name of a player to view a detailed list of his/her predictions.<br>
          <table align="center" cellspacing="0" cellpadding="2" border="1" width="400px">
            <tr>
              <th width="10">#</th>
              <th align="center">Player Name</th>
              <th align="center">Points</th>
            </tr>
          <? 
             $i=1;
             $sq = mysql_query("SELECT DISTINCT p.Player_ID,PlayerName,SUM(PointsAwarded) AS PointsA FROM league.Predictions p INNER JOIN league.Players pl ON pl.Player_ID=p.Player_ID WHERE pl.League_ID='$lid' GROUP BY(p.Player_ID) ORDER BY PointsA DESC");
             while($row=mysql_fetch_array($sq)) {
               echo("<tr><td width='10'>$i</td>");
               $i++;
               echo("<td align='center'><a href='predictbyplayer.php?playerid=" . $row[0] . "'>" . $row[1] . "</a></td>");
               echo("<td align='center'>" . $row[2] . "</td></tr>");
             }
          ?>
          </table>
          </p>
	</td>
	<td>
	  <? include ($_['DOCUMENT_ROOT'] . 'logside.php'); ?>
	</td>
      </tr>
	<? include ($_['DOCUMENT_ROOT'] . 'bottom.php'); ?>
    </table>
</body>
</html>
