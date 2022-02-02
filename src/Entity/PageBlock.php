<?php

namespace App\Entity;

use App\Repository\PageBlockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageBlockRepository::class)
 */
class PageBlock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Block", inversedBy="pageBlock")
     * @ORM\JoinColumn(nullable=false)
     */
    private $block;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="pageBlocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $page;

    /**
     * @ORM\OneToMany(targetEntity="Content", mappedBy="pageBlock")
     */
    private $contents;

    /**
     * @ORM\OneToMany(targetEntity="BlockChildren", mappedBy="pageBlock", cascade={"remove"})
     */
    private $blockChildrens;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $itemOrder;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $jsonData;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $jsonDataPreview;

    /**
     * @ORM\OneToMany(targetEntity=Timeline::class, mappedBy="pageBlock", cascade={"remove"})
     */
    private $timelines;

    public function __construct()
    {
        $this->timelines = new ArrayCollection();
        $this->contents = new ArrayCollection();
        $this->blockChildrens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemOrder(): ?int
    {
        return $this->itemOrder;
    }

    public function setItemOrder(int $itemOrder): self
    {
        $this->itemOrder = $itemOrder;

        return $this;
    }

    public function getJsonData(): ?string
    {
        return $this->jsonData;
    }

    public function setJsonData(?string $jsonData): self
    {
        $this->jsonData = $jsonData;

        return $this;
    }

    public function getBlock(): ?Block
    {
        return $this->block;
    }

    public function setBlock(?Block $block): self
    {
        $this->block = $block;

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function __clone()
    {
        $this->id = null;
    }

    public function getJsonDataPreview(): ?string
    {
        return $this->jsonDataPreview;
    }

    public function setJsonDataPreview(?string $jsonDataPreview): self
    {
        $this->jsonDataPreview = $jsonDataPreview;

        return $this;
    }

    /**
     * @return Collection|Timeline[]
     */
    public function getTimelines(): Collection
    {
        return $this->timelines;
    }

    public function addTimeline(Timeline $timeline): self
    {
        if (!$this->timelines->contains($timeline)) {
            $this->timelines[] = $timeline;
            $timeline->setPageBlock($this);
        }

        return $this;
    }

    public function removeTimeline(Timeline $timeline): self
    {
        if ($this->timelines->removeElement($timeline)) {
            // set the owning side to null (unless already changed)
            if ($timeline->getPageBlock() === $this) {
                $timeline->setPageBlock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Content[]
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContent(Content $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents[] = $content;
            $content->setPageBlock($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->contents->removeElement($content)) {
            // set the owning side to null (unless already changed)
            if ($content->getPageBlock() === $this) {
                $content->setPageBlock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlockChildren[]
     */
    public function getBlockChildrens(): Collection
    {
        return $this->blockChildrens;
    }

    public function addBlockChildren(BlockChildren $blockChildren): self
    {
        if (!$this->blockChildrens->contains($blockChildren)) {
            $this->blockChildrens[] = $blockChildren;
            $blockChildren->setPageBlock($this);
        }

        return $this;
    }

    public function removeBlockChildren(BlockChildren $blockChildren): self
    {
        if ($this->blockChildrens->removeElement($blockChildren)) {
            // set the owning side to null (unless already changed)
            if ($blockChildren->getPageBlock() === $this) {
                $blockChildren->setPageBlock(null);
            }
        }

        return $this;
    }
}
