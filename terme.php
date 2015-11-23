<?php
    
    require_once('connexion_bd.php');
	
	extract($_POST);
	if($terme == ""){
	   echo 'Vous n\'avez pas indiquer le libelle du terme !';
		 header("Location:ErrorPage.php");
		 exit();
	}
	
	if($definition == ""){
	     echo 'Vous n\'avez pas indiquer la definition';
		 header("Location:ErrorPage.php");
		 exit();
	}
	
	if($concept== ""){
	     echo 'Vous n\'avez pas indiquer le conept ';
		 header("Location:ErrorPage.php");
		 exit();
	}
	$stid_up=oci_parse($oci_conn, "insert into Terme values('".$terme."',
		           '".$definition."',
			    NULL,
			    (select ref(i) from Concept i where i.LEBILEC='".$concept."'),
			    collection_terme())");
	
	$r = oci_execute($stid_up, OCI_NO_AUTO_COMMIT);
	if (!$r) {    
			$e = oci_error($stid_up);
			oci_rollback($oci_conn);  
		}else{
			oci_commit($oci_conn);
			header("Location:Confirmation.php?type=ter");
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