<?php

namespace App\Tests\Functional;

use App\Entity\BillingAddress;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Csrf\CsrfToken;

class BillingDetailsTest extends WebTestCase
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
        $this->token = static::getContainer()->get('security.csrf.token_manager')->getToken('billing_details');
        $this->em = static::getContainer()->get('doctrine')->getManager();
        $this->databaseTool->loadAliceFixture([
            'tests/DataFixtures/User/user.yml',
            'tests/DataFixtures/BillingAddresses/billing_addresses.yml',
        ]);
    }

    public function testBillingDetailsEditSuccess(): void
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['email' => 'joseph.dyke@example.com']);

        $this->client->loginUser($user);
        $this->client->request('POST', '/account/settings/billing', [
            'billing_details' => [
                'firstName' => 'Jan',
                'lastName' => 'Kowalski',
                'companyName' => 'Example',
                'taxId' => '1231231231',
                'street' => 'Przykładowa',
                'propertyNumber' => '20',
                'city' => 'Warszawa',
                'zipCode' => '22-222',
                'country' => 'Polska',
                '_token' => $this->token->getValue(),
            ],
        ]);

        $billingAddress = $this->em->getRepository(BillingAddress::class)->findOneBy([
            'lastName' => 'Kowalski',
            'client' => $user->getClient()->getId(),
        ]);

        $this->assertResponseRedirects('/account/settings/billing', 302);
        $this->assertNotNull($billingAddress);
        $this->assertCount(2, $this->em->getRepository(BillingAddress::class)->findAll());
    }

    public function testBillingDetailsEditFailed(): void
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['email' => 'joseph.dyke@example.com']);

        $this->client->loginUser($user);
        $this->client->request('POST', '/account/settings/billing', [
            'billing_details' => [
                'firstName' => '',
                'lastName' => '',
                'companyName' => '',
                'taxId' => '',
                'street' => '',
                'propertyNumber' => '',
                'city' => '',
                'zipCode' => '',
                'country' => '',
                '_token' => $this->token->getValue(),
            ],
        ]);

        $billingAddress = $this->em->getRepository(BillingAddress::class)->findOneBy([
            'email' => 'edward.blanton@example.com',
            'client' => $user->getClient()->getId(),
        ]);

        $this->assertNotNull($billingAddress);
        $this->assertCount(2, $this->em->getRepository(BillingAddress::class)->findAll());
    }
}
