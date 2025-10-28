<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\State;

use Elastic;

/**
 * @final
 * @readonly
 * @class IndexRepository
 * @implements Elastic\Elasticsearch\Indice\Repository\Contract\State\IndexStateRepository
 *
 * @private Elastic\Elasticsearch\ClientInterface client
 */
final readonly class IndexStateRepository implements
    Elastic\Elasticsearch\Indice\Repository\Contract\State\IndexStateRepository
{
    /**
     * @param Elastic\Elasticsearch\ClientInterface $client
     */
    public function __construct(private Elastic\Elasticsearch\ClientInterface $client)
    {
    }

    /**
     * @param string $index
     * @param array $aliases
     * @param array $mappings
     * @param array $settings
     * @return $this
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\MissingParameterException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function create(
        string $index,
        array $aliases = [],
        array $mappings = [],
        array $settings = []
    ): self {
        $parameters = [
            'index' => $index,
        ];

        if ($aliases) {
            $parameters['body']['aliases'] = $aliases;
        }

        if ($mappings) {
            $parameters['body']['mappings'] = $mappings;
        }

        if ($settings) {
            $parameters['body']['settings'] = $settings;
        }

        $this->client->indices()->create($parameters);

        $this->client->getLogger()->info("Create index", [
            'index' => $index,
        ]);

        return $this;
    }

    /**
     * @param string $index
     * @return $this
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\MissingParameterException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function delete(string $index): self
    {
        $this->client->indices()->delete(['index' => $index]);

        $this->client->getLogger()->info("Delete index", [
            'index' => $index,
        ]);

        return $this;
    }
}
