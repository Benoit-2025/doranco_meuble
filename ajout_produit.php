<?php
//#################require de ini.php #########################

require_once "init.php";
/**
 * 4 status de fichier sur git
 *      -untrack => les fichiers créé mais on suivis par git
 *      - tracked => fichier deje suivit par git  mais non envoyé vers le respository
 *      
 *      -straged => les fichiers suivi, enrégistré mais non envoyé vers le respository
 * 
 *      - commitred => tous les fichiers envoyé et non modifierde mon projet 
 */

if( !empty($_POST) ){

    debug($_POST);
    debug($_FILES);

    if( !empty($_FILES['photo']['name']) ){
        copy($_FILES['photo']['tmp_name'], 'photos/'. time() . '-'. $_FILES['photo']['name']);
    }




    $requete = $bdd->prepare("INSERT INTO produit VALUES (NULL, :titre, :prix, :description, :photo)");
 $success = $requete->execute([
    "titre" => $_POST["titre"],
    "prix" => $_POST["prix"],
    "description" => $_POST["description"],
    "photo" => time() . '-' .$_FILES["photo"]["name"]
 ]);

 if($success){
   
    $successMessage = "Youhou ç fonctionne";
 } else {
    $errorMessage = "Nope !";
 }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout prouduit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="text-center mt-3">Ajout produit</h1>
     
    <?php
    if(!empty($successMessage)){
        echo '<div class="alert alert-successs col-md-6 mx-auto text-center">';
        echo $errorMessage;
        echo '</div>';
    }
    if(!empty($errorMessage)){
        echo '<div class="alert alert-danger col-md-6 mx-auto text-center">';
        echo $errorMessage;
        echo '</div>';
    }
     ?>

    <form class="col-md-6 mx-auto" action="" method="post" enctype="multipart/form-data">

        <label class="form-label" for="titre">Titre</label>
        <input class="form-control" type="text" name="titre" id="titre">
    
        <label class="form-label" for="prix">Prix</label>
        <input class="form-control" type="number" name="prix" id="prix" step=".1">

        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>

        <label class="form-label" for="photo">Photo</label>
        <input class="form-control" type="file" name="photo" id="photo">

        <button class="btn btn-primary d-block mx-auto mt-3">Ajouter</button>

    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>