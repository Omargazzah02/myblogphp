<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use App\Entity\Comment;
use Doctrine\Common\Collections\Collection;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le titre ne peut pas être vide.")]
    #[Assert\Length(max: 255, maxMessage: "Le titre ne peut pas dépasser 255 caractères.")]
    private ?string $Title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Le contenu ne peut pas être vide.")]
    private ?string $Content = null;



  

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: "La date de création ne peut pas être vide.")]
    #[Assert\Type(\DateTime::class, message: "La date de création doit être une date valide.")]
    private ?\DateTimeInterface $Creation_date = null;



    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)] 
#[Assert\NotBlank(message: "Le prix ne doit pas être vide.")]
#[Assert\Positive(message: "Le prix doit être un nombre positif.")]
private ?float $price = null;


    
    #[ORM\Column(length: 255)]
    
    private ?string $Image = null;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Comment::class)]
    private $comments;



    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "L'article doit être lié à une catégorie.")]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): static
    {
        $this->Content = $Content;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->Creation_date;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $image): static
    {
        $this->Content = $image;

        return $this;
    }


    public function setCreationDate(\DateTimeInterface $Creation_date): static
    {
        $this->Creation_date = $Creation_date;

        return $this;
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }




    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

}
