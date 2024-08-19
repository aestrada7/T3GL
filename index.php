<?php
    session_start();

    include($_SERVER['DOCUMENT_ROOT'] . '/common/dbconn.php');
    $lid = $defaultLeagueId;

    if(!empty($_SESSION['LgId'])) {
        $lid = $_SESSION['LgId'];
    }
?> 
<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
    <head>
        <title>T3: The Gauntlet! :: League</title>
        <link type="text/css" rel="stylesheet" href="./common/styles.css">
        <script language="JavaScript" src="common/common.js"></script>
    </head>
    <body onLoad="mm_preloadimages('images/LoginBtn_RollOver.png','images/RegisterBtn_RollOver.png');">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/logtop.php'); ?>
        <script language="JavaScript">document.title="<?php echo($utils->LeagueTitle); ?>";</script>
        <table align="center" cellspacing="0" cellpadding="0" border="0" width="821px">
            <tr valign="top">
                <td class="Menu">
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/menu.php'); ?>
                </td>
                <td class="Content">
                    <p class="title">Weekend Matches</p>
                    <p class="classicText">
                        <?php
                            try {
                                $currentRound = getCurrentRound($db, $lid);
                                if($currentRound == 0) {
                                    throw new Exception("No scheduled matches for this week.");
                                } else {
                                    echo("Matches For Round " . $currentRound);
                                    showMatchesForRound($db, $currentRound, $lid, "");
                                }
                            } catch (Exception $e) {
                                echo($e->getMessage());
                            }
                        ?>
                    </p>
                    <p class="title">News</p>
                    <p style="margin-left: 10px;">
                        <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/news.php'); ?>
                    </p>
                </td>
                <td>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/logside.php'); ?>
                </td>
            </tr>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/bottom.php'); ?>
        </table>
    </body>
</html>