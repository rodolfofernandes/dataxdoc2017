
-- -----------------------------------------------------
-- Table `db_cliente`.`tbl_repositorio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_cliente`.`tbl_repositorio` ;

CREATE TABLE IF NOT EXISTS `db_cliente`.`tbl_repositorio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `nivel` INT NOT NULL,
  `repositorioPai` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_repositorio_repositorio_idx` (`repositorioPai` ASC),
  CONSTRAINT `fk_repositorio_repositorio`
    FOREIGN KEY (`repositorioPai`)
    REFERENCES `db_cliente`.`tbl_repositorio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_cliente`.`tbl_documento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_cliente`.`tbl_documento` ;

CREATE TABLE IF NOT EXISTS `db_cliente`.`tbl_documento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `repositorio` INT NOT NULL,
  `nome` VARCHAR(150) NOT NULL,
  `arquivo` LONGBLOB NOT NULL,
  `dataCriacao` DATETIME NOT NULL,
  `criadoPor` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_documento_repositorio_idx` (`repositorio` ASC),
  CONSTRAINT `fk_documento_repositorio`
    FOREIGN KEY (`repositorio`)
    REFERENCES `db_cliente`.`tbl_repositorio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_cliente`.`tbl_keywords`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_cliente`.`tbl_keywords` ;

CREATE TABLE IF NOT EXISTS `db_cliente`.`tbl_keywords` (
  `documento` INT NOT NULL,
  `indexador` INT NOT NULL,
  `valor` VARCHAR(250) NULL,
  PRIMARY KEY (`documento`, `indexador`),
  INDEX `fk_keywords_documento_idx` (`documento` ASC),
  INDEX `fk_keywords_indexador_idx` (`indexador` ASC),
  CONSTRAINT `fk_keywords_documento`
    FOREIGN KEY (`documento`)
    REFERENCES `db_cliente`.`tbl_documento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_keywords_indexador`
    FOREIGN KEY (`indexador`)
    REFERENCES `db_cliente`.`tbl_indexador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_cliente`.`tbl_arvore`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_cliente`.`tbl_arvore` ;

CREATE TABLE IF NOT EXISTS `db_cliente`.`tbl_arvore` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `raiz` INT NOT NULL,
  `label` VARCHAR(150) NOT NULL,
  `quantidadePastas` INT NOT NULL,
  `quantidadeDocumentos` INT NOT NULL,
  `quantidadeNiveis` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_arvore_raiz_idx` (`raiz` ASC),
  CONSTRAINT `fk_arvore_raiz`
    FOREIGN KEY (`raiz`)
    REFERENCES `db_cliente`.`tbl_repositorio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
