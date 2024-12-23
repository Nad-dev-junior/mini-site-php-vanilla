<?php
function addUser(PDO $pdo, string $username, string $email, string $password):bool
{
 
    $query = $pdo ->prepare("INSERT INTO users(username, email, password) VALUES (:username, :email, :password)");
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);

    return $query->execute();
}


//cette permet de rendre obligatoir le champ username
function verifyUser($user): array|bool 
{
  $errors = [];
  if (isset($user["username"])){
    if($user["username"] === ""){
        $errors["username"] = "le champ username est obligatoir";
    }
  }else{
    $errors["username"] = "le champ username n'as été envoyé";
  }
  if(count($errors)){
    return $errors ;
  }else{
    return true;
  }

}

?>