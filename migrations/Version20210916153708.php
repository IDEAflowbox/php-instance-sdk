<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210916153708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Remove external api login and rename password to token';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE external_api_config DROP login');
        $this->addSql('ALTER TABLE external_api_config RENAME COLUMN password TO token');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE external_api_config ADD login VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE external_api_config RENAME COLUMN token TO password');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
