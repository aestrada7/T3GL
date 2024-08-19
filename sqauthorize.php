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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Authorize Squad";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorize Squad</p>
                        <form name="sqath" action="sqauthorize.php" method="post">
                           Select Squad:

						   <select name="sid">
						   <?

						   	  $lid = $_SESSION['LgId'];

						      $sql = mysql_query("SELECT SqProcess_ID, SquadName, PlayerName FROM sqprocess
						      					  INNER JOIN players ON Players.Player_ID = sqprocess.Player_ID
						      					  WHERE sqprocess.League_ID = '$lid'");
						      if ($row=mysql_fetch_array($sql))
						      {
								  $sqpid = $row["SqProcess_ID"];
								  $squadName = $row["SquadName"];
								  $playerName = $row["PlayerName"];

							      print "<option value='$sqpid'>$squadName ($playerName)</option>";
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Authorize"></input>
                        </form>
                        <?
                           $sqid = mysql_escape_string($_POST["sid"]);
                           if ($sqid != "")
                           {
                           	 $lid = $_SESSION['LgId'];
						     $sql = mysql_query("SELECT SquadName, Player_ID FROM sqprocess WHERE SqProcess_Id = '$sqid'");
							 while ($row=mysql_fetch_array($sql)) {
							    $squad = mysql_escape_string($row["SquadName"]);
								$pid = $row["Player_ID"];
							 }
							 $sql = "INSERT INTO squads SET SquadName = '$squad', Owner_ID = '$pid', League_ID = '$lid'";
							 $result = mysql_query($sql);
							 $result = mysql_query("CALL ReSync()");
							 $sql = "SELECT Squad_ID FROM squads WHERE SquadName = '$squad' AND League_ID = '$lid'";
							 $result = mysql_query($sql);
							 if ($row = mysql_fetch_array($result))
							 {
							 	$sid = $row["Squad_ID"];
								 $sql = "UPDATE players SET Squad_ID = '$sid' WHERE Player_ID = '$pid'";
								 $result = mysql_query($sql);
								 $sql = "DELETE FROM sqprocess WHERE SqProcess_Id = '$sqid'";
								 $result = mysql_query($sql);
								 $result = mysql_query("CALL ReSync()");
								 echo("Squad authorized succesfully.");
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