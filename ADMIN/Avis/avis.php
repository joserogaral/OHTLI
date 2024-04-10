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

$ID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$sentenciamsg = $conection->prepare("SELECT * FROM OHTLI_Avis");
$sentenciamsg->execute();
$list = $sentenciamsg->fetchALL(PDO::FETCH_ASSOC);

switch ($accion) {

    case "Supprimer":
        $sentenciamsg = $conection->prepare("DELETE FROM OHTLI_Avis WHERE ID=:ID");
        $sentenciamsg->bindParam(':ID', $ID);
        $sentenciamsg->execute();
        header("Location:avis.php");
        break;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="avis.css">
    <title>Avis</title>
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
                    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="modalTitleId">
                                        Avis
                                    </h2>
                                </div>
                                <?php foreach ($list as $book) { ?>
                                    <div class="modal-body" style="text-align: center;">
                                        <h4><?php echo $book['Avis'] ?></h4>
                                    </div>
                                <?php } ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="titu">
                        <h3>A V I S</h3>
                    </div>
                    <div class="contt">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Avis</th>
                                    <th>Nom</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $book) { ?>
                                    <tr>
                                        <td><?php echo $book['DateAvis'] ?></td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#modalId">Voir Avis</a>
                                        </td>
                                        <td><?php echo $book['NomAvis'] ?></td>

                                        <td>
                                            <form class="orl" method="post">
                                                <input type="hidden" name="ID" id="ID" value="<?php echo $book['ID'] ?>" />
                                                <input type="submit" name="accion" value="Supprimer" class="btn btn-danger btn-lg" />
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>