<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\State;

use Elastic;

/**
 * @final
 * @readonly
 * @class AliasRepository
 * @implements Elastic\Elasticsearch\Indice\Repository\Contract\State\AliasStateRepository
 *
 * @private Elastic\Elasticsearch\ClientInterface client
 */
final readonly class AliasStateRepository implements
    Elastic\Elasticsearch\Indice\Repository\Contract\State\AliasStateRepository
{
    /**
     * @param Elastic\Elasticsearch\ClientInterface $client
     */
    public function __construct(private Elastic\Elasticsearch\ClientInterface $client)
    {
    }

    /**
     * @param string $index
     * @param string $name
     * @param bool $isWriteIndex
     * @return $this
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\MissingParameterException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function put(string $index, string $name, bool $isWriteIndex = false): self
    {
        $parameters = [
            'index' => $index,
            'name' => $name
        ];

        if ($isWriteIndex) {
            $parameters['body']['is_write_index'] = $isWriteIndex;
        }

        $this->client->indices()->putAlias($parameters);

        $this->client->getLogger()->info("Put alias", [
            'index' => $index,
            'alias' => $name,
        ]);

        return $this;
    }

    /**
     * @param string $index
     * @param string $name
     * @return $this
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\MissingParameterException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function delete(string $index, string $name): self
    {
        $this->client->indices()
            ->deleteAlias([
                'client' => [
                    'ignore' => [400, 404],
                ],
                'index' => $index,
                'name' => $name,
            ]);

        $this->client->getLogger()->info("Delete alias", [
            'index' => $index,
            'alias' => $name,
        ]);

        return $this;
    }
}
