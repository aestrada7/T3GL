<? session_start();
   $owner = $_SESSION['SqOwner'];
   $sqn = $_SESSION['Squad'];
   $sid = $_SESSION['SquadID'];
   $pid = $_SESSION['PlId'];
   $lid = $_SESSION['LgId'];

?>
<p class="menu">
<? echo($sqn); ?><br>
<!--<a href="#">Squad News</a><br>-->
<!--<a href="#">Results</a><br>-->
<!--<a href="#">Schedule</a><br>-->
<a href="roster.php?squad=<? print "$sid&lid=$lid";?>">Roster</a><br>
<?

if($owner == $pid) { ?>
<a href="prtrustee.php">Promote Trustees</a><br>
<a href="killtrustee.php">Kill Trustees</a><br>
<? }
   $sql = mysql_query("SELECT RosterLock FROM flags WHERE League_ID='$lid'");
   while ($row=mysql_fetch_array($sql)) $rlk = $row[0];
   if($rlk!=1) {
      if ($_SESSION['SqCoOwner1'] == $pid || $_SESSION['SqCoOwner2'] == $pid || $owner == $pid) {
?>
<a href="jsauthorize.php">Authorize Player</a><br>
<a href="kickplayer.php">Kick Player</a><br>
   <? } ?>

<a href="leavesquad.php">Leave Squad</a><br>
<? } ?>
</p>
