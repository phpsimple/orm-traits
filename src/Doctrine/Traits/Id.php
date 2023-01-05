<?php declare(strict_types = 1);

namespace PhpSimple\Doctrine\Traits;

use Doctrine\ORM\Mapping as ORM;

trait Id
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer', unique: true)]
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
