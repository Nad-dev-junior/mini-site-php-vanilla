<?php

function getListings(PDO $pdo, array $filters = []): array
{
// a revoir pour bien comprendre
    // ce code permet de mettre un systeme de filtre 
    $orderBy = "listing.id DESC";
    $relevance = "";
    $conditions = [];
    if (isset($filters["search"])) {
        $match = "MATCH(title) AGAINST(:search)";
        $conditions[] =  $match;
        $relevance =  ", $match as relevance";
        $orderBy = "relevance DESC";
    }
    if (isset($filters["min_price"])) {
        $conditions[] = "price >= :min_price";
    }
    if (isset($filters["max_price"])) {
        $conditions[] = "price <= :max_price";
    }
    if (isset($filters["category"])) {
        $conditions[] = "category_id = :category";
    }
    $where = $conditions ? " WHERE " . implode(" AND ", $conditions) : "";
    $sql = "SELECT listing.id, listing.title, listing.description, listing.image, listing.price
                $relevance
                FROM listing
                $where";

    $query = $pdo->prepare($sql);
    if (isset($filters["search"])) {
        $query->bindValue(":search", "%{$filters["search"]}%");
    }
    if (isset($filters["min_price"])) {
        $query->bindValue(":min_price", $filters["min_price"]);
    }
    if (isset($filters["max_price"])) {
        $query->bindValue(":max_price", $filters["max_price"]);
    }
    if (isset($filters["category"])) {
        $query->bindValue(":category", $filters["category"], PDO::PARAM_INT);
    }
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);


    //////////////////////////////////////////
    // Faire un tableau en dure pour faire les gabaries avant d'utiliser les données de la bdd ;
    // return [
    //     ["title" => "test1", "price" => "25€", "image" => "rocket-league.jpg" , "description" => "larticle idéal pour vous."],
    //     ["title" => "test2", "price" => "22€", "image" => "rocket-league.jpg" , "description" => "larticle idéal pour vous."],
    //     ["title" => "test3", "price" => "30€", "image" => "rocket-league.jpg" , "description" => "larticle idéal pour vous."],
    // ];


    // le code suivant permet de recuperer toutes les annonces enregistrer dans la bdd ;
    $sql = "SELECT listing.id , listing.title , listing.description , listing.image, listing.price  FROM listing";

    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// la fonction suivante permet d' afficher chaque annonce en fonction de son id 

function getListingById(PDO $pdo, int $id): array|bool
{
    $sql = "SELECT listing.id , listing.title , listing.description , listing.image, listing.price  FROM listing WHERE listing.id = :id ";

    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
