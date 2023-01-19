<?php
require_once('controller.php');
class profilView{
    public function afficherSiteprofile(){
        if (isset($_SESSION['username']))  {
    
            echo $_SESSION['username'];  }

            $id=$_SESSION['username'];
    $recuperuser_control=new ClientController();
   $recuperer=$recuperuser_control->recupererUserControllerId($id);

   if(isset($_POST['add_product'])){

    $recette_titre = $_POST['titre'];
    $recette_short_description = $_POST['short_description'];
    $recette_image = $_FILES['product_image']['name'];
    $recette_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $recette_image_folder = '../admin2/uploaded_img/'.$recette_image;
    $recette_description=$_POST['description'];
    $recette_temps_de_preparation=$_POST['temps_de_preparation'];
    $recette_temps_de_repos=$_POST['temps_de_repos'];
    $recette_temps_de_cuisson=$_POST['temps_de_cuisson'];
    $recette_temps_total=$_POST['temps_total'];
    $recette_notation=$_POST['notation'];
    $recette_calories=$_POST['calories'];
    $recette_difficulte=$_POST['difficulte'];
    $recette_healthy=$_POST['healthy'];
    $recette_saison=$_POST['saison'];
    $recette_fete=$_POST['fete'];
    $recette_categorie=$_POST['categorie'];
 
 
 
 
    if(empty($recette_titre) || empty($recette_short_description) || empty($recette_image) || empty($recette_description) || empty($recette_temps_de_preparation) || empty($recette_temps_de_repos) || empty($recette_temps_de_cuisson)  || empty($recette_temps_total) || empty($recette_notation)  || empty($recette_calories) || empty($recette_healthy)|| empty($recette_difficulte)|| empty($recette_saison||  empty($recette_categorie))){
       $message[] = 'please fill out all';
    }else{
       $insert_control=new ClientController();
       $upload=$insert_control->insererRecetteController($recette_titre, $recette_image, $recette_short_description ,$recette_description,$recette_temps_de_preparation,$recette_temps_de_repos,$recette_temps_de_cuisson,$recette_temps_total,$recette_notation,$recette_calories,$recette_difficulte, $recette_healthy,$recette_saison,$recette_fete,$recette_categorie,$id);
       if($upload){
          move_uploaded_file($recette_image_tmp_name, $recette_image_folder);
          $message[] = 'new product added successfully';
       }else{
          $message[] = 'could not add the product';
       }
    }
    
 
 };
 
 if(isset($_GET['delete'])){
    $id_recette = $_GET['delete'];
    $delet_control=new ClientController();
    $delet=$delet_control->supprimerRecetteController($id,$id_recette);
    header('location:./router_profile.php');
 };

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
  <title>Acceuil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="accueil.css" rel="stylesheet" >
  <link href="profile.css" rel="stylesheet" >

  <script src="https://kit.fontawesome.com/c6b657b2f8.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </head>
<body>
   
<div class="header">
  <a href="#default" class="logo"><img src ="./logo.png" alt="logo" height=60px width=60px></a>
  <div class="headernav">
    <a class="active" class="nav" href="#home">Accueil</a>
    <a href="./router_news.php" class="nav">News</a>
    <a href="#about" class="nav">Idées Recette</a>
    <a href="./router_healthy" class="nav">Healthy</a>
    <a href="./router_saison" class="nav">Saison</a>
    <a href="./router_fete.php" class="nav">Fetes</a>
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

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">nom</label><input type="text" class="form-control" placeholder="" value="<?php echo $row['nom'] ?>"></div>
                    <div class="col-md-6"><label class="labels">prenom</label><input type="text" class="form-control" value="<?php echo $row['prenom'] ?>" placeholder=""></div>
                </div> 
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Sexe</label><input type="text" class="form-control" placeholder="" value="<?php echo $row['sexe'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Date de naissance</label><input type="date" class="form-control" placeholder="" value="<?php echo $row['datenaissance']?>"></div>
                    <div class="col-md-12"><label class="labels">email</label><input type="email" class="form-control" placeholder="" value="<?php echo $row['mail'] ?>"></div>
                    <div class="col-md-12"><label class="labels">password</label><input type="password" class="form-control" placeholder="" value="<?php echo $row['password'] ?>"></div>
                   
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        
    </div>
</div>
<?php }?>  

</div>
</div>



<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>

<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter recette titre" name="titre" class="box">
         <input type="text" placeholder="enter recette short description" name="short_description" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <textarea name="description" class="box" cols="30" rows="10"></textarea>
         <input type="text" placeholder="enter temps de preparation" name="temps_de_preparation" class="box">
         <input type="text" placeholder="enter recette temps de repos" name="temps_de_repos" class="box">
         <input type="text" placeholder="enter recette temps de cuisson" name="temps_de_cuisson" class="box">
         <input type="text" placeholder="enter recette temps total" name="temps_total" class="box">
         <input type="text" placeholder="enter recette notation" name="notation" class="box">
         <input type="text" placeholder="enter recette calories" name="calories" class="box">
         <input type="text" placeholder="enter recette difficulte" name="difficulte" class="box">
         <input type="text" placeholder="enter recette healthy" name="healthy" class="box">
         <input type="text" placeholder="enter recette saison" name="saison" class="box">
         <input type="text" placeholder="enter recette fete" name="fete" class="box">
         <input type="text" placeholder="enter recette categorie" name="categorie" class="box">



         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php
   $recuperer_control=new ClientController();
   $query=$recuperer_control->recupererRecetteUserController($id);

      

    
        
