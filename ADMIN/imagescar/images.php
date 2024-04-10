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
$Date = date("y/m/d");
$Imgl = (isset($_FILES['ph']['name'])) ? $_FILES['ph']['name'] : "";
$Imgle = (isset($_FILES['phe']['name'])) ? $_FILES['phe']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$sentenciamsg = $conection->prepare("SELECT * FROM OHTLI_lookbook");
$sentenciamsg->execute();
$list = $sentenciamsg->fetchALL(PDO::FETCH_ASSOC);


switch ($accion) {

    case "Ajouter":
        $link = mysqli_connect("localhost", "root", "", "OHTLI");
        $res = mysqli_query($link, "SELECT * FROM OHTLI_lookbook");
        
        $fila = mysqli_num_rows($res);
        
        
        if($fila <= 5){
            $sentenciamsg = $conection->prepare("INSERT INTO OHTLI_lookbook (DateLK, Imglk) VALUES (:DateLK, :Imglk);");
            $sentenciamsg->bindParam(':DateLK', $Date);
            $DateLK = new DateTime();

            $nomar = ($Imgl != "") ? $DateLK->getTimestamp() . "_" . $_FILES["ph"]["name"] : "imagen.jpg";
            $tmimg = $_FILES["ph"]["tmp_name"];

            if ($nomar != "") {

                move_uploaded_file($tmimg, "../../images/" . $nomar);
            }

            $sentenciamsg->bindParam(':Imglk', $nomar);
            $sentenciamsg->execute();
            header("Location:images.php");
        }
        else{
            $mssggdd= "Il n'est possible de télécharger que 6 images";
        }
        break;

    case "Valider":
        $sentenciamsg = $conection->prepare("UPDATE OHTLI_lookbook SET DateLK=:DateLK WHERE ID=:ID");
        $sentenciamsg->bindParam(':ID', $ID);
        $sentenciamsg->bindParam(':DateLK', $Date);
        $sentenciamsg->execute();

        if ($Imgle != "") {

            $datet = new DateTime();
            $nomare = ($Imgle != "") ? $datet->getTimestamp() . "_" . $_FILES["phe"]["name"] : "imagen.jpg";
            $tmimge = $_FILES["phe"]["tmp_name"];

            move_uploaded_file($tmimge, "../../images/" . $nomare);

            $sentenciamsg = $conection->prepare("SELECT Imglk FROM OHTLI_lookbook WHERE ID=:ID");
            $sentenciamsg->bindParam(':ID', $ID);
            $sentenciamsg->execute();
            $lilist = $sentenciamsg->fetch(PDO::FETCH_LAZY);

            if (isset($lilist["Imglk"]) && ($lislist["Imglk"] != "imagen.jpg")) {
                if (file_exists("../../images/" . $lilist["Imglk"])) {
                    unlink("../../images/" . $lilist["Imglk"]);
                }
            }

            $sentenciamsg = $conection->prepare("UPDATE OHTLI_lookbook SET DateLK=:DateLK, Imglk=:Imglk WHERE ID=:ID");
            $sentenciamsg->bindParam(':ID', $ID);
            $sentenciamsg->bindParam(':DateLK', $Date);
            $sentenciamsg->bindParam(':Imglk', $nomare);
            $sentenciamsg->execute();
        }
        header("Location:images.php");
        break;

    case "Modifier":
        $sentenciamsg = $conection->prepare("SELECT * FROM OHTLI_lookbook WHERE ID=:ID");
        $sentenciamsg->bindParam(':ID', $ID);
        $sentenciamsg->execute();
        break;

    case "Supprimer":
        $sentenciamsg = $conection->prepare("DELETE FROM OHTLI_lookbook WHERE ID=:ID");
        $sentenciamsg->bindParam(':ID', $ID);
        $sentenciamsg->execute();
        header("Location:images.php");
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
    <link rel="stylesheet" href="images.css">
    <title>Imagescar</title>
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
                <div class="titu">
                    <h3>I M A G E S <br> L O O K B O O K</h3>
                    <form class="orl1" method="post" enctype="multipart/form-data">
                        <div class="acomod">
                            <label for="" class="form-label">Ajouter une image</label>
                            <?php if(isset($mssggdd)) { ?>
                            <h5><?php echo $mssggdd; ?></h5>
                            <?php } ?>
                            <input type="file" value="" name="ph" id="ph" class="form-control" required />
                        </div>
                        <div>
                            <input type="submit" name="accion" value="Ajouter" class="btn btn-primary btn-lg" />
                        </div>
                    </form>
                </div>
                <div class="contt">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date de mise à jour</th>
                                <th>Image</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $book) { ?>
                                <tr>
                                    <td><?php echo $book['DateLK'] ?></td>
                                    <td>
                                        <a href="../../images/<?php echo $book['Imglk']; ?>">Voir image</a>
                                    </td>
                                    <td>
                                        <form class="orl" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="ID" id="ID" value="<?php echo $book['ID'] ?>" />
                                            <input type="submit" name="accion" value="Supprimer" class="btn btn-danger btn-lg" />
                                            <input data-bs-toggle="modal" data-bs-target="#modalId<?php echo $book['ID']; ?>" type="button" value="Modifier" class="btn btn-warning btn-lg" />
                                        </form>
                                    </td>
                                </tr>
                        </tbody>

                        <div class="modal fade" id="modalId<?php echo $book['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modalTitleId">Modifier image</h2>
                                    </div>
                                    <div class="modal-body" style="text-align: center;">
                                        <form class="acmci" method="post" enctype="multipart/form-data">
                                            <div>
                                                <input type="file" name="phe" id="phe">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="ID" id="ID" value="<?php echo $book['ID'] ?>"></input>
                                        <button type="submit" name="accion" value="Valider" data-bs-dismiss="modal" class="btn btn-primary btn-lg">Valider</button>
                                        <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>     
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>