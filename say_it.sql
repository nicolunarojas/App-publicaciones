-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2014 a las 18:33:46
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `say_it`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `posts` text COLLATE utf8_bin,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`usuario`, `posts`, `fecha`) VALUES
('william', 'Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I''m in a transitional period so I don''t wanna kill you, I wanna help you.', '2014-10-02 09:55:58'),
('violet', 'My money''s in that office, right? If she start giving me some bullshit about it ain''t there, and we got to go someplace else and get it, I''m gonna shoot you in the head then and there.', '2014-10-02 10:41:14'),
('john', 'Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that''s what you see at a toy store.', '2014-10-02 10:41:42'),
('tyrone', 'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit?', '2014-10-02 10:41:58'),
('diana', 'Well, the way they make shows is, they make one show. That show''s called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they''re going to make more shows.', '2014-10-02 10:42:13'),
('ryan', 'You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out.', '2014-10-02 10:44:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `usuario`, `password`) VALUES
(1, 'Tyrone', 'Jackson', 'tyrone@mail.com', 'tyrone', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Diana', 'Allen', 'diana@mail.com', 'diana', '827ccb0eea8a706c4c34a16891f84e7b'),
(18, 'John', 'Smith', 'john@mail.com', 'john', '827ccb0eea8a706c4c34a16891f84e7b'),
(19, 'William', 'Stewart', 'william@mail.com', 'william', '827ccb0eea8a706c4c34a16891f84e7b'),
(20, 'Violet', 'Graham', 'violet@mail.com', 'violet', '827ccb0eea8a706c4c34a16891f84e7b'),
(22, 'Ryan', 'Oconnell', 'ryan@mail.com', 'ryan', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
