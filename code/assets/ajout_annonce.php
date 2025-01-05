<?php
require_once "../templates/header.php";
require_once "./lib/category.php";
require_once"./lib/pdo.php";

$categories = getCategories($pdo);
?>
<div class="form-listing w-100 m-auto">

    <h1>Ajouter une annonce</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label" for="title">Titre</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Prix</label>
            <input class="form-control" type="number" name="price" id="price">
        </div>
        <div class="mb-3">
            <label class="form-label" for="Description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Catégories</label>
            <select name="category" id="category" class="form-select">

                <?php
                foreach ($categories as $key => $category) { ?> <option value="<?= $key ?>"><?= $category["name"] ?> </option>
                <?php
                }
                ?>

            </select>
        </div>


        <a type="button" class="btn btn-primary" href="inscription.php">Enregistrer</a>
    </form>


</div>





<?php
require_once "../templates/footer.php";
?>