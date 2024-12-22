<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222061021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hardware_test_product (hardware_test_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_822A0707B2908A36 (hardware_test_id), INDEX IDX_822A07074584665A (product_id), PRIMARY KEY(hardware_test_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hardware_test_product ADD CONSTRAINT FK_822A0707B2908A36 FOREIGN KEY (hardware_test_id) REFERENCES hardware_test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hardware_test_product ADD CONSTRAINT FK_822A07074584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hardware_test ADD status_id INT NOT NULL');
        $this->addSql('ALTER TABLE hardware_test ADD CONSTRAINT FK_7E0488366BF700BD FOREIGN KEY (status_id) REFERENCES test_status (id)');
        $this->addSql('CREATE INDEX IDX_7E0488366BF700BD ON hardware_test (status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hardware_test_product DROP FOREIGN KEY FK_822A0707B2908A36');
        $this->addSql('ALTER TABLE hardware_test_product DROP FOREIGN KEY FK_822A07074584665A');
        $this->addSql('DROP TABLE hardware_test_product');
        $this->addSql('ALTER TABLE hardware_test DROP FOREIGN KEY FK_7E0488366BF700BD');
        $this->addSql('DROP INDEX IDX_7E0488366BF700BD ON hardware_test');
        $this->addSql('ALTER TABLE hardware_test DROP status_id');
    }
}
