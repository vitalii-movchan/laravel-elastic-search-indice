<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Contract\Entity;

use Illuminate\Support\Collection;

/**
 * @class AliasRepository
 */
interface AliasRepository
{
    /**
     * @param string $name
     * @return Collection
     */
    public function getIndexes(string $name): Collection;
}
