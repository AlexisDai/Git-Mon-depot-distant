<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Entity\Disc;
use App\Entity\Artist;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentsRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
#[ApiResource(
        collectionOperations: ['get' => ['normalization_context' => ['groups' => 'comment:list']]],
        itemOperations: ['get' => ['normalization_context' => ['groups' => 'comment:item']]],
        order: ['createdAt' => 'DESC'],
        paginationEnabled: false,
    )]
    #[ApiFilter(SearchFilter::class, properties: ['product' => 'exact'])]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['comment:list', 'comment:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['comment:list', 'comment:item'])]
    private $content;

    #[ORM\Column(type: 'date')]
    #[Groups(['comment:list', 'comment:item'])]
    private $date;

    #[ORM\Column(type: 'date')]
    #[Groups(['comment:list', 'comment:item'])]
    private $updateDate;

    #[ORM\ManyToOne(targetEntity: Artist::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['comment:list', 'comment:item'])]
    private $product;

    #[ORM\ManyToOne(targetEntity: Disc::class, inversedBy: 'comments')]
    #[Groups(['comment:list', 'comment:item'])]
    private $disc;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->updateDate;
    }

    public function setUpdateDate(\DateTimeInterface $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    public function getProduct(): ?Artist
    {
        return $this->product;
    }

    public function setProduct(?Artist $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getDisc(): ?Disc
    {
        return $this->disc;
    }

    public function setDisc(?Disc $disc): self
    {
        $this->disc = $disc;

        return $this;
    }

}
