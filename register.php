<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body>
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Registration";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
		&nbsp;
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registration</p>
          <form name="registry" action="register.php" method="post">
            T3G Forums User Name<br><input type="text" name="user" size="20"></input><br>
            T3G Forums Password<br><input type="password" name="pwd" size="20"></input><br>
            In Game User Name<br><input type="text" name="ingame" size="20"></input><br>
            League<br>
            <select name="lid">
<?


	//include ($_['DOCUMENT.ROOT'] . 'common/dbconn.php');

	$utils->getLeaguesDropBox();
?>
            </select>
            <br><input type="submit" value="Submit"></input><br><br>
          </form>
          <?
            $user = mysql_escape_string($_POST['user']);
            $pwd = mysql_escape_string($_POST['pwd']);
            $ingame = mysql_escape_string($_POST['ingame']);
            $lid = mysql_escape_string($_POST['lid']);
			$exists = false;
			$authenticated = 0;
            if(($user!="")&&($pwd!="")&&($ingame!=""))
            {
				$authenticated = $utils->checkPassword($user, $pwd);

				if ($authenticated)
				{
					$sql = mysql_query("SELECT Forum_ID FROM players WHERE League_ID = '$lid' AND Forum_ID = '$authenticated'");
					if($row = mysql_fetch_object($sql) )
					{
						$exists = true;
						$playerlist = 0;
					}

					$sql = mysql_query("SELECT PlayerName FROM players WHERE League_ID = '$lid' AND PlayerName = '$ingame'");
					if ($row = mysql_fetch_object($sql) )
					{
						$exists = true;
						$playerlist = 1;
					}

					if (!$exists)
					{
						$sql = "INSERT INTO players(Forum_ID, League_Id, PlayerName) VALUES('$authenticated','$lid','$ingame')";
						$result = mysql_query($sql);

						$pid = $utils->getPlayerID($ingame, $lid);
						$sql = "INSERT INTO playerstats SET Player_ID = '$pid', League_ID = '$lid'";

						$result = mysql_query($sql);
						$result = mysql_query("CALL ReSync()");
						echo('<script language="JavaScript">location.href="regok.php"</script>');

					}
					else
					{
						if ($playerlist==1)
						  echo('This player name has already been registered.');
						else
						  echo('This forum name has already been registered.');
					 }
				}
				else
					 echo("Incorrect login for $user.");

            }
            else
            {
              echo('Please fill all the fields.');
            }
          ?>
	</td>
	<td>
	  &nbsp;
	</td>
      </tr>
	<? include ($_['DOCUMENT_ROOT'] . 'bottom.php'); ?>
    </table>
</body>
</html>
