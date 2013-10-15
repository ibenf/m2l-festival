<?php

include("_debut.inc.php");
include("_gestionBase.inc.php"); 
include("_controlesEtGestionErreurs.inc.php");

// CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES festival


// connexion à MySQL

$serveur = "127.0.0.1";
$db = "festival";
$login = "root";
$pwd= "";





mysql_connect ($serveur,$login,$pwd) or die ('ERREUR '.mysql_error());

$select_db = mysql_select_db ($db) or die ('ERREUR '.mysql_error());


// AFFICHER L'ENSEMBLE DES ÉTABLISSEMENTS
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// ÉTABLISSEMENT

echo "
<div class='span7'>
 <fieldset><legend>Etablissements</legend>

<p>";
     
   $req=obtenirReqEtablissements();
   $rsEtab=mysql_query($req);
   $lgEtab=mysql_fetch_array($rsEtab);
   // BOUCLE SUR LES ÉTABLISSEMENTS
   while ($lgEtab!=FALSE)
   {
      $id=$lgEtab['id'];
      $nom=$lgEtab['nom'];
      echo "
 <label for=Nom><h4>$nom</h4></label>  
</p>

         <a href='detailEtablissement.php?id=$id'>
         Voir détail</a></td>
         
        
         <a href='modificationEtablissement.php?action=demanderModifEtab&amp;id=$id'>
         Modifier</a>";
      	
         // S'il existe déjà des attributions pour l'établissement, il faudra
         // d'abord les supprimer avant de pouvoir supprimer l'établissement
			if (!existeAttributionsEtab($connexion, $id))
			{
            echo "
            
            <a href='suppressionEtablissement.php?action=demanderSupprEtab&amp;id=$id'>
            Supprimer</a></td> <hr>
            ";
         }
         else
         {
            echo "
            <td width='16%'>&nbsp; </td><hr>";          
			}
			
      $lgEtab=mysql_fetch_array($rsEtab);
   }   
   echo "</fieldset>
   </div>
   <fieldset>
 <div class='span6'><h4> Vous voulez créer un nouvel etablissement ? C'est par <a href='creationEtablissement.php?action=demanderCreEtab'>Ici </a > !</h4></fieldset>
</div>

";

footer();

?>
