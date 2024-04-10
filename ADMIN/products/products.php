<?php
session_start();

if(!isset($_SESSION['valid'])) {
    header("Location:../Connextion/login.php");

}else{
  if($_SESSION['valid']=="ok"){

    $nouse=$_SESSION["present"];
    $noupm=$_SESSION["ccbda"];
    
  }
}
?>
<?php
include('../../bd/ConectionBD.php');

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$SKU = (isset($_POST['SKU'])) ? $_POST['SKU'] : "";
$Stockprod = (isset($_POST['Sto1'])) ? $_POST['Sto1'] : "";


$sentenciatrs = $conection->prepare("SELECT * FROM OHTLI_Wave");
$sentenciatrs->execute();
$lis = $sentenciatrs->fetchALL(PDO::FETCH_ASSOC);

switch ($accion) {

    case "Sauver":
        $sentencia = $conection->prepare("UPDATE OHTLI_Wave SET Stockprod=:Stock WHERE SKU=:SKU");
        $sentencia->bindParam(':SKU', $SKU);
        $sentencia->bindParam(':Stock', $Stockprod);
        $sentencia->execute();
        break;
        break;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="products.css">
    <title>Products</title>
</head>

<body>
    <div class="cmmlk">
        <div class="container22">
            <div class="ancho">
                <nav class="men11">
                    <a href="../products/products.php">
                        <span class="material-symbols-outlined">add_box</span>
                        <h3>Products</h3>
                    </a>
                    <a href="../messages/messages.php">
                        <span class="material-symbols-outlined">mail</span>
                        <h3>Messages</h3>
                    </a>
                    <a href="../ventes/ventes.php">
                        <span class="material-symbols-outlined">storefront</span>
                        <h3>Ventes</h3>
                    </a>
                    <a href="../Transparence/transparence.php">
                        <span class="material-symbols-outlined">check_circle</span>
                        <h3>Transparence</h3>
                    </a>
                    <a href="../imagescar/images.php">
                        <span class="material-symbols-outlined">imagesmode</span>
                        <h3>LookBook images</h3>
                    </a>
                    <a href="../Avis/avis.php">
                        <span class="material-symbols-outlined">rate_review</span>
                        <h3>Avis</h3>
                    </a>
                    <a href="../deconexion/deconexion.php">
                        <span class="material-symbols-outlined">logout</span>
                        <h3>Deconnexion</h3>
                    </a>
                </nav>
            </div>
        </div>
        <div class="ttyydd">
            <div class="container">
                <div class="mllv">
                    <h1>Bienvenue</h1><br>
                    <h2>Products</h2>
                </div>

                <div class="rowee">
                    <div class="prod">
                        <button href="" data-bs-toggle="modal" data-bs-target="#modalId" value="selectioner">
                            <img src="../../images/img/Botella.png" alt="">
                            <h1>WAVE</h1>
                        </button>
                    </div>
                    <div class="prod">
                        <button href="" data-bs-toggle="modal" data-bs-target="#modalIdph">
                            <img src="../../images/img/cactus123.png" alt="">
                            <h1>CACTUS</h1>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>













    <div>


        <!-- Modal -->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            <h4>Stock</h4>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="ordcen">
                                <h2>Stock Disponible</h2>
                            </div>
                            <div class="ord">
                                <?php foreach ($lis as $book) { ?>
                                    <div class="rowi">
                                        <h3><?php echo $book['Nonprod'] ?></h3>
                                        <input type="text" name="Sto<?php echo $book['SKU'] ?>" id="Sto<?php echo $book['SKU'] ?>" value="<?php echo $book['Stockprod'] ?>" />
                                        <input type="text" name="SKU<?php echo $book['SKU'] ?>" id="SKU<?php echo $book['SKU'] ?>" value="<?php echo $book['SKU'] ?>" />
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" name="accion" value="Sauver" class="btn btn-primary">Sauver</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



    <div>


        <!-- Modal -->
        <div class="modal fade" id="modalIdph" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            <h4>Stock</h4>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ordcen">
                            <h2>Stock Disponible</h2>
                        </div>
                        <div class="ord">
                            <div class="rowi">
                                <h3>CACTUS BORDEAUX: </h3>
                                <input v-model="stock.Bordeaux" />
                            </div>
                            <div class="rowi">
                                <h3>CACTUS VERT:</h3>
                                <input v-model="stock.Vert" />
                            </div>
                            <div class="rowi">
                                <h3>CACTUS NOIR:</h3>
                                <input v-model="stock.Noir" />
                            </div>
                            <div class="rowi">
                                <h3>CACTUS BEIGE:</h3>
                                <input v-model="stock.Beige" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Fermer
                        </button>
                        <button type="button" class="btn btn-primary">Sauver</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>