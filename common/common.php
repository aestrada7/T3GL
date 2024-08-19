<?

function getCurrentRound($lid) {
  $CurrentTime = time();
  $WeekToGo = date($CurrentTime - 7*24*60*60);
  //try {
    $sq = mysql_query("SELECT SDate, Round FROM Rounds WHERE League_ID=" . $lid);
    //if(mysql_error()!="") throw new Exception(mysql_error());
    while($row=mysql_fetch_array($sq)) {
      $RoundDate=$row['SDate'];
      if($CurrentTime<=$RoundDate) {
        if($RoundDate>$WeekToGo) {
          return $row['Round'];
        } 
      } 
    }
  /*} catch (Exception $e) {
    return 0;
  }*/
}

function showMatchesForRound($round,$lid,$linkTo) {
  if($linkTo!="") {
    $linkTo="<a href='./" . $linkTo . "?gameid=";
    $linkEnd="</a>";
  } else {
    $linkTo="";
    $linkMid="";
    $linkEnd="";
  }
  $sq = mysql_query("SELECT Game_ID, SID_A, SID_B FROM numatches WHERE League_ID=" . $lid . " AND Round=" . $round);
  echo("<ul>");
  while($row=mysql_fetch_array($sq)) {
    echo("<li>" . $linkTo);
    if($linkTo!="") {
      $linkMid=$row['Game_ID'];
      echo($linkMid . "'>");
    }
    echo(getSquad($row['SID_A']) . " Vs. " . getSquad($row['SID_B']));
    echo($linkEnd . "</li>");
  }
  echo("</ul>");
}

function getSquad($sid) {
  $squad = "";
  $sq = mysql_query("SELECT * FROM league.squads WHERE Squad_ID = '$sid'");
  while($row=mysql_fetch_array($sq)) {
    return $row['SquadName'];
  }
}

function getPlayerName($pid) {
  $sq = mysql_query("SELECT * FROM league.players WHERE Player_ID = '$pid'");
  while($row=mysql_fetch_array($sq)) {
    return $row['PlayerName'];
  }
}


?>