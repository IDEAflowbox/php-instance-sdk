<?php

namespace App\Tests\Functional;

use Doctrine\ORM\EntityManagerInterface;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExampleTest extends WebTestCase
{
    protected ?AbstractDatabaseTool $databaseTool = null;
    protected ?EntityManagerInterface $em = null;
    private KernelBrowser $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = static::createClient();
        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();
        $this->em = static::getContainer()->get('doctrine')->getManager();
    }

    public function testHomePage(): void
    {
        $this->databaseTool->loadAliceFixture(['fixtures/administrators.yml']);

        $this->client->request('GET', '/account/auth');

        $this->assertResponseIsSuccessful('Login pages exists');
    }
}
