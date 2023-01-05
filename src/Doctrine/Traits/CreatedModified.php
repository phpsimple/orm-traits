<?php declare(strict_types = 1);

namespace PhpSimple\Doctrine\Traits;

use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use Exception;

trait CreatedModified
{
    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    protected ?DateTimeImmutable $creationDate = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    protected ?DateTimeImmutable $modificationDate = null;

    public function getModificationDate(): DateTimeImmutable
    {
        return $this->modificationDate;
    }

    public function setModificationDate(?DateTimeImmutable $modificationDate): static
    {
        $this->modificationDate = $this->modifyTimezone(dateTime: $modificationDate);

        return $this;
    }

    /**
     * @throws Exception
     */
    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updatedTimestamps(): static
    {
        $this->setModificationDate(modificationDate: $this->modifyTimezone(dateTime: new DateTimeImmutable()));

        if (null === $this->creationDate) {
            $this->setCreationDate(creationDate: $this->modifyTimezone(dateTime: new DateTimeImmutable()));
        }

        return $this;
    }

    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function setCreationDate(?DateTimeImmutable $creationDate): static
    {
        $this->creationDate = $this->modifyTimezone(dateTime: $creationDate);

        return $this;
    }

    private function modifyTimezone(?DateTimeImmutable $dateTime): ?DateTimeImmutable
    {
        if (null !== $dateTime) {
            $timezone = new DateTimeZone(timezone: 'UTC');

            return DateTimeImmutable::createFromInterface(object: $dateTime)->setTimezone(timezone: $timezone);
        }

        return null;
    }
}
