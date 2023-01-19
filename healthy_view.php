<?php
require_once('controller.php');
class HealthyView{
    public function afficherSiteHealthy(){


   $recette_healthy_control=new ClientController();
   $recette_healthy=$recette_healthy_control->recupererRecetteHealthyController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
  <title>Acceuil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="newsstyle.css" rel="stylesheet" >
  <script src="https://kit.fontawesome.com/c6b657b2f8.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </head>
<body>
   
<div class="header">
  <a href="#default" class="logo"><img src ="./logo.png" alt="logo" height=60px width=60px></a>
  <div class="headernav">
    <a class="nav" href="#home">Accueil</a>
    <a href="#contact" class="nav" class="active" >News</a>
    <a href="#about" class="nav">Idées Recette</a>
    <a href="#about" class="nav" class="active" >Healthy</a>
    <a href="#about" class="nav">Saison</a>
    <a href="#about" class="nav">Fetes</a>
    <a href="#about" class="nav">Nutrition</a>
    <a href="#about" class="nav">contact</a>
    <div class="identification">
  <a href="#default" class="nav" id="signup" >sign up </a>
  <a href="#default" class="nav">login</a>
  </div>

  </div>
  <div class="iconn"><ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>

              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
            
</div>
  
</div>
















<!--.......................................................................................-->
 
<!--healthy-->
<div class="container">
  <a href="">Healthy recipes</a>
  <ul class="cards">

   <?php while($row = $recette_healthy->fetch(PDO::FETCH_BOTH)){ ?>  
    <li class="card">
      <div>
        <img src="../admin1/uploaded_img/<?php echo $row['imagerecette'] ?>" alt="" width=100% height=200px>
        <h3 class="card-title"><?php echo $row['titre'] ?>  </h3>
        <div class="card-content">
          <p><?php echo $row['shortdesc'] ?> </p>
        </div>
      </div>
      <div class="card-link-wrapper">
        <a href="router_recette.php?idrecette=<?php echo $row['idrecette']; ?>" class="card-link">Afficher plus</a>
      </div>
    </li>
    <?php
   }
?>
   
    
  </ul>
</div>

<!--.......................................................................................-->



  <!-- Site footer -->
  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About us</h6>
            <p class="text-justify">ABRECIPES.com  is an food recipes website  to help people to find recipes that they want just by a click. </p>
          </div>

         

          <div class="links">
            <h6>Liens</h6>
            <ul class="footer-links">
              <li><a href=""> Accueil</a></li>
              <li><a href="">News</a></li>
              <li><a href="">Idée de recette</a></li>
              <li><a href="">Heathy</a></li>
              <li><a href="">Saison</a></li>
              <li><a href="">Fetes</a></li>
              <li><a href="">Saison</a></li>
              <li><a href="">Nutrition</a></li>
              <li><a href="">Contact</a></li>


            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by 
         <a href="#">ABRECIPES</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>

              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>


</body>
</html>
<?php 
    }}
?>
