-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2022 at 06:09 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sebad`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiario`
--

DROP TABLE IF EXISTS `beneficiario`;
CREATE TABLE IF NOT EXISTS `beneficiario` (
  `Rut` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `IdEstadoBeneficio` tinyint(1) DEFAULT NULL,
  `Direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DirEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `GrupoBeneficio` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Rut`),
  KEY `IdEstadoBeneficio` (`IdEstadoBeneficio`),
  KEY `GrupoBeneficio` (`GrupoBeneficio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `beneficiario`
--

INSERT INTO `beneficiario` (`Rut`, `Nombre`, `Apellido`, `FechaNacimiento`, `IdEstadoBeneficio`, `Direccion`, `DirEmail`, `GrupoBeneficio`) VALUES
('2530697-K', 'Zacarias', 'Flores', '2010-01-12', 0, 'Rancagua', 'Zacarias.Flores@mail.com', 'A01'),
('2576808-6', 'Belen', 'Gena', '2012-02-02', 1, 'Graneros', 'Belen.Gena@mail.com', 'A02'),
('3066256-3', 'Elba', 'Lazo', '2011-02-16', 1, 'DOÑIHUE', 'Elba.Lazo@mail.com', 'A03'),
('3385116-2', 'Hal', 'Colico', '2014-02-25', 0, 'RANCAGUA', 'Hal.Colico@mail.com', 'A01'),
('3433444-7', 'Elvis', 'Tek', '2011-06-23', 1, 'MACHALI', 'Elvis.Tek@mail.com', 'A02'),
('3490261-5', 'Armando', 'Bronca Segura', '2009-12-01', 1, 'RANCAGUA', 'Armando.Bronca Segura@mail.com', 'A03'),
('3562788-K', 'Aitor', 'Tilla', '2009-03-05', 1, 'MACHALI', 'Aitor.Tilla@mail.com', 'A01'),
('3758049-K', 'Marcia', 'Ana', '2012-07-09', 1, 'DOÑIHUE', 'Marcia.Ana@mail.com', 'A02'),
('3781561-6', 'Elsa', 'Pato', '2013-06-17', 1, 'GRANEROS', 'Elsa.Pato@mail.com', 'A03'),
('5000746-4', 'Elba', 'Tracio', '1969-02-12', 1, 'Do', 'Elba@mail.com', 'A02'),
('55555555-5', 'Claudio', 'Laravel', '1980-01-01', 0, 'Rancagua', 'j@mail.com', 'A01');

-- --------------------------------------------------------

--
-- Table structure for table `bloquehorario`
--

DROP TABLE IF EXISTS `bloquehorario`;
CREATE TABLE IF NOT EXISTS `bloquehorario` (
  `Id` tinyint NOT NULL,
  `HoraInicioDesayuno` time DEFAULT NULL,
  `HoraFinDesayuno` time DEFAULT NULL,
  `HoraInicioColacion` time DEFAULT NULL,
  `HoraFinColacion` time DEFAULT NULL,
  `HoraInicioMerienda` time DEFAULT NULL,
  `HoraFinMerienda` time DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bloquehorario`
--

INSERT INTO `bloquehorario` (`Id`, `HoraInicioDesayuno`, `HoraFinDesayuno`, `HoraInicioColacion`, `HoraFinColacion`, `HoraInicioMerienda`, `HoraFinMerienda`) VALUES
(1, '09:00:00', '09:30:00', '13:00:00', '14:00:00', '17:00:00', '18:00:00'),
(2, '09:00:00', '09:30:00', '14:00:00', '15:00:00', '20:00:00', '21:00:00'),
(3, '09:30:00', '10:00:00', '15:00:00', '16:00:00', '19:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cargofuncionario`
--

DROP TABLE IF EXISTS `cargofuncionario`;
CREATE TABLE IF NOT EXISTS `cargofuncionario` (
  `IdCargo` tinyint NOT NULL,
  `Descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`IdCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cargofuncionario`
--

INSERT INTO `cargofuncionario` (`IdCargo`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Funcionario');

-- --------------------------------------------------------

--
-- Table structure for table `estadobeneficio`
--

DROP TABLE IF EXISTS `estadobeneficio`;
CREATE TABLE IF NOT EXISTS `estadobeneficio` (
  `IdEstadoBeneficio` tinyint(1) NOT NULL,
  `Descripcion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`IdEstadoBeneficio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `estadobeneficio`
--

INSERT INTO `estadobeneficio` (`IdEstadoBeneficio`, `Descripcion`) VALUES
(0, 'INACTIVO'),
(1, 'ACTIVO');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `RutFuncionario` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DirEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Cargo` tinyint DEFAULT NULL,
  `ClaveAcceso` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Estado` int DEFAULT NULL,
  PRIMARY KEY (`RutFuncionario`),
  KEY `Cargo` (`Cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`RutFuncionario`, `Nombre`, `Apellido`, `Direccion`, `DirEmail`, `Cargo`, `ClaveAcceso`, `Estado`) VALUES
('19589482-5', 'Francisco', 'Soto', 'Rancagua', 'equipoprogramacion69@gmail.com', 2, '1234', 0),
('26174021-4', 'Luigui', 'Vinci', 'Rancagua', 'luigui@gmail.com', 1, '1234', 1),
('4378812-4', 'Elton', 'Tito', 'Rengo', 'elton@mail.com', 1, '1234', 0),
('4678818-4', 'Armando esteban', 'Quito', 'Rancagua', 'armandoquito@gmail.com', 2, '1234', 1),
('6941733-7', 'Eduardo', 'Rojas', 'Machali', 'edrojas@gmail.com', 2, 'Francisco1!', 0),
('7378093-4', 'Icela', 'Creyo', 'Rancagua', 'icreyo@mail.com', 2, '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupobeneficio`
--

DROP TABLE IF EXISTS `grupobeneficio`;
CREATE TABLE IF NOT EXISTS `grupobeneficio` (
  `IdGrupo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `RutFuncionario` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TipoBenficio` tinyint DEFAULT NULL,
  `Horarios` tinyint DEFAULT NULL,
  PRIMARY KEY (`IdGrupo`),
  KEY `RutFuncionario` (`RutFuncionario`),
  KEY `TipoBenficio` (`TipoBenficio`),
  KEY `Horarios` (`Horarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `grupobeneficio`
--

INSERT INTO `grupobeneficio` (`IdGrupo`, `RutFuncionario`, `TipoBenficio`, `Horarios`) VALUES
('A01', '19589482-5', 2, 2),
('A02', '26174021-4', 2, 2),
('A03', '4678818-4', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `registroentradarecinto`
--

DROP TABLE IF EXISTS `registroentradarecinto`;
CREATE TABLE IF NOT EXISTS `registroentradarecinto` (
  `CodEntrada` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FechaDeEntrada` date DEFAULT NULL,
  `RutBeneficiario` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `IdGrupo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`CodEntrada`),
  KEY `IdGrupo` (`IdGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `registroentradarecinto`
--

INSERT INTO `registroentradarecinto` (`CodEntrada`, `FechaDeEntrada`, `RutBeneficiario`, `IdGrupo`) VALUES
('1', '2022-01-10', '10001', 'A01'),
('10', '2022-01-10', '10010', 'A01'),
('11', '2022-01-10', '10011', 'A02'),
('12', '2022-01-10', '10012', 'A02'),
('13', '2022-01-10', '10013', 'A02'),
('14', '2022-01-10', '10014', 'A02'),
('15', '2022-01-10', '10015', 'A02'),
('16', '2022-01-10', '10016', 'A02'),
('17', '2022-01-10', '10017', 'A02'),
('18', '2022-01-10', '10018', 'A02'),
('19', '2022-01-10', '10019', 'A02'),
('2', '2022-01-10', '10002', 'A01'),
('20', '2022-01-10', '10020', 'A02'),
('21', '2022-01-10', '10021', 'A02'),
('22', '2022-01-10', '10022', 'A03'),
('23', '2022-01-10', '10023', 'A03'),
('24', '2022-01-10', '10024', 'A03'),
('25', '2022-01-10', '10025', 'A03'),
('26', '2022-01-10', '10026', 'A03'),
('27', '2022-01-10', '10027', 'A03'),
('28', '2022-01-10', '10028', 'A03'),
('29', '2022-01-10', '10029', 'A03'),
('3', '2022-01-10', '10003', 'A01'),
('30', '2022-01-10', '10030', 'A03'),
('31', '2022-01-11', '10001', 'A01'),
('32', '2022-01-11', '10002', 'A01'),
('33', '2022-01-11', '10003', 'A01'),
('34', '2022-01-11', '10004', 'A01'),
('35', '2022-01-11', '10005', 'A01'),
('36', '2022-01-11', '10006', 'A01'),
('37', '2022-01-11', '10007', 'A01'),
('38', '2022-01-11', '10008', 'A01'),
('39', '2022-01-11', '10009', 'A01'),
('4', '2022-01-10', '10004', 'A01'),
('40', '2022-01-11', '10010', 'A01'),
('41', '2022-01-11', '10011', 'A02'),
('42', '2022-01-11', '10012', 'A02'),
('43', '2022-01-11', '10013', 'A02'),
('44', '2022-01-11', '10014', 'A02'),
('45', '2022-01-11', '10015', 'A02'),
('46', '2022-01-11', '10016', 'A02'),
('47', '2022-01-11', '10017', 'A02'),
('48', '2022-01-11', '10018', 'A02'),
('49', '2022-01-11', '10019', 'A02'),
('5', '2022-01-10', '10005', 'A01'),
('50', '2022-01-11', '10020', 'A02'),
('51', '2022-01-11', '10021', 'A02'),
('52', '2022-01-11', '10022', 'A03'),
('53', '2022-01-11', '10023', 'A03'),
('54', '2022-01-11', '10024', 'A03'),
('55', '2022-01-11', '10025', 'A03'),
('56', '2022-01-11', '10026', 'A03'),
('57', '2022-01-11', '10027', 'A03'),
('58', '2022-01-11', '10028', 'A03'),
('59', '2022-01-11', '10029', 'A03'),
('6', '2022-01-10', '10006', 'A01'),
('60', '2022-01-11', '10030', 'A03'),
('61', '2022-01-12', '10001', 'A01'),
('62', '2022-01-12', '10002', 'A01'),
('63', '2022-01-12', '10003', 'A01'),
('64', '2022-01-12', '10004', 'A01'),
('65', '2022-01-12', '10005', 'A01'),
('66', '2022-01-12', '10006', 'A01'),
('67', '2022-01-12', '10007', 'A01'),
('68', '2022-01-12', '10008', 'A01'),
('69', '2022-01-12', '10009', 'A01'),
('7', '2022-01-10', '10007', 'A01'),
('70', '2022-01-12', '10010', 'A01'),
('71', '2022-01-12', '10011', 'A02'),
('72', '2022-01-12', '10012', 'A02'),
('73', '2022-01-12', '10013', 'A02'),
('74', '2022-01-12', '10014', 'A02'),
('75', '2022-01-12', '10015', 'A02'),
('76', '2022-01-12', '10016', 'A02'),
('77', '2022-01-12', '10017', 'A02'),
('78', '2022-01-12', '10018', 'A02'),
('79', '2022-01-12', '10019', 'A02'),
('8', '2022-01-10', '10008', 'A01'),
('80', '2022-01-12', '10020', 'A02'),
('81', '2022-01-12', '10021', 'A02'),
('82', '2022-01-12', '10022', 'A03'),
('83', '2022-01-12', '10023', 'A03'),
('84', '2022-01-12', '10024', 'A03'),
('85', '2022-01-12', '10025', 'A03'),
('86', '2022-01-12', '10026', 'A03'),
('87', '2022-01-12', '10027', 'A03'),
('88', '2022-01-12', '10028', 'A03'),
('89', '2022-01-12', '10029', 'A03'),
('9', '2022-01-10', '10009', 'A01'),
('90', '2022-01-12', '10030', 'A03');

-- --------------------------------------------------------

--
-- Table structure for table `registroentregacolacion`
--

DROP TABLE IF EXISTS `registroentregacolacion`;
CREATE TABLE IF NOT EXISTS `registroentregacolacion` (
  `CodEntrega` int NOT NULL AUTO_INCREMENT,
  `FechaDeEntrega` date DEFAULT NULL,
  `RutBeneficiario` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `IdGrupo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `HoraDeEntrega` time DEFAULT NULL,
  PRIMARY KEY (`CodEntrega`),
  KEY `IdGrupo` (`IdGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `registroentregacolacion`
--

INSERT INTO `registroentregacolacion` (`CodEntrega`, `FechaDeEntrega`, `RutBeneficiario`, `IdGrupo`, `HoraDeEntrega`) VALUES
(4, '2022-12-01', '2576808-6', 'A02', '02:39:39'),
(5, '2022-12-01', '2576808-6', 'A02', '02:39:42'),
(6, '2022-12-01', '3066256-3', 'A03', '02:45:27'),
(7, '2022-12-01', '2530697-K', 'A01', '02:47:34'),
(8, '2022-12-01', '5000746-4', 'A02', '02:52:40'),
(9, '2022-12-01', '3490261-5', 'A03', '02:52:47'),
(10, '2022-12-01', '3433444-7', 'A02', '02:52:51'),
(11, '2022-12-01', '3562788-K', 'A01', '02:52:58'),
(12, '2022-12-01', '3758049-K', 'A02', '02:53:33'),
(13, '2022-12-01', '3781561-6', 'A03', '02:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `tipodebeneficio`
--

DROP TABLE IF EXISTS `tipodebeneficio`;
CREATE TABLE IF NOT EXISTS `tipodebeneficio` (
  `Id` tinyint NOT NULL,
  `Desayuno` tinyint(1) DEFAULT NULL,
  `Colacion` tinyint(1) DEFAULT NULL,
  `Merienda` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tipodebeneficio`
--

INSERT INTO `tipodebeneficio` (`Id`, `Desayuno`, `Colacion`, `Merienda`) VALUES
(1, 1, 1, 1),
(2, 1, 0, 0),
(3, 1, 1, 0),
(4, 1, 0, 1),
(5, 0, 1, 1),
(6, 0, 0, 1),
(7, 0, 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`IdEstadoBeneficio`) REFERENCES `estadobeneficio` (`IdEstadoBeneficio`),
  ADD CONSTRAINT `beneficiario_ibfk_2` FOREIGN KEY (`GrupoBeneficio`) REFERENCES `grupobeneficio` (`IdGrupo`);

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`Cargo`) REFERENCES `cargofuncionario` (`IdCargo`);

--
-- Constraints for table `grupobeneficio`
--
ALTER TABLE `grupobeneficio`
  ADD CONSTRAINT `grupobeneficio_ibfk_2` FOREIGN KEY (`RutFuncionario`) REFERENCES `funcionario` (`RutFuncionario`),
  ADD CONSTRAINT `grupobeneficio_ibfk_3` FOREIGN KEY (`TipoBenficio`) REFERENCES `tipodebeneficio` (`Id`),
  ADD CONSTRAINT `grupobeneficio_ibfk_4` FOREIGN KEY (`Horarios`) REFERENCES `bloquehorario` (`Id`);

--
-- Constraints for table `registroentradarecinto`
--
ALTER TABLE `registroentradarecinto`
  ADD CONSTRAINT `registroentradarecinto_ibfk_1` FOREIGN KEY (`IdGrupo`) REFERENCES `grupobeneficio` (`IdGrupo`);

--
-- Constraints for table `registroentregacolacion`
--
ALTER TABLE `registroentregacolacion`
  ADD CONSTRAINT `registroentregacolacion_ibfk_1` FOREIGN KEY (`IdGrupo`) REFERENCES `grupobeneficio` (`IdGrupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
