<? session_start(); 
$lid = $defaultLeagueId;
$lid = $_SESSION['LgId'];
$playerid = $_GET['playerid'];
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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: <? echo(getPlayerName($playerid)); ?>'s Predictions";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo(getPlayerName($playerid)); ?></p>
          <p class="classicText">
          <? echo(getPlayerName($playerid)); ?>'s Predictions:<br>
          <table align="center" cellspacing="0" cellpadding="2" border="1" width="400px">
            <tr>
              <th align="right">Squad A</th>
              <th align="center" width="30"></th>
              <th align="center" width="30"></th>
              <th align="left">Squad B</th>
              <th align="center">Points Awarded</th>
              <th align="center">Status</th>
            </tr>
          <? 
             $currentRound = 0;
             $sq = mysql_query("SELECT p.Game_ID, p.WinSquad, p.SquadAScore, p.SquadBScore, p.PointsAwarded, g.SquadA, g.SquadB, n.Round FROM league.Predictions p INNER JOIN (league.ws_games g INNER JOIN league.numatches n ON n.Game_ID=g.Game_ID) ON g.Game_ID=p.Game_ID WHERE Player_ID='$playerid' GROUP BY p.Game_ID ORDER BY n.Round");
             while($row=mysql_fetch_array($sq)) {
               if($currentRound!=$row[7]) {
                 $currentRound=$row[7];
                 echo("<tr><td colspan='6' align='center' bgcolor='#333333'><b><font color='#FFFFFF'>Round " . $currentRound . "</font></b></td>");
               }
               echo("<tr>");
               echo("<td align='right'>" . $row[5] . "</td>");
               echo("<td align='center' width='30'>" . $row[2] . "</td>");
               echo("<td align='center' width='30'>" . $row[3] . "</td>");
               echo("<td align='left'>" . $row[6] . "</td>");
               echo("<td align='center'>" . $row[4] . "</td>");
               if($row[4]==3) $legend = "<font color='#00FFFF'>(Match Score)</font>";
               if($row[4]==1) $legend = "<font color='#00FF00'>(Match Winner)</font>";
               if($row[4]==0) $legend = "<font color='#FF0000'>(Missed)</font>";
               if(($row[4]=="")||($row[4]==null)) $legend = "(Not Played Yet)";
               echo("<td align='center' bgcolor='#333333'>" . $legend . "</td>");           
               echo("</tr>");
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