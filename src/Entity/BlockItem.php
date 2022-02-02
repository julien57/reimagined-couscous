<?php

namespace App\Entity;

use App\Repository\BlockItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlockItemRepository::class)
 */
class BlockItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Block", inversedBy="blockItem")
     * @ORM\JoinColumn(nullable=false)
     */
    private $block;

    /**
     * @ORM\ManyToOne(targetEntity="Item", inversedBy="blockItem")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $item_order;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $json_data;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemOrder(): ?int
    {
        return $this->item_order;
    }

    public function setItemOrder(int $item_order): self
    {
        $this->item_order = $item_order;

        return $this;
    }

    public function getJsonData(): ?string
    {
        return $this->json_data;
    }

    public function setJsonData(?string $json_data): self
    {
        $this->json_data = $json_data;

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

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }
}
