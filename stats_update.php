<?

function update_squadRecords($db, $lid)
{
	$result = $db->query("SELECT SquadName, Squad_ID FROM league.squads WHERE League_ID = '$lid'");

	while ($squad = mysql_fetch_object($result))
	{
		$sid = $squad->Squad_ID;
		$sname = $squad->SquadName;
		$result2 = $db->query("
			SELECT SUM(GameWins = 2) AS Wins, SUM(GameWins <= 1) AS Losses,
			(SUM(GameWins = 1) + 3 * SUM(GameWins = 2)) AS Points
			FROM (
				 SELECT COUNT(SquadA = '$sname' OR NULL) AS GameWins,
						Game_ID, (SELECT 1) AS Constant
						FROM league.games
						WHERE League_ID = '$lid' AND Game_ID != 0 AND (SquadA = '$sname'
							  OR SquadB = '$sname') GROUP BY Game_ID) AS GameResults
						GROUP BY Constant");

		if ($score = mysql_fetch_object($result2))
		{
			$wins = $score->Wins;
			$losses = $score->Losses;
			$gp = $wins + $losses;
			$pts = $score->Points;

			$db->query("UPDATE league.squads SET Wins = $wins, Losses = $losses,
			GamesPlayed = '$gp', Points = '$pts' WHERE League_ID = 70 AND Squad_ID = '$sid'");
		}

		print "$sname: W: $wins L: $losses, P: $pts<br>\n";

	}
}


function update_playerStats($db, $pid)
{
	$game = $db->getGame_Entire(-1, -1, $pid);

	if ($r = mysql_fetch_object($game))
	{
		if (!empty($r->Player_ID))
		{
			$query = "UPDATE league.playerstats SET
					TimePlayed_WB = $r->TimePlayed_WB,
					TimePlayed_JV = $r->TimePlayed_JV,
					TimePlayed_SP = $r->TimePlayed_SP,
					TimePlayed_LV = $r->TimePlayed_LV,
					TimePlayed_TR = $r->TimePlayed_TR,
					TimePlayed_WS = $r->TimePlayed_WS,
					TimePlayed_LC = $r->TimePlayed_LC,
					TimePlayed_SR = $r->TimePlayed_SR,

					PlayerKills_WB = $r->PlayerKills_WB,
					PlayerKills_JV = $r->PlayerKills_JV,
					PlayerKills_SP = $r->PlayerKills_SP,
					PlayerKills_LV = $r->PlayerKills_LV,
					PlayerKills_TR = $r->PlayerKills_TR,
					PlayerKills_WS = $r->PlayerKills_WS,
					PlayerKills_LC = $r->PlayerKills_LC,
					PlayerKills_SR = $r->PlayerKills_SR,

					PlayerTeamKills_WB = $r->PlayerTeamKills_WB,
					PlayerTeamKills_JV = $r->PlayerTeamKills_JV,
					PlayerTeamKills_SP = $r->PlayerTeamKills_SP,
					PlayerTeamKills_LV = $r->PlayerTeamKills_LV,
					PlayerTeamKills_TR = $r->PlayerTeamKills_TR,
					PlayerTeamKills_WS = $r->PlayerTeamKills_WS,
					PlayerTeamKills_LC = $r->PlayerTeamKills_LC,
					PlayerTeamKills_SR = $r->PlayerTeamKills_SR,

					PlayerDeaths_WB = $r->PlayerDeaths_WB,
					PlayerDeaths_JV = $r->PlayerDeaths_JV,
					PlayerDeaths_SP = $r->PlayerDeaths_SP,
					PlayerDeaths_LV = $r->PlayerDeaths_LV,
					PlayerDeaths_TR = $r->PlayerDeaths_TR,
					PlayerDeaths_WS = $r->PlayerDeaths_WS,
					PlayerDeaths_LC = $r->PlayerDeaths_LC,
					PlayerDeaths_SR = $r->PlayerDeaths_SR,

					BombsFired_WB = $r->BombsFired_WB,
					BombsFired_JV = $r->BombsFired_JV,
					BombsFired_SP = $r->BombsFired_SP,
					BombsFired_LV = $r->BombsFired_LV,
					BombsFired_TR = $r->BombsFired_TR,
					BombsFired_WS = $r->BombsFired_WS,
					BombsFired_LC = $r->BombsFired_LC,
					BombsFired_SR = $r->BombsFired_SR,

					BulletsFired_WB = $r->BulletsFired_WB,
					BulletsFired_JV = $r->BulletsFired_JV,
					BulletsFired_SP = $r->BulletsFired_SP,
					BulletsFired_LV = $r->BulletsFired_LV,
					BulletsFired_TR = $r->BulletsFired_TR,
					BulletsFired_WS = $r->BulletsFired_WS,
					BulletsFired_LC = $r->BulletsFired_LC,
					BulletsFired_SR = $r->BulletsFired_SR,

					ThorsFired_WB = $r->ThorsFired_WB,
					ThorsFired_JV = $r->ThorsFired_JV,
					ThorsFired_SP = $r->ThorsFired_SP,
					ThorsFired_LV = $r->ThorsFired_LV,
					ThorsFired_TR = $r->ThorsFired_TR,
					ThorsFired_WS = $r->ThorsFired_WS,
					ThorsFired_LC = $r->ThorsFired_LC,
					ThorsFired_SR = $r->ThorsFired_SR,

					BombsHitEnemy_WB = $r->BombsHitEnemy_WB,
					BombsHitEnemy_JV = $r->BombsHitEnemy_JV,
					BombsHitEnemy_SP = $r->BombsHitEnemy_SP,
					BombsHitEnemy_LV = $r->BombsHitEnemy_LV,
					BombsHitEnemy_TR = $r->BombsHitEnemy_TR,
					BombsHitEnemy_WS = $r->BombsHitEnemy_WS,
					BombsHitEnemy_LC = $r->BombsHitEnemy_LC,
					BombsHitEnemy_SR = $r->BombsHitEnemy_SR,

					BombsHitSelf_WB = $r->BombsHitSelf_WB,
					BombsHitSelf_JV = $r->BombsHitSelf_JV,
					BombsHitSelf_SP = $r->BombsHitSelf_SP,
					BombsHitSelf_LV = $r->BombsHitSelf_LV,
					BombsHitSelf_TR = $r->BombsHitSelf_TR,
					BombsHitSelf_WS = $r->BombsHitSelf_WS,
					BombsHitSelf_LC = $r->BombsHitSelf_LC,
					BombsHitSelf_SR = $r->BombsHitSelf_SR,

					BulletsHitEnemy_WB = $r->BulletsHitEnemy_WB,
					BulletsHitEnemy_JV = $r->BulletsHitEnemy_JV,
					BulletsHitEnemy_SP = $r->BulletsHitEnemy_SP,
					BulletsHitEnemy_LV = $r->BulletsHitEnemy_LV,
					BulletsHitEnemy_TR = $r->BulletsHitEnemy_TR,
					BulletsHitEnemy_WS = $r->BulletsHitEnemy_WS,
					BulletsHitEnemy_LC = $r->BulletsHitEnemy_LC,
					BulletsHitEnemy_SR = $r->BulletsHitEnemy_SR,

					ThorsHitEnemy_WB = $r->ThorsHitEnemy_WB,
					ThorsHitEnemy_JV = $r->ThorsHitEnemy_JV,
					ThorsHitEnemy_SP = $r->ThorsHitEnemy_SP,
					ThorsHitEnemy_LV = $r->ThorsHitEnemy_LV,
					ThorsHitEnemy_TR = $r->ThorsHitEnemy_TR,
					ThorsHitEnemy_WS = $r->ThorsHitEnemy_WS,
					ThorsHitEnemy_LC = $r->ThorsHitEnemy_LC,
					ThorsHitEnemy_SR = $r->ThorsHitEnemy_SR,

					ThorsHitSelf_WB = $r->ThorsHitSelf_WB,
					ThorsHitSelf_JV = $r->ThorsHitSelf_JV,
					ThorsHitSelf_SP = $r->ThorsHitSelf_SP,
					ThorsHitSelf_LV = $r->ThorsHitSelf_LV,
					ThorsHitSelf_TR = $r->ThorsHitSelf_TR,
					ThorsHitSelf_WS = $r->ThorsHitSelf_WS,
					ThorsHitSelf_LC = $r->ThorsHitSelf_LC,
					ThorsHitSelf_SR = $r->ThorsHitSelf_SR,

					DamageDealt_WB = $r->DamageDealt_WB,
					DamageDealt_JV = $r->DamageDealt_JV,
					DamageDealt_SP = $r->DamageDealt_SP,
					DamageDealt_LV = $r->DamageDealt_LV,
					DamageDealt_TR = $r->DamageDealt_TR,
					DamageDealt_WS = $r->DamageDealt_WS,
					DamageDealt_LC = $r->DamageDealt_LC,
					DamageDealt_SR = $r->DamageDealt_SR,

					DamageDealtSelf_WB = $r->DamageDealtSelf_WB,
					DamageDealtSelf_JV = $r->DamageDealtSelf_JV,
					DamageDealtSelf_SP = $r->DamageDealtSelf_SP,
					DamageDealtSelf_LV = $r->DamageDealtSelf_LV,
					DamageDealtSelf_TR = $r->DamageDealtSelf_TR,
					DamageDealtSelf_WS = $r->DamageDealtSelf_WS,
					DamageDealtSelf_LC = $r->DamageDealtSelf_LC,
					DamageDealtSelf_SR = $r->DamageDealtSelf_SR,

					DamageDealtTeam_WB = $r->DamageDealtTeam_WB,
					DamageDealtTeam_JV = $r->DamageDealtTeam_JV,
					DamageDealtTeam_SP = $r->DamageDealtTeam_SP,
					DamageDealtTeam_LV = $r->DamageDealtTeam_LV,
					DamageDealtTeam_TR = $r->DamageDealtTeam_TR,
					DamageDealtTeam_WS = $r->DamageDealtTeam_WS,
					DamageDealtTeam_LC = $r->DamageDealtTeam_LC,
					DamageDealtTeam_SR = $r->DamageDealtTeam_SR,

					KO_WB = $r->KO_WB,
					KO_JV = $r->KO_JV,
					KO_SP = $r->KO_SP,
					KO_LV = $r->KO_LV,
					KO_TR = $r->KO_TR,
					KO_WS = $r->KO_WS,
					KO_LC = $r->KO_LC,
					KO_SR = $r->KO_SR,

					Assists_WB = $r->Assists_WB,
					Assists_JV = $r->Assists_JV,
					Assists_SP = $r->Assists_SP,
					Assists_LV = $r->Assists_LV,
					Assists_TR = $r->Assists_TR,
					Assists_WS = $r->Assists_WS,
					Assists_LC = $r->Assists_LC,
					Assists_SR = $r->Assists_SR,

					RepsD_WB = $r->RepsD_WB,
					RepsD_JV = $r->RepsD_JV,
					RepsD_SP = $r->RepsD_SP,
					RepsD_LV = $r->RepsD_LV,
					RepsD_TR = $r->RepsD_TR,
					RepsD_WS = $r->RepsD_WS,
					RepsD_LC = $r->RepsD_LC,
					RepsD_SR = $r->RepsD_SR,

					ThorsD_WB = $r->ThorsD_WB,
					ThorsD_JV = $r->ThorsD_JV,
					ThorsD_SP = $r->ThorsD_SP,
					ThorsD_LV = $r->ThorsD_LV,
					ThorsD_TR = $r->ThorsD_TR,
					ThorsD_WS = $r->ThorsD_WS,
					ThorsD_LC = $r->ThorsD_LC,
					ThorsD_SR = $r->ThorsD_SR,

					RepsForced_WB = $r->RepsForced_WB,
					RepsForced_JV = $r->RepsForced_JV,
					RepsForced_SP = $r->RepsForced_SP,
					RepsForced_LV = $r->RepsForced_LV,
					RepsForced_TR = $r->RepsForced_TR,
					RepsForced_WS = $r->RepsForced_WS,
					RepsForced_LC = $r->RepsForced_LC,
					RepsForced_SR = $r->RepsForced_SR,

					PingLow = $r->PingLow,
					PingHigh = $r->PingHigh,
					PingAverage = $r->PingAverage,
					PacketLossS2C = $r->PacketLossS2C,
					PacketLossS2CW = $r->PacketLossS2CW,
					PacketLossC2S = $r->PacketLossC2S,

					MVP_Points = $r->MVP_Points,

					GamesPlayed = $r->GamesPlayed

					WHERE Player_ID = '$pid'";
		}
		else
		{
			$query = "UPDATE league.playerstats SET
					TimePlayed_WB = 0,
					TimePlayed_JV = 0,
					TimePlayed_SP = 0,
					TimePlayed_LV = 0,
					TimePlayed_TR = 0,
					TimePlayed_WS = 0,
					TimePlayed_LC = 0,
					TimePlayed_SR = 0,

					PlayerKills_WB = 0,
					PlayerKills_JV = 0,
					PlayerKills_SP = 0,
					PlayerKills_LV = 0,
					PlayerKills_TR = 0,
					PlayerKills_WS = 0,
					PlayerKills_LC = 0,
					PlayerKills_SR = 0,

					PlayerTeamKills_WB = 0,
					PlayerTeamKills_JV = 0,
					PlayerTeamKills_SP = 0,
					PlayerTeamKills_LV = 0,
					PlayerTeamKills_TR = 0,
					PlayerTeamKills_WS = 0,
					PlayerTeamKills_LC = 0,
					PlayerTeamKills_SR = 0,

					PlayerDeaths_WB = 0,
					PlayerDeaths_JV = 0,
					PlayerDeaths_SP = 0,
					PlayerDeaths_LV = 0,
					PlayerDeaths_TR = 0,
					PlayerDeaths_WS = 0,
					PlayerDeaths_LC = 0,
					PlayerDeaths_SR = 0,

					BombsFired_WB = 0,
					BombsFired_JV = 0,
					BombsFired_SP = 0,
					BombsFired_LV = 0,
					BombsFired_TR = 0,
					BombsFired_WS = 0,
					BombsFired_LC = 0,
					BombsFired_SR = 0,

					BulletsFired_WB = 0,
					BulletsFired_JV = 0,
					BulletsFired_SP = 0,
					BulletsFired_LV = 0,
					BulletsFired_TR = 0,
					BulletsFired_WS = 0,
					BulletsFired_LC = 0,
					BulletsFired_SR = 0,

					ThorsFired_WB = 0,
					ThorsFired_JV = 0,
					ThorsFired_SP = 0,
					ThorsFired_LV = 0,
					ThorsFired_TR = 0,
					ThorsFired_WS = 0,
					ThorsFired_LC = 0,
					ThorsFired_SR = 0,

					BombsHitEnemy_WB = 0,
					BombsHitEnemy_JV = 0,
					BombsHitEnemy_SP = 0,
					BombsHitEnemy_LV = 0,
					BombsHitEnemy_TR = 0,
					BombsHitEnemy_WS = 0,
					BombsHitEnemy_LC = 0,
					BombsHitEnemy_SR = 0,

					BombsHitSelf_WB = 0,
					BombsHitSelf_JV = 0,
					BombsHitSelf_SP = 0,
					BombsHitSelf_LV = 0,
					BombsHitSelf_TR = 0,
					BombsHitSelf_WS = 0,
					BombsHitSelf_LC = 0,
					BombsHitSelf_SR = 0,

					BulletsHitEnemy_WB = 0,
					BulletsHitEnemy_JV = 0,
					BulletsHitEnemy_SP = 0,
					BulletsHitEnemy_LV = 0,
					BulletsHitEnemy_TR = 0,
					BulletsHitEnemy_WS = 0,
					BulletsHitEnemy_LC = 0,
					BulletsHitEnemy_SR = 0,

					ThorsHitEnemy_WB = 0,
					ThorsHitEnemy_JV = 0,
					ThorsHitEnemy_SP = 0,
					ThorsHitEnemy_LV = 0,
					ThorsHitEnemy_TR = 0,
					ThorsHitEnemy_WS = 0,
					ThorsHitEnemy_LC = 0,
					ThorsHitEnemy_SR = 0,

					ThorsHitSelf_WB = 0,
					ThorsHitSelf_JV = 0,
					ThorsHitSelf_SP = 0,
					ThorsHitSelf_LV = 0,
					ThorsHitSelf_TR = 0,
					ThorsHitSelf_WS = 0,
					ThorsHitSelf_LC = 0,
					ThorsHitSelf_SR = 0,

					DamageDealt_WB = 0,
					DamageDealt_JV = 0,
					DamageDealt_SP = 0,
					DamageDealt_LV = 0,
					DamageDealt_TR = 0,
					DamageDealt_WS = 0,
					DamageDealt_LC = 0,
					DamageDealt_SR = 0,

					DamageDealtSelf_WB = 0,
					DamageDealtSelf_JV = 0,
					DamageDealtSelf_SP = 0,
					DamageDealtSelf_LV = 0,
					DamageDealtSelf_TR = 0,
					DamageDealtSelf_WS = 0,
					DamageDealtSelf_LC = 0,
					DamageDealtSelf_SR = 0,

					DamageDealtTeam_WB = 0,
					DamageDealtTeam_JV = 0,
					DamageDealtTeam_SP = 0,
					DamageDealtTeam_LV = 0,
					DamageDealtTeam_TR = 0,
					DamageDealtTeam_WS = 0,
					DamageDealtTeam_LC = 0,
					DamageDealtTeam_SR = 0,

					KO_WB = 0,
					KO_JV = 0,
					KO_SP = 0,
					KO_LV = 0,
					KO_TR = 0,
					KO_WS = 0,
					KO_LC = 0,
					KO_SR = 0,

					Assists_WB = 0,
					Assists_JV = 0,
					Assists_SP = 0,
					Assists_LV = 0,
					Assists_TR = 0,
					Assists_WS = 0,
					Assists_LC = 0,
					Assists_SR = 0,

					RepsD_WB = 0,
					RepsD_JV = 0,
					RepsD_SP = 0,
					RepsD_LV = 0,
					RepsD_TR = 0,
					RepsD_WS = 0,
					RepsD_LC = 0,
					RepsD_SR = 0,

					ThorsD_WB = 0,
					ThorsD_JV = 0,
					ThorsD_SP = 0,
					ThorsD_LV = 0,
					ThorsD_TR = 0,
					ThorsD_WS = 0,
					ThorsD_LC = 0,
					ThorsD_SR = 0,

					RepsForced_WB = 0,
					RepsForced_JV = 0,
					RepsForced_SP = 0,
					RepsForced_LV = 0,
					RepsForced_TR = 0,
					RepsForced_WS = 0,
					RepsForced_LC = 0,
					RepsForced_SR = 0,


					PingLow = 0,
					PingHigh = 0,
					PingAverage = 0,
					PacketLossS2C = 0,
					PacketLossS2CW = 0,
					PacketLossC2S = 0,




					GamesPlayed = 0

					WHERE Player_ID = '$pid'";
		}
		$db->query($query);
		$rat = $db->playerRatingDB($pid);

		$query = "UPDATE league.playerstats SET Rating = '$rat' WHERE Player_ID = '$pid'";
		$db->query($query);
		print "$query\n<br>";
	}
}

function constructPlayerBanner($db, $pid)
{
		$query = "SELECT * FROM league.players WHERE Player_ID = '$pid'";
		$list = $this->query($query);

		if ($player = mysql_fetch_object($list))
		{
			$i = imagecreate(12,8);
			$c[0] = imagecolorallocate($i, 0, 0, 0);
			$c[1] = imagecolorallocate($i, 57, 57, 57);
			$c[2] = imagecolorallocate($i, 66, 66, 66);
			$c[3] = imagecolorallocate($i, 82, 82, 82);
			$c[4] = imagecolorallocate($i, 90, 90, 90);
			$c[5] = imagecolorallocate($i, 115, 115, 115);
			$c[6] = imagecolorallocate($i, 123, 123, 123);
			$c[7] = imagecolorallocate($i, 132, 132, 132);
			$c[8] = imagecolorallocate($i, 140, 140, 140);
			$c[9] = imagecolorallocate($i, 148, 148, 148);
			$c[10] = imagecolorallocate($i, 156, 156, 156);
			$c[11] = imagecolorallocate($i, 165, 165, 165);
			$c[12] = imagecolorallocate($i, 173, 173, 173);
			$c[13] = imagecolorallocate($i, 198, 198, 198);
			$c[14] = imagecolorallocate($i, 206, 206, 206);
			$c[15] = imagecolorallocate($i, 189, 181, 181);
			$c[16] = imagecolorallocate($i, 181, 173, 173);
			$c[17] = imagecolorallocate($i, 156, 148, 148);
			$c[18] = imagecolorallocate($i, 123, 115, 115);
			$c[19] = imagecolorallocate($i, 107, 99, 99);
			$c[20] = imagecolorallocate($i, 255, 222, 222);
			$c[21] = imagecolorallocate($i, 239, 198, 198);
			$c[22] = imagecolorallocate($i, 140, 115, 115);
			$c[23] = imagecolorallocate($i, 255, 206, 206);
			$c[24] = imagecolorallocate($i, 239, 181, 181);
			$c[25] = imagecolorallocate($i, 99, 74, 74);
			$c[26] = imagecolorallocate($i, 181, 132, 132);
			$c[27] = imagecolorallocate($i, 255, 181, 181);
			$c[28] = imagecolorallocate($i, 231, 132, 132);
			$c[29] = imagecolorallocate($i, 123, 66, 66);
			$c[30] = imagecolorallocate($i, 33, 16, 16);
			$c[31] = imagecolorallocate($i, 255, 123, 123);
			$c[32] = imagecolorallocate($i, 132, 41, 41);
			$c[33] = imagecolorallocate($i, 82, 24, 24);
			$c[34] = imagecolorallocate($i, 206, 8, 8);
			$c[35] = imagecolorallocate($i, 206, 41, 33);
			$c[36] = imagecolorallocate($i, 247, 99, 82);
			$c[37] = imagecolorallocate($i, 206, 90, 74);
			$c[38] = imagecolorallocate($i, 148, 99, 90);
			$c[39] = imagecolorallocate($i, 165, 66, 49);
			$c[40] = imagecolorallocate($i, 222, 49, 8);
			$c[41] = imagecolorallocate($i, 255, 57, 8);
			$c[42] = imagecolorallocate($i, 115, 24, 0);
			$c[43] = imagecolorallocate($i, 77, 45, 4);
			$c[44] = imagecolorallocate($i, 165, 41, 0);
			$c[45] = imagecolorallocate($i, 123, 99, 90);
			$c[46] = imagecolorallocate($i, 255, 132, 82);
			$c[47] = imagecolorallocate($i, 206, 99, 57);
			$c[48] = imagecolorallocate($i, 189, 66, 8);
			$c[49] = imagecolorallocate($i, 99, 33, 0);
			$c[50] = imagecolorallocate($i, 255, 181, 132);
			$c[51] = imagecolorallocate($i, 239, 107, 24);
			$c[52] = imagecolorallocate($i, 115, 57, 16);
			$c[53] = imagecolorallocate($i, 222, 132, 57);
			$c[54] = imagecolorallocate($i, 99, 90, 82);
			$c[55] = imagecolorallocate($i, 148, 140, 132);
			$c[56] = imagecolorallocate($i, 206, 140, 74);
			$c[57] = imagecolorallocate($i, 132, 90, 41);
			$c[58] = imagecolorallocate($i, 255, 165, 66);
			$c[59] = imagecolorallocate($i, 247, 140, 24);
			$c[60] = imagecolorallocate($i, 255, 214, 165);
			$c[61] = imagecolorallocate($i, 173, 140, 99);
			$c[62] = imagecolorallocate($i, 132, 82, 8);
			$c[63] = imagecolorallocate($i, 173, 115, 16);
			$c[64] = imagecolorallocate($i, 165, 107, 8);
			$c[65] = imagecolorallocate($i, 255, 231, 189);
			$c[66] = imagecolorallocate($i, 181, 123, 16);
			$c[67] = imagecolorallocate($i, 148, 99, 8);
			$c[68] = imagecolorallocate($i, 247, 222, 173);
			$c[69] = imagecolorallocate($i, 156, 140, 107);
			$c[70] = imagecolorallocate($i, 214, 181, 115);
			$c[71] = imagecolorallocate($i, 165, 132, 66);
			$c[72] = imagecolorallocate($i, 247, 181, 41);
			$c[73] = imagecolorallocate($i, 239, 173, 33);
			$c[74] = imagecolorallocate($i, 115, 107, 90);
			$c[75] = imagecolorallocate($i, 74, 66, 49);
			$c[76] = imagecolorallocate($i, 239, 206, 132);
			$c[77] = imagecolorallocate($i, 255, 206, 99);
			$c[78] = imagecolorallocate($i, 222, 173, 66);
			$c[79] = imagecolorallocate($i, 255, 189, 41);
			$c[80] = imagecolorallocate($i, 181, 148, 66);
			$c[81] = imagecolorallocate($i, 239, 189, 66);
			$c[82] = imagecolorallocate($i, 255, 198, 49);
			$c[83] = imagecolorallocate($i, 90, 66, 8);
			$c[84] = imagecolorallocate($i, 206, 148, 8);
			$c[85] = imagecolorallocate($i, 255, 222, 132);
			$c[86] = imagecolorallocate($i, 231, 181, 33);
			$c[87] = imagecolorallocate($i, 255, 247, 222);
			$c[88] = imagecolorallocate($i, 239, 231, 206);
			$c[89] = imagecolorallocate($i, 181, 173, 148);
			$c[90] = imagecolorallocate($i, 181, 165, 115);
			$c[91] = imagecolorallocate($i, 255, 231, 156);
			$c[92] = imagecolorallocate($i, 255, 214, 90);
			$c[93] = imagecolorallocate($i, 165, 156, 123);
			$c[94] = imagecolorallocate($i, 132, 123, 90);
			$c[95] = imagecolorallocate($i, 255, 247, 214);
			$c[96] = imagecolorallocate($i, 255, 239, 173);
			$c[97] = imagecolorallocate($i, 156, 132, 24);
			$c[98] = imagecolorallocate($i, 231, 198, 41);
			$c[99] = imagecolorallocate($i, 173, 156, 33);
			$c[100] = imagecolorallocate($i, 255, 231, 33);
			$c[101] = imagecolorallocate($i, 173, 173, 165);
			$c[102] = imagecolorallocate($i, 156, 156, 140);
			$c[103] = imagecolorallocate($i, 74, 74, 66);
			$c[104] = imagecolorallocate($i, 173, 173, 148);
			$c[105] = imagecolorallocate($i, 49, 49, 41);
			$c[106] = imagecolorallocate($i, 165, 165, 132);
			$c[107] = imagecolorallocate($i, 90, 90, 24);
			$c[108] = imagecolorallocate($i, 206, 206, 49);
			$c[109] = imagecolorallocate($i, 255, 255, 57);
			$c[110] = imagecolorallocate($i, 123, 132, 33);
			$c[111] = imagecolorallocate($i, 214, 231, 57);
			$c[112] = imagecolorallocate($i, 165, 181, 49);
			$c[113] = imagecolorallocate($i, 173, 198, 57);
			$c[114] = imagecolorallocate($i, 115, 132, 57);
			$c[115] = imagecolorallocate($i, 148, 181, 66);
			$c[116] = imagecolorallocate($i, 181, 206, 123);
			$c[117] = imagecolorallocate($i, 115, 148, 49);
			$c[118] = imagecolorallocate($i, 82, 107, 41);
			$c[119] = imagecolorallocate($i, 189, 247, 99);
			$c[120] = imagecolorallocate($i, 123, 165, 66);
			$c[121] = imagecolorallocate($i, 165, 222, 82);
			$c[122] = imagecolorallocate($i, 123, 181, 66);
			$c[123] = imagecolorallocate($i, 231, 247, 222);
			$c[124] = imagecolorallocate($i, 123, 140, 115);
			$c[125] = imagecolorallocate($i, 165, 189, 156);
			$c[126] = imagecolorallocate($i, 156, 247, 123);
			$c[127] = imagecolorallocate($i, 198, 231, 189);
			$c[128] = imagecolorallocate($i, 123, 181, 107);
			$c[129] = imagecolorallocate($i, 82, 148, 66);
			$c[130] = imagecolorallocate($i, 57, 132, 41);
			$c[131] = imagecolorallocate($i, 24, 57, 16);
			$c[132] = imagecolorallocate($i, 107, 222, 90);
			$c[133] = imagecolorallocate($i, 41, 90, 33);
			$c[134] = imagecolorallocate($i, 115, 255, 99);
			$c[135] = imagecolorallocate($i, 90, 206, 74);
			$c[136] = imagecolorallocate($i, 66, 148, 57);
			$c[137] = imagecolorallocate($i, 107, 206, 99);
			$c[138] = imagecolorallocate($i, 74, 173, 66);
			$c[139] = imagecolorallocate($i, 173, 181, 173);
			$c[140] = imagecolorallocate($i, 181, 206, 181);
			$c[141] = imagecolorallocate($i, 57, 66, 57);
			$c[142] = imagecolorallocate($i, 33, 49, 33);
			$c[143] = imagecolorallocate($i, 165, 247, 165);
			$c[144] = imagecolorallocate($i, 57, 115, 57);
			$c[145] = imagecolorallocate($i, 33, 82, 33);
			$c[146] = imagecolorallocate($i, 41, 107, 41);
			$c[147] = imagecolorallocate($i, 57, 148, 57);
			$c[148] = imagecolorallocate($i, 24, 82, 24);
			$c[149] = imagecolorallocate($i, 8, 74, 49);
			$c[150] = imagecolorallocate($i, 16, 66, 57);
			$c[151] = imagecolorallocate($i, 49, 57, 82);
			$c[152] = imagecolorallocate($i, 49, 57, 140);
			$c[153] = imagecolorallocate($i, 107, 115, 206);
			$c[154] = imagecolorallocate($i, 74, 82, 181);
			$c[155] = imagecolorallocate($i, 239, 239, 255);
			$c[156] = imagecolorallocate($i, 231, 231, 255);
			$c[157] = imagecolorallocate($i, 189, 189, 214);
			$c[158] = imagecolorallocate($i, 107, 107, 123);
			$c[159] = imagecolorallocate($i, 206, 206, 247);
			$c[160] = imagecolorallocate($i, 198, 198, 247);
			$c[161] = imagecolorallocate($i, 66, 66, 90);
			$c[162] = imagecolorallocate($i, 165, 165, 231);
			$c[163] = imagecolorallocate($i, 181, 181, 255);
			$c[164] = imagecolorallocate($i, 74, 74, 107);
			$c[165] = imagecolorallocate($i, 148, 148, 214);
			$c[166] = imagecolorallocate($i, 156, 156, 231);
			$c[167] = imagecolorallocate($i, 115, 115, 173);
			$c[168] = imagecolorallocate($i, 107, 107, 165);
			$c[169] = imagecolorallocate($i, 165, 165, 255);
			$c[170] = imagecolorallocate($i, 132, 132, 206);
			$c[171] = imagecolorallocate($i, 99, 99, 156);
			$c[172] = imagecolorallocate($i, 115, 115, 181);
			$c[173] = imagecolorallocate($i, 82, 82, 132);
			$c[174] = imagecolorallocate($i, 123, 123, 198);
			$c[175] = imagecolorallocate($i, 66, 66, 107);
			$c[176] = imagecolorallocate($i, 90, 90, 148);
			$c[177] = imagecolorallocate($i, 74, 74, 123);
			$c[178] = imagecolorallocate($i, 99, 99, 165);
			$c[179] = imagecolorallocate($i, 57, 57, 99);
			$c[180] = imagecolorallocate($i, 41, 41, 74);
			$c[181] = imagecolorallocate($i, 66, 66, 123);
			$c[182] = imagecolorallocate($i, 49, 49, 99);
			$c[183] = imagecolorallocate($i, 57, 57, 115);
			$c[184] = imagecolorallocate($i, 99, 99, 206);
			$c[185] = imagecolorallocate($i, 99, 99, 255);
			$c[186] = imagecolorallocate($i, 82, 82, 214);
			$c[187] = imagecolorallocate($i, 66, 66, 189);
			$c[188] = imagecolorallocate($i, 33, 33, 99);
			$c[189] = imagecolorallocate($i, 82, 82, 255);
			$c[190] = imagecolorallocate($i, 57, 57, 181);
			$c[191] = imagecolorallocate($i, 66, 66, 222);
			$c[192] = imagecolorallocate($i, 33, 33, 115);
			$c[193] = imagecolorallocate($i, 49, 41, 123);
			$c[194] = imagecolorallocate($i, 99, 90, 148);
			$c[195] = imagecolorallocate($i, 140, 132, 173);
			$c[196] = imagecolorallocate($i, 99, 90, 140);
			$c[197] = imagecolorallocate($i, 74, 41, 165);
			$c[198] = imagecolorallocate($i, 66, 16, 198);
			$c[199] = imagecolorallocate($i, 41, 0, 148);
			$c[200] = imagecolorallocate($i, 74, 41, 148);
			$c[201] = imagecolorallocate($i, 181, 156, 231);
			$c[202] = imagecolorallocate($i, 33, 24, 49);
			$c[203] = imagecolorallocate($i, 99, 66, 156);
			$c[204] = imagecolorallocate($i, 63, 45, 14);
			$c[205] = imagecolorallocate($i, 33, 0, 82);
			$c[206] = imagecolorallocate($i, 49, 0, 123);
			$c[207] = imagecolorallocate($i, 132, 99, 173);
			$c[208] = imagecolorallocate($i, 132, 66, 214);
			$c[209] = imagecolorallocate($i, 99, 33, 181);
			$c[210] = imagecolorallocate($i, 57, 0, 132);
			$c[211] = imagecolorallocate($i, 181, 132, 239);
			$c[212] = imagecolorallocate($i, 173, 107, 247);
			$c[213] = imagecolorallocate($i, 115, 66, 173);
			$c[214] = imagecolorallocate($i, 132, 74, 198);
			$c[215] = imagecolorallocate($i, 82, 41, 123);
			$c[216] = imagecolorallocate($i, 74, 33, 115);
			$c[217] = imagecolorallocate($i, 49, 0, 99);
			$c[218] = imagecolorallocate($i, 74, 0, 148);
			$c[219] = imagecolorallocate($i, 82, 0, 165);
			$c[220] = imagecolorallocate($i, 74, 57, 90);
			$c[221] = imagecolorallocate($i, 99, 74, 123);
			$c[222] = imagecolorallocate($i, 206, 148, 255);
			$c[223] = imagecolorallocate($i, 156, 107, 198);
			$c[224] = imagecolorallocate($i, 123, 66, 173);
			$c[225] = imagecolorallocate($i, 156, 82, 222);
			$c[226] = imagecolorallocate($i, 74, 8, 132);
			$c[227] = imagecolorallocate($i, 33, 0, 57);
			$c[228] = imagecolorallocate($i, 173, 99, 198);
			$c[229] = imagecolorallocate($i, 74, 0, 99);
			$c[230] = imagecolorallocate($i, 156, 99, 165);
			$c[231] = imagecolorallocate($i, 99, 0, 115);
			$c[232] = imagecolorallocate($i, 123, 115, 123);
			$c[233] = imagecolorallocate($i, 10, 25, 10);
			$c[234] = imagecolorallocate($i, 74, 0, 74);
			$c[235] = imagecolorallocate($i, 82, 0, 82);
			$c[236] = imagecolorallocate($i, 123, 0, 115);
			$c[237] = imagecolorallocate($i, 123, 74, 115);
			$c[238] = imagecolorallocate($i, 74, 49, 66);
			$c[239] = imagecolorallocate($i, 99, 41, 66);
			$c[240] = imagecolorallocate($i, 132, 107, 115);
			$c[241] = imagecolorallocate($i, 148, 115, 123);
			$c[242] = imagecolorallocate($i, 255, 115, 148);
			$c[243] = imagecolorallocate($i, 99, 57, 66);
			$c[244] = imagecolorallocate($i, 148, 107, 115);
			$c[245] = imagecolorallocate($i, 156, 57, 74);
			$c[246] = imagecolorallocate($i, 255, 140, 156);
			$c[247] = imagecolorallocate($i, 189, 107, 115);
			$c[248] = imagecolorallocate($i, 239, 99, 115);
			$c[249] = imagecolorallocate($i, 206, 41, 57);
			$c[250] = imagecolorallocate($i, 255, 57, 74);
			$c[251] = imagecolorallocate($i, 123, 24, 33);
			$c[252] = imagecolorallocate($i, 247, 115, 123);
			$c[253] = imagecolorallocate($i, 214, 57, 66);
			$c[254] = imagecolorallocate($i, 165, 33, 41);
			$c[255] = imagecolorallocate($i, 255, 255, 255);

			$pbanner = explode(",", $player->Banner);
			$w = 0;
			$h = 0;
			for ($j=0; $j < 96; $i++)
			{

				ImageSetPixel($i, $w, $h, $c[$pbanner[$j]]);

				if ($w == 11)
				{
					$w = 0;
					$h++;
				}
				else
					$w++;
			}

			header("Content-type: image/jpeg");
			imagejpeg($i, "./foo/$pid.jpg");
			imagedestroy($i);
		}

}

?>