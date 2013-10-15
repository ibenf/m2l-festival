<?php

include("_debut.inc.php");
include("_gestionBase.inc.php"); 
include("_controlesEtGestionErreurs.inc.php");

// CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES festival


if (!$connexion)
{
   ajouterErreur("Echec de la connexion au serveur MySql");
   afficherErreurs();
   exit();
}
if (!selectBase($connexion))
{
   ajouterErreur("La base de données festival est inexistante ou non accessible");
   afficherErreurs();
   exit();
}

// CRÉER UN ÉTABLISSEMENT 

// Déclaration du tableau des civilités
$tabCivilite=array("M.","Mme","Melle");  

$action=$_REQUEST['action'];

// S'il s'agit d'une création et qu'on ne "vient" pas de ce formulaire (on 
// "vient" de ce formulaire uniquement s'il y avait une erreur), il faut définir 
// les champs à vide sinon on affichera les valeurs précédemment saisies
if ($action=='demanderCreEtab') 
{  
   $id='';
   $nom='';
   $adresseRue='';
   $ville='';
   $codePostal='';
   $tel='';
   $adresseElectronique='';
   $type=0;
   $civiliteResponsable='Monsieur';
   $nomResponsable='';
   $prenomResponsable='';
   $nombreChambresOffertes='';
}
else
{
    $id=$_REQUEST['id'];
   $nom=$_REQUEST['nom']; 
   $adresseRue=$_REQUEST['adresseRue'];
   $codePostal=$_REQUEST['codePostal'];
   $ville=$_REQUEST['ville'];
   $tel=$_REQUEST['tel'];
   $adresseElectronique=$_REQUEST['adresseElectronique'];
   $type=$_REQUEST['type'];
   $civiliteResponsable=$_REQUEST['civiliteResponsable'];
   $nomResponsable=$_REQUEST['nomResponsable'];
   $prenomResponsable=$_REQUEST['prenomResponsable'];
   $nombreChambresOffertes=$_REQUEST['nombreChambresOffertes'];

   verifierDonneesEtabC($connexion, $id, $nom, $adresseRue, $codePostal, $ville, 
                        $tel, $nomResponsable, $nombreChambresOffertes);      
   if (nbErreurs()==0)
   {        
      creerEtablissement($connexion, $id, $nom, $adresseRue, $codePostal, $ville,  
                         $tel, $adresseElectronique, $type, $civiliteResponsable, 
                         $nomResponsable, $prenomResponsable, $nombreChambresOffertes);
   }
}

echo "
<div class='span4'>
<form method='POST' action='creationEtablissement.php?'>
<input type='hidden' value='validerCreEtab' name='action'>
   <fieldset><legend> Nouvel établissement</legend>
<ol>
<li>
<label for=id>Identifiant :*</label>
         <input type='text' value='$id' name='id' size ='10' 
         maxlength='8'  placeholder='Entrez un identifiant' required></td></li>
      ";
     
      echo '
      <li>
   <label for=Nom>Nom:*</label>   
         <input type="text" value="'.$nom.'" name="nom" size="50" 
         maxlength="45" required  placeholder="Entrez un nom">
         </li>
        <li>  
     <label for=adresseRue>Adresse:*</label> 
 <input type="text" value="'.$adresseRue.'" name="adresseRue" 
         size="50" maxlength="45" placeholder="Entrez une adresse">
          </li>
<li>  
     <label for=codePostal>CodePostal:*</label>
 <input type="text" value="'.$codePostal.'" name="codePostal" size="4" maxlength="5" placeholder="Entrez un code postal" required></td>
    </li>
<li>  
<label for=ville>Ville:*</label> 
<input type="text" value="'.$ville.'" name="ville" size="40" maxlength="35" placeholder="Entrez une ville" required></td>
  </li>
<li>
         <label for=tel> Téléphone*: </label>
<input value="'.$tel.'" name="tel" size ="20" 
         maxlength="10" type="tel" placeholder="par ex : +3375500000000" required">
         </li>
<li>       
<label for=adresseElectronique> Email*: </label>
<input type="email" value="'.$adresseElectronique.'" name="adresseElectronique" size ="75" maxlength="70" placeholder="e@exemple.fr">
</li>
<li>       
<label for=type>Type: </label>

';
            if ($type==1)
            {
               echo " 
              
              <input type='radio' name='type' value='1' checked cellspacing='12'>  Etablissement Scolaire
              
               <input type='radio' name='type' value='0'>Autre
 </li>
";
             }
             else
             {
                echo "

                <input type='radio' name='type' value='1' cellspacing='12'>  Etablissement Scolaire <br>
                <input type='radio' name='type' value='0' checked >  Autre

";
              }
           echo "</ol>
  </fieldset>

                </div>
<div class='span3'>
             

 <fieldset>
          <legend>Responsable</legend>
          <ol>
                     <li>
                     <label for='civiliteResponsable'>Civilité: </label>
                     <select name='civiliteResponsable'>";
                                    for ($i=0; $i<3; $i=$i+1)
                                       if ($tabCivilite[$i]==$civiliteResponsable) 
                                       {
                                          echo "<option selected>$tabCivilite[$i]</option>";
                                       }
                                       else
                                       {
                                          echo "<option>$tabCivilite[$i]</option>";
                                       }
                                    echo '
                                    </select>&nbsp; &nbsp; &nbsp; &nbsp; 
                     </li>
                     <li>
                     <label for="nomResponsable">Nom: *</label>
                     <input type="text" value="'.$nomResponsable.'" name=
                                    "nomResponsable" size="26" maxlength="25" placeholder="Entrez un nom">
                                    &nbsp; &nbsp; &nbsp; &nbsp; 
                     </li>
                     <li>
                     <label for="prenomResponsable">Prenom : *</label>
                     <input type="text"  value="'.$prenomResponsable.'" name=
                                    "prenomResponsable" size="26" maxlength="25" placeholder="Entrez un prenom">
                     </li>
                     <li>             
                     <label for="$nombreChambresOffertes">Nombre chambres offertes*:</label>
                     <input type="number" value="'.$nombreChambresOffertes.'" name="nombreChambresOffertes" size ="2" maxlength="3" min="0" max="50" placeholder="Un nombre entre 0 et 50">
                       </li>

            </ol>
</fieldset>       ';
   
   echo "
   <fieldset>
<button  type='submit' value='Valider'>Valider</button>
<button id='annuler' type='reset' value='Annuler' name='annuler'>Annuler</button>
</fieldset>      
</form>
</div> 
";
footer();
// En cas de validation du formulaire : affichage des erreurs ou du message de 
// confirmation
if ($action=='validerCreEtab')
{
   if (nbErreurs()!=0)
   {
      echo "<img width=50px src='img/error.png'>"; afficherErreurs();
   }
   else
   {
      echo "
      <div class='span5'>
      <div class='ajoutConfirm'><img src='img/true.png'><h1>La création de l'établissement a été effectuée</center></h1></div>
      </div>";
   }
}

?>
