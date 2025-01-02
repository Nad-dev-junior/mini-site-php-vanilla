<?php
require_once "./lib/pdo.php";
require_once "./lib/user.php";
require_once "../templates/header.php";
$errors = null;
// verfication mdp et email,si tout est bon ;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $users = verifyUserLoginPassword($pdo, $_POST["email"], $_POST["password"]);
    // var_dump($users), pour verifier lutilisateur et mdp sont bon;
    if ($users) {
        // gerer la session
        session_regenerate_id(true);
        $_SESSION["users"]= [
            "id" => $users["id"],
            "username" => $users["username"]
        ];
        // si la connexion ok ! rediriger vers la pge d'accueil
        header("location: index.php");
    } else {
        //afiché l'erreur,
        $errors= "Email ou mot de passe incorrect";
    }
}
?>

<div class=" form-signin w-100 m-auto">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Se connecter</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Adresse Email</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Mot de passe</label>
        </div>
        <!-- si l'utilisateur  entre un adresse email incorrect ou mdp  incorrect son mdp il faudra afiché l'erreur suivante: -->
        <?php if($errors): ?>
        <div class="alert alert-danger " role="alert">
            <?= $errors ?>

        </div>
        <?php endif; ?>
        <button class="btn btn-primary w-100 py-2" type="submit">connexion</button>
    </form>
</div>




<?php
require_once "../templates/footer.php";
?>