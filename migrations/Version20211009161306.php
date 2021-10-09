<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211009161306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patisserie_categorie (patisserie_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_ECA0A6451031BC6E (patisserie_id), INDEX IDX_ECA0A645BCF5E72D (categorie_id), PRIMARY KEY(patisserie_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patisserie_categorie ADD CONSTRAINT FK_ECA0A6451031BC6E FOREIGN KEY (patisserie_id) REFERENCES patisserie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patisserie_categorie ADD CONSTRAINT FK_ECA0A645BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patisserie ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE patisserie ADD CONSTRAINT FK_8941F513A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8941F513A76ED395 ON patisserie (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE patisserie_categorie');
        $this->addSql('ALTER TABLE patisserie DROP FOREIGN KEY FK_8941F513A76ED395');
        $this->addSql('DROP INDEX IDX_8941F513A76ED395 ON patisserie');
        $this->addSql('ALTER TABLE patisserie DROP user_id');
    }
}
