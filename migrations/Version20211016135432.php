<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211016135432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blogpost (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_1284FB7DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, patisserie_id INT DEFAULT NULL, blogpost_id INT DEFAULT NULL, auteur VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_67F068BC1031BC6E (patisserie_id), INDEX IDX_67F068BC27F5416E (blogpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, created_at DATETIME NOT NULL, is_send TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patisserie (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nom VARCHAR(255) NOT NULL, collection VARCHAR(255) NOT NULL, prix NUMERIC(6, 2) DEFAULT NULL, created_at DATETIME NOT NULL, description LONGTEXT NOT NULL, portfolio TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, portion_personne VARCHAR(255) NOT NULL, INDEX IDX_8941F513A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patisserie_categorie (patisserie_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_ECA0A6451031BC6E (patisserie_id), INDEX IDX_ECA0A645BCF5E72D (categorie_id), PRIMARY KEY(patisserie_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, a_propos LONGTEXT DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blogpost ADD CONSTRAINT FK_1284FB7DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC1031BC6E FOREIGN KEY (patisserie_id) REFERENCES patisserie (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC27F5416E FOREIGN KEY (blogpost_id) REFERENCES blogpost (id)');
        $this->addSql('ALTER TABLE patisserie ADD CONSTRAINT FK_8941F513A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE patisserie_categorie ADD CONSTRAINT FK_ECA0A6451031BC6E FOREIGN KEY (patisserie_id) REFERENCES patisserie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patisserie_categorie ADD CONSTRAINT FK_ECA0A645BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC27F5416E');
        $this->addSql('ALTER TABLE patisserie_categorie DROP FOREIGN KEY FK_ECA0A645BCF5E72D');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC1031BC6E');
        $this->addSql('ALTER TABLE patisserie_categorie DROP FOREIGN KEY FK_ECA0A6451031BC6E');
        $this->addSql('ALTER TABLE blogpost DROP FOREIGN KEY FK_1284FB7DA76ED395');
        $this->addSql('ALTER TABLE patisserie DROP FOREIGN KEY FK_8941F513A76ED395');
        $this->addSql('DROP TABLE blogpost');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE patisserie');
        $this->addSql('DROP TABLE patisserie_categorie');
        $this->addSql('DROP TABLE user');
    }
}
