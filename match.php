<? session_start(); 
$SidAId = $_GET["SidA"];
$SidBId = $_GET["SidB"];
?> 
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body>
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); 
$SidA = $utils->getSquad($SidAId);
$SidB = $utils->getSquad($SidBId); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: <? echo($SidA . ' Vs. ' . $SidB);?>";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Match Detail</p>
	  <?
		if (!empty($_SESSION['LgId']))
        		$lid = $_SESSION['LgId'];
        	else
        		$lid = $defaultLeagueId;
	        $gid = $_GET["GameID"];
        	echo("<p class='classicText'>");
	  ?>
	  <table align="left" style="margin:left:5px;">
	  <?
                $sql = mysql_query("SELECT * FROM ws_games WHERE League_ID = '$lid' AND Game_ID='$gid' GROUP BY Game_ID");
                while ( $row = mysql_fetch_array($sql) ) {
		      echo("<tr><td class='InnerBig'>" . $row['SquadA'] . "</td><td class='InnerBig'>" . $row['ScoreA'] . "</td></tr>");
 		      echo("<tr><td class='InnerBig'>" . $row['SquadB'] . "</td><td class='InnerBig'>" . $row['ScoreB'] . "</td></tr>");
		      $temp = $row['MVP']+0;	      
                }
	   $sql = mysql_query("SELECT PlayerName FROM players WHERE Player_ID = '$temp'");
	   while ( $row = mysql_fetch_array($sql) ) {
		$mvp = $row[0];
	   }
           echo("<tr><td class='InnerBig'>MVP: " . $mvp . "</td></tr>");
		   echo("<tr><td class='InnerBig'><a href='parser.php?game_id=".$gid."' target='_blank'>Game Log</a></td></tr>");
		   echo("<tr><td class='InnerBig'><a href='http://league.t3g.org/stats/php/listmatch.php?mid=".$gid."' target='_blank'>Detailed Stats</a></td></tr>");		   
	   ?>
	   </table>
	   <?
                echo("</p>");
           ?>
	</td>
	<td>
	  <? include ($_['DOCUMENT_ROOT'] . 'logside.php'); ?>
	</td>
      </tr>
	<? include ($_['DOCUMENT_ROOT'] . 'bottom.php'); ?>
    </table>
</body>
</html>