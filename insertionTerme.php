<?php
require_once("connexion_bd.php");

//$connect = ocilogon("","",$chaine_hote);
/*if(isset($_POST['ajouter']))
$requete="insert into Vedette values('automobile',
		           'Qui se meut par soi-meme grace a un moteur',
			    NULL,
			    (select ref(i) from Concept i where i.libelleC='automobile'),
			    collection_terme(),
			    collection_synonyme())";*/

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
														  <p>&nbsp;</p>
														  <form id="form1" method="post" action="terme.php">
														    <table width="377">
														      <tr>
														        <td colspan="2" class="form_texte"><h3 align="center">Inserer un Terme</h3></td>
													          </tr>
														      <tr>
														        <td class="form_texte">&nbsp;</td>
														        <td>&nbsp;</td>
													          </tr>
														      <tr>
														        <td width="115" class="form_texte">Libelle Terme : </td>
														        <td width="250"><input name="terme" type="text" class="form_champ" id="typedoc" /></td>
													          </tr>
														      <tr>
														        <td height="31"><span class="form_texte">Definition  : </span></td>
														        <!--<td><input name="definition" type="text" class="form_champ" id="typedoc2" /></td>-->
                                                                <td><textarea name="definition" type="text" class="form_champ" id="typedoc2" ></textarea></td>
													          </tr>
														      <tr>
														        <td height="18" class="form_texte">Concept : </td>
														        <td><select name="concept" class="form_champ" id="concept">
														          
														         													          <?php
		$NomConcept = ociparse($oci_conn,"SELECT LEBILEC FROM CONCEPT");
			//echo "<select name='ts' id='ts'>";	
			ociexecute($NomConcept,OCI_DEFAULT);
			
							            //while(ocifetch($NomConcept)){
											while(($row = oci_fetch_object($NomConcept))){
											//echo "<option value=''> ".ociresult($NomConcept,1)." </option>";
												echo "<option value='".$row->LEBILEC."'>".$row->LEBILEC."</option>";
												echo ociresult($NomConcept,1);
											}
											echo "</select>";		
										ocilogoff($oci_conn);
										
?>
														          </select></td>
													          </tr>
														      <tr>
														        <td>&nbsp;</td>
														        <td>&nbsp;</td>
													          </tr>
														      <tr>
														     
														        <td><input type="submit" name="Ajouter" id="Ajouter" value="Ajouter" /></td>
													          </tr>
														      <tr>
														        <td colspan="2">&nbsp;</td>
													          </tr>
													        </table>
														    <p>&nbsp;</p>
                                                          </form>
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