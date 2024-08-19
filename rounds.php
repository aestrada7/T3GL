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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Rounds";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rounds</p>
	  <?
		if (!empty($_SESSION['LgId']))
        		$lid = $_SESSION['LgId'];
        	else
	        	$lid = $defaultLeagueId;
		        echo("<p class='classicText'>");
                        $sql = mysql_query("SELECT Round FROM rounds WHERE League_ID = '$lid' ORDER BY Round");
                        while ( $row = mysql_fetch_array($sql) ) {
		   	    $round = $row['Round'];
                 	    echo("<a href='matches.php?round=$round'>Round " . $round . "</a><br><br>");
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

