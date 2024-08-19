<? session_start(); 
$round = $_GET['round'];
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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Round <? echo($round); ?>";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round <? echo($round); ?></p>
	  <?
        	if (!empty($_SESSION['LgId']))
        		$lid = $_SESSION['LgId'];
        	else
        		$lid = $defaultLeagueId;
		$rd = $_GET["round"];
 	        echo("<p class='classicText'>");
	        $sql = mysql_query("SELECT Game_ID, SID_A, SID_B FROM numatches WHERE League_ID = '$lid' AND Round='$rd'");
		echo("<ul>");
                while ( $row = mysql_fetch_array($sql) ) {
		     echo("<li><a href='match.php?GameID=$row[0]&SidA=$row[1]&SidB=$row[2]'>" . $utils->getSquad($row[1]) . " Vs. " . $utils->getSquad($row[2]) . "</a></li><br>");
                }
                echo("</ul></p>");
           ?>
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