<?php

namespace App\Entity;

use App\Entity\Patisserie;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Patisserie::class, mappedBy="categorie")
     */
    private $patisseries;

    public function __construct()
    {
        $this->patisseries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Patisserie[]
     */
    public function getPatisseries(): Collection
    {
        return $this->patisseries;
    }

    public function addPatisseries(Patisserie $patisseries): self
    {
        if (!$this->patisseries->contains($patisseries)) {
            $this->patisseries[] = $patisseries;
            $patisseries->addCategorie($this);
        }

        return $this;
    }

    public function removePatisseries(Patisserie $patisseries): self
    {
        if ($this->patisseries->removeElement($patisseries)) {
            $patisseries->removeCategorie($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
