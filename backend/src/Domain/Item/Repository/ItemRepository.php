<?php

namespace App\Domain\Item\Repository;

use Illuminate\Database\Connection;

/**
 * Class ItemRepository
 *
 * @package App\Domain\Item\Repository
 */
class ItemRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * ItemRepository constructor.
     *
     * @param Connection $connection The PDO Connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function getAllItems(): array
    {
        return $this->connection->table('items')->get()->toArray();
    }

    /**
     * @param int $id Just int value
     *
     * @return array
     */
    public function getItem(int $id): array
    {
        return (array) $this->connection->table('items')->where('id', $id)->first();
    }
}
