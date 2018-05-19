<?php
session_start();


require __DIR__."/config/db.php";


if(isset($_POST) and !empty($_POST['pwd']) and !empty($_POST['login'])){
 

 
$login = $_POST['login'];
$pass = $_POST['pwd'];
    
    var_dump($login);
    var_dump($pass);
 
// Vérification des identifiants
$req = $db->prepare('SELECT * FROM wb_admin WHERE login_admin = :login_admin AND password_admin = :password_admin');
$req->execute([
    'login_admin' => $login,
    'password_admin' => $pass]);



$resultat = $req->fetch();
 
if (!$resultat)
{
    
    header("Location: error404.php");
    exit();
    
}
else
{
    session_start();
    $_SESSION['admin'] = $resultat['status_admin']; // la colonne categorie = 0,1,2 ... vis.admin,superadmin
    $_SESSION['login'] = $login;
   
    if($resultat['status_admin'] == 'administrateur'){
    echo 'Vous êtes connecté en tant qu\'administrateur !';
    header("Location: admin.php");
        exit();
    }
    else{
        echo 'Vous n\'avez pas acces à cette section du site !';
    }
    exit();
 
}
}




    ?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php
    require_once __DIR__.'/includes/css-head.php';
    ?>
    </head>

    <body>


        <div class="container mt-2">
            <div class="row justify-content-center">
               <div class="text-center mt-3">
               <img src="../assets/img/Logo-Wombere.png" alt="" class="img-fluid">
               <h1 class=" p-5">Espace d'administration du site Wombere</h1>
            </div>
            </div>
            <div class="row justify-content-center align-items-center ">
                <div class="login-form col-10 col-md-6">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <h4 class="modal-title mb-4">Se connecter en Administrateur</h4>
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input id="login" class="form-control" type="text" name="login" aria-describedby="LoginInsert" placeholder="login" required="required">

                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input id="password" class="form-control" type="password" name="pwd" aria-describedby="passwordInsert" placeholder="password" required="required">

                        </div>
                        <div class="form-group small clearfix">
                            <a href="#" class="forgot-link">Mot de passe oublié?</a>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Se connecter">
                    </form>

                </div>
            </div>
        </div>

   
   
   <!-- script start -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    </body>

    </html>