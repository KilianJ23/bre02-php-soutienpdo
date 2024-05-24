<?php

require('../config/connexion.php'); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);

$query = $db->prepare('UPDATE users SET email = :email, password = :password, first_name = :first_name, last_name = :last_name WHERE id = :id');

$parameters = [
        'email' => $email,
        'password' => $password,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'id' => $id
    ];
    
$query->execute($parameters);
$user = $query->fetch(PDO::FETCH_ASSOC);
}

?>