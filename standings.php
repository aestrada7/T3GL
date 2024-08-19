<? session_start(); ?>
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body>
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Standings";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Standings</p>
	     <p class="classicText">
		 <table align="center">
		   <tr>
		     <td>Pos.</td><td>Squad</td><td>Played</td><td>Wins</td><td>Losses</td><td>Points</td>
		       </tr>
		        <?
			if (!empty($_SESSION['LgId']))
				$lid = $_SESSION['LgId'];
			else
				$lid = $defaultLeagueId;
 		        $sql = mysql_query("SELECT Squad_ID, SquadName, GamesPlayed, Wins, Losses, Points FROM squads WHERE League_ID = '$lid' ORDER BY Points DESC, Wins DESC, Losses ASC, GamesPlayed ASC");
			$i=1;
  			while ($row=mysql_fetch_array($sql)) {
			 $wins = $row[3];
			 $losses = $row[4];
			 $squadName = $row[1];
			 $sid = $row[0];
			 $played = $row[2];
			 $pts = $row[5];
			 print "<tr><td>$i. </td>
		         <td><a href='http://league.t3g.org/stats/php/listsquad.php?sid=$sid'>$squadName</a></td>
 		         <td>$played</td>
			 <td>$wins</td>
			 <td>$losses</td>
			 <td>$pts</td></tr>";
			 $i++;
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