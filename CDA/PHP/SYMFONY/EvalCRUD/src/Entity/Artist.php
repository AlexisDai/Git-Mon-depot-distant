<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity
 */
class Artist
{
    /**
     * @var int
     *
     * @ORM\Column(name="artist_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $artistId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="artist_name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $artistName = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="artist_url", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $artistUrl = 'NULL';

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="artist")
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getArtistId(): ?int
    {
        return $this->artistId;
    }

    public function getArtistName(): ?string
    {
        return $this->artistName;
    }

    public function setArtistName(?string $artistName): self
    {
        $this->artistName = $artistName;

        return $this;
    }

    public function getArtistUrl(): ?string
    {
        return $this->artistUrl;
    }

    public function setArtistUrl(?string $artistUrl): self
    {
        $this->artistUrl = $artistUrl;

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setArtist($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getArtist() === $this) {
                $comment->setArtist(null);
            }
        }

        return $this;
    }


}
