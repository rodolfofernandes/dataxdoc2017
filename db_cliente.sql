/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : db_cliente

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-02-01 14:19:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_documento
-- ----------------------------
DROP TABLE IF EXISTS `tbl_documento`;
CREATE TABLE `tbl_documento` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`repositorio`  int(11) NOT NULL ,
`nome`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`arquivo`  longblob NOT NULL ,
`dataCriacao`  date NOT NULL ,
`criadoPor`  int(11) NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`repositorio`) REFERENCES `tbl_repositorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
UNIQUE INDEX `id_UNIQUE` (`id`) USING BTREE ,
INDEX `fk_documento_repositorio_idx` (`repositorio`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=11

;

-- ----------------------------
-- Table structure for tbl_indexador
-- ----------------------------
DROP TABLE IF EXISTS `tbl_indexador`;
CREATE TABLE `tbl_indexador` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`tipoDocumental`  int(11) NOT NULL ,
`nome`  varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`tipo`  int(11) NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`tipoDocumental`) REFERENCES `tbl_tipodocumental` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`tipo`) REFERENCES `tbl_tipoindexador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
UNIQUE INDEX `id_UNIQUE` (`id`) USING BTREE ,
INDEX `fk_indexador_tipoDocumental_idx` (`tipoDocumental`) USING BTREE ,
INDEX `fk_indexador_tipoIndexador_idx` (`tipo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of tbl_indexador
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tbl_keywords
-- ----------------------------
DROP TABLE IF EXISTS `tbl_keywords`;
CREATE TABLE `tbl_keywords` (
`documento`  int(11) NOT NULL ,
`indexador`  int(11) NOT NULL ,
`valor`  varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`documento`, `indexador`),
FOREIGN KEY (`documento`) REFERENCES `tbl_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`indexador`) REFERENCES `tbl_indexador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_keywords_indexador_idx` (`indexador`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of tbl_keywords
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tbl_repositorio
-- ----------------------------
DROP TABLE IF EXISTS `tbl_repositorio`;
CREATE TABLE `tbl_repositorio` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`repositorioPai`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`repositorioPai`) REFERENCES `tbl_repositorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
UNIQUE INDEX `id_UNIQUE` (`id`) USING BTREE ,
INDEX `fk_repositorio_repositorio_idx` (`repositorioPai`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of tbl_repositorio
-- ----------------------------
BEGIN;
INSERT INTO `tbl_repositorio` VALUES ('1', 'Condominio', null);
COMMIT;

-- ----------------------------
-- Table structure for tbl_tipodocumental
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tipodocumental`;
CREATE TABLE `tbl_tipodocumental` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descricao`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`excluido`  tinyint(1) NOT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `idmodeloDocumento_UNIQUE` (`id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of tbl_tipodocumental
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tbl_tipoindexador
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tipoindexador`;
CREATE TABLE `tbl_tipoindexador` (
`id`  int(11) NOT NULL ,
`descricao`  varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `id_UNIQUE` (`id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of tbl_tipoindexador
-- ----------------------------
BEGIN;
INSERT INTO `tbl_tipoindexador` VALUES ('1', 'NUMERO'), ('2', 'TEXTO'), ('3', 'DATA'), ('4', 'BOOLEANO');
COMMIT;

-- ----------------------------
-- Table structure for tbl_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE `tbl_usuario` (
`id_usuario`  int(11) NOT NULL AUTO_INCREMENT ,
`cd_CPF`  char(21) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`nm_usuario`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`ds_email`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`dt_nascimento`  date NULL DEFAULT NULL ,
`tp_sexo`  char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`nm_login`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`cd_senha`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`ic_ativo`  char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`tp_acesso`  int(1) NULL DEFAULT NULL ,
`dt_cadastro`  date NULL DEFAULT NULL ,
`dt_exclusao`  date NULL DEFAULT NULL ,
`dt_ultimoAcesso`  date NULL DEFAULT NULL ,
`img_usuario`  mediumblob NULL ,
`ic_qtdAcesso`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_usuario`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of tbl_usuario
-- ----------------------------
BEGIN;
INSERT INTO `tbl_usuario` VALUES ('1', '39109354867', 'Rodolfo Fernandes', 'rodolfo@rodolfo.com.br', '1992-02-22', 'f', 'rodolfo', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', null, null, '2017-02-01', null, '0');
COMMIT;

-- ----------------------------
-- Auto increment value for tbl_documento
-- ----------------------------
ALTER TABLE `tbl_documento` AUTO_INCREMENT=11;

-- ----------------------------
-- Auto increment value for tbl_indexador
-- ----------------------------
ALTER TABLE `tbl_indexador` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for tbl_repositorio
-- ----------------------------
ALTER TABLE `tbl_repositorio` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for tbl_tipodocumental
-- ----------------------------
ALTER TABLE `tbl_tipodocumental` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for tbl_usuario
-- ----------------------------
ALTER TABLE `tbl_usuario` AUTO_INCREMENT=2;
