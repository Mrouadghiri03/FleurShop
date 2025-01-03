<?php

namespace App\Entity;

use App\Repository\FleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FleurRepository::class)]
class Fleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomscentifique = null;

    #[ORM\Column(length: 50)]
    private ?string $nomcommun = null;

    #[ORM\Column(length: 50)]
    private ?string $couleur = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descrpition = null;

    #[ORM\Column]
    private ?int $quantitestock = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $prixunitaire = null;

    /**
     * @var Collection<int, Entretien>
     */
    #[ORM\OneToMany(targetEntity: Entretien::class, mappedBy: 'fleur')]
    private Collection $entretiens;

    public function __construct()
    {
        $this->entretiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomscentifique(): ?string
    {
        return $this->nomscentifique;
    }

    public function setNomscentifique(string $nomscentifique): static
    {
        $this->nomscentifique = $nomscentifique;

        return $this;
    }

    public function getNomcommun(): ?string
    {
        return $this->nomcommun;
    }

    public function setNomcommun(string $nomcommun): static
    {
        $this->nomcommun = $nomcommun;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getDescrpition(): ?string
    {
        return $this->descrpition;
    }

    public function setDescrpition(string $descrpition): static
    {
        $this->descrpition = $descrpition;

        return $this;
    }

    public function getQuantitestock(): ?int
    {
        return $this->quantitestock;
    }

    public function setQuantitestock(int $quantitestock): static
    {
        $this->quantitestock = $quantitestock;

        return $this;
    }

    public function getPrixunitaire(): ?string
    {
        return $this->prixunitaire;
    }

    public function setPrixunitaire(string $prixunitaire): static
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    /**
     * @return Collection<int, Entretien>
     */
    public function getEntretiens(): Collection
    {
        return $this->entretiens;
    }

    public function addEntretien(Entretien $entretien): static
    {
        if (!$this->entretiens->contains($entretien)) {
            $this->entretiens->add($entretien);
            $entretien->setFleur($this);
        }

        return $this;
    }

    public function removeEntretien(Entretien $entretien): static
    {
        if ($this->entretiens->removeElement($entretien)) {
            // set the owning side to null (unless already changed)
            if ($entretien->getFleur() === $this) {
                $entretien->setFleur(null);
            }
        }

        return $this;
    }
}
