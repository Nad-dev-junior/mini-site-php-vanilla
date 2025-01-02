<?php

function getListings(PDO $pdo): array
{
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
    $sql = "SELECT listing.id , listing.title , listing.description , listing.image, listing.price  FROM listing WHERE listing.id = :id " ;

    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC); 
}
