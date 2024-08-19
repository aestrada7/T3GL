<? session_start(); 
if (!empty($_SESSION['LgId']))
	$lid = $_SESSION['LgId'];
else
	$lid = $defaultLeagueId;
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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Referee Promotion";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Referee Promotion</p>
                        <form name="refp" action="refpromote.php" method="post">
                           Select player to be promoted:
						   <select name="pl">
						   <?
						      $sql = mysql_query("SELECT Player_ID, PlayerName FROM players WHERE (IsRef=0 OR IsStaff=0) AND League_ID='$lid'");
						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Promote"></input>
                        </form>
                        <?
                           $plid = $_POST["pl"];
                           if ($plid!="") {
						     $sql = mysql_query("UPDATE players SET IsRef=1 WHERE Player_ID = '$plid'");
 							 $result = mysql_query($sql);
							 $result = mysql_query("CALL ReSync()");
							 echo("Player promoted succesfully.");
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
