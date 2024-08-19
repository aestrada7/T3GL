<?
  session_start();


	include ($_['DOCUMENT_ROOT'] . 'common/dbconn.php');

  $user = mysql_escape_string($_POST['user']);
  $pwd = mysql_escape_string($_POST['pwd']);
  $lid = $defaultLeagueId;
  $lid = mysql_escape_string($_POST['lid']);

  $forum_authenticated = $utils->checkPassword($user, $pwd);

  if ($forum_authenticated)
  {
	$sql = mysql_query("SELECT PlayerName, Squad_ID, IsStaff, IsRef, Player_ID, League_ID FROM league.players WHERE League_ID = '$lid' AND Forum_ID = '$forum_authenticated'");

	if ($row = mysql_fetch_array($sql) )
	{
		  $_SESSION['User']= $row["PlayerName"];
		  $_SESSION['SquadID'] = $row["Squad_ID"];
		  $_SESSION['IsStaff'] = $row["IsStaff"];
		  $_SESSION['IsRef'] = $row["IsRef"];
		  $_SESSION['PlId'] = $row["Player_ID"];
		  $_SESSION['LgId'] = $row["League_ID"];
		  $sqid = $_SESSION['SquadID'];
	}

       $sql = mysql_query("SELECT Squad_ID, SquadName, Owner_ID, CoOwner1_ID, CoOwner2_ID FROM squads WHERE Squad_ID='$sqid'");
	if ($row = mysql_fetch_array($sql) )
	{
		  $_SESSION['Squad'] = $row["SquadName"];
		  $_SESSION['SqId'] = $row["Squad_ID"];
		  $_SESSION['SqOwner'] = $row["Owner_ID"];
		  $_SESSION['SqCoOwner1'] = $row["CoOwner1_ID"];
		  $_SESSION['SqCoOwner2'] = $row["CoOwner2_ID"];
	}
  }

?>
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body>
<? include ($_['DOCUMENT_ROOT'] . 'top.php'); ?>
<? if($_SESSION['User']!="") { ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Logged In";</script>
<? } else { ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Error";</script>
<? } ?>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          &nbsp;
	</td>
        <td class="Content">
        <? if($_SESSION['User']!="") { ?>
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logged In</p>
          <p class="og" align="center">You're now logged in as <? echo($_SESSION['User']); ?>.<br>
          <br>Click <a href="index.php">here</a> to return to the index.</p>
        <? } else { ?>
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error</p>
          <p class="og" align="center">Invalid login for <? echo($user); ?>, please try again.<br>
          <br>Click <a href="index.php">here</a> to return to the index.</p>
        <? } ?>
	</td>
	<td>
	  &nbsp;
	</td>
      </tr>
	<? include ($_['DOCUMENT_ROOT'] . 'bottom.php'); ?>
    </table>
</body>
</html>