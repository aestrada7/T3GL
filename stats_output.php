<?
include('common/util_stats.php');

class stats_gathering
{
	function printPlayerGame($db, $gid, $pid)
	{

		$query = "SELECT * FROM leagueseason4.gamestats WHERE Player_ID = '$pid' AND Game_ID = '$gid'";
		$game = $db->query($query);
		$s = $db->get_stats($game);

		?>

		<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'" WIDTH='100%'>
		<tr><td colspan=13 align='left'>
		</td></tr>
		<tr><td></td>					<td class=orange>Time</td>					<td class=orange>Kills</td>  		 <td class=orange>KOs</td>			<td class=orange>TKills</td>		<td class=orange>Deaths</td>			<td class=orange>DWR</td>			<td class=orange>Dmg Dealt</td>			<td class=orange>CB Dmg</td>			<td class=orange>TKill Dmg</td>			<td class=orange>BAcc</td>					<td class=orange>BLAcc</td>					<td class=orange>TAcc</td>				</tr>
		<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->time->wb)?> s</td>		<td><?=$s->kills->wb?></td>		<td><?=$s->ko->wb?></td>			<td><?=$s->tkills->wb?></td>		<td><?=$s->deaths->wb?></td>			<td><?=$s->repsd->wb?></td>			<td><?=$s->damage->wb?></td>		<td><?=$s->damageS->wb?></td>		<td><?=$s->damageT->wb?></td>		<td><?=$db->printPercent($s->bacc->wb)?></td>			<td><?=$db->printPercent($s->blacc->wb)?></td>		<td><?=$db->printPercent($s->tracc->wb)?></td>		</tr>
		<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->time->jv)?> s</td>		<td><?=$s->kills->jv?></td>		<td><?=$s->ko->jv?></td>			<td><?=$s->tkills->jv?></td>		<td><?=$s->deaths->jv?></td>			<td><?=$s->repsd->jv?></td>			<td><?=$s->damage->jv?></td>			<td><?=$s->damageS->jv?></td>		<td><?=$s->damageT->jv?></td>		<td><?=$db->printPercent($s->bacc->jv)?></td>			<td><?=$db->printPercent($s->blacc->jv)?></td>			<td><?=$db->printPercent($s->tracc->jv)?></td>		</tr>
		<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->time->sp)?> s</td>		<td><?=$s->kills->sp?></td>		<td><?=$s->ko->sp?></td>			<td><?=$s->tkills->sp?></td>		<td><?=$s->deaths->sp?></td>			<td><?=$s->repsd->sp?></td>			<td><?=$s->damage->sp?></td>		<td><?=$s->damageS->sp?></td>		<td><?=$s->damageT->sp?></td>		<td><?=$db->printPercent($s->bacc->sp)?></td>			<td><?=$db->printPercent($s->blacc->sp)?></td>			<td><?=$db->printPercent($s->tracc->sp)?></td>		</tr>
		<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->time->lv)?> s</td>		<td><?=$s->kills->lv?></td>		<td><?=$s->ko->lv?></td>			<td><?=$s->tkills->lv?></td>		<td><?=$s->deaths->lv?></td>			<td><?=$s->repsd->lv?></td>			<td><?=$s->damage->lv?></td>			<td><?=$s->damageS->lv?></td>		<td><?=$s->damageT->lv?></td>		<td><?=$db->printPercent($s->bacc->lv)?></td>			<td><?=$db->printPercent($s->blacc->lv)?></td>			<td><?=$db->printPercent($s->tracc->lv)?></td>		</tr>
		<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->time->tr)?> s</td>		<td><?=$s->kills->tr?></td>		<td><?=$s->ko->tr?></td>			<td><?=$s->tkills->tr?></td>		<td><?=$s->deaths->tr?></td>			<td><?=$s->repsd->tr?></td>			<td><?=$s->damage->tr?></td>			<td><?=$s->damageS->tr?></td>		<td><?=$s->damageT->tr?></td>		<td><?=$db->printPercent($s->bacc->tr)?></td>			<td><?=$db->printPercent($s->blacc->tr)?></td>			<td><?=$db->printPercent($s->tracc->tr)?></td>		</tr>
		<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->time->ws)?> s</td>		<td><?=$s->kills->ws?></td>		<td><?=$s->ko->ws?></td>			<td><?=$s->tkills->ws?></td>		<td><?=$s->deaths->ws?></td>			<td><?=$s->repsd->ws?></td>			<td><?=$s->damage->ws?></td>		<td><?=$s->damageS->ws?></td>		<td><?=$s->damageT->ws?></td>		<td><?=$db->printPercent($s->bacc->ws)?></td>			<td><?=$db->printPercent($s->blacc->ws)?></td>		<td><?=$db->printPercent($s->tracc->ws)?></td>		</tr>
		<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->time->lc)?> s</td>		<td><?=$s->kills->lc?></td>		<td><?=$s->ko->lc?></td>			<td><?=$s->tkills->lc?></td>		<td><?=$s->deaths->lc?></td>			<td><?=$s->repsd->lc?></td>			<td><?=$s->damage->lc?></td>			<td><?=$s->damageS->lc?></td>		<td><?=$s->damageT->lc?></td>		<td><?=$db->printPercent($s->bacc->lc)?></td>			<td><?=$db->printPercent($s->blacc->lc)?></td>			<td><?=$db->printPercent($s->tracc->lc)?></td>		</tr>
		<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->time->sr)?> s</td>		<td><?=$s->kills->sr?></td>		<td><?=$s->ko->sr?></td>			<td><?=$s->tkills->sr?></td>		<td><?=$s->deaths->sr?></td>			<td><?=$s->repsd->sr?></td>			<td><?=$s->damage->sr?></td>			<td><?=$s->damageS->sr?></td>		<td><?=$s->damageT->sr?></td>		<td><?=$db->printPercent($s->bacc->sr)?></td>			<td><?=$db->printPercent($s->blacc->sr)?></td>			<td><?=$db->printPercent($s->tracc->sr)?></td>		</tr>
		<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->time->sum)?> s</b></td>	<td><b><?=$s->kills->sum?></b></td>	<td><b><?=$s->ko->sum?></b></td>		<td><b><?=$s->tkills->sum?></b></td>	<td><b><?=$s->deaths->sum?></b></td>	<td><b><?=$s->repsd->sum?></b></td>		<td><b><?=$s->damage->sum?></b></td>	<td><b><?=$s->damageS->sum?></b></td>	<td><b><?=$s->damageT->sum?></b></td>	<td><b><?=$db->printPercent($s->bacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->blacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->tracc->sum)?></b></td></tr>
		</TABLE>
		<br><br>
		<?
	}

	function printPlayer($db, $pid, $method)
	{
		$query = "SELECT * FROM leagueseason4.playerstats WHERE Player_ID = '$pid'";
		$game = $db->query($query);
		$s = $db->get_stats($game);

		$query = "SELECT leaguecommon.players.*, leaguecommon.squads.* FROM leaguecommon.players
			   INNER JOIN leaguecommon.squads ON players.Squad_ID = squads.Squad_ID
			   WHERE players.Player_ID = '$pid'";
		$player = mysql_fetch_object($db->query($query));

		?>

		<TABLE BORDER='0' WIDTH='40%'>
		<tr><td align='center' width='50%'><font size=4><? if ($player->NewBanner != 0) print "<img src='http://mecbot.t3g.org/leaguebanners/$pid.png' width=18 height=12>"; ?>
		<b><?=$player->PlayerName?></b></font></center></td><td align='center'><b><a href="http://league.t3g.org/stats/php/listsquad.php?sid=<?=$player->Squad_ID?>"><font size=4><?=$player->SquadName?></font></a></b></center></td></tr>
		</TABLE>
		<br>

		Rating: <?=$db->playerRating($pid)?>  |  Games played: <?=$s->gp?><br>

		<br><br>

		<?
		$url = "<a href='http://league.t3g.org/stats/php/listplayer.php?pid=$pid&m";

		if ($method == "tot")
		{
			?>
			<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'" WIDTH='80%'>
			<tr><td colspan=13 align='left'>
			<?
			print "<font color='#FFFF00'><b>Total</b></font></a>  |  $url=gp'>Per-game</a>  |  $url=all'>All</a>";
			print "<br><br>\n";
			?></td></tr>
			<tr><td></td>					<td class=orange>Time</td>					<td class=orange>Kills</td>  		 <td class=orange>KOs</td>			<td class=orange>TKills</td>		<td class=orange>Deaths</td>			<td class=orange>DWR</td>			<td class=orange>Dmg Dealt</td>			<td class=orange>CB Dmg</td>			<td class=orange>TKill Dmg</td>			<td class=orange>BAcc</td>					<td class=orange>BLAcc</td>					<td class=orange>TAcc</td>				</tr>
			<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->time->wb)?> s</td>		<td><?=$s->kills->wb?></td>		<td><?=$s->ko->wb?></td>			<td><?=$s->tkills->wb?></td>		<td><?=$s->deaths->wb?></td>			<td><?=$s->repsd->wb?></td>			<td><?=$s->damage->wb?></td>		<td><?=$s->damageS->wb?></td>		<td><?=$s->damageT->wb?></td>		<td><?=$db->printPercent($s->bacc->wb)?></td>			<td><?=$db->printPercent($s->blacc->wb)?></td>		<td><?=$db->printPercent($s->tracc->wb)?></td>		</tr>
			<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->time->jv)?> s</td>		<td><?=$s->kills->jv?></td>		<td><?=$s->ko->jv?></td>			<td><?=$s->tkills->jv?></td>		<td><?=$s->deaths->jv?></td>			<td><?=$s->repsd->jv?></td>			<td><?=$s->damage->jv?></td>			<td><?=$s->damageS->jv?></td>		<td><?=$s->damageT->jv?></td>		<td><?=$db->printPercent($s->bacc->jv)?></td>			<td><?=$db->printPercent($s->blacc->jv)?></td>			<td><?=$db->printPercent($s->tracc->jv)?></td>		</tr>
			<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->time->sp)?> s</td>		<td><?=$s->kills->sp?></td>		<td><?=$s->ko->sp?></td>			<td><?=$s->tkills->sp?></td>		<td><?=$s->deaths->sp?></td>			<td><?=$s->repsd->sp?></td>			<td><?=$s->damage->sp?></td>		<td><?=$s->damageS->sp?></td>		<td><?=$s->damageT->sp?></td>		<td><?=$db->printPercent($s->bacc->sp)?></td>			<td><?=$db->printPercent($s->blacc->sp)?></td>			<td><?=$db->printPercent($s->tracc->sp)?></td>		</tr>
			<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->time->lv)?> s</td>		<td><?=$s->kills->lv?></td>		<td><?=$s->ko->lv?></td>			<td><?=$s->tkills->lv?></td>		<td><?=$s->deaths->lv?></td>			<td><?=$s->repsd->lv?></td>			<td><?=$s->damage->lv?></td>			<td><?=$s->damageS->lv?></td>		<td><?=$s->damageT->lv?></td>		<td><?=$db->printPercent($s->bacc->lv)?></td>			<td><?=$db->printPercent($s->blacc->lv)?></td>			<td><?=$db->printPercent($s->tracc->lv)?></td>		</tr>
			<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->time->tr)?> s</td>		<td><?=$s->kills->tr?></td>		<td><?=$s->ko->tr?></td>			<td><?=$s->tkills->tr?></td>		<td><?=$s->deaths->tr?></td>			<td><?=$s->repsd->tr?></td>			<td><?=$s->damage->tr?></td>			<td><?=$s->damageS->tr?></td>		<td><?=$s->damageT->tr?></td>		<td><?=$db->printPercent($s->bacc->tr)?></td>			<td><?=$db->printPercent($s->blacc->tr)?></td>			<td><?=$db->printPercent($s->tracc->tr)?></td>		</tr>
			<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->time->ws)?> s</td>		<td><?=$s->kills->ws?></td>		<td><?=$s->ko->ws?></td>			<td><?=$s->tkills->ws?></td>		<td><?=$s->deaths->ws?></td>			<td><?=$s->repsd->ws?></td>			<td><?=$s->damage->ws?></td>		<td><?=$s->damageS->ws?></td>		<td><?=$s->damageT->ws?></td>		<td><?=$db->printPercent($s->bacc->ws)?></td>			<td><?=$db->printPercent($s->blacc->ws)?></td>		<td><?=$db->printPercent($s->tracc->ws)?></td>		</tr>
			<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->time->lc)?> s</td>		<td><?=$s->kills->lc?></td>		<td><?=$s->ko->lc?></td>			<td><?=$s->tkills->lc?></td>		<td><?=$s->deaths->lc?></td>			<td><?=$s->repsd->lc?></td>			<td><?=$s->damage->lc?></td>			<td><?=$s->damageS->lc?></td>		<td><?=$s->damageT->lc?></td>		<td><?=$db->printPercent($s->bacc->lc)?></td>			<td><?=$db->printPercent($s->blacc->lc)?></td>			<td><?=$db->printPercent($s->tracc->lc)?></td>		</tr>
			<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->time->sr)?> s</td>		<td><?=$s->kills->sr?></td>		<td><?=$s->ko->sr?></td>			<td><?=$s->tkills->sr?></td>		<td><?=$s->deaths->sr?></td>			<td><?=$s->repsd->sr?></td>			<td><?=$s->damage->sr?></td>			<td><?=$s->damageS->sr?></td>		<td><?=$s->damageT->sr?></td>		<td><?=$db->printPercent($s->bacc->sr)?></td>			<td><?=$db->printPercent($s->blacc->sr)?></td>			<td><?=$db->printPercent($s->tracc->sr)?></td>		</tr>
			<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->time->sum)?> s</b></td>	<td><b><?=$s->kills->sum?></b></td>	<td><b><?=$s->ko->sum?></b></td>		<td><b><?=$s->tkills->sum?></b></td>	<td><b><?=$s->deaths->sum?></b></td>	<td><b><?=$s->repsd->sum?></b></td>		<td><b><?=$s->damage->sum?></b></td>	<td><b><?=$s->damageS->sum?></b></td>	<td><b><?=$s->damageT->sum?></b></td>	<td><b><?=$db->printPercent($s->bacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->blacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->tracc->sum)?></b></td></tr>
			</TABLE>
			<?
		}
		else if ($method == "gp" || $method == "")
		{
			?>
			<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'" WIDTH='80%'>
			<tr><td colspan=13 align='left'>
			<?
			print "$url=tot'>Total</a>  |  <font color='#FFFF00'><b>Per-game</b></font></a>  |  $url=all'>All</a>";
			print "<br><br>\n";
			?></td></tr>
			<tr><td></td>					<td class=orange>Time/G</td>						<td class=orange>Kills/G</td>			<td class=orange>KOs/G</td>			<td class=orange>TKills/G</td>				<td class=orange>Deaths/G</td>		<td class=orange>DWR/G</td>			<td class=orange>Dmg Dealt/G</td>				<td class=orange>CB Dmg/G</td>			<td class=orange>TKill Dmg/G</td>					</tr>
			<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->dg($s->time->wb, 0))?></td>  		<td><?=$s->dg($s->kills->wb, 1)?></td>		<td><?=$s->dg($s->ko->wb, 1)?></td>		<td><?=$s->dg($s->tkills->wb, 1)?></td>			<td><?=$s->dg($s->deaths->wb, 1)?></td>	<td><?=$s->dg($s->repsd->wb, 1)?></td>	<td><?=$s->dg($s->damage->wb, 0)?></td>			<td><?=$s->dg($s->damageS->wb, 0)?>			<td><?=$s->dg($s->damageT->wb, 0)?></td>	</tr>
			<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->dg($s->time->jv, 0))?></td>  		<td><?=$s->dg($s->kills->jv, 1)?></td>		<td><?=$s->dg($s->ko->jv, 1)?></td>		<td><?=$s->dg($s->tkills->jv, 1)?></td>			<td><?=$s->dg($s->deaths->jv, 1)?></td>		<td><?=$s->dg($s->repsd->jv, 1)?></td>		<td><?=$s->dg($s->damage->jv, 0)?></td>			<td><?=$s->dg($s->damageS->jv, 0)?>			<td><?=$s->dg($s->damageT->jv, 0)?></td>		</tr>
			<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->dg($s->time->sp, 0))?></td>  		<td><?=$s->dg($s->kills->sp, 1)?></td>		<td><?=$s->dg($s->ko->sp, 1)?></td>		<td><?=$s->dg($s->tkills->sp, 1)?></td>			<td><?=$s->dg($s->deaths->sp, 1)?></td>	<td><?=$s->dg($s->repsd->sp, 1)?></td>		<td><?=$s->dg($s->damage->sp, 0)?></td>			<td><?=$s->dg($s->damageS->sp, 0)?>			<td><?=$s->dg($s->damageT->sp, 0)?></td>		</tr>
			<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->dg($s->time->lv, 0))?></td>  		<td><?=$s->dg($s->kills->lv, 1)?></td>		<td><?=$s->dg($s->ko->lv, 1)?></td>		<td><?=$s->dg($s->tkills->lv, 1)?></td>			<td><?=$s->dg($s->deaths->lv, 1)?></td>		<td><?=$s->dg($s->repsd->lv, 1)?></td>		<td><?=$s->dg($s->damage->lv, 0)?></td>			<td><?=$s->dg($s->damageS->lv, 0)?>			<td><?=$s->dg($s->damageT->lv, 0)?></td>		</tr>
			<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->dg($s->time->tr, 0))?></td> 	 	<td><?=$s->dg($s->kills->tr, 1)?></td>		<td><?=$s->dg($s->ko->tr, 1)?></td>		<td><?=$s->dg($s->tkills->tr, 1)?></td>			<td><?=$s->dg($s->deaths->tr, 1)?></td>		<td><?=$s->dg($s->repsd->tr, 1)?></td>		<td><?=$s->dg($s->damage->tr, 0)?></td>			<td><?=$s->dg($s->damageS->tr, 0)?>			<td><?=$s->dg($s->damageT->tr, 0)?></td>		</tr>
			<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->dg($s->time->ws, 0))?></td>  		<td><?=$s->dg($s->kills->ws, 1)?></td>		<td><?=$s->dg($s->ko->ws, 1)?></td>		<td><?=$s->dg($s->tkills->ws, 1)?></td>			<td><?=$s->dg($s->deaths->ws, 1)?></td>	<td><?=$s->dg($s->repsd->ws, 1)?></td>		<td><?=$s->dg($s->damage->ws, 0)?></td>			<td><?=$s->dg($s->damageS->ws, 0)?>			<td><?=$s->dg($s->damageT->ws, 0)?></td>	</tr>
			<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->dg($s->time->lc, 0))?></td>  		<td><?=$s->dg($s->kills->lc, 1)?></td>		<td><?=$s->dg($s->ko->lc, 1)?></td>		<td><?=$s->dg($s->tkills->lc, 1)?></td>			<td><?=$s->dg($s->deaths->lc, 1)?></td>		<td><?=$s->dg($s->repsd->lc, 1)?></td>		<td><?=$s->dg($s->damage->lc, 0)?></td>			<td><?=$s->dg($s->damageS->lc, 0)?>			<td><?=$s->dg($s->damageT->lc, 0)?></td>		</tr>
			<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->dg($s->time->sr, 0))?></td>  		<td><?=$s->dg($s->kills->sr, 1)?></td>		<td><?=$s->dg($s->ko->sr, 1)?></td>		<td><?=$s->dg($s->tkills->sr, 1)?></td>			<td><?=$s->dg($s->deaths->sr, 1)?></td>	<td><?=$s->dg($s->repsd->sr, 1)?></td>		<td><?=$s->dg($s->damage->sr, 0)?></td>			<td><?=$s->dg($s->damageS->sr, 0)?>			<td><?=$s->dg($s->damageT->sr, 0)?></td>		</tr>

			<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->dg($s->time->sum, 0))?></b></td>  	<td><b><?=$s->dg($s->kills->sum, 1)?></b></td>	<td><b><?=$s->dg($s->ko->sum, 1)?></b></td>	<td><b><?=$s->dg($s->tkills->sum, 1)?></b></td>		<td><b><?=$s->dg($s->deaths->sum, 1)?></b></td>	<td><b><?=$s->dg($s->repsd->sum, 1)?></b></td>	<td><b><?=$s->dg($s->damage->sum, 2)?></b></td>	<td><b><?=$s->dg($s->damageS->sum, 0)?>		<td><b><?=$s->dg($s->damageT->sum, 0)?></b></td></tr>

			</TABLE>
			<?
		}
		else if ($method == "all")
		{
			?>
			<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'">
			<tr><td colspan=13 align='left'>
			<?
			print "$url=tot'>Total</a>  |  $url=gp'>Per-game</a>  |  <font color='#FFFF00'><b>All</b></font></a>";
			print "<br><br>\n";
			?></td></tr>
			<tr><td></td>					<td class=orange>TP</td>					<td class=orange>TP/G</td>								<td class=orange>K</td>  	 	<td class=orange>K/G</td>					<td class=orange>KOs</td>			<td class=orange>KOs/G</td>					<td class=orange>TK</td>		<td class=orange>TK/G</td>						<td class=orange>D</td>			<td class=orange>D/G</td>					<td class=orange>DWR</td>			<td class=orange>DWR/G</td>					<td class=orange>DD</td>			<td class=orange>DD/G</td>						<td class=orange>DDS</td>			<td class=orange>DDS/G</td>						<td class=orange>DDT</td>			<td class=orange>DDT/G</td>						<td class=orange>BAcc</td>					<td class=orange>BLAcc</td>					<td class=orange>TAcc</td>				</tr>
			<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->time->wb)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->wb, 0))?></td>  		<td><?=$s->kills->wb?></td>		<td class=lgray><?=$s->dg($s->kills->wb, 1)?></td>		<td><?=$s->ko->wb?></td>			<td class=lgray><?=$s->dg($s->ko->wb, 1)?></td>		<td><?=$s->tkills->wb?></td>		<td class=lgray><?=$s->dg($s->tkills->wb, 1)?></td>			<td><?=$s->deaths->wb?></td>			<td class=lgray><?=$s->dg($s->deaths->wb, 0)?></td>		<td><?=$s->repsd->wb?></td>			<td class=lgray><?=$s->dg($s->repsd->wb, 1)?></td>		<td><?=$s->damage->wb?></td>		<td class=lgray><?=$s->dg($s->damage->wb, 0)?></td>			<td><?=$s->damageS->wb?></td>		<td class=lgray><?=$s->dg($s->damageS->wb, 0)?>			<td><?=$s->damageT->wb?></td>		<td class=lgray><?=$s->dg($s->damageT->wb, 0)?></td>		<td><?=$db->printPercent($s->bacc->wb)?></td>			<td><?=$db->printPercent($s->blacc->wb)?></td>		<td><?=$db->printPercent($s->tracc->wb)?></td>		</tr>
			<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->time->jv)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->jv, 0))?></td>  		<td><?=$s->kills->jv?></td>		<td class=lgray><?=$s->dg($s->kills->jv, 1)?></td>		<td><?=$s->ko->jv?></td>			<td class=lgray><?=$s->dg($s->ko->jv, 1)?></td>			<td><?=$s->tkills->jv?></td>		<td class=lgray><?=$s->dg($s->tkills->jv, 1)?></td>			<td><?=$s->deaths->jv?></td>			<td class=lgray><?=$s->dg($s->deaths->jv, 0)?></td>		<td><?=$s->repsd->jv?></td>			<td class=lgray><?=$s->dg($s->repsd->jv, 1)?></td>		<td><?=$s->damage->jv?></td>			<td class=lgray><?=$s->dg($s->damage->jv, 0)?></td>			<td><?=$s->damageS->jv?></td>		<td class=lgray><?=$s->dg($s->damageS->jv, 0)?>			<td><?=$s->damageT->jv?></td>		<td class=lgray><?=$s->dg($s->damageT->jv, 0)?></td>			<td><?=$db->printPercent($s->bacc->jv)?></td>			<td><?=$db->printPercent($s->blacc->jv)?></td>			<td><?=$db->printPercent($s->tracc->jv)?></td>		</tr>
			<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->time->sp)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->sp, 0))?></td>  		<td><?=$s->kills->sp?></td>		<td class=lgray><?=$s->dg($s->kills->sp, 1)?></td>		<td><?=$s->ko->sp?></td>			<td class=lgray><?=$s->dg($s->ko->sp, 1)?></td>		<td><?=$s->tkills->sp?></td>		<td class=lgray><?=$s->dg($s->tkills->sp, 1)?></td>			<td><?=$s->deaths->sp?></td>			<td class=lgray><?=$s->dg($s->deaths->sp, 0)?></td>		<td><?=$s->repsd->sp?></td>			<td class=lgray><?=$s->dg($s->repsd->sp, 1)?></td>		<td><?=$s->damage->sp?></td>		<td class=lgray><?=$s->dg($s->damage->sp, 0)?></td>			<td><?=$s->damageS->sp?></td>		<td class=lgray><?=$s->dg($s->damageS->sp, 0)?>			<td><?=$s->damageT->sp?></td>		<td class=lgray><?=$s->dg($s->damageT->sp, 0)?></td>			<td><?=$db->printPercent($s->bacc->sp)?></td>			<td><?=$db->printPercent($s->blacc->sp)?></td>			<td><?=$db->printPercent($s->tracc->sp)?></td>		</tr>
			<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->time->lv)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->lv, 0))?></td>  		<td><?=$s->kills->lv?></td>		<td class=lgray><?=$s->dg($s->kills->lv, 1)?></td>		<td><?=$s->ko->lv?></td>			<td class=lgray><?=$s->dg($s->ko->lv, 1)?></td>			<td><?=$s->tkills->lv?></td>		<td class=lgray><?=$s->dg($s->tkills->lv, 1)?></td>			<td><?=$s->deaths->lv?></td>			<td class=lgray><?=$s->dg($s->deaths->lv, 0)?></td>		<td><?=$s->repsd->lv?></td>			<td class=lgray><?=$s->dg($s->repsd->lv, 1)?></td>		<td><?=$s->damage->lv?></td>			<td class=lgray><?=$s->dg($s->damage->lv, 0)?></td>			<td><?=$s->damageS->lv?></td>		<td class=lgray><?=$s->dg($s->damageS->lv, 0)?>			<td><?=$s->damageT->lv?></td>		<td class=lgray><?=$s->dg($s->damageT->lv, 0)?></td>			<td><?=$db->printPercent($s->bacc->lv)?></td>			<td><?=$db->printPercent($s->blacc->lv)?></td>			<td><?=$db->printPercent($s->tracc->lv)?></td>		</tr>
			<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->time->tr)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->tr, 0))?></td> 	 		<td><?=$s->kills->tr?></td>		<td class=lgray><?=$s->dg($s->kills->tr, 1)?></td>		<td><?=$s->ko->tr?></td>			<td class=lgray><?=$s->dg($s->ko->tr, 1)?></td>			<td><?=$s->tkills->tr?></td>		<td class=lgray><?=$s->dg($s->tkills->tr, 1)?></td>			<td><?=$s->deaths->tr?></td>			<td class=lgray><?=$s->dg($s->deaths->tr, 0)?></td>		<td><?=$s->repsd->tr?></td>			<td class=lgray><?=$s->dg($s->repsd->tr, 1)?></td>		<td><?=$s->damage->tr?></td>			<td class=lgray><?=$s->dg($s->damage->tr, 0)?></td>			<td><?=$s->damageS->tr?></td>		<td class=lgray><?=$s->dg($s->damageS->tr, 0)?>			<td><?=$s->damageT->tr?></td>		<td class=lgray><?=$s->dg($s->damageT->tr, 0)?></td>			<td><?=$db->printPercent($s->bacc->tr)?></td>			<td><?=$db->printPercent($s->blacc->tr)?></td>			<td><?=$db->printPercent($s->tracc->tr)?></td>		</tr>
			<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->time->ws)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->ws, 0))?></td>  		<td><?=$s->kills->ws?></td>		<td class=lgray><?=$s->dg($s->kills->ws, 1)?></td>		<td><?=$s->ko->ws?></td>			<td class=lgray><?=$s->dg($s->ko->ws, 1)?></td>		<td><?=$s->tkills->ws?></td>		<td class=lgray><?=$s->dg($s->tkills->ws, 1)?></td>			<td><?=$s->deaths->ws?></td>			<td class=lgray><?=$s->dg($s->deaths->ws, 0)?></td>		<td><?=$s->repsd->ws?></td>			<td class=lgray><?=$s->dg($s->repsd->ws, 1)?></td>		<td><?=$s->damage->ws?></td>		<td class=lgray><?=$s->dg($s->damage->ws, 0)?></td>			<td><?=$s->damageS->ws?></td>		<td class=lgray><?=$s->dg($s->damageS->ws, 0)?>			<td><?=$s->damageT->ws?></td>		<td class=lgray><?=$s->dg($s->damageT->ws, 0)?></td>		<td><?=$db->printPercent($s->bacc->ws)?></td>			<td><?=$db->printPercent($s->blacc->ws)?></td>		<td><?=$db->printPercent($s->tracc->ws)?></td>		</tr>
			<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->time->lc)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->lc, 0))?></td>  		<td><?=$s->kills->lc?></td>		<td class=lgray><?=$s->dg($s->kills->lc, 1)?></td>		<td><?=$s->ko->lc?></td>			<td class=lgray><?=$s->dg($s->ko->lc, 1)?></td>			<td><?=$s->tkills->lc?></td>		<td class=lgray><?=$s->dg($s->tkills->lc, 1)?></td>			<td><?=$s->deaths->lc?></td>			<td class=lgray><?=$s->dg($s->deaths->lc, 0)?></td>		<td><?=$s->repsd->lc?></td>			<td class=lgray><?=$s->dg($s->repsd->lc, 1)?></td>		<td><?=$s->damage->lc?></td>			<td class=lgray><?=$s->dg($s->damage->lc, 0)?></td>			<td><?=$s->damageS->lc?></td>		<td class=lgray><?=$s->dg($s->damageS->lc, 0)?>			<td><?=$s->damageT->lc?></td>		<td class=lgray><?=$s->dg($s->damageT->lc, 0)?></td>			<td><?=$db->printPercent($s->bacc->lc)?></td>			<td><?=$db->printPercent($s->blacc->lc)?></td>			<td><?=$db->printPercent($s->tracc->lc)?></td>		</tr>
			<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->time->sr)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->sr, 0))?></td>  		<td><?=$s->kills->sr?></td>		<td class=lgray><?=$s->dg($s->kills->sr, 1)?></td>		<td><?=$s->ko->sr?></td>			<td class=lgray><?=$s->dg($s->ko->sr, 1)?></td>			<td><?=$s->tkills->sr?></td>		<td class=lgray><?=$s->dg($s->tkills->sr, 1)?></td>			<td><?=$s->deaths->sr?></td>			<td class=lgray><?=$s->dg($s->deaths->sr, 0)?></td>		<td><?=$s->repsd->sr?></td>			<td class=lgray><?=$s->dg($s->repsd->sr, 1)?></td>		<td><?=$s->damage->sr?></td>			<td class=lgray><?=$s->dg($s->damage->sr, 0)?></td>			<td><?=$s->damageS->sr?></td>		<td class=lgray><?=$s->dg($s->damageS->sr, 0)?>			<td><?=$s->damageT->sr?></td>		<td class=lgray><?=$s->dg($s->damageT->sr, 0)?></td>			<td><?=$db->printPercent($s->bacc->sr)?></td>			<td><?=$db->printPercent($s->blacc->sr)?></td>			<td><?=$db->printPercent($s->tracc->sr)?></td>		</tr>

			<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->time->sum)?> s</b></td>	<td class=lgray><b><?=$db->parseSeconds($s->dg($s->time->sum, 0))?></b></td>  	<td><b><?=$s->kills->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->kills->sum, 1)?></b></td>	<td><b><?=$s->ko->sum?></b></td>		<td class=lgray><b><?=$s->dg($s->ko->sum, 1)?></b></td>	<td><b><?=$s->tkills->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->tkills->sum, 1)?></b></td>		<td><b><?=$s->deaths->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->deaths->sum, 2)?></b></td>	<td><b><?=$s->repsd->sum?></b></td>		<td class=lgray><b><?=$s->dg($s->repsd->sum, 1)?></b></td>	<td><b><?=$s->damage->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->damage->sum, 0)?></b></td>	<td><b><?=$s->damageS->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->damageS->sum, 0)?>		<td><b><?=$s->damageT->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->damageT->sum, 0)?></b></td>	<td><?=$db->printPercent($s->bacc->sum)?></td>		<td><?=$db->printPercent($s->blacc->sum)?></td>		<td><?=$db->printPercent($s->tracc->sum)?></td>	</tr>

			</TABLE>
			<?
		}
		?>
		<br><br>

		<TABLE BORDER='0' CELLSPACING='10'>
		<tr><td class=orange>Low ping</td><td class=orange>High ping</td><td class=orange>Average ping</td></td><td class=orange>S2C P.L.</td><td class=orange>S2CW P.L.</td><td class=orange>C2S P.L.</td></tr>
		<tr><td><?=$s->pinglow?> ms</td><td><?=$s->pinghigh?> ms</td><td><?=$s->pingave?> ms</td><td><?=$s->packetlossS2C?>%</td><td><?=$s->packetlossS2CW?>%</td><td><?=$s->packetlossC2S?>%</td></tr>
		</TABLE>
		<br><br>
		<?
	}

	function printGame_sqd($db, $sid, $gid)
	{
		$game = $db->getGame_Entire($sid, $gid, -1);
		$s = $db->get_stats($game);

		?>
		<br>
		<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'" WIDTH='80%'>
		<tr><td colspan=13 align='left'>
		</td></tr>
		<tr><td></td>					<td class=orange>Time</td>					<td class=orange>Kills</td>  		 <td class=orange>KOs</td>			<td class=orange>TKills</td>		<td class=orange>Deaths</td>			<td class=orange>DWR</td>			<td class=orange>Dmg Dealt</td>			<td class=orange>CB Dmg</td>			<td class=orange>TKill Dmg</td>			<td class=orange>BAcc</td>					<td class=orange>BLAcc</td>					<td class=orange>TAcc</td>				</tr>
		<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->time->wb)?> s</td>		<td><?=$s->kills->wb?></td>		<td><?=$s->ko->wb?></td>			<td><?=$s->tkills->wb?></td>		<td><?=$s->deaths->wb?></td>			<td><?=$s->repsd->wb?></td>			<td><?=$s->damage->wb?></td>		<td><?=$s->damageS->wb?></td>		<td><?=$s->damageT->wb?></td>		<td><?=$db->printPercent($s->bacc->wb)?></td>			<td><?=$db->printPercent($s->blacc->wb)?></td>		<td><?=$db->printPercent($s->tracc->wb)?></td>		</tr>
		<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->time->jv)?> s</td>		<td><?=$s->kills->jv?></td>		<td><?=$s->ko->jv?></td>			<td><?=$s->tkills->jv?></td>		<td><?=$s->deaths->jv?></td>			<td><?=$s->repsd->jv?></td>			<td><?=$s->damage->jv?></td>			<td><?=$s->damageS->jv?></td>		<td><?=$s->damageT->jv?></td>		<td><?=$db->printPercent($s->bacc->jv)?></td>			<td><?=$db->printPercent($s->blacc->jv)?></td>			<td><?=$db->printPercent($s->tracc->jv)?></td>		</tr>
		<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->time->sp)?> s</td>		<td><?=$s->kills->sp?></td>		<td><?=$s->ko->sp?></td>			<td><?=$s->tkills->sp?></td>		<td><?=$s->deaths->sp?></td>			<td><?=$s->repsd->sp?></td>			<td><?=$s->damage->sp?></td>		<td><?=$s->damageS->sp?></td>		<td><?=$s->damageT->sp?></td>		<td><?=$db->printPercent($s->bacc->sp)?></td>			<td><?=$db->printPercent($s->blacc->sp)?></td>			<td><?=$db->printPercent($s->tracc->sp)?></td>		</tr>
		<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->time->lv)?> s</td>		<td><?=$s->kills->lv?></td>		<td><?=$s->ko->lv?></td>			<td><?=$s->tkills->lv?></td>		<td><?=$s->deaths->lv?></td>			<td><?=$s->repsd->lv?></td>			<td><?=$s->damage->lv?></td>			<td><?=$s->damageS->lv?></td>		<td><?=$s->damageT->lv?></td>		<td><?=$db->printPercent($s->bacc->lv)?></td>			<td><?=$db->printPercent($s->blacc->lv)?></td>			<td><?=$db->printPercent($s->tracc->lv)?></td>		</tr>
		<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->time->tr)?> s</td>		<td><?=$s->kills->tr?></td>		<td><?=$s->ko->tr?></td>			<td><?=$s->tkills->tr?></td>		<td><?=$s->deaths->tr?></td>			<td><?=$s->repsd->tr?></td>			<td><?=$s->damage->tr?></td>			<td><?=$s->damageS->tr?></td>		<td><?=$s->damageT->tr?></td>		<td><?=$db->printPercent($s->bacc->tr)?></td>			<td><?=$db->printPercent($s->blacc->tr)?></td>			<td><?=$db->printPercent($s->tracc->tr)?></td>		</tr>
		<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->time->ws)?> s</td>		<td><?=$s->kills->ws?></td>		<td><?=$s->ko->ws?></td>			<td><?=$s->tkills->ws?></td>		<td><?=$s->deaths->ws?></td>			<td><?=$s->repsd->ws?></td>			<td><?=$s->damage->ws?></td>		<td><?=$s->damageS->ws?></td>		<td><?=$s->damageT->ws?></td>		<td><?=$db->printPercent($s->bacc->ws)?></td>			<td><?=$db->printPercent($s->blacc->ws)?></td>		<td><?=$db->printPercent($s->tracc->ws)?></td>		</tr>
		<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->time->lc)?> s</td>		<td><?=$s->kills->lc?></td>		<td><?=$s->ko->lc?></td>			<td><?=$s->tkills->lc?></td>		<td><?=$s->deaths->lc?></td>			<td><?=$s->repsd->lc?></td>			<td><?=$s->damage->lc?></td>			<td><?=$s->damageS->lc?></td>		<td><?=$s->damageT->lc?></td>		<td><?=$db->printPercent($s->bacc->lc)?></td>			<td><?=$db->printPercent($s->blacc->lc)?></td>			<td><?=$db->printPercent($s->tracc->lc)?></td>		</tr>
		<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->time->sr)?> s</td>		<td><?=$s->kills->sr?></td>		<td><?=$s->ko->sr?></td>			<td><?=$s->tkills->sr?></td>		<td><?=$s->deaths->sr?></td>			<td><?=$s->repsd->sr?></td>			<td><?=$s->damage->sr?></td>			<td><?=$s->damageS->sr?></td>		<td><?=$s->damageT->sr?></td>		<td><?=$db->printPercent($s->bacc->sr)?></td>			<td><?=$db->printPercent($s->blacc->sr)?></td>			<td><?=$db->printPercent($s->tracc->sr)?></td>		</tr>
		<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->time->sum)?> s</b></td>	<td><b><?=$s->kills->sum?></b></td>	<td><b><?=$s->ko->sum?></b></td>		<td><b><?=$s->tkills->sum?></b></td>	<td><b><?=$s->deaths->sum?></b></td>	<td><b><?=$s->repsd->sum?></b></td>		<td><b><?=$s->damage->sum?></b></td>	<td><b><?=$s->damageS->sum?></b></td>	<td><b><?=$s->damageT->sum?></b></td>	<td><b><?=$db->printPercent($s->bacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->blacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->tracc->sum)?></b></td></tr>
		</TABLE>
		<br><br>

		<?
	}

	function printSquad($db, $sid, $method)
	{
		$game = $db->getGame_Entire($sid, -1, -1);
		$s = $db->get_stats($game);

		$list = $db->getSquad($sid);
		$squad = mysql_fetch_object($list);

		?>
		<br>
		<center><font size=4><b><?=$squad->SquadName?></b></font></center>
		<br><br>

		Statistic sum / averages
		<?
		$url = "<a href='http://league.t3g.org/stats/php/listsquad.php?sid=$sid&m";

		if ($method == "tot")
		{
			?>
			<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'" WIDTH='80%'>
			<tr><td colspan=13 align='left'>
			<?
			print "<font color='#FFFF00'><b>Total</b></font></a>  |  $url=gp'>Per-game</a>  |  $url=all'>All</a>";
			print "<br><br>\n";
			?></td></tr>
			<tr><td></td>					<td class=orange>Time</td>					<td class=orange>Kills</td>  		 <td class=orange>KOs</td>			<td class=orange>TKills</td>		<td class=orange>Deaths</td>			<td class=orange>DWR</td>			<td class=orange>Dmg Dealt</td>			<td class=orange>CB Dmg</td>			<td class=orange>TKill Dmg</td>			<td class=orange>BAcc</td>					<td class=orange>BLAcc</td>					<td class=orange>TAcc</td>				</tr>
			<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->time->wb)?> s</td>		<td><?=$s->kills->wb?></td>		<td><?=$s->ko->wb?></td>			<td><?=$s->tkills->wb?></td>		<td><?=$s->deaths->wb?></td>			<td><?=$s->repsd->wb?></td>			<td><?=$s->damage->wb?></td>		<td><?=$s->damageS->wb?></td>		<td><?=$s->damageT->wb?></td>		<td><?=$db->printPercent($s->bacc->wb)?></td>			<td><?=$db->printPercent($s->blacc->wb)?></td>		<td><?=$db->printPercent($s->tracc->wb)?></td>		</tr>
			<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->time->jv)?> s</td>		<td><?=$s->kills->jv?></td>		<td><?=$s->ko->jv?></td>			<td><?=$s->tkills->jv?></td>		<td><?=$s->deaths->jv?></td>			<td><?=$s->repsd->jv?></td>			<td><?=$s->damage->jv?></td>			<td><?=$s->damageS->jv?></td>		<td><?=$s->damageT->jv?></td>		<td><?=$db->printPercent($s->bacc->jv)?></td>			<td><?=$db->printPercent($s->blacc->jv)?></td>			<td><?=$db->printPercent($s->tracc->jv)?></td>		</tr>
			<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->time->sp)?> s</td>		<td><?=$s->kills->sp?></td>		<td><?=$s->ko->sp?></td>			<td><?=$s->tkills->sp?></td>		<td><?=$s->deaths->sp?></td>			<td><?=$s->repsd->sp?></td>			<td><?=$s->damage->sp?></td>		<td><?=$s->damageS->sp?></td>		<td><?=$s->damageT->sp?></td>		<td><?=$db->printPercent($s->bacc->sp)?></td>			<td><?=$db->printPercent($s->blacc->sp)?></td>			<td><?=$db->printPercent($s->tracc->sp)?></td>		</tr>
			<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->time->lv)?> s</td>		<td><?=$s->kills->lv?></td>		<td><?=$s->ko->lv?></td>			<td><?=$s->tkills->lv?></td>		<td><?=$s->deaths->lv?></td>			<td><?=$s->repsd->lv?></td>			<td><?=$s->damage->lv?></td>			<td><?=$s->damageS->lv?></td>		<td><?=$s->damageT->lv?></td>		<td><?=$db->printPercent($s->bacc->lv)?></td>			<td><?=$db->printPercent($s->blacc->lv)?></td>			<td><?=$db->printPercent($s->tracc->lv)?></td>		</tr>
			<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->time->tr)?> s</td>		<td><?=$s->kills->tr?></td>		<td><?=$s->ko->tr?></td>			<td><?=$s->tkills->tr?></td>		<td><?=$s->deaths->tr?></td>			<td><?=$s->repsd->tr?></td>			<td><?=$s->damage->tr?></td>			<td><?=$s->damageS->tr?></td>		<td><?=$s->damageT->tr?></td>		<td><?=$db->printPercent($s->bacc->tr)?></td>			<td><?=$db->printPercent($s->blacc->tr)?></td>			<td><?=$db->printPercent($s->tracc->tr)?></td>		</tr>
			<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->time->ws)?> s</td>		<td><?=$s->kills->ws?></td>		<td><?=$s->ko->ws?></td>			<td><?=$s->tkills->ws?></td>		<td><?=$s->deaths->ws?></td>			<td><?=$s->repsd->ws?></td>			<td><?=$s->damage->ws?></td>		<td><?=$s->damageS->ws?></td>		<td><?=$s->damageT->ws?></td>		<td><?=$db->printPercent($s->bacc->ws)?></td>			<td><?=$db->printPercent($s->blacc->ws)?></td>		<td><?=$db->printPercent($s->tracc->ws)?></td>		</tr>
			<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->time->lc)?> s</td>		<td><?=$s->kills->lc?></td>		<td><?=$s->ko->lc?></td>			<td><?=$s->tkills->lc?></td>		<td><?=$s->deaths->lc?></td>			<td><?=$s->repsd->lc?></td>			<td><?=$s->damage->lc?></td>			<td><?=$s->damageS->lc?></td>		<td><?=$s->damageT->lc?></td>		<td><?=$db->printPercent($s->bacc->lc)?></td>			<td><?=$db->printPercent($s->blacc->lc)?></td>			<td><?=$db->printPercent($s->tracc->lc)?></td>		</tr>
			<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->time->sr)?> s</td>		<td><?=$s->kills->sr?></td>		<td><?=$s->ko->sr?></td>			<td><?=$s->tkills->sr?></td>		<td><?=$s->deaths->sr?></td>			<td><?=$s->repsd->sr?></td>			<td><?=$s->damage->sr?></td>			<td><?=$s->damageS->sr?></td>		<td><?=$s->damageT->sr?></td>		<td><?=$db->printPercent($s->bacc->sr)?></td>			<td><?=$db->printPercent($s->blacc->sr)?></td>			<td><?=$db->printPercent($s->tracc->sr)?></td>		</tr>
			<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->time->sum)?> s</b></td>	<td><b><?=$s->kills->sum?></b></td>	<td><b><?=$s->ko->sum?></b></td>		<td><b><?=$s->tkills->sum?></b></td>	<td><b><?=$s->deaths->sum?></b></td>	<td><b><?=$s->repsd->sum?></b></td>		<td><b><?=$s->damage->sum?></b></td>	<td><b><?=$s->damageS->sum?></b></td>	<td><b><?=$s->damageT->sum?></b></td>	<td><b><?=$db->printPercent($s->bacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->blacc->sum)?></b></td>	<td><b><?=$db->printPercent($s->tracc->sum)?></b></td></tr>
			</TABLE>
			<?
		}
		else if ($method == "gp" || $method == "")
		{
			?>
			<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'" WIDTH='80%'>
			<tr><td colspan=13 align='left'>
			<?
			print "$url=tot'>Total</a>  |  <font color='#FFFF00'><b>Per-game</b></font></a>  |  $url=all'>All</a>";
			print "<br><br>\n";
			?></td></tr>
			<tr><td></td>					<td class=orange>Time/G</td>						<td class=orange>Kills/G</td>			<td class=orange>KOs/G</td>			<td class=orange>TKills/G</td>				<td class=orange>Deaths/G</td>		<td class=orange>DWR/G</td>			<td class=orange>Dmg Dealt/G</td>				<td class=orange>CB Dmg/G</td>			<td class=orange>TKill Dmg/G</td>					</tr>
			<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->dg($s->time->wb, 0))?></td>  		<td><?=$s->dg($s->kills->wb, 1)?></td>		<td><?=$s->dg($s->ko->wb, 1)?></td>		<td><?=$s->dg($s->tkills->wb, 1)?></td>			<td><?=$s->dg($s->deaths->wb, 1)?></td>	<td><?=$s->dg($s->repsd->wb, 1)?></td>	<td><?=$s->dg($s->damage->wb, 0)?></td>			<td><?=$s->dg($s->damageS->wb, 0)?>			<td><?=$s->dg($s->damageT->wb, 0)?></td>	</tr>
			<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->dg($s->time->jv, 0))?></td>  		<td><?=$s->dg($s->kills->jv, 1)?></td>		<td><?=$s->dg($s->ko->jv, 1)?></td>		<td><?=$s->dg($s->tkills->jv, 1)?></td>			<td><?=$s->dg($s->deaths->jv, 1)?></td>		<td><?=$s->dg($s->repsd->jv, 1)?></td>		<td><?=$s->dg($s->damage->jv, 0)?></td>			<td><?=$s->dg($s->damageS->jv, 0)?>			<td><?=$s->dg($s->damageT->jv, 0)?></td>		</tr>
			<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->dg($s->time->sp, 0))?></td>  		<td><?=$s->dg($s->kills->sp, 1)?></td>		<td><?=$s->dg($s->ko->sp, 1)?></td>		<td><?=$s->dg($s->tkills->sp, 1)?></td>			<td><?=$s->dg($s->deaths->sp, 1)?></td>	<td><?=$s->dg($s->repsd->sp, 1)?></td>		<td><?=$s->dg($s->damage->sp, 0)?></td>			<td><?=$s->dg($s->damageS->sp, 0)?>			<td><?=$s->dg($s->damageT->sp, 0)?></td>		</tr>
			<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->dg($s->time->lv, 0))?></td>  		<td><?=$s->dg($s->kills->lv, 1)?></td>		<td><?=$s->dg($s->ko->lv, 1)?></td>		<td><?=$s->dg($s->tkills->lv, 1)?></td>			<td><?=$s->dg($s->deaths->lv, 1)?></td>		<td><?=$s->dg($s->repsd->lv, 1)?></td>		<td><?=$s->dg($s->damage->lv, 0)?></td>			<td><?=$s->dg($s->damageS->lv, 0)?>			<td><?=$s->dg($s->damageT->lv, 0)?></td>		</tr>
			<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->dg($s->time->tr, 0))?></td> 	 	<td><?=$s->dg($s->kills->tr, 1)?></td>		<td><?=$s->dg($s->ko->tr, 1)?></td>		<td><?=$s->dg($s->tkills->tr, 1)?></td>			<td><?=$s->dg($s->deaths->tr, 1)?></td>		<td><?=$s->dg($s->repsd->tr, 1)?></td>		<td><?=$s->dg($s->damage->tr, 0)?></td>			<td><?=$s->dg($s->damageS->tr, 0)?>			<td><?=$s->dg($s->damageT->tr, 0)?></td>		</tr>
			<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->dg($s->time->ws, 0))?></td>  		<td><?=$s->dg($s->kills->ws, 1)?></td>		<td><?=$s->dg($s->ko->ws, 1)?></td>		<td><?=$s->dg($s->tkills->ws, 1)?></td>			<td><?=$s->dg($s->deaths->ws, 1)?></td>	<td><?=$s->dg($s->repsd->ws, 1)?></td>		<td><?=$s->dg($s->damage->ws, 0)?></td>			<td><?=$s->dg($s->damageS->ws, 0)?>			<td><?=$s->dg($s->damageT->ws, 0)?></td>	</tr>
			<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->dg($s->time->lc, 0))?></td>  		<td><?=$s->dg($s->kills->lc, 1)?></td>		<td><?=$s->dg($s->ko->lc, 1)?></td>		<td><?=$s->dg($s->tkills->lc, 1)?></td>			<td><?=$s->dg($s->deaths->lc, 1)?></td>		<td><?=$s->dg($s->repsd->lc, 1)?></td>		<td><?=$s->dg($s->damage->lc, 0)?></td>			<td><?=$s->dg($s->damageS->lc, 0)?>			<td><?=$s->dg($s->damageT->lc, 0)?></td>		</tr>
			<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->dg($s->time->sr, 0))?></td>  		<td><?=$s->dg($s->kills->sr, 1)?></td>		<td><?=$s->dg($s->ko->sr, 1)?></td>		<td><?=$s->dg($s->tkills->sr, 1)?></td>			<td><?=$s->dg($s->deaths->sr, 1)?></td>	<td><?=$s->dg($s->repsd->sr, 1)?></td>		<td><?=$s->dg($s->damage->sr, 0)?></td>			<td><?=$s->dg($s->damageS->sr, 0)?>			<td><?=$s->dg($s->damageT->sr, 0)?></td>		</tr>

			<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->dg($s->time->sum, 0))?></b></td>  	<td><b><?=$s->dg($s->kills->sum, 1)?></b></td>	<td><b><?=$s->dg($s->ko->sum, 1)?></b></td>	<td><b><?=$s->dg($s->tkills->sum, 1)?></b></td>		<td><b><?=$s->dg($s->deaths->sum, 1)?></b></td>	<td><b><?=$s->dg($s->repsd->sum, 1)?></b></td>	<td><b><?=$s->dg($s->damage->sum, 2)?></b></td>	<td><b><?=$s->dg($s->damageS->sum, 0)?>		<td><b><?=$s->dg($s->damageT->sum, 0)?></b></td></tr>

			</TABLE>
			<?
		}
		else if ($method == "all")
		{
			?>
			<TABLE BORDER='0' CELLSPACING='1' CELLPADDING='3' STYLE="cell-color='gray'">
			<tr><td colspan=13 align='left'>
			<?
			print "$url=tot'>Total</a>  |  $url=gp'>Per-game</a>  |  <font color='#FFFF00'><b>All</b></font></a>";
			print "<br><br>\n";
			?></td></tr>
			<tr><td></td>					<td class=orange>TP</td>					<td class=orange>TP/G</td>								<td class=orange>K</td>  	 	<td class=orange>K/G</td>					<td class=orange>KOs</td>			<td class=orange>KOs/G</td>					<td class=orange>TK</td>		<td class=orange>TK/G</td>						<td class=orange>D</td>			<td class=orange>D/G</td>					<td class=orange>DWR</td>			<td class=orange>DWR/G</td>					<td class=orange>DD</td>			<td class=orange>DD/G</td>						<td class=orange>DDS</td>			<td class=orange>DDS/G</td>						<td class=orange>DDT</td>			<td class=orange>DDT/G</td>						<td class=orange>BAcc</td>					<td class=orange>BLAcc</td>					<td class=orange>TAcc</td>				</tr>
			<tr><td class=orange>Wardbird </td>		<td><?=$db->parseSeconds($s->time->wb)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->wb, 0))?></td>  		<td><?=$s->kills->wb?></td>		<td class=lgray><?=$s->dg($s->kills->wb, 1)?></td>		<td><?=$s->ko->wb?></td>			<td class=lgray><?=$s->dg($s->ko->wb, 1)?></td>		<td><?=$s->tkills->wb?></td>		<td class=lgray><?=$s->dg($s->tkills->wb, 1)?></td>			<td><?=$s->deaths->wb?></td>			<td class=lgray><?=$s->dg($s->deaths->wb, 0)?></td>		<td><?=$s->repsd->wb?></td>			<td class=lgray><?=$s->dg($s->repsd->wb, 1)?></td>		<td><?=$s->damage->wb?></td>		<td class=lgray><?=$s->dg($s->damage->wb, 0)?></td>			<td><?=$s->damageS->wb?></td>		<td class=lgray><?=$s->dg($s->damageS->wb, 0)?>			<td><?=$s->damageT->wb?></td>		<td class=lgray><?=$s->dg($s->damageT->wb, 0)?></td>		<td><?=$db->printPercent($s->bacc->wb)?></td>			<td><?=$db->printPercent($s->blacc->wb)?></td>		<td><?=$db->printPercent($s->tracc->wb)?></td>		</tr>
			<tr><td class=orange>Javelin </td>		<td><?=$db->parseSeconds($s->time->jv)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->jv, 0))?></td>  		<td><?=$s->kills->jv?></td>		<td class=lgray><?=$s->dg($s->kills->jv, 1)?></td>		<td><?=$s->ko->jv?></td>			<td class=lgray><?=$s->dg($s->ko->jv, 1)?></td>			<td><?=$s->tkills->jv?></td>		<td class=lgray><?=$s->dg($s->tkills->jv, 1)?></td>			<td><?=$s->deaths->jv?></td>			<td class=lgray><?=$s->dg($s->deaths->jv, 0)?></td>		<td><?=$s->repsd->jv?></td>			<td class=lgray><?=$s->dg($s->repsd->jv, 1)?></td>		<td><?=$s->damage->jv?></td>			<td class=lgray><?=$s->dg($s->damage->jv, 0)?></td>			<td><?=$s->damageS->jv?></td>		<td class=lgray><?=$s->dg($s->damageS->jv, 0)?>			<td><?=$s->damageT->jv?></td>		<td class=lgray><?=$s->dg($s->damageT->jv, 0)?></td>			<td><?=$db->printPercent($s->bacc->jv)?></td>			<td><?=$db->printPercent($s->blacc->jv)?></td>			<td><?=$db->printPercent($s->tracc->jv)?></td>		</tr>
			<tr><td class=orange>Spider </td>		<td><?=$db->parseSeconds($s->time->sp)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->sp, 0))?></td>  		<td><?=$s->kills->sp?></td>		<td class=lgray><?=$s->dg($s->kills->sp, 1)?></td>		<td><?=$s->ko->sp?></td>			<td class=lgray><?=$s->dg($s->ko->sp, 1)?></td>		<td><?=$s->tkills->sp?></td>		<td class=lgray><?=$s->dg($s->tkills->sp, 1)?></td>			<td><?=$s->deaths->sp?></td>			<td class=lgray><?=$s->dg($s->deaths->sp, 0)?></td>		<td><?=$s->repsd->sp?></td>			<td class=lgray><?=$s->dg($s->repsd->sp, 1)?></td>		<td><?=$s->damage->sp?></td>		<td class=lgray><?=$s->dg($s->damage->sp, 0)?></td>			<td><?=$s->damageS->sp?></td>		<td class=lgray><?=$s->dg($s->damageS->sp, 0)?>			<td><?=$s->damageT->sp?></td>		<td class=lgray><?=$s->dg($s->damageT->sp, 0)?></td>			<td><?=$db->printPercent($s->bacc->sp)?></td>			<td><?=$db->printPercent($s->blacc->sp)?></td>			<td><?=$db->printPercent($s->tracc->sp)?></td>		</tr>
			<tr><td class=orange>Leviathan </td>		<td><?=$db->parseSeconds($s->time->lv)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->lv, 0))?></td>  		<td><?=$s->kills->lv?></td>		<td class=lgray><?=$s->dg($s->kills->lv, 1)?></td>		<td><?=$s->ko->lv?></td>			<td class=lgray><?=$s->dg($s->ko->lv, 1)?></td>			<td><?=$s->tkills->lv?></td>		<td class=lgray><?=$s->dg($s->tkills->lv, 1)?></td>			<td><?=$s->deaths->lv?></td>			<td class=lgray><?=$s->dg($s->deaths->lv, 0)?></td>		<td><?=$s->repsd->lv?></td>			<td class=lgray><?=$s->dg($s->repsd->lv, 1)?></td>		<td><?=$s->damage->lv?></td>			<td class=lgray><?=$s->dg($s->damage->lv, 0)?></td>			<td><?=$s->damageS->lv?></td>		<td class=lgray><?=$s->dg($s->damageS->lv, 0)?>			<td><?=$s->damageT->lv?></td>		<td class=lgray><?=$s->dg($s->damageT->lv, 0)?></td>			<td><?=$db->printPercent($s->bacc->lv)?></td>			<td><?=$db->printPercent($s->blacc->lv)?></td>			<td><?=$db->printPercent($s->tracc->lv)?></td>		</tr>
			<tr><td class=orange>Terrier </td>		<td><?=$db->parseSeconds($s->time->tr)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->tr, 0))?></td> 	 		<td><?=$s->kills->tr?></td>		<td class=lgray><?=$s->dg($s->kills->tr, 1)?></td>		<td><?=$s->ko->tr?></td>			<td class=lgray><?=$s->dg($s->ko->tr, 1)?></td>			<td><?=$s->tkills->tr?></td>		<td class=lgray><?=$s->dg($s->tkills->tr, 1)?></td>			<td><?=$s->deaths->tr?></td>			<td class=lgray><?=$s->dg($s->deaths->tr, 0)?></td>		<td><?=$s->repsd->tr?></td>			<td class=lgray><?=$s->dg($s->repsd->tr, 1)?></td>		<td><?=$s->damage->tr?></td>			<td class=lgray><?=$s->dg($s->damage->tr, 0)?></td>			<td><?=$s->damageS->tr?></td>		<td class=lgray><?=$s->dg($s->damageS->tr, 0)?>			<td><?=$s->damageT->tr?></td>		<td class=lgray><?=$s->dg($s->damageT->tr, 0)?></td>			<td><?=$db->printPercent($s->bacc->tr)?></td>			<td><?=$db->printPercent($s->blacc->tr)?></td>			<td><?=$db->printPercent($s->tracc->tr)?></td>		</tr>
			<tr><td class=orange>Weasel </td>		<td><?=$db->parseSeconds($s->time->ws)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->ws, 0))?></td>  		<td><?=$s->kills->ws?></td>		<td class=lgray><?=$s->dg($s->kills->ws, 1)?></td>		<td><?=$s->ko->ws?></td>			<td class=lgray><?=$s->dg($s->ko->ws, 1)?></td>		<td><?=$s->tkills->ws?></td>		<td class=lgray><?=$s->dg($s->tkills->ws, 1)?></td>			<td><?=$s->deaths->ws?></td>			<td class=lgray><?=$s->dg($s->deaths->ws, 0)?></td>		<td><?=$s->repsd->ws?></td>			<td class=lgray><?=$s->dg($s->repsd->ws, 1)?></td>		<td><?=$s->damage->ws?></td>		<td class=lgray><?=$s->dg($s->damage->ws, 0)?></td>			<td><?=$s->damageS->ws?></td>		<td class=lgray><?=$s->dg($s->damageS->ws, 0)?>			<td><?=$s->damageT->ws?></td>		<td class=lgray><?=$s->dg($s->damageT->ws, 0)?></td>		<td><?=$db->printPercent($s->bacc->ws)?></td>			<td><?=$db->printPercent($s->blacc->ws)?></td>		<td><?=$db->printPercent($s->tracc->ws)?></td>		</tr>
			<tr><td class=orange>Lancaster </td>		<td><?=$db->parseSeconds($s->time->lc)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->lc, 0))?></td>  		<td><?=$s->kills->lc?></td>		<td class=lgray><?=$s->dg($s->kills->lc, 1)?></td>		<td><?=$s->ko->lc?></td>			<td class=lgray><?=$s->dg($s->ko->lc, 1)?></td>			<td><?=$s->tkills->lc?></td>		<td class=lgray><?=$s->dg($s->tkills->lc, 1)?></td>			<td><?=$s->deaths->lc?></td>			<td class=lgray><?=$s->dg($s->deaths->lc, 0)?></td>		<td><?=$s->repsd->lc?></td>			<td class=lgray><?=$s->dg($s->repsd->lc, 1)?></td>		<td><?=$s->damage->lc?></td>			<td class=lgray><?=$s->dg($s->damage->lc, 0)?></td>			<td><?=$s->damageS->lc?></td>		<td class=lgray><?=$s->dg($s->damageS->lc, 0)?>			<td><?=$s->damageT->lc?></td>		<td class=lgray><?=$s->dg($s->damageT->lc, 0)?></td>			<td><?=$db->printPercent($s->bacc->lc)?></td>			<td><?=$db->printPercent($s->blacc->lc)?></td>			<td><?=$db->printPercent($s->tracc->lc)?></td>		</tr>
			<tr><td class=orange>Shark </td>		<td><?=$db->parseSeconds($s->time->sr)?> s</td>		<td class=lgray><?=$db->parseSeconds($s->dg($s->time->sr, 0))?></td>  		<td><?=$s->kills->sr?></td>		<td class=lgray><?=$s->dg($s->kills->sr, 1)?></td>		<td><?=$s->ko->sr?></td>			<td class=lgray><?=$s->dg($s->ko->sr, 1)?></td>			<td><?=$s->tkills->sr?></td>		<td class=lgray><?=$s->dg($s->tkills->sr, 1)?></td>			<td><?=$s->deaths->sr?></td>			<td class=lgray><?=$s->dg($s->deaths->sr, 0)?></td>		<td><?=$s->repsd->sr?></td>			<td class=lgray><?=$s->dg($s->repsd->sr, 1)?></td>		<td><?=$s->damage->sr?></td>			<td class=lgray><?=$s->dg($s->damage->sr, 0)?></td>			<td><?=$s->damageS->sr?></td>		<td class=lgray><?=$s->dg($s->damageS->sr, 0)?>			<td><?=$s->damageT->sr?></td>		<td class=lgray><?=$s->dg($s->damageT->sr, 0)?></td>			<td><?=$db->printPercent($s->bacc->sr)?></td>			<td><?=$db->printPercent($s->blacc->sr)?></td>			<td><?=$db->printPercent($s->tracc->sr)?></td>		</tr>

			<tr><td class=orange><b>Total  </b></td>	<td><b><?=$db->parseSeconds($s->time->sum)?> s</b></td>	<td class=lgray><b><?=$db->parseSeconds($s->dg($s->time->sum, 0))?></b></td>  	<td><b><?=$s->kills->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->kills->sum, 1)?></b></td>	<td><b><?=$s->ko->sum?></b></td>		<td class=lgray><b><?=$s->dg($s->ko->sum, 1)?></b></td>	<td><b><?=$s->tkills->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->tkills->sum, 1)?></b></td>		<td><b><?=$s->deaths->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->deaths->sum, 2)?></b></td>	<td><b><?=$s->repsd->sum?></b></td>		<td class=lgray><b><?=$s->dg($s->repsd->sum, 1)?></b></td>	<td><b><?=$s->damage->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->damage->sum, 0)?></b></td>	<td><b><?=$s->damageS->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->damageS->sum, 0)?>		<td><b><?=$s->damageT->sum?></b></td>	<td class=lgray><b><?=$s->dg($s->damageT->sum, 0)?></b></td>	<td><?=$db->printPercent($s->bacc->sum)?></td>		<td><?=$db->printPercent($s->blacc->sum)?></td>		<td><?=$db->printPercent($s->tracc->sum)?></td>	</tr>

			</TABLE>
			<?
		}
		?>
		<br><br>

		Lag averages
		<TABLE BORDER='0' CELLSPACNIG='10'>
		<tr><td class=orange>Low ping</td><td class=orange>High ping</td><td class=orange>Average ping</td></td><td class=orange>S2C P.L.</td><td class=orange>S2CW P.L.</td><td class=orange>C2S P.L.</td></tr>
		<tr><td><?=round($s->pinglow, 0)?> ms</td><td><?=round($s->pinghigh, 0)?> ms</td><td><?=round($s->pingave, 0)?> ms</td><td><?=round($s->packetlossS2C, 1)?>%</td><td><?=round($s->packetlossS2CW, 1)?>%</td><td><?=round($s->packetlossC2S, 1)?>%</td></tr>
		</TABLE>
		<br><br>

		<?
	}

	function printRankablePlayerList($db, $method, $ship, $direction, $limit, $sid)
	{
		$tscript = "listplayers.php";

		if ($method == "ping")
			$m = "PingAverage";
		else if ($method == "s2c")
			$m = "PacketLossS2C";
		else if ($method == "s2cw")
			$m = "PacketLossS2CW";
		else if ($method == "c2s")
			$m = "PacketLossC2S";
		else if ($method == "squad")
		{
			$m = "squads.Squad_ID";
		}
		else if ($method == "name")
		{
			$m = "players.PlayerName";
		}
		else if ($method == "time")
		{
			if ($ship != "")
				$m = "TimePlayed_" . $ship;
			else
			{
				$m = "(TimePlayed_WB + TimePlayed_JV + TimePlayed_SP + TimePlayed_LV + TimePlayed_TR + TimePlayed_WS + TimePlayed_LC + TimePlayed_SR)";
			}
		}
		else if ($method == "kills")
		{
			if ($ship != "")
				$m = "PlayerKills_" . $ship;
			else
			{
				$m = "(PlayerKills_WB + PlayerKills_JV + PlayerKills_SP + PlayerKills_LV + PlayerKills_TR + PlayerKills_WS + PlayerKills_LC + PlayerKills_SR)";
			}
		}
		else if ($method == "tkills")
		{
			if ($ship != "")
				$m = "PlayerTeamKills_" . $ship;
			else
			{
				$m = "(PlayerTeamKills_WB + PlayerTeamKills_JV + PlayerTeamKills_SP + PlayerTeamKills_LV + PlayerTeamKills_TR + PlayerTeamKills_WS + PlayerTeamKills_LC + PlayerTeamKills_SR)";
			}
		}
		else if ($method == "deaths")
		{
			if ($ship != "")
				$m = "PlayerDeaths_" . $ship;
			else
			{
				$m = "(PlayerDeaths_WB + PlayerDeaths_JV + PlayerDeaths_SP + PlayerDeaths_LV + PlayerDeaths_TR + PlayerDeaths_WS + PlayerDeaths_LC + PlayerDeaths_SR)";
			}
		}
		else if ($method == "bhit")
		{
			if ($ship != "")
				$m = "BombsHitEnemy_" . $ship;
			else
			{
				$m = "(BombsHitEnemy_WB + BombsHitEnemy_JV + BombsHitEnemy_SP + BombsHitEnemy_LV + BombsHitEnemy_TR + BombsHitEnemy_WS + BombsHitEnemy_LC + BombsHitEnemy_SR)";
			}
		}
		else if ($method == "kills")
		{
			if ($ship != "")
				$m = "PlayerKills_" . $ship;
			else
			{
				$m = "(PlayerKills_WB + PlayerKills_JV + PlayerKills_SP + PlayerKills_LV + PlayerKills_TR + PlayerKills_WS + PlayerKills_LC + PlayerKills_SR)";
			}
		}
		else if ($method == "deaths")
		{
			if ($ship != "")
				$m = "PlayerDeaths_" . $ship;
			else
			{
				$m = "(PlayerDeaths_WB + PlayerDeaths_JV + PlayerDeaths_SP + PlayerDeaths_LV + PlayerDeaths_TR + PlayerDeaths_WS + PlayerDeaths_LC + PlayerDeaths_SR)";
			}
		}
		else if ($method == "tkills")
		{
			if ($ship != "")
				$m = "PlayerTeamKills_" . $ship;
			else
			{
				$m = "(PlayerTeamKills_WB + PlayerTeamKills_JV + PlayerTeamKills_SP + PlayerTeamKills_LV + PlayerTeamKills_TR + PlayerTeamKills_WS + PlayerTeamKills_LC + PlayerTeamKills_SR)";
			}
		}
		else
			$m = "players.Player_ID";

		if ($direction == "asc")
			$d = "ASC";
		else
			$d = "DESC";

		if ($limit == "")
			$lim = 1000;
		else
			$lim = $limit;


		$query = "	SELECT leaguecommon.players.*, leaguecommon.squads.*, leagueseason4.playerstats.* FROM leagueseason4.playerstats
		   		INNER JOIN leaguecommon.players ON playerstats.Player_ID = players.Player_ID
				INNER JOIN leaguecommon.squads ON players.Squad_ID = squads.Squad_ID ";
		if ($sid != "")
			$query = $query . "WHERE squads.Squad_ID = '$sid' ";
		$query = $query . "ORDER BY " . $m . " " . $d . " LIMIT " . $lim;

		$list = $db->query($query);

		?>
		<table border=0 width="60%">
		<tr>
		<form name="chooser" action="listplayers.php" method="GET">

			<input type="hidden" name="sortMethod" value="<?=$method?>">
			<input type="hidden" name="dir" value="<?=$direction?>">
			<input type="hidden" name="sid" value="<?=$sid?>">

			<td>Squad:
			<select name="sid">
				<option <? if ($sid == "") print "selected";?> value="">All squads</option>
				<? $db->squadOptions($sid); ?>
			</select></td>
			<td>Ship:
			<select name="ship">
				<option <? if ($ship == "") print "selected";?> value="">All ships</option>
				<option <? if ($ship == "WB") print "selected";?> value="WB">Warbird</option>
				<option <? if ($ship == "JV") print "selected";?> value="JV">Javelin</option>
				<option <? if ($ship == "SP") print "selected";?> value="SP">Spider</option>
				<option <? if ($ship == "LV") print "selected";?> value="LV">Leviathan</option>
				<option <? if ($ship == "TR") print "selected";?> value="TR">Terrier</option>
				<option <? if ($ship == "WS") print "selected";?> value="WS">Weasel</option>
				<option <? if ($ship == "LC") print "selected";?> value="LC">Lancaster</option>
				<option <? if ($ship == "SR") print "selected";?> value="SR">Shark</option>
			</select></td>
			<td>Fetch limit:
			<select name="lim">
				<option <? if ($limit == "") print "selected";?> value="">Unlimited</option>
				<option <? if ($lim == 100) print "selected";?> value=100>100</option>
				<option <? if ($lim == 50) print "selected";?> value=50>50</option>
				<option <? if ($lim == 25) print "selected";?> value=25>25</option>
				<option <? if ($lim == 10) print "selected";?> value=10>10</option>
				<option <? if ($lim == 5) print "selected";?> value=5>5</option>
			</select></td>

			<td><input type="submit" value="Update"></td>
		</form>
		</tr>
		</table>

		<br><br>

		<table border=0 width="100%">
		<tr>
		<td class=orange><b>Name <a href="<?=$tscript?>?sortMethod=name&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "name", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=name&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "name", $direction, "des")?></a></td>
		<td class=orange><b>Sqd <a href="<?=$tscript?>?sortMethod=squad&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "squad", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=squad&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "squad", $direction, "des")?></a></td>
		<td class=orange><b>Kills <a href="<?=$tscript?>?sortMethod=kills&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "kills", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=kills&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "kills", $direction, "des")?></a></td>
		<td class=orange><b>TKills <a href="<?=$tscript?>?sortMethod=tkills&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "tkills", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=tkills&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "tkills", $direction, "des")?></a></td>
		<td class=orange><b>Deaths <a href="<?=$tscript?>?sortMethod=deaths&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "deaths", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=deaths&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "deaths", $direction, "des")?></a></td>
		<td class=orange><b>AvPing <a href="<?=$tscript?>?sortMethod=ping&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "ping", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=ping&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "ship", $direction, "des")?></a></td>
		<td class=orange><b>Time plyd <a href="<?=$tscript?>?sortMethod=time&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "time", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=time&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "time", $direction, "des")?></a></td>
		<td class=orange><b>Bombs hit <a href="<?=$tscript?>?sortMethod=bhit&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "bhit", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=bhit&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "bhit", $direction, "des")?></a></td>
		<td class=orange><b>Bullets hit <a href="<?=$tscript?>?sortMethod=blhit&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "blhit", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=blhit&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "blhit", $direction, "des")?></a></td>
		<td class=orange><b>Thors hit <a href="<?=$tscript?>?sortMethod=thit&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "thit", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=thit&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "thit", $direction, "des")?></a></td>
		<td class=orange><b>Dmg dealt <a href="<?=$tscript?>?sortMethod=dd&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "dd", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=dd&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "dd", $direction, "des")?></a></td>
		<td class=orange><b>Games plyd <a href="<?=$tscript?>?sortMethod=gp&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "gp", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=gp&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "gp", $direction, "des")?></a></td>
		</tr>
		<?

		while ($player = mysql_fetch_object($list))
		{

			if ($ship == "")
			{
				$time = $db->parseSeconds($player->TimePlayed_WB + $player->TimePlayed_JV + $player->TimePlayed_SP + $player->TimePlayed_LV + $player->TimePlayed_TR + $player->TimePlayed_WS + $player->TimePlayed_LC + $player->TimePlayed_SR);
				$bhit = $player->BombsHitEnemy_WB + $player->BombsHitEnemy_JV + $player->BombsHitEnemy_SP + $player->BombsHitEnemy_LV + $player->BombsHitEnemy_TR + $player->BombsHitEnemy_WS + $player->BombsHitEnemy_LC + $player->BombsHitEnemy_SR;
				$blhit = $player->BulletsHitEnemy_WB + $player->BulletsHitEnemy_JV + $player->BulletsHitEnemy_SP + $player->BulletsHitEnemy_LV + $player->BulletsHitEnemy_TR + $player->BulletsHitEnemy_WS + $player->BulletsHitEnemy_LC + $player->BulletsHitEnemy_SR;
				$thit = $player->ThorsHitEnemy_WB + $player->ThorsHitEnemy_JV + $player->ThorsHitEnemy_SP + $player->ThorsHitEnemy_LV + $player->ThorsHitEnemy_TR + $player->ThorsHitEnemy_WS + $player->ThorsHitEnemy_LC + $player->ThorsHitEnemy_SR;
				$kills = $player->PlayerKills_WB + $player->PlayerKills_JV + $player->PlayerKills_SP + $player->PlayerKills_LV + $player->PlayerKills_TR + $player->PlayerKills_WS + $player->PlayerKills_LC + $player->PlayerKills_SR;
				$tkills = $player->PlayerTeamKills_WB + $player->PlayerTeamKills_JV + $player->PlayerTeamKills_SP + $player->PlayerTeamKills_LV + $player->PlayerTeamKills_TR + $player->PlayerTeamKills_WS + $player->PlayerTeamKills_LC + $player->PlayerTeamKills_SR;
				$deaths = $player->PlayerDeaths_WB + $player->PlayerDeaths_JV + $player->PlayerDeaths_SP + $player->PlayerDeaths_LV + $player->PlayerDeaths_TR + $player->PlayerDeaths_WS + $player->PlayerDeaths_LC + $player->PlayerDeaths_SR;
				$damage = $player->DamageDealt_WB + $player->DamageDealt_JV + $player->DamageDealt_SP + $player->DamageDealt_LV + $player->DamageDealt_TR + $player->DamageDealt_WS + $player->DamageDealt_LC + $player->DamageDealt_SR;
			}
			else
			{
				$query = "SELECT TimePlayed_$ship AS TimePlayed, BombsHitEnemy_$ship AS BombsHitEnemy, BulletsHitEnemy_$ship AS BulletsHitEnemy,
					ThorsHitEnemy_$ship AS ThorsHitEnemy, PlayerKills_$ship AS PlayerKills, PlayerTeamKills_$ship AS PlayerTeamKills, PlayerDeaths_$ship AS PlayerDeaths, DamageDealt_$ship as DamageDealt
					FROM leagueseason4.playerstats WHERE Player_ID = '$player->Player_ID'";
				$data = mysql_fetch_object($db->query($query));

				$time = $db->parseSeconds($data->TimePlayed);
				$bhit = $data->BombsHitEnemy;
				$blhit = $data->BulletsHitEnemy;
				$thit = $data->ThorsHitEnemy;
				$kills = $data->PlayerKills;
				$tkills = $data->PlayerTeamKills;
				$deaths = $data->PlayerDeaths;
				$damage = $data->DamageDealt;
			}

			$path = "http://mecbot.t3g.org/leaguebanners/$player->Player_ID.png";
			print "<tr><td>";
			if ($player->NewBanner == 2 || $player->NewBanner == 1)
				print "<img src='$path' alt=''>  ";
			print "<a href='listplayer.php?pid=$player->Player_ID' class='nonbold'>$player->PlayerName</a></td>";
			print "<td><a href='listsquad.php?sid=$player->Squad_ID' class='nonbold'>$player->SquadName</a></td><td>$kills</td><td>$tkills</td><td>$deaths</td>";
			print "<td>$player->PingAverage ms</td><td>$time s</td><td>$bhit</td><td>$blhit</td><td>$thit</td><td>$damage</td><td>$player->GamesPlayed</td></tr>";
		}
		print "</tr></table>\n";

	}

	function printRankableGameList($db, $method, $ship, $direction, $limit, $gid)
	{
		$tscript = "listrnkgame.php";

		if ($method == "ping")
			$m = "PingAverage";
		else if ($method == "name")
		{
			$m = "players.PlayerName";
		}
		else if ($method == "time")
		{
			if ($ship != "")
				$m = "TimePlayed_" . $ship;
			else
			{
				$m = "(TimePlayed_WB + TimePlayed_JV + TimePlayed_SP + TimePlayed_LV + TimePlayed_TR + TimePlayed_WS + TimePlayed_LC + TimePlayed_SR)";
			}
		}
		else if ($method == "kills")
		{
			if ($ship != "")
				$m = "PlayerKills_" . $ship;
			else
			{
				$m = "(PlayerKills_WB + PlayerKills_JV + PlayerKills_SP + PlayerKills_LV + PlayerKills_TR + PlayerKills_WS + PlayerKills_LC + PlayerKills_SR)";
			}
		}
		else if ($method == "tkills")
		{
			if ($ship != "")
				$m = "PlayerTeamKills_" . $ship;
			else
			{
				$m = "(PlayerTeamKills_WB + PlayerTeamKills_JV + PlayerTeamKills_SP + PlayerTeamKills_LV + PlayerTeamKills_TR + PlayerTeamKills_WS + PlayerTeamKills_LC + PlayerTeamKills_SR)";
			}
		}
		else if ($method == "deaths")
		{
			if ($ship != "")
				$m = "PlayerDeaths_" . $ship;
			else
			{
				$m = "(PlayerDeaths_WB + PlayerDeaths_JV + PlayerDeaths_SP + PlayerDeaths_LV + PlayerDeaths_TR + PlayerDeaths_WS + PlayerDeaths_LC + PlayerDeaths_SR)";
			}
		}
		else if ($method == "bhit")
		{
			if ($ship != "")
				$m = "BombsHitEnemy_" . $ship;
			else
			{
				$m = "(BombsHitEnemy_WB + BombsHitEnemy_JV + BombsHitEnemy_SP + BombsHitEnemy_LV + BombsHitEnemy_TR + BombsHitEnemy_WS + BombsHitEnemy_LC + BombsHitEnemy_SR)";
			}
		}
		else if ($method == "kills")
		{
			if ($ship != "")
				$m = "PlayerKills_" . $ship;
			else
			{
				$m = "(PlayerKills_WB + PlayerKills_JV + PlayerKills_SP + PlayerKills_LV + PlayerKills_TR + PlayerKills_WS + PlayerKills_LC + PlayerKills_SR)";
			}
		}
		else if ($method == "deaths")
		{
			if ($ship != "")
				$m = "PlayerDeaths_" . $ship;
			else
			{
				$m = "(PlayerDeaths_WB + PlayerDeaths_JV + PlayerDeaths_SP + PlayerDeaths_LV + PlayerDeaths_TR + PlayerDeaths_WS + PlayerDeaths_LC + PlayerDeaths_SR)";
			}
		}
		else if ($method == "tkills")
		{
			if ($ship != "")
				$m = "PlayerTeamKills_" . $ship;
			else
			{
				$m = "(PlayerTeamKills_WB + PlayerTeamKills_JV + PlayerTeamKills_SP + PlayerTeamKills_LV + PlayerTeamKills_TR + PlayerTeamKills_WS + PlayerTeamKills_LC + PlayerTeamKills_SR)";
			}
		}
		else
			$m = "players.PlayerName";

		if ($direction == "asc")
			$d = "ASC";
		else
			$d = "DESC";

		if ($limit == "")
			$lim = 1000;
		else
			$lim = $limit;


		$query = "	SELECT leaguecommon.players.*, leaguecommon.squads.*, leagueseason4.gamestats.* FROM leagueseason4.gamestats
		   		INNER JOIN leaguecommon.players ON gamestats.Player_ID = players.Player_ID
				INNER JOIN leaguecommon.squads ON players.Squad_ID = squads.Squad_ID
				WHERE Game_ID = '$gid' ";

		$query = $query . "ORDER BY " . $m . " " . $d . " LIMIT " . $lim;

		$list = $db->query($query);

		?>
		<table border=0 width="60%">
		<tr>
		<form name="chooser" action="$tscript" method="GET">

			<input type="hidden" name="sortMethod" value="<?=$method?>">
			<input type="hidden" name="dir" value="<?=$direction?>">
			<input type="hidden" name="gid" value="<?=$gid?>">

			<td>Ship:
			<select name="ship">
				<option <? if ($ship == "") print "selected";?> value="">All ships</option>
				<option <? if ($ship == "WB") print "selected";?> value="WB">Warbird</option>
				<option <? if ($ship == "JV") print "selected";?> value="JV">Javelin</option>
				<option <? if ($ship == "SP") print "selected";?> value="SP">Spider</option>
				<option <? if ($ship == "LV") print "selected";?> value="LV">Leviathan</option>
				<option <? if ($ship == "TR") print "selected";?> value="TR">Terrier</option>
				<option <? if ($ship == "WS") print "selected";?> value="WS">Weasel</option>
				<option <? if ($ship == "LC") print "selected";?> value="LC">Lancaster</option>
				<option <? if ($ship == "SR") print "selected";?> value="SR">Shark</option>
			</select></td>

			<td><input type="submit" value="Update"></td>
		</form>
		</tr>
		</table>

		<br><br>

		<table border=0 width="100%">
		<tr>
		<td class=orange><b>Name <a href="<?=$tscript?>?sortMethod=name&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "name", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=name&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "name", $direction, "des")?></a></td>
		<td class=orange><b>Sqd <a href="<?=$tscript?>?sortMethod=squad&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "squad", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=squad&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "squad", $direction, "des")?></a></td>
		<td class=orange><b>Kills <a href="<?=$tscript?>?sortMethod=kills&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "kills", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=kills&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "kills", $direction, "des")?></a></td>
		<td class=orange><b>TKills <a href="<?=$tscript?>?sortMethod=tkills&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "tkills", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=tkills&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "tkills", $direction, "des")?></a></td>
		<td class=orange><b>Deaths <a href="<?=$tscript?>?sortMethod=deaths&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "deaths", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=deaths&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "deaths", $direction, "des")?></a></td>
		<td class=orange><b>AvPing <a href="<?=$tscript?>?sortMethod=ping&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "ping", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=ping&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "ship", $direction, "des")?></a></td>
		<td class=orange><b>Time plyd <a href="<?=$tscript?>?sortMethod=time&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "time", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=time&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "time", $direction, "des")?></a></td>
		<td class=orange><b>Bombs hit <a href="<?=$tscript?>?sortMethod=bhit&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "bhit", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=bhit&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "bhit", $direction, "des")?></a></td>
		<td class=orange><b>Bullets hit <a href="<?=$tscript?>?sortMethod=blhit&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "blhit", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=blhit&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "blhit", $direction, "des")?></a></td>
		<td class=orange><b>Thors hit <a href="<?=$tscript?>?sortMethod=thit&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "thit", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=thit&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "thit", $direction, "des")?></a></td>
		<td class=orange><b>Dmg dealt <a href="<?=$tscript?>?sortMethod=dd&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "dd", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=dd&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "dd", $direction, "des")?></a></td>
		<td class=orange><b>Games plyd <a href="<?=$tscript?>?sortMethod=gp&ship=<?=$ship?>&dir=asc&lim=<?=$limit?>"><?=$db->printArrow("up", $method, "gp", $direction, "asc")?></a> <a href="<?=$tscript?>?sortMethod=gp&ship=<?=$ship?>&dir=des&lim=<?=$limit?>"><?=$db->printArrow("down", $method, "gp", $direction, "des")?></a></td>
		</tr>
		<?

		while ($player = mysql_fetch_object($list))
		{

			if ($ship == "")
			{
				$time = $db->parseSeconds($player->TimePlayed_WB + $player->TimePlayed_JV + $player->TimePlayed_SP + $player->TimePlayed_LV + $player->TimePlayed_TR + $player->TimePlayed_WS + $player->TimePlayed_LC + $player->TimePlayed_SR);
				$bhit = $player->BombsHitEnemy_WB + $player->BombsHitEnemy_JV + $player->BombsHitEnemy_SP + $player->BombsHitEnemy_LV + $player->BombsHitEnemy_TR + $player->BombsHitEnemy_WS + $player->BombsHitEnemy_LC + $player->BombsHitEnemy_SR;
				$blhit = $player->BulletsHitEnemy_WB + $player->BulletsHitEnemy_JV + $player->BulletsHitEnemy_SP + $player->BulletsHitEnemy_LV + $player->BulletsHitEnemy_TR + $player->BulletsHitEnemy_WS + $player->BulletsHitEnemy_LC + $player->BulletsHitEnemy_SR;
				$thit = $player->ThorsHitEnemy_WB + $player->ThorsHitEnemy_JV + $player->ThorsHitEnemy_SP + $player->ThorsHitEnemy_LV + $player->ThorsHitEnemy_TR + $player->ThorsHitEnemy_WS + $player->ThorsHitEnemy_LC + $player->ThorsHitEnemy_SR;
				$kills = $player->PlayerKills_WB + $player->PlayerKills_JV + $player->PlayerKills_SP + $player->PlayerKills_LV + $player->PlayerKills_TR + $player->PlayerKills_WS + $player->PlayerKills_LC + $player->PlayerKills_SR;
				$tkills = $player->PlayerTeamKills_WB + $player->PlayerTeamKills_JV + $player->PlayerTeamKills_SP + $player->PlayerTeamKills_LV + $player->PlayerTeamKills_TR + $player->PlayerTeamKills_WS + $player->PlayerTeamKills_LC + $player->PlayerTeamKills_SR;
				$deaths = $player->PlayerDeaths_WB + $player->PlayerDeaths_JV + $player->PlayerDeaths_SP + $player->PlayerDeaths_LV + $player->PlayerDeaths_TR + $player->PlayerDeaths_WS + $player->PlayerDeaths_LC + $player->PlayerDeaths_SR;
				$damage = $player->DamageDealt_WB + $player->DamageDealt_JV + $player->DamageDealt_SP + $player->DamageDealt_LV + $player->DamageDealt_TR + $player->DamageDealt_WS + $player->DamageDealt_LC + $player->DamageDealt_SR;
			}
			else
			{
				$query = "SELECT TimePlayed_$ship AS TimePlayed, BombsHitEnemy_$ship AS BombsHitEnemy, BulletsHitEnemy_$ship AS BulletsHitEnemy,
					ThorsHitEnemy_$ship AS ThorsHitEnemy, PlayerKills_$ship AS PlayerKills, PlayerTeamKills_$ship AS PlayerTeamKills, PlayerDeaths_$ship AS PlayerDeaths, DamageDealt_$ship as DamageDealt
					FROM leagueseason4.playerstats WHERE Player_ID = '$player->Player_ID'";
				$data = mysql_fetch_object($db->query($query));

				$time = $db->parseSeconds($data->TimePlayed);
				$bhit = $data->BombsHitEnemy;
				$blhit = $data->BulletsHitEnemy;
				$thit = $data->ThorsHitEnemy;
				$kills = $data->PlayerKills;
				$tkills = $data->PlayerTeamKills;
				$deaths = $data->PlayerDeaths;
				$damage = $data->DamageDealt;
			}

			$path = "http://mecbot.t3g.org/leaguebanners/$player->Player_ID.png";
			print "<tr><td>";
			if ($player->NewBanner == 2 || $player->NewBanner == 1)
				print "<img src='$path' alt=''>  ";
			print "<a href='listplayer.php?pid=$player->Player_ID' class='nonbold'>$player->PlayerName</a></td>";
			print "<td><a href='listsquad.php?sid=$player->Squad_ID' class='nonbold'>$player->SquadName</a></td><td>$kills</td><td>$tkills</td><td>$deaths</td>";
			print "<td>$player->PingAverage ms</td><td>$time s</td><td>$bhit</td><td>$blhit</td><td>$thit</td><td>$damage</td><td>$player->GamesPlayed</td></tr>";
		}
		print "</tr></table>\n";

	}



	function printPlayerList($db)
	{
		$query = "SELECT * FROM leaguecommon.players ORDER BY Name";
		$list = $db->query($query);

		?><table border=0 width="60%">
		<tr>
		<td>Player Name</td><td>Squad</td>
		</tr>
		<?

		while ($player = mysql_fetch_object($list))
		{
			$sid = $player->SquadID;
			$pid = $player->ID;

			$query = "SELECT * FROM leaguecommon.squads WHERE ID = $sid";
			$sqd = mysql_fetch_object($db->query($query));

			print "<tr><td><a href='statslistplayer.php?pid=$player->ID'>$player->Name</a></td>\n";
			print "<td>$sqd->Name</td></tr>\n";

		}
		print "</tr></table>\n";
	}

	function printSquadList($db)
	{
		$query = "SELECT * FROM leaguecommon.squads ORDER BY SquadName";
		$list = $db->query($query);

		?><table border=0 width="60%">
		<tr>
		<td>Player Name</td><td>Squad</td>
		</tr>
		<?

		while ($squad = mysql_fetch_object($list))
		{
			$sid = $squad->ID;

			print "<tr><td><a href='statslistsquad.php?sid=$sids'>$squad->Name</a></td>\n";
			print "<td>$sqd->Name</td></tr>\n";

		}
		print "</tr></table>\n";
	}
}