<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211016171438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE content_language');
        $this->addSql('DROP TABLE language_content');
        $this->addSql('ALTER TABLE content ADD language INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_language (content_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_866C9B5A82F1BAF4 (language_id), INDEX IDX_866C9B5A84A0A3ED (content_id), PRIMARY KEY(content_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE language_content (language_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_5A08E7FD84A0A3ED (content_id), INDEX IDX_5A08E7FD82F1BAF4 (language_id), PRIMARY KEY(language_id, content_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE content_language ADD CONSTRAINT FK_866C9B5A82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content_language ADD CONSTRAINT FK_866C9B5A84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_content ADD CONSTRAINT FK_5A08E7FD82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_content ADD CONSTRAINT FK_5A08E7FD84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content DROP language');
    }
}
