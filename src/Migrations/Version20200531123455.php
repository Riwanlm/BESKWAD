<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200531123455 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_evenement (user_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_BC6E5FAA76ED395 (user_id), INDEX IDX_BC6E5FAFD02F13 (evenement_id), PRIMARY KEY(user_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_evenement ADD CONSTRAINT FK_BC6E5FAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_evenement ADD CONSTRAINT FK_BC6E5FAFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD user_id INT NOT NULL, ADD evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCA76ED395 ON commentaire (user_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCFD02F13 ON commentaire (evenement_id)');
        $this->addSql('ALTER TABLE user ADD ville_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A73F0036 ON user (ville_id)');
        $this->addSql('ALTER TABLE evenement ADD user_create_id INT NOT NULL, ADD ville_id INT NOT NULL, ADD sport_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EEEFE5067 FOREIGN KEY (user_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('CREATE INDEX IDX_B26681EEEFE5067 ON evenement (user_create_id)');
        $this->addSql('CREATE INDEX IDX_B26681EA73F0036 ON evenement (ville_id)');
        $this->addSql('CREATE INDEX IDX_B26681EAC78BCF8 ON evenement (sport_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_evenement');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCFD02F13');
        $this->addSql('DROP INDEX IDX_67F068BCA76ED395 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BCFD02F13 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP user_id, DROP evenement_id');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EEEFE5067');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EA73F0036');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EAC78BCF8');
        $this->addSql('DROP INDEX IDX_B26681EEEFE5067 ON evenement');
        $this->addSql('DROP INDEX IDX_B26681EA73F0036 ON evenement');
        $this->addSql('DROP INDEX IDX_B26681EAC78BCF8 ON evenement');
        $this->addSql('ALTER TABLE evenement DROP user_create_id, DROP ville_id, DROP sport_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A73F0036');
        $this->addSql('DROP INDEX IDX_8D93D649A73F0036 ON user');
        $this->addSql('ALTER TABLE user DROP ville_id');
    }
}
