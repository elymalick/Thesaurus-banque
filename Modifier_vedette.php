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
<h3><center>Modification Vedette</center></h3>

<?php
include("connexion_bd.php");


if (isset($_POST['modif']) && $_POST['modif'] == 'Modifier') {

// j'insère les termes choisi dans la table synonyme
$tabTerme = (isset ($_POST['modif_vedette']))?$_POST['modif_vedette']:null;
if (!empty ($tabTerme)) {
for($terme=0;$terme<sizeof($tabTerme);$terme++){
//echo $tabTerme[$terme];
//je récupère la définition de ce terme
$stid = oci_parse ($oci_conn, 'SELECT LEBILET, DEFINITION FROM TERME WHERE LEBILET=\''.$tabTerme[$terme].'\'');
oci_execute($stid, OCI_DEFAULT);
while (($row = oci_fetch_object($stid))) {
$definition = $row->DEFINITION;
//echo $definition;
// insertion si ils n'existent pas dans la table
$stid_verif = oci_parse ($oci_conn, 'SELECT LEBILET FROM SYNONYME WHERE LEBILET=\''.$tabTerme[$terme].'\'');
oci_execute($stid_verif, OCI_DEFAULT);
if (!oci_fetch($stid_verif)) {
$stid_def = oci_parse($oci_conn, 'INSERT INTO SYNONYME VALUES (synonyme_type(\''.$tabTerme[$terme].'\',\''.$definition.'\',NULL,NULL,NULL))');
$r = oci_execute($stid_def, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid_def);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);	
}
}

}
}
}

// sur l'ancienne vedette
// Je vide la table collection synonyme pour la reremplir
//echo $_POST['libelle_vedette'];
$stid_sup = oci_parse ($oci_conn, 'DELETE TABLE (SELECT COLLSYNONYME FROM VEDETTE WHERE LEBILET=\''.$_POST['ancienne_vedette'].'\')');
$r = oci_execute($stid_sup, OCI_DEFAULT);
if (!$r) {    
$e = oci_error($stid_sup);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);	
}

// Je ré insère les synonyme cocher dans la collection synonyme
for($terme=0;$terme<sizeof($tabTerme);$terme++){
$stid_ins = oci_parse ($oci_conn, 'INSERT INTO TABLE (SELECT COLLSYNONYME  FROM VEDETTE WHERE LEBILET=\''.$_POST['ancienne_vedette'].'\') VALUES ((SELECT ref(s) FROM SYNONYME s WHERE LEBILET=\''.$tabTerme[$terme].'\'))');
$r = oci_execute($stid_ins, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid_ins);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);
}
}

// J'insére les termes spécialisant dans la collection Collterme
$tabTerme = (isset ($_POST['modif_vedette_spe']))?$_POST['modif_vedette_spe']:null;
// je vide d'abord la collection
$stid_sup = oci_parse ($oci_conn, 'DELETE TABLE (SELECT COLLTERME FROM VEDETTE WHERE LEBILET=\''.$_POST['ancienne_vedette'].'\')');
$r = oci_execute($stid_sup, OCI_DEFAULT);
if (!$r) {    
$e = oci_error($stid_sup);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);	
}

// Je ré insère les termes spécialisant cocher dans la collection Collterme
for($terme=0;$terme<sizeof($tabTerme);$terme++){
$stid_ins = oci_parse ($oci_conn, 'INSERT INTO TABLE (SELECT COLLTERME FROM VEDETTE WHERE LEBILET=\''.$_POST['ancienne_vedette'].'\') VALUES ((SELECT ref(t) FROM TERME t WHERE LEBILET=\''.$tabTerme[$terme].'\'))');
$r = oci_execute($stid_ins, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid_ins);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);
}
}

//Je modifie le terme généralisant
$stid_ins = oci_parse ($oci_conn, 'UPDATE VEDETTE SET REFTERME=(SELECT REF(t) FROM TERME t WHERE LEBILET=\''.$_POST['generalisant'].'\') WHERE LEBILET=\''.$_POST['ancien_terme'].'\'');
$r = oci_execute($stid_ins, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid_ins);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);
}

// Je change la valeur de la définition si besoin
if($_POST['ancienne_def'] != $_POST['definition_vedette']){
$stid_up = oci_parse ($oci_conn, 'UPDATE VEDETTE SET DEFINITION=\''.$_POST['definition_vedette'].'\' WHERE LEBILET=\''.$_POST['ancienne_vedette'].'\' ');
$r = oci_execute($stid_up, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid_up);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);
}
}

// Je change la valeur du libelle  si besoin
if($_POST['ancienne_vedette'] != $_POST['libelle_vedette']){
$stid_up = oci_parse ($oci_conn, 'UPDATE VEDETTE SET LEBILET = \''.$_POST['libelle_vedette'].'\' WHERE LEBILET =  \''.$_POST['ancienne_vedette'].'\' ');
$r = oci_execute($stid_up, OCI_NO_AUTO_COMMIT);
if (!$r) {    
$e = oci_error($stid_up);
oci_rollback($oci_conn);  
}else{
oci_commit($oci_conn);
}
}

// Confirmation
echo "Le terme vedette ".$_POST['libelle_vedette']." (anciennement ".$_POST['ancienne_vedette'].") a bien été modifier<br />";
echo "<a href=\"Modification.html\">Retour à la page d'accueil</a><br />";


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
