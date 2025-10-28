<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Mappings\Contract;

/**
 * @class Mapping
 */
interface Mappings
{
    /**
     * @return array
     */
    public function toArray(): array;
}
