<?php
require_once "../templates/header.php";
require_once "./lib/listing.php";
require_once "./lib/pdo.php";

$listings = getListings($pdo);
?>

<div class="row">
    <h1 class="pb-2 border-bottom" >Les annonces</h1>
    <div class="col-md-3">
        <form action="" method="get">
            <h2>Filtres</h2>
            <div class="p-3 border-bottom">
                <input name="search" type="text"  id="search" class="form-control" placeholder="Rechercher">
            </div>
            <div class="p-3 border-bottom">
                <label for="price">Prix</label>
                <div class="input-group">
                    <input name="min-price" type="number"  id="min-price" class="form-control" placeholder="prix-minimum">
                    <span class="input-group-text">€</span>
                </div>
                <div class="input-group">
                    <input name="max-price"  type="number" id="max-price" class="form-control" placeholder="prix-maximum">
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary  w-100">Filtrer</button>
            </div>
        </form>
    </div>

    <div class="col-md-9">
        <div class="row">
            <?php
            foreach ($listings as $key => $listing) {
                require "../templates/listing_part.php";
            }

            ?>
        </div>

    </div>

</div>


<?php
require_once "../templates/footer.php";
?>