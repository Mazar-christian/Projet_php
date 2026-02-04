<?php 
session_start();
if(isset($valider)){
    require_once('connexion_base.php');
    $connexion = new connexion_base();
    $connection=$connexion->getconnexion();
    $connection=$connexion->prepare('SELECT * FROM gest_sportive WHERE nom:nom ');
    $connexion=execute([$_POST['nom']]);
    $utilisateur=$connexion->fetch();

    // definitions des éléments du session

    if($utilisateur && $_POST['password']==$utilisateur['password']){
        $_SESSION['nom']=$utilisateur['nom'];
        $_SESSION['prenom']=$utilisateur['prenom'];

    }

    // definition du cookie
    setcookie('user_login',$utilisateur['nom'], time()+24*3200,'/');  //j'ai defini la durée de vie du cookie et en plus de ça j'ai precisé qu'il sera sur toute les pages 
    header('Location:index.php');
    exit();
}else{
    echo" email ou mot de passe invalide "; 
}



?>
<?php include('header.php');?>

<form method="POST" action="traitementConnexion.php" class="bg-success p-2 text-white bg-opacity-75>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" name="email">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" name="password">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" name="cocher" value="oui">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="valider">Valider</button>
</form>

<?php include('footer.php');?>