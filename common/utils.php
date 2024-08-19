<?php

class Utils {
    var $defaultLgId = 73;
    var $LeagueTitle = "T3: The Gauntlet! :: League 8";
    var $db = null;

    function setDB($db) {
        $this->db = $db;
    }

    function query($query)
    {
        $result = mysqli_query($this->db, $query);
        $error = $this->db->error;
        if($error != "") die("<b>Query error ($query):</b> " . $error);
        return $result;
    }

	//Misc

	function printBannerLink($pid, $lid)
	{
		return "<img src='http://league.t3g.org/banners/$pid.png'>";

	}

	function printStatsLink($pid, $lid)
	{
		return "    <a href='http://league.t3g.org/stats/php/listplayer.php?lid=$lid&pid=$pid'>[Stats link]</a>";
	}

	function getPlayerID($name, $lid)
	{
		$pid = 0;

		$result = $this->query("SELECT Player_ID FROM players WHERE League_ID = '$lid' AND PlayerName = '$name'");

		if ($player = mysql_fetch_object($result))
		{
			$pid = $player->Player_ID;
		}

		return $pid;
	}

	function getPlayer($id)
	{
		$query = "SELECT * FROM league.players INNER JOIN league.squads ON squads.Squad_ID = players.Squad_ID WHERE players.Player_ID = '$id'";
		$result = $this->query($query);
		return $result;
	}

	function getSquadID($n, $lid)
	{
		$query = "SELECT * FROM league.squads WHERE SquadName = '$n' AND League_ID = '$lid'";
		$result = $this->query($query);
		$s = mysql_fetch_object($result);
		return $s->Squad_ID;
	}

	function existPlayer($pid)
	{
		if ($p = mysql_fetch_object($this->getPlayer($pid)))
			return 1;
		else
			return 0;
	}

	function existSquad($sid)
	{
		if ($s = mysql_fetch_object($this->getSquad($sid)))
			return 1;
		else
			return 0;
	}

	function getSquad2($id)
	{
		$query = "SELECT * FROM league.squads WHERE Squad_ID = '$id'";
		$result = $this->query($query);
		return $result;
	}

	function getGameStatPids($gid)
	{
		$query = "SELECT Player_ID FROM league.gamestats WHERE Game_ID = $gid AND Official = 1";
		$plist = $this->query($query);

		$i = 0;
		while ($player = mysql_fetch_object($plist))
		{
			$dList[$i] = $player->Player_ID;
			$i++;
		}
		print "$i players need to be updated<br>\n";

		return $dList;
	}



	//Forum checking stuff

	function checkPassword($name, $password)
	{
		$auth = 0;

		$query = "SELECT converge_id, converge_pass_hash, converge_pass_salt, mgroup FROM t3ipbforum.ibf_members_converge INNER JOIN t3ipbforum.ibf_members ON ibf_members_converge.converge_id = ibf_members.id WHERE ibf_members.name = '$name'";
		$result = $this->query($query);
		if ($member = mysql_fetch_object($result))
		{
			$group = $member->mgroup;


			if ($member->converge_pass_hash == $this->generate_compiled_passhash($member->converge_pass_salt, $password))
				$auth = $member->converge_id;
		}
		else
			$auth = 0;

		return $auth;

	}

	function generate_compiled_passhash($salt, $password)
	{
		return md5( md5( $salt ) . md5($password) );
	}


	//Calendar stuff

