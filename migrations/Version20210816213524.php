<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210816213524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create schema';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE administrator (id UUID NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58DF0651E7927C74 ON administrator (email)');
        $this->addSql('COMMENT ON COLUMN administrator.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE billing_address (id UUID NOT NULL, client_id UUID NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, tax_id VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, property_number VARCHAR(30) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6660E45619EB6921 ON billing_address (client_id)');
        $this->addSql('COMMENT ON COLUMN billing_address.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN billing_address.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE billing_item (id UUID NOT NULL, client_id UUID NOT NULL, name VARCHAR(255) DEFAULT NULL, quantity INT DEFAULT NULL, unit_price INT DEFAULT NULL, value_net INT DEFAULT NULL, value_vat INT DEFAULT NULL, value_gross INT DEFAULT NULL, vat_rate INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_60691BD919EB6921 ON billing_item (client_id)');
        $this->addSql('COMMENT ON COLUMN billing_item.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN billing_item.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE billing_option (id UUID NOT NULL, client_id UUID NOT NULL, issuer_address_id UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1F5C23E019EB6921 ON billing_option (client_id)');
        $this->addSql('CREATE INDEX IDX_1F5C23E07229D0BF ON billing_option (issuer_address_id)');
        $this->addSql('COMMENT ON COLUMN billing_option.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN billing_option.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN billing_option.issuer_address_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE client (id UUID NOT NULL, active BOOLEAN NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN client.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE external_api_config (id UUID NOT NULL, client_id UUID NOT NULL, url VARCHAR(2048) NOT NULL, login VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4883E72E19EB6921 ON external_api_config (client_id)');
        $this->addSql('COMMENT ON COLUMN external_api_config.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN external_api_config.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE invoice (id UUID NOT NULL, client_id UUID NOT NULL, number VARCHAR(255) NOT NULL, file_name VARCHAR(255) DEFAULT NULL, issued_at DATE NOT NULL, due_date DATE NOT NULL, delivery_date DATE NOT NULL, paid BOOLEAN NOT NULL, value_net INT DEFAULT NULL, value_vat INT DEFAULT NULL, value_gross INT DEFAULT NULL, bank_account VARCHAR(255) DEFAULT NULL, swift VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9065174496901F54 ON invoice (number)');
        $this->addSql('CREATE INDEX IDX_9065174419EB6921 ON invoice (client_id)');
        $this->addSql('COMMENT ON COLUMN invoice.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN invoice.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE invoice_address (id UUID NOT NULL, invoice_id UUID NOT NULL, type VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, tax_id VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, property_number VARCHAR(30) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF9759522989F1FD ON invoice_address (invoice_id)');
        $this->addSql('CREATE UNIQUE INDEX invoice_address_type ON invoice_address (invoice_id, type)');
        $this->addSql('COMMENT ON COLUMN invoice_address.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN invoice_address.invoice_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE invoice_item (id UUID NOT NULL, invoice_id UUID NOT NULL, name VARCHAR(255) DEFAULT NULL, quantity INT DEFAULT NULL, unit_price INT DEFAULT NULL, value_net INT DEFAULT NULL, value_vat INT DEFAULT NULL, value_gross INT DEFAULT NULL, vat_rate INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1DDE477B2989F1FD ON invoice_item (invoice_id)');
        $this->addSql('COMMENT ON COLUMN invoice_item.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN invoice_item.invoice_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE issuer_address (id UUID NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, tax_id VARCHAR(100) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, property_number VARCHAR(30) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, bank_account VARCHAR(255) DEFAULT NULL, swift VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN issuer_address.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE payment (id UUID NOT NULL, invoice_id UUID NOT NULL, value INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6D28840D2989F1FD ON payment (invoice_id)');
        $this->addSql('COMMENT ON COLUMN payment.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN payment.invoice_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE "user" (id UUID NOT NULL, client_id UUID NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE INDEX IDX_8D93D64919EB6921 ON "user" (client_id)');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "user".client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE billing_address ADD CONSTRAINT FK_6660E45619EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE billing_item ADD CONSTRAINT FK_60691BD919EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE billing_option ADD CONSTRAINT FK_1F5C23E019EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE billing_option ADD CONSTRAINT FK_1F5C23E07229D0BF FOREIGN KEY (issuer_address_id) REFERENCES issuer_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE external_api_config ADD CONSTRAINT FK_4883E72E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_9065174419EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice_address ADD CONSTRAINT FK_FF9759522989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice_item ADD CONSTRAINT FK_1DDE477B2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D64919EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE billing_address DROP CONSTRAINT FK_6660E45619EB6921');
        $this->addSql('ALTER TABLE billing_item DROP CONSTRAINT FK_60691BD919EB6921');
        $this->addSql('ALTER TABLE billing_option DROP CONSTRAINT FK_1F5C23E019EB6921');
        $this->addSql('ALTER TABLE external_api_config DROP CONSTRAINT FK_4883E72E19EB6921');
        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT FK_9065174419EB6921');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D64919EB6921');
        $this->addSql('ALTER TABLE invoice_address DROP CONSTRAINT FK_FF9759522989F1FD');
        $this->addSql('ALTER TABLE invoice_item DROP CONSTRAINT FK_1DDE477B2989F1FD');
        $this->addSql('ALTER TABLE payment DROP CONSTRAINT FK_6D28840D2989F1FD');
        $this->addSql('ALTER TABLE billing_option DROP CONSTRAINT FK_1F5C23E07229D0BF');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE billing_address');
        $this->addSql('DROP TABLE billing_item');
        $this->addSql('DROP TABLE billing_option');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE external_api_config');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_address');
        $this->addSql('DROP TABLE invoice_item');
        $this->addSql('DROP TABLE issuer_address');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE messenger_messages');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
