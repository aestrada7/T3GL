<? session_start();
   if($_SESSION['User']!="") {
     if($_SESSION['SquadID']==0) {
       include ($_['DOCUMENT.ROOT'] . 'usermenu.php');
     } else {
       include ($_['DOCUMENT.ROOT'] . 'usermenu.php');
       include ($_['DOCUMENT.ROOT'] . 'squadmenu.php');
     }
   }
?>

<p class="menu">Main<br>
<a href="index.php">News</a><br>
<a href="listop.php">Referee / Staff Listing</a><br>
<a href="schedule.php">Match Schedule</a><br>
<a href="rounds.php">Match Results</a><br>
<a href="standings.php">Standings</a><br>
<!--<a href="#">Playoffs Bracket</a><br>-->
<br>
Information<br>
<a href="squads.php">Squad List</a><br>
<a href="players.php">Player List</a><br>
<a href="transfer.php">Transfer Pool</a><br>
<!-- <a href="#">Pending Transfers</a><br> I don't think this is useful so fuck it. -->
<!--<a href="register.php">Register</a><br>-->
<a href="http://forums.t3g.org" target="_blank">Forums</a>
</p>

