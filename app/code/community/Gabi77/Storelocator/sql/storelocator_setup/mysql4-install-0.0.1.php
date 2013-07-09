<?php

/**
 * Module de localistion des magasins physique
 *
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

$installer = $this;

$installer->startSetup();

/**
 * Création de la table store_locator
*/

$installer->run("
		-- DROP TABLE IF EXISTS {$this->getTable('storelocator')};
		CREATE TABLE {$this->getTable('storelocator')} (
		`id_store` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(45) NOT NULL,
		`address1` VARCHAR(255) NOT NULL,
		`address2` VARCHAR(255) NOT NULL,
		`codepostal` VARCHAR(45) NOT NULL,
		`city` VARCHAR(45) NOT NULL,
		`phone` NUMERIC NOT NULL,
		`fax` NUMERIC NOT NULL,
		`status` VARCHAR(45) NOT NULL,
		`country` VARCHAR(25) NOT NULL,
		`information` TEXT NOT NULL,
		`store_type` INTEGER UNSIGNED NOT NULL,
		PRIMARY KEY (`id_store`)
		)ENGINE = InnoDB DEFAULT CHARSET=utf8;

		-- DROP TABLE IF EXISTS {$this->getTable('type')};
		CREATE TABLE {$this->getTable('type')} (
		`id_type` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(45) NOT NULL,
		PRIMARY KEY (`id_type`)
		)ENGINE = InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();