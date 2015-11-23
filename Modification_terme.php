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
					<h3><center>Modification Terme</center></h3>

<?php
include("connexion_bd.php");

$stid = oci_parse($oci_conn, 'SELECT LEBILET, DEFINITION FROM TERME');
oci_execute($stid, OCI_DEFAULT);

?>
<form action="Modification_terme.php" method="POST" name="choix_modif_terme">
<?php

while (($row = oci_fetch_object($stid))) {
$libelle = $row->LEBILET;
$definition = $row->DEFINITION;	
echo "<input name=\"terme\" type=\"radio\" value=\"$libelle\" />".$libelle."\n";
echo  "<input name=\"definition\" type=\"text\" size=\"30\" value=\"".$definition."\" /><br />";
}
?>

<input type="submit" value="Modifier" name="modifier"/>
</form>

<?php
if (isset($_POST['modifier']) && $_POST['modifier'] == 'Modifier') {
?>
<form action="Modifier_terme.php" method="POST" name="modiifer_terme">
<?php
echo "<table>";
echo "<tr>";
echo "<td><label>libelle</label><br /></td>";
//echo "<td><textarea name=\"libelle_terme\" cols=\"10\" rows=\"3\">".$_POST['terme']."</textarea></td>";
echo "<td><input type=\"text\" name=\"libelle_terme\" cols=\"10\" rows=\"3\" value=\"".$_POST['terme']."\"></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label>Definition</label><br /></td>";
$stid = oci_parse ($oci_conn, 'SELECT LEBILET, DEFINITION FROM TERME WHERE LEBILET=\''.$_POST['terme'].'\'');
oci_execute($stid, OCI_DEFAULT);
while (($row = oci_fetch_object($stid))) {
$definition = $row->DEFINITION;
echo "<td><textarea name=\"definition_terme\" cols=\"30\" rows=\"5\">".$definition."</textarea></td>";
echo "<input name=\"ancienne_def\" type=\"hidden\" value=\"".$definition."\" />";
}
echo "</tr>";
echo "</table>";

// termes spécialisant
$stid = oci_parse ($oci_conn, 'SELECT LEBILET, DEFINITION FROM TERME');
oci_execute($stid, OCI_DEFAULT);	
echo "<label>Termes spécialisant :</label><br />";
while (($row = oci_fetch_object($stid))) {
$libelle = $row->LEBILET;
$definition = $row->DEFINITION;
echo  "<input  type=\"checkbox\" name=\"modif_terme[]\" value=\"$libelle\" />".$row->LEBILET."\n";
echo  "<input name=\"definition\" type=\"text\" size=\"30\" value=\"$definition\" /><br />";
}
echo "<br />";
echo "<input name=\"ancien_terme\" type=\"hidden\" value=\"".$_POST['terme']."\" />";



// termes généralisant
$stid = oci_parse ($oci_conn, 'SELECT LEBILET, DEFINITION FROM TERME');
oci_execute($stid, OCI_DEFAULT);
echo "<label>Termes généralisant :</label><br />";
echo "<select name=\"generalisant\">";
while (($row = oci_fetch_object($stid))) {
$libelle = $row->LEBILET;
$definition = $row->DEFINITION;
echo "<option value=\"$libelle\"\>".$libelle."</option>";
}
echo "</select><br /><br />";
?>
<input type="submit" value="Modifier" name="modif"/>
</form>
<?php

}
?>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
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
