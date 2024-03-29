<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="string", length=255) */
    private $name;

    /** @ORM\Column(type="string", length=255) */
    private $sqlType;

    /** @ORM\Column(type="string", length=255) */
    private $htmlName;

    /** @ORM\Column(type="string", length=255) */
    private $htmlType;

    /** @ORM\OneToMany(targetEntity="BlockItem", mappedBy="item") */
    private $blockItems;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $info;

    public function __construct()
    {
        $this->blockItems = new ArrayCollection();
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

    public function getSqlType(): ?string
    {
        return $this->sqlType;
    }

    public function setSqlType(string $sqlType): self
    {
        $this->sqlType = $sqlType;

        return $this;
    }

    public function getHtmlName(): ?string
    {
        return $this->htmlName;
    }

    public function setHtmlName(string $htmlName): self
    {
        $this->htmlName = $htmlName;

        return $this;
    }

    public function getHtmlType(): ?string
    {
        return $this->htmlType;
    }

    public function setHtmlType(string $htmlType): self
    {
        $this->htmlType = $htmlType;

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
            $blockItem->setItem($this);
        }

        return $this;
    }

    public function removeBlockItem(BlockItem $blockItem): self
    {
        if ($this->blockItems->removeElement($blockItem)) {
            // set the owning side to null (unless already changed)
            if ($blockItem->getItem() === $this) {
                $blockItem->setItem(null);
            }
        }

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }
}
