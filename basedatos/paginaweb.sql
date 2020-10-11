-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 19:48:53
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paginaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `idarchivo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `idnegocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idbitacora` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horainicio` datetime DEFAULT NULL,
  `horafin` datetime DEFAULT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `tipo_documento`, `documento`, `nombre`, `telefono1`, `telefono2`, `direccion`, `correo`) VALUES
(1, 'Juridico', '985474', 'SGInmobiliar', '966', '966', '966', '855');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientenegocio`
--

CREATE TABLE `clientenegocio` (
  `idclientenegocio` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idnegocio` int(11) NOT NULL,
  `idinmueble` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idcomentarios` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `comentario` varchar(2000) DEFAULT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabanco`
--

CREATE TABLE `cuentabanco` (
  `idcuenta` int(11) NOT NULL,
  `banco` varchar(45) NOT NULL,
  `sucursal` varchar(100) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `idfoto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `idinmueble` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `idhistorico` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(45) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `valorcomision` double DEFAULT NULL,
  `valoriva` double DEFAULT NULL,
  `idnegocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `idinmueble` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `oferta` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `valorarriendo` double DEFAULT NULL,
  `valorventa` double DEFAULT NULL,
  `valoradmin` double DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `barrio` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `habitaciones` int(11) DEFAULT NULL,
  `baños` int(11) DEFAULT NULL,
  `piso` int(11) DEFAULT NULL,
  `estrato` int(11) DEFAULT NULL,
  `descripcion` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idmovimiento` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `concepto` varchar(100) DEFAULT NULL,
  `contrato` varchar(45) NOT NULL,
  `factura` varchar(45) DEFAULT NULL,
  `fecha` date NOT NULL,
  `valor` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idnegocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `idnegocio` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `contrato` varchar(45) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `valorcomision` double DEFAULT NULL,
  `valoriva` double DEFAULT NULL,
  `observacion` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia`
--

CREATE TABLE `referencia` (
  `idreferencia` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `parentesco` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `idtrabajo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `nombrejefe` varchar(45) DEFAULT NULL,
  `telefonojefe` varchar(45) DEFAULT NULL,
  `antiguedad` int(11) DEFAULT NULL,
  `ingresos` double DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='			';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contra` varchar(150) NOT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `documento`, `nombre`, `rol`, `estado`, `correo`, `contra`, `direccion`, `telefono`, `foto`) VALUES
(13, '3828448', 'pedro luis', 'Administrador', 'Activo', 'druped@hotmail.com', '$2y$10$Sm0g0hvvmaI.cmR8UewWGuq7Ukeo8pHYlZOekNzd7v7.9mn0UrGeS', '', '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idarchivo`),
  ADD KEY `archvio_idx` (`idnegocio`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `ingresos_idx` (`idusuario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`);

--
-- Indices de la tabla `clientenegocio`
--
ALTER TABLE `clientenegocio`
  ADD PRIMARY KEY (`idclientenegocio`),
  ADD KEY `cliente-n_idx` (`idcliente`),
  ADD KEY `negocio-c_idx` (`idnegocio`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentarios`),
  ADD KEY `comentario_idx` (`idcliente`);

--
-- Indices de la tabla `cuentabanco`
--
ALTER TABLE `cuentabanco`
  ADD PRIMARY KEY (`idcuenta`),
  ADD KEY `cuenta_idx` (`idcliente`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idfoto`),
  ADD KEY `fotos_idx` (`idinmueble`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`idhistorico`),
  ADD KEY `procesoestado_idx` (`idnegocio`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`idinmueble`),
  ADD KEY `inmueble_idx` (`idcliente`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idmovimiento`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`idnegocio`),
  ADD UNIQUE KEY `contrato_UNIQUE` (`contrato`);

--
-- Indices de la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD PRIMARY KEY (`idreferencia`),
  ADD KEY `rc_idx` (`idcliente`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`idtrabajo`),
  ADD KEY `tc_idx` (`idcliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idarchivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientenegocio`
--
ALTER TABLE `clientenegocio`
  MODIFY `idclientenegocio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuentabanco`
--
ALTER TABLE `cuentabanco`
  MODIFY `idcuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `idfoto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `idhistorico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `idinmueble` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `idnegocio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencia`
--
ALTER TABLE `referencia`
  MODIFY `idreferencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `idtrabajo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archvio` FOREIGN KEY (`idnegocio`) REFERENCES `negocio` (`idnegocio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `ingresos` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientenegocio`
--
ALTER TABLE `clientenegocio`
  ADD CONSTRAINT `cliente-n` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `negocio-c` FOREIGN KEY (`idnegocio`) REFERENCES `negocio` (`idnegocio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentabanco`
--
ALTER TABLE `cuentabanco`
  ADD CONSTRAINT `cuenta` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fotos` FOREIGN KEY (`idinmueble`) REFERENCES `inmueble` (`idinmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `procesoestado` FOREIGN KEY (`idnegocio`) REFERENCES `negocio` (`idnegocio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `inmueble` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD CONSTRAINT `rc` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `tc` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
