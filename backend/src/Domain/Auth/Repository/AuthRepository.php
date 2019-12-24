<?php

namespace App\Domain\Auth\Repository;

use Illuminate\Database\Connection;

/**
 * Class ItemRepository
 *
 * @package App\Domain\Item\Repository
 */
class AuthRepository
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
     * @param string $email The username
     * @param string $password The password
     *
     * @return array
     */
    public function login(string $email, string $password): array
    {
        $session = new \SlimSession\Helper;
        if ($session->offsetGet('logged_in')) {
            return [
                'code' => 403,
                'status' => 'error',
                'description' => 'Zaten bir oturum açık, ana sayfaya dönünüz'
            ];
        }

        $user = (array) $this->connection->table('users')->where('email', $email)->first();
        if (!$user) {
            return [
                'code' => 400,
                'status' => 'error',
                'description' => 'E-Posta adresi bulunamadı :('
            ];
        } elseif (!password_verify($password, $user['password'])) {
            return [
                'code' => 400,
                'status' => 'error',
                'description' => 'Parola hatalı :('
            ];
        } else {
            $session->offsetSet('logged_in', true);
            return ['status' => 'success'];
        }
    }
}
