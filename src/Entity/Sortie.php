<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortieRepository::class)]
class Sortie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $type;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'time', nullable: true)]
    private $duree;

    #[ORM\Column(type: 'string', length: 255)]
    private $distance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $com;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'Sortie')]
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDuree(): ?string
    {
        $now= new \DateTime();
        if(null==$this->getDate()){
            return null;
        }
        $this->duree=$now->diff($this->getDate());
        return $this->duree->format('%i minutes');
    }


    public function getDistance(): ?string
    {
        return $this->distance;
    }

    public function setDistance(string $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getCom(): ?string
    {
        return $this->com;
    }

    public function setCom(?string $com): self
    {
        $this->com = $com;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
