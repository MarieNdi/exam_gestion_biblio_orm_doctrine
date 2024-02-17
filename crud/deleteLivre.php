<?php
// delete_book.php
require_once "../bootstrap.php";
require_once "../src/entities/Autor.php";
require_once "../src/entities/Livre.php";

use App\entities\Autor;
use App\entities\Livre;

$livreId = 10; // ID du livre à supprimer

$entityManager->beginTransaction();

try {
    // Récupérer le livre à supprimer
    $livre = $entityManager->getRepository(Livre::class)->find($livreId);

    if ($livre) {
        // Supprimer le livre
        $entityManager->remove($livre);

        // Enregistrer les modifications
        $entityManager->flush();

        echo "Le book a été supprimé avec succès.";
    } else {
        echo "book non trouvé.";
    }

    $entityManager->commit();
} catch (Exception $e) {
    $entityManager->rollback();
    echo "Une erreur s'est produite : " . $e->getMessage();
}
?>
