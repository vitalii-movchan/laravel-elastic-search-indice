<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Contract\Bulk;

use Illuminate;

/**
 * @class AliasRepository
 */
interface BulkRepository
{
    /**
     * @param Illuminate\Support\Collection $indices
     * @return self
     */
    public function deleteIndices(Illuminate\Support\Collection $indices): self;

    /**
     * @param array $actions
     * @return self
     */
    public function updateAliases(array $actions): self;
}
