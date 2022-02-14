<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\ValueObject\IdentifierInterface;

interface EntityInterface
{
    public function getId(): IdentifierInterface;
}