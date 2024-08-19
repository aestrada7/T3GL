<script language="JavaScript" src="common/common.js"></script>
		  <table align="center" cellspacing="0" cellpadding="0" border="0" width="60px">
		    <tr height="128px" valign="top">
			  <td style="background-image:url(images/ButtonsBackground.png);">
			    <p align="center">
			       <? if($_SESSION['User']=="") { ?>
				  <a href="javascript:doSubmit('reg');"><img src="images/LoginBtn.png" border="0" name="loginimg" id="loginimg" onMouseOver="MM_swapImage('loginimg','','images/LoginBtn_RollOver.png',1);" onMouseOut="MM_swapImgRestore();"></a><br>
				  <a href="register.php"><img src="images/RegisterBtn.png" border="0" name="regimg" id="regimg" onMouseOver="MM_swapImage('regimg','','images/RegisterBtn_RollOver.png',1);" onMouseOut="MM_swapImgRestore();"></a>	  
                               <? } else { ?>
				  <a href="logout.php"><img src="images/LogoutBtn.png" border="0" name="logoutimg" id="logoutimg" onMouseOver="MM_swapImage('logoutimg','images/LogoutBtn_RollOver.png',1);" onMouseOut="MM_swapImgRestore();"></a><br>
			       <? } ?>
				</p>
			  </td>
			</tr>
		  </table>