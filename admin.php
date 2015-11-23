<?php
session_start();
if(isset($_POST['connexion']))
{
	if(($_POST['login']=='ely')&&($_POST['mdp']=='ely'))
		{
		$_SESSION['login']='ely';
		$_SESSION['mdp']='ely';
		header("Location:AcceuilAdmin.html");
		}
	else
		{
		$erreur="Votre login ou votre mot de passe est incorrect";
		}
}
?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
</head>

<body id="page5">

	<div class="tall_top">
		<div id="main">
			<div id="left_side">
				<div class="indent">
					<img class="title" alt="" src="images/5_t1.gif" /><br />
					<strong class="txt1">Thesaurus</strong>
					<p>blalblabla </p>
					<strong class="txt1">Concept</strong>
			        <p>blabal........r.</p>
					<strong class="txt1">Descripteur vedette</strong>
					<p>Blabla ....</p>
					<p>.</p>
			  </div>
			</div>
			<div id="right_side">
				<div class="wrapper">
					<div id="header">
						<div class="row_1">
							<div class="fleft">
								<a href="#"><img alt="" src="images/logo.gif" /></a>
							</div>
							<div class="fright">
								<div class="indent">
									<a href="index.html"><img alt="" src="images/header_link1.gif" /></a><a href="#"><img alt="" src="images/header_link2.gif" /></a>
								</div>
							</div>
						</div>
						<div class="row_2">
							<div class="left">
								<div class="right">
									<div class="indent">
										<a href="index.html"><img alt="" src="images/but_1.jpg" /></a><img alt="" src="images/spacer.gif" width="11" height="1" /><img alt="" src="images/header_sep.jpg" /><img alt="" src="images/spacer.gif" width="8" height="1" /><a href="index-1.html"><img alt="" src="images/but_2.jpg" /></a><img alt="" src="images/spacer.gif" width="8" height="1" /><img alt="" src="images/header_sep.jpg" /><img alt="" src="images/spacer.gif" width="8" height="1" /><a href="index-2.html"><img alt="" src="images/but_3.jpg" /></a><img alt="" src="images/spacer.gif" width="8" height="1" /><img alt="" src="images/header_sep.jpg" /><img alt="" src="images/spacer.gif" width="8" height="1" /><a href="index-3.html"><img alt="" src="images/but_4.jpg" /></a><img alt="" src="images/spacer.gif" width="8" height="1" /><img alt="" src="images/header_sep.jpg" /><img alt="" src="images/spacer.gif" width="10" height="1" /><a href="index-4.html"><img alt="" src="images/but_5.jpg" /></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="content">
						<div class="row_1" style="width:100%;">
							<div class="col_1">
								<div class="indent">
									<div class="block">
										<div class="l_t">
											<div class="r_t">
												<div class="r_b">
													<div class="l_b">
														<div class="ind">
															<div class="line_hor1">
														    <img alt="" src="images/5_t2.gif" />
														    <h3 align="center">Identifier vous si vous etes  l'Administrateur</h3></div>
															<div class="indent1">
															  <div style="padding-top:6px;">
															    <form action="" method="post" enctype="multipart/form-data" id="form1">
															      <table width="624" border="0" align="center">
                                                                  <?php  if(isset($erreur))  echo "<h2>".$erreur."</h2>";  ?>
															        <tr>
															          <td width="240" height="38"><h3> login :</h3></td>
															          <td width="374"><input type="text" name="login" id="login" /></td>
														            </tr>
															        <tr>
															          <td><h3>Mot de passe :</h3></td>
															          <td><input type="password" name="mdp" id="mdp" /></td>
														            </tr>
															        <tr>
															          <td height="67" colspan="2"><div align="center"><input type="submit" name="connexion" id="connexion" value="Conexion" /></div></td>
														            </tr>
														          </table>
															    </form>
                                </div>
																<div class="clear"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="indent2"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div id="footer">
			<div class="fleft">
				<div class="indent">Copyrights&copy; 2012&nbsp; |&nbsp;Dermo--Melissa-Amal-Mohamed-Pierre-Eric-Yassine-Malick</div>
			</div>
			<div class="fright">
				<div class="indent"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>