   ?>
  <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>recipe image</th>
            <th>recipe title</th>
            <th>recipe short description</th>
            <th class="descriptionone">recipe description</th>
            <th>temps de preparation</th>
            <th>temps de repos</th>
            <th>temps de cuisson</th>
            <th>temps total</th>
            <th>notation</th>
            <th>calories</th>
            <th>difficulte</th>
            <th>healthy</th>
            <th>saison</th>
            <th>fete</th>
            <th>categorie</th>
            <th>ingredients</th>
            <th>etapes</th>
           
            <th>mise a jour</th>
          
          




         </tr>
         </thead>
         <?php while($row = $query->fetch(PDO::FETCH_BOTH)){ ?>
         <tr>
            <td><img src="../admin2/uploaded_img/<?php echo $row['imagerecette']; ?>" height="100" alt=""></td>
            <td><?php echo $row['titre']; ?></td>
            <td><?php echo $row['shortdesc']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['tempsDePreparation']; ?></td>
            <td><?php echo $row['tempsDeRepos']; ?></td>
            <td><?php echo $row['tempsDeCuisson']; ?></td>
            <td><?php echo $row['tempsTotal']; ?></td>
            <td><?php echo $row['notation']; ?></td>
            <td><?php echo $row['calories']; ?></td>
            <td><?php echo $row['difficulte']; ?></td>
            <td><?php echo $row['healthy']; ?></td>
            <td><?php echo $row['saison']; ?></td>
            <td><?php echo $row['fete']; ?></td>
            <td><?php echo $row['categorie']; ?></td>


            <td>
            <a href="router_recette_ingredient.php?ingredients=<?php echo $row['idrecette']; ?>" class="btn"> <i class="fa-solid fa-pot-food"></i></i>ingredients </a>
            </td>
            <td>
            <a href="router_recette_etape.php?etape=<?php echo $row['idrecette']; ?>" class="btn"> <i class="fa-solid fa-pot-food"></i></i>etape  </a>
            </td>
            <td>
               <a href="router_profile.php?delete=<?php echo $row['idrecette']; ?>" class="btn"> <i class="fas fa-trash" ></i> delete </a>
            </td>
            <td>
            </td>
            
         </tr>
      <?php } ?>
      </table>
   </div>
      
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
