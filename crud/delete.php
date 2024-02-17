<?php
// delete_author.php
require_once "../bootstrap.php";
require_once "../src/entities/Autor.php";
require_once "../src/entities/Livre.php";

use App\entities\Autor;
use App\entities\Livre;

$autorId = 5; // ID de l'auteur à supprimer

$entityManager->beginTransaction();

try {
    // Récupérer l'auteur
    $autor = $entityManager->getRepository(Autor::class)->find($autorId);

    if ($autor) {
        // Supprimer tous les livres de l'auteur
        foreach ($autor->getLivres() as $livre) {
            $entityManager->remove($livre);
        }

        // Supprimer l'auteur lui-même
        $entityManager->remove($autor);

        // Exécuter les opérations de suppression
        $entityManager->flush();

        echo "L'auteur et ses livres ont été supprimés avec succès.";
    } else {
        echo "Auteur non trouvé.";
    }

    $entityManager->commit();
} catch (Exception $e) {
    $entityManager->rollback();
    echo "Une erreur s'est produite : " . $e->getMessage();
}
?>
