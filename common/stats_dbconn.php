<?

define('DBNAME', 'leagueseason4');
define('DBHOST', '64.84.96.94');
define('DBUSER', 'cgi2');
define('DBPASS', 'fjaksjaslkjas');

class stats_DB
{
 	function initDB()
	{
	    	mysql_pconnect(DBHOST, DBUSER, DBPASS) || die ('Error connecting to database');
	    	mysql_select_db(DBNAME) || die ('Error selecting database: ' . mysql_error());
	}

	function query($query)
	{
		$result = mysql_query($query);
		if (mysql_error())  die("<B>Query error ($query):</B> " . mysql_error());
    		return $result;
	}

	function getName($sid)
	{
		$query = "SELECT SquadName FROM leaguecommon.squads WHERE Squad_ID = '$sid'";
		$result = $this->query($query);
		if ($squad = mysql_fetch_object($result))
			$sqn = $squad->SquadName;
		return $sqn;
	}

	function getRound()
	{
		$query = "SELECT round FROM leagueseason4.misc";
		$result = $this->query($query);
		if ($rnd = mysql_fetch_object($result))
			$r = $rnd->round;
		else
			$r = 0;
		return $r;
	}
}

?>