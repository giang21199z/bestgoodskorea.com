<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191220140538 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE don_hang (id INT AUTO_INCREMENT NOT NULL, ten_khach VARCHAR(100) NOT NULL, sdt VARCHAR(15) NOT NULL, dia_chi VARCHAR(255) NOT NULL, note VARCHAR(255) DEFAULT NULL, noi_dung VARCHAR(255) NOT NULL, tong_tien VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE san_pham (id INT AUTO_INCREMENT NOT NULL, ten VARCHAR(50) NOT NULL, gia_nhap INT NOT NULL, gia_hien_thi INT NOT NULL, gia_ban INT NOT NULL, mieu_ta LONGTEXT NOT NULL, anh_dai_dien VARCHAR(255) NOT NULL, anh_1 VARCHAR(255) DEFAULT NULL, anh_2 VARCHAR(255) DEFAULT NULL, anh_3 VARCHAR(255) DEFAULT NULL, anh_4 VARCHAR(255) DEFAULT NULL, luot_xem INT NOT NULL, ten_kr VARCHAR(50) NOT NULL, mieu_ta_kr LONGTEXT NOT NULL, url_seo VARCHAR(255) NOT NULL, noi_dung LONGTEXT NOT NULL, noi_dung_kr LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE don_hang');
        $this->addSql('DROP TABLE san_pham');
    }
}
