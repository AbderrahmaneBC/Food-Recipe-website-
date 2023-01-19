<?php 
require_once('controller.php');



class ViewSignup {
        // Afficher l'entet du page
    public function headPage (){
        ?>
             <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link href="signup.css" rel="stylesheet"/>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            </head>
        <?php
    }


    public function afficherSite(){
        ?>
            <!DOCTYPE html>
        <?php
            $this->headPage();
        ?>
                <body>
                    <form method="POST">
                        <h1>Signup</h1>
                        <div class="zone">
                            <legend  >nom</legend>
                            <input  type="text" name="nom" placeholder="Saisez votre nom ..." required="true">
                        </div>
                        <div class="zone">
                            <legend  >prenom</legend>
                            <input  type="text" name="prenom" placeholder="Saisez votre prenom ..." required="true">
                        </div>
                        <div class="zone">
                            <legend  >date de naissance</legend>
                            <input  type="date" name="date" placeholder="Saisez votre date de naissance ..." required="true">
                        </div>
                        <div class="zone">
                            <legend  >sexe</legend>
                            <input  type="text" name="sexe" placeholder="Saisez votre sexe ..." required="true">
                        </div>
                        <div class="zone">
                            <legend  >email</legend>
                            <input  type="email" name="email" placeholder="Saisez votre email ..." required="true">
                        </div>


                        <div class="zone">
                            <legend class="pssd" >Password</legend>
                            <input class="pssd" name="password" type="password" placeholder="Saisez votre mot de passe ..." required="true">
                        </div>

                        <input type="submit"  class="submit" name="signup" value="signup" >




                       <a href="router_login.php">go to login page</a>
                    </form>

                </body>
            </html>
        <?php
            if(ISSET($_POST['signup'])){
                if($_POST['email'] != "" || $_POST['password'] != ""  || $_POST['sexe'] != ""  || $_POST['date'] != ""  || $_POST['prenom'] != ""  || $_POST['nom'] != ""){
                    $control = new ClientController();
                    $signup= $control->InsererUserContoller($_POST['email'],$_POST['password'],$_POST['sexe'],$_POST['date'],$_POST['prenom'],$_POST['nom']);
                    if($signup){
                       
                        echo "
                        <script>alert('signup succesfully please go to login page ')</script>
                    ";
                       
                    }else {
                        echo "
                            <script>alert('Invalid information')</script>
                        ";
                    }
                }
            }


    }
    
}

?>