CREATE TABLE `gabi77_store_locator` (
  `id_store` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address1` VARCHAR(255) NOT NULL,
  `address2` VARCHAR(255) NOT NULL,
  `codepostal` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `phone` NUMERIC NOT NULL,
  `fax` NUMERIC NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_store`)
)
ENGINE = InnoDB;

ALTER TABLE `gabi77_store_locator` ADD COLUMN `country` INTEGER UNSIGNED NOT NULL AFTER `status`;
ALTER TABLE `gabi77_store_locator` ADD COLUMN `information` TEXT NOT NULL AFTER `country`;
ALTER TABLE `gabi77_store_locator` MODIFY COLUMN `country` VARCHAR(25) NOT NULL;
