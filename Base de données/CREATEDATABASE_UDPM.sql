SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';



CREATE SCHEMA IF NOT EXISTS `UDPM` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE `UDPM` ;



-- -----------------------------------------------------

-- Table `UDPM`.`User`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `UDPM`.`User` (

  `IDUser` INT NOT NULL AUTO_INCREMENT ,

  `Firstname` VARCHAR(45) NULL ,

  `Surname` VARCHAR(20) NULL ,

  `Email` VARCHAR(60) NULL ,

  `Birthday` DATE NULL ,

  `Login` VARCHAR(20) NULL ,

  `Password` VARCHAR(30) NULL ,

  PRIMARY KEY (`IDUser`) )

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `UDPM`.`Playlist`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `UDPM`.`Playlist` (

  `IDPlaylist` INT NOT NULL AUTO_INCREMENT ,

  `NamePlaylist` VARCHAR(45) NULL ,
    
  `Like` INT NULL,

  `FKUser` INT NULL ,

  PRIMARY KEY (`IDPlaylist`) ,

  INDEX `PlaylistOfUser_idx` (`FKUser` ASC) ,

  CONSTRAINT `PlaylistOfUser`

    FOREIGN KEY (`FKUser` )

    REFERENCES `UDPM`.`User` (`IDUser` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `UDPM`.`Artist`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `UDPM`.`Artist` (

  `IDArtist` INT NOT NULL AUTO_INCREMENT ,

  `NameArtist` VARCHAR(20) NULL ,
    
  `Like` INT NULL,

  PRIMARY KEY (`IDArtist`) )

ENGINE = InnoDB;


-- -----------------------------------------------------

-- Table `UDPM`.`Music`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `UDPM`.`Music` (

  `IDMusic` INT NOT NULL AUTO_INCREMENT ,

  `NameOfMusic` VARCHAR(45) NULL ,

  `Artist` VARCHAR(45) NULL ,

  `Featuring` VARCHAR(200) NULL ,

  `AlbumName` VARCHAR(45) NULL ,
    
  `Like` INT NULL,

  `NameOfPicture` VARCHAR(150) NULL ,

  `SingleName` VARCHAR(45) NULL ,

  `FKArtist` INT NULL ,

  PRIMARY KEY (`IDMusic`) ,

  INDEX `ArtistOfMusic_idx` (`FKArtist` ASC) ,

  CONSTRAINT `ArtistOfMusic`

    FOREIGN KEY (`FKArtist` )

    REFERENCES `UDPM`.`Artist` (`IDArtist` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `UDPM`.`Upload`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `UDPM`.`Upload` (

  `IDUpload` INT NOT NULL AUTO_INCREMENT ,

  `FKMusic` INT NULL ,

  `FKUser` INT NULL ,

  PRIMARY KEY (`IDUpload`) ,

  INDEX `UploadOfUser_idx` (`FKUser` ASC) ,

  INDEX `MusicOfUpload_idx` (`FKMusic` ASC) ,

  CONSTRAINT `UploadOfUser`

    FOREIGN KEY (`FKUser` )

    REFERENCES `UDPM`.`User` (`IDUser` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `MusicOfUpload`

    FOREIGN KEY (`FKMusic` )

    REFERENCES `UDPM`.`Music` (`IDMusic` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `UDPM`.`MusicOfPlaylist`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `UDPM`.`MusicOfPlaylist` (

  `IDMusicOfPlaylist` INT NOT NULL AUTO_INCREMENT ,

  `FKPlaylist` INT NULL ,

  `FKMusic` INT NULL ,

  PRIMARY KEY (`IDMusicOfPlaylist`) ,

  INDEX `Playlist_MusicOfPlaylist_idx` (`FKPlaylist` ASC) ,

  INDEX `Music_MusicOfPlaylist_idx` (`FKMusic` ASC) ,

  CONSTRAINT `Playlist_MusicOfPlaylist`

    FOREIGN KEY (`FKPlaylist` )

    REFERENCES `UDPM`.`Playlist` (`IDPlaylist` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `Music_MusicOfPlaylist`

    FOREIGN KEY (`FKMusic` )

    REFERENCES `UDPM`.`Music` (`IDMusic` )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;



USE `UDPM` ;





SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

