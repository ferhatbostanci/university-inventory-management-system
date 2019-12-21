<?php

namespace App\Domain\User\Repository;

use Illuminate\Database\Connection;

/**
 * Class UserRepository
 *
 * @package App\Domain\User\Repository
 */
class UserRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * UserRepository constructor.
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
    public function getAllUsers(): array
    {
        return $this->connection->table('users')->get()->toArray();
    }

    /**
     * @param int $id Just int value
     *
     * @return array
     */
    public function getUser(int $id): array
    {
        return (array) $this->connection->table('users')->where('id', $id)->first();
    }
}

