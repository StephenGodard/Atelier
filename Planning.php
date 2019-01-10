<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Compresseur planning</title>

        <link href="bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="PagesPlanning3.css">

    </head>
			
    <body>
<nav id="col1" style="position: fixed; top: 0px; left: 0px;">
     <p><a href="Planning.php">Planning</a></p><br>

     <p><a href="Courbetens.php">Tension</a></p><br>

     <p><a href="Courbetemp.php">Température</a></p><br>   
</nav>

	 <img src="usinage2.jpg">

     <form name="formulaire" action="#" method="GET">

<div class="centre">
  <div class="bloc">
            
        <!-- <span <div style="position:absolute: top:0px; right:1000px"> </span> -->

     <?php 

    $datetime = date("d-m-y H:i:s");
    echo 'Nous sommes le '; 
    echo $datetime;

      
      ?>
 

    <p>
      <label for="Heure démarrage">Heure démarrage :</label>
      <input type="time" id="Heure démarrage" placeholder="Heure démarrage" name="demarrage" required="required" autofocus="true"/>

      <label for="Heure arrêt">Heure arrêt :</label>
      <input type="time" id="Heure arrêt" placeholder="Heure arrêt" name="arret" required="required" autofocus="true"/><br>
</p>


      			<label for="Début année">Début année scolaire :</label>
      			<input type="date" id="Début année scolaire" placeholder="Début année scolaire" name="Debut" required="required" autofocus="true"/><br>

      			<label for="Toussaint">Toussaint :</label>
      			<input type="date" id="Toussaint" placeholder="Toussaint" name="Toussaint" required="required" autofocus="true"/>

      			<label for="Toussaint">au </label>
      			<input type="date" id="Fin Toussaint" placeholder="Fin Toussaint" name="FinToussaint" required="required" autofocus="true"/><br>

     			 <label for="Noël">Noël :</label>
      			<input type="date" id="Noël" placeholder="Noël" name="Noel" required="required" autofocus="true"/>

      			<label for="Fin Noël">au </label>
      			<input type="date" id="Fin Noël" placeholder="Fin Noël" name="FinNoel" required="required" autofocus="true"/><br>

      			<label for="Hiver">Hiver :</label>
      			<input type="date" id="Hiver" placeholder="Hiver" name="Hiver" required="required" autofocus="true"/>

      			<label for="Fin Hiver">au</label>
      			<input type="date" id="Fin Hiver" placeholder="Fin Hiver" name="FinHiver" required="required" autofocus="true"/><br>

      			<label for="Pâques">Pâques :</label>
      			<input type="date" id="Pâques" placeholder="Pâques" name="Paques" required="required" autofocus="true"/>

      			<label for="Fin Pâques">au</label>
      			<input type="date" id="Fin Pâques" placeholder="Fin Pâques" name="FinPaques" required="required" autofocus="true"/><br>

      			<label for="Fin année">Fin année scolaire :</label>
      			<input type="date" id="Fin année scolaire" placeholder="Fin année scolaire" name="Fin" required="required" autofocus="true"/><br>


    		     <input type="submit" value="Valider" name="Bouton" />
          </div>
    </div>
</form>

<?php

//Ils mettent dans les variables ce qu'on a tapé dans le planning
$HrDemarr= isset($_GET['demarrage']) ? $_GET['demarrage'] : NULL;
$HrArret= isset($_GET['arret']) ? $_GET['arret'] : NULL;
$DebAnnee= isset($_GET['Debut']) ? $_GET['Debut'] : NULL;
$Toussaint= isset($_GET['Toussaint']) ? $_GET['Toussaint'] : NULL; 
$FinToussaint= isset($_GET['FinToussaint']) ? $_GET['FinToussaint'] : NULL; 
$Noel= isset($_GET['Noel']) ? $_GET['Noel'] : NULL; 
$FinNoel= isset($_GET['FinNoel']) ? $_GET['FinNoel'] : NULL; 
$Hiver= isset($_GET['Hiver']) ? $_GET['Hiver'] : NULL;
$FinHiver= isset($_GET['FinHiver']) ? $_GET['FinHiver'] : NULL;  
$Paques= isset($_GET['Paques']) ? $_GET['Paques'] : NULL;
$FinPaques= isset($_GET['FinPaques']) ? $_GET['FinPaques'] : NULL;
$FinAnnee= isset($_GET['Fin']) ? $_GET['Fin'] : NULL; 


//Change les valeurs qu'il y a dans la base de donnée
$command = "UPDATE Calendrier SET HrDem='$HrDemarr',HrArr='$HrArret',DebAnn='$DebAnnee',DebTouss='$Toussaint',FinTouss='$FinToussaint',DebNoel='$Noel',FinNoel='$FinNoel',DebHiv='$Hiver',FinHiv='$FinHiver',DebPaq='$Paques',FinPaq='$FinPaques',FinAnn='$FinAnnee' WHERE id=1";

?>



      <form>
  			
 <div class="center">
  <div class="bloque">

          <legend>Veuillez sélectionner vos jours :</legend> </span> 
  

					<form>
    					<input type="checkbox" id="Lundi" name=Jours[] value="Lundi">Lundi				  					
    					<input type="checkbox" id="Mardi" name=Jours[] value="Mardi">Mardi					  			 	
    					<input type="checkbox" id="Mercredi" name=Jours[]  value="Mercredi">Mercredi
    					<input type="checkbox" id="Jeudi" name=Jours[]  value="Jeudi">Jeudi
    					<input type="checkbox" id="Vendredi" name=Jours[] value="Vendredi">Vendredi					
    					<input type="checkbox" id="Samedi" name=Jours[] value="Samedi">Samedi
					       <input type="submit" name="submit" value="Envoyer" />

        </div>
      </div>

 		  </form>

    </body>
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
       
      
if(isset($_POST["submit"]))

{
    if(isset($_POST["Jours"]))

  {
    
        echo'Vous avez selectionné';

        foreach($_POST["Jours"] as $Jours)

        {

            echo $Jours;

        }

     }   

  else
  {

    echo 'rien';
  }
}


mysqli_close($con);
 ?>