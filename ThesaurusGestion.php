<?php
session_start();
//---Deconnexion
if(isset($_GET['logout']))
{
unset($_SESSION['login']);
unset($_SESSION['mdp']);
}
//----Verification login
if(!isset($_SESSION['login']))
{
header("Location:../admin.php");
}
?>
<?php
require_once("../connexion.php");
//----Requete suppression
if(isset($_GET['supp']))
{
$requete2="DELETE FROM concept WHERE referenceconcept='".$_GET['reference']."' ";
mysql_query($requete2);
}
//----Requete liste
$requete="SELECT *  FROM concept ";
$resultat=mysql_query($requete);
?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<link href="TwoColumns.css" rel="stylesheet" type="text/css" />
</head>

<body id="page3">
<div class="tall_top">
<div id="main">
<div id="left_side">
<div class="indent"><br />
<div class="Menu" align="left" id="navigation">
<table>
<tr class="menu">
<td><a href="Cdocument.php">Ajouter un Concept</a></td>
</tr>
<tr class="menu">
<td><a href="ThesaurusGestion.php?logout=ok">Déconnecté</a></td>
</tr>


</table>
</div>
<p>&nbsp;</p>
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
							<img alt="" src="images/3_t2.gif" style="margin-left:-5px;"/>
						</div>
<div class="indent1">
<table width="600" border="1" cellspacing="0" cellpadding="5">
<tr>
<td>Libellé concept</td>
<td>Modifier concept</td>
<td>Supprimer concept</td>
</tr>
<?php while($aconcepts=mysql_fetch_array($resultat))  { ?>
<tr>
<td><?php echo $concepts['reference']; ?></td>
<td><a href="modifierconcept.php?reference=<?php echo $concepts['reference']; ?>" >Modifier</a></td>
<td><a href="ThesaurusFestion.php?reference=<?php echo $concepts['reference']; ?>&supp=ok" >Supprimer</a></td>
</tr>
<?php } ?>
</table>
</div>
					  <p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
<div class="indent">Copyrights&copy; 2012&nbsp; |&nbsp;Dermo--Melissa-Amal-Mohamed-Pierre-Eric-Yassine-Malick</div></div><div class="fright">
<div class="indent"></div>
</div>
<div class="clear"></div>
</div>
</div>
</body>
</html>
