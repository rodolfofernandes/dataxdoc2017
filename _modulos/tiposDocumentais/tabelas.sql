
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
-- Table `db_cliente`.`tbl_tipoindexador`
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

-- -----------------------------------------------------
-- Table `db_cliente`.`tbl_indexador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_cliente`.`tbl_indexador` ;

CREATE TABLE IF NOT EXISTS `db_cliente`.`tbl_indexador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipoDocumental` INT NOT NULL,
  `nome` VARCHAR(65) NOT NULL,
  `tipo` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_indexador_tipoDocumental_idx` (`tipoDocumental` ASC),
  INDEX `fk_indexador_tipoIndexador_idx` (`tipo` ASC),
  CONSTRAINT `fk_indexador_tipoDocumental`
    FOREIGN KEY (`tipoDocumental`)
    REFERENCES `dataXDoc`.`tbl_tipodocumental` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_indexador_tipoIndexador`
    FOREIGN KEY (`tipo`)
    REFERENCES `dataXDoc`.`tbl_tipoindexador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
