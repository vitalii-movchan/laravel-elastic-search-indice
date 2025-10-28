<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Actions\Contract;

/**
 * @class Actions
 */
interface Actions
{
    /**
     * @return array
     */
    public function toArray(): array;
}
