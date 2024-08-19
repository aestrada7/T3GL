<?php
    $user = $_SESSION['User'];
    $showLogin = empty($user);
?> 

&nbsp;
<table align="center" cellspacing="0" cellpadding="0" border="0" width="821px" height="77px" bgcolor="#000000" style="margin-bottom:-2px">
    <tr>
        <td><img src="images/Top2.png"></td>
    </tr>
</table>
<table style="position:top center;" cellspacing="0" cellpadding="0" border="0" width="821px" height="34px" background="images/BarBackground.png" align="center">
    <tr>
        <td>
            <?php if($showLogin) : ?>
                <table width="100%">
                    <tr>
                        <td width="90%" align="right">
                            <form name="reg" action="login.php" method="post">
                                User Name: <input class="login" type="text" name="user" size="10"></input>&nbsp;
                                Password: <input class="login" type="password" name="pwd" size="10"></input>&nbsp;
                                <select name="lid">
                                    <?php $utils->getLeaguesDropBox(); ?>
                                </select>
                            </form>
                        </td>
                    </tr>
                </table>
            <?php else : ?>
                <p align="right" style="margin-right: 5px;">Welcome back, <?php echo($user); ?>.</p>
            <?php endif; ?>
        </td>
    </tr>
</table>