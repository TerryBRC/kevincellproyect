CREATE DATABASE  IF NOT EXISTS `kevincell_db`;
USE `kevincell_db`;

CREATE TABLE `clientes` (
  `Id_Cliente` int NOT NULL AUTO_INCREMENT,
  `Nombre_Completo` varchar(100) DEFAULT NULL,
  `Identificacion` varchar(25) DEFAULT NULL,
  `Tel` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Id_Cliente`)
);
CREATE TABLE `inventario` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre_Producto` varchar(255) DEFAULT NULL,
  `Descripcion` text,
  `Precio_Venta` decimal(10,2) DEFAULT NULL,
  `Precio_Compra` decimal(10,2) DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
);
CREATE TABLE `creditos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int DEFAULT NULL,
  `Id_Inventario` int DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Cantidad` int DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Saldo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_creditos_cliente_idx` (`Id_Cliente`),
  KEY `fk_inventario_creditos_idx` (`Id_Inventario`),
  CONSTRAINT `fk_creditos_cliente` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`),
  CONSTRAINT `fk_inventario_creditos` FOREIGN KEY (`Id_Inventario`) REFERENCES `inventario` (`Id`)
);
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizar_stock_inventario_insert_credito` AFTER INSERT ON `creditos` FOR EACH ROW BEGIN
    UPDATE inventario
    SET Stock = Stock - NEW.Cantidad
    WHERE Id = NEW.Id_Inventario;
END */;;
DELIMITER ;


CREATE TABLE `abonos_creditos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_Credito` int DEFAULT NULL,
  `Abono` decimal(10,2) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Metodo_Pago` varchar(50) DEFAULT 'Efectivo',
  `Observaciones` text,
  PRIMARY KEY (`Id`),
  KEY `Id_Credito` (`Id_Credito`),
  CONSTRAINT `abonos_creditos_ibfk_1` FOREIGN KEY (`Id_Credito`) REFERENCES `creditos` (`Id`)
);

DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizar_saldo_credito_insert` AFTER INSERT ON `abonos_creditos` FOR EACH ROW BEGIN
    UPDATE creditos
    SET Saldo = Saldo - NEW.Abono
    WHERE Id = NEW.Id_Credito;
END */;;
DELIMITER ;