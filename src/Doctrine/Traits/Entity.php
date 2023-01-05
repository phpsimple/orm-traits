<?php declare(strict_types = 1);

namespace PhpSimple\Doctrine\Traits;

trait Entity
{
    use CreatedModified;
    use Id;
    use Serializable;
    use Status;
}
