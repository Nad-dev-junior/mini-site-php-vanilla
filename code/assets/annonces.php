<?php
require_once "../templates/header.php";
require_once "./lib/listing.php";
require_once "./lib/pdo.php";
require_once "./lib/category.php";


// A revoir;
$filters = [];
if (isset($_GET["search"]) && $_GET["search"] !== "") {
    $filters["search"] = $_GET["search"];
}
if (isset($_GET["min_price"]) && $_GET["min_price"] !== "") {
    $filters["min_price"] = $_GET["min_price"];
}
if (isset($_GET["max_price"]) && $_GET["max_price"] !== "") {
    $filters["max_price"] = $_GET["max_price"];
}
if (isset($_GET["category"])) {
    $filters["category"] = $_GET["category"];
}

$listings = getListings($pdo, $filters);
$categories = getCategories($pdo);
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
            <!-- à revoir -->
            <div class="p-3 border-bottom">
                <label for="category">Catégorie</label>
                <select name="category" id="category" class="form-select">
                    <option disabled value> -- catégorie -- </option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category["id"] ?>" <?php if ($category["id"] == $_GET["category"]) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?= $category["name"] ?></option>
                    <?php endforeach; ?>
                </select>
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