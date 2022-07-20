<?php

namespace App\Entity;

use App\Repository\BlockChildrenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlockChildrenRepository::class)
 */
class BlockChildren
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="text", nullable=true) */
    private $jsonData;

    /**
     * @ORM\ManyToOne(targetEntity="PageBlock", inversedBy="blockChildrens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pageBlock;

    /**
     * @ORM\ManyToOne(targetEntity="Block", inversedBy="childrens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $block;

    /** @ORM\Column(type="text", nullable=true) */
    private $jsonDataPreview;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPageBlock(): ?PageBlock
    {
        return $this->pageBlock;
    }

    public function setPageBlock(?PageBlock $pageBlock): self
    {
        $this->pageBlock = $pageBlock;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block): void
    {
        $this->block = $block;
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
}
