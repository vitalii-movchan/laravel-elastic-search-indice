<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Contract\State;

/**
 * @class AliasRepository
 */
interface AliasStateRepository
{
    /**
     * @param string $index
     * @param string $name
     * @param bool $isWriteIndex
     * @return self
     */
    public function put(string $index, string $name, bool $isWriteIndex = false): self;

    /**
     * @param string $index
     * @param string $name
     * @return self
     */
    public function delete(string $index, string $name): self;
}
