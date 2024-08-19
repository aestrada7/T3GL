<?php

function getCurrentRound($db, $lid) {
    $currentTime = time();
    $weekToGo = date($currentTime - 7 * 24 * 60 * 60);
    try {
        $sq = $db->query("SELECT SDate, Round FROM Rounds WHERE League_ID=" . $lid);
        $error = $db->error;

        if($error != "") throw new Exception($error);

        while($row = $sq->fetch_array()) {
            $roundDate = $row['SDate'];
            if($currentTime >= $roundDate) { //HAS TO BE <=
                if($roundDate > $weekToGo) {
                    return $row['Round'];
                } 
            } 
        }
    } catch (Exception $e) {
        return 0;
    }
}

function showMatchesForRound($db, $round, $lid, $linkTo) {
    if($linkTo != "") {
        $linkTo = "<a href='./" . $linkTo . "?gameid=";
        $linkEnd = "</a>";
    } else {
        $linkTo = "";
        $linkMid = "";
        $linkEnd = "";
    }
    
    $sq = $db->query("SELECT Game_ID, SID_A, SID_B FROM numatches WHERE League_ID=" . $lid . " AND Round=" . $round);
    echo("<ul>");
    while($row = $sq->fetch_array()) {
        echo("<li>" . $linkTo);
        if($linkTo != "") {
            $linkMid = $row['Game_ID'];
            echo($linkMid . "'>");
        }
        echo(getSquad($db, $row['SID_A']) . " Vs. " . getSquad($db, $row['SID_B']));
        echo($linkEnd . "</li>");
    }
    echo("</ul>");
}

function getSquad($db, $sid) {
    $squad = "";
    $sq = $db->query("SELECT * FROM Squads WHERE Squad_ID = '$sid'");

    while($row = $sq->fetch_array()) {
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