<?php



function getCategories(PDO $pdo)
{
    $sql = "SELECT * FROM category";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


//tableau en dur des categories
// function getCategory(): array{

//    return  [
//     ["name" => "jeux vidéo", "icon" => "controller"],
//     ["name" => "vetements", "icon" => "tag"],
//     ["name" => "meubles", "icon" => "lamp"],
//    ]; 

// }


?>