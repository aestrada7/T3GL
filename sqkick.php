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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Kick Squad";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kick Squad</p>
                        <form name="sqkc" action="sqkick.php" method="post">
                           Select squad to be kicked
						   <select name="sqid">
						   <?
						   		$lid = $_SESSION['LgId'];
						      $sql = mysql_query("SELECT Squad_ID, SquadName FROM squads WHERE League_ID = '$lid'");
						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row["Squad_ID"]); ?>"><? echo($row["SquadName"]); ?></option><?
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Kick"></input>
                        </form>
                        <?
                           $sqid = $_POST["sqid"];
                           if ($sqid!="") {
                           	 $sql = mysql_query("UPDATE players SET Squad_ID = 0 WHERE Squad_ID = '$sqid' AND League_ID = '$lid'");
                           	 $result = mysql_query($sql);
						     $sql = mysql_query("DELETE FROM squads WHERE Squad_ID = '$sqid' AND League_ID = '$lid'");
 							 $result = mysql_query($sql);
							 $result = mysql_query("CALL ReSync()");
							 echo("Squad succesfully removed.");
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
