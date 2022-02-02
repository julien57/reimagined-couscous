<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119065957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE timeline (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, page_block_id INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_46FEC666A76ED395 (user_id), INDEX IDX_46FEC6666972852C (page_block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE timeline ADD CONSTRAINT FK_46FEC666A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE timeline ADD CONSTRAINT FK_46FEC6666972852C FOREIGN KEY (page_block_id) REFERENCES page_block (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE timeline');
    }
}
