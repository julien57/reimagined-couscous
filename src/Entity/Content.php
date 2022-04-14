<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentRepository::class)
 */
class Content
{
    public const LANGUAGE_FR = 1;
    public const LANGUAGE_EN = 2;
    public const LANGUAGE_DE = 3;

    public const TARGET_BLOCK = 1;
    public const TARGET_SUB_BLOCK = 2;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="text", nullable=true) */
    private $json;

    /**
     * @ORM\ManyToOne(targetEntity="PageBlock", inversedBy="contents")
     * @ORM\JoinColumn(nullable=true)
     */
    private $pageBlock;

    /**
     * @ORM\ManyToOne(targetEntity="BlockChildren")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $blockChildren;

    /** @ORM\Column(type="integer", nullable=false) */
    private $language;

    /** @ORM\Column(type="integer", nullable=false) */
    private $target = self::TARGET_BLOCK;

    /** @ORM\Column(type="text", nullable=true) */
    private $jsonPreview;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJson(): ?string
    {
        return $this->json;
    }

    public function setJson(?string $json): self
    {
        $this->json = $json;

        return $this;
    }

    public function getLanguage(): ?int
    {
        return $this->language;
    }

    public function setLanguage(int $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getTarget(): ?int
    {
        return $this->target;
    }

    public function setTarget(int $target): self
    {
        $this->target = $target;

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

    public function getBlockChildren(): ?BlockChildren
    {
        return $this->blockChildren;
    }

    public function setBlockChildren(?BlockChildren $blockChildren): self
    {
        $this->blockChildren = $blockChildren;

        return $this;
    }

    public function getJsonPreview(): ?string
    {
        return $this->jsonPreview;
    }

    public function setJsonPreview(?string $jsonPreview): self
    {
        $this->jsonPreview = $jsonPreview;

        return $this;
    }

    public function __clone()
    {
        $this->id = null;
    }
}
