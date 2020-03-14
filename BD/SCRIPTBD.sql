-- -----------------------------------------------------
-- Schema juglosbd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `juglosbd` DEFAULT CHARACTER SET utf8 ;
USE `juglosbd` ;

-- -----------------------------------------------------
-- Table `juglosbd`.`TBL_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juglosbd`.`TBL_USUARIO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(50) NOT NULL,
  `CEDULA` VARCHAR(20) NOT NULL,
  `CONTRASENA` VARCHAR(150) NOT NULL,
  `ROL` VARCHAR(10) NOT NULL,
  `DIRECCION` VARCHAR(460) NULL,
  `TELEFONO` VARCHAR(15) NULL,
  `CORREO` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juglosbd`.`TBL_FACTURA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juglosbd`.`TBL_FACTURA` (
  `id` INT NOT NULL,
  `FECHA` DATE NOT NULL,
  `TOTAL` DOUBLE NOT NULL,
  `TOTAL_IVA` DOUBLE NOT NULL,
  `ID_USUARIO` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_TBL_FACTURA_TBL_USUARIO_idx` (`ID_USUARIO` ASC),
  CONSTRAINT `fk_TBL_FACTURA_TBL_USUARIO`
    FOREIGN KEY (`ID_USUARIO`)
    REFERENCES `juglosbd`.`TBL_USUARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juglosbd`.`TBL_PRODUCTOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juglosbd`.`TBL_PRODUCTOS` (
  `ID` INT NOT NULL,
  `NOMBRE` VARCHAR(50) NOT NULL,
  `DESCRIPCION` VARCHAR(100) NULL,
  `CANTIDAD` INT NULL,
  `VALOR_UNITARIO` DOUBLE NOT NULL,
  `IVA` DOUBLE NOT NULL,
  `ESTADO` TINYINT NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juglosbd`.`TBL_VENTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juglosbd`.`TBL_VENTA` (
  `ID` INT NOT NULL,
  `CANTIDAD` INT NOT NULL,
  `VALOR_UNITARIO` DOUBLE NOT NULL,
  `IVA` DOUBLE NOT NULL,
  `ID_PRODUCTOS` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_TBL_VENTA_TBL_PRODUCTOS1_idx` (`ID_PRODUCTOS` ASC),
  CONSTRAINT `fk_TBL_VENTA_TBL_PRODUCTOS1`
    FOREIGN KEY (`ID_PRODUCTOS`)
    REFERENCES `juglosbd`.`TBL_PRODUCTOS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juglosbd`.`TBL_VENTAS_PRODUCTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juglosbd`.`TBL_VENTAS_PRODUCTO` (
  `ID` INT NOT NULL,
  `ID_VENTA` INT NOT NULL,
  `ID_FACTURA` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_TBL_VENTAS_PRODUCTO_TBL_VENTA1_idx` (`ID_VENTA` ASC),
  INDEX `fk_TBL_VENTAS_PRODUCTO_TBL_FACTURA1_idx` (`ID_FACTURA` ASC),
  CONSTRAINT `fk_TBL_VENTAS_PRODUCTO_TBL_VENTA1`
    FOREIGN KEY (`ID_VENTA`)
    REFERENCES `juglosbd`.`TBL_VENTA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_VENTAS_PRODUCTO_TBL_FACTURA1`
    FOREIGN KEY (`ID_FACTURA`)
    REFERENCES `juglosbd`.`TBL_FACTURA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
