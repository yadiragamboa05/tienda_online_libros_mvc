-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2025 a las 05:26:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `negociosdb`
--
CREATE DATABASE IF NOT EXISTS `negociosdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `negociosdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `Nombre_Categoria` varchar(255) NOT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Categoria`, `Nombre_Categoria`, `Descripcion`) VALUES
(1, 'Drama', 'Historias emocionales y profundas que exploran los aspectos más complejos de la vida y las relaciones humanas. Los libros de drama suelen presentar personajes realistas enfrentándose a desafíos significativos.'),
(2, 'Comedia', 'Libros diseñados para hacerte reír, con tramas divertidas y personajes carismáticos. Incluyen humor inteligente, situaciones cómicas y diálogos ingeniosos que garantizan una lectura amena y entretenida.'),
(3, 'Acción', 'Novelas llenas de adrenalina, con escenas de alta tensión, persecuciones emocionantes y enfrentamientos intensos. Perfectas para los amantes de la aventura y la emoción constante.'),
(4, 'Aventura', 'Relatos que llevan a los lectores a viajes épicos y descubrimientos fascinantes. Desde exploraciones en tierras desconocidas hasta misiones heroicas, estos libros garantizan una experiencia de lectura apasionante.'),
(5, 'Romance', 'Historias de amor que hacen palpitar el corazón. Desde romances apasionados hasta tiernos encuentros, estos libros exploran las relaciones afectivas y el poder del amor en todas sus formas.'),
(6, 'Terror', 'Libros diseñados para asustar y mantener a los lectores en el borde de sus asientos. Con tramas inquietantes, atmósferas espeluznantes y personajes escalofriantes, estos relatos son perfectos para los amantes del horror.'),
(7, 'Ficción', 'Una categoría amplia que incluye cualquier historia creada a partir de la imaginación del autor. Desde realismo mágico hasta novelas contemporáneas, la ficción ofrece un vasto mundo de posibilidades narrativas.'),
(8, 'Infantil', 'Libros diseñados para los más pequeños, con historias encantadoras, ilustraciones coloridas y personajes entrañables. Estas historias fomentan la imaginación y el amor por la lectura desde temprana edad.'),
(9, 'Horror', 'Similar al terror, pero con un énfasis en lo grotesco y lo macabro. Estos libros exploran lo sobrenatural, lo espeluznante y lo perturbador, ideal para quienes disfrutan de relatos oscuros y aterradores.'),
(10, 'Medieval', 'Novelas ambientadas en la Edad Media, con caballeros, castillos, y batallas épicas. Estos libros transportan a los lectores a tiempos de honor, valentía y aventuras históricas.'),
(11, 'Magia', 'Historias que exploran mundos donde la magia es real. Desde hechizos y criaturas fantásticas hasta magos poderosos y aventuras mágicas, estos libros despiertan la imaginación y la maravilla.'),
(12, 'Ciencia Ficción', 'Relatos que exploran futuros posibles, tecnología avanzada y universos alternativos. Estos libros a menudo plantean preguntas filosóficas y científicas sobre la humanidad, el progreso y el cosmos.'),
(13, 'Fantasía', 'Historias ambientadas en mundos imaginarios llenos de magia, criaturas míticas y héroes épicos. Desde reinos encantados hasta batallas entre el bien y el mal, la fantasía ofrece una escapada a lo extraordinario.'),
(14, 'Misterio', 'Novelas que giran en torno a enigmas, crímenes y detectives. Con tramas intrincadas y giros inesperados, estos libros mantienen a los lectores adivinando hasta el final.'),
(15, 'Biografías y Memorias', 'Relatos verídicos sobre las vidas de personas fascinantes y eventos históricos. Desde figuras influyentes hasta relatos personales conmovedores, estas historias ofrecen una visión íntima del mundo real.'),
(16, 'Historia', 'Libros que exploran eventos y períodos históricos, proporcionando una comprensión profunda del pasado. Estas obras pueden ser tanto académicas como narrativas, ofreciendo contextos ricos y detallados.'),
(17, 'Ciencia y Tecnología', 'Obras que explican conceptos científicos y tecnológicos de manera accesible y fascinante. Desde teorías revolucionarias hasta avances modernos, estos libros inspiran curiosidad y conocimiento.'),
(18, 'Desarrollo Personal', 'Libros que buscan ayudar a los lectores a mejorar aspectos de su vida, desde la autoayuda y el crecimiento personal hasta la motivación y el bienestar emocional.'),
(19, 'Autoayuda y Superación', 'Libros diseñados para ofrecer consejos prácticos y motivación, ayudando a los lectores a superar desafíos personales y alcanzar sus metas.'),
(20, 'Espiritualidad y Religión', 'Obras que exploran creencias, prácticas espirituales y filosofías religiosas. Estos libros pueden ofrecer tanto orientación espiritual como reflexiones profundas sobre la vida y el propósito.'),
(21, 'Novelas Gráficas y Cómics', 'Historias contadas a través de la combinación de ilustraciones y texto. Desde superhéroes y aventuras épicas hasta relatos personales y gráficos, esta categoría ofrece una rica variedad de formatos visuales.'),
(22, 'Poesía', 'Colecciones de poemas que capturan emociones, pensamientos y experiencias humanas a través de un lenguaje lírico y evocador. Desde lo clásico hasta lo contemporáneo, la poesía ofrece una forma única de expresión artística.'),
(23, 'Ensayo', 'Textos que exploran temas diversos a través del análisis y la reflexión. Desde comentarios sociales y políticos hasta críticas culturales y filosóficas, los ensayos ofrecen perspectivas profundas y bien fundamentadas.'),
(24, 'Viajes y Aventuras', 'Relatos de exploración y descubrimiento, ya sean aventuras reales o ficticias. Estos libros transportan a los lectores a lugares exóticos y experiencias emocionantes.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `ID_Cliente` int(11) NOT NULL,
  `Nombre_Cliente` varchar(255) NOT NULL,
  `Nombre_Contacto` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Codigo_Postal` varchar(20) NOT NULL,
  `Pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_Cliente`, `Nombre_Cliente`, `Nombre_Contacto`, `Direccion`, `Ciudad`, `Codigo_Postal`, `Pais`) VALUES
