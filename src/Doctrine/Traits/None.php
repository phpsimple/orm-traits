<?php declare(strict_types = 1);

namespace PhpSimple\Doctrine\Traits;

use Doctrine\ORM\Mapping as ORM;

trait None
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(type: 'string', unique: true)]
    protected ?string $id = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): static
    {
        $this->id = $id;

        return $this;
    }
}
