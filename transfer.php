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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Transfer Pool";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transfer Pool</p>
<?

        					if (!empty($_SESSION['LgId']))
        						$lid = $_SESSION['LgId'];
        					else
        						$lid = $defaultLeagueId;


                           $sql = mysql_query("SELECT PlayerName, location FROM players
                           						INNER JOIN t3ipbforum.ibf_member_extra ON players.Forum_ID = t3ipbforum.ibf_member_extra.id
                           						WHERE players.Squad_ID = 0 AND players.League_ID = '$lid'");
                           while ( $row = mysql_fetch_array($sql) ) {
                             echo("<p class='classicText'>" . $utils->printBannerLink($row["Player_ID"], $lid) . "  " .
                             	$row["PlayerName"] . " - " . $row["location"] . "<br>");
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