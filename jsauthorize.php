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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Authorize Player";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorize Player</p>
<?
$lid = $_SESSION['LgId'];
$sid = $_SESSION['SquadID'];
$sql = mysql_query("SELECT RosterLimit FROM flags WHERE League_ID = '$lid'");
while($row=mysql_fetch_array($sql)) {
   $maxSize = $row[0];
}
$sql = mysql_query("SELECT COUNT(Player_ID) FROM players WHERE Squad_ID = '$sid' AND League_ID = '$lid'");
while($row=mysql_fetch_array($sql)) {
   $mySize = $row[0];
}
?>
                        <form name="plath" action="jsauthorize.php" method="post">
                           Select Player:
						   <select name="plid">
						   <?
						      $sql = mysql_query("SELECT PlProcess_ID, PlayerName FROM plprocess
						      					  INNER JOIN players ON plprocess.Player_ID = players.Player_ID
						      					  WHERE plprocess.Squad_ID = '$sid' AND plprocess.League_ID = '$lid'");

						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Authorize"></input>
                        </form>
                        <?
                           $plid = mysql_escape_string($_POST["plid"]);
						   $myid = mysql_escape_string($_SESSION['PlId']);
						   $sql = mysql_query("SELECT Squad_ID FROM players WHERE Player_ID = '$myid' AND League_ID = '$lid'");
						   while($row=mysql_fetch_array($sql)) {
  						       $sqid = $row[0];
						   }
                           if ($plid!="") {
				if($mySize<$maxSize) {
						     $sql = mysql_query("SELECT PlayerName, plprocess.Player_ID FROM plprocess
						     						INNER JOIN players ON plprocess.Player_ID=players.Player_ID
						     						WHERE plprocess.PlProcess_Id = '$plid' AND plprocess.League_ID = '$lid'");
							 while ($row=mysql_fetch_array($sql)) {
							    $player = $row[0];
								$plid = $row[1];
							 }
							 $sql = "UPDATE players SET Squad_ID = '$sqid' WHERE Player_ID = '$plid' AND League_ID = '$lid'";
							 $result = mysql_query($sql);
							 $sql = "DELETE FROM plprocess WHERE Player_ID = '$plid' AND League_ID = '$lid'";
							 $result = mysql_query($sql);
							 $result = mysql_query("CALL ReSync()");
							 echo("Player authorized succesfully.");
				} else {
					echo("Your squad has reached the maximum roster limit. That's too bad for you.");
				}
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
