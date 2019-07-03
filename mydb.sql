-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema projetgroupe
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projetgroupe
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetgroupe` DEFAULT CHARACTER SET latin1 ;
USE `projetgroupe` ;

-- -----------------------------------------------------
-- Table `projetgroupe`.`commentaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetgroupe`.`commentaires` (
  `idCommentaire` INT(11) NOT NULL AUTO_INCREMENT,
  `dateCommentaire` DATETIME NOT NULL,
  `contenu` VARCHAR(300) NOT NULL,
  `idUtilisateur` INT(11) NOT NULL,
  `idArticle` INT(11) NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  INDEX `idUtilisateur` (`idUtilisateur` ASC),
  INDEX `idArticle` (`idArticle` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projetgroupe`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetgroupe`.`articles` (
  `idArticle` INT(11) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(90) NOT NULL,
  `contenu` LONGTEXT NOT NULL,
  `dateArticle` DATE NOT NULL,
  PRIMARY KEY (`idArticle`),
  CONSTRAINT `fk_articles_commentaires1`
    FOREIGN KEY (`idArticle`)
    REFERENCES `projetgroupe`.`commentaires` (`idArticle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projetgroupe`.`forum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetgroupe`.`forum` (
  `idForum` INT(11) NOT NULL AUTO_INCREMENT,
  `datePost` DATETIME NOT NULL,
  `contenu` LONGTEXT NOT NULL,
  `idUtilisateur` INT(11) NOT NULL,
  PRIMARY KEY (`idForum`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projetgroupe`.`utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetgroupe`.`utilisateurs` (
  `idUtilisateur` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `mdp` VARCHAR(250) NOT NULL,
  `mail` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `role` INT(11) NOT NULL,
  `pseudo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  CONSTRAINT `fk_utilisateurs_commentaires1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `projetgroupe`.`commentaires` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateurs_forum1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `projetgroupe`.`forum` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `utilisateurs` (`idUtilisateur`, `login`, `mdp`, `mail`, `nom`, `prenom`, `role`, `pseudo`) VALUES ('1', 'Admin', MD5('admin'), 'aa', 'Test', 'Test', '0', 'Admin');
INSERT INTO `articles` (`idArticle`, `titre`, `contenu`, `dateArticle`) VALUES (NULL, 'AA', 'BB', NOW());
INSERT INTO `commentaires` (`idCommentaire`, `dateCommentaire`, `contenu`, `idUtilisateur`, `idArticle`) VALUES (NULL, NOW(), 'AA', '1', '1');
