<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Entity;

use Elastic;
use Illuminate;

/**
 * @final
 * @readonly
 * @class AliasRepository
 * @implements Elastic\Elasticsearch\Indice\Repository\Contract\Entity\AliasRepository
 *
 * @private Elastic\Elasticsearch\ClientInterface client
 */
final readonly class AliasRepository implements
    Elastic\Elasticsearch\Indice\Repository\Contract\Entity\AliasRepository
{
    /**
     * @param Elastic\Elasticsearch\ClientInterface $client
     */
    public function __construct(private Elastic\Elasticsearch\ClientInterface $client)
    {
    }

    /**
     * @param string $name
     * @return Illuminate\Support\Collection
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function getIndexes(string $name): Illuminate\Support\Collection
    {
        /** @var Elastic\Elasticsearch\Response\Elasticsearch $response */
        $response = $this->client->indices()->getAlias(['name' => $name]);

        return collect($response->asArray())->keys();
    }
}
