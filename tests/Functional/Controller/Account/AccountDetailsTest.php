<?php

namespace App\Tests\Functional;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Csrf\CsrfToken;

class AccountDetailsTest extends WebTestCase
{
    protected ?AbstractDatabaseTool $databaseTool = null;
    protected ?EntityManagerInterface $em = null;
    private KernelBrowser $client;
    private CsrfToken $token;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = static::createClient();
        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();
        $this->token = static::getContainer()->get('security.csrf.token_manager')->getToken('account_details');
        $this->em = static::getContainer()->get('doctrine')->getManager();
        $this->databaseTool->loadAliceFixture([
            'tests/DataFixtures/User/user.yml',
        ]);
    }

    public function testAccountDetailsEditSuccess(): void
    {
        $repository = $this->em->getRepository(User::class);
        $user = $repository->findOneBy(['email' => 'joseph.dyke@example.com']);

        $this->client->loginUser($user);
        $this->client->request('POST', '/account/settings/account', [
            'account_details' => [
                'firstName' => 'Jan',
                'lastName' => 'Kowalski',
                'email' => 'jan.kowalski@example.com',
                '_token' => $this->token->getValue(),
            ],
        ]);

        $user = $repository->findOneBy([
            'firstName' => 'Jan',
            'lastName' => 'Kowalski',
            'email' => 'jan.kowalski@example.com',
        ]);

        $this->assertResponseRedirects('/account/settings/account', 302);
        $this->assertNotNull($user);
    }

    public function testAccountDetailsEditFailed(): void
    {
        $repository = $this->em->getRepository(User::class);
        $user = $repository->findOneBy(['email' => 'joseph.dyke@example.com']);

        $this->client->loginUser($user);
        $crawler = $this->client->request('POST', '/account/settings/account', [
            'account_details' => [
                'firstName' => 'Jan',
                'lastName' => 'Kowalski',
                'email' => 'jan.kowalskiexample.com',
                '_token' => $this->token->getValue(),
            ],
        ]);

        $user = $repository->findOneBy([
            'email' => 'joseph.dyke@example.com',
        ]);

        $this->assertNotNull($user);
        $this->assertSame('Ta wartość nie jest prawidłowym adresem email.', $crawler->filter('li')->last()->text());
    }
}
