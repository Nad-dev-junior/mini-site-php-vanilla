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
function verifyUser($users): array|bool 
{
  $errors = [];
  if (isset($users["username"])){
    if($users["username"] === ""){
        $errors["username"] = "le champ username est obligatoir";
    }
  }else{
    $errors["username"] = "le champ username n'as été envoyé";
  }
  
  if (isset($users["email"])){
    if($users["email"] === ""){
        $errors["email"] = "le champ email est obligatoir";
    }else{
        if(!filter_var($users["email"], FILTER_VALIDATE_EMAIL)){
            $errors["email"] = " le format email n'est pas respecté ";
        }
    }
  }else{
    $errors["email"] = "le champ email n'as été envoyé";
  }

  if (isset($users["password"])){
    if(strlen( $users["password"]) < 8 ){
        $errors["password"] = "le  mot de passe doit faire au moins 8 caractéres ";
    }
  }else{
    $errors["password"] = "le champ username n'as été envoyé";
  }
  if(count($errors)){
    return $errors ;
  }else{
    return true;
  }

}

// partie conexion

function verifyUserLoginPassword( PDO $pdo, string $email, string $password ):bool|array {
    $query= $pdo -> prepare("SELECT id,username, email, password FROM users WHERE  email= :email");
    $query->bindValue(":email",$email);
    $query->execute();
    $users = $query->fetch(PDO::FETCH_ASSOC);
    // verifier lutilisateur et mdp sont bon;
    if($users && password_verify($password, $users["password"])){
       return $users;
    }else{
        return false ;
    }

}
?>