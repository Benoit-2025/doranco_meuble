<?php
// appel de la conexion à la BDD
require_once "init.php";

// ecriture de ma requete
$requete = $bdd->prepare("SELECT * FROM produit");

//exection de la requete
$requete->execute();

//récupération des données à l'interieur de l'object
$produits = $requete->fetchAll(PDO::FETCH_ASSOC);

debug($produits);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
</head>
<body>
<h1 class="text-center mt-4">Boutique</h1>

<!-- div.container>div.d-flex.flex-wrap.justify-content-evenly -->
<div class="container">
    <div class="d-flex flex-wrap justify-content-evenly">
        <!-- Affichage des nos produits -->
        <?php foreach($produits as $produit){ ?>        
            <div class="card my-3" style="width: 16rem;">
                <img class="card-img-top"  src="./photos/<?php echo $produit['photo'] ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit ['titre'] ?></h5>
                    <p class="card-text"><?php echo $produit['description'] ?></p>
                    <span class="fs-5 badge bg-success rounded-pill" ><?php echo $produit['prix'] ?>€</span>
                </div>
            </div>
        <?php } ?>    
    </div>
</div>
    
<!-- Js BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>