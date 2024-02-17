<?php

namespace App\entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="autor")
 */
class Autor {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
   
    /**
    * @ORM\OneToMany(targetEntity=Livre::class, cascade={"persist", "remove"}, mappedBy="autor")
    */
    protected $livres;
    
    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }
    
    // Getters and Setters
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    
    public function getLivres(): Collection
    {
        return $this->livres;
    }
    public function addLivre(Livre $livre): self
    {
        //Si le livre n'est pas déjà dans la collection, la condition if (!$this->livres->contains($livre)) est vraie.

        if (!$this->livres->contains($livre)) {
           // ajouter le livre à la fin de la collection.
            $this->livres[] = $livre;
            //permet de définir l'auteur du livre
            $livre->setAutor($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getAutor() === $this) {
                $livre->setAutor(null);
            }
        }

        return $this;
    }
   
}
