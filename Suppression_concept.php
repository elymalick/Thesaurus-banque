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
				<h3><center>Suppression</center></h3>

<?php
include("connexion_bd.php");
$stid = oci_parse($oci_conn, 'SELECT LEBILEC FROM CONCEPT');
oci_execute($stid, OCI_DEFAULT);

?>
<form action="Suppression_concept.php" method="POST" name="choix_suppr_concept">
<?php

while (($row = oci_fetch_object($stid))) {
$libelle = $row->LEBILEC;
echo  "<input  type=\"checkbox\" name=\"choix_concept[]\" value=\"$libelle\" />".$row->LEBILEC."<br>\n";
}
?>
<br />
<input type="submit" value="Supprimer" name="supprimer"/>
</form>

<?php
if (isset($_POST['supprimer']) && $_POST['supprimer'] == 'Supprimer') {
$tabConcept = (isset ($_POST['choix_concept']))?$_POST['choix_concept']:null;
if (!empty ($tabConcept)) {
for($concept=0;$concept<sizeof($tabConcept);$concept++){
//suppression des concepts coché :
// il faut supprimer vedette et terme qui correspondent à ce concept

// suppression du terme vedette
// DELETE FROM Vedette WHERE REFCONCEPT=(select ref(i) from Concept i where i.LEBILEC = le concept à supprimer);
$stid = oci_parse($oci_conn, 'DELETE FROM Vedette WHERE REFCONCEPT=(select ref(i) from Concept i where i.LEBILEC=\''.$tabConcept[$concept].'\')');
//oci_execute($stid, OCI_DEFAULT);
$r = oci_execute($stid, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);	
}

// suppression du terme
//DELETE FROM Terme WHERE REFCONCEPT=(select ref(i) from Concept i where i.LEBILEC = le concept à supprimer);
$stid = oci_parse($oci_conn, 'DELETE FROM Terme WHERE REFCONCEPT=(select ref(i) from Concept i where i.LEBILEC=\''.$tabConcept[$concept].'\')');
$r = oci_execute($stid, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);	
}

//suppression du concept
//DELETE FROM Concept WHERE LEBILEC= le concept à supprimer;
$stid = oci_parse($oci_conn, 'DELETE FROM Concept WHERE LEBILEC=\''.$tabConcept[$concept].'\'');
$r = oci_execute($stid, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);	
echo "La suppression du concept ".$tabConcept[$concept]." a bien été effectué <br />";
echo "<a href=\"Suppression.html\">Retour à la page d'accueil</a><br />";
}				
}
}
}
?>
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
