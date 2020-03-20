<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200320102652 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stat ADD country_id INT NOT NULL, CHANGE contaminated contaminated INT DEFAULT NULL, CHANGE healed healed INT DEFAULT NULL, CHANGE zombified zombified INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stat ADD CONSTRAINT FK_20B8FF21F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_20B8FF21F92F3E70 ON stat (country_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stat DROP FOREIGN KEY FK_20B8FF21F92F3E70');
        $this->addSql('DROP INDEX IDX_20B8FF21F92F3E70 ON stat');
        $this->addSql('ALTER TABLE stat DROP country_id, CHANGE contaminated contaminated INT DEFAULT NULL, CHANGE healed healed INT DEFAULT NULL, CHANGE zombified zombified INT DEFAULT NULL');
    }
}
