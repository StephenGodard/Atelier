<!DOCTYPE html>

<html>
    <head>

        <meta charset="utf-8" />
        <title>Page documents</title>
        <link rel="stylesheet" href="PagesFichier2.css">

    </head>
			
    <body>
    
    <h1>Page d'envoie de fichier</h1>
	 <img src="Usinage1.jpg">
	 <p>Pour retourner vers la page précédente, cliquez ci-dessous.</p>
	 <p><a href="Fichier.php">Revenir sur la page d'envoie de fichier.</a></p><br>
    </body>
</html>


<?php
$dossier = 'uploads/';
$target_path = "/var/www/html/Atelier/uploads/";
$target_path = $target_path . basename( $_FILES['fileToUpload']['name']); 
$fichier = basename($_FILES['fileToUpload']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['fileToUpload']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['fileToUpload']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_path)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
?>