<?php 
require_once('model.php');
require_once('main_view.php');
require_once('recette_view.php');
require_once('news.php');
require_once('news_page.php');
require_once('healthy_view.php');
require_once('saison_view.php');
require_once('fete_view.php');
require_once('nutrition_view.php');
require_once('ingredient_page.php');
require_once('login_view.php');
require_once('signup.php');
require_once('profile_view.php');
require_once('client_recette_ingredient.php');
require_once('client_recette_etape.php');



















class ClientController {
   
    /*....................diapo.................................*/
   
    public function recupererDiapoController(){
        $modele = new ClientModel();
        return $modele->recupererDiapoModel();
    }
    public function recupererEntreesController(){
        $modele = new ClientModel();
        return $modele->recupererEntreeModel();
    }
    public function recupererPlatController(){
        $modele = new ClientModel();
        return $modele->recupererPlatModel();
    }

    public function recupererDessertController(){
        $modele = new ClientModel();
        return $modele->recupererDessertModel();
    }

    

    public function recupererBoissonController(){
        $modele = new ClientModel();
        return $modele->recupererBoissonModel();
    }


    
    public function afficherSiteClient(){
        $vueClient = new MainView ();
        $vueClient->afficherSite();
    }
    public function afficherSiteRecette(){
        $vueRecette = new RecetteView();
        $vueRecette->afficherSiteRecette();
    }
    public function afficherSiteNews(){
        $vueRecette = new NewsView();
        $vueRecette->afficherSiteNews();
    }
    public function afficherSiteNewsPage(){
        $vueRecette = new NewsPageView();
        $vueRecette->afficherSiteNewsPage();
    }
    public function afficherSiteHealthy(){
        $vueRecette = new HealthyView();
        $vueRecette->afficherSiteHealthy();
    }
    public function afficherSiteSaison(){
        $vueRecette = new SaisonView();
        $vueRecette->afficherSiteSaison();
    }
    public function afficherSiteFete(){
        $vueRecette = new FeteView();
        $vueRecette->afficherSiteFete();
    }
    public function afficherSiteNutrition(){
        $vueRecette = new NutritionView();
        $vueRecette->afficherSiteNutrition();
    }
    public function afficherSiteIngredientPage(){
        $vueRecette = new IngredientPageView();
        $vueRecette->afficherSiteIngredientPage();
    }
    /*..........................................recette............*/
    public function recupererRecetteControllerId($id){
        $modele = new ClientModel();
        return $modele->recupererRecetteModelId($id);
    }
    public function recupererIngredientControllerId($id){
        $modele = new ClientModel();
        return $modele->recupererIngredientModelId($id);
    }
    public function recupererEtapeControllerId($id){
        $modele = new ClientModel();
        return $modele->recupererEtapeModelId($id);
    }
    /*...................News..............*/

public function recupererNewsController(){
        $modele = new ClientModel();
        return $modele->recupererNewsModel();
    }
    public function recupererNewsControllerID($id){
        $modele = new ClientModel();
        return $modele->recupererNewsModelId($id);
    }
    public function recupererRecetteController(){
        $modele = new ClientModel();
        return $modele->recupererRecetteModel();
    }

/*........................healthy............................*/
public function recupererRecetteHealthyController(){
    $modele = new ClientModel();
    return $modele->recupererRecetteHealthyModel();
}
/*............................saison............*/
public function recupererRecetteSaisonController($saison){
    $modele = new ClientModel();
    return $modele->recupererRecetteSaisonModel($saison);
}

/*......................fete.....................*/
public function recupererRecetteFeteController(){
    $modele = new ClientModel();
    return $modele->recupererRecetteFeteModel();
}



public function recupererRecetteFeteFilterController($fete){
    $modele = new ClientModel();
    return $modele->recupererRecetteFeteFilternModel($fete);
}

 /*.................Nutrition.........*/
 public function recupererIngredientController(){
    $modele = new ClientModel();
    return $modele->recupererIngredientModel();
}
public function recupererIngredientsControllerId($id){
    $modele = new ClientModel();
    return $modele->recupererIngredientsModelId($id);
}

/*..................login.........*/
public function verifyLogInContoller ($email , $motdepass){
    $modele = new ClientModel();
    return $modele->verifyLogIn($email , $motdepass);
}



public function afficherLogIn (){
    $vueLogIn = new ViewLogIn();
    $vueLogIn->afficherSite();
}

/*.................signup.............*/
public function InsererUserContoller($value1 , $value2 , $value3, $value4, $value5, $value6){
    $modele = new ClientModel();
    return $modele->insererUserModel($value1 , $value2 , $value3, $value4, $value5, $value6);
}


public function afficherSignup (){
    $vueLogIn = new ViewSignup();
    $vueLogIn->afficherSite();
}
/*........................profil.................*/

public function recupererUserControllerId($id){
    $modele = new ClientModel();
    return $modele->recupererUserModelId($id);
}
public function afficherSiteprofile (){
    $vueLogIn = new profilView();
    $vueLogIn->afficherSiteprofile();
}

public function insererRecetteController($value1 , $value2 , $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12,$value13,$value14,$value15,$value16){
    $modele = new ClientModel();
    return $modele->insererRecetteModel($value1 , $value2 , $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12,$value13,$value14,$value15,$value16);
}


public function supprimerRecetteController($id,$idvar){
    $modele = new ClientModel();
    return $modele->supprimerRecetteModel($id,$idvar);
}



public function recupererRecetteUserController($id){
    $modele = new ClientModel();
    return $modele->recupererRecetteUserModel($id);
}


/*.................ingredientsrecette...........*/
public function recupererRecetteTitleController($id){
    $modele = new ClientModel();
    return $modele->recupererRecetteTitleModel($id);
}

public function insererRecetteIngredientController($value1 , $value2 , $value3, $value4, $value5, $value6){
    $modele = new ClientModel();
    return $modele->insererRecetteIngredientModel($value1 , $value2 , $value3, $value4, $value5, $value6);
}

public function recupererRecetteIngController($id){
    $modele = new ClientModel();
    return $modele->recupererRecetteIngModel($id);
}

public function afficherSiteIngredientRecette(){
    $vueAdministrateurupdate = new IngredientRecipeView();
    $vueAdministrateurupdate->afficherSiteIngredientRecette();
}





/*...........................etape................*/
public function insererRecetteEtapeController($value1 , $value2 , $value3, $value4){
    $modele = new ClientModel();
    return $modele->insererRecetteEtapeModel($value1 , $value2 , $value3, $value4);
}

public function recupererRecetteEtapeController($id){
    $modele = new ClientModel();
    return $modele->recupererRecetteEtapeModel($id);
}


public function afficherSiteEtapeRecette(){
    $vueAdministrateurupdate = new EtapeRecetteView();
    $vueAdministrateurupdate->afficherSiteEtapeRecette();
}





}



?>