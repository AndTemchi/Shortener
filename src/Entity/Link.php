<?php

namespace App\Entity;

use App\Entity\ValueObject\IdentifierInterface;
use App\Repository\LinkRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ValueObject\SimpleStringIdentifier;

/**
 * @ORM\Entity(repositoryClass=LinkRepository::class)
 */
class Link implements LinkInterface
{
    /**
     * @ORM\Embedded(class="App\Entity\ValueObject\SimpleStringIdentifier", columnPrefix=false)
     */
    private IdentifierInterface $id;

    /**
     * @param string $url
     * @param string $keyword
     * @param string $title
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $updatedAt
     */
    public function __construct(
        /**
         * @ORM\Column(type="string", length=2048)
         */
        private string $url,
        /**
         * @ORM\Column(type="string", length=255)
         */
        private string $keyword,
        /**
         * @ORM\Column(type="string", length=255)
         */
        private string $title,
        /**
         * @ORM\Column(type="datetime_immutable")
         */
        private \DateTimeInterface $createdAt,
        /**
         * @ORM\Column(type="datetime_immutable")
         */
        private \DateTimeInterface $updatedAt)
    {

    }

    public function getId(): IdentifierInterface
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getKeyword(): string
    {
        return $this->keyword;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}
