<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Contract\Entity;

use Illuminate\Support\Collection;

/**
 * @class IndexRepository
 */
interface IndexRepository
{
    /**
     * @param string $index
     * @return bool
     */
    public function exist(string $index): bool;

    /**
     * @param string $index
     * @return Collection
     */
    public function getAliases(string $index): Collection;
}
