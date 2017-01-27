
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

