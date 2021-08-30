<?php

namespace App\Tests\Integration\Repository;

use App\Entity\Administrator;
use App\Repository\AdministratorRepository;
use App\Tests\Integration\IntegrationTestCase;

class AdministratorRepositoryTest extends IntegrationTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testFindAll(): void
    {
        $this->databaseTool->loadAliceFixture(['fixtures/administrators.yml']);

        /** @var AdministratorRepository $repository */
        $repository = $this->em->getRepository(Administrator::class);

        $results = $repository->findAll();

        $this->assertCount(1, $results, 'There is only one administrator');
    }
}
