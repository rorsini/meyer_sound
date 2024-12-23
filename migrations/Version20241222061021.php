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
        $this->addSql('ALTER TABLE hardware_test ADD status_id INT NOT NULL');
        $this->addSql('ALTER TABLE hardware_test ADD CONSTRAINT FK_7E0488366BF700BD FOREIGN KEY (status_id) REFERENCES test_status (id)');
        $this->addSql('CREATE INDEX IDX_7E0488366BF700BD ON hardware_test (status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hardware_test DROP FOREIGN KEY FK_7E0488366BF700BD');
        $this->addSql('DROP INDEX IDX_7E0488366BF700BD ON hardware_test');
        $this->addSql('ALTER TABLE hardware_test DROP status_id');
    }
}
