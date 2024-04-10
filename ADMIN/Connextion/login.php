
<?php

if(isset($_POST['bot'])){

    include('../../bd/ConectionBD.php');

    $prenom= $_POST['user'];
    $password= $_POST['pass'];
    

session_start();


if(($prenom!="")&&($password!="")){
 
    $senten= $conection->prepare("SELECT * FROM Admin WHERE prenom=:prenom AND password=:passwords");
    $senten->bindParam(':prenom',$prenom);
    $senten->bindParam(':passwords',$password);
    $senten->execute();

    if($senten->fetchColumn()){

    $lic=$senten->fetch(PDO::FETCH_LAZY);
    $cssd=$lic['ID'];

      $_SESSION['valid']="ok";
      $_SESSION['present']=$prenom;
      $_SESSION['ccbda']=$cssd;
      
    }
 
    header('Location:../products/products.php'); 
   }
   else{
    $msj="Le nom d'utilisateur ou le mot de passe sont incorrects";
   }

}
   


?>

<!doctype html> 
<html lang="en">

<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0"> 
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

</head>

<body>
  <div class="containe">
    <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
            <br><br>
            <div class="card">
                <div class="card-header">
                    Connection
                </div>
                <div class="card-body">


                <?php if (isset($msj)) { ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $msj; ?>
                  </div>
                  
                 <?php } ?> 

                  <form method="post">
                    <div class="env">
                      <div class="mb-3">
                          <br>
                        <label class="form-label">Prenom</label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="Utilisateur">
                      </div>
                    </div>

                    <div class="env">
                      <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Mot de passe">
                      </div>
                    </div>
                    
                        
                        <button type="submit" value="se conecter" name="bot" id="bot" class="btn btn-primary">Se connecter</button>
                    
                   </form> 
                </div>
            </div>
        </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>