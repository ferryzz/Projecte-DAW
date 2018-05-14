-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2018 a las 17:15:47
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_familia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `id_familia`) VALUES
(1, 'Fuentes de Alimentación', 1),
(2, 'Placas Base', 1),
(3, 'Memorias RAM', 1),
(4, 'Procesadores', 1),
(5, 'Discos Duros', 1),
(6, 'Tarjetas Gráficas', 1),
(7, 'Sobremesa', 2),
(8, 'Portátiles', 2),
(9, 'Teclados', 3),
(10, 'Ratones', 3),
(11, 'Monitores', 3),
(12, 'Auriculares', 3),
(13, 'Cables USB', 4),
(14, 'Cables HDMI', 4),
(15, 'Cables VGA', 4),
(16, 'Cables de red', 4),
(17, 'Cables ATA', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  `Poblacion (CP)` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `email`, `telefono`, `direccion`, `password`, `Poblacion (CP)`) VALUES
(1, 'Sergi Aguado Redondo', 'sergiaguado97@gmail.com', '666666666', 'c./ santa maria 34', '123456', '08180'),
(2, 'Jesus Rodriguez Martos', 'jesusrodri@gmail.com', '666666636', 'c./ santa roca 221', '123456', '08100'),
(3, 'Raul Martinez Garcia', 'raulmg@yahoo.es', '655555555', 'c./ calle resp 32, 2º 1ª', '123456', '08000'),
(4, 'David Garcia Abad', 'garciadavidabad@gmail.com', '939939999', 'plaza de las fresas, 34', '123456', '08100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes-productos-ventas`
--

CREATE TABLE `clientes-productos-ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes-productos-ventas`
--

INSERT INTO `clientes-productos-ventas` (`id`, `id_cliente`, `id_producto`, `id_venta`) VALUES
(1, 1, 13, 1),
(2, 1, 5, 1),
(3, 1, 7, 1),
(4, 2, 12, 2),
(5, 2, 3, 2),
(6, 1, 15, 3),
(7, 1, 6, 3),
(8, 1, 11, 3),
(9, 4, 7, 4),
(10, 4, 8, 5),
(11, 4, 9, 5),
(12, 4, 11, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `Nombre`) VALUES
(1, 'Componentes'),
(2, 'Ordenadores'),
(3, 'Periféricos'),
(4, 'Cables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `id` int(11) NOT NULL,
  `fecha` varchar(12) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `comentario` varchar(400) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id`, `fecha`, `id_cliente`, `id_producto`, `comentario`, `valoracion`) VALUES
(1, '14/04/2018', 1, 7, 'Me ha gustado mucho etc tec etc et cetetc ectecte cecet ect ectce ect cetcetectcet cet cet cet ect cet ', 4),
(2, '14/04/2018', 1, 13, 'I love this producto jedw ewojdewiubfoewbuf', 5),
(3, '16/04/2018', 4, 7, 'No me ha gustado nada, va mal', 1),
(4, '17/04/2018', 2, 12, 'Esta bien.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(6) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `categoria_id`, `imagen`) VALUES
(1, 'L-Link Fuente de Alimentación 650W PFC', 22, 1, 'assets/img/fuente1.jpg'),
(2, 'Tacens APII500 Fuente Alimentación 500W', 13, 1, 'assets/img/fuente2.jpg'),
(3, 'MSI Z370 Gaming Plus', 140, 2, 'assets/img/placa1.jpg'),
(4, 'Gigabyte Z370P D3', 89, 2, 'assets/img/placa2.jpg\r\n'),
(5, 'Crucial DDR4 2133 PC4-17000 8GB CL15', 75, 3, 'assets/img/ram1.jpg'),
(6, 'Intel Core i7-8700K 3.7Ghz BOX', 319, 4, 'assets/img/procesador1.jpg'),
(7, 'Intel Core i3-8100 3.6GHz BOX', 100, 4, 'assets/img/procesador2.jpg'),
(8, 'Seagate BarraCuda 3.5\" 1TB SATA3', 45, 5, 'assets/img/discoduro1.jpg'),
(9, 'Samsung 850 Evo SSD Series 250GB SATA3', 85, 5, 'assets/img/discoduro2.jpg'),
(10, 'Asus Dual GTX 1060 OC 6GB GDDR5', 379, 6, 'assets/img/gpu1.jpg'),
(11, 'MSI GeForce GTX 1070 Ti GAMING 8 GB GDDR5', 592, 6, 'assets/img/gpu2.jpg'),
(12, 'HP Pavilion Desktop 570-P066NS AMD A10-9700/12GB/1TB/RX 460', 600, 7, 'assets/img/sobremesa1.jpg'),
(13, 'HP OMEN 880-127NS Intel Core i7-8700/16GB/1TB+128GB SSD/GTX 1060', 1120, 7, 'assets/img/sobremesa2.jpg'),
(14, 'HP Notebook 250 G6 Intel Core i5-7200U/8GB/256GB SSD/15.6\"', 595, 8, 'assets/img/portatil1.jpg'),
(15, 'Portátil Lenovo IdeaPad 320-15AST AMD A4-9120/8GB/1TB/15.6\"', 419, 8, 'assets/img/portatil2.jpg'),
(16, 'Logitech Keyboard K120', 14, 9, 'assets/img/keyboard1.jpg'),
(17, 'Newskill Hanshi Spectrum Teclado Mecánico RGB Kailh Brown', 100, 9, 'assets/img/keyboard2.jpg'),
(18, 'HP 200 Ratón Inalámbrico 1000DPI', 10, 12, 'assets/img/raton1.jpg'),
(19, 'Razer DeathAdder Elite Ratón Gaming 16000 DPI Negro', 75, 10, 'assets/img/raton2.jpg'),
(20, 'Samsung S24D330H 24\" LED', 135, 11, 'assets/img/monitor1.jpg'),
(21, 'MSI Optix G24C 24\" FullHD Curvo', 255, 11, 'assets/img/monitor2.jpg'),
(22, 'Logitech G430 Gaming Surround Sound 7.1', 75, 12, 'assets/img/auriculares1.jpg'),
(23, 'SuperLux HD 668B', 30, 12, 'assets/img/auriculares2.jpg'),
(24, 'Cable USB 3.0 Alargador Macho/Hembra 1m', 5, 13, 'assets/img/usb1.jpg'),
(25, 'Nanocable Cable USB Tipo A a Tipo B Negro para Impresora', 1, 13, 'assets/img/usb2.jpg'),
(26, 'Owlotech Cable HDMI 1.4 1.8 Metros', 3, 14, 'assets/img/hdmi1.jpg'),
(27, 'Nanocable Cable HDMI v2.0 4K Macho/Macho 1m Negro', 6, 14, 'assets/img/hdmi2.jpg'),
(28, 'Cable SVGA Macho/Macho 1.8M', 8, 15, 'assets/img/vga1.jpg'),
(29, 'Startech Cable 30cm Duplicador Divisor de Vídeo VGA de 2 Puertos Salidas', 15, 15, 'assets/img/vga2.jpg'),
(30, 'Owlotech Cable de Red RJ45 UTP Cat.6 10/100/1000 Gris (2m)', 3, 16, 'assets/img/red1.jpg'),
(31, 'Cable de Red UTP RJ45 Cat 6e 50cm Azul', 2, 16, 'assets/img/red2.jpg'),
(32, 'Equip Cable Alimentación Molex/SATA 15 cm', 2, 17, 'assets/img/ata1.jpg'),
(33, 'Startech Cable Adaptador Bifurcador Divisor Splitter de Alimentación SATA de 0,15m 2x Hembra', 6, 17, 'assets/img/ata2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id`, `Nombre`, `Email`, `Telefono`) VALUES
(1, 'Electro STock', 'compras@electrostock.ocm', '939888888'),
(2, 'Componentes express', 'david@componentesexpress.com', '939999999'),
(3, 'Tecno Audio', 'clientes@tecnoaudio.com', '939777888');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` varchar(12) NOT NULL,
  `hora` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `hora`) VALUES
(1, '03/04/2018', '10:04'),
(2, '04/07/2017', '20:00'),
(3, '10/04/2018', '14:41'),
(4, '10/04/2018', '17:30'),
(5, '14/01/2018', '08:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes-productos-ventas`
--
ALTER TABLE `clientes-productos-ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes-productos-ventas`
--
ALTER TABLE `clientes-productos-ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
