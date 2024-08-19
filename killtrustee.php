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
<body>
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Kill Trustee";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kill Trustee</p>
	   <form name="killt" action="killtrustee.php" method="post">
                    Select trustee to be demoted:
						   <select name="pl">
						   <?
						      $sql = mysql_query("SELECT Player_ID, PlayerName, Coowner1_ID, Coowner2_ID FROM players p INNER JOIN squads s ON s.Squad_ID=p.Squad_ID WHERE (s.Squad_ID = '$sid') AND (Player_ID = Coowner1_ID OR Player_ID = Coowner2_ID)");
						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Kill"></input>
                        </form>
                        <?
						   $plid = $_POST["pl"];
						   if ($plid!="") {
						     for($i=1;$i<=2;$i++) {
							    $sql = mysql_query("UPDATE squads SET Coowner".$i."_ID=0 WHERE Squad_ID = '$sid' AND Coowner".$i."_ID = '$plid'");
							    $result = mysql_query("CALL ReSync()");
							    $result = mysql_query($sql);
							 }
							 echo("Trustee demoted succesfully.");
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