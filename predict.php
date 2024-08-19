<? session_start(); 
$lid = $defaultLeagueId;
$lid = $_SESSION['LgId'];
$pid = $_SESSION['PlId'];
$gid = 0;
$gid = $_GET['gameid'];
$mov = $_POST['mov'];
$sida = 0;
$sidb = 0;
$predicted = false;
$sidascore = 0;
$sidbscore = 0;

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
  if(document.forms['predictor'].sidAScore.value!=document.forms['predictor'].sidBScore.value) {
    document.forms['predictor'].mov.value="submitted";
    doSubmit('predictor');
  } else {
    alert("The match can't be tied.");
  }
}

function validate(controlname) {
  if(!controlname.value.match(/^\d+$/)) {
    controlname.value=0;
    alert("Only numbers are allowed.");
  }
}

//-->
</script>
</head>
<body">
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Predictions";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Predictions</p>
          <? if(($gid==0)&&($mov=="")) { ?>
            <p class="classicText">
            <? $Current = getCurrentRound($lid);
               echo "Matches For Round " . $Current;
               echo "<br><br>Click on a match to predict on it.";
               showMatchesForRound($Current,$lid,"predict.php");   
            ?>
            </p>
          <? } else { ?>
            <form name="predictor" action="predict.php" method="post">
              <input type="hidden" name="mov" value="" />
              <input type="hidden" name="gid" value="<? echo($gid); ?>" />
              <? 
                $sq = mysql_query("SELECT SID_A, SID_B FROM numatches WHERE Game_ID='$gid'");
                while($row=mysql_fetch_array($sq)) {
                  $sida = $row['SID_A'];
                  $sidb = $row['SID_B'];
                }
                ?>
                <input type="hidden" name="sida" value="<? echo($sida); ?>" /> 
                <input type="hidden" name="sidb" value="<? echo($sidb); ?>" /> 
                <?
                $sq = mysql_query("SELECT * FROM Predictions WHERE Player_ID='$pid' AND Game_ID='$gid'");
                while($row=mysql_fetch_array($sq)) {
                  $sidascore = $row['SquadAScore'];
                  $sidbscore = $row['SquadBScore'];
                  $predicted = true;
                }
              ?>
              <p class="classicText" align="center">
                <? echo(getSquad($sida)); ?>
                <input type="text" size=2 name="sidAScore" value="<? echo($sidascore); ?>" <? if($predicted) echo("disabled"); ?> onChange="validate(this);" />&nbsp:&nbsp
                <input type="text" size=2 name="sidBScore" value="<? echo($sidbscore); ?>" <? if($predicted) echo("disabled"); ?> onChange="validate(this);" />
                <? echo(getSquad($sidb)); ?>
                <br><br>
              <? if(!$predicted) { ?>
                <input type="button" value="Submit" onClick="doStuff();" />
              <? } else { ?>
                <input type="button" value="Return" onClick="location.href='predict.php';" />
              <? } ?>
              </p>
            </form>
          <? } ?>
          <? if($mov=="submitted") {
               $sida = $_POST['sida'];
               $sidb = $_POST['sidb'];
               $sidascore = $_POST['sidAScore'];
               $sidbscore = $_POST['sidBScore'];
               if($sidascore>$sidbscore) {
                 $winner = $sida;
               } else {
                 $winner = $sidb;
               }
               $gid = $_POST['gid'];
               $sq = "INSERT INTO Predictions(Player_ID,Game_ID,WinSquad,SquadAScore,SquadBScore,League_Id) VALUES('$pid','$gid','$winner','$sidascore','$sidbscore','$lid')";
               $result = mysql_query($sq);
               echo("Thank you, your prediction has been stored");
               ?> <input type="button" value="Return" onClick="location.href='predict.php';" /> <?
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