	function checkDate($day, $month, $year)
	{
		$sdate = mktime(0, 0, 0, $month, $day, $year);
		$edate = $sdate + 86400;
		$s = "";

		$result = $this->query("SELECT *, Description FROM league.numatches
								INNER JOIN flags ON flags.League_ID = numatches.League_ID
								WHERE numatches.Date >= $sdate AND numatches.Date < $edate ORDER BY numatches.Date ASC");
		while ($row = mysql_fetch_object($result))
		{
			if (!empty($row->News))
			{
				$fnews = $row->News;
				$snews = substr($fnews, 0, 14);
				if (strlen($snews) < strlen($fnews))
					$snews .= "...";
				$s.= "<br><a onMouseOver=\"createTitle(this, '$fnews', event.pageX, event.pageY);\" onMouseOut='destroyTitle();'>$snews</a>";
			}
			else
			{
				$an = $this->getSquad($row->SID_A);
				$s_an = $this->shortenName($an);
				$bn = $this->getSquad($row->SID_B);
				$s_bn = $this->shortenName($bn);

				if (strlen($an) != 0 && strlen($bn) != 0)
				{
					$gid = $row->Game_ID;
					$lid = $row->League_ID;
					$conf = ($row->Confirmed == 1) ? "Confirmed" : "Unconfirmed";
					$descp = $row->Description;

					$est_date = date("g:ia", $row->Date);
					$gmt_date = date("g:ia", $row->Date + (60 * 60 * 5));
					$pst_date = date("g:ia", $row->Date - (60 * 60 * 3));

					$fmatch = "$descp<br><b>$an</b> vs <b>$bn</b><br><br>$pst_date PDT<br>$est_date EDT<br>$gmt_date GMT<br><br>$conf";

					$tlen = strlen($s_an) + strlen($s_bn) + 3;
					if (strlen($s_an) <= 6)
						$alen = 6 - strlen($s_an);
					else
						$alen = 0;
					if (strlen($s_bn) <= 6)
						$blen = 6 - strlen($s_bn);
					else
						$blen = 0;

					$smatch = substr($s_an, 0, 6 + $blen);
					$smatch .= " <font size=1>v</font> ";
					$smatch .= substr($s_bn, 0, 6 + $alen);

					$s.= "<br><a href='http://league.t3g.org/stats/php/listmatch.php?mid=$gid&lid=$lid' onMouseOver=\"createTitle(this, '$fmatch', event.pageX, event.pageY);\" onMouseOut=\"destroyTitle();\">$smatch</a>";
				}
			}
		}

		return $s;
	}

	function getSquad($sid)
	{
		$squad = "";
		$result = $this->query("SELECT * FROM league.squads WHERE Squad_ID = '$sid'");
		if ($row = mysql_fetch_object($result))
		{
			$squad = $row->SquadName;
		}
		return $squad;
	}

	function shortenName($sn)
	{
		$res = $sn;
		$res = ereg_replace("(a|e|i|o|u|A|E|I|O|U)", "", substr($res, 1));
		$res = substr($sn, 0, 1) . $res;

		return $res;
	}

	function getGame_Entire($sid, $gid, $pid)
	{
		$query = "SELECT sum(TimePlayed_WB) as TimePlayed_WB, sum(TimePlayed_JV) as TimePlayed_JV, sum(TimePlayed_SP) as TimePlayed_SP,
				      sum(TimePlayed_LV) as TimePlayed_LV, sum(TimePlayed_TR) as TimePlayed_TR, sum(TimePlayed_WS) as TimePlayed_WS,
				      sum(TimePlayed_LC) as TimePlayed_LC, sum(TimePlayed_SR) as TimePlayed_SR,

				      sum(PlayerKills_WB) as PlayerKills_WB, sum(PlayerKills_JV) as PlayerKills_JV, sum(PlayerKills_SP) as PlayerKills_SP,
				      sum(PlayerKills_LV) as PlayerKills_LV, sum(PlayerKills_TR) as PlayerKills_TR, sum(PlayerKills_WS) as PlayerKills_WS,
				      sum(PlayerKills_LC) as PlayerKills_LC, sum(PlayerKills_SR) as PlayerKills_SR,

				      sum(PlayerTeamKills_WB) as PlayerTeamKills_WB, sum(PlayerTeamKills_JV) as PlayerTeamKills_JV, sum(PlayerTeamKills_SP) as PlayerTeamKills_SP,
				      sum(PlayerTeamKills_LV) as PlayerTeamKills_LV, sum(PlayerTeamKills_TR) as PlayerTeamKills_TR, sum(PlayerTeamKills_WS) as PlayerTeamKills_WS,
				      sum(PlayerTeamKills_LC) as PlayerTeamKills_LC, sum(PlayerTeamKills_SR) as PlayerTeamKills_SR,

				      sum(PlayerDeaths_WB) as PlayerDeaths_WB, sum(PlayerDeaths_JV) as PlayerDeaths_JV, sum(PlayerDeaths_SP) as PlayerDeaths_SP,
				      sum(PlayerDeaths_LV) as PlayerDeaths_LV, sum(PlayerDeaths_TR) as PlayerDeaths_TR, sum(PlayerDeaths_WS) as PlayerDeaths_WS,
				      sum(PlayerDeaths_LC) as PlayerDeaths_LC, sum(PlayerDeaths_SR) as PlayerDeaths_SR,

				      sum(BombsFired_WB) as BombsFired_WB, sum(BombsFired_JV) as BombsFired_JV, sum(BombsFired_SP) as BombsFired_SP,
				      sum(BombsFired_LV) as BombsFired_LV, sum(BombsFired_TR) as BombsFired_TR, sum(BombsFired_WS) as BombsFired_WS,
				      sum(BombsFired_LC) as BombsFired_LC, sum(BombsFired_SR) as BombsFired_SR,

				      sum(BulletsFired_WB) as BulletsFired_WB, sum(BulletsFired_JV) as BulletsFired_JV, sum(BulletsFired_SP) as BulletsFired_SP,
				      sum(BulletsFired_LV) as BulletsFired_LV, sum(BulletsFired_TR) as BulletsFired_TR, sum(BulletsFired_WS) as BulletsFired_WS,
				      sum(BulletsFired_LC) as BulletsFired_LC, sum(BulletsFired_SR) as BulletsFired_SR,

				      sum(ThorsFired_WB) as ThorsFired_WB, sum(ThorsFired_JV) as ThorsFired_JV, sum(ThorsFired_SP) as ThorsFired_SP,
				      sum(ThorsFired_LV) as ThorsFired_LV, sum(ThorsFired_TR) as ThorsFired_TR, sum(ThorsFired_WS) as ThorsFired_WS,
				      sum(ThorsFired_LC) as ThorsFired_LC, sum(ThorsFired_SR) as ThorsFired_SR,

				      sum(BombsHitEnemy_WB) as BombsHitEnemy_WB, sum(BombsHitEnemy_JV) as BombsHitEnemy_JV, sum(BombsHitEnemy_SP) as BombsHitEnemy_SP,
				      sum(BombsHitEnemy_LV) as BombsHitEnemy_LV, sum(BombsHitEnemy_TR) as BombsHitEnemy_TR, sum(BombsHitEnemy_WS) as BombsHitEnemy_WS,
				      sum(BombsHitEnemy_LC) as BombsHitEnemy_LC, sum(BombsHitEnemy_SR) as BombsHitEnemy_SR,

				      sum(BulletsHitEnemy_WB) as BulletsHitEnemy_WB, sum(BulletsHitEnemy_JV) as BulletsHitEnemy_JV, sum(BulletsHitEnemy_SP) as BulletsHitEnemy_SP,
				      sum(BulletsHitEnemy_LV) as BulletsHitEnemy_LV, sum(BulletsHitEnemy_TR) as BulletsHitEnemy_TR, sum(BulletsHitEnemy_WS) as BulletsHitEnemy_WS,
				      sum(BulletsHitEnemy_LC) as BulletsHitEnemy_LC, sum(BulletsHitEnemy_SR) as BulletsHitEnemy_SR,

				      sum(ThorsHitEnemy_WB) as ThorsHitEnemy_WB, sum(ThorsHitEnemy_JV) as ThorsHitEnemy_JV, sum(ThorsHitEnemy_SP) as ThorsHitEnemy_SP,
				      sum(ThorsHitEnemy_LV) as ThorsHitEnemy_LV, sum(ThorsHitEnemy_TR) as ThorsHitEnemy_TR, sum(ThorsHitEnemy_WS) as ThorsHitEnemy_WS,
				      sum(ThorsHitEnemy_LC) as ThorsHitEnemy_LC, sum(ThorsHitEnemy_SR) as ThorsHitEnemy_SR,

				      sum(BombsHitSelf_WB) as BombsHitSelf_WB, sum(BombsHitSelf_JV) as BombsHitSelf_JV, sum(BombsHitSelf_SP) as BombsHitSelf_SP,
				      sum(BombsHitSelf_LV) as BombsHitSelf_LV, sum(BombsHitSelf_TR) as BombsHitSelf_TR, sum(BombsHitSelf_WS) as BombsHitSelf_WS,
				      sum(BombsHitSelf_LC) as BombsHitSelf_LC, sum(BombsHitSelf_SR) as BombsHitSelf_SR,

				      sum(BulletsHitSelf_WB) as BulletsHitSelf_WB, sum(BulletsHitSelf_JV) as BulletsHitSelf_JV, sum(BulletsHitSelf_SP) as BulletsHitSelf_SP,
				      sum(BulletsHitSelf_LV) as BulletsHitSelf_LV, sum(BulletsHitSelf_TR) as BulletsHitSelf_TR, sum(BulletsHitSelf_WS) as BulletsHitSelf_WS,
				      sum(BulletsHitSelf_LC) as BulletsHitSelf_LC, sum(BulletsHitSelf_SR) as BulletsHitSelf_SR,

				      sum(ThorsHitSelf_WB) as ThorsHitSelf_WB, sum(ThorsHitSelf_JV) as ThorsHitSelf_JV, sum(ThorsHitSelf_SP) as ThorsHitSelf_SP,
				      sum(ThorsHitSelf_LV) as ThorsHitSelf_LV, sum(ThorsHitSelf_TR) as ThorsHitSelf_TR, sum(ThorsHitSelf_WS) as ThorsHitSelf_WS,
				      sum(ThorsHitSelf_LC) as ThorsHitSelf_LC, sum(ThorsHitSelf_SR) as ThorsHitSelf_SR,

				      sum(DamageDealt_WB) as DamageDealt_WB, sum(DamageDealt_JV) as DamageDealt_JV, sum(DamageDealt_SP) as DamageDealt_SP,
				      sum(DamageDealt_LV) as DamageDealt_LV, sum(DamageDealt_TR) as DamageDealt_TR, sum(DamageDealt_WS) as DamageDealt_WS,
				      sum(DamageDealt_LC) as DamageDealt_LC, sum(DamageDealt_SR) as DamageDealt_SR,

				      sum(DamageDealtSelf_WB) as DamageDealtSelf_WB, sum(DamageDealtSelf_JV) as DamageDealtSelf_JV, sum(DamageDealtSelf_SP) as DamageDealtSelf_SP,
				      sum(DamageDealtSelf_LV) as DamageDealtSelf_LV, sum(DamageDealtSelf_TR) as DamageDealtSelf_TR, sum(DamageDealtSelf_WS) as DamageDealtSelf_WS,
				      sum(DamageDealtSelf_LC) as DamageDealtSelf_LC, sum(DamageDealtSelf_SR) as DamageDealtSelf_SR,

				      sum(DamageDealtTeam_WB) as DamageDealtTeam_WB, sum(DamageDealtTeam_JV) as DamageDealtTeam_JV, sum(DamageDealtTeam_SP) as DamageDealtTeam_SP,
				      sum(DamageDealtTeam_LV) as DamageDealtTeam_LV, sum(DamageDealtTeam_TR) as DamageDealtTeam_TR, sum(DamageDealtTeam_WS) as DamageDealtTeam_WS,
				      sum(DamageDealtTeam_LC) as DamageDealtTeam_LC, sum(DamageDealtTeam_SR) as DamageDealtTeam_SR,

				      sum(RepsForced_WB) as RepsForced_WB, sum(RepsForced_JV) as RepsForced_JV, sum(RepsForced_SP) as RepsForced_SP,
				      sum(RepsForced_LV) as RepsForced_LV, sum(RepsForced_TR) as RepsForced_TR, sum(RepsForced_WS) as RepsForced_WS,
				      sum(RepsForced_LC) as RepsForced_LC, sum(RepsForced_SR) as RepsForced_SR,

				      sum(MVP_Points) as MVP_Points,

				      sum(KO_WB) as KO_WB, sum(KO_JV) as KO_JV, sum(KO_SP) as KO_SP, sum(KO_LV) as KO_LV, sum(KO_TR) as KO_TR, sum(KO_WS) as KO_WS, sum(KO_LC) as KO_LC, sum(KO_SR) as KO_SR,
				      sum(Assists_WB) as Assists_WB, sum(Assists_JV) as Assists_JV, sum(Assists_SP) as Assists_SP, sum(Assists_LV) as Assists_LV, sum(Assists_TR) as Assists_TR, sum(Assists_WS) as Assists_WS, sum(Assists_LC) as Assists_LC, sum(Assists_SR) as Assists_SR,
				      sum(RepsD_WB) as RepsD_WB, sum(RepsD_JV) as RepsD_JV, sum(RepsD_SP) as RepsD_SP, sum(RepsD_LV) as RepsD_LV, sum(RepsD_TR) as RepsD_TR, sum(RepsD_WS) as RepsD_WS, sum(RepsD_LC) as RepsD_LC, sum(RepsD_SR) as RepsD_SR,
				      sum(ThorsD_WB) as ThorsD_WB, sum(ThorsD_JV) as ThorsD_JV, sum(ThorsD_SP) as ThorsD_SP, sum(ThorsD_LV) as ThorsD_LV, sum(ThorsD_TR) as ThorsD_TR, sum(ThorsD_WS) as ThorsD_WS, sum(ThorsD_LC) as ThorsD_LC, sum(ThorsD_SR) as ThorsD_SR,

				      avg(PingLow) as PingLow, avg(PingHigh) as PingHigh, avg(PingAverage) as PingAverage,
				      avg(PacketLossS2C) as PacketLossS2C, avg(PacketLossS2CW) as PacketLossS2CW, avg(PacketLossC2S) as PacketLossC2S, ";

				     if ($sid != -1 && $gid == -1)
				      	$query = $query . "min(players.Player_ID) as Player_ID, min(squads.Squad_ID) as Squad_ID, sum(playerstats.GamesPlayed) as GamesPlayed ";
				     else
				     	$query = $query . "min(gamestats.Player_ID) as Player_ID, sum(gamestats.GamesPlayed) as GamesPlayed, min(Game_ID) as Game_ID ";

				      if ($pid != -1 && $gid == -1 && $sid == -1)
					$query = $query . " FROM league.gamestats WHERE gamestats.Player_ID = '$pid' AND gamestats.Official = '1' AND gamestats.Game_ID != 0";
				      else if ($sid != -1 && $pid == -1 && $gid == -1)
				      {
					$query = $query . " FROM league.playerstats
							     INNER JOIN league.players ON players.Player_ID = playerstats.Player_ID
							     INNER JOIN league.squads ON squads.Squad_ID = players.Squad_ID
							     WHERE squads.Squad_ID = '$sid' AND playerstats.GamesPlayed > 0";
				      }
				      else if ($pid != -1 && $gid != -1 && $sid == -1)
				      	$query = $query . " FROM league.gamestats WHERE gamestats.Player_ID = '$pid' AND Game_ID = '$gid' AND gamestats.Official = '1'";
				      else if ($gid != -1 && $sid != -1 && $pid == -1)
				      {
				      	$query = $query . " FROM league.gamestats
				 			     INNER JOIN league.players ON players.Player_ID = gamestats.Player_ID
							     INNER JOIN league.squads ON squads.Squad_ID = players.Squad_ID
				                	 	     WHERE gamestats.Game_ID = '$gid' AND squads.Squad_ID = '$sid' AND gamestats.Official = '1'";
				       }

		$result = $this->query($query);
		return $result;
	}

	function playerRatingDB($pid)
	{
		$query = "SELECT MVP_Points as mpts, GamesPlayed FROM league.playerstats WHERE Player_ID = '$pid'";
		$result = $this->query($query);

		$p = mysql_fetch_object($result);

		if ($p->GamesPlayed == 0)
		{
			$r = 0;
		}
		else
		{
			//$r = ($p->mpts / (12 * $p->GamesPlayed)) - (1 / ($p->GamesPlayed + 5));
			//$r = round($r, 3);
			$r = $p->mpts;
		}

		return $r;
	}


    function getLeaguesDropBox()
    {
        $query = "SELECT League_ID, Description, Active FROM Flags";
        $result = $this->query($query);

        while ($league = $result->fetch_object())
        {
            if ($league->Active == 1)
                $selected = "selected";
            else
                $selected = "";

            $lid = $league->League_ID;
            $desc = $league->Description;
            
            print "<option $selected value='$lid'>$desc</option>\n";
        }
    }
}

?>