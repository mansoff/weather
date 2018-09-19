<?php

namespace App\Repository;

use Doctrine\Common\Persistence\ObjectManager;

class CityRepository
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(
        ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    public function getAll()
    {
        $conn = $this->objectManager->getConnection();
        $sql = 'SELECT * FROM city';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $conn = $this->objectManager->getConnection();
        $sql = 'SELECT * FROM city where id = :id';

        $params = [
            'id' => $id,
        ];

        return $conn->fetchAssoc($sql, $params);
    }

    public function insertCity($name, $key)
    {
        $conn = $this->objectManager->getConnection();
        $sql = "INSERT INTO `city`
                (`name`, `key`)
                VALUES ( :name, :key); ";
        $params = [
            'name' => $name,
            'key' => $key,
        ];

        $result = $conn->executeUpdate($sql, $params);

        return  ($result > 0)
            ? $conn->lastInsertId($sql, $params)
            : 0;
    }
}