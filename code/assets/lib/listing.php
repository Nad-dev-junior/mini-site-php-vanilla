<?php

function getListings(): array
{
    return [
        ["title" => "test1", "price" => "25€", "image" => "rocket-league.jpg" , "description" => "l'article idéal pour vous."],
        ["title" => "test2", "price" => "22€", "image" => "rocket-league.jpg" , "description" => "l'article idéal pour vous."],
        ["title" => "test3", "price" => "30€", "image" => "rocket-league.jpg" , "description" => "l'article idéal pour vous."],
    ];
}

function getListingById(int $id): array{
    $listings= getListings();
    return $listings[$id];
}
