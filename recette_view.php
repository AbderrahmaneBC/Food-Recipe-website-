<?php
require_once('controller.php');

class RecetteView{
    public function afficherSiteRecette(){
    $recupererrecette_control=new ClientController();
    $id=$_GET['idrecette'];
   $recuperer=$recupererrecette_control->recupererRecetteControllerId($id);
   $recuperer_ingredient=$recupererrecette_control->recupererIngredientControllerId($id);
   $recuperer_etape=$recupererrecette_control->recupererEtapeControllerId($id);

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
  <title>Acceuil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="recette.css" rel="stylesheet" >
  <script src="https://kit.fontawesome.com/c6b657b2f8.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </head>
<body>
   
<div class="header">
  <a href="#default" class="logo"><img src ="./logo.png" alt="logo" height=60px width=60px></a>
  <div class="headernav">
    <a  class="nav" href="#home">Accueil</a>
    <a href="#contact" class="nav">News</a>
    <a href="#about" class="nav">Idées Recette</a>
    <a href="#about" class="nav">Healthy</a>
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



<?php while($row = $recuperer->fetch(PDO::FETCH_BOTH)){ ?>  
<div class="about" >
		<div class="container">
        <h1 class="title_recipe"><?php echo $row['titre']; ?></h1>

			<div class="row">

		        <div class="col-md-6">
		        	<div><img src="../admin1/uploaded_img/<?php echo $row['imagerecette'] ?>" style="max-width: 100%;"></div>
		        </div>
		        <div class="col-md-6">
		        	<h1 class="about_text"><strong>Plus sur  <span class="color"><?php echo $row['titre']; ?></span></strong></h1>
		        	<p class="about_taital"> <?php echo $row['description']; ?></p>
		        	<button class="card-link"><a href="#">afficher plus</a></button>
		        </div>
			</div>
		</div>
	</div>




    <section id="menu" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="info">Information du Temps</h1>
			</div>
            <div class="back_info">
                <div class="back_info1">
			<div class="col-md-6 col-sm-6">
				<h4>Temps de Preparation ................ <span> <?php echo $row['tempsDePreparation']; ?></span></h4>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Temps de Repos ........................... <span> <?php echo $row['tempsDeRepos']; ?></span></h4>
			
            </div>
            </div>
            <div class="back_info2">
			<div class="col-md-6 col-sm-6">
				<h4>Temps de Cuisson ........................ <span> <?php echo $row['tempsDeCuisson']; ?></span></h4>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Temps Total .................................... <span> <?php echo $row['tempsTotal']; ?></span></h4>
			</div>
            </div>
			</div>
			
		</div>
	</div>
</section>		
<!--.......................................................................................-->
<section class="ingredients">
<h1 class="Ingredienttitle">Ingredients</h1>
<ul style="list-style: disc;">
<?php while($row = $recuperer_ingredient->fetch(PDO::FETCH_BOTH)){ ?>  

<li> <?php echo $row['quantity']; ?>   <?php echo $row['titreingredient']; ?>   (  <?php echo $row['calories']; ?> )</li>
<?php 
    }
?>

</ul>
</section>






<!--.......................................................................................-->

<!--.......................................................................................-->
<section class="ingredients">
<h1 class="Ingredienttitle">Etapes</h1>
<ol class="etape_allign">
<?php while($row = $recuperer_etape->fetch(PDO::FETCH_BOTH)){ ?>  

<li> <?php echo $row['titreetape']; ?>  </li>
<p class="etapep"> <?php echo $row['descetape']; ?></p>
<?php 
    }
?>

</ol>
</section>


<?php 
    }
?>



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
