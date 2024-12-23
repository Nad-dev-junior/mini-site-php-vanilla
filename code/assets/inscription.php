<?php
require_once "../templates/header.php";
require_once "../assets/lib/user.php";
require_once "../assets/lib/pdo.php";

// ce code permet de faire une verification des données recupérer en post
// if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
//     $res = addUser($pdo, $_POST["username"],$_POST["email"], $_POST["password"]);
//     var_dump($res);
// }

$errors = [];
if($_SERVER["REQUEST_METHOD"] === "POST"){
   $verif= verifyUser($_POST);
   if($verif === true) {
    $resAdd= addUser($pdo, $_POST["username"],$_POST["email"],$_POST["password"]);
   } else{
      $errors= $verif ;
   }

}


?>
<h1>Inscription</h1>

<div class="form-signin w-100 m-auto">
<form action="" method="post">
<div class="mb-3">
    <label class="form-label"  for="usename">Nom d'utilisateur</label>
    <input class="form-control" type="text" name="username" id="username">
    <!-- ajouter un message erreur pour le champ username -->
    <?php  if(isset($errors["username"])){
      ?>  <div class="alert alert-danger " role="alert"> 
        <?= $errors["username"] ?>

      </div> 
    <?php } ?>
</div>
<div class="mb-3">
    <label class="form-label"  for="email">Entrer votre adresse email</label>
    <input class="form-control" type="email" name="email" id="email">
</div>
<div class="mb-3">
    <label class="form-label"  for="password">Mot de passe email</label>
    <input class="form-control" type="password" name="password" id="password">
</div>
<input class="btn btn-primary" type="submit" value="Enregistrer" name="add_user">
</form>
</div>



<?php
require_once "../templates/footer.php";
?>