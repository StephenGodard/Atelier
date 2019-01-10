<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <title>Page documents</title>
        <link rel="stylesheet" href="PagesFichier3.css">

    </head>
			
    <body>
    
    <div class=milieu>
    <div class=bloc >
	 <p>Ci-dessous, vous pouvez transférer des documents.</p>
<form  action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload" id="fileToUpload" />
<input type='submit' value='Envoyer'/>
</form>
</div>
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



mysqli_close($con);

?> 