<?php

// Connexion a la base de données
include('ConnexionDB.php');

if(isset($_REQUEST['submit']))
{

        $prenom=$_REQUEST['prenom']; 
        $nom=$_REQUEST['nom']; 
        $email=$_REQUEST['email']; 
        $mdp=$_REQUEST['mdp']; 
         

        $queryEmail = mysqli_query($conn,"SELECT * FROM `Inscriptionn` WHERE email= '$email' ");
        
        if(mysqli_num_rows ($queryEmail)>0)
        {
        // indique si l'email est deja disponible dans la base de données 
        echo "Email deja utilisé , Connectez vous";
        }
        else
        {
            // insere les donnees soumise dans le formulaire dans la base de données
            $query="insert into Inscriptionn(`prenom`,`nom`,`email`,`mdp`)
            values('$prenom','$nom','$email','$mdp') ";
            $result=mysqli_query($conn,$query);

        
            if($result)
            {
                // affiche un message si l'inscription est réussie
                echo "Bravo ,Vous venez de vous inscrire ! ";
            }
            else
            {
                echo "Error";
            }
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- fais appel à inscri.css qui est le style utilisé pour notre page Inscription  -->
    <link rel="stylesheet" href="inscri3.css"/>
    <title>Inscription</title>
</head>
<body>
<div id="bg">
    <form method="POST">
    <div class="contact">
         <input  type="text"class="détails" placeholder="Nom:" name="nom" required="required" > <br>
         <input  type="text"class="détails" placeholder="Prénom:" name="prenom" required="required"> <br>
         <input  type="email"class="détails" placeholder="Email:" name="email" required="required"> <br>        <input  type="password"class="détails" placeholder="Mot de passe:" name="mdp" required minlength="8" maxlength="25" required="required">
         
      
      

        <div class="button">
            <input type="submit" value="S'Inscrire" name="submit">
            <button onclick="window.location.href='Connexion.php';">Se Connecter</button>
            
        </div> 
     </div>
    </div>
    </form>


</div>

</body>
</html>