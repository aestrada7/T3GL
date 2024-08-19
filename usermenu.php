<?
  session_start();
?>

<p class="menu"><? echo($_SESSION['User']); ?><br>
<a href="predict.php">Predictions</a><br>
<a href="predictst.php">Prediction Standings</a><br>
<?
  if($_SESSION['SquadID']==0) {
    $sql = mysql_query("SELECT RosterLock FROM flags WHERE League_ID='$lid'");
	while ($row=mysql_fetch_array($sql)) $rlk = $row[0];
    if($rlk!=1) {
	    echo('<a href="squadjoin.php">Join a Squad</a><br>');
    	echo('<a href="squadcreate.php">Create a Squad</a>');
	}
  }
?>
<br>
<?
  if($_SESSION['IsRef']!=0) {
    include ($_['DOCUMENT.ROOT'] . 'refmenu.php');
  }
?>
<br>
<?
  if($_SESSION['IsStaff']!=0) {
    include ($_['DOCUMENT.ROOT'] . 'staffmenu.php');
  }
?>
</p>
