<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200603122324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, evenement_id INT NOT NULL, contenu LONGTEXT NOT NULL, date_creation DATETIME NOT NULL, INDEX IDX_67F068BCA76ED395 (user_id), INDEX IDX_67F068BCFD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, ville_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_evenement (user_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_BC6E5FAA76ED395 (user_id), INDEX IDX_BC6E5FAFD02F13 (evenement_id), PRIMARY KEY(user_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, ville_id INT NOT NULL, sport_id INT NOT NULL, adresse VARCHAR(255) NOT NULL, date_event DATE NOT NULL, nb_personne INT NOT NULL, horaire_debut TIME NOT NULL, horaire_fin TIME DEFAULT NULL, description LONGTEXT DEFAULT NULL, date_creation DATETIME NOT NULL, INDEX IDX_B26681EA76ED395 (user_id), INDEX IDX_B26681EA73F0036 (ville_id), INDEX IDX_B26681EAC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE user_evenement ADD CONSTRAINT FK_BC6E5FAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_evenement ADD CONSTRAINT FK_BC6E5FAFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A73F0036');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EA73F0036');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE user_evenement DROP FOREIGN KEY FK_BC6E5FAA76ED395');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EA76ED395');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EAC78BCF8');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCFD02F13');
        $this->addSql('ALTER TABLE user_evenement DROP FOREIGN KEY FK_BC6E5FAFD02F13');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_evenement');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE evenement');
    }
}
