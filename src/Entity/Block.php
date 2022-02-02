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
    private $pageBlock;

    /**
     * @ORM\OneToMany(targetEntity="BlockItem", mappedBy="block")
     */
    private $blockItem;

    /**
     * @ORM\OneToMany(targetEntity="BlockChildren", mappedBy="children")
     */
    private $children;

    /**
     * @ORM\Column(name="subBlock",type="boolean")
     */
    private $subBlock = false;

    public function __construct()
    {
        $this->pageBlock = new ArrayCollection();
        $this->blockItem = new ArrayCollection();
        $this->children = new ArrayCollection();
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

    /**
     * @return Collection|PageBlock[]
     */
    public function getPageBlock(): Collection
    {
        return $this->pageBlock;
    }

    public function addPageBlock(PageBlock $pageBlock): self
    {
        if (!$this->pageBlock->contains($pageBlock)) {
            $this->pageBlock[] = $pageBlock;
            $pageBlock->setBlock($this);
        }

        return $this;
    }

    public function removePageBlock(PageBlock $pageBlock): self
    {
        if ($this->pageBlock->removeElement($pageBlock)) {
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
    public function getBlockItem(): Collection
    {
        return $this->blockItem;
    }

    public function addBlockItem(BlockItem $blockItem): self
    {
        if (!$this->blockItem->contains($blockItem)) {
            $this->blockItem[] = $blockItem;
            $blockItem->setBlock($this);
        }

        return $this;
    }

    public function removeBlockItem(BlockItem $blockItem): self
    {
        if ($this->blockItem->removeElement($blockItem)) {
            // set the owning side to null (unless already changed)
            if ($blockItem->getBlock() === $this) {
                $blockItem->setBlock(null);
            }
        }

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
     * @return Collection|BlockChildren[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(BlockChildren $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setChildren($this);
        }

        return $this;
    }

    public function removeChild(BlockChildren $child): self
    {
        if ($this->children->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getChildren() === $this) {
                $child->setChildren(null);
            }
        }

        return $this;
    }
}
