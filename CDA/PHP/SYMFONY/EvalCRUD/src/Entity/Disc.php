<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Disc
 *
 * @ORM\Table(name="disc", indexes={@ORM\Index(name="artist_id", columns={"artist_id"})})
 * @ORM\Entity
 */
class Disc
{
    /**
     * @var int
     *
     * @ORM\Column(name="disc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $discId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="disc_title", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $discTitle = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="disc_year", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $discYear = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="disc_picture", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $discPicture = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="disc_label", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $discLabel = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="disc_genre", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $discGenre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="disc_price", type="decimal", precision=6, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $discPrice = 'NULL';

    /**
     * @var \Artist
     *
     * @ORM\ManyToOne(targetEntity="Artist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artist_id", referencedColumnName="artist_id")
     * })
     */
    private $artist;

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="disc")
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getDiscId(): ?int
    {
        return $this->discId;
    }

    public function getDiscTitle(): ?string
    {
        return $this->discTitle;
    }

    public function setDiscTitle(?string $discTitle): self
    {
        $this->discTitle = $discTitle;

        return $this;
    }

    public function getDiscYear(): ?int
    {
        return $this->discYear;
    }

    public function setDiscYear(?int $discYear): self
    {
        $this->discYear = $discYear;

        return $this;
    }

    public function getDiscPicture(): ?string
    {
        return $this->discPicture;
    }

    public function setDiscPicture(?string $discPicture): self
    {
        $this->discPicture = $discPicture;

        return $this;
    }

    public function getDiscLabel(): ?string
    {
        return $this->discLabel;
    }

    public function setDiscLabel(?string $discLabel): self
    {
        $this->discLabel = $discLabel;

        return $this;
    }

    public function getDiscGenre(): ?string
    {
        return $this->discGenre;
    }

    public function setDiscGenre(?string $discGenre): self
    {
        $this->discGenre = $discGenre;

        return $this;
    }

    public function getDiscPrice(): ?string
    {
        return $this->discPrice;
    }

    public function setDiscPrice(?string $discPrice): self
    {
        $this->discPrice = $discPrice;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

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
            $comment->setDisc($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getDisc() === $this) {
                $comment->setDisc(null);
            }
        }

        return $this;
    }


}
