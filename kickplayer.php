<? session_start();
   $sid = $_SESSION['SquadID'];
?>
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body onLoad="mm_preloadimages('images/LoginBtn_RollOver.png','images/RegisterBtn_RollOver.png');">
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Kick Player";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kick Player</p>
                        <form name="kkpl" action="kickplayer.php" method="post">
                           Select player to be kicked:
						   <select name="pl">
						   <?
						      $sql = mysql_query("SELECT Player_ID, PlayerName FROM players p INNER JOIN squads s ON s.Squad_ID=p.Squad_ID WHERE (s.Squad_ID = '$sid')");
						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Kick"></input>
                        </form>
                        <?
						   $plid = $_POST["pl"];
						   if ($plid!="") {
							    $sql = mysql_query("UPDATE players SET Squad_ID=0 WHERE Player_ID='$plid'");
							    $result = mysql_query($sql);
							    $result = mysql_query("CALL ReSync()");
 							 echo("Player succesfully kicked.");
						   }
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