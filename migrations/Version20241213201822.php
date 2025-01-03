<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241213201822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student ADD releation_id INT NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF333D0EB56A FOREIGN KEY (releation_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_B723AF333D0EB56A ON student (releation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF333D0EB56A');
        $this->addSql('DROP INDEX IDX_B723AF333D0EB56A ON student');
        $this->addSql('ALTER TABLE student DROP releation_id');
    }
}
