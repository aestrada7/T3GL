<? session_start(); 

$lid = $_SESSION['LgId'];
$round = $_POST["roundz"];

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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Update Scores";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Scores</p>
          <? echo("Round '$round' Matches:"); ?>
	    <p class="classicText">
	    <ul>
	       <?
		$sql = mysql_query("SELECT Game_ID, SID_A, SID_B FROM numatches WHERE League_Id='$lid' AND Round='$round'");
		while ($row=mysql_fetch_array($sql)) {
		   echo("<li><a href='updatematch.php?GameID=" . $row[0] . "&SidA=" . $row[1] . "&SidB=" . $row[2] . "'>" . $utils->getSquad($row[1]) . " Vs. " . $utils->getSquad($row[2]) . "</a></li>");
	        }
	       ?>
            </ul>
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