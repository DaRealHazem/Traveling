<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302112612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, voyage_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, date DATETIME DEFAULT NULL, type VARCHAR(30) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_B875551568C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, spot_id INT NOT NULL, contenu LONGTEXT NOT NULL, INDEX IDX_8F91ABF02DF1D37C (spot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot (id INT AUTO_INCREMENT NOT NULL, photo VARCHAR(255) DEFAULT NULL, nom VARCHAR(50) NOT NULL, localisation VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B875551568C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF02DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id)');
        $this->addSql('ALTER TABLE voyage ADD date_debut DATETIME DEFAULT NULL, ADD date_fin DATETIME DEFAULT NULL, ADD image1 VARCHAR(255) DEFAULT NULL, DROP identifiant, DROP duree, CHANGE role type VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B875551568C9E5AF');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF02DF1D37C');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE spot');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE voyage ADD identifiant VARCHAR(30) NOT NULL, ADD duree INT NOT NULL, ADD role VARCHAR(255) DEFAULT NULL, DROP type, DROP date_debut, DROP date_fin, DROP image1');
    }
}
