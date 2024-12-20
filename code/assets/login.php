<?php
require_once "../templates/header.php";
 var_dump($_GET);
?>

<div class=" form-signin w-100 m-auto">
    <form method="get">
        <h1 class="h3 mb-3 fw-normal">Se connecter</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Adresse Email</label>
        </div>
        <div class="form-floating">
            <input name="passwors" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Mot de passe</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
</div>




<?php
require_once "../templates/footer.php";
?>