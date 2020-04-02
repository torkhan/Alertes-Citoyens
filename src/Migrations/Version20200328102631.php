<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200328102631 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(150) DEFAULT NULL, cp VARCHAR(45) DEFAULT NULL, nom_departement VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destinataire (id INT AUTO_INCREMENT NOT NULL, id_type_destinataire_id INT DEFAULT NULL, id_validation_id INT DEFAULT NULL, id_adresse_id INT DEFAULT NULL, id_motif_id INT DEFAULT NULL, prenom_destinataire VARCHAR(150) DEFAULT NULL, nom_destinataire VARCHAR(150) DEFAULT NULL, adresse_mail_destinataire VARCHAR(250) DEFAULT NULL, numero_telephone_destinataire VARCHAR(25) DEFAULT NULL, numero_rue_destinataire VARCHAR(45) DEFAULT NULL, nom_rue_destinataire1 VARCHAR(150) DEFAULT NULL, nom_rue_destinataire2 VARCHAR(150) DEFAULT NULL, ok_sms_destinataire TINYINT(1) DEFAULT NULL, ok_mail_destinataire TINYINT(1) DEFAULT NULL, accord_rgpd_destinataire TINYINT(1) DEFAULT NULL, date_enregistrement_destinataire DATETIME DEFAULT NULL, date_validation_destinataire DATETIME DEFAULT NULL, date_modification_destinataire DATETIME DEFAULT NULL, statut_destinataire LONGBLOB DEFAULT NULL, INDEX IDX_FEA9FF925F3C2ABE (id_type_destinataire_id), INDEX IDX_FEA9FF921C0F9935 (id_validation_id), INDEX IDX_FEA9FF92E86D5C8B (id_adresse_id), INDEX IDX_FEA9FF928035548C (id_motif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, id_type_intervention_id INT NOT NULL, nom_intervention VARCHAR(150) DEFAULT NULL, rue_intervention VARCHAR(150) DEFAULT NULL, ville_intervention VARCHAR(150) DEFAULT NULL, longitude VARCHAR(20) DEFAULT NULL, latitude VARCHAR(20) DEFAULT NULL, date_debut_intervention DATETIME DEFAULT NULL, date_fin_intervention DATETIME DEFAULT NULL, commentaire_intervention LONGTEXT DEFAULT NULL, date_modification_intervention DATETIME DEFAULT NULL, INDEX IDX_D11814AB756A5DB3 (id_type_intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, id_type_message_id INT NOT NULL, id_destinataire_id INT NOT NULL, id_intervention_id INT NOT NULL, contenu_message LONGTEXT DEFAULT NULL, date_envoi DATETIME DEFAULT NULL, statut_message LONGBLOB DEFAULT NULL, image1 VARCHAR(150) DEFAULT NULL, image2 VARCHAR(150) DEFAULT NULL, image3 VARCHAR(150) DEFAULT NULL, date_modification_message DATETIME DEFAULT NULL, commentaire_message LONGTEXT DEFAULT NULL, INDEX IDX_B6BD307FC6EE5C49 (id_utilisateur_id), INDEX IDX_B6BD307FA7270684 (id_type_message_id), INDEX IDX_B6BD307F4DA68CE6 (id_destinataire_id), INDEX IDX_B6BD307F67F0FBEB (id_intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motif (id INT AUTO_INCREMENT NOT NULL, motif_type VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, id_type_service_id INT NOT NULL, nom_service VARCHAR(150) DEFAULT NULL, numero_rue_service VARCHAR(45) DEFAULT NULL, nom_rue_service1 VARCHAR(150) DEFAULT NULL, nom_rue_service2 VARCHAR(150) DEFAULT NULL, cp_service VARCHAR(45) DEFAULT NULL, ville_service VARCHAR(150) DEFAULT NULL, adresse_mail_service VARCHAR(250) DEFAULT NULL, numero_telephone_service VARCHAR(25) DEFAULT NULL, commentaire_service LONGTEXT DEFAULT NULL, date_modification_service DATETIME DEFAULT NULL, INDEX IDX_E19D9AD21901BC4B (id_type_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_destinataire (id INT AUTO_INCREMENT NOT NULL, destinataire_type VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_intervention (id INT AUTO_INCREMENT NOT NULL, intervention_type VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_message (id INT AUTO_INCREMENT NOT NULL, message_type VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_service (id INT AUTO_INCREMENT NOT NULL, service_type VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_service_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, statut TINYINT(1) NOT NULL, username VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL, nom_utilisateur VARCHAR(150) DEFAULT NULL, prenom_utilisateur VARCHAR(150) DEFAULT NULL, date_modification_utilisateur DATETIME DEFAULT NULL, commentaire_utilisateur LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64948D62931 (id_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE validation (id INT AUTO_INCREMENT NOT NULL, etat_validation VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE destinataire ADD CONSTRAINT FK_FEA9FF925F3C2ABE FOREIGN KEY (id_type_destinataire_id) REFERENCES type_destinataire (id)');
        $this->addSql('ALTER TABLE destinataire ADD CONSTRAINT FK_FEA9FF921C0F9935 FOREIGN KEY (id_validation_id) REFERENCES validation (id)');
        $this->addSql('ALTER TABLE destinataire ADD CONSTRAINT FK_FEA9FF92E86D5C8B FOREIGN KEY (id_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE destinataire ADD CONSTRAINT FK_FEA9FF928035548C FOREIGN KEY (id_motif_id) REFERENCES motif (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB756A5DB3 FOREIGN KEY (id_type_intervention_id) REFERENCES type_intervention (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA7270684 FOREIGN KEY (id_type_message_id) REFERENCES type_message (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F4DA68CE6 FOREIGN KEY (id_destinataire_id) REFERENCES destinataire (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F67F0FBEB FOREIGN KEY (id_intervention_id) REFERENCES intervention (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD21901BC4B FOREIGN KEY (id_type_service_id) REFERENCES type_service (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64948D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE destinataire DROP FOREIGN KEY FK_FEA9FF92E86D5C8B');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F4DA68CE6');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F67F0FBEB');
        $this->addSql('ALTER TABLE destinataire DROP FOREIGN KEY FK_FEA9FF928035548C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64948D62931');
        $this->addSql('ALTER TABLE destinataire DROP FOREIGN KEY FK_FEA9FF925F3C2ABE');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB756A5DB3');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA7270684');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD21901BC4B');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC6EE5C49');
        $this->addSql('ALTER TABLE destinataire DROP FOREIGN KEY FK_FEA9FF921C0F9935');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE destinataire');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE motif');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE type_destinataire');
        $this->addSql('DROP TABLE type_intervention');
        $this->addSql('DROP TABLE type_message');
        $this->addSql('DROP TABLE type_service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE validation');
    }
}
