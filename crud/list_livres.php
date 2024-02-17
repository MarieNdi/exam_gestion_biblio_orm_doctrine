<?php
// list_products.php
require_once "../bootstrap.php";
require_once "../src/entities/Autor.php";
require_once "../src/entities/Livre.php";

// Retrieve a list of all products
use App\entities\Autor;
use App\entities\Livre;

$autorId = 4;
$autor = $entityManager->getRepository(Autor::class)->find($autorId);
$livres = $autor->getLivres();

echo "Auteur: {$autor->getName()}\n";
echo "Livres de l'auteur:\n";
foreach ($livres as $livre) {
    echo "- {$livre->getName()}\n";
}

?>
