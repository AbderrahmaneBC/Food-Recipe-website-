<?php 
require_once('controller.php');
class ClientModel{
    private $dbName ="projet";
    private $host ="localhost";
    private $user ="root";
    private $password ="";


    private function connexion ($host , $dbName , $user , $password){

            $conn = new PDO("mysql:host=$host; dbname=$dbName", $user, $password); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        return $conn ;
    }

    private function deconnexion ($conn) {
            $conn = null ;
        }

    private function requete ($conn , $sql){
        $query = $conn->prepare($sql);
        $query->execute();
        return $query;
    }
   

   
public function recupererDiapoModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM parametre ";
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}
public function recupererEntreeModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette  WHERE categorie='entree' ORDER BY idrecette DESC LIMIT 10; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}
public function recupererPlatModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette  WHERE categorie='plat'  ORDER BY idrecette DESC ; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}

public function recupererDessertModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette  WHERE categorie='dessert' ORDER BY idrecette DESC LIMIT 10; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}

public function recupererBoissonModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette  WHERE categorie='boisson'  ORDER BY idrecette DESC LIMIT 10; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}

/*.............................recete.....................*/

public function recupererRecetteModelId($idvalue){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette  WHERE idrecette = '$idvalue' ";
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;
}

public function recupererIngredientModelId($idvalue){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette_ingredients  WHERE idrecette = '$idvalue' ";
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;
}
public function recupererEtapeModelId($idvalue){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recetteetape  WHERE idrecette = '$idvalue' ";
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;
}

/*...............................news......................*/
public function recupererNewsModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM news  ; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}
public function recupererNewsModelId($idvalue){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM news  WHERE idnews = '$idvalue' ";
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;
}
public function recupererRecetteModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette  ORDER BY idrecette DESC LIMIT 10 ; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}




/*.................healthy..................*/

public function recupererRecetteHealthyModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette WHERE healthy='healthy' AND calories < 1000 ; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}
/*..................saison.........................*/
public function recupererRecetteSaisonModel($saison){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette WHERE saison LIKE '%$saison%' ; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}

/*...............................fete.......................*/
public function recupererRecetteFeteModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette WHERE fete !='' ; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}
public function recupererRecetteFeteFilternModel($fete){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM recette WHERE fete LIKE '%$fete%' ; " ; 
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}

/*......................nutrition.......*/
public function recupererIngredientModel(){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM ingredient ";
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}
public function recupererIngredientsModelId($id){
    $conn= $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $recuperer_query="SELECT * FROM ingredient  WHERE  idingredient='$id'";
    $query = $this->requete($conn , $recuperer_query);
    $this->deconnexion($conn);
    return $query;

}

/*..................login..............*/
private function getNumRow ($table) {
    $conn = $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $sql = "SELECT * FROM `$table`";
    $query = $this->requete($conn, $sql);
    $this->deconnexion($conn);
    return $query->rowCount();
}

private function getLogInUsers ($email , $motdepass){
$conn = $this->connexion($this->host , $this->dbName , $this->user , $this->password);
$sql = "SELECT * FROM `users` WHERE `mail`='$email' AND `password`='$motdepass' ";
$query = $this->requete($conn,$sql);
$this->deconnexion($conn);
return $query;
}

public function verifyLogIn ($email , $motdepass){
$query = $this->getLogInUsers($email, $motdepass);
$row = $query->rowCount();
$fetch = $query->fetch();
if($row > 0) {
    return $fetch;
} else {
    return false;
}
}



/*...........................signup......*/
public function insererUserModel($value1 , $value2 , $value3, $value4, $value5, $value6){
    $conn = $this->connexion($this->host , $this->dbName , $this->user , $this->password);
    $insert = "INSERT INTO users(mail,password,sexe,datenaissance,nom,prenom) VALUES('$value1', '$value2', '$value3 ','$value4','$value5','$value6')";
    $query = $this->requete($conn , $insert);
    $this->deconnexion($conn);
    return $query;
}



}

?>