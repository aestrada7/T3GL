<? session_start(); 
$lid = $defaultLeagueId;
$lid = $_SESSION['LgId'];
?> 
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
<title>T3: The Gauntlet! :: League</title>
<link type="text/css" rel="stylesheet" href="./common/styles.css">
<script language="JavaScript" src="common/common.js"></script>
</head>
<body onLoad="mm_preloadimages('images/LoginBtn_RollOver.png','images/RegisterBtn_RollOver.png');">
<? include ($_['DOCUMENT_ROOT'] . 'logtop.php'); ?>
<script language="JavaScript">document.title="<?echo($utils->LeagueTitle);?>";</script>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
      <tr valign="top">
        <td class="Menu">
          <? include ($_['DOCUMENT_ROOT'] . 'menu.php'); ?>
	</td>
        <td class="Content">
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weekend Matches</p>
          <p class="classicText">
          <? 
             //try {
	       $Current = getCurrentRound($lid);
	       //if($Current==0) {
                 //throw new Exception("No scheduled matches for this week.");
               //} else {
                 echo "Matches For Round " . $Current;
                 showMatchesForRound($Current,$lid,"");
               //}
	     /*} catch (Exception $e) {
	       echo $e->getMessage();
	     }*/
          ?>
          </p>
	  <p class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News</p>
	  <p style="margin-left:10px;">
	    <? include_once ($_['DOCUMENT_ROOT'] . 'news.php'); ?>
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