(1, 'Yadira Gamboa', 'Yadira G.', 'Urb. El Pacifico Mz A Lt 31', 'Lima', '15121', 'Perú'),
(2, 'Elisa', 'LuisA.', 'Urb. El Pacifico Mz A Lt 31', 'Lima', '15121', 'Perú'),
(3, 'admin', 'admin', 'Urb. El Pacifico Mz A Lt 31', 'Lima', '11111', 'Perú'),
(9, 'Luis Angel', 'LuisA.', 'Urb. El Pacifico Mz A Lt 31', 'lima', '12333', 'Perú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

DROP TABLE IF EXISTS `conductores`;
CREATE TABLE `conductores` (
  `ID_Conductor` int(11) NOT NULL,
  `Nombre_Conductor` varchar(255) NOT NULL,
  `Celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`ID_Conductor`, `Nombre_Conductor`, `Celular`) VALUES
(1, 'max', '952899999');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `ID_Empleado` int(11) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Nombres` varchar(255) NOT NULL,
  `Fecha_de_nacimiento` date NOT NULL,
  `Foto` blob DEFAULT NULL,
  `Descripción` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID_Empleado`, `Apellidos`, `Nombres`, `Fecha_de_nacimiento`, `Foto`, `Descripción`) VALUES
(1, 'Gamboa', 'Yadira', '2005-06-16', NULL, 'aja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendetalles`
--

DROP TABLE IF EXISTS `ordendetalles`;
CREATE TABLE `ordendetalles` (
  `ID_OrdenDetalles` int(11) NOT NULL,
  `ID_Orden` int(11) NOT NULL,
  `ID_Libro` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordendetalles`
--

INSERT INTO `ordendetalles` (`ID_OrdenDetalles`, `ID_Orden`, `ID_Libro`, `Cantidad`) VALUES
(5, 5, 1, 2),
(7, 5, 1, 2),
(9, 5, 1, 2),
(11, 5, 1, 2),
(12, 5, 1, 1),
(13, 15, 3, 1),
(14, 16, 2, 1),
(15, 18, 14, 1),
(16, 18, 11, 1),
(17, 18, 1, 1),
(18, 18, 21, 1),
(19, 19, 2, 1),
(20, 20, 6, 1),
(21, 21, 2, 1),
(22, 22, 5, 1),
(23, 23, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE `ordenes` (
  `ID_Orden` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `ID_Empleado` int(11) NOT NULL,
  `Fecha_Orden` date NOT NULL,
  `ID_Conductor` int(11) NOT NULL,
  `Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`ID_Orden`, `ID_Cliente`, `ID_Empleado`, `Fecha_Orden`, `ID_Conductor`, `Estado`) VALUES
(5, 1, 1, '2024-07-17', 1, ''),
(7, 1, 1, '2024-07-17', 1, ''),
(8, 1, 1, '2024-07-17', 1, ''),
(9, 1, 1, '2024-07-17', 1, ''),
(10, 1, 1, '2024-07-17', 1, ''),
(12, 1, 1, '2024-07-17', 1, ''),
(13, 2, 1, '2024-07-17', 1, ''),
(14, 2, 1, '2024-07-17', 1, ''),
(15, 1, 1, '2024-07-17', 1, ''),
(16, 1, 1, '2024-07-17', 1, ''),
(17, 1, 1, '2024-07-03', 1, ''),
(18, 1, 1, '2024-07-17', 1, ''),
(19, 1, 1, '2024-07-17', 1, ''),
(20, 1, 1, '2024-07-17', 1, ''),
(21, 9, 1, '2024-07-17', 1, ''),
(22, 1, 1, '2024-07-26', 1, ''),
(23, 1, 1, '2024-08-25', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `ID_Libro` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Autor` varchar(255) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `ID_Proveedor` int(11) DEFAULT NULL,
  `ID_Categoria` int(11) DEFAULT NULL,
  `Editorial` varchar(255) DEFAULT NULL,
  `Fecha_Publicacion` date DEFAULT NULL,
  `Num_Paginas` int(11) DEFAULT NULL,
  `Link_Imagen` varchar(255) DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Libro`, `Titulo`, `Autor`, `ISBN`, `ID_Proveedor`, `ID_Categoria`, `Editorial`, `Fecha_Publicacion`, `Num_Paginas`, `Link_Imagen`, `Precio`, `Stock`) VALUES
(1, 'La Casa de los Espíritus', 'Isabel Allende', '1234567890', 1, 1, 'Editorial Sudamericana', '1982-01-01', 448, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBO7UlwFaCUVyay7LgEV2-_FKXccqTP4oUZw&s', 60.00, 50),
(2, 'El Gran Gatsby', 'F. Scott Fitzgerald', '1234567891', 1, 1, 'Charles Scribner\'s Sons', '1925-04-10', 180, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9786073153706_og4y2ogpylyk7ngd.jpg', 15.00, 45),
(3, 'Cien Años de Soledad', 'Gabriel García Márquez', '1234567892', 1, 1, 'Editorial Sudamericana', '1967-06-05', 471, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUgsUCPHp3SOTsijY_tNLp8zOiGxJCUZ0yEA&s', 25.00, 40),
(4, 'Buenos Presagios', 'Neil Gaiman y Terry Pratchett', '1234567893', 1, 2, 'Gollancz', '1990-05-01', 288, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-xAlDmjxFRoyKyMgA9JERHBLzjY9qt3EtUA&s', 18.00, 35),
(5, 'Wilt', 'Tom Sharpe', '1234567894', 1, 2, 'Secker & Warburg', '1976-05-01', 208, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPT-XO-fcWpbNEDhD6I2wTrOkgYc37a4qAJA&s', 12.00, 30),
(6, 'La Tregua', 'Mario Benedetti', '1234567895', 1, 2, 'Editorial Alfa', '1960-01-01', 192, 'https://images.cdn1.buscalibre.com/fit-in/360x360/0b/3b/0b3b5778165bc3dad053eac37ee0ebb7.jpg', 10.00, 25),
(7, 'La Isla del Tesoro', 'Robert Louis Stevenson', '1234567896', 1, 3, 'Cassell and Company', '1883-11-14', 240, 'https://images.cdn3.buscalibre.com/fit-in/360x360/ab/25/ab257042248996457bbdb1f4e3b31c9b.jpg', 14.00, 50),
(8, 'Jurassic Park', 'Michael Crichton', '1234567897', 1, 3, 'Alfred A. Knopf', '1990-11-20', 400, 'https://images.cdn3.buscalibre.com/fit-in/360x360/28/55/28553533d8503c62793e6519e92019d7.jpg', 20.00, 40),
(9, 'El Código Da Vinci', 'Dan Brown', '1234567898', 1, 3, 'Doubleday', '2003-03-18', 689, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3u1lgiLIVS5IX2PCJ2conii7v84NsQi1Xbg&s', 22.00, 30),
(10, 'Viaje al Centro de la Tierra', 'Julio Verne', '1234567899', 1, 4, 'Pierre-Jules Hetzel', '1864-11-25', 183, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRFlAqrBHqnbsJhwtIDjKtp9tMpXh0IpSR2Q&s', 16.00, 40),
(11, 'El Hobbit', 'J.R.R. Tolkien', '1234567800', 1, 4, 'George Allen & Unwin', '1937-09-21', 310, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFR4z-1xbwe3vtsLxEFJqPG8OQjvNabeHjxQ&s', 25.00, 30),
(12, 'Robinson Crusoe', 'Daniel Defoe', '1234567801', 1, 4, 'W. Taylor', '1719-04-25', 320, 'https://images.cdn1.buscalibre.com/fit-in/360x360/86/ce/86ce8b5c8ce032f9d465d8d04f0a7d8e.jpg', 18.00, 20),
(13, 'Orgullo y Prejuicio', 'Jane Austen', '1234567802', 1, 5, 'T. Egerton', '1813-01-28', 279, 'https://images.cdn2.buscalibre.com/fit-in/360x360/87/f6/87f65e1a8d325ee80f4be36b32f7f08f.jpg', 15.00, 35),
(14, 'Posdata: Te Amo', 'Cecelia Ahern', '1234567803', 1, 5, 'HarperCollins', '2004-01-01', 512, 'https://images.cdn1.buscalibre.com/fit-in/360x360/27/de/27de170318c83525d94d01556f9d71d7.jpg', 20.00, 30),
(15, 'Bajo la Misma Estrella', 'John Green', '1234567804', 1, 5, 'Dutton Books', '2012-01-10', 313, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl0psV1iOnSnB6h5LdamC3jw21AxTioklQiw&s', 18.00, 25),
(16, 'It', 'Stephen King', '1234567805', 1, 6, 'Viking Press', '1986-09-15', 1138, 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781501141232/it-9781501141232_hr.jpg', 22.00, 40),
(17, 'Drácula', 'Bram Stoker', '1234567806', 1, 6, 'Archibald Constable and Company', '1897-05-26', 418, 'https://images.cdn2.buscalibre.com/fit-in/360x360/15/e5/15e55a11bf7ab69d43d90567a7b55827.jpg', 15.00, 35),
(18, 'El Exorcista', 'William Peter Blatty', '1234567807', 1, 6, 'Harper & Row', '1971-06-01', 340, 'https://images.cdn2.buscalibre.com/fit-in/520x520/a4/96/a49667b321ba489415ebdbf7035162ae.jpg', 20.00, 30),
(19, '1984', 'George Orwell', '1234567808', 1, 7, 'Secker & Warburg', '1949-06-08', 328, 'https://images.cdn1.buscalibre.com/fit-in/360x360/ab/54/ab54a82815e061d7fc8f22bcd22f2605.jpg', 15.00, 40),
(20, 'Matar a un Ruiseñor', 'Harper Lee', '1234567809', 1, 7, 'J.B. Lippincott & Co.', '1960-07-11', 281, 'https://images.cdn2.buscalibre.com/fit-in/360x360/0f/25/0f25231fd7db1c56defb44d67d8cf4a7.jpg', 18.00, 35),
(21, 'Crimen y Castigo', 'Fyodor Dostoevsky', '1234567810', 1, 7, 'The Russian Messenger', '1866-01-01', 430, 'https://cdn.prod.website-files.com/6034d7d1f3e0f52c50b2adee/6254541d8ae4df16d4e69bc8_6034d7d1f3e0f54529b2b1a1_Crimen-y-castigo-fiodor-dostoyevski-editorial-alma.jpeg', 20.00, 30),
(22, 'El Principito', 'Antoine de Saint-Exupéry', '1234567811', 1, 8, 'Reynal & Hitchcock', '1943-04-06', 96, 'https://images.cdn1.buscalibre.com/fit-in/360x360/75/23/75237f2f609042d9713cb03b681c77c1.jpg', 10.00, 50),
(23, 'Harry Potter y la Piedra Filosofal', 'J.K. Rowling', '1234567812', 1, 8, 'Bloomsbury', '1997-06-26', 223, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9786124498015_s_nzb62mi9imisu6jr.jpg', 22.00, 45),
(24, 'Alicia en el País de las Maravillas', 'Lewis Carroll', '1234567813', 1, 8, 'Macmillan', '1865-11-26', 200, 'https://images.cdn1.buscalibre.com/fit-in/360x360/42/7f/427f18ddc9cb21b5d943a63517df875a.jpg', 12.00, 40),
(25, 'El Resplandor', 'Stephen King', '1234567814', 1, 9, 'Doubleday', '1977-01-28', 447, 'https://images.cdn3.buscalibre.com/fit-in/360x360/49/66/49661480fa1f78034b80bae7ed020841.jpg', 20.00, 35),
(26, 'Frankenstein', 'Mary Shelley', '1234567815', 1, 9, 'Lackington, Hughes, Harding, Mavor & Jones', '1818-01-01', 280, 'https://images.cdn1.buscalibre.com/fit-in/360x360/15/54/1554d01d226679a6e8402fad007b31a6.jpg', 15.00, 30),
(27, 'El Horror de Dunwich', 'H.P. Lovecraft', '1234567816', 1, 9, 'Weird Tales', '1929-04-01', 44, 'https://images.cdn1.buscalibre.com/fit-in/360x360/b7/3a/b73a2ccfa144a36bfc9c0f5fd0cacc25.jpg', 10.00, 25),
(28, 'Ivanhoe', 'Walter Scott', '1234567817', 1, 10, 'Archibald Constable', '1820-12-20', 600, 'https://images.cdn2.buscalibre.com/fit-in/360x360/b5/bc/b5bcde278d2b5a97eb4b492c3361abec.jpg', 25.00, 20),
(29, 'El Nombre de la Rosa', 'Umberto Eco', '1234567818', 1, 10, 'Bompiani', '1980-01-01', 512, 'https://images.cdn1.buscalibre.com/fit-in/360x360/79/02/790216040eb29268f55c59b01b1b2e11.jpg', 20.00, 25),
(30, 'Los Pilares de la Tierra', 'Ken Follett', '1234567819', 1, 10, 'Penguin Books', '1989-10-01', 973, 'https://images.cdn2.buscalibre.com/fit-in/360x360/61/32/61328f4133cbc217435c385c1eaefd74.jpg', 30.00, 15),
(31, 'La Historia Interminable', 'Michael Ende', '1234567820', 2, 11, 'Thienemann Verlag', '1979-01-01', 528, 'https://images.cdn1.buscalibre.com/fit-in/360x360/5b/18/5b18ed831bc8fbbac844f6a7bc5f9a51.jpg', 25.00, 30),
(32, 'El Alquimista', 'Paulo Coelho', '1234567821', 1, 11, 'HarperTorch', '1988-01-01', 208, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0fu1DiLxwD34XFhlFpPUa5d_NgH5ibmyF9A&s', 18.00, 35),
(33, 'La Rueda del Tiempo', 'Robert Jordan', '1234567822', 1, 11, 'Tor Books', '1990-01-15', 782, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSibebFEb8nUDwnBcQQjw1WRbPgVjOO95Tegg&s', 22.00, 25),
(34, 'Dune', 'Frank Herbert', '1234567823', 1, 12, 'Chilton Books', '1965-08-01', 412, 'https://images.cdn1.buscalibre.com/fit-in/360x360/86/9f/869fa8cf3c087c954b6a3b7293c31469.jpg', 25.00, 40),
(35, 'Neuromante', 'William Gibson', '1234567824', 1, 12, 'Ace', '1984-01-01', 271, 'https://images.cdn3.buscalibre.com/fit-in/360x360/f1/2f/f12f5e6380d39492ee34805c6875cda7.jpg', 18.00, 30),
(36, 'El Juego de Ender', 'Orson Scott Card', '1234567825', 1, 12, 'Tor Books', '1985-01-15', 324, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9786124758713_ip4tlfh8zlgdg05n.jpg', 20.00, 25),
(37, 'El Señor de los Anillos', 'J.R.R. Tolkien', '1234567826', 1, 13, 'George Allen & Unwin', '1954-07-29', 1216, 'https://images.cdn3.buscalibre.com/fit-in/360x360/54/49/5449ba87a3e457a22dd6d0972b5c261e.jpg', 30.00, 30),
(38, 'Canción de Hielo y Fuego', 'George R.R. Martin', '1234567827', 1, 13, 'Bantam Books', '1996-08-06', 694, 'https://www.penguinlibros.com/pe/2386399/paquete-digital-cancion-de-hielo-y-fuego-5-libros.jpg', 28.00, 35),
(39, 'La Espada de Shannara', 'Terry Brooks', '1234567828', 1, 13, 'Random House', '1977-02-01', 726, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSac428ZOTb8uKWsY1xyu_f8VrjWw_zep5LRg&s', 22.00, 20),
(40, 'El Silencio de los Corderos', 'Thomas Harris', '1234567829', 1, 14, 'St. Martin\'s Press', '1988-01-01', 338, 'https://es.web.img3.acsta.net/medias/nmedia/18/74/29/15/19757760.jpg', 18.00, 25),
(41, 'El Nombre del Viento', 'Patrick Rothfuss', '1234567830', 1, 14, 'DAW Books', '2007-03-27', 662, 'https://images.cdn3.buscalibre.com/fit-in/360x360/a7/90/a790dff70defe5c61b66fd73716b6e30.jpg', 20.00, 30),
(42, 'Sherlock Holmes: Estudio en Escarlata', 'Arthur Conan Doyle', '1234567831', 1, 14, 'Ward, Lock & Co.', '1887-11-01', 188, 'https://cdn.prod.website-files.com/6034d7d1f3e0f52c50b2adee/625452f9a6137d58b8b112d5_6034d7d1f3e0f5af57b2b268_Estudio-en-escarlata-el-signo-de-los-cuatro-arthur-conan-doyle-editorial-alma.jpeg', 15.00, 20),
(43, 'El Diario de Ana Frank', 'Ana Frank', '1234567832', 1, 15, 'Contact Publishing', '1947-06-25', 283, 'https://images.cdn2.buscalibre.com/fit-in/360x360/ca/68/ca68f22e2929bf812303fdc9cbe05624.jpg', 15.00, 40),
(44, 'Steve Jobs', 'Walter Isaacson', '1234567833', 1, 15, 'Simon & Schuster', '2011-10-24', 656, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9786073122405_xdcu74uieqsahwd7.jpg', 25.00, 25),
(45, 'La Autobiografía de Malcolm X', 'Malcolm X y Alex Haley', '1234567834', 1, 15, 'Grove Press', '1965-10-29', 466, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0ntA_t-hksbPSaSGzHRkVboVSJ8TqDbbavQ&s', 18.00, 30),
(46, 'Sapiens: De Animales a Dioses', 'Yuval Noah Harari', '1234567835', 1, 16, 'Harvill Secker', '2011-01-01', 512, 'https://images.cdn1.buscalibre.com/fit-in/360x360/15/4b/154b69f6b695ad9804295715ee9db960.jpg', 20.00, 35),
(47, 'El Mundo de Ayer', 'Stefan Zweig', '1234567836', 1, 16, 'Stock', '1942-01-01', 472, 'https://images.cdn3.buscalibre.com/fit-in/360x360/3b/a2/3ba26f0bad8a51b34dda5bd6475e0627.jpg', 22.00, 30),
(48, 'La Segunda Guerra Mundial', 'Winston Churchill', '1234567837', 1, 16, 'Cassell', '1948-01-01', 873, 'https://images.cdn3.buscalibre.com/fit-in/360x360/5a/43/5a439ec4b1a7487376313ce6a81202fc.jpg', 30.00, 25),
(49, 'Una Breve Historia del Tiempo', 'Stephen Hawking', '1234567838', 1, 17, 'Bantam Dell Publishing Group', '1988-01-01', 256, 'https://m.media-amazon.com/images/I/91QH0SHtdOL._AC_UF1000,1000_QL80_.jpg', 20.00, 40),
(50, 'El Gen', 'Siddhartha Mukherjee', '1234567839', 1, 17, 'Scribner', '2016-01-01', 592, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788499926520_h0dv8vkrsab0ou5o.jpg', 22.00, 35),
(51, 'El Cerebro: Nuestra Historia', 'David Eagleman', '1234567840', 1, 17, 'Canongate Books', '2015-01-01', 224, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdNA6HJuvd1tSpUlrPrCB43m9JkK0MP3kYBQ&s', 18.00, 30),
(52, 'Los 7 Hábitos de la Gente Altamente Efectiva', 'Stephen Covey', '1234567841', 1, 18, 'Free Press', '1989-01-01', 381, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTenKrsU5G4pGuQZeP4Y2DPMrh_CtW-IJdaHg&s', 25.00, 50),
(53, 'Cómo Ganar Amigos e Influir sobre las Personas', 'Dale Carnegie', '1234567842', 1, 18, 'Simon & Schuster', '1936-01-01', 291, 'https://www.crisol.com.pe/media/catalog/product/cache/f6d2c62455a42b0d712f6c919e880845/9/7/9786124463273_css3tra84daqgm3e.jpg', 18.00, 40),
(54, 'El Poder del Ahora', 'Eckhart Tolle', '1234567843', 1, 18, 'New World Library', '1997-01-01', 229, 'https://images.cdn3.buscalibre.com/fit-in/360x360/60/f1/60f1f81bd7586d65451c4551311c4979.jpg', 20.00, 35),
(55, 'Tus Zonas Erróneas', 'Wayne Dyer', '1234567844', 1, 19, 'Avon', '1976-01-01', 272, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9786124346729_jpqkcbnbpbvex0nz.jpg', 15.00, 50),
(56, 'La Magia del Orden', 'Marie Kondo', '1234567845', 1, 19, 'Ten Speed Press', '2014-01-01', 224, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9789877350937_uzd4teihpvbcecsi.jpg', 18.00, 45),
(57, 'Despierta tu Héroe Interior', 'Victor Hugo Manzanilla', '1234567846', 1, 19, 'Grupo Nelson', '2016-01-01', 240, 'https://m.media-amazon.com/images/I/81HyiKph41L._AC_UF1000,1000_QL80_.jpg', 22.00, 40),
(58, 'La Biblia', 'Varios Autores', '1234567847', 1, 20, 'Diversos', '1000-01-01', 1200, 'https://images.cdn1.buscalibre.com/fit-in/360x360/88/c7/88c769514cf52e17bb6f03259f1420f3.jpg', 50.00, 30),
(59, 'El Corán', 'Varios Autores', '1234567848', 1, 20, 'Diversos', '0632-01-01', 604, 'https://images.cdn1.buscalibre.com/fit-in/360x360/8d/1f/8d1f3d6cbb8d18e004c2c0d1d29ccea2.jpg', 30.00, 25),
(60, 'El Libro de Mormón', 'Joseph Smith', '1234567849', 1, 20, 'Deseret Book', '1830-01-01', 531, 'https://upload.wikimedia.org/wikipedia/commons/c/cd/El_Libro_de_Mormon.jpg', 25.00, 20),
(61, 'Watchmen', 'Alan Moore y Dave Gibbons', '1234567850', 1, 21, 'DC Comics', '1987-01-01', 416, 'https://images.cdn1.buscalibre.com/fit-in/360x360/e3/d8/e3d8e9b9229ead55e155c48bedeba9ae.jpg ', 30.00, 50),
(62, 'Maus', 'Art Spiegelman', '1234567851', 1, 21, 'Pantheon Books', '1980-01-01', 296, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9786073125819_czsyvb5gm6f5dzl5.jpg', 25.00, 40),
(63, 'V de Vendetta', 'Alan Moore y David Lloyd', '1234567852', 1, 21, 'DC Comics', '1982-01-01', 296, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788418326943_j9rfdemr4cxdzycd.jpg', 28.00, 35),
(64, 'Cien Sonetos de Amor', 'Pablo Neruda', '1234567853', 1, 22, 'Editorial Losada', '1959-01-01', 128, 'https://images.cdn1.buscalibre.com/fit-in/360x360/03/85/03851ef1632de9ed430b3ee6f9562510.jpg', 15.00, 40),
(65, 'Las Flores del Mal', 'Charles Baudelaire', '1234567854', 1, 22, 'Auguste Poulet-Malassis', '1857-01-01', 158, 'https://images.cdn2.buscalibre.com/fit-in/360x360/13/75/1375bb00077d20dbba768d3491505ddc.jpg', 18.00, 35),
(66, 'Divina Comedia', 'Dante Alighieri', '1234567855', 1, 22, 'Pluton Ediciones', '1320-01-01', 432, 'https://imagessl.tagusbooks.com/a/l/t0/16/9788494637216.jpg', 25.00, 30),
(67, 'El Contrato Social', 'Jean-Jacques Rousseau', '1234567856', 1, 23, 'Marc-Michel Rey', '1762-01-01', 232, 'https://upload.wikimedia.org/wikipedia/commons/d/db/Social_contract_rousseau_page.jpg', 18.00, 40),
(68, 'Walden', 'Henry David Thoreau', '1234567857', 1, 23, 'Ticknor and Fields', '1854-01-01', 357, 'https://upload.wikimedia.org/wikipedia/commons/2/25/Walden_Thoreau.jpg', 20.00, 35),
(69, 'La Desobediencia Civil', 'Henry David Thoreau', '1234567858', 1, 23, 'A. P. Putnam', '1849-01-01', 48, 'https://images.cdn1.buscalibre.com/fit-in/360x360/dc/ad/dcad3757d465785979813045b35083e3.jpg', 10.00, 30),
(70, 'En el Camino', 'Jack Kerouac', '1234567859', 1, 24, 'Viking Press', '1957-01-01', 320, 'https://images.cdn1.buscalibre.com/fit-in/360x360/bc/28/bc28f57ef643d98abc7328a1405158b9.jpg', 18.00, 50),
(71, 'Hacia Rutas Salvajes', 'Jon Krakauer', '1234567860', 1, 24, 'Villard', '1996-01-13', 224, 'https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/h/a/hacia-rutas-salvajes-2_1xalj9fud6z9zotc.jpg', 20.00, 40),
(72, 'El Gran Viaje de la Vida', 'Susan O\'Brien', '1234567861', 1, 24, 'National Geographic', '2008-01-01', 312, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0EB0UnN0PkjLTl3sV_xFvzF-vWzfv4_N5lQ&s', 25.00, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `ID_Proveedor` int(11) NOT NULL,
  `Nombre_Proveedor` varchar(255) NOT NULL,
  `Nombre_Contacto` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Codigo_Postal` varchar(20) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  `Celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID_Proveedor`, `Nombre_Proveedor`, `Nombre_Contacto`, `Direccion`, `Ciudad`, `Codigo_Postal`, `Pais`, `Celular`) VALUES
(1, 'Proveedor A', 'Contacto A', 'Dirección A', 'Ciudad A', '12345', 'Pais A', '123456789'),
(2, 'Proveedor B', 'Contacto B', 'Dirección B', 'Ciudad B', '67890', 'Pais B', '987654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(255) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Rol` enum('cliente','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre_Usuario`, `Contrasena`, `Rol`) VALUES
(1, 'admin', '$2y$10$gMuuLBr9ssEt1fQeIQkujuPd3qtQdhELgofp4c/9vS8q0V5ZyvJza', 'administrador'),
(2, 'EliG1603', '$2y$10$hp9rgPuH30icrNOPO5eQHeEuKf0mTX4YqKKZ4MljUcw..hjMOaJF2', 'cliente'),
(3, 'YadEli16', '$2y$10$IE2WJ4UP446wDI9QDmAOw.rXFu5WL58a6HBh.gk.b5TOYj1R6UbUu', 'cliente'),
(4, 'Max', '$2y$10$o5r6YfFxsAfUtlv6D4WNsebs4xMjV75NNC8xrqZ5IAFObp52jodlC', 'cliente'),
(5, 'Max_La_chira', '$2y$10$g.aSSA/aut3wTVkZOu3dGeJs15grwWqIpzoZjVwCwvwNLx/ujDxry', 'cliente'),
(6, 'Yad', '$2y$10$tqW4a3gmIb/MVDtD5V7ENuybNzc90NB0QYLhW.yqgRLfDPVHhQ/Fq', 'cliente'),
(7, 'luci', '$2y$10$C/FWIPwJKALM6B5unDUjtu6BcUQeiU2oL0AssR64sP8DpLqEGEr.u', 'cliente'),
(8, 'rose', '$2y$10$i3Gc46sxdGWlH59Iy.p6y.bDOpiNwql7lC3u4ktdAOEx2p5Mj5wlG', 'cliente'),
(9, 'lia', '$2y$10$wCQJZfF2EvpcwMqpQYEQ/ORlE4LBxmKKEJEPnijPGC39jTdyZvGCW', 'cliente'),
(10, 'jhansini', '$2y$10$4LTLZNDdQRbovSLsE4BvPu37yabnHJxipExI.mH7w72UqHA2IAPde', 'cliente'),
(11, 'noumghost', '$2y$10$.xPvWP/KKjIRn91DsXrXLu3J8O5PEIZz0mqn.MnR6r0XyNufSuRLm', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`ID_Conductor`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_Empleado`);

--
-- Indices de la tabla `ordendetalles`
--
ALTER TABLE `ordendetalles`
  ADD PRIMARY KEY (`ID_OrdenDetalles`),
  ADD KEY `ID_Libro` (`ID_Libro`),
  ADD KEY `ordendetalles_ibfk_1` (`ID_Orden`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`ID_Orden`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Empleado` (`ID_Empleado`),
  ADD KEY `ID_Conductor` (`ID_Conductor`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Libro`),
  ADD UNIQUE KEY `ISBN` (`ISBN`),
  ADD KEY `ID_Proveedor` (`ID_Proveedor`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID_Proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `ID_Conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordendetalles`
--
ALTER TABLE `ordendetalles`
  MODIFY `ID_OrdenDetalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `ID_Orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordendetalles`
--
ALTER TABLE `ordendetalles`
  ADD CONSTRAINT `ordendetalles_ibfk_1` FOREIGN KEY (`ID_Orden`) REFERENCES `ordenes` (`ID_Orden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordendetalles_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `productos` (`ID_Libro`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `clientes` (`ID_Cliente`),
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`ID_Empleado`) REFERENCES `empleados` (`ID_Empleado`),
  ADD CONSTRAINT `ordenes_ibfk_3` FOREIGN KEY (`ID_Conductor`) REFERENCES `conductores` (`ID_Conductor`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`ID_Proveedor`) REFERENCES `proveedores` (`ID_Proveedor`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
