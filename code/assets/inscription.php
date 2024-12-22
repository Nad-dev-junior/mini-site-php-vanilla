<?php
require_once "../templates/header.php";
?>
<h1>Inscription</h1>

<div class="form-signin w-100 m-auto">
<form action="" method="post">
<div class="mb-3">
    <label class="form-label"  for="usename">Nom d'utilisateur</label>
    <input class="form-control" type="text" name="username" id="username">
</div>
<div class="mb-3">
    <label class="form-label"  for="email">Entrer votre adresse email</label>
    <input class="form-control" type="email" name="email" id="email">
</div>
<div class="mb-3">
    <label class="form-label"  for="password">Mot de passe email</label>
    <input class="form-control" type="passwor" name="password" id="password">
</div>
<input class="btn btn-primary" type="submit" value="Enregistrer">
</form>
</div>



<?php
require_once "../templates/footer.php";
?>