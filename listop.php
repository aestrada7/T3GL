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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Staff";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staff</p>
	  <?
	   if (!empty($_SESSION['LgId']))
	   	$lid = $_SESSION['LgId'];
	   else
		$lid = $defaultLeagueId;
           $sql = mysql_query("SELECT PlayerName, IsStaff FROM `players` WHERE `players`.League_ID = '$lid' AND (`players`.IsStaff=1 OR `players`.IsRef=1)");
           while ( $row = mysql_fetch_array($sql) ) {
	     if($row["IsStaff"] == 1) {
                echo("<p class='classicText'>" . $row["PlayerName"] . " - " . "League Staff" . "<br>");
  	     } else {
                echo("<p class='classicText'>" . $row["PlayerName"] . " - " . "Referee" . "<br>");
 	     }
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