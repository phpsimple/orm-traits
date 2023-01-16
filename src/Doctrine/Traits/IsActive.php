<?php declare(strict_types = 1);

namespace PhpSimple\Doctrine\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IsActive
{
    #[ORM\Column(options: ['default' => false])]
    private bool $isActive = false;

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }
}
