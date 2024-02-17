<?php
// delete_book.php
require_once "../bootstrap.php";
require_once "../src/entities/Autor.php";
require_once "../src/entities/Livre.php";

use App\entities\Autor;
use App\entities\Livre;

$livreId = 12;

//$entityManager->beginTransaction();

//try {
    // Récupérer le livre à supprimer
    $livre = $entityManager->getRepository(Livre::class)->find($livreId);

    if ($livre) {
        
        $autor = $livre->getAutor();
        if (count($autor->getLivres()) > 1) {
            //echo("Pas supprimer auteur existe.");
            // Retirer le livre de la liste des livres de l'auteur
            $autor->removeLivre($livre);

            // Supprimer le livre
            $entityManager->remove($livre);

            // Enregistrer les modifications
            $entityManager->flush();

            echo "Le livre a été supprimé avec succès.";
        }
        
        
    } else {
        echo "Livre non trouvé.";
    }

//     $entityManager->commit();
// } catch (Exception $e) {
//     $entityManager->rollback();
//     echo "Une erreur s'est produite : " . $e->getMessage();
// }
?>
