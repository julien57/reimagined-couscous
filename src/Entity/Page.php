<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 */
class Page
{
    public const PAGE_TYPE_PAGE = 'page';
    public const PAGE_TYPE_POST = 'post';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="string", length=255, unique=true) */
    private $name;

    /** @ORM\Column(name="active",type="boolean") */
    private $active = false;

    /** @ORM\OneToMany(targetEntity="PageBlock", mappedBy="page", cascade={"remove"}) */
    private $pageBlocks;

    /** @ORM\Column(type="boolean", nullable=true) */
    private $hasNewsletter;

    /** @ORM\Column(type="string", length=255, nullable=true) */
    private $slug;

    /** @ORM\Column(type="string", length=255, nullable=true) */
    private $type;

    /** @ORM\Column(type="string", length=255, nullable=true) */
    private $metaTitle;

    /** @ORM\Column(type="text", nullable=true) */
    private $metaDescription;

    /** @ORM\Column(type="json", nullable=true) */
    private $slugs = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $metas = [];

    public function __construct()
    {
        $this->hasNewsletter = false;
        $this->pageBlocks = new ArrayCollection();
        $this->active = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getHasNewsletter(): ?bool
    {
        return $this->hasNewsletter;
    }

    public function setHasNewsletter(bool $hasNewsletter): self
    {
        $this->hasNewsletter = $hasNewsletter;

        return $this;
    }

    public function __clone()
    {
        $this->id = null;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
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

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(?string $metaTitle): self
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * @return Collection|PageBlock[]
     */
    public function getPageBlocks(): Collection
    {
        return $this->pageBlocks;
    }

    public function addPageBlock(PageBlock $pageBlock): self
    {
        if (!$this->pageBlocks->contains($pageBlock)) {
            $this->pageBlocks[] = $pageBlock;
            $pageBlock->setPage($this);
        }

        return $this;
    }

    public function removePageBlock(PageBlock $pageBlock): self
    {
        if ($this->pageBlocks->removeElement($pageBlock)) {
            // set the owning side to null (unless already changed)
            if ($pageBlock->getPage() === $this) {
                $pageBlock->setPage(null);
            }
        }

        return $this;
    }

    public function getSlugs(): ?array
    {
        return $this->slugs;
    }

    public function setSlugs(?array $slugs): self
    {
        $this->slugs = $slugs;

        return $this;
    }

    public function getMetas(): ?array
    {
        return $this->metas;
    }

    public function setMetas(?array $metas): self
    {
        $this->metas = $metas;

        return $this;
    }
}
