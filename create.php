<?
include ($_['DOCUMENT.ROOT'] . 'common/dbconn.php'); 
   /*$sql = "CREATE TABLE squads(Squad_ID int(10) not null, League_ID int(11), Checkbit int(3), SquadName varchar(100), GamesPlayed int(10) unsigned, Wins int(10) unsigned, Losses int(11), Division varchar(100), Owner_ID int(10) unsigned, Coowner1_ID int(10) unsigned, Coowner2_ID int(10) unsigned)";
   $result = mysql_query($sql);
   echo('chido ya quedo una');
   $sql = "CREATE TABLE games(Game_ID int(10) not null, League_ID int(11), SquadA varchar(100), SquadB varchar(100), ScoreA int(10) unsigned, ScoreB int(10) unsigned, SDate int(10) unsigned, EDate int(10) unsigned, MVP int(11), SubGame_ID tinyint(3) unsigned)";
   $result = mysql_query($sql);
   echo('<br>y ya quedo la otra');
   $sql = "CREATE TABLE sqprocess(SqProcess_ID int(10) not null, SquadName varchar(100) not null, Player_ID int(10) unsigned not null)";
   $result = mysql_query($sql);
   $sql = "CREATE TABLE plprocess(PlProcess_ID int(10) not null, Player_ID int(10) unsigned not null, Squad_ID int(10) unsigned not null)";
   $result = mysql_query($sql);
   echo('chido ya quedo una');*/
   $sql = "CREATE TABLE Predictions(Prediction_ID int(10) not null auto_increment, Player_ID int(10), Game_ID int(10), WinSquad int(10), SquadAScore int(3), SquadBScore int(3), League_ID int(11), PointsAwarded int(3))";
   $result = mysql_query($sql);
?>