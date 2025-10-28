<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Aliases\Contract;

/**
 * @class Alias
 */
interface Aliases
{
    /**
     * @return array
     */
    public function toArray(): array;
}
