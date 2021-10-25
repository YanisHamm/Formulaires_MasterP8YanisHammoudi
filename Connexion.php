<?php
// Connexion à la Base de données
include('ConnexionDB.php');
session_start();


if(isset($_POST['login'])){

    $email= $_POST['email'];
    $mdp= $_POST['mdp'];
    
    $query = mysqli_query($conn,"SELECT id FROM Inscriptionn WHERE email='$email'  AND mdp='$mdp'");

    // verifie si l'email et le mdp inserés dans le formulaire existe dans la base de données 
    if(mysqli_num_rows($query) == true){
        
        
        
        echo "Bravo , connexion reussie ";
    }
    else{
        echo "Login invalide";
    }


}

?>
<!DOCTYPE html>
<html lang="fr">
<main>
    
    <head>
        <link  href="Connexion.css" rel="stylesheet" >
       
        <meta charset="UTF-8">
        <!--Nom de l'onglet-->
        <title>Connexion</title>
    </head>
    <body>    <!--Corps de la page-->
       
        <div class="box">
    
            <form action="" method="POST" class="formBloc">
    
                <h3><strong>Connexion</strong></h3>
    
                <div class="formGroupe">
                    <label for="email">Email </label>
                    <input type="email" id="email" name="email" required maxlength="50">
                </div>
    
                <div class="formGroupe">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" name="mdp" required minlength="8" maxlength="25">
                </div>
    
                <div class="formGroupe">
                    <input type="submit" value="Login" class="buttonSub" name="login">
                    <input type="reset"  value="Reset" class="buttonRes" name="reset">
                </div>
    
                <div class="mdpPerdu">
                    <a href="Inscription.php">S'inscrire ?</a>
                </div>
            </form>
    
        </div>
    
    
    
    
        
   
    </body>
</main>
