<? session_start(); 

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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Update Scores";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Scores</p>
	  <p style="margin-left:10px;">
             <form name="rselect" action="updatescore.php" method="post">
             Select round to be Updated:
	       <select name="roundz">
	       <? 
		 $sql = mysql_query("SELECT Round FROM rounds WHERE League_Id='$lid'");
 	         while ($row=mysql_fetch_array($sql)) {
	           ?><option value="<? echo($row[0]); ?>"><? echo($row[0]); ?></option><?
		 }
	       ?>
               </select><br>
               <input type="submit" value="ZOMG GO ON"></input>
             </form>
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