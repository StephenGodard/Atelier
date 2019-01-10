<?php
//on démarre la session de connection
session_start();
//si la variable session existe déjà, on ne fait rien
if(isset($_SESSION['droit']))
{
}
//sinon on la crée et on rentre la valeur booléenne "false"
else
{
$_SESSION['droit']=false;
}
?>
<html>
<link rel="stylesheet" href="formu.css">
<form name="formulaire" action="#" method="POST">
<title>Formulaire</title>
<img src="usinage1.jpg">
<p><i>Complétez le formulaire pour pouvoir accéder au site. </i></p>
  <fieldset>
    <legend>Connexion</legend>
    <p>
      <label for="Nom">Nom :</label>
      <input type="text" id="Nom" placeholder="Nom" name="utilisateur" required="required" autofocus="true"/><br>
    <label for="Motdepasse" class="left">Mot de passe :</label>
    <input type="password" id="motdepasse" name="password" placeholder="Mot de passe"  required="required" size="30" maxlength="30" />
  </p>
  </fieldset>
  <input type="submit" value="Valider"/>
  </form>
</html>

<?php
//connexion à la base de données
    $con = mysqli_connect('localhost','root', 'MySQL','AtelierJaures');
    
    if($con)
    	echo "";
    else
		{
			echo 'Erreur de connexion à la BDD';
			
		}
		

//Ils mettent dans les variables ce qu'on a tapé dans le formulaire
$log= isset($_POST['utilisateur']) ? $_POST['utilisateur'] : NULL; 
$mdp1= isset($_POST['password']) ? $_POST['password'] : NULL; 

//Requète sql
$command="SELECT login,MDP FROM Utilisateur";

//récupère le résultat envoyer par la base de données
$result = mysqli_query($con, $command);

//On extrait les données le résultat de la requète dont on a besoin
while($donnees = mysqli_fetch_assoc($result))
{

//Variables stockant les résultats de la requète
$log_comp=$donnees['login'];
$mdp1_comp=$donnees['MDP'];

//Comparaison de ce qu'on a tapé et des résultats de la requète
if($log==$log_comp && $mdp1==$mdp1_comp)
{
		
	echo 'Bienvenue à la page du compresseur';
	header('location: Accueil.php');

}else{
echo "Votre identifiant et/ou votre mot de passe est incorrrect";
}
}

if($log==$log_comp && $mdp1==$mdp1_comp){

  echo 'Bienvenue à la page denvoi de fichiers';
  header('location: Fichier.php');

}else{
   echo "Votre identifiant et/ou votre mot de passe est incorrrect";
}


mysqli_close($con);

?>
