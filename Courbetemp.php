<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <title>Courbe de temperature</title>
        <link rel="stylesheet" href="PagesTemp5.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    </head>
            
    <body>

<div id="col1" style="position: fixed; top: 0px; left: 0px;">
     <p><a href="Planning.php">Planning</a></p><br>

     <p><a href="Courbetens.php">Tension</a></p><br>

     <p><a href="Courbetemp.php">Température</a></p><br>   
</div>

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

//On prépare la requète puis on l'envoie
$requete="SELECT * FROM `Temperature`";
$result=mysqli_query($con,$requete);
$i=0;

while($donnees=mysqli_fetch_assoc($result))

{

    $tab_temp[$i]=$donnees['Temperature'];
    $tab_time[$i]=$donnees['Temps'];
    $i++;
 
}

json_encode($tab_temp);
json_encode($tab_time);

?>

<div class="center">

<canvas id="myChart" width="2000" height="900"></canvas>
<script>
    var temperature= <?php echo json_encode($tab_temp) ?>;
    var time= <?php echo json_encode($tab_time) ?>;
    var ctx = document.getElementById("myChart");

var myChart = new Chart(ctx, {
  
  type: 'line',
  data: {
    labels: time,
    datasets: [
      { 
        data: temperature,
        label:"Température",
        borderColor: "#FF0000",
fill: false

      }
    ]
  }

});

</script>
</div>

<div class="centre">
  <div class="bloc">
    <table border=1>
      <tr><td>Température</td><td>Date/Heure</td></tr>
    </table>
  </div>
</div>

<?php
while($donnees=mysqli_fetch_assoc($result))

{

    echo'<tr><td>';echo $donnees['Temperature']; echo'</td><td>'; echo $donnees['Temps'];echo'</td></tr>';
    echo'</table>';

}

  mysqli_free_result($result);

?>

<form name="formulaire" action="#" method="POST"> 
  <div class=milieu>
    <input type="submit" value="Arrêt d'urgence" name="Bouton" />
  </div>
</form>


<?php


if (isset($_POST['Bouton']))

{

  $Arreturg = '0';
    $requete1="UPDATE `EtatCompresseur` SET `etat` = '0' WHERE `EtatCompresseur`.`id` = 0";
  $result1=mysqli_query($con,$requete1);

} 

else{

  echo "erreur";
}

?>

<form name="formulaire" action="#" method="POST"> 
  <div class=mid>
    <input type="submit" value="Marche" name="Bouton2" />
  </div>
</form>


<?php


if (isset($_POST['Bouton2']))

{

  $Marche = '1';
    $requete2="UPDATE `EtatCompresseur` SET `etat` = '1' WHERE `EtatCompresseur`.`id` = 0";
  $result2=mysqli_query($con,$requete2);

} 

else{

  echo "erreur";
}




        mysqli_close($con);

?>