<?php
$des=$_POST["des"];
$categorie=$_POST["categorie"];
$taille=$_POST["taille"];
$prix=$_POST["prix"];
mysql_connect("localhost","root","");
mysql_select_db("bdbac2023");
$req=mysql_query("INSERT INTO produits VALUES('','".$des."','".$categorie."', '".$taille."','".$prix."')");
$res=mysql_query($req);
if(mysql_affected_rows()==1){
    echo "Enregistrement réalisé avec succès";
}

?>