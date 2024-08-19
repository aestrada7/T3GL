<? session_start();
   $sid = $_SESSION['SquadID'];
   if ($sid == 0) die();
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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Promote Trustee";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Promote Trustee</p>
                        <form name="teep" action="prtrustee.php" method="post">
                           Select player to be promoted:
						   <select name="pl">
						   <?
						      $sql = mysql_query("SELECT Player_ID, PlayerName FROM players WHERE Squad_ID = '$sid'");
						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Promote"></input>
                        </form>
                        <?
						   $sql = mysql_query("SELECT Coowner1_ID, Coowner2_ID FROM squads WHERE Squad_ID = '$sid'");
						   while ($row=mysql_fetch_array($sql)) {
						      if($row[0]==0) {
							     $trustee = "Coowner1_ID";
							  } elseif ($row[1]==0) {
							     $trustee = "Coowner2_ID";
							  } else {
							     $trusteesAlreadyNamed = true;
							  }
						   }
						   if(!$trusteesAlreadyNamed) {
							   $plid = $_POST["pl"];
							   if ($plid != 0)
							   {
								 $sql = "UPDATE squads SET " . $trustee . " = '$plid' WHERE Squad_ID = '$sid'";
								 $result = mysql_query($sql);
								 $result = mysql_query("CALL ReSync()");
								 echo("Trustee promoted succesfully.");
							   }
						   } else {
						     echo("You already selected both Trustees.");
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