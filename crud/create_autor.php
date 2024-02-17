<?php
// Include the bootstrap file for Doctrine EntityManager setup

require_once "../bootstrap.php";
require_once "../src/entities/Autor.php";
require_once "../src/entities/Livre.php";



use App\entities\Autor;
// Create a new autor object
$autor = new Autor();
// Set the autor details
$autor->setName("Mariama ba");
$autor1->setName("SENGHOR");


use App\entities\Livre;
$livre1 = new Livre();
$livre1->setName('si long lettre 1');
$livre1->setAutor($autor);
$autor->addLivre($livre1);
$livre2 = new Livre();
$livre2->setName('NAFI');
$livre2->setAutor($autor);
$autor->addLivre($livre2);



// Persist the product to the database
$entityManager->persist($autor);
$entityManager->flush();

// Get the ID of the inserted product
$autorId = $autor->getId();

echo "Product inserted successfully with ID: $autorId";
?>