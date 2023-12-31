<?php
$code=$_POST["code"];
$cin=$_POST["cin"];
$duree=$_POST["duree"];
mysql_connect("localhost","root","");
mysql_select_db("bdbac2023");
$req=mysql_query("SELECT * FROM reservation WHERE code='".$code."' AND cin='".$cin."'");
if(mysql_num_rows($req)==1){
    echo "Erreur : habit inexistant";
    }else{
//         afficher le message "Erreur : habit déjà loué" dans le cas où l’habit identifié par le code
// saisi, existe dans la base avec la valeur "N" pour le champ "disponible"
$res=mysql_fetch_object($req);
if ($res->dispo=="N") {
    echo "Erreur : habit déjà loué";
} else {
    $sql="UPDATE reservation SET dispo='N', duree='".$duree."' WHERE code='".$code."'
    AND cin='".$cin."'";
    if (mysql_query($sql)) {
        // si la requête est exécutée correctement on affiche un message de confirmation
        echo "<p>La réservation à été prise en compte.</p>";
        } else {
//             afficher le message "Erreur : client inexistant" dans le cas où le client identifié par le
// numéro du Cin saisi, n’existe pas dans la base
$errormsg = "Erreur : impossible de mettre à jour la base de données. ";
echo $errormsg . mysql_error();
// insérer les données relatives à la location de l’habit, tout en modifiant le champ
// "disponible" de l’habit loué par "N", puis d’afficher le message "Location effectuée avec
// succès"  Le champ "dateLoc" aura comme valeur la date courante.
$todayis=getdate();
$jour=$todayis[mday];
$mois=$todayis[mon]-1;
$annee=$todayis[year];
$datedeb="$jour/$mois/$annee";
$sql2="INSERT INTO historique VALUES('','".$_SESSION['id']."','".$code."','".$cin."','N','".$datedeb."')";
if (!mysql_query($sql2)) {die ("Erreur d'insertion de données : " . mysql_error());
    } else {$nbhist=mysql_insert_id();
    }
    }
    }
    }
?>


?>