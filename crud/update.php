<?php
// update_book.php
require_once "../bootstrap.php";
require_once "../src/entities/Autor.php";
require_once "../src/entities/Livre.php";

use App\entities\Autor;
use App\entities\Livre;

$livreId = 11; // ID du livre à modifier
$newTitle = "Nouveau titre du livre";

$entityManager->beginTransaction();

try {
    // Récupérer le livre à modifier
    $livre = $entityManager->getRepository(Livre::class)->find($livreId);

    if ($livre) {
        // Mettre à jour le titre du livre
        $livre->setName($newTitle);

        // Enregistrer les modifications
        $entityManager->flush();

        echo "Le titre du livre a été mis à jour avec succès.";
    } else {
        echo "Livre non trouvé.";
    }

    $entityManager->commit();
} catch (Exception $e) {
    $entityManager->rollback();
    echo "Une erreur s'est produite : " . $e->getMessage();
}
?>
