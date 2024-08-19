<? session_start(); 
$sid=$_GET['squad'];
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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: <? $temp=$utils->getSquad($sid); echo($temp); ?> Roster";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo($temp); ?></p>
          <?
	        $lid = $_GET["lid"];
		$i = 1;
        	$sid = $_GET["squad"];
        	$sql = mysql_query("SELECT Player_ID, PlayerName, Owner_ID, Coowner1_ID, Coowner2_ID FROM league.players p INNER JOIN league.squads s ON s.Squad_ID = p.Squad_ID WHERE p.Squad_ID = '$sid' AND p.League_ID = '$lid' ORDER BY PlayerName ASC");
                while ( $row = mysql_fetch_array($sql) ) {
		     if($row["Player_ID"]==$row["Owner_ID"]) {
		          $AuxString = " - Captain";
		     }
		     if(($row["Player_ID"]==$row["Coowner1_ID"])||($row["Player_ID"]==$row["Coowner2_ID"])) {
			  $AuxString = " - Trustee";
		     }
		     print "<p class='classicText'>" . $i . ". " . $utils->printBannerLink($row["Player_ID"], $lid) . "   " . $row["PlayerName"] . $AuxString . "<br>";
		     $i++;
		     $AuxString = "";
                }
                echo("</p>");
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
