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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Join a Squad";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Join a Squad</p>
                        <form name="sqjoin" action="squadjoin.php" method="post">
                           Select Squad:
						   <select name="sid">
						   <?
						   	$lid = $_SESSION['LgId'];
						      $sql = mysql_query("SELECT Squad_ID, SquadName FROM squads WHERE League_ID = '$lid'");
						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
							  }
						   ?>
                           </select><br>
                           <input type="submit" value="Submit"></input>
                        </form>
                        <?
                           $sid = mysql_escape_string($_POST["sid"]);
                           $plid = mysql_escape_string($_SESSION['PlId']);
                           $lid = mysql_escape_string($_SESSION['LgId']);
                           $exists = false;
                           if ($sid!="") {
                             $sql = mysql_query("SELECT Player_ID FROM plprocess WHERE League_ID = '$lid'");
                             while ($row=mysql_fetch_array($sql)) {
                                if($plid==$row[0]) {
                                   $exists = true;
                                }
                             }
                             $sql = mysql_query("SELECT Player_ID FROM players WHERE League_ID = '$lid'
                             						AND NOT Squad_ID = 0 AND Player_ID = '$plid'");
                             if ($row = mysql_fetch_array($sql))
                             {
                                   $exists = true;
                             }
							 if (true) {

								 $sql = mysql_query("SELECT COUNT(Player_ID) FROM players WHERE Squad_ID = '$sid' AND League_Id='$lid'");
					                         while ($row=mysql_fetch_array($sql)) {
				        	                    $PlayerCount = $row[0];
								 }
								 $sql = mysql_query("SELECT RosterLimit FROM flags WHERE League_ID = '$lid'");
					                         while ($row=mysql_fetch_array($sql)) {
				        	                    $Limit = $row[0];
								 }

								 if($PlayerCount < $Limit) {

							 	     $sql = "DELETE FROM plprocess WHERE Player_ID = '$plid' AND League_ID = '$lid'";
							 	     mysql_query($sql);
							 	     $sql = "UPDATE players SET Squad_ID = 0 WHERE Player_ID = '$plid' AND League_ID = '$lid'";
								     mysql_query($sqla);

								     $sql = "INSERT INTO plprocess(Player_ID, Squad_ID, League_ID) VALUES ('$plid', '$sid', '$lid')";
								     $result = mysql_query($sql);
								     $result = mysql_query("CALL ReSync()");
								     echo("An authorization request has been sent to the Squad Captain.");
								 } else {
								     echo("This squad's roster is full.");
								 }
							  } else {
  							         echo("You are already in a squad or in process of authorization from a Squad Captain.");
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
