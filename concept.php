<?php
    
    require_once('connexion_bd.php');
	
	extract($_POST);
	if($concept == ""){
	   echo 'Vous n\'avez pas indiquer le libelle du concept !';
		 header("Location:ErrorPage.php");
		 exit();
	}
	
	$stid_up=oci_parse($oci_conn,"insert into Concept values('$concept')");
		        
	$r = oci_execute($stid_up, OCI_NO_AUTO_COMMIT);
	if (!$r) {    
			$e = oci_error($stid_up);
			oci_rollback($oci_conn);  
		}else{
			oci_commit($oci_conn);
			header("Location:Confirmation.php?type=cpt");
		}
	

	/*
	$sqlInsertvedtte = "insert into Vedette (titre, dateedit,numedit,numrayon,prix,nbexp,typedoc) 
	                    values('".$libelle."','$dateedit','$editeur','$rayon','$prix','$nbexp','$typedoc')";
	$sqlGetIdDocumentInserre = "select LAST_INSERT_ID() from document limit 1";
	
	
	$result = $db->ExecuteSQL($sqlInsertdocument, $link);
	$dernierIdDocumentInserre = $db->ExecuteSQL($sqlGetIdDocumentInserre, $link);
	$ligne = $db->FetchLigne($dernierIdDocumentInserre);
	$sqlInsertecritpar = "insert into ecritpar (naut, ndoc) values('$auteur','".$ligne[0]."')";
	$result2 = $db->ExecuteSQL($sqlInsertecritpar, $link);
	header("Location:Confirmation.php?type=doc");*/
    
	
?>