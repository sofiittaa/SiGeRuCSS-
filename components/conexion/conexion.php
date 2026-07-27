<?php

try {
   $pdo = new PDO('mysql:
host=localhost;
dbname=SiGeRu',
'sofiittaa', 
'sofi123.20');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


?>