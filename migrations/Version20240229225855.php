<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229225855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE comm DROP FOREIGN KEY fk_blog_id');
        $this->addSql('ALTER TABLE comm DROP FOREIGN KEY FK_A80C03E3DAE07E97');
        $this->addSql('ALTER TABLE comm CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE comm ADD CONSTRAINT FK_A80C03E3DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE comm DROP FOREIGN KEY FK_A80C03E3DAE07E97');
        $this->addSql('ALTER TABLE comm CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE comm ADD CONSTRAINT fk_blog_id FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comm ADD CONSTRAINT FK_A80C03E3DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
    }
}
