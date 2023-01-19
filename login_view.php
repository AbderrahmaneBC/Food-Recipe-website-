<?php 
require_once('controller.php');

session_start();


class ViewLogIn {
        // Afficher l'entet du page
    public function headPage (){
        ?>
             <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link href="login.css" rel="stylesheet"/>
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
                        <h1>Log In</h1>
                        <div class="zone">
                            <legend  >email</legend>
                            <input  type="text" name="email" placeholder="Saisez votre email ..." required="true">
                        </div>
                        <div class="zone">
                            <legend class="pssd" >Password</legend>
                            <input class="pssd" name="password" type="password" placeholder="Saisez votre mot de passe ..." required="true">
                        </div>

                        <input type="submit"  class="submit" name="login" value="Login" >
                       <p>if you dont't have an account <br>
                       please          <a href="router_signup.php" >sign up </a> 
                       </p>




                       <a href="router_main.php" class="linka">go to home page</a>
                    </form>

                </body>
            </html>
        <?php
            if(ISSET($_POST['login'])){
                if($_POST['email'] != "" || $_POST['password'] != ""){
                    $control = new ClientController();
                    $logIn= $control->verifyLogInContoller($_POST['email'],$_POST['password']);
                    if($logIn != false){
                        $_SESSION['user'] = $logIn['nom'];
                        echo"login in succesfully";
                        header('location:./router_main.php');
                        
                    }else {
                        echo "
                            <script>alert('Invalid username or password')</script>
                        ";
                    }
                }
            }


    }
    
}

?>