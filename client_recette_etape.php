<?php

require_once('controller.php');

class EtapeRecetteView{
   public function afficherSiteEtapeRecette(){
$id = $_GET['etape'];
$recipe_control=new ClientController();
$etp=$recipe_control->recupererRecetteTitleController($id);

    $row_title = $etp->fetch(PDO::FETCH_BOTH);
    $recipe_title=$row_title['titre'] ;

if(isset($_POST['submit_etape'])){
   $etape_titre = $_POST['titre_etape'];
   $etape_desc = $_POST['etape_desc'];

   
   
   if(empty($etape_titre) || empty($etape_desc) ){
      $message[] = 'please fill out all';
   }else{

      $insert_etape =$recipe_control->insererRecetteEtapeController($id , $recipe_title , $etape_titre, $etape_desc);
     
      if($insert_etape){
         $message[] = 'nouvelle etape ajouté avec succes';
         
      }else{
         $message[] = 'on peut pas ajeuter une etape';
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
      
      $etape = $recipe_control->recupererRecetteEtapeController($id);
     

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">inserer les etapes </h3>
      <input type="text" class="box" name="titre_etape" placeholder="enter the recipe etape">
      <textarea class="box" name="etape_desc"  placeholder="entrer etape description"> </textarea>
      
      <input type="submit" value="submit_etape" name="submit_etape" class="btn">

      <a href="router_profile.php" class="btn">go back!</a>
   </form>
   



   

    </div>

    <div class="product-display">
    <table class="product-display-table">
         <thead>
         <tr>
            <th>recipe title</th>
            <th>etape title</th>
            <th>etape description</th>
           
            

         </tr>
         </thead>
         <?php while($row = $etape->fetch(PDO::FETCH_BOTH)){ ?>
         <tr>
           
            <td><?php echo $row['titrerecette']; ?></td>
            <td><?php echo $row['titreetape']; ?></td>
            <td><?php echo $row['descetape']; ?></td>
           
            
            
         </tr>
      <?php } ?>
      </table>

    </div>
    </div>

</body>
</html>
<?php }} ?>