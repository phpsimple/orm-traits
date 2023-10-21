<?php declare(strict_types = 1);

namespace PhpSimple\Doctrine\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Ignore;

trait Version
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Version]
    #[Ignore]
    protected ?int $version = null;

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(?int $version): static
    {
        $this->version = $version;

        return $this;
    }
}
