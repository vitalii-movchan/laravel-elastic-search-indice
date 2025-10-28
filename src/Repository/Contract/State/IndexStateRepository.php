<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Contract\State;

/**
 * @class IndexRepository
 */
interface IndexStateRepository
{
    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/indices-create-index.html
     *
     * @param string $index
     * @param array $aliases
     * @param array $mappings
     * @param array $settings
     * @return self
     */
    public function create(string $index, array $aliases, array $mappings, array $settings): self;

    /**
     * @param string $index
     * @return self
     */
    public function delete(string $index): self;
}
