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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Create a Squad";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create a Squad</p>
                        <form name="sqcrt" action="squadcreate.php" method="post">
                           Squadname: <input type="text" name="sqname" size="20"></input><br>
                           <input type="submit" value="Submit"></input>
                        </form>
                        <?
                           $sqname = mysql_escape_string($_POST["sqname"]);
                           $plid = mysql_escape_string($_SESSION['PlId']);
                           $lid = mysql_escape_string($_SESSION['LgId']);
                           $exists = false;
                           if ($sqname!="") {
                             $sql = mysql_query("SELECT Owner_ID, SquadName FROM squads WHERE League_ID = '$lid'");
                             while ($row=mysql_fetch_array($sql)) {
                                if($sqname==$row[1]) {
                                   $exists = true;
                                }
                                if($plid==$row[0]) {
                                   $exists = true;
                                   $youownsomething = 1;
                                }
                             }
                             $sql = mysql_query("SELECT Player_ID, SquadName FROM sqprocess WHERE League_ID = '$lid'");
                             while ($row=mysql_fetch_array($sql)) {
                                if($sqname==$row[1]) {
                                   $exists = true;
                                }
                                if($plid==$row[0]) {
                                   $exists = true;
                                   $youownsomething = 1;
                                }
                             }
							 if ($exists==false) {
							     $sql = "INSERT INTO sqprocess(SquadName, Player_ID, League_ID) VALUES ('$sqname', '$plid', '$lid')";
							     $result = mysql_query($sql);
							     $result = mysql_query("CALL ReSync()");
							     echo("Squad succesfully created. An authorization request has been sent to League Administration.");
							 } else {
							     if($youownsomething==1) {
							       echo("You've already registered an squad, or is in process of being authorized.");
							     } else {
							       echo("This squad already exists or is in process of being authorized.");
							     }
							 }
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