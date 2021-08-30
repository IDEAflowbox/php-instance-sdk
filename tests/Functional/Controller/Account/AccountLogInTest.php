<?php

namespace App\Tests\Functional;

use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Csrf\CsrfToken;

class AccountLogInTest extends WebTestCase
{
    protected ?AbstractDatabaseTool $databaseTool = null;
    private KernelBrowser $client;
    private CsrfToken $token;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = static::createClient();
        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();
        $this->token = static::getContainer()->get('security.csrf.token_manager')->getToken('authenticate');
        $this->databaseTool->loadAliceFixture([
            'tests/DataFixtures/User/user.yml',
        ]);
    }

    public function testLogInSuccess(): void
    {
        $this->client->request('POST', '/account/auth', [
            '_csrf_token' => $this->token->getValue(),
            'email' => 'joseph.dyke@example.com',
            'password' => 'SecretPassword123!',
        ]);

        $this->assertResponseRedirects('/account/settings/account', 302);
    }

    public function testLogInFailedInvalidCredentials(): void
    {
        $this->client->request('POST', '/account/auth', [
            '_csrf_token' => $this->token->getValue(),
            'email' => 'test@example.com',
            'password' => 'invalid',
        ]);

        $this->assertResponseRedirects('/account/auth', 302, 'Login failed - invalid credentials');
    }

    public function testLogInFailedInvalidCsrfToken(): void
    {
        $this->client->request('POST', '/account/auth', [
            '_csrf_token' => '',
            'email' => 'joseph.dyke@example.com',
            'password' => 'SecretPassword123!',
        ]);

        $this->assertResponseRedirects('/account/auth', 302, 'Login failed - invalid CSRF token');
    }
}
