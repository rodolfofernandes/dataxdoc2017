
-- -----------------------------------------------------
-- Table `db_cliente`.`tbl_tipodocumental`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_cliente`.`tbl_tipodocumental` ;

CREATE TABLE IF NOT EXISTS `db_cliente`.`tbl_tipodocumental` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `descricao` VARCHAR(200) NULL,
  `excluido` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idmodeloDocumento_UNIQUE` (`id` ASC))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `dataXDoc`.`tbl_tipoindexador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_cliente`.`tbl_tipoindexador` ;

CREATE TABLE IF NOT EXISTS `db_cliente`.`tbl_tipoindexador` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Data for table `db_cliente`.`tbl_tipoindexador`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_cliente`;
INSERT INTO `db_cliente`.`tbl_tipoindexador` (`id`, `descricao`) VALUES (1, 'NUMERO');
INSERT INTO `db_cliente`.`tbl_tipoindexador` (`id`, `descricao`) VALUES (2, 'TEXTO');
INSERT INTO `db_cliente`.`tbl_tipoindexador` (`id`, `descricao`) VALUES (3, 'DATA');

COMMIT;
