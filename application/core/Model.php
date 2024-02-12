<?php

namespace application\core;

use application\lib\Db;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

class Model
{
    public $db;
    public $entityManager;

    public function __construct()
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            array(".\\application\\entities"),
            true
        );
        $connection = DriverManager::getConnection([
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'test'
        ], $config);

        $this->entityManager = new EntityManager($connection, $config);
        $this->db = new Db;
    }
}