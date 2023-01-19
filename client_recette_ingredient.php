<?php

require_once('controller.php');

class IngredientRecipeView{
   public function afficherSiteIngredientRecette(){
$id = $_GET['ingredients'];
$recipe_control=new ClientController();
$ing=$recipe_control->recupererRecetteTitleController($id);

    $row_title = $ing->fetch(PDO::FETCH_BOTH);
    $recipe_title=$row_title['titre'] ;


if(isset($_POST['submit_ingredient'])){
   $ingredient_titre = $_POST['titre_ingredient'];
   $ingredient_quantity = $_POST['quantity'];
   $ingredient_calories=$_POST['calories'];
   $ingredient_healthy=$_POST['healthy'];
   
   
   if(empty($ingredient_titre) || empty($ingredient_quantity) || empty($ingredient_calories) || empty($ingredient_healthy) ){
      $message[] = 'please fill out all';
   }else{

      $insert_ing = $recipe_control->insererRecetteIngredientController($id,$recipe_title,$ingredient_titre,$ingredient_quantity,$ingredient_calories,$ingredient_healthy);
      
      if($insert_ing){
         $message[] = 'new product added successfully';
         /*$recuperer_calories = " SELECT SUM(calories) AS caloriesTOTAL  FROM recette_ingredients WHERE idrecette=".$id."";
         $calories= $conn->prepare($recuperer_calories);
         $calories->execute();
         while($row = $calories->fetch(PDO::FETCH_BOTH)){ 
            $number_calories=$row['caloriesTOTAL'];
            echo $number_calories;}
            
            $update_calories="UPDATE recette SET calories='$number_calories' WHERE idrecette = ".$id."";
            $calories_update= $conn->prepare($update_calories);
            $calories_update->execute();*/
         }else{
         $message[] = 'could not add the product';
      }
   }
   
};




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="profile.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $recipe_ingredient_control=new ClientController();
      $ingredients=$recipe_ingredient_control->recupererRecetteIngController($id);
      
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">inserer les ingredients </h3>
      <input type="text" class="box" name="titre_ingredient" placeholder="enter the recipe ingredient">
      <input type="text"  class="box" name="quantity"  placeholder="enter the ingredient quantity">
      <input type="text"  class="box" name="calories"  placeholder="enter the ingredient calories">
      <input type="text"  class="box" name="healthy"  placeholder="enter the ingredient healthy">
      
      <input type="submit" value="submit_ingredient" name="submit_ingredient" class="btn">

      <a href="router_profile.php" class="btn">go back!</a>
   </form>
   



   

    </div>

    <div class="product-display">
    <table class="product-display-table">
         <thead>
         <tr>
            <th>recipe title</th>
            <th>ingredient title</th>
            <th>ingredient quantity</th>
            <th>ingredient calories</th>
            <th>ingredient healthy</th>
            

         </tr>
         </thead>
         <?php while($row = $ingredients->fetch(PDO::FETCH_BOTH)){ ?>
         <tr>
           
            <td><?php echo $row['titrerecette']; ?></td>
            <td><?php echo $row['titreingredient']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['calories']; ?></td>
            <td><?php echo $row['healthy']; ?></td>
            
            
         </tr>
      <?php } ?>
      </table>

    </div>
    </div>

</body>
</html>
<?php }} ?>