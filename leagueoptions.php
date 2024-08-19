<? session_start();

$lid = $_SESSION['LgId'];

?>
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
<script language="JavaScript">
<!--
function check(control) {
	if(control.checked) {
	    document.forms["goptions"].rosterlock.value=1;
	} else {
	    document.forms["goptions"].rosterlock.value=0;	
	}
}

function doSubmit() {
    document.forms["goptions"]._refresh.value=1;
	document.forms["goptions"].submit();
}
//-->
</script>
</head>
<body>
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: League Options";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;League Options</p>
	     <p class="classicText">
		General league options... BE SURE THAT YOU KNOW WTF YOU'RE DOING OR YOU'LL MESS THIS UP.
		<br><br>
		<? $sql = mysql_query("SELECT RosterLimit FROM flags WHERE League_ID='$lid'");
		   while ($row=mysql_fetch_array($sql)) $rl = $row[0];
           $sql = mysql_query("SELECT RosterLock FROM flags WHERE League_ID='$lid'");
		   while ($row=mysql_fetch_array($sql)) $rlk = $row[0];		   
		?>
		<form name="goptions" action="leagueoptions.php" method="post">
			Roster Limit: <input type="text" name="rosterlimit" value="<? echo($rl); ?>"/><br>
		    Roster Lock in Effect: <input type="checkbox" name="rostertick" value="<? echo($rlk); ?>" <? if($rlk!=0) echo("checked"); ?> onChange='check(this);'/>
			<input type="hidden" name="rosterlock" />
			<input type="hidden" name="_refresh" value="0" />
			<br><br>
			<input type="button" value="Ok" onClick="doSubmit();" />
		</form>
                <?
		   $doRefresh = mysql_escape_string($_POST["_refresh"]);
		   if($doRefresh==1) {
               $NewRosterLimit = mysql_escape_string($_POST["rosterlimit"]);
			   $RosterLocked = mysql_escape_string($_POST["rosterlock"]);
			   $sql = "UPDATE flags SET RosterLock=" . $RosterLocked . " WHERE League_ID='$lid'";
			   $result = mysql_query($sql);
			   if($NewRosterLimit > 0) {
	               $sql = "UPDATE flags SET RosterLimit=" . $NewRosterLimit . " WHERE League_ID='$lid'";
				   $result = mysql_query($sql);
			   }
			   echo("Please refresh the page to review the last changes.");
		   }
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