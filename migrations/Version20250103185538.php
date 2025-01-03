<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103185538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien ADD fleur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DAE8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id)');
        $this->addSql('CREATE INDEX IDX_2B58D6DAE8DD5A7 ON entretien (fleur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien DROP FOREIGN KEY FK_2B58D6DAE8DD5A7');
        $this->addSql('DROP INDEX IDX_2B58D6DAE8DD5A7 ON entretien');
        $this->addSql('ALTER TABLE entretien DROP fleur_id');
    }
}
