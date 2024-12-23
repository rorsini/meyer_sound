<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241223042343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hardware_test ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE hardware_test ADD CONSTRAINT FK_7E0488364584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_7E0488364584665A ON hardware_test (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hardware_test DROP FOREIGN KEY FK_7E0488364584665A');
        $this->addSql('DROP INDEX IDX_7E0488364584665A ON hardware_test');
        $this->addSql('ALTER TABLE hardware_test DROP product_id');
    }
}
