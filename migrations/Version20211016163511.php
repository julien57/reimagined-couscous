<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211016163511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, type INT NOT NULL, image VARCHAR(255) DEFAULT NULL, subBlock TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_children (id INT AUTO_INCREMENT NOT NULL, page_block_id INT NOT NULL, children_id INT NOT NULL, json_data LONGTEXT DEFAULT NULL, INDEX IDX_FBE84D556972852C (page_block_id), INDEX IDX_FBE84D553D3D2749 (children_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_item (id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, item_id INT NOT NULL, item_order INT NOT NULL, json_data LONGTEXT DEFAULT NULL, INDEX IDX_D9757765E9ED820C (block_id), INDEX IDX_D9757765126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, phone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, adress TEXT NOT NULL, country VARCHAR(100) NOT NULL, event_type VARCHAR(255) NOT NULL, event_date DATETIME NOT NULL, people_number INT NOT NULL, booking_room TINYINT(1) DEFAULT NULL, message LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, page_block_id INT NOT NULL, block_children_id INT NOT NULL, json LONGTEXT DEFAULT NULL, target INT NOT NULL, INDEX IDX_FEC530A96972852C (page_block_id), INDEX IDX_FEC530A9E7307292 (block_children_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_language (content_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_866C9B5A84A0A3ED (content_id), INDEX IDX_866C9B5A82F1BAF4 (language_id), PRIMARY KEY(content_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE daily_message (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gift (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, zipcode VARCHAR(10) NOT NULL, city VARCHAR(100) NOT NULL, country VARCHAR(100) NOT NULL, person_name VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, message LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sql_type VARCHAR(255) NOT NULL, html_name VARCHAR(255) NOT NULL, html_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_content (language_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_5A08E7FD82F1BAF4 (language_id), INDEX IDX_5A08E7FD84A0A3ED (content_id), PRIMARY KEY(language_id, content_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7E8585C8E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_140AB6205E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_block (id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, page_id INT NOT NULL, item_order INT NOT NULL, json_data LONGTEXT DEFAULT NULL, INDEX IDX_E59A68F4E9ED820C (block_id), INDEX IDX_E59A68F4C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block_children ADD CONSTRAINT FK_FBE84D556972852C FOREIGN KEY (page_block_id) REFERENCES page_block (id)');
        $this->addSql('ALTER TABLE block_children ADD CONSTRAINT FK_FBE84D553D3D2749 FOREIGN KEY (children_id) REFERENCES block (id)');
        $this->addSql('ALTER TABLE block_item ADD CONSTRAINT FK_D9757765E9ED820C FOREIGN KEY (block_id) REFERENCES block (id)');
        $this->addSql('ALTER TABLE block_item ADD CONSTRAINT FK_D9757765126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A96972852C FOREIGN KEY (page_block_id) REFERENCES page_block (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9E7307292 FOREIGN KEY (block_children_id) REFERENCES block_children (id)');
        $this->addSql('ALTER TABLE content_language ADD CONSTRAINT FK_866C9B5A84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content_language ADD CONSTRAINT FK_866C9B5A82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_content ADD CONSTRAINT FK_5A08E7FD82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_content ADD CONSTRAINT FK_5A08E7FD84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_block ADD CONSTRAINT FK_E59A68F4E9ED820C FOREIGN KEY (block_id) REFERENCES block (id)');
        $this->addSql('ALTER TABLE page_block ADD CONSTRAINT FK_E59A68F4C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block_children DROP FOREIGN KEY FK_FBE84D553D3D2749');
        $this->addSql('ALTER TABLE block_item DROP FOREIGN KEY FK_D9757765E9ED820C');
        $this->addSql('ALTER TABLE page_block DROP FOREIGN KEY FK_E59A68F4E9ED820C');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9E7307292');
        $this->addSql('ALTER TABLE content_language DROP FOREIGN KEY FK_866C9B5A84A0A3ED');
        $this->addSql('ALTER TABLE language_content DROP FOREIGN KEY FK_5A08E7FD84A0A3ED');
        $this->addSql('ALTER TABLE block_item DROP FOREIGN KEY FK_D9757765126F525E');
        $this->addSql('ALTER TABLE content_language DROP FOREIGN KEY FK_866C9B5A82F1BAF4');
        $this->addSql('ALTER TABLE language_content DROP FOREIGN KEY FK_5A08E7FD82F1BAF4');
        $this->addSql('ALTER TABLE page_block DROP FOREIGN KEY FK_E59A68F4C4663E4');
        $this->addSql('ALTER TABLE block_children DROP FOREIGN KEY FK_FBE84D556972852C');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A96972852C');
        $this->addSql('DROP TABLE block');
        $this->addSql('DROP TABLE block_children');
        $this->addSql('DROP TABLE block_item');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE content_language');
        $this->addSql('DROP TABLE daily_message');
        $this->addSql('DROP TABLE gift');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_content');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_block');
    }
}
