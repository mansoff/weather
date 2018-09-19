<?php

namespace App\Tests\Repository;

use App\Repository\CityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;

class CityRepositoryTest extends TestCase
{
    public function setUp()
    {
        $this->objectManager = $this->createMock(ObjectManager::class);

        $this->testObj = new CityRepository(
            $this->objectManager
        );
    }

    public function testA()
    {
        $this->assertEquals($this->testObj->a(), true);
    }
}