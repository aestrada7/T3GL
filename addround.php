<? session_start(); 

$lid = $_SESSION['LgId'];

?> 
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body>
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>" + " :: Add Rounds";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Rounds</p>
	  <p style="margin-left:10px;">
              <form name="addround" action="addround.php" method="post">
              Round Number:
		   <select name="round">
		   <?
		      for($i=0;$i<=20;$i++) {
	           ?><option value="<? echo($i); ?>"><? echo($i); ?></option>
	           <? } ?>
                   </select><br>
	      Round Type:
		   <select name="type">
		   <?
		      for($i=0;$i<=2;$i++) {
		        if($i==0) { $roundtype="Preseason"; }
			if($i==1) { $roundtype="Regular Season"; }
			if($i==2) { $roundtype="Playoffs"; }
		   ?><option value="<? echo($i); ?>"><? echo($roundtype); ?></option>
                   <? } ?>
		   </select><br><br>
	      Start Date:
		   <select name="month">
		   <?
		      for($i=1;$i<=12;$i++) {
			 if($i==1) { $mon="January"; }
			 if($i==2) { $mon="February"; }
	     	         if($i==3) { $mon="March"; }
			 if($i==4) { $mon="April"; }
			 if($i==5) { $mon="May"; }
			 if($i==6) { $mon="June"; }
			 if($i==7) { $mon="July"; }
			 if($i==8) { $mon="August"; }
			 if($i==9) { $mon="September"; }
			 if($i==10) { $mon="October"; }
			 if($i==11) { $mon="November"; }
			 if($i==12) { $mon="December"; }
		   ?><option value="<? echo($i); ?>"><? echo($mon); ?></option>
                   <? } ?>
		   </select>
		   <select name="day">
		   <?
		      for($i=1;$i<=31;$i++) {
		   ?><option value="<? echo($i); ?>"><? echo($i); ?></option>
		   <? } ?>
		   </select>
		   <select name="year">
		   <?
		      for($i=2006;$i<=2012;$i++) {
	           ?><option value="<? echo($i); ?>"><? echo($i); ?></option>
		   <? } ?>
		   </select><br>
                   <input type="submit" value="Submit"></input>
                   </form>
                   <?
                	   $roundno = mysql_escape_string($_POST["round"]);
			   $rtype = mysql_escape_string($_POST["type"]);
			   $mth = mysql_escape_string($_POST["month"]) + 0;
			   $day = mysql_escape_string($_POST["day"]) + 0;
			   $yar = mysql_escape_string($_POST["year"]) + 0;
			   $sdate = mktime(0,0,0,$mth,$day,$yar);
			   $dateok = checkdate($mth,$day,$yar);
			   $foo = getdate($sdate);
			   $actualday = $foo[weekday];
			   if($actualday!="Saturday") {
			       $onsat=false;
			   } else {
			       $onsat=true;
			   }
                           if (($roundno!="")&&($rtype!="")&&($dateok)&&($onsat)) {
			       $sql = "INSERT INTO rounds VALUES('$roundno', '$lid', '$sdate', '$rtype')";
  			       $result = mysql_query($sql);
  			       echo("Round '$roundno' has been added.");
 			       $goTo .= "<script language=\"JavaScript\"><!--
					 window.location = './addround2.php?round=$roundno
					 //--></script>";
			       print $goTo;
                           } else {
			       echo("Please select every single option fgt. OR your date was incorrect LOSER :D. OR it was NOT a Saturday...");
			   }
                   ?>
	  </p>
	</td>
	<td>
	  <? include ($_['DOCUMENT_ROOT'] . 'logside.php'); ?>
	</td>
      </tr>
	<? include ($_['DOCUMENT_ROOT'] . 'bottom.php'); ?>
    </table>
</body>
</html>