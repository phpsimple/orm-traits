<?php declare(strict_types = 1);

namespace PhpSimple\Doctrine\Traits;

trait Entity
{
    use CreatedUpdated;
    use Id;
    use IsActive;
    use Version;
}
