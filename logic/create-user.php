<?php
require('../config/connexion.php'); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);


    
    $query = $db->prepare('INSERT INTO users (email, password, first_name, last_name) VALUES (:email, :password, :first_name, :last_name)');

    $parameters = [
        'email' => $email,
        'password' => $password,
        'first_name' => $first_name,
        'last_name' => $last_name
    ];


    if ($query->execute($parameters)) {
        echo "L'utilisateur a été créé avec succès.";
    } else {
        echo "Erreur lors de la création de l'utilisateur.";
    }
} 
else {
    echo "Méthode de requête non autorisée.";
}
?>