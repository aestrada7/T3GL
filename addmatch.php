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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Add Match";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Match</p>
	  <p style="margin-left:10px;">
	     <form name="addmatch" action="addmatch.php" method="post">
             Squad 1:
		<select name="s1">
		<?
		    $sql = mysql_query("SELECT Squad_Id, SquadName FROM squads WHERE League_Id='$lid'");
		    while ($row=mysql_fetch_array($sql)) {
		     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
		    }
		?>
                </select><br>
             Squad 2:
		<select name="s2">
		<?
		    $sql = mysql_query("SELECT Squad_Id, SquadName FROM squads WHERE League_Id='$lid'");
		    while ($row=mysql_fetch_array($sql)) {
		     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
		    }
		?>
                </select><br>
		<select name="round">
		<?
		    $sql = mysql_query("SELECT Round FROM rounds WHERE League_Id='$lid'");
		    while ($row=mysql_fetch_array($sql)) {
		     ?><option value="<? echo($row[0]); ?>"><? echo($row[0]); ?></option><?
		    }
		?>
		</select>
                <input type="submit" value="Submit"></input>
              </form>
              <?
                 $sq1 = $_POST["s1"];
		 $sq2 = $_POST["s2"];
		 $round = $_POST["round"];
                 if (($sq1!="")&&($sq2!="")) {
		    if ($sq1!=$sq2) {
		     $sql = "INSERT INTO numatches (League_ID, Round, SID_A, SID_B) VALUES(" . $lid . ", " . $round . ", " . $sq1 . ", " . $sq2 . ")";
		     $result = mysql_query($sql);
		     echo("The match $sq1 vs $sq2 was succesfully added.");
		    } else {
		       echo("You selected the same squad!");
		    }
                 } else {
		    echo("Please select both squads.");
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