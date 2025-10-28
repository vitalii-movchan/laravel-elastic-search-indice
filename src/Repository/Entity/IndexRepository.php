<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Entity;

use Elastic;
use Illuminate;
/**
 * @final
 * @readonly
 * @class IndexRepository
 * @implements Elastic\Elasticsearch\Indice\Repository\Contract\Entity\IndexRepository
 *
 * @private Elastic\Elasticsearch\ClientInterface client
 */
final readonly class IndexRepository implements
    Elastic\Elasticsearch\Indice\Repository\Contract\Entity\IndexRepository
{
    /**
     * @param Elastic\Elasticsearch\ClientInterface $client
     */
    public function __construct(private Elastic\Elasticsearch\ClientInterface $client)
    {
    }

    /**
     * @param string $index
     * @return bool
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\MissingParameterException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function exist(string $index): bool
    {
        $response = $this->client->indices()->exists(['index' => $index]);

        return $response->asBool();
    }

    /**
     * @param string $index
     * @return Illuminate\Support\Collection
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function getAliases(string $index): Illuminate\Support\Collection
    {
        /** @var Elastic\Elasticsearch\Response\Elasticsearch $response */
        $response = $this->client->indices()->getAlias(['index' => $index]);

        return collect(array_keys($response->asArray()[$index]['aliases'] ?? []));
    }
}
