<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\ValueObject\IdentifierInterface;

interface LinkInterface extends EntityInterface
{
    public function getId(): IdentifierInterface;
    public function getUrl(): string;
    public function getKeyword(): string;
    public function getTitle(): string;
    public function getCreatedAt(): \DateTimeInterface;
    public function getUpdatedAt(): \DateTimeInterface;
}