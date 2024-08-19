<? session_start();

$lid = $_SESSION['LgId'];
$gid = $_GET["GameID"]+0;
$sida = $_GET["SidA"]+0;
$sidb = $_GET["SidB"]+0;
$WinPoints = 3;
$LosePoints = 1;
$ForfeitWinPoints = 3;
$ForfeitLosePoints = 0;

?>
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
<script language="JavaScript">
<!--

function doStuff() {
	document.forms['umatch'].submittedz.value=1;
	doSubmit('umatch');
}

//-->
</script>
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
		<p class="og">IMPORTANT: READ THIS<br>
		When a Squad forfeits instead of typing 0 on their score, type an "F" or leave it blank,
		otherwise the system will take it as a played match kthx gtfo.<br><br>
		Also please be careful while updating scores since I haven't written the edit match score
		function yet. If you mess up, ASK me before updating again, it would make a mess.
                Also; First upload the LOG. Then come back to editing this. kthx.</p>
<?
$result = mysql_query("SELECT * FROM league.squads WHERE Squad_ID = '$sida'");
	if ($row = mysql_fetch_object($result)) {
		$squad = $row->SquadName;
	}
$squadA = $squad;
$result = mysql_query("SELECT * FROM league.squads WHERE Squad_ID = '$sidb'");
	if ($row = mysql_fetch_object($result)) {
		$squad = $row->SquadName;
	}
$squadB = $squad;
?>
   		    <form enctype="multipart/form-data" action="upload.php" method="POST" name='uploader'>
		    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
		    <input type="hidden" name="gid" value="<? echo($gid); ?>" />
		    Choose a log to upload: <input name="uploadedfile" type="file" /><br />
		    <input type="submit" value="Upload Log" />
		    </form>

		    <? if($_POST["submittedz"]==0) { ?>

		    <form action="updatematch.php" method="post" name="umatch">
		    <input type="hidden" name="submittedz" value="0">
		    <input type="hidden" name="squadA" value="<?echo($squadA);?>">
		    <input type="hidden" name="squadB" value="<?echo($squadB);?>">
		    <input type="hidden" name="gid" value="<?echo($gid);?>">
		    <input type="hidden" name="sida" value="<?echo($sida);?>">
		    <input type="hidden" name="sidb" value="<?echo($sidb);?>">
			     <p class="classicText">
				 <table align="center" class="dark">
				 <tr>
				   <td>Squad</td><td>Score</td>
				 </tr>
				 <tr>
				   <td><? echo($squadA); ?></td>
				   <td><input type="text" size="5" name="scoreA"></td>
			     </tr>
				 <tr>
				   <td><? echo($squadB); ?></td>
				   <td><input type="text" size="5" name="scoreB"></td>
			     </tr>
				 </table>
				 <table align="center" class="dark">
				 <tr valign="top">
				   <td width="181" align="center">MVP:
				   <select name="mvp">
				        <?
				        $sql = mysql_query("SELECT Player_ID, PlayerName FROM players WHERE Squad_ID = '$sida' OR Squad_ID = '$sidb'");
						      while ($row=mysql_fetch_array($sql)) {
							     ?><option value="<? echo($row[0]); ?>"><? echo($row[1]); ?></option><?
							  }
					    ?>
				   </select>
				   </td>
				 </tr>
				 <tr>
				   <td align="center"><input type="button" value="OK"  onClick="doStuff();"></input></td>
				 </tr>
				 </table>
				 </p>
			</form>
 		    <? } ?>
			<?
			if($_POST["submittedz"]!=0) {
			    $ForfeitA = false;
			    $ForfeitB = false;
    				$scoreA = $_POST["scoreA"]+0;
				$scoreB = $_POST["scoreB"]+0;
				$mvpId = $_POST["mvp"]+0;
				$squadA = $_POST["squadA"];
				$squadB = $_POST["squadB"];
				$gid = $_POST["gid"]+0;
				$sida = $_POST["sida"]+0;
				$sidb = $_POST["sidb"]+0;
			    if(($scoreA=="")||($scoreA=="F")||($scoreA=="f")) {
				    $scoreA=-1;
					$ForfeitA = true;
				}
			    if(($scoreB=="")||($scoreB=="F")||($scoreB=="f")) {
				    $scoreB=-1;
					$ForfeitB = true;
				}
				$sql = "INSERT INTO ws_games(Game_ID, League_Id, SquadA, SquadB, ScoreA, ScoreB, MVP) VALUES('$gid','$lid','$squadA','$squadB','$scoreA','$scoreB','$mvpId')";
				$result = mysql_query($sql);

				if($scoreA>$scoreB) {
					$sql = "UPDATE squads SET GamesPlayed = GamesPlayed + 1, Wins = Wins + 1, Points = Points + '$WinPoints' WHERE Squad_ID = '$sida'";
					$result = mysql_query($sql);
					$sql = "UPDATE squads SET GamesPlayed = GamesPlayed + 1, Losses = Losses + 1, Points = Points + '$LosePoints' WHERE Squad_ID = '$sidb'";
				} else {
					$sql = "UPDATE squads SET GamesPlayed = GamesPlayed + 1, Wins = Wins + 1, Points = Points + '$WinPoints' WHERE Squad_ID = '$sidb'";
					$result = mysql_query($sql);
					$sql = "UPDATE squads SET GamesPlayed = GamesPlayed + 1, Losses = Losses + 1, Points = Points + '$LosePoints' WHERE Squad_ID = '$sida'";
					$result = mysql_query($sql);
				}
                                $sq = mysql_query("SELECT * FROM Predictions WHERE Game_ID='$gid'");
                                while($row=mysql_fetch_array($sq)) {
                                  $pointsA=0;
                                  $prId = $row['Prediction_ID'];
                                  $winnerP = $row['WinSquad'];
                                  $scoreAP = $row['SquadAScore'];
                                  $scoreBP = $row['SquadBScore'];
                                  if($scoreA>$scoreB) {
                                    $winner = $sida;
                                  } else {
                                    $winner = $sidb;
                                  }
                                  if($winner==$winnerP) {
                                    $pointsA=1;
                                  }
                                  if(($scoreA+0==$scoreAP+0)&&($scoreB+0==$scoreBP+0)) {
                                    $pointsA=3;
                                  }
                                  $sq2 = "UPDATE Predictions SET PointsAwarded='$pointsA' WHERE Prediction_ID='$prId'";
                                  $result = mysql_query($sq2);
                                }

				// HERE WE WOULD CHECK WITH THE "-1" TO SEE IF THIS WAS A FORFEITED MATCH AND ADD IT TO THE TABLE BUT IT DOESN'T EXIST.
				echo("Match successfully updated.");
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
