<? session_start();
   $sid = $_SESSION['SquadID'];
   $lid = $_SESSION['LgId'];
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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Leave Squad";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leave Squad</p>
					<p class="og">
						Important: Are you sure you want to leave?
						</p>
                        <form name="leev" action="leavesquad.php" method="post">
                           <input type="submit" value="YES. LEAVE."></input>
                           <input type="hidden" name="leave" value="yes"></input>
                        </form>
                        <?
						   $plid = $_SESSION['PlId'];

						   if (!empty($_POST['leave']))
						   {
							    $sql = mysql_query("UPDATE players SET Squad_ID = 0 WHERE Player_ID='$plid' AND League_ID = '$lid'");
							    $result = mysql_query($sql);
							    $result = mysql_query("CALL ReSync()");
							 echo("You left omg.");

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