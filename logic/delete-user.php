<?php

require('../config/connexion.php'); 

$query = $db->prepare('DELETE FROM users WHERE id = :id');
$parameters = [
        'id' => $_GET['id']
    ];
    
$query->execute($parameters);


?>