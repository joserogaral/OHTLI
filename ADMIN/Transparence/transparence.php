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

$vpop1 = $_POST['mois'];
$ds = $_GET['year'];
$Date = date("y/m/d");
$ph = (isset($_FILES['ph']['name'])) ? $_FILES['ph']['name'] : "";
$phe = (isset($_FILES['phe']['name'])) ? $_FILES['phe']['name'] : "";
$ID = (isset($_POST['ID'])) ? $_POST['ID'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$sentenciatrs = $conection->prepare("SELECT * FROM OHTLI_Trnprs WHERE Agno=:agno");
$sentenciatrs->bindParam(':agno', $ds);
$sentenciatrs->execute();
$lis = $sentenciatrs->fetchALL(PDO::FETCH_ASSOC);

switch ($accion) {

    case "Ajouter":
        $sentenciamsg = $conection->prepare("INSERT INTO OHTLI_Trnprs (DateArch, Month, Agno, Arch) VALUES (:DateArch, :Month, :agno, :Arch);");
        $sentenciamsg->bindParam(':DateArch', $Date);
        $sentenciamsg->bindParam(':Month', $vpop1);
        $sentenciamsg->bindParam(':agno', $ds);

        $fecha = new DateTime();
        $nomar = ($ph != "") ? $fecha->getTimestamp() . "_" . $_FILES["ph"]["name"] : "imagen.jpg";

        $tmimg = $_FILES["ph"]["tmp_name"];

        if ($nomar != "") {

            move_uploaded_file($tmimg, "../../Fichi/" . $nomar);
        }

        $sentenciamsg->bindParam(':Arch', $nomar);
        $sentenciamsg->execute();

        break;

    case "Modifier":
        $sentenciamsg = $conection->prepare("SELECT * FROM OHTLI_lookbook WHERE ID=:ID");
        $sentenciamsg->bindParam(':ID', $ID);
        $sentenciamsg->execute();
        break;

    case "Supprimer":
        $sentenciamsg = $conection->prepare("DELETE FROM OHTLI_Trnprs WHERE ID=:ID");
        $sentenciamsg->bindParam(':ID', $ID);
        $sentenciamsg->execute();
        header("Location:transparence.php");
        break;

    case "Valider":
        $sentenciamsg = $conection->prepare("UPDATE OHTLI_Trnprs SET DateArch=:DateArch, Month=:Month WHERE ID=:ID");
        $sentenciamsg->bindParam(':ID', $ID);
        $sentenciamsg->bindParam(':DateArch', $Date);
        $sentenciamsg->bindParam(':Month', $vpop1);
        $sentenciamsg->execute();

        if ($phe != "") {

            $datet = new DateTime();
            $nomare = ($phe != "") ? $datet->getTimestamp() . "_" . $_FILES["phe"]["name"] : "imagen.jpg";
            $tmimge = $_FILES["phe"]["tmp_name"];

            move_uploaded_file($tmimge, "../../Fichi/" . $nomare);

            $sentenciamsg = $conection->prepare("SELECT Arch FROM OHTLI_Trnprs WHERE ID=:ID");
            $sentenciamsg->bindParam(':ID', $ID);
            $sentenciamsg->execute();
            $lilist = $sentenciamsg->fetch(PDO::FETCH_LAZY);

            if (isset($lilist["Arch"]) && ($lislist["Arch"] != "imagen.jpg")) {
                if (file_exists("../../Fichi/" . $lilist["Arch"])) {
                    unlink("../../Fichi/" . $lilist["Arch"]);
                }
            }

            $sentenciamsg = $conection->prepare("UPDATE OHTLI_Trnprs SET DateArch=:DateArch, Month=:Month, Arch=:Arch WHERE ID=:ID");
            $sentenciamsg->bindParam(':ID', $ID);
            $sentenciamsg->bindParam(':DateArch', $Date);
            $sentenciamsg->bindParam(':Month', $vpop1);
            $sentenciamsg->bindParam(':Arch', $nomare);
            $sentenciamsg->execute();
        }

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
    <link rel="stylesheet" href="transparence.css">
    <title>Transparence</title>
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
                    <h3>T R A N S P A R E N C E</h3>
                    <div class="ctrl1">
                        <form class="orl1" method="get">
                            <h2>Selectioner anée</h2>
                            <select name="year">
                                <option value="<?php echo $ds ?>"><?php echo $ds ?></option>
                                <?php
                                $year = date("Y");
                                for ($i = 2020; $i <= $year; $i++) {
                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                }
                                ?>
                            </select>

                            <div class="bbnnttyy">
                                <input type="submit" value="Chercher" class="btn btn-primary btn-lg" />
                            </div>
                        </form>
                        <div>
                            <button data-bs-toggle="modal" data-bs-target="#modalId" class="btn btn-primary btn-lg">ADD</button>
                        </div>
                    </div>
                </div>
                <div class="contt">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date de mise à jour</th>
                                <th>Mois</th>
                                <th>Document</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <?php foreach ($lis as $trssq) { ?>
                            <tbody class="bidtr">

                                <tr>
                                    <td><?php echo $trssq['DateArch'] ?></td>
                                    <td><?php echo $trssq['Month'] ?></td>
                                    <td>
                                        <a href="../../Fichi/<?php echo $trssq['Arch'] ?>">Fichier</a>
                                    </td>
                                    <td>
                                        <form class="orl" method="post">
                                            <input type="hidden" name="ID" id="ID" value="<?php echo $trssq['ID'] ?>" />
                                            <input type="submit" name="accion" value="Supprimer" class="btn btn-danger btn-lg" />
                                            <input type="button" data-bs-toggle="modal" data-bs-target="#modalId<?php echo $trssq['ID'] ?>" value="Modifier" class="btn btn-warning btn-lg" />
                                        </form>
                                    </td>
                                </tr>

                            </tbody>




                            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="modalTitleId">Modifier image</h2>
                                        </div>
                                        <div class="modal-body" style="text-align: center;">
                                            <form class="acmci" method="post" enctype="multipart/form-data">
                                                <div>


                                                    <div class="send">
                                                        <label for="">Mois</label>
                                                        <select name="mois" id="">
                                                            <option value="<?php echo $trssq['Month'] ?>"><?php echo $trssq['Month'] ?></option>
                                                            <option value="Janvier">Janvier</option>
                                                            <option value="Febrier">Febrier</option>
                                                            <option value="Mars">Mars</option>
                                                            <option value="April">April</option>
                                                            <option value="Mai">Mai</option>
                                                            <option value="Juin">Juin</option>
                                                            <option value="Juille">Juille</option>
                                                            <option value="Aout">Aout</option>
                                                            <option value="Septembre">Septembre</option>
                                                            <option value="Octobre">Octobre</option>
                                                            <option value="Novembre">Novembre</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="send">
                                                        <input type="file" name="ph" id="ph">
                                                    </div>



                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="accion" value="Ajouter" data-bs-dismiss="modal" class="btn btn-primary btn-lg"></input>
                                            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="modalId<?php echo $trssq['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="modalTitleId">Modifier image</h2>
                                        </div>
                                        <div class="modal-body" style="text-align: center;">
                                            <form class="acmci" method="post" enctype="multipart/form-data">
                                                <div>
                                                    <div class="send">
                                                        <label for="">Mois</label>
                                                        <select name="mois" id="">
                                                            <option value="<?php echo $trssq['Month'] ?>"><?php echo $trssq['Month'] ?></option>
                                                            <option value="Janvier">Janvier</option>
                                                            <option value="Febrier">Febrier</option>
                                                            <option value="Mars">Mars</option>
                                                            <option value="April">April</option>
                                                            <option value="Mai">Mai</option>
                                                            <option value="Juin">Juin</option>
                                                            <option value="Juille">Juille</option>
                                                            <option value="Aout">Aout</option>
                                                            <option value="Septembre">Septembre</option>
                                                            <option value="Octobre">Octobre</option>
                                                            <option value="Novembre">Novembre</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="send">
                                                        <label for=""> Ajouter fichier</label>
                                                        <input type="file" name="phe" id="phe">
                                                    </div>
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="ID" id="ID" value="<?php echo $trssq['ID'] ?>" />
                                            <input type="submit" name="accion" value="Valider" data-bs-dismiss="modal" class="btn btn-primary btn-lg"></input>
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