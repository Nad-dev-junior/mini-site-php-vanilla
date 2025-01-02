<?php
require_once "../templates/header.php";
require_once "../assets/lib/listing.php";
require_once "../assets/lib/pdo.php";

// $_get permet de recuperer les parametre dans l'url , c'est un tableau associatif

// Question: pourquoi quand je fais $_post je ne vois âs le tableau détaillé?
// var_dump($_POST);
// var_dump(isset($_POST));
$error404 = false;

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $listing = getListingById($pdo, $id);
    // affiché une erreur si on ne trouve aucune annonce :
    if (!$listing) {
        $error404 = true;
    }
} else {
    $error404 = true;
}

?>

<div class="container col-xxl-12 px-4 py-5">
    <?php if (isset($listing) && $listing): ?>
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-4">
                <img src="./unploads/listingimg/<?= $listing["image"] ?>" class="d-block mx-lg-auto img-fluid" alt="<?= $listing["title"] ?>" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $listing["title"] ?></h1>
                <h2><?= $listing["price"] ?></h2>
                <p class="lead"><?= $listing["description"] ?></p>

            </div>
        </div>
    <?php else: ?>
        <h1>l'annoce est introuvable.</h1>
    <?php endif; ?>
</div>


<?php
require_once "../templates/footer.php";
?>