-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2017 a las 22:17:40
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `animapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `idUsuarioD` int(11) DEFAULT NULL,
  `idPost` int(11) NOT NULL,
  `comentario` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fechaPublic` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idUsuarioD`, `idPost`, `comentario`, `fechaPublic`) VALUES
(1, 1, 15, 'Está muy bonito mijo, saludame a tu mami', '2017-12-11'),
(2, 6, 15, 'hdsbcjdsbchdbc', '2017-12-11'),
(3, 6, 15, 'cdkncjsdncjsd', '2017-12-11'),
(4, 6, 15, 'nckckldsnkc', '2017-12-11'),
(5, 6, 15, 'kcnkcsdnvjnds', '2017-12-11'),
(6, 1, 15, 'Hola', '2017-12-11'),
(7, 1, 16, 'Tengo Hambre', '2017-12-12'),
(8, 1, 16, 'Mucha hambre', '2017-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follow`
--

CREATE TABLE `follow` (
  `idFollow` int(11) NOT NULL,
  `idUsuarioD` int(11) DEFAULT NULL,
  `idUsuarioR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likepost`
--

CREATE TABLE `likepost` (
  `idLike` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `likepost`
--

INSERT INTO `likepost` (`idLike`, `idUsuario`, `idPost`) VALUES
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 4),
(9, 1, 4),
(10, 1, 4),
(11, 1, 4),
(12, 1, 5),
(13, 1, 5),
(14, 1, 5),
(15, 1, 5),
(16, 1, 5),
(17, 1, 5),
(18, 1, 5),
(19, 1, 5),
(21, 3, 5),
(22, 1, 6),
(23, 1, 3),
(24, 1, 2),
(25, 3, 6),
(26, 1, 7),
(27, 6, 8),
(28, 6, 11),
(29, 6, 15),
(30, 6, 12),
(31, 6, 14),
(32, 6, 7),
(33, 6, 5),
(34, 6, 16),
(35, 1, 16),
(36, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `fechaPost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numLikes` int(11) DEFAULT '0',
  `dibujo` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idPost`, `fechaPost`, `numLikes`, `dibujo`) VALUES
(1, '2017-12-08 22:26:04', 0, 'post1.png'),
(2, '2017-12-08 22:39:05', 0, 'post2.png'),
(3, '2017-12-08 22:39:59', 0, 'post3.png'),
(4, '2017-12-09 04:53:52', 0, 'post4.png'),
(5, '2017-12-09 05:01:32', 0, 'post5.png'),
(6, '2017-12-09 19:28:28', 0, 'post6.png'),
(7, '2017-12-11 07:53:34', 0, 'post7.png'),
(8, '2017-12-11 07:55:25', 0, 'post8.png'),
(11, '2017-12-11 08:03:12', 3, 'post11.png'),
(12, '2017-12-11 08:04:19', 0, 'post12.png'),
(13, '2017-12-11 08:07:08', 0, 'post13.png'),
(14, '2017-12-11 08:07:52', 0, 'post14.png'),
(15, '2017-12-11 19:40:08', 0, 'post15.png'),
(16, '2017-12-11 22:25:44', 0, 'post16.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `numPosts` int(11) DEFAULT '0',
  `numFollows` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellidos`, `username`, `email`, `pass`, `fechaRegistro`, `numPosts`, `numFollows`) VALUES
(1, 'Alejandro', 'Avalos', 'AlexAvalosxP', 'alex@live.com', '123', '2017-11-21', 0, 0),
(2, 'Daniel', 'Torres', 'DanyL', 'danyt@gmail.com', '123', '2017-11-21', 0, 0),
(3, 'Fernando', 'Ruiz', 'FRuiz', 'ruiz@hotmail.com', '123', '2017-11-21', 0, 0),
(4, 'Roberto', 'Lopez', 'rl', 'rob@lop', '123', '2017-11-21', 0, 0),
(5, 'Alex', 'Avalos', 'Aleaxes', 'aleaxes@mail.com', '123', '2017-11-21', 0, 0),
(6, 'Paola', 'RamÃ­rez', 'Pao', 'asdf@lko', '123', '2017-12-11', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariospost`
--

CREATE TABLE `usuariospost` (
  `idUserPost` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPost` int(11) DEFAULT NULL,
  `tipoAutor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuariospost`
--

INSERT INTO `usuariospost` (`idUserPost`, `idUsuario`, `idPost`, `tipoAutor`) VALUES
(2, 1, 1, 1),
(3, 1, 2, 1),
(4, 1, 3, 1),
(5, 1, 4, 1),
(6, 1, 5, 1),
(7, 1, 6, 1),
(8, 1, 7, 1),
(9, 1, 8, 1),
(10, 1, 11, 1),
(11, 3, 12, 1),
(12, 1, 13, 1),
(13, 1, 14, 1),
(14, 6, 15, 1),
(15, 6, 16, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuarioD` (`idUsuarioD`),
  ADD KEY `idPost` (`idPost`);

--
-- Indices de la tabla `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`idFollow`),
  ADD KEY `idUsuarioD` (`idUsuarioD`),
  ADD KEY `idUsuarioR` (`idUsuarioR`);

--
-- Indices de la tabla `likepost`
--
ALTER TABLE `likepost`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPost` (`idPost`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `usuariospost`
--
ALTER TABLE `usuariospost`
  ADD PRIMARY KEY (`idUserPost`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPost` (`idPost`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `follow`
--
ALTER TABLE `follow`
  MODIFY `idFollow` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `likepost`
--
ALTER TABLE `likepost`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuariospost`
--
ALTER TABLE `usuariospost`
  MODIFY `idUserPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idUsuarioD`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`);

--
-- Filtros para la tabla `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`idUsuarioD`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`idUsuarioR`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `likepost`
--
ALTER TABLE `likepost`
  ADD CONSTRAINT `likepost_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `likepost_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`);

--
-- Filtros para la tabla `usuariospost`
--
ALTER TABLE `usuariospost`
  ADD CONSTRAINT `usuariospost_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `usuariospost_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
