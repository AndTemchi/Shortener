<?php

declare(strict_types=1);

namespace App\Entity\ValueObject;

interface IdentifierInterface
{
    public function getId(): string;

    public function equals(IdentifierInterface $identifier): bool;
}