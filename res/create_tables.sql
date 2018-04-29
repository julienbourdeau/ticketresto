CREATE TABLE `ticketresto`.`clients` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`nom` VARCHAR( 50 ) NOT NULL ,
`prenom` VARCHAR( 50 ) NOT NULL ,
`adresse` VARCHAR( 100 ) NOT NULL ,
`email` VARCHAR( 60 ) NOT NULL ,
`commentaire` VARCHAR( 200 ) NOT NULL
) ENGINE = MYISAM ;

ALTER TABLE `clients` ADD `solde` DOUBLE NULL DEFAULT NULL 

