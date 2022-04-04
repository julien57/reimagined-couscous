<?php

namespace App\Entity;

use App\Repository\BlockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlockRepository::class)
 */
class Block
{
    public const BLOCK_TYPE_HEADER = 1;
    public const BLOCK_TYPE_SLIDER = 3;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="PageBlock", mappedBy="block")
     */
    private $pageBlocks;

    /**
     * @ORM\OneToMany(targetEntity="BlockItem", mappedBy="block")
     */
    private $blockItems;

    /**
     * @ORM\OneToMany(targetEntity="BlockChildren", mappedBy="children")
     */
    private $childrens;

    /**
     * @ORM\Column(name="subBlock",type="boolean")
     */
    private $subBlock = false;

    public function __construct()
    {
        $this->pageBlocks = new ArrayCollection();
        $this->blockItems = new ArrayCollection();
        $this->childrens = new ArrayCollection();
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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSubBlock(): ?bool
    {
        return $this->subBlock;
    }

    public function setSubBlock(bool $subBlock): self
    {
        $this->subBlock = $subBlock;

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
            $pageBlock->setBlock($this);
        }

        return $this;
    }

    public function removePageBlock(PageBlock $pageBlock): self
    {
        if ($this->pageBlocks->removeElement($pageBlock)) {
            // set the owning side to null (unless already changed)
            if ($pageBlock->getBlock() === $this) {
                $pageBlock->setBlock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlockItem[]
     */
    public function getBlockItems(): Collection
    {
        return $this->blockItems;
    }

    public function addBlockItem(BlockItem $blockItem): self
    {
        if (!$this->blockItems->contains($blockItem)) {
            $this->blockItems[] = $blockItem;
            $blockItem->setBlock($this);
        }

        return $this;
    }

    public function removeBlockItem(BlockItem $blockItem): self
    {
        if ($this->blockItems->removeElement($blockItem)) {
            // set the owning side to null (unless already changed)
            if ($blockItem->getBlock() === $this) {
                $blockItem->setBlock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlockChildren[]
     */
    public function getChildrens(): Collection
    {
        return $this->childrens;
    }

    public function addChildren(BlockChildren $children): self
    {
        if (!$this->childrens->contains($children)) {
            $this->childrens[] = $children;
            $children->setChildren($this);
        }

        return $this;
    }

    public function removeChildren(BlockChildren $children): self
    {
        if ($this->childrens->removeElement($children)) {
            // set the owning side to null (unless already changed)
            if ($children->getChildren() === $this) {
                $children->setChildren(null);
            }
        }

        return $this;
    }
}
