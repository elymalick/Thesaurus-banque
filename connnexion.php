<?php
class Database{

   public function connexion(){
       $link = mysql_connect('localhost','root','') or die('Impossible de se connecter au serveur de base de données !');
	   mysql_select_db('projet') or die('Impossible de selectionner la base de données !');
	   return $link;
   }
   
   public function ExecuteSQL($sql, $link){
       $result = mysql_query($sql,$link) or die(mysql_error());
	   return $result;
   }
   
   public function FetchLigne($result){
      return mysql_fetch_array($result);
   }
   
   public function FermerConnexion(){
      mysql_close();
   }
   
}
?>
