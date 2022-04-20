<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActivated;

    /**
     * @ORM\OneToMany(targetEntity=Block::class, mappedBy="module")
     */
    private $blocks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $templateFolder;

    /**
     * @ORM\OneToOne(targetEntity=ModuleAsset::class, mappedBy="module", orphanRemoval=true)
     */
    private $moduleAsset;

    public function __construct()
    {
        $this->setIsActivated(false);
        $this->blocks = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsActivated(): ?bool
    {
        return $this->isActivated;
    }

    public function setIsActivated(bool $isActivated): self
    {
        $this->isActivated = $isActivated;

        return $this;
    }

    /**
     * @return Collection<int, Block>
     */
    public function getBlocks(): Collection
    {
        return $this->blocks;
    }

    public function addBlock(Block $block): self
    {
        if (!$this->blocks->contains($block)) {
            $this->blocks[] = $block;
            $block->setModule($this);
        }

        return $this;
    }

    public function removeBlock(Block $block): self
    {
        if ($this->blocks->removeElement($block)) {
            // set the owning side to null (unless already changed)
            if ($block->getModule() === $this) {
                $block->setModule(null);
            }
        }

        return $this;
    }

    public function getTemplateFolder(): ?string
    {
        return $this->templateFolder;
    }

    public function setTemplateFolder(?string $templateFolder): self
    {
        $this->templateFolder = $templateFolder;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getModuleAsset()
    {
        return $this->moduleAsset;
    }

    /**
     * @param mixed $moduleAsset
     * @return Module
     */
    public function setModuleAsset($moduleAsset)
    {
        $this->moduleAsset = $moduleAsset;
        return $this;
    }
}
