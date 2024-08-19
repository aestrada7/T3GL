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
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Add Rounds";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Rounds</p>
	  <p style="margin-left:10px;">
	    <?
		$round = $_GET["round"];
		$matchno = 1;
	    ?>
            <form name="addround2" action="addround2.php" method="post">
	    <?
		print "<input type='hidden' name='round' value='$round'>";
		for($i=1;$i<=$matchno;$i++) { ?>
                  <select name="squad1match<? echo($i); ?>">
 	        <?
		  $sql = mysql_query("SELECT Squad_Id, SquadName FROM squads WHERE League_Id='$lid'");
 	          while ($row=mysql_fetch_array($sql)) {							                        ?><option value="<? echo($row[0]); ?>"><?                     echo($row[1]); ?></option><?
		  }
		?>
                  </select>
                  VS
		  <select name="squad2match<? echo($i); ?>">
		<?
		  $sql = mysql_query("SELECT Squad_Id, SquadName FROM squads WHERE League_Id='$lid'");
	          while ($row=mysql_fetch_array($sql)) {
		     ?><option value="<? echo($row[0]); ?>"><? 		     echo($row[1]); ?></option><?
		  }
	        ?>
                  </select><br>
	     <? } ?>
             <input type="submit" value="Submit"></input>
             </form>
             <?
		for($i=1;$i<=$matchno;$i++) {
		$str1 = "squad1match".$i;
		$str2 = "squad2match".$i;
                $sq1 = mysql_escape_string($_POST[$str1]);
	        $sq2 = mysql_escape_string($_POST[$str2]);
	        $round = mysql_escape_string($_POST["round"]);
                if (($sq1!="")&&($sq2!="")) {
		  if ($sq1!=$sq2) {
		   $sql = "INSERT INTO numatches(League_ID, Round, SID_A, SID_B) VALUES('$lid', '$round', '$sq1', '$sq2')";
	   	   $result = mysql_query($sql);
		   echo("The match $sql vs $sq2 was succesfully added.");
		  } else {
		   echo("You selected the same squad!");
		  }
                } else {
		   echo("Please select both squads.");
		}
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