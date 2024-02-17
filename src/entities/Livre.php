<?php

namespace App\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="livre")
 */
class Livre {
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
    * @ORM\ManyToOne(targetEntity=Autor::class, inversedBy="livre")
    */
    protected $autor = null;
    
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
    
    
    public function getAutor(): ?Autor
    {
        return $this->autor;
    }

    public function setAutor(?Autor $autor): self
    {
        $this->autor = $autor;

        return $this;
    }
    
   
}